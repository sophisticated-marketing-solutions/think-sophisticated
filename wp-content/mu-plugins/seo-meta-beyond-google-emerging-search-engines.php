<?php
/**
 * Plugin Name: SEO Meta – Beyond Google Emerging Search Engines
 * Description: Injects canonical and noindex for the beyond-google-the-seo-impact-of-emerging-search-engines post via Yoast SEO filters.
 */

define( 'SEO_BEYOND_GOOGLE_SLUG', 'beyond-google-the-seo-impact-of-emerging-search-engines' );

add_filter( 'wpseo_canonical', 'seo_beyond_google_canonical', 10, 2 );
add_filter( 'wpseo_robots', 'seo_beyond_google_robots', 10, 2 );

function seo_beyond_google_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_BEYOND_GOOGLE_SLUG === get_queried_object()->post_name;
}

function seo_beyond_google_canonical( $canonical, $presentation ) {
	if ( ! seo_beyond_google_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/beyond-google-the-seo-impact-of-emerging-search-engines/';
}

function seo_beyond_google_robots( $robots, $presentation ) {
	if ( ! seo_beyond_google_is_target() ) {
		return $robots;
	}
	return 'noindex, follow';
}
