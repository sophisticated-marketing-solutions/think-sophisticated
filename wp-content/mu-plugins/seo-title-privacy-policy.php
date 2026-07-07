<?php
/**
 * Plugin Name: SEO Title – Privacy Policy
 * Description: Injects the optimized title tag for the privacy-policy page.
 */
add_filter( 'pre_get_document_title', 'ts_seo_title_privacy_policy', 9999 );
add_filter( 'wpseo_title',            'ts_seo_wpseo_title_privacy_policy', 10, 1 );

function ts_seo_privacy_policy_slug_matches() {
	if ( ! is_singular() ) {
		return false;
	}
	$post = get_queried_object();
	return $post instanceof WP_Post && 'privacy-policy' === $post->post_name;
}

function ts_seo_title_privacy_policy( $title ) {
	if ( ! ts_seo_privacy_policy_slug_matches() ) {
		return $title;
	}
	return 'Privacy Policy | Think Sophisticated';
}

function ts_seo_wpseo_title_privacy_policy( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! ts_seo_privacy_policy_slug_matches() ) {
		return $title;
	}
	return 'Privacy Policy | Think Sophisticated';
}
