<?php
/**
 * Plugin Name: SEO Title – Search Everywhere Optimization
 * Description: Injects the optimized title tag for the search-everywhere-optimization page.
 */
add_filter( 'pre_get_document_title', 'ts_seo_title_search_everywhere_optimization', 9999 );
add_filter( 'wpseo_title',            'ts_seo_wpseo_title_search_everywhere_optimization', 10, 1 );

function ts_seo_search_everywhere_optimization_slug_matches() {
	if ( ! is_singular() ) {
		return false;
	}
	$post = get_queried_object();
	return $post instanceof WP_Post && 'search-everywhere-optimization' === $post->post_name;
}

function ts_seo_title_search_everywhere_optimization( $title ) {
	if ( ! ts_seo_search_everywhere_optimization_slug_matches() ) {
		return $title;
	}
	return 'Search Everywhere Optimization | Think Sophisticated';
}

function ts_seo_wpseo_title_search_everywhere_optimization( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! ts_seo_search_everywhere_optimization_slug_matches() ) {
		return $title;
	}
	return 'Search Everywhere Optimization | Think Sophisticated';
}
