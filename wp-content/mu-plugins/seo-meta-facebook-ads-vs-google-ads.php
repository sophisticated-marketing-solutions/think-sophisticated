<?php
/**
 * Plugin Name: SEO Meta – Facebook Ads vs Google Ads
 * Description: Injects title, meta description, and canonical for the facebook-ads-vs-google-ads page via Yoast SEO filters.
 */

define( 'SEO_FB_VS_GOOGLE_SLUG', 'facebook-ads-vs-google-ads' );

add_filter( 'wpseo_title',        'seo_fb_vs_google_title',     10, 1 );
add_filter( 'wpseo_metadesc',     'seo_fb_vs_google_metadesc',  10, 2 );
add_filter( 'wpseo_canonical',    'seo_fb_vs_google_canonical', 10, 1 );

function seo_fb_vs_google_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_FB_VS_GOOGLE_SLUG === get_queried_object()->post_name;
}

function seo_fb_vs_google_title( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! seo_fb_vs_google_is_target() ) {
		return $title;
	}
	return 'Facebook Ads vs Google Ads: Which Is Right for Your Business?';
}

function seo_fb_vs_google_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_fb_vs_google_is_target() ) {
		return $desc;
	}
	return 'Compare Facebook Ads vs Google Ads: targeting, costs & ROI. Discover which platform drives better results for your business goals. Expert PPC insights.';
}

function seo_fb_vs_google_canonical( $canonical ) {
	if ( ! seo_fb_vs_google_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/facebook-ads-vs-google-ads/';
}
