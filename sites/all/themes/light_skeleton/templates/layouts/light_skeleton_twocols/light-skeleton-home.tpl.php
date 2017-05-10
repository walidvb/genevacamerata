<div id="home-panels" class="row">
  <?php if(!empty($content['left'])): ?>
    <div class="section left columns eight">
      <?php print $content['left']; ?>
    </div>
  <?php endif; ?>
  <?php if(!empty($content['center'])): ?>
    <div class="section center columns six">
      <?php print $content['center']; ?>
    </div>
  <?php endif; ?>
  <?php if(!empty($content['right'])): ?>
    <div class="trigger trigger-right" data-panel-target="#filters"></div>
    <div id="filters" class="section right columns two">
      <?php print $content['right']; ?>
    </div>
  <?php endif; ?>
</div>