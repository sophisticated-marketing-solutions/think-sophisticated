<?php
/**
 * Plugin Name: SEO Meta – Senior Living Marketing Strategy
 * Description: Injects meta description and OG description for the senior-living-marketing-strategy page via Yoast SEO filters.
 */

define( 'SEO_SENIOR_LIVING_SLUG', 'senior-living-marketing-strategy' );

add_filter( 'wpseo_metadesc',      'seo_senior_living_metadesc',    10, 2 );
add_filter( 'wpseo_opengraph_desc', 'seo_senior_living_og_desc',    10, 2 );

function seo_senior_living_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_SENIOR_LIVING_SLUG === get_queried_object()->post_name;
}

function seo_senior_living_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_senior_living_is_target() ) {
		return $desc;
	}
	return 'Discover a proven senior living marketing strategy to boost occupancy and resident inquiries. Expert tactics from Think Sophisticated\'s senior care marketing team.';
}

function seo_senior_living_og_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_senior_living_is_target() ) {
		return $desc;
	}
	return 'Discover a proven senior living marketing strategy to boost occupancy and resident inquiries. Expert tactics from Think Sophisticated\'s senior care marketing team.';
}
