<div class="row">
  <?php if(!empty($content['left'])): ?>
    <div class="section col-xs-12 col-sm-6 col-md-4">
      <div class="full-width">
        <?php print $content['left']; ?>
      </div>
    </div>
  <?php endif; ?>
  <div class="section-container left-container col-xs-12 col-sm-6 col-md-8">
    <div class="row">
      <?php if(!empty($content['center'])): ?>
        <div class="section center col-xs-12 col-md-6">
          <?php print $content['center']; ?>
        </div>
      <?php endif; ?>
      <?php if(!empty($content['right'])): ?>
        <div class="section right-col col-xs-12 col-md-6">
          <?php print $content['right']; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>