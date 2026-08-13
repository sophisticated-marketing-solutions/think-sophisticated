<?php
/**
 * Plugin Name: SEO Fix – /es/ Viewport Meta
 * Description: Ensures viewport and robots meta tags are present on the /es/ page.
 */

function seo_fix_es_is_target() {
	return get_queried_object() instanceof WP_Post
		&& 'es' === get_queried_object()->post_name;
}

add_filter( 'generate_meta_viewport', 'seo_fix_es_viewport', 999 );
function seo_fix_es_viewport( $tag ) {
	if ( seo_fix_es_is_target() ) {
		return '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
	}
	return $tag;
}

add_action( 'wp_head', 'seo_fix_es_robots', 1 );
function seo_fix_es_robots() {
	if ( ! is_singular() || ! seo_fix_es_is_target() ) {
		return;
	}
	echo '<meta name="robots" content="index, follow">' . "\n";
}
