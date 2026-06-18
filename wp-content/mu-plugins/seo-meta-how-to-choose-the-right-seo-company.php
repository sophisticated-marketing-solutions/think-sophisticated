<?php
/**
 * Plugin Name: SEO Meta – How to Choose the Right SEO Company
 * Description: Injects title, meta description, viewport, and H1 for the how-to-choose-the-right-seo-company page via Yoast SEO filters.
 */

add_filter( 'wpseo_title',    'seo_choose_seo_co_title',    10, 1 );
add_filter( 'wpseo_metadesc', 'seo_choose_seo_co_metadesc', 10, 2 );
add_filter( 'the_content',    'seo_choose_seo_co_h1',       1 );
add_action( 'wp_head',        'seo_choose_seo_co_viewport', 1 );

function seo_choose_seo_co_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'how-to-choose-the-right-seo-company' === get_queried_object()->post_name;
}

function seo_choose_seo_co_title( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! seo_choose_seo_co_slug_matches() ) {
		return $title;
	}
	return 'How to Choose the Right SEO Company | Sophisticated Marketing';
}

function seo_choose_seo_co_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_choose_seo_co_slug_matches() ) {
		return $desc;
	}
	return 'Learn how to choose the right SEO company for your business. Sophisticated Marketing Solutions helps Phoenix businesses grow with proven local SEO strategies.';
}

function seo_choose_seo_co_viewport() {
	if ( ! seo_choose_seo_co_slug_matches() ) {
		return;
	}
	// Only inject if the theme does not already output a viewport meta tag.
	if ( current_theme_supports( 'html5' ) ) {
		return;
	}
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n";
}

function seo_choose_seo_co_h1( $content ) {
	if ( ! is_singular() || ! seo_choose_seo_co_slug_matches() ) {
		return $content;
	}
	$content = preg_replace(
		'/<h1([^>]*)>Finding a Reliable Team to Grow Your Search Rankings<\/h1>/i',
		'<h1$1>How to Choose the Right SEO Company for Your Business<\/h1>',
		$content
	);
	return $content;
}
