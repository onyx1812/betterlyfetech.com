<div class="sticky" style="
  border-color: <?php echo get_sub_field('box_border_color'); ?>;
  background-color: <?php echo get_sub_field('box_bg'); ?>;
  border-radius: <?php echo get_sub_field('box_radius'); ?>px;
  overflow: hidden;
">
  <a href="" class="link-wrap" data-url>
	  <?php if( get_sub_field('sticky_title') ): ?>
	  <h5><?php echo get_sub_field('sticky_title'); ?></h5>
	  <?php endif; ?>
	  <img src="<?php echo get_sub_field('sticky_image'); ?>" alt="" width="100%">
	  <div class="link" style="
		color: <?php echo get_sub_field('sticky_btn_color'); ?>;
		background-color: <?php echo get_sub_field('sticky_btn_bg'); ?>;
		border-color: <?php echo get_sub_field('sticky_btn_border'); ?>;
		font-size: <?php echo get_sub_field('sticky_btn_size'); ?>px;
		text-transform: <?php echo get_sub_field('sticky_btn_tt'); ?>;
	  "><?php echo get_sub_field('sticky_btn_txt'); ?></div>
  </a>
</div>
<link rel="stylesheet" href="<?php CSS(); ?>/v1/layout-sticky.css">