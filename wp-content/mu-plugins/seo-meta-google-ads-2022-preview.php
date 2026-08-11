<?php
/**
 * Plugin Name: SEO Meta – Google Ads 2022 Preview
 * Description: Injects meta description and OG description for the google-ads-2022-preview post via Yoast SEO filters.
 */

add_filter( 'wpseo_metadesc', 'seo_meta_google_ads_2022_preview_desc', 10, 2 );
add_filter( 'wpseo_opengraph_desc', 'seo_meta_google_ads_2022_preview_og_desc', 10, 2 );

function seo_meta_google_ads_2022_preview_is_target() {
	return get_queried_object() instanceof WP_Post
		&& 'google-ads-2022-preview' === get_queried_object()->post_name;
}

function seo_meta_google_ads_2022_preview_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_google_ads_2022_preview_is_target() ) {
		return $desc;
	}
	return 'Discover the key Google Ads changes in 2022 — automation updates, privacy shifts, responsive ads, and new audiences — from Sophisticated Marketing Solutions.';
}

function seo_meta_google_ads_2022_preview_og_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_google_ads_2022_preview_is_target() ) {
		return $desc;
	}
	return 'Discover the key Google Ads changes in 2022 — automation updates, privacy shifts, responsive ads, and new audiences — from Sophisticated Marketing Solutions.';
}
