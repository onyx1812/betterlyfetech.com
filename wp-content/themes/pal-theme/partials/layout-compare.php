<section class="compare">
  <table width="100%">
    <thead style="
      background-color: <?php echo get_sub_field('head_bg'); ?>;
      color: <?php echo get_sub_field('head_color'); ?>;
    ">
      <tr>
        <th>
          <img src="<?php echo get_sub_field('title_left_image'); ?>" alt="" width="120px">
          <?php echo get_sub_field('title_left'); ?>
        </th>
        <th><?php echo get_sub_field('title_right'); ?></th>
      </tr>
    </thead>
    <tbody>
    <?php if( have_rows('items') ): ?>
      <?php while ( have_rows('items') ) : the_row(); ?>
        <tr>
          <td><?php echo get_sub_field('left_item'); ?></td>
          <td><?php echo get_sub_field('right_item'); ?></td>
        </tr>
      <?php endwhile; ?>
    <?php endif; ?>
    </tbody>
  </table>
</section>
<link rel="stylesheet" href="<?php CSS(); ?>/v1/layout-compare.css">