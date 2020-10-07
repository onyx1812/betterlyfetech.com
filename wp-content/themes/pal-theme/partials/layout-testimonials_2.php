<?php if( have_rows('testimonials') ): ?>
<section class="testimonials_2">
  <?php while ( have_rows('testimonials') ) : the_row(); ?>
    <div class="testimonials_2-inner">
      <div class="testimonials_2-img" style="background-image: url(<?php echo get_sub_field('image'); ?>);">
        <img src="<?php echo get_sub_field('image'); ?>" alt="" width="100%">
      </div>
      <div class="testimonials_2-info">
        <h4><?php echo get_sub_field('name'); ?></h4>
        <ul class="star-rating">
          <li class="star-f"></li>
          <li class="star-f"></li>
          <li class="star-f"></li>
          <li class="star-f"></li>
          <li class="star-f"></li>
        </ul>
        <h3><?php echo get_sub_field('title'); ?></h3>
        <div class="testimonials_2-text"><?php echo get_sub_field('text'); ?></div>
      </div>
    </div>
  <?php endwhile; ?>
</section>
<link rel="stylesheet" href="<?php CSS(); ?>/v1/layout-testimonials_2.css">
<?php endif; ?>