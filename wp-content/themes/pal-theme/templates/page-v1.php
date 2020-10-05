<?php
/*
 * Template Name: Version 1
 */
get_header();
  while ( have_posts() ) : the_post();
?>

<section class="content content--page">
  <div class="container">
    <div class="row">
      <div class="<?php the_field('layout_size'); ?>">
        <?php
        if( have_rows('blocks') ):
          while ( have_rows('blocks') ) : the_row();

            if( get_row_layout() == 'editor' ):
              get_template_part( 'partials/layout', 'editor' );

            elseif( get_row_layout() == 'image' ):
              get_template_part( 'partials/layout', 'image' );

            elseif( get_row_layout() == 'images' ):
              get_template_part( 'partials/layout', 'images' );

            elseif( get_row_layout() == 'slider' ):
              get_template_part( 'partials/layout', 'slider' );

            elseif( get_row_layout() == 'heading_1' ):
              get_template_part( 'partials/layout', 'heading_1' );

            elseif( get_row_layout() == 'heading_2' ):
              get_template_part( 'partials/layout', 'heading_2' );

            elseif( get_row_layout() == 'heading_3' ):
              get_template_part( 'partials/layout', 'heading_3' );

            elseif( get_row_layout() == 'benefits' ):
              get_template_part( 'partials/layout', 'benefits' );

            elseif( get_row_layout() == 'compare' ):
              get_template_part( 'partials/layout', 'compare' );

            elseif( get_row_layout() == 'testimonials' ):
              get_template_part( 'partials/layout', 'testimonials' );

            elseif( get_row_layout() == 'note' ):
              get_template_part( 'partials/layout', 'note' );

            elseif( get_row_layout() == 'product' ):
              get_template_part( 'partials/layout', 'product' );

            elseif( get_row_layout() == 'comment' ):
              get_template_part( 'partials/layout', 'comment' );

            elseif( get_row_layout() == 'button' ):
              get_template_part( 'partials/layout', 'button' );

            elseif( get_row_layout() == 'fb_testimonials' ):
              get_template_part( 'partials/layout', 'fb_testimonials' );

            endif;

          endwhile;
        else :
          echo 'Error some problems';
        endif;
        ?>
      </div>
      <div class="<?php if( get_field('layout_size') === 'col-md-9' ): echo 'col-md-3'; elseif( get_field('layout_size') === 'col-md-8' ): echo 'col-md-4'; elseif( get_field('layout_size') === 'col-md-7' ): echo 'col-md-5'; elseif( get_field('layout_size') === 'col-12' ): echo 'hide'; endif; ?>">
        <div class="sidebar"
          <?php if( get_field('sidebar_sticky') ): ?>
            style="position: sticky; top: 15px;"
          <?php endif; ?>
        >
          <?php
          if( have_rows('blocks_sidebar') ):
            while ( have_rows('blocks_sidebar') ) : the_row();

              if( get_row_layout() == 'image' ):
                get_template_part( 'partials/layout', 'image' );

              elseif( get_row_layout() == 'sticky' ):
                get_template_part( 'partials/layout', 'sticky' );

              elseif( get_row_layout() == 'testimonials' ):
                get_template_part( 'partials/layout', 'testimonials_sidebar' );

              elseif( get_row_layout() == 'heading_4' ):
                get_template_part( 'partials/layout', 'heading_4' );

              elseif( get_row_layout() == 'editor' ):
                get_template_part( 'partials/layout', 'editor' );

              endif;

            endwhile;
          endif;
          ?>
        </div>
      </div>
  </div>
</section>

<?php get_template_part( 'partials/page', 'options' ); ?>

<script>
const
  MonthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
  dataDates = document.querySelectorAll("[data-date]");

dataDates.forEach(dataDate => {
  const
    date = new Date(),
    newDate = new Date( date.setDate(date.getDate() + Number(dataDate.dataset.date)) ),
    month = MonthNames[newDate.getMonth()],
    day = Number(newDate.getDate()),
    year = newDate.getFullYear();
  dataDate.innerHTML = `${month} ${day}, ${year}`;
});
</script>

<?php
  endwhile;
get_footer();