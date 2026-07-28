<?php
/**
 * Plugin Name: SEO Meta – Thank You Page
 * Description: Injects title, meta description, canonical, and noindex for the /thank-you/ page via Yoast SEO filters.
 */

add_filter( 'wpseo_title',        'seo_thank_you_title',     10, 1 );
add_filter( 'wpseo_metadesc',     'seo_thank_you_metadesc',  10, 2 );
add_filter( 'wpseo_canonical',    'seo_thank_you_canonical', 10, 2 );
add_filter( 'wpseo_robots_array', 'seo_thank_you_robots',    10, 2 );
add_action( 'wp_head',            'seo_thank_you_viewport',  1 );

function seo_thank_you_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'thank-you' === get_queried_object()->post_name;
}

function seo_thank_you_title( $title ) {
	if ( ! seo_thank_you_slug_matches() ) {
		return $title;
	}
	return 'Thank You | Think Sophisticated – Phoenix Marketing Agency';
}

function seo_thank_you_metadesc( $desc, $presentation ) {
	if ( ! seo_thank_you_slug_matches() ) {
		return $desc;
	}
	return 'Thank you for contacting Think Sophisticated, Phoenix\'s trusted marketing agency. We\'ll be in touch shortly to discuss your PPC, SEO, and growth strategy.';
}

function seo_thank_you_canonical( $canonical, $presentation ) {
	if ( ! seo_thank_you_slug_matches() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/thank-you/';
}

function seo_thank_you_robots( $robots, $presentation ) {
	if ( ! seo_thank_you_slug_matches() ) {
		return $robots;
	}
	$robots['index']  = 'noindex';
	$robots['follow'] = 'follow';
	return $robots;
}

function seo_thank_you_viewport() {
	if ( ! seo_thank_you_slug_matches() ) {
		return;
	}
	// Inject viewport only when the active header template omits it (e.g. header-min.php / blank canvas).
	global $wp_filters;
	if ( did_action( 'generate_minimal_header' ) ) {
		echo '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n";
	}
}
