<section class="about-mh">
	<div class="container">
		<h1><?php the_field('amh_title'); ?></h1>
		<h2><?php the_field('amh_subtitle'); ?></h2>
		<div class="row align-items__center">
			<div class="col-md-6">
				<video width="100%" muted webkit-playsinline playsinline autoplay loop >
					<?php if( isset($_GET["style"]) && $_GET["style"] == 'white' ): ?>
						<source src="<?php echo get_template_directory_uri(); ?>/video/about-mh__white.mp4" type="video/mp4" />
						<source src="<?php echo get_template_directory_uri(); ?>/video/about-mh__white.webm" type="video/webm" />
						<source src="<?php echo get_template_directory_uri(); ?>/video/about-mh__white.ogg" type="video/ogg" />
					<?php else: ?>
						<source src="<?php echo get_template_directory_uri(); ?>/video/about-mh.mp4" type="video/mp4" />
						<source src="<?php echo get_template_directory_uri(); ?>/video/about-mh.webm" type="video/webm" />
						<source src="<?php echo get_template_directory_uri(); ?>/video/about-mh.ogg" type="video/ogg" />
					<?php endif; ?>
				</video>
			</div>
			<div class="col-md-6">
				<p><?php the_field('amh_description'); ?></p>
				<button class="btn buyNow">BUY NOW</button>
			</div>
		</div>
		<p class="note"><?php the_field('amh_note'); ?></p>
		</div>
	</div>
</section>