<?php
/**
 * Plugin Name: SEO Meta – Benefits of Google Business Profile
 * Description: Injects meta description and OG description for the benefits-of-google-business-profile page via Yoast SEO filters.
 */

add_filter( 'wpseo_metadesc', 'seo_gbp_benefits_metadesc', 10, 2 );
add_filter( 'wpseo_opengraph_desc', 'seo_gbp_benefits_og_desc', 10, 2 );

function seo_gbp_benefits_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'benefits-of-google-business-profile' === get_queried_object()->post_name;
}

function seo_gbp_benefits_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_gbp_benefits_slug_matches() ) {
		return $desc;
	}
	return 'Discover the top 10 benefits of Google Business Profile and how Think Sophisticated\'s management services help local businesses get found, build trust, and grow.';
}

function seo_gbp_benefits_og_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_gbp_benefits_slug_matches() ) {
		return $desc;
	}
	return 'Discover the top 10 benefits of Google Business Profile and how Think Sophisticated\'s management services help local businesses grow.';
}
