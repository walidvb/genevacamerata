<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
	$img = $fields['field_image']->content;
	$nid = $fields['nid']->content;
	$url = $fields['field_url'] ? $fields['field_url']->content : null;
	$title = $fields['title']->content;
	$body = $fields['body']->content;

	$cssID = "news-$nid";
?>
<style>
	<?php
		print "#$cssID{ background-image:  url($img), linear-gradient(50deg, #ff757d 0%, #ff424d 51%, #ff757d 75%); }";
	?>
	
</style>
<a class="news" id="<?php print $cssID ?>" href="<?php print $url ?>">

	<div class="info">
		<div class="title">
			<?php print $title ?>
		</div>
		<div class="subtitle">
			<?php print $body ?>
		</div>
	</div>
</a>