<?php
/**
 * Plugin Name: SEO Fix – Google Ads 2022 Preview Viewport
 * Description: Injects missing viewport meta tag for /google-ads-2022-preview/ page.
 */

define( 'SEO_FIX_GA2022_SLUG', 'google-ads-2022-preview' );

function seo_fix_ga2022_is_target() {
	return is_singular()
		&& get_queried_object() instanceof WP_Post
		&& SEO_FIX_GA2022_SLUG === get_queried_object()->post_name;
}

// GeneratePress theme: ensure the viewport tag is output for this page.
add_filter( 'generate_meta_viewport', 'seo_fix_ga2022_gp_viewport', 999 );
function seo_fix_ga2022_gp_viewport( $tag ) {
	if ( seo_fix_ga2022_is_target() ) {
		return '<meta name="viewport" content="width=device-width, initial-scale=1">';
	}
	return $tag;
}

// Hello Elementor theme: ensure the viewport content value is set.
add_filter( 'hello_elementor_viewport_content', 'seo_fix_ga2022_he_viewport', 999 );
function seo_fix_ga2022_he_viewport( $content ) {
	if ( seo_fix_ga2022_is_target() ) {
		return 'width=device-width, initial-scale=1';
	}
	return $content;
}
