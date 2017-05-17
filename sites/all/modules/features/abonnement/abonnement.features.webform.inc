<?php
/**
 * @file
 * abonnement.features.webform.inc
 */

/**
 * Implements hook_webform_defaults().
 */
function abonnement_webform_defaults() {
$webforms = array();
  $webforms['billeterie'] = array(
  'title' => 'Billeterie',
  'log' => '',
  'status' => 1,
  'comment' => 1,
  'promote' => 0,
  'sticky' => 0,
  'type' => 'webform',
  'language' => 'fr',
  'tnid' => 0,
  'translate' => 0,
  'translations' => array(
    'original' => 'fr',
    'data' => array(
      'fr' => array(
        'entity_type' => 'node',
        'entity_id' => 9,
        'revision_id' => 9,
        'language' => 'fr',
        'source' => '',
        'uid' => 1,
        'status' => 1,
        'translate' => 0,
        'created' => 1493740705,
        'changed' => 1493740705,
      ),
    ),
  ),
  'rdf_mapping' => array(
    'rdftype' => array(
      0 => 'sioc:Item',
      1 => 'foaf:Document',
    ),
    'title' => array(
      'predicates' => array(
        0 => 'dc:title',
      ),
    ),
    'created' => array(
      'predicates' => array(
        0 => 'dc:date',
        1 => 'dc:created',
      ),
      'datatype' => 'xsd:dateTime',
      'callback' => 'date_iso8601',
    ),
    'changed' => array(
      'predicates' => array(
        0 => 'dc:modified',
      ),
      'datatype' => 'xsd:dateTime',
      'callback' => 'date_iso8601',
    ),
    'body' => array(
      'predicates' => array(
        0 => 'content:encoded',
      ),
    ),
    'uid' => array(
      'predicates' => array(
        0 => 'sioc:has_creator',
      ),
      'type' => 'rel',
    ),
    'name' => array(
      'predicates' => array(
        0 => 'foaf:name',
      ),
    ),
    'comment_count' => array(
      'predicates' => array(
        0 => 'sioc:num_replies',
      ),
      'datatype' => 'xsd:integer',
    ),
    'last_activity' => array(
      'predicates' => array(
        0 => 'sioc:last_activity_date',
      ),
      'datatype' => 'xsd:dateTime',
      'callback' => 'date_iso8601',
    ),
  ),
  'webform' => array(
    'next_serial' => 2,
    'confirmation' => '',
    'confirmation_format' => 'filtered_html',
    'redirect_url' => '<confirmation>',
    'status' => 1,
    'block' => 0,
    'allow_draft' => 0,
    'auto_save' => 0,
    'submit_notice' => 1,
    'confidential' => 0,
    'submit_text' => '',
    'submit_limit' => -1,
    'submit_interval' => -1,
    'total_submit_limit' => -1,
    'total_submit_interval' => -1,
    'progressbar_bar' => 1,
    'progressbar_page_number' => 0,
    'progressbar_percent' => 0,
    'progressbar_pagebreak_labels' => 1,
    'progressbar_include_confirmation' => 1,
    'progressbar_label_first' => 'Start',
    'progressbar_label_confirmation' => 'Complete',
    'preview' => 0,
    'preview_next_button_label' => '',
    'preview_prev_button_label' => '',
    'preview_title' => '',
    'preview_message' => '',
    'preview_message_format' => 'filtered_html',
    'preview_excluded_components' => array(),
    'machine_name' => 'billeterie',
    'record_exists' => TRUE,
    'roles' => array(
      0 => 1,
      1 => 2,
    ),
    'emails' => array(),
    'components' => array(
      'billeterie__type' => array(
        'form_key' => 'type',
        'name' => 'Type',
        'type' => 'select',
        'value' => '',
        'extra' => array(
          'items' => 'wild|Concerts Sauvages
family|Concerts en Famille',
          'multiple' => 0,
          'title_display' => 'before',
          'description_above' => 0,
          'private' => 0,
          'wrapper_classes' => '',
          'css_classes' => '',
          'aslist' => 0,
          'empty_option' => '',
          'optrand' => 0,
          'other_option' => NULL,
          'other_text' => 'Other...',
          'description' => '',
          'custom_keys' => FALSE,
          'options_source' => '',
          'analysis' => TRUE,
          'translated_strings' => array(
            0 => 'webform:9:15:#title',
            1 => 'webform:9:15:#options-wild',
            2 => 'webform:9:15:#options-family',
          ),
        ),
        'required' => 0,
        'weight' => 1,
        'machine_name' => 'billeterie__type',
        'page_num' => 1,
      ),
      'billeterie__grille_de_prix' => array(
        'form_key' => 'grille_de_prix',
        'name' => 'Grille de prix',
        'type' => 'markup',
        'value' => '<p>Grille de prix</p>

<table align="center" border="0" cellpadding="1" cellspacing="1" class=".prices-table">
	<thead>
		<tr>
			<th scope="row">
			<p><strong>Catégorie unique</strong></p>
			</th>
			<th scope="row">Plein Tarif</th>
			<th scope="row">
			<p><strong>Tarif réduit*</strong></p>
			</th>
			<th scope="row">
			<p><strong>16-26 ans</strong></p>
			</th>
			<th scope="row">
			<p><strong>&lt; 16 ans</strong></p>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row">&nbsp;</th>
			<th scope="row">
			<p>CHF 25.- X&nbsp;</p>
			</th>
			<th scope="row">
			<p>CHF 20.- X</p>
			</th>
			<th scope="row">
			<p>CHF 15.- X</p>
			</th>
			<th scope="row">
			<p>CHF 10.- X</p>
			</th>
		</tr>
		<tr>
			<th scope="row">&nbsp;</th>
			<th scope="row">&nbsp;</th>
			<th scope="row">&nbsp;</th>
			<th scope="row">&nbsp;</th>
			<th scope="row">&nbsp;</th>
		</tr>
		<tr>
			<th scope="row">&nbsp;</th>
			<th scope="row">&nbsp;</th>
			<th scope="row">&nbsp;</th>
			<th scope="row">&nbsp;</th>
			<th scope="row">&nbsp;</th>
		</tr>
	</tbody>
</table>

<p>&nbsp;</p>
',
        'extra' => array(
          'format' => 'full_html',
          'private' => FALSE,
          'display_on' => 'form',
          'translated_strings' => array(
            0 => 'webform:9:14:#markup',
          ),
        ),
        'required' => 0,
        'weight' => 2,
        'machine_name' => 'billeterie__grille_de_prix',
        'page_num' => 1,
      ),
      'billeterie__concert' => array(
        'form_key' => 'concert',
        'name' => 'Concerts Sauvages',
        'type' => 'node_reference',
        'value' => '',
        'extra' => array(
          'widget_type' => 'select',
          'multiple' => 0,
          'use_view' => 1,
          'referenceable_types' => array(
            'concert' => 'concert',
            'page' => 0,
            'article' => 0,
            'panel' => 0,
            'webform' => 0,
          ),
          'reference_view' => 'concerts:entityreference_1',
          'view_args' => '1,4',
          'default_value' => '',
          'sort' => array(
            'sort_by' => 'title',
            'order' => 'ASC',
          ),
          'title_display' => 'none',
          'description_above' => 0,
          'private' => 0,
          'wrapper_classes' => '',
          'css_classes' => '',
          'attributes' => array(),
          'description' => '',
          'empty_option' => 'None',
          'translated_strings' => array(
            0 => 'webform:9:12:#title',
          ),
        ),
        'required' => 0,
        'weight' => 3,
        'machine_name' => 'billeterie__concert',
        'mandatory' => 0,
        'page_num' => 1,
      ),
      'abonnement__carre_dor' => array(
        'form_key' => 'details',
        'name' => 'Détails',
        'type' => 'field_wrapper',
        'value' => '',
        'extra' => array(
          'title_display' => 'none',
          'description_above' => 0,
          'private' => 0,
          'wrapper_classes' => '',
          'css_classes' => '',
          'width' => '',
          'maxlength' => '',
          'field_prefix' => '',
          'field_suffix' => '',
          'disabled' => 0,
          'unique' => 0,
          'description' => '',
          'placeholder' => '',
          'attributes' => array(),
          'analysis' => FALSE,
          'translated_strings' => array(
            0 => 'webform:9:7:#title',
          ),
        ),
        'required' => 0,
        'weight' => 5,
        'machine_name' => 'abonnement__carre_dor',
        'page_num' => 1,
      ),
      'abonnement__infos' => array(
        'form_key' => 'prenom',
        'name' => 'Prénom',
        'type' => 'textfield',
        'value' => '',
        'extra' => array(
          'title_display' => 'before',
          'description_above' => 0,
          'private' => 0,
          'wrapper_classes' => '',
          'css_classes' => '',
          'width' => '',
          'maxlength' => '',
          'minlength' => '',
          'field_prefix' => '',
          'field_suffix' => '',
          'disabled' => 0,
          'unique' => 0,
          'description' => '',
          'placeholder' => '',
          'attributes' => array(),
          'analysis' => FALSE,
          'translated_strings' => array(
            0 => 'webform:9:8:#title',
          ),
        ),
        'required' => 1,
        'weight' => 7,
        'machine_name' => 'abonnement__infos',
        'page_num' => 1,
        'parent_machine_name' => 'abonnement__carre_dor',
      ),
      'billeterie__nom' => array(
        'form_key' => 'nom',
        'name' => 'Nom',
        'type' => 'textfield',
        'value' => '',
        'extra' => array(
          'title_display' => 'before',
          'description_above' => 0,
          'private' => 0,
          'wrapper_classes' => '',
          'css_classes' => '',
          'width' => '',
          'maxlength' => '',
          'minlength' => '',
          'field_prefix' => '',
          'field_suffix' => '',
          'disabled' => 0,
          'unique' => 0,
          'description' => '',
          'placeholder' => '',
          'attributes' => array(),
          'analysis' => FALSE,
          'translated_strings' => array(
            0 => 'webform:9:9:#title',
          ),
        ),
        'required' => 1,
        'weight' => 8,
        'machine_name' => 'billeterie__nom',
        'page_num' => 1,
        'parent_machine_name' => 'abonnement__carre_dor',
      ),
      'billeterie__email' => array(
        'form_key' => 'email',
        'name' => 'Email',
        'type' => 'email',
        'value' => '',
        'extra' => array(
          'format' => 'long',
          'title_display' => 'before',
          'description_above' => 0,
          'private' => 0,
          'wrapper_classes' => '',
          'css_classes' => '',
          'multiple' => 0,
          'width' => '',
          'unique' => 0,
          'disabled' => 0,
          'description' => '',
          'placeholder' => '',
          'attributes' => array(),
          'analysis' => FALSE,
          'translated_strings' => array(
            0 => 'webform:9:10:#title',
          ),
        ),
        'required' => 1,
        'weight' => 9,
        'machine_name' => 'billeterie__email',
        'page_num' => 1,
        'parent_machine_name' => 'abonnement__carre_dor',
      ),
      'billeterie__telephone' => array(
        'form_key' => 'telephone',
        'name' => 'Téléphone',
        'type' => 'telephone',
        'value' => '',
        'extra' => array(
          'title_display' => 'before',
          'description_above' => 0,
          'private' => 0,
          'wrapper_classes' => '',
          'css_classes' => '',
          'width' => '',
          'disabled' => 0,
          'unique' => 0,
          'description' => '',
          'placeholder' => '',
          'attributes' => array(),
          'analysis' => FALSE,
          'translated_strings' => array(
            0 => 'webform:9:11:#title',
          ),
        ),
        'required' => 0,
        'weight' => 10,
        'machine_name' => 'billeterie__telephone',
        'page_num' => 1,
        'parent_machine_name' => 'abonnement__carre_dor',
      ),
      'abonnement__prenom_facturation' => array(
        'form_key' => 'billets',
        'name' => 'Billets',
        'type' => 'field_wrapper',
        'value' => '',
        'extra' => array(
          'title_display' => 'none',
          'description_above' => 0,
          'private' => 0,
          'wrapper_classes' => '',
          'css_classes' => '',
          'width' => '',
          'maxlength' => '',
          'field_prefix' => '',
          'field_suffix' => '',
          'disabled' => 0,
          'unique' => 0,
          'description' => '',
          'placeholder' => '',
          'attributes' => array(),
          'analysis' => FALSE,
          'translated_strings' => array(
            0 => 'webform:9:2:#title',
          ),
        ),
        'required' => 0,
        'weight' => 6,
        'machine_name' => 'abonnement__prenom_facturation',
        'page_num' => 1,
      ),
      'abonnement__nom_facturation' => array(
        'form_key' => 'plein_tarif',
        'name' => 'Plein tarif',
        'type' => 'number',
        'value' => 0,
        'extra' => array(
          'title_display' => 'before',
          'description_above' => 0,
          'private' => 0,
          'wrapper_classes' => '',
          'css_classes' => '',
          'field_suffix' => '25.-',
          'integer' => 1,
          'min' => 0,
          'type' => 'textfield',
          'field_prefix' => '',
          'disabled' => 0,
          'unique' => 0,
          'description' => '',
          'attributes' => array(),
          'analysis' => FALSE,
          'max' => '',
          'step' => '',
          'decimals' => '',
          'point' => '.',
          'separator' => ',',
          'excludezero' => 0,
          'translated_strings' => array(
            0 => 'webform:9:3:#title',
            1 => 'webform:9:3:#field_suffix',
          ),
        ),
        'required' => 0,
        'weight' => 2,
        'machine_name' => 'abonnement__nom_facturation',
        'page_num' => 1,
        'parent_machine_name' => 'abonnement__prenom_facturation',
      ),
      'abonnement__ville_facturation' => array(
        'form_key' => 'tarif_reduit',
        'name' => 'Tarif réduit',
        'type' => 'number',
        'value' => '',
        'extra' => array(
          'title_display' => 'before',
          'description_above' => 0,
          'private' => 0,
          'wrapper_classes' => '',
          'css_classes' => '',
          'field_suffix' => 'x20.-',
          'integer' => 1,
          'type' => 'textfield',
          'field_prefix' => '',
          'disabled' => 0,
          'unique' => 0,
          'description' => '',
          'attributes' => array(),
          'analysis' => FALSE,
          'min' => '',
          'max' => '',
          'step' => '',
          'decimals' => '',
          'point' => '.',
          'separator' => ',',
          'excludezero' => 0,
          'translated_strings' => array(
            0 => 'webform:9:4:#title',
            1 => 'webform:9:4:#field_suffix',
          ),
        ),
        'required' => 0,
        'weight' => 3,
        'machine_name' => 'abonnement__ville_facturation',
        'page_num' => 1,
        'parent_machine_name' => 'abonnement__prenom_facturation',
      ),
      'abonnement__pays' => array(
        'form_key' => '16_26_ans',
        'name' => '16-26 ans',
        'type' => 'number',
        'value' => '',
        'extra' => array(
          'title_display' => 'before',
          'description_above' => 0,
          'private' => 0,
          'wrapper_classes' => '',
          'css_classes' => '',
          'field_suffix' => 'x15.-',
          'integer' => 1,
          'type' => 'textfield',
          'field_prefix' => '',
          'disabled' => 0,
          'unique' => 0,
          'description' => '',
          'attributes' => array(),
          'analysis' => FALSE,
          'min' => '',
          'max' => '',
          'step' => '',
          'decimals' => '',
          'point' => '.',
          'separator' => ',',
          'excludezero' => 0,
          'translated_strings' => array(
            0 => 'webform:9:5:#title',
            1 => 'webform:9:5:#field_suffix',
          ),
        ),
        'required' => 0,
        'weight' => 4,
        'machine_name' => 'abonnement__pays',
        'page_num' => 1,
        'parent_machine_name' => 'abonnement__prenom_facturation',
      ),
      'abonnement__abonnement' => array(
        'form_key' => 'under_16_ans',
        'name' => '< 16 ans',
        'type' => 'number',
        'value' => '',
        'extra' => array(
          'title_display' => 'before',
          'description_above' => 0,
          'private' => 0,
          'wrapper_classes' => '',
          'css_classes' => '',
          'field_suffix' => 'x10.-',
          'integer' => 1,
          'type' => 'textfield',
          'field_prefix' => '',
          'disabled' => 0,
          'unique' => 0,
          'description' => '',
          'attributes' => array(),
          'analysis' => FALSE,
          'min' => '',
          'max' => '',
          'step' => '',
          'decimals' => '',
          'point' => '.',
          'separator' => ',',
          'excludezero' => 0,
          'translated_strings' => array(
            0 => 'webform:9:6:#title',
            1 => 'webform:9:6:#field_suffix',
          ),
        ),
        'required' => 0,
        'weight' => 5,
        'machine_name' => 'abonnement__abonnement',
        'page_num' => 1,
        'parent_machine_name' => 'abonnement__prenom_facturation',
      ),
    ),
    'conditionals' => array(
      3 => array(
        'nid' => 9,
        'rgid' => 3,
        'andor' => NULL,
        'weight' => -1,
        'rules' => array(
          0 => array(
            'nid' => 9,
            'rgid' => 3,
            'rid' => 0,
            'source_type' => 'component',
            'source' => 15,
            'operator' => 'not_equal',
            'value' => 'not_prestige',
          ),
        ),
        'actions' => array(
          0 => array(
            'nid' => 9,
            'rgid' => 3,
            'aid' => 0,
            'target_type' => 'component',
            'target' => 12,
            'invert' => 1,
            'action' => 'show',
            'argument' => '',
          ),
        ),
      ),
    ),
  ),
  'cid' => 0,
  'last_comment_name' => NULL,
  'last_comment_uid' => 1,
  'comment_count' => 0,
  'name' => 'walidvb',
  'picture' => 0,
  'data' => 'a:5:{s:16:"ckeditor_default";s:1:"t";s:20:"ckeditor_show_toggle";s:1:"t";s:14:"ckeditor_width";s:4:"100%";s:13:"ckeditor_lang";s:2:"en";s:18:"ckeditor_auto_lang";s:1:"t";}',
  'webform_features_author' => 'walidvb',
  'webform_features_revision_author' => 'walidvb',
);
return $webforms;
}
