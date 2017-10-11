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
 $img = $fields['field_main_image']->content;
 $title = $fields['title']->content;
 $title_raw = $fields['title']->raw;
 $description = $fields['field_description_et']->content;
 $price = $fields['field_price_et']->content;
 $itunes = isset($fields['field_itunes']) ? $fields['field_itunes']->content : null;
 $amazon = isset($fields['field_amazon']) ? $fields['field_amazon']->content : null;
 $mailto = "mailto:gecashop@genevacamerata.com?subject=$title_raw"
?>
<div class="col-xs-12 col-sm-6 col-md-4 product">
    <?php print $img; ?>
    <h2 class="product-title">
        <?php print $title; ?>
    </h2>
    <?php print $description; ?>
    <?php print $price; ?>
    <div class="shop-links">
        <div>
            <a class="order" href="<?php print $mailto?>" target="_blank"><?php print t('Order'); ?></a>
        </div>
        <?php print $itunes . $amazon ?>
    </div>

</div>