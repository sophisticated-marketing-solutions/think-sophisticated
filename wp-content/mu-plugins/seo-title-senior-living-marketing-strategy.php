<?php
/**
 * Plugin Name: SEO Title – Senior Living Marketing Strategy
 * Description: Injects the optimized title tag for the senior-living-marketing-strategy page.
 */
add_filter( 'pre_get_document_title', 'ts_seo_title_senior_living_marketing_strategy', 9999 );
add_filter( 'wpseo_title',            'ts_seo_wpseo_title_senior_living_marketing_strategy', 10, 1 );

function ts_seo_senior_living_slug_matches() {
	if ( ! is_singular() ) {
		return false;
	}
	$post = get_queried_object();
	return $post instanceof WP_Post && 'senior-living-marketing-strategy' === $post->post_name;
}

function ts_seo_title_senior_living_marketing_strategy( $title ) {
	if ( ! ts_seo_senior_living_slug_matches() ) {
		return $title;
	}
	return 'Senior Living Marketing Strategy | Think Sophisticated';
}

function ts_seo_wpseo_title_senior_living_marketing_strategy( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! ts_seo_senior_living_slug_matches() ) {
		return $title;
	}
	return 'Senior Living Marketing Strategy | Think Sophisticated';
}
