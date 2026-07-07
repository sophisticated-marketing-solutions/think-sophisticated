<?php
/**
 * Plugin Name: SEO Meta – Google Ads 2022 Preview
 * Description: Injects title, meta description, and canonical for the google-ads-2022-preview post via Yoast SEO filters.
 */

define( 'SEO_GOOGLE_ADS_2022_SLUG', 'google-ads-2022-preview' );

add_filter( 'wpseo_title',     'seo_meta_google_ads_2022_title',     10, 2 );
add_filter( 'wpseo_metadesc',  'seo_meta_google_ads_2022_desc',      10, 2 );
add_filter( 'wpseo_canonical', 'seo_meta_google_ads_2022_canonical', 10, 2 );

function seo_meta_google_ads_2022_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_GOOGLE_ADS_2022_SLUG === get_queried_object()->post_name;
}

function seo_meta_google_ads_2022_title( $title, $presentation ) {
	if ( ! seo_meta_google_ads_2022_is_target() ) {
		return $title;
	}
	return 'Google Ads in 2022: What You Need to Know | Sophisticated Marketing';
}

function seo_meta_google_ads_2022_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_google_ads_2022_is_target() ) {
		return $desc;
	}
	return 'Discover the key Google Ads changes in 2022 — automation updates, privacy shifts, responsive ads, and new audiences. Expert insights from Sophisticated Marketing Solutions.';
}

function seo_meta_google_ads_2022_canonical( $canonical, $presentation ) {
	if ( ! seo_meta_google_ads_2022_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/google-ads-2022-preview/';
}
