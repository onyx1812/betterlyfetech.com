<?php
get_header();
while ( have_posts() ) : the_post(); ?>

<section class="content content--single">
	<div class="container">
		<?php the_content(); ?>
	</div>
</section>

<?php
endwhile;
get_footer();