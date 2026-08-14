<?php
/**
 * Plugin Name: SEO Fix – SEO Trends in 2024 H1
 * Description: Adds a missing H1 and fixes the broken heading hierarchy on the /seo-trends-in-2024/ page.
 */

define( 'SEO_FIX_TRENDS_SLUG', 'seo-trends-in-2024' );

add_filter( 'the_content', 'seo_fix_trends_content', 5 );

function seo_fix_trends_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_FIX_TRENDS_SLUG === get_queried_object()->post_name;
}

function seo_fix_trends_content( $content ) {
	if ( ! is_singular() || ! seo_fix_trends_is_target() ) {
		return $content;
	}

	// Prepend the missing H1 so there is exactly one H1 on the page.
	$h1      = '<h1>SEO Trends in 2024: Key Shifts Every Business Should Know</h1>';
	$content = $h1 . $content;

	// Demote "Increased AI Integration" from H2 to H3 to fix the heading hierarchy.
	$content = preg_replace(
		'#<h2(\s[^>]*)?>Increased AI Integration</h2>#i',
		'<h3$1>Increased AI Integration</h3>',
		$content
	);

	return $content;
}
