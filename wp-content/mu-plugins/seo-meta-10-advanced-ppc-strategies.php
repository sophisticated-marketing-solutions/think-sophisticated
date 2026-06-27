<?php
/**
 * Plugin Name: SEO Meta – 10 Advanced PPC Strategies
 * Description: Injects title, meta description, and canonical for the 10-advanced-ppc-strategies page via Yoast SEO filters.
 */

define( 'SEO_10_ADVANCED_PPC_SLUG', '10-advanced-ppc-strategies' );

add_filter( 'wpseo_title',     'seo_10_advanced_ppc_title',     10, 2 );
add_filter( 'wpseo_metadesc',  'seo_10_advanced_ppc_metadesc',  10, 2 );
add_filter( 'wpseo_canonical', 'seo_10_advanced_ppc_canonical', 10, 2 );

function seo_10_advanced_ppc_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_10_ADVANCED_PPC_SLUG === get_queried_object()->post_name;
}

function seo_10_advanced_ppc_title( $title, $presentation = null ) {
	if ( ! seo_10_advanced_ppc_is_target() ) {
		return $title;
	}
	return '10 Advanced PPC Strategies to Maximize Ad ROI | Think Sophisticated';
}

function seo_10_advanced_ppc_metadesc( $desc, $presentation = null ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_10_advanced_ppc_is_target() ) {
		return $desc;
	}
	return 'Discover 10 pro-level PPC tactics including AI bidding, dynamic remarketing, and first-party data strategies to cut CPA and scale conversions.';
}

function seo_10_advanced_ppc_canonical( $canonical, $presentation = null ) {
	if ( ! seo_10_advanced_ppc_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/10-advanced-ppc-strategies/';
}
