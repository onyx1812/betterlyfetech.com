<?php
/*
 * Template Name: Main
 */
get_header();
while ( have_posts() ) : the_post(); ?>

<script>
	//window.history.back();
</script>

<?php
endwhile;
get_footer();