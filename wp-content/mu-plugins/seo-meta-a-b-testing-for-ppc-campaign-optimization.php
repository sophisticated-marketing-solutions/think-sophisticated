<?php
/**
 * Plugin Name: SEO Meta – A/B Testing for PPC Campaign Optimization
 * Description: Injects title and meta description for the a-b-testing-for-ppc-campaign-optimization page via Yoast SEO filters.
 */

add_filter( 'wpseo_title',    'seo_ab_testing_ppc_title',    10, 1 );
add_filter( 'wpseo_metadesc', 'seo_ab_testing_ppc_metadesc', 10, 2 );

function seo_ab_testing_ppc_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'a-b-testing-for-ppc-campaign-optimization' === get_queried_object()->post_name;
}

function seo_ab_testing_ppc_title( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! seo_ab_testing_ppc_slug_matches() ) {
		return $title;
	}
	return 'A/B Testing for PPC Campaign Optimization | Think Sophisticated';
}

function seo_ab_testing_ppc_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_ab_testing_ppc_slug_matches() ) {
		return $desc;
	}
	return 'Learn proven A/B testing strategies for PPC campaign optimization. Split test ads, landing pages & bids to maximize ROI. Guidance from Think Sophisticated.';
}
