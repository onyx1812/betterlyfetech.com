<?php if( have_rows('testimonials') ): ?>
<section class="testimonials testimonials-sidebar">
  <div class="row">
  <?php while ( have_rows('testimonials') ) : the_row(); ?>
    <div class="col-12">
      <div class="testimonials-inner">
        <img src="<?php echo get_sub_field('image'); ?>" alt="" width="100%">
        <div class="testimonials-text"><?php echo get_sub_field('text'); ?></div>
        <h4><?php echo get_sub_field('name'); ?></h4>
        <ul class="star-rating">
          <li class="star-f"></li>
          <li class="star-f"></li>
          <li class="star-f"></li>
          <li class="star-f"></li>
          <li class="star-f"></li>
        </ul>
      </div>
    </div>
  <?php endwhile; ?>
  </div>
</section>
<link rel="stylesheet" href="<?php CSS(); ?>/v1/layout-testimonials.css">
<?php endif; ?>