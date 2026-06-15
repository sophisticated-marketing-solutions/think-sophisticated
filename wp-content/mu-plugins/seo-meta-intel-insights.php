<?php
/**
 * Plugin Name: SEO Meta – Intel Insights
 * Description: Injects title and meta description for the /intel-insights/ page via Yoast SEO filters.
 */

add_filter( 'wpseo_title', 'seo_meta_intel_insights_title', 10, 2 );
add_filter( 'wpseo_metadesc', 'seo_meta_intel_insights_desc', 10, 2 );

function seo_meta_intel_insights_title( $title, $presentation ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( get_queried_object() instanceof WP_Post && 'intel-insights' === get_queried_object()->post_name ) {
		return 'Intel & Insights | Phoenix PPC, SEO & AI Marketing Tips';
	}
	return $title;
}

function seo_meta_intel_insights_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( get_queried_object() instanceof WP_Post && 'intel-insights' === get_queried_object()->post_name ) {
		return 'Explore expert insights on PPC, SEO, Google Ads, and AI marketing strategies from Think Sophisticated — Phoenix\'s digital marketing agency.';
	}
	return $desc;
}
