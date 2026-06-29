<?php
/**
 * Plugin Name: SEO Meta – 7 Major Benefits of PPC Advertising
 * Description: Injects title and meta description for the 7-major-benefits-of-ppc-advertising page via Yoast SEO filters.
 */

add_filter( 'wpseo_title',    'seo_7_major_benefits_ppc_title',    10, 1 );
add_filter( 'wpseo_metadesc', 'seo_7_major_benefits_ppc_metadesc', 10, 2 );

function seo_7_major_benefits_ppc_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return '7-major-benefits-of-ppc-advertising' === get_queried_object()->post_name;
}

function seo_7_major_benefits_ppc_title( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! seo_7_major_benefits_ppc_slug_matches() ) {
		return $title;
	}
	return '7 Major Benefits of PPC Advertising | Think Sophisticated';
}

function seo_7_major_benefits_ppc_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_7_major_benefits_ppc_slug_matches() ) {
		return $desc;
	}
	return 'Discover the 7 major benefits of PPC advertising — from instant traffic to precise targeting. Learn how paid search drives real ROI for your business.';
}
