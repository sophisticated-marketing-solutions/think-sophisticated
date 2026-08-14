<?php
/**
 * Plugin Name: SEO Fix – Does Blogging Still Work for SEO
 * Description: Adds H1, structured H2 hierarchy, and title tag for /does-blogging-still-work-for-seo/ page.
 */

define( 'SEO_FIX_BLOGGING_SLUG', 'does-blogging-still-work-for-seo' );

add_filter( 'the_content', 'seo_fix_blogging_content', 5 );
add_filter( 'wpseo_title', 'seo_fix_blogging_title', 10, 2 );

function seo_fix_blogging_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_FIX_BLOGGING_SLUG === get_queried_object()->post_name;
}

function seo_fix_blogging_content( $content ) {
	if ( ! is_singular() || ! seo_fix_blogging_is_target() ) {
		return $content;
	}

	$h1 = '<h1>Does Blogging Still Work for SEO in 2025? (Yes — Here\'s Why)</h1>';

	$h2s = '<h2>How Blogging Drives Organic Traffic in 2025</h2>'
		. '<h2>The Role of Blog Content in Modern SEO Strategy</h2>'
		. '<h2>Common Blogging Mistakes That Hurt SEO</h2>'
		. '<h2>How to Make Your Blog Work Harder for Search Rankings</h2>';

	return $h1 . $content . $h2s;
}

function seo_fix_blogging_title( $title, $presentation ) {
	if ( ! seo_fix_blogging_is_target() ) {
		return $title;
	}
	return 'Does Blogging Still Work for SEO? | Think Sophisticated';
}
