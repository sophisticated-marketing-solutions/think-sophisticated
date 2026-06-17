<?php
/**
 * Plugin Name: SEO Meta – Increase PPC Advertising Revenue
 * Description: Injects title, meta description, and H1 for the increase-ppc-advertising-revenue page via Yoast SEO filters.
 */

add_filter( 'wpseo_title',    'seo_increase_ppc_title',    10, 1 );
add_filter( 'wpseo_metadesc', 'seo_increase_ppc_metadesc', 10, 2 );
add_filter( 'the_content',    'seo_increase_ppc_h1',       1 );

function seo_increase_ppc_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'increase-ppc-advertising-revenue' === get_queried_object()->post_name;
}

function seo_increase_ppc_title( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! seo_increase_ppc_slug_matches() ) {
		return $title;
	}
	return 'Increase PPC Advertising Revenue | Think Sophisticated';
}

function seo_increase_ppc_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_increase_ppc_slug_matches() ) {
		return $desc;
	}
	return 'Discover 8 proven strategies to increase PPC advertising revenue. Think Sophisticated helps Phoenix businesses maximize ROI with expert Google Ads management.';
}

function seo_increase_ppc_h1( $content ) {
	if ( ! is_singular() || ! seo_increase_ppc_slug_matches() ) {
		return $content;
	}
	// Demote the existing H2 that duplicates the new H1 topic to H3.
	$content = preg_replace(
		'/<h2([^>]*)>8 Simple Methods To Increase ROI on PPC Advertising Campaigns<\/h2>/i',
		'<h3$1>8 Simple Methods To Increase ROI on PPC Advertising Campaigns</h3>',
		$content
	);
	return '<h1>How to Increase PPC Advertising Revenue: 8 Proven Strategies</h1>' . $content;
}
