<div class="row <?php print $classes; ?>" data-nid="<?php print $css_id; ?>">
  <?php if(!empty($content['left'])): ?>
    <div class="section left-column col-xs-12 col-sm-4">
      <div class="full-width">
        <?php print $content['left']; ?>
      </div>
    </div>
  <?php endif; ?>
  <?php if(!empty($content['right'])): ?>
    <div class="section right-column col-xs-12 col-sm-8">
      <?php print $content['right']; ?>
    </div>
  <?php endif; ?>
</div>