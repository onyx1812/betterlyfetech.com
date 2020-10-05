<?php

/* ----- Disable the emoji's ----- */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
/* ----- Remove jQuery migrate ----- */
if ( ! function_exists( 'twf_remove_jquery_migrate' ) ) {
	function twf_remove_jquery_migrate( $scripts ) {
		if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
			$script = $scripts->registered['jquery'];
			if ( $script->deps ) {
				$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
			}
		}
	}
	add_action( 'wp_default_scripts', 'twf_remove_jquery_migrate' );
}

add_action( 'wp_footer', 'my_deregister_scripts' );
function my_deregister_scripts(){
	wp_deregister_script( 'wp-embed' );
}


add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
	wp_dequeue_style( 'wp-block-library-css' );
	wp_deregister_style( 'wp-block-library-css' );
}

add_action( 'wp_print_styles', 'my_deregister_styles_and_scripts', 100 );
function my_deregister_styles_and_scripts() {
	wp_dequeue_style('wp-block-library');
}