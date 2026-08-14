<?php
/**
 * Plugin Name: SEO Meta – Google Ad Updates September 2024
 * Description: Injects title, meta description, and canonical for the google-ad-updates-september-2024 post via Yoast SEO filters.
 */

define( 'SEO_GOOGLE_AD_UPDATES_SEP2024_SLUG', 'google-ad-updates-september-2024' );

add_filter( 'wpseo_title',     'seo_google_ad_updates_sep2024_title',     10, 1 );
add_filter( 'wpseo_metadesc',  'seo_google_ad_updates_sep2024_metadesc',  10, 2 );
add_filter( 'wpseo_canonical', 'seo_google_ad_updates_sep2024_canonical', 10, 2 );

function seo_google_ad_updates_sep2024_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_GOOGLE_AD_UPDATES_SEP2024_SLUG === get_queried_object()->post_name;
}

function seo_google_ad_updates_sep2024_title( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! seo_google_ad_updates_sep2024_is_target() ) {
		return $title;
	}
	return 'Google Ads Updates September 2024 | Think Sophisticated';
}

function seo_google_ad_updates_sep2024_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_google_ad_updates_sep2024_is_target() ) {
		return $desc;
	}
	return 'A complete breakdown of Google Ads updates in September 2024 — new features, policy changes, and what Phoenix advertisers need to know to stay competitive.';
}

function seo_google_ad_updates_sep2024_canonical( $canonical, $presentation ) {
	if ( ! seo_google_ad_updates_sep2024_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/google-ad-updates-september-2024/';
}
