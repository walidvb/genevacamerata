<?php

/**
 * @file
 * Admin page callback file for the customize loading gif module.
 */

/**
 * Form constructor to the set the api add form.
 *
 * @ingroup forms
 */
function ajax_loading_gif_config_form($form, &$form_state) {
  $form['ajax_loading_gif_fieldset'] = array(
    '#type' => 'fieldset',
    '#title' => t('Ajax loading gif configuration'),
  );
  $ajax_loader_icon = variable_get('ajax_loading_gif_image', '');
  $markup = isset($ajax_loader_icon->fid) ? '<img src="' . file_create_url($ajax_loader_icon->uri) . '" /> - ' . $ajax_loader_icon->filename : '';
  $form['ajax_loading_gif_fieldset']['ajax_loading_gif_image_markup'] = array(
    '#markup' => $markup,
  );
  $form['ajax_loading_gif_fieldset']['ajax_loading_gif_image'] = array(
    '#title' => t('Image'),
    '#type' => 'file',
    '#description' => '<p>' . t('Upload your loader image') . '</p>',
  );

  return system_settings_form($form);
}

/**
 * Validate function.
 *
 * @see ajax_loading_gif_config_form()
 */
function ajax_loading_gif_config_form_validate($form, &$form_state) {
  if (empty($_FILES['files']['name']['ajax_loading_gif_image'])) {
    form_set_error('ajax_loading_gif_image', t('!image field is required.', array('!image' => $form['ajax_loading_gif_image']['#title'])));
  }
  // If required, validate the uploaded picture.
  $validators = array(
    'file_validate_is_image' => array(),
    'file_validate_extensions' => array('gif'),
  );
  // Save the file as a temporary file.
  $file = file_save_upload('ajax_loading_gif_image', $validators);
  if ($file === FALSE) {
    form_set_error('ajax_loading_gif_image', t('Uploaded image is not a valid image.'));
  }
  elseif ($file !== NULL) {
    $file_data = image_get_info($file->uri);
    if ($file_data['width'] >= AJAX_LOADING_GIF_MIN_WIDTH && $file_data['width'] <= AJAX_LOADING_GIF_MAX_WIDTH && $file_data['height'] >= AJAX_LOADING_GIF_MIN_HEIGHT && $file_data['height'] <= AJAX_LOADING_GIF_MAX_HEIGHT) {
      global $user;
      $file = file_move($file, 'public://');
      $file->status = FILE_STATUS_PERMANENT;
      file_save($file);
      file_usage_add($file, 'ajax_loading_gif', 'ajax_loading_gif', $user->uid);
      $form_state['values']['ajax_loading_gif_image'] = $file;
    }
    else {
      form_set_error('ajax_loading_gif_image', t('Image resolution should be between "10x10" and "20x20"'));
    }
  }
}
