<?php

/**
 * Adding CSS Files
 */
function _light_skeleton_add_css() {
  $theme_path = path_to_theme();
  drupal_add_css($theme_path . '/css/light_skeleton_skeleton.css');
  drupal_add_css($theme_path . '/css/light_skeleton_responsive_nav.css');
  drupal_add_css($theme_path . '/css/light_skeleton_style.css');
  $styles = [
  '/css/application.css',
  '/bower_components/css-hamburgers/dist/hamburgers.min.css',
  '/bower_components/owl.carousel/dist/assets/owl.carousel.css',
  '/bower_components/owl.carousel/dist/assets/owl.theme.default.css'
  ];
  foreach ($styles as $key => $style) {
    drupal_add_css($theme_path . $style);
  }
}

/**
 * Adding JS Files
 */
function _light_skeleton_add_js() {
  $theme_path = path_to_theme();
  drupal_add_js($theme_path . '/js/light_skeleton_menu.js');
  $scripts = [
  '/bower_components/owl.carousel/dist/owl.carousel.min.js', 
  '/js/myScripts.js', 
  '/js/home_filters.js',
  '/js/carousels.js'
  ];
  foreach ($scripts as $key => $script) {
    drupal_add_js($theme_path . $script);
  }
}

/**
 * template_preprocess_html
 * This function will a load on every html request.
 * In addition, this function load all the css and js.
 */
function light_skeleton_preprocess_html(&$vars) {
  // Addin JS to the theme.
  _light_skeleton_add_js();
  // Adding CSS to theme.
  _light_skeleton_add_css();
  drupal_add_html_head(
    array(
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'viewport',
        'content' => 'width=device-width, initial-scale=1',
        ),
      ), 'centum:viewport_meta'
    );
}


function light_skeleton_preprocess_page(&$vars) {
   //Check is jquery_update is installed.
  if (!module_exists('jquery_update')) {
   // TODO Check what Jquery update is been running.
    drupal_set_message(t('Jquery update is required, <a target="_blank" href="!url">Download it</a>,  install and switch jquery to version 1.7', array('!url' => 'http://drupal.org/project/jquery_update')), 'warning');
  }

  $page = $vars['page'];


  $content_class = '.col-xs-12';

  $container_class = "";

  $vars['containner_class'] = $container_class;
  $vars['content_class'] = $content_class;
}

/**
 * [light_skeleton_table description]
 * @param  [type] $vars [description]
 * @return [type]            [description]
 */
function light_skeleton_table($vars) {
  $header = $vars['header'];
  $rows = $vars['rows'];
  $attributes = $vars['attributes'];
  $caption = $vars['caption'];
  $colgroups = $vars['colgroups'];
  $sticky = $vars['sticky'];
  $empty = $vars['empty'];

  // Add sticky headers, if applicable.
  if (count($header) && $sticky) {
    drupal_add_js('misc/tableheader.js');
    // Add 'sticky-enabled' class to the table to identify it for JS.
    // This is needed to target tables constructed by this function.
    $attributes['class'][] = 'sticky-enabled';
  }
  $attributes['class'][] = 'u-full-width'; // added default table style.

  $output = '<table' . drupal_attributes($attributes) . ">\n";

  if (isset($caption)) {
    $output .= '<caption>' . $caption . "</caption>\n";
  }

  // Format the table columns:
  if (count($colgroups)) {
    foreach ($colgroups as $number => $colgroup) {
      $attributes = array();

      // Check if we're dealing with a simple or complex column
      if (isset($colgroup['data'])) {
        foreach ($colgroup as $key => $value) {
          if ($key == 'data') {
            $cols = $value;
          } else {
            $attributes[$key] = $value;
          }
        }
      } else {
        $cols = $colgroup;
      }

      // Build colgroup
      if (is_array($cols) && count($cols)) {
        $output .= ' <colgroup' . drupal_attributes($attributes) . '>';
        $i = 0;
        foreach ($cols as $col) {
          $output .= ' <col' . drupal_attributes($col) . ' />';
        }
        $output .= " </colgroup>\n";
      } else {
        $output .= ' <colgroup' . drupal_attributes($attributes) . " />\n";
      }
    }
  }

  // Add the 'empty' row message if available.
  if (!count($rows) && $empty) {
    $header_count = 0;
    foreach ($header as $header_cell) {
      if (is_array($header_cell)) {
        $header_count += isset($header_cell['colspan']) ? $header_cell['colspan'] : 1;
      } else {
        $header_count++;
      }
    }
    $rows[] = array(array('data' => $empty, 'colspan' => $header_count, 'class' => array('empty', 'message')));
  }

  // Format the table header:
  if (count($header)) {
    $ts = tablesort_init($header);
    // HTML requires that the thead tag has tr tags in it followed by tbody
    // tags. Using ternary operator to check and see if we have any rows.
    $output .= (count($rows) ? ' <thead><tr>' : ' <tr>');
    foreach ($header as $cell) {
      $cell = tablesort_header($cell, $header, $ts);
      $output .= _theme_table_cell($cell, TRUE);
    }
    // Using ternary operator to close the tags based on whether or not there are rows
    $output .= (count($rows) ? " </tr></thead>\n" : "</tr>\n");
  } else {
    $ts = array();
  }

  // Format the table rows:
  if (count($rows)) {
    $output .= "<tbody>\n";
    $flip = array('even' => 'odd', 'odd' => 'even');
    $class = 'even';
    foreach ($rows as $number => $row) {
      $attributes = array();

      // Check if we're dealing with a simple or complex row
      if (isset($row['data'])) {
        foreach ($row as $key => $value) {
          if ($key == 'data') {
            $cells = $value;
          } else {
            $attributes[$key] = $value;
          }
        }
      } else {
        $cells = $row;
      }
      if (count($cells)) {
        // Add odd/even class
        if (empty($row['no_striping'])) {
          $class = $flip[$class];
          $attributes['class'][] = $class;
        }

        // Build row
        $output .= ' <tr' . drupal_attributes($attributes) . '>';
        $i = 0;
        foreach ($cells as $cell) {
          $cell = tablesort_cell($cell, $header, $ts, $i++);
          $output .= _theme_table_cell($cell);
        }
        $output .= " </tr>\n";
      }
    }
    $output .= "</tbody>\n";
  }

  $output .= "</table>\n";
  return $output;
}

// Defining status messages.
function light_skeleton_status_messages(&$vars) {
  $display = $vars['display'];
  $output = '';

  $message_info = array(
    'status' => array(
      'heading' => 'Status message',
      'class' => 'success',
      ),
    'error' => array(
      'heading' => 'Error message',
      'class' => 'error',
      ),
    'warning' => array(
      'heading' => 'Warning message',
      'class' => '',
      ),
    );

  foreach (drupal_get_messages($display) as $type => $messages) {
    $message_class = $type != 'warning' ? $message_info[$type]['class'] : 'warning';
    $output .= "<div class=\"notification alert alert-block alert-$message_class $message_class closeable fade in\">\n";
    if (!empty($message_info[$type]['heading'])) {
      $output .= '<h2 class="element-invisible">' . $message_info[$type]['heading'] . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    } else {
      $output .= $messages[0];
    }
    $output .= "</div>\n";
  }
  return $output;
}
/**
 * theme_pager
 */
function light_skeleton_pager($vars) {
  $tags = $vars['tags'];
  $element = $vars['element'];
  $parameters = $vars['parameters'];
  $quantity = $vars['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.
  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => array('pager-first'),
        'data' => $li_first,
        );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => array('pager-previous'),
        'data' => $li_previous,
        );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
          );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
            );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('pager-current'),
            'data' => '<a class="current">' . $i . '</a>',
            );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
            );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
          );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('pager-next'),
        'data' => $li_next,
        );
    }
    if ($li_last) {
      $items[] = array(
        'class' => array('pager-last'),
        'data' => $li_last,
        );
    }
    return '<div class="pagination"><h2 class="element-invisible">' . t('Pages') . '</h2>' . theme('item_list', array(
      'items' => $items,
      'attributes' => array('class' => array('pager')),
      )) . '</div>';
  }
}

function light_skeleton_preprocess_field(&$vars) { //Replace your theme name MYTHEME here.
  if ($node = menu_get_object()){
    if($node->type == 'concert'){
      // if it's a prestige concert and it's in full view mode
      // don't display the prices links
      if($vars['element']['#field_name'] == 'prices' && $node->field_type['und'][0]['tid'] != 5){
        $vars['items']['0']['#markup'] = null;
      }
    }
  }
}

function light_skeleton_preprocess_node(&$vars) {


  $vars['view_mode'] = $vars['elements']['#view_mode'];
  // Provide a distinct $teaser boolean.
  $vars['teaser'] = $vars['view_mode'] == 'teaser';
  $vars['node'] = $vars['elements']['#node'];
  $node = $vars['node'];

  $vars['date'] = format_date($node->created);
  $vars['name'] = theme('username', array('account' => $node));

  $uri = entity_uri('node', $node);
  $vars['node_url'] = url($uri['path'], $uri['options']);
  $vars['title'] = check_plain($node->title);
  $vars['page'] = $vars['view_mode'] == 'full' && node_is_page($node);

  // Flatten the node object's member fields.
  $vars = array_merge((array) $node, $vars);

  // Helpful $content variable for templates.
  $vars += array('content' => array());
  foreach (element_children($vars['elements']) as $key) {
    $vars['content'][$key] = $vars['elements'][$key];
  }

  // Make the field vars available with the appropriate language.
  field_attach_preprocess('node', $node, $vars['content'], $vars);


  // Gather node classes.
  $vars['classes_array'][] = drupal_html_class('node-' . $node->type);
  if ($vars['promote']) {
    $vars['classes_array'][] = 'node-promoted';
  }
  if ($vars['sticky']) {
    $vars['classes_array'][] = 'node-sticky';
  }
  if (!$vars['status']) {
    $vars['classes_array'][] = 'node-unpublished';
  }
  if ($vars['teaser']) {
    $vars['classes_array'][] = 'node-teaser';
  }
  if (isset($vars['preview'])) {
    $vars['classes_array'][] = 'node-preview';
  }

  // Clean up name so there are no underscores.
  $vars['theme_hook_suggestions'][] = 'node__' . $node->type;
  $vars['theme_hook_suggestions'][] = 'node__' . $node->nid;
}


function light_skeleton_menu_link(array $vars) {

  $element = $vars['element'];
  $sub_menu = '';

  $custom_class = ('navbar-item');
  $element['#attributes']['class'][] = $custom_class;

  $navbar_link = ('navbar-link');
  $element['#localized_options']['attributes']['class'][] = $navbar_link;

  $a_class = ('a-class');
  $element['#localized_options']['attributes']['class'][] = $a_class;


  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }

  if (isset($element['#original_link']['options']['attributes']['class'])) {
    foreach ($element['#original_link']['options']['attributes']['class'] as $key => $class) {

      if (substr($class, 0, 9) == 'halflings') {

        // Finally, remove the icon class from link options, so it is not
        // printed twice.
        unset($element['#localized_options']['attributes']['class'][$key]);

        //dpm($element); // For debugging.
      }
    }
  }



  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}



/**
 * Overrides theme_menu_tree().
 * Add bootstrap 'navbar-nav' class to Top Navigation menu
 */
function light_skeleton_menu_tree(&$vars) {
  $output = '<ul id="menu" class="navbar-list">' . $vars['tree'] . '</ul>';
  return $output;
}

function light_skeleton_link($vars) {

  $classes = array();
  if (!empty($vars['options']['attributes']['class'])) {
    $classes = $vars['options']['attributes']['class'];

    if (count($classes) > 1) {
      foreach ($classes as $key => $class) {
        if (substr($class, 0, 9) == 'halflings') {
          unset($vars['options']['attributes']['class'][$key]);
        }
      }
    }
  }
  return '<a href="' . check_plain(url($vars['path'], $vars['options'])) . '"' . drupal_attributes($vars['options']['attributes']) . '>' . ($vars['options']['html'] ? $vars['text'] : check_plain($vars['text'])) . '</a>';
}



/**
* Theme the calendar title
*/
function light_skeleton_date_nav_title($granularity, $view, $link = FALSE, $format = NULL) {
  switch ($granularity) {
    case 'year':
    $title = $view->date_info->year;
    $date_arg = $view->date_info->year;
    break;
    case 'month':
    $format = !empty($format) ? $format : (empty($view->date_info->mini) ? 'F Y' : 'F');
    $title = date_format_date($view->date_info->min_date, 'custom', $format);
    $date_arg = $view->date_info->year .'-'. date_pad($view->date_info->month);
    break;
    case 'day':
    $format = !empty($format) ? $format : (empty($view->date_info->mini) ? 'l j F Y' : 'l j F');
    $title = date_format_date($view->date_info->min_date, 'custom', $format);
    $date_arg = $view->date_info->year .'-'. date_pad($view->date_info->month) .'-'. date_pad($view->date_info->day);
    break;
    case 'week':
    $format = !empty($format) ? $format : (empty($view->date_info->mini) ? 'j F Y' : 'j F ');
    $title = t('Week of @date', array('@date' => date_format_date($view->date_info->min_date, 'custom', $format)));
    $date_arg = $view->date_info->year .'-W'. date_pad($view->date_info->week);
    break;
  }
  if (!empty($view->date_info->mini) || $link) {
// Month navigation titles are used as links in the mini view.
    $attributes = array('title' => t('View full page month'));
    $url = date_real_url($view, $granularity, $date_arg, TRUE);
    return l($title, $url, array('attributes' => $attributes));
  }
  else {
    return $title;
  }
}