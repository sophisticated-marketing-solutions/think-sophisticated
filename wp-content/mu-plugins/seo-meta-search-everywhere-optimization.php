<?php
/**
 * Plugin Name: SEO Meta – Search Everywhere Optimization
 * Description: Injects meta description for the /search-everywhere-optimization/ page via Yoast SEO filters.
 */

add_filter( 'wpseo_metadesc', 'seo_meta_search_everywhere_desc', 10, 2 );

function seo_meta_search_everywhere_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( get_queried_object() instanceof WP_Post && 'search-everywhere-optimization' === get_queried_object()->post_name ) {
		return 'Search Everywhere Optimization ensures your brand is visible on Google, AI engines, social, and maps. Discover the strategy that goes beyond traditional SEO.';
	}
	return $desc;
}
