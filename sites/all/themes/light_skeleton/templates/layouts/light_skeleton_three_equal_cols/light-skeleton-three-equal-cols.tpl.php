<div class="row">
  <?php if(!empty($content['left'])): ?>
    <div class="section left columns four">
      <?php print $content['left']; ?>
    </div>
  <?php endif; ?>
  <div class="section-container">
    <?php if(!empty($content['center'])): ?>
      <div class="section center columns four">
        <?php print $content['center']; ?>
      </div>
    <?php endif; ?>
    <?php if(!empty($content['right'])): ?>
      <div class="section columns four">
        <?php print $content['right']; ?>
      </div>
    <?php endif; ?>
  </div>
</div>