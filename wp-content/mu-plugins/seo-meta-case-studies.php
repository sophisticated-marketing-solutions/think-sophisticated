<?php
/**
 * Plugin Name: SEO Meta – Case Studies
 * Description: Injects title, meta description, and canonical for the /case-studies/ page via Yoast SEO filters.
 */

define( 'SEO_CASE_STUDIES_SLUG', 'case-studies' );

add_filter( 'wpseo_title', 'seo_meta_case_studies_title', 10, 2 );
add_filter( 'wpseo_metadesc', 'seo_meta_case_studies_desc', 10, 2 );
add_filter( 'wpseo_canonical', 'seo_meta_case_studies_canonical', 10, 2 );

function seo_meta_case_studies_is_target() {
	return ( get_queried_object() instanceof WP_Post && SEO_CASE_STUDIES_SLUG === get_queried_object()->post_name )
		|| is_page( SEO_CASE_STUDIES_SLUG );
}

function seo_meta_case_studies_title( $title, $presentation ) {
	if ( ! seo_meta_case_studies_is_target() ) {
		return $title;
	}
	return 'Case Studies | Sophisticated Marketing Solutions Phoenix';
}

function seo_meta_case_studies_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_case_studies_is_target() ) {
		return $desc;
	}
	return 'Explore real-world case studies from Sophisticated Marketing Solutions. See how our Phoenix marketing strategies drive measurable ROI for local businesses.';
}

function seo_meta_case_studies_canonical( $canonical, $presentation ) {
	if ( ! seo_meta_case_studies_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/case-studies/';
}
