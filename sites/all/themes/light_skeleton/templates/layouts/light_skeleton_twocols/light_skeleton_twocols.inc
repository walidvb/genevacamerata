<?php

/**
 * Implements hook_panels_layouts().
 */
// Plugin definition
$plugin = array(
  'title' => t('3 column home layout'),
  'category' => t('light_skeleton'),
  'icon' => 'bootstrap_twocol_stacked.png',
  'theme' => 'light_skeleton_home',
  'admin css' => '../panels-bootstrap-layouts-admin.css',
  'regions' => array(
    'left' => t('Left'),
    'center' => t('Center'),
    'right' => t('Right'),
  ),
);
