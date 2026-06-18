<?php
/**
 * Plugin Name: SEO Meta – Google Ads Management
 * Description: Injects title, meta description, canonical, and viewport for the google-ads-management page via Yoast SEO filters.
 */

add_filter( 'wpseo_title',    'seo_google_ads_mgmt_title',     10, 1 );
add_filter( 'wpseo_metadesc', 'seo_google_ads_mgmt_metadesc',  10, 2 );
add_filter( 'wpseo_canonical', 'seo_google_ads_mgmt_canonical', 10, 1 );
add_action( 'wp_head',        'seo_google_ads_mgmt_viewport',  1 );

function seo_google_ads_mgmt_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'google-ads-management' === get_queried_object()->post_name;
}

function seo_google_ads_mgmt_title( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! seo_google_ads_mgmt_slug_matches() ) {
		return $title;
	}
	return 'Google Ads Management Phoenix | Think Sophisticated';
}

function seo_google_ads_mgmt_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_google_ads_mgmt_slug_matches() ) {
		return $desc;
	}
	return 'Phoenix Google Ads management that cuts wasted spend and scales conversions. Certified PPC experts. Free audit — call (602) 688-4479 today.';
}

function seo_google_ads_mgmt_canonical( $canonical ) {
	if ( ! seo_google_ads_mgmt_slug_matches() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/google-ads-management/';
}

function seo_google_ads_mgmt_viewport() {
	if ( ! seo_google_ads_mgmt_slug_matches() ) {
		return;
	}
	// Only inject if the theme does not already output a viewport meta tag.
	if ( current_theme_supports( 'html5' ) ) {
		return;
	}
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n";
}
