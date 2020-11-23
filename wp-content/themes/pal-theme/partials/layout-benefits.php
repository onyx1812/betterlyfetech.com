<section class="benefits">
  <img src="<?php echo get_sub_field('image'); ?>" alt="" width="100%">
  <?php if( have_rows('items') ): ?>
    <ul>
    <?php while ( have_rows('items') ) : the_row(); ?>
      <li>
        <img src="<?php echo get_sub_field('img'); ?>" alt="">
        <span><?php echo get_sub_field('text'); ?></span>
      </li>
    <?php endwhile; ?>
    </ul>
  <?php endif; ?>
  <h3><?php echo get_sub_field('title'); ?></h3>
  <?php echo get_sub_field('text'); ?>
  <?php if( get_sub_field('btn_txt') ): ?>
  <?php if( get_the_ID() == 1875 ): ?>
  <a href="https://www.bls29trk.com/69PDQW/3MZNPR/" class="btn"
  <?php elseif( in_array(get_the_ID(), array(1910, 1972, 1974, 1908, 1592, 1140, 1609)) ): ?>
  <a href="https://sakmtracker.com/click" class="btn"
  <?php else: ?>
  <a href="https://savingsscanner.org/click" class="btn"
  <?php endif; ?>
  style="
    background-color: <?php echo get_sub_field('btn_bg'); ?>;
    border-color: <?php echo get_sub_field('btn_brd'); ?>;
    color: <?php echo get_sub_field('btn_color'); ?>;
  " >
    <?php echo get_sub_field('btn_txt'); ?>
  </a>
<?php endif; ?>
</section>
<link rel="stylesheet" href="<?php CSS(); ?>/v1/layout-benefits.css">