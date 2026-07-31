<?php
/**
 * Plugin Name: SEO Title – Remarketing 101: Bring Back Lost Visitors
 * Description: Injects the optimized title tag for the remarketing-101-bringing-back-lost-visitors page.
 */
add_filter( 'pre_get_document_title', 'ts_seo_title_remarketing_101', 9999 );
add_filter( 'wpseo_title',            'ts_seo_wpseo_title_remarketing_101', 10, 1 );

function ts_seo_remarketing_101_slug_matches() {
	if ( ! is_singular() ) {
		return false;
	}
	$post = get_queried_object();
	return $post instanceof WP_Post && 'remarketing-101-bringing-back-lost-visitors' === $post->post_name;
}

function ts_seo_title_remarketing_101( $title ) {
	if ( ! ts_seo_remarketing_101_slug_matches() ) {
		return $title;
	}
	return 'Remarketing 101: Bring Back Lost Visitors | Think Sophisticated';
}

function ts_seo_wpseo_title_remarketing_101( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! ts_seo_remarketing_101_slug_matches() ) {
		return $title;
	}
	return 'Remarketing 101: Bring Back Lost Visitors | Think Sophisticated';
}
