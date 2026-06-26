<?php
/**
 * Plugin Name: SEO Meta – Beyond Google Emerging Search Engines
 * Description: Injects title and meta description for the /beyond-google-the-seo-impact-of-emerging-search-engines/ post via Yoast SEO filters.
 */

define( 'SEO_BEYOND_GOOGLE_SLUG', 'beyond-google-the-seo-impact-of-emerging-search-engines' );

add_filter( 'wpseo_title', 'seo_meta_beyond_google_title', 10, 2 );
add_filter( 'wpseo_metadesc', 'seo_meta_beyond_google_desc', 10, 2 );

function seo_meta_beyond_google_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_BEYOND_GOOGLE_SLUG === get_queried_object()->post_name;
}

function seo_meta_beyond_google_title( $title, $presentation ) {
	if ( ! seo_meta_beyond_google_is_target() ) {
		return $title;
	}
	return 'Emerging Search Engines & Their SEO Impact | Think Sophisticated';
}

function seo_meta_beyond_google_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_beyond_google_is_target() ) {
		return $desc;
	}
	return 'Discover how emerging search engines like Bing, DuckDuckGo, and AI platforms are reshaping SEO strategy. Learn how to diversify beyond Google today.';
}
