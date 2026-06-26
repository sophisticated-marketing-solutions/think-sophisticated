<?php
/**
 * Plugin Name: SEO Meta – Benefits of Targeted PPC Advertising Campaigns
 * Description: Injects title and meta description for the benefits-of-targeted-ppc-advertising-campaigns page via Yoast SEO filters.
 */

add_filter( 'wpseo_title',    'ts_seo_targeted_ppc_title',    10, 1 );
add_filter( 'wpseo_metadesc', 'ts_seo_targeted_ppc_metadesc', 10, 2 );

function ts_seo_targeted_ppc_slug_matches() {
	return get_queried_object() instanceof WP_Post
		&& 'benefits-of-targeted-ppc-advertising-campaigns' === get_queried_object()->post_name;
}

function ts_seo_targeted_ppc_title( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! ts_seo_targeted_ppc_slug_matches() ) {
		return $title;
	}
	return 'Targeted PPC Advertising: 7 Key Benefits | Think Sophisticated';
}

function ts_seo_targeted_ppc_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! ts_seo_targeted_ppc_slug_matches() ) {
		return $desc;
	}
	return 'Discover the top benefits of targeted PPC advertising campaigns — from immediate traffic and high ROI to precise audience targeting and real-time analytics.';
}
