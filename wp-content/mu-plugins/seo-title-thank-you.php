<?php
/**
 * Plugin Name: SEO Title – Thank You Page
 * Description: Injects the optimized title tag for the /thank-you/ page.
 */
add_filter( 'pre_get_document_title', 'ts_seo_title_thank_you', 9999 );
add_filter( 'wpseo_title',            'ts_seo_wpseo_title_thank_you', 10, 1 );

function ts_seo_thank_you_slug_matches() {
	if ( ! is_singular() ) {
		return false;
	}
	$post = get_queried_object();
	return $post instanceof WP_Post && 'thank-you' === $post->post_name;
}

function ts_seo_title_thank_you( $title ) {
	if ( ! ts_seo_thank_you_slug_matches() ) {
		return $title;
	}
	return 'Thank You | Think Sophisticated – Phoenix Marketing Agency';
}

function ts_seo_wpseo_title_thank_you( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! ts_seo_thank_you_slug_matches() ) {
		return $title;
	}
	return 'Thank You | Think Sophisticated – Phoenix Marketing Agency';
}
