<div id="home-panels" class="row">
  <?php if(!empty($content['left'])): ?>
    <div class="section left columns six">
      <?php print $content['left']; ?>
    </div>
  <?php endif; ?>
  <?php if(!empty($content['center'])): ?>
    <div class="section center columns four">
      <div class="trigger trigger-right" data-panel-target="#filters"></div>
      <?php print $content['center']; ?>
    </div>
  <?php endif; ?>
  <?php if(!empty($content['right'])): ?>
    <div id="filters" class="section columns two">
      <?php print $content['right']; ?>
    </div>
  <?php endif; ?>
</div>