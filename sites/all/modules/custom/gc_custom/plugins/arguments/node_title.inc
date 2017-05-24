<?php
$plugin = array(
  'title' => t("Concert: Title"),
  'description' => t('Creates a node context from a concert title argument.'),
  'context' => 'gc_custom_argument_node_title_context',
  'placeholder form' => array(
    '#type' => 'textfield',
    '#description' => t('Enter the node title of a node for this argument'),
  ),
);

function gc_custom_argument_node_title_context($arg = NULL, $conf = NULL, $empty = FALSE) {
  // watchdog('ctools',
  //         'I am running. arg: ' . $arg,
  //         WATCHDOG_NOTICE); // uncomment and watch wd for debug 
  
  if ($empty) {
    return ctools_context_create_empty('node');
  } // not sure ...

  if (is_object($arg)) {
    return ctools_context_create('node', $arg);
  } // ...if these two are really necessary. Do we ever get an object?

  $alias = "concert/$arg";
  $path = drupal_lookup_path("source", $alias);
  $node = menu_get_object("node", 1, $path);

  if (!$node) {
    return FALSE;
  }

  return ctools_context_create('node', $node);
}