<?php
/*
 * The template for displaying pages
 */
get_header();
while ( have_posts() ) : the_post(); ?>

<section class="content content--page">
	<div class="container">
		<?php the_field('content', false, false); ?>
	</div>
</section>

<?php
endwhile;
get_footer();