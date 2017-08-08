<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
 // wrap partners in groups of partners
?>
<div class="partner-group-container col-xs-12 col-sm-12 col-md-12">
	<?php if (!empty($title)): ?>
	  <h3><?php print $title; ?></h3>
	<?php endif; ?>
	<div class="partner-group">
		<?php foreach ($rows as $id => $row): ?>
		    <?php print $row; ?>
		<?php endforeach; ?>
	</div>
</div>