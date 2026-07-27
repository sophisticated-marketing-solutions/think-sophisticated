<?php
/**
 * Plugin Name: SEO Meta – Common Mistakes Made with Directory Listings
 * Description: Injects title, meta description, viewport, and H1 for the common-mistakes-made-with-directory-listings page via Yoast SEO filters.
 */

add_filter( 'wpseo_title',    'seo_dir_mistakes_title',    10, 1 );
add_filter( 'wpseo_metadesc', 'seo_dir_mistakes_metadesc', 10, 2 );
add_filter( 'the_content',    'seo_dir_mistakes_h1',       1 );
add_action( 'wp_head',        'seo_dir_mistakes_viewport', 1 );

function seo_dir_mistakes_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'common-mistakes-made-with-directory-listings' === get_queried_object()->post_name;
}

function seo_dir_mistakes_title( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! seo_dir_mistakes_slug_matches() ) {
		return $title;
	}
	return 'Directory Listing Mistakes to Avoid | Think Sophisticated';
}

function seo_dir_mistakes_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_dir_mistakes_slug_matches() ) {
		return $desc;
	}
	return 'Avoid costly directory listing mistakes: duplicate entries, outdated info, and ignored reviews. See how Think Sophisticated helps businesses fix them.';
}

function seo_dir_mistakes_viewport() {
	if ( ! seo_dir_mistakes_slug_matches() ) {
		return;
	}
	// Only inject if the theme does not already output a viewport meta tag.
	if ( current_theme_supports( 'html5' ) ) {
		return;
	}
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n";
}

function seo_dir_mistakes_h1( $content ) {
	if ( ! is_singular() || ! seo_dir_mistakes_slug_matches() ) {
		return $content;
	}
	$content = preg_replace(
		'/<h1([^>]*)>Avoid These Costly Errors in Online Business Listings<\/h1>/i',
		'<h1$1>Common Directory Listing Mistakes That Hurt Your Business (And How to Fix Them)<\/h1>',
		$content
	);
	return $content;
}
