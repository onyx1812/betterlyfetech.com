<div id="preloader" class="preloader hide">
  <div class="preloader-inner">
    <ul>
      <li class="active">&nbsp;</li>
      <?php $i=0; while ( have_rows('preloader_items') ) : the_row(); $i++; ?>
        <li><?php echo get_sub_field('text'); ?></li>
      <?php endwhile; ?>
    </ul>
    <progress max="75" value="0" id="preloaderProgress"></progress>
  </div>
</div>
<link rel="stylesheet" href="<?php CSS(); ?>/v1/layout-preloader.css">
<style>
  .preloader progress[value]::-webkit-progress-value {
    background: <?php the_field('preloader_color'); ?> !important;
  }
</style>