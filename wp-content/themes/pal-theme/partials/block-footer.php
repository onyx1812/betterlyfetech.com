<footer class="main-footer" style="
  background-color: <?php the_field('footer_bg'); ?>;
  color: <?php the_field('footer_color'); ?>;
">
  <div class="container">
    <img src="<?php the_field('footer_logo'); ?>" alt="" width="100px">
    <?php if( have_rows('footer_menu') ): ?>
      <ul class="footer-menu">
        <?php while ( have_rows('footer_menu') ) : the_row(); ?>
          <li data-popup="popup_<?php echo get_row_index(); ?>"><?php echo get_sub_field('item'); ?></li>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
    <small><?php the_field('footer_copyright'); ?></small>
    <div class="footer-editor"><?php the_field('footer_content'); ?></div>
    <style>.footer-editor p{font-size: 13px;}</style>
  </div>
</footer>


<?php if( have_rows('footer_menu') ): ?>
  <?php while ( have_rows('footer_menu') ) : the_row(); ?>
    <template id="popup_<?php echo get_row_index(); ?>"><?php echo get_sub_field('content'); ?></template>
  <?php endwhile; ?>
  <?php get_template_part( 'partials/block', 'popup' ); ?>
<?php endif; ?>