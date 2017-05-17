<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('3 column home layout 2 - 8 - 2'),
  'category' => t('light_skeleton'),
  'icon' => 'bootstrap_twocol_stacked.png',
  'theme' => 'light_skeleton_2-8-2',
  'admin css' => '../panels-bootstrap-layouts-admin.css',
  'regions' => array(
    'left' => t('Left'),
    'center' => t('Center'),
    'right' => t('Right'),
  ),
);
