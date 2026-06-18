<?php
/**
 * Plugin Name: SEO Meta – How to Market Your First Book
 * Description: Injects title, meta description, canonical, and H1 for the how-to-market-your-first-book page via Yoast SEO filters.
 */

define( 'SEO_HMYFB_SLUG', 'how-to-market-your-first-book' );

add_filter( 'wpseo_title',     'seo_hmyfb_title',     10, 2 );
add_filter( 'wpseo_metadesc',  'seo_hmyfb_metadesc',  10, 2 );
add_filter( 'wpseo_canonical', 'seo_hmyfb_canonical', 10, 2 );
add_filter( 'the_content',     'seo_hmyfb_h1',        1 );

function seo_hmyfb_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_HMYFB_SLUG === get_queried_object()->post_name;
}

function seo_hmyfb_title( $title, $presentation ) {
	if ( ! seo_hmyfb_is_target() ) {
		return $title;
	}
	return 'How to Market Your First Book — Complete Guide';
}

function seo_hmyfb_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_hmyfb_is_target() ) {
		return $desc;
	}
	return 'Learn how to market your first book with proven strategies covering audience targeting, marketing channels, budget planning, and launch tactics.';
}

function seo_hmyfb_canonical( $canonical, $presentation ) {
	if ( ! seo_hmyfb_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/how-to-market-your-first-book/';
}

function seo_hmyfb_h1( $content ) {
	if ( ! is_singular() || ! seo_hmyfb_is_target() ) {
		return $content;
	}
	// Promote existing H2 to H3 so there is only one H1.
	$content = preg_replace(
		'/<h2([^>]*)>How to Market Your First Book: Complete Guide<\/h2>/i',
		'<h3$1>How to Market Your First Book: Complete Guide</h3>',
		$content
	);
	return '<h1>How to Market Your First Book: Complete Guide</h1>' . $content;
}
