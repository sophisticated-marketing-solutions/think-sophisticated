<?php
/**
 * Plugin Name: SEO Title – Maximizing Conversions with PPC Retargeting
 * Description: Injects the optimized title tag for the maximizing-conversions-with-ppc-retargeting page.
 */
add_filter( 'pre_get_document_title', 'ts_seo_title_ppc_retargeting', 9999 );
add_filter( 'wpseo_title',            'ts_seo_wpseo_title_ppc_retargeting', 10, 1 );

function ts_seo_ppc_retargeting_slug_matches() {
	if ( ! is_singular() ) {
		return false;
	}
	$post = get_queried_object();
	return $post instanceof WP_Post && 'maximizing-conversions-with-ppc-retargeting' === $post->post_name;
}

function ts_seo_title_ppc_retargeting( $title ) {
	if ( ! ts_seo_ppc_retargeting_slug_matches() ) {
		return $title;
	}
	return 'Maximizing Conversions with PPC Retargeting | Think Sophisticated';
}

function ts_seo_wpseo_title_ppc_retargeting( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! ts_seo_ppc_retargeting_slug_matches() ) {
		return $title;
	}
	return 'Maximizing Conversions with PPC Retargeting | Think Sophisticated';
}
