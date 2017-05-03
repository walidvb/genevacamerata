<?php
function _buy_link_formatter_info() {
	return array(
		'label' => t('Display link as "BUY"'),
		'field types' => array('link_field'),
		'module' => 'gc_custom',
		'settings' => array(),
		);
}

function _buy_link_formatter_view($entity_type, $entity, $field, $instance, $langcode, $items, $display){
  $element = array(); // Initialize the var
  $settings = $display['settings']; // get the settings
  $options = array(
    'html'        => TRUE, // This tells Drupal that we're sending HTML, not plain text, otherwise it would encode it
    'attributes'  => array(
      //'title' => $tooltip, // This sets our tooltip
      ),
    );
    foreach($items as $index => $item)
    {
      $element[$index]['#type'] = 'markup';
      $link = '<a href="' . $item['url'] . '" target="_blank">' . t('Buy') . '</a>';
      $element[$index]['#markup'] = $link; // Assign it to the #markup of the element
    }
    $element['#prefix'] = '<div class="buy-link">';
    $element['#suffix'] = '</div>';
  return $element;
}