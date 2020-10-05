<?php if( get_field('advertorial') ): ?>
<div class="adv" style="
  <?php if( get_field('page_progress') ): ?> margin-top: 16px; <?php endif; ?>
">ADVERTORIAL</div>
<style>
.adv{
  display: block;
  width: 100%;
  background: #999;
  text-align: center;
  font-size: 12px;
  color: #fff;
  padding: 2px 0;
}
</style>

<?php endif; ?>
<header class="main-header" style="
  <?php if( get_field('header_bg') ): ?> background-color: <?php the_field('header_bg'); ?>; <?php endif; ?>
  <?php if( get_field('header_brd') ): ?> border-bottom-color: <?php the_field('header_brd'); ?>; <?php endif; ?>
  <?php if( get_field('header_brd_width') ): ?> border-bottom-width: <?php the_field('header_brd_width'); ?>px; <?php endif; ?>
  <?php if( get_field('header_brd_style') ): ?> border-bottom-style: <?php the_field('header_brd_style'); ?>; <?php endif; ?>
">
  <div class="container">
    <?php if( get_field('header_logo') ): ?>
      <img src="<?php the_field('header_logo'); ?>" alt="" height="50px" class="logo">
    <?php endif; ?>
  </div>
</header>