<?php
/**
 * Plugin Name: SEO Meta – PPC Strategies for 2025
 * Description: Injects title, meta description, and canonical for the ppc-strategies-for-2025 post via Yoast SEO filters.
 */

define( 'SEO_PPC_STRATEGIES_2025_SLUG', 'ppc-strategies-for-2025' );

add_filter( 'wpseo_title',            'seo_ppc_strategies_2025_title',     10, 2 );
add_filter( 'wpseo_metadesc',         'seo_ppc_strategies_2025_desc',      10, 2 );
add_filter( 'wpseo_opengraph_desc',   'seo_ppc_strategies_2025_og_desc',   10, 2 );
add_filter( 'wpseo_canonical',        'seo_ppc_strategies_2025_canonical', 10, 2 );

function seo_ppc_strategies_2025_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_PPC_STRATEGIES_2025_SLUG === get_queried_object()->post_name;
}

function seo_ppc_strategies_2025_title( $title, $presentation ) {
	if ( ! seo_ppc_strategies_2025_is_target() ) {
		return $title;
	}
	return 'PPC Strategies for 2025 | Think Sophisticated';
}

function seo_ppc_strategies_2025_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_ppc_strategies_2025_is_target() ) {
		return $desc;
	}
	return 'Discover the top PPC strategies for 2025 — from AI-driven automation to hyper-personalized targeting. Expert PPC management in Phoenix, AZ.';
}

function seo_ppc_strategies_2025_og_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_ppc_strategies_2025_is_target() ) {
		return $desc;
	}
	return 'Discover the top PPC strategies for 2025 — from AI-driven automation to hyper-personalized targeting. Expert PPC management in Phoenix, AZ.';
}

function seo_ppc_strategies_2025_canonical( $canonical, $presentation ) {
	if ( ! seo_ppc_strategies_2025_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/ppc-strategies-for-2025/';
}
