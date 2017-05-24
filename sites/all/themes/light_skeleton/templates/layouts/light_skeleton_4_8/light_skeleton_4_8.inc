<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('2 column node layout (4-8)'),
  'category' => t('light_skeleton'),
  'icon' => 'bootstrap_twocol_stacked.png',
  'theme' => 'light_skeleton_4_8',
  'admin css' => '../panels-bootstrap-layouts-admin.css',
  'regions' => array(
    'left' => t('Left'),
    'right' => t('Right'),
  ),
);
