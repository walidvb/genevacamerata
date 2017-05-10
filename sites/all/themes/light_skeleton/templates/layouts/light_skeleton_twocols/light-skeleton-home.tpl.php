<div class="row">
  <?php if(!empty($content['left'])): ?>
    <div class="left column six">
      <?php print $content['left']; ?>
    </div>
  <?php endif; ?>
  <?php if(!empty($content['center'])): ?>
    <div class="center column four">
      <?php print $content['center']; ?>
    <?php if(!empty($content['right'])): ?>
      <div class="trigger trigger-right" data-panel-target="#filters">a</div>
      <div id="filters" class="right column two">
        <?php print $content['right']; ?>
      </div>
    <?php endif; ?>
    </div>
  <?php endif; ?>
</div>