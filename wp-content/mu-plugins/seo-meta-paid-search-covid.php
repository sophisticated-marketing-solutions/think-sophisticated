<?php
/**
 * Plugin Name: SEO Meta – Paid Search COVID-19
 * Description: Injects meta description and OG description for the paid search COVID-19 post via Yoast SEO filters.
 */

add_filter( 'wpseo_metadesc', 'seo_meta_paid_search_covid_desc', 10, 2 );
add_filter( 'wpseo_opengraph_desc', 'seo_meta_paid_search_covid_og_desc', 10, 2 );

function seo_meta_paid_search_covid_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( isset( $presentation->model->object_sub_type ) ) {
		$slug = basename( rtrim( get_permalink( $presentation->model->object_id ), '/' ) );
	} else {
		$slug = '';
	}
	if ( get_queried_object() instanceof WP_Post ) {
		$slug = get_queried_object()->post_name;
	}
	if ( 'is-paid-search-marketing-right-for-you-during-the-covid-19-crisis' === $slug ) {
		return 'Wondering if paid search marketing makes sense during COVID-19? Think Sophisticated breaks down when PPC works — and when to pause. Get expert guidance.';
	}
	return $desc;
}

function seo_meta_paid_search_covid_og_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( get_queried_object() instanceof WP_Post
		&& 'is-paid-search-marketing-right-for-you-during-the-covid-19-crisis' === get_queried_object()->post_name
	) {
		return 'Wondering if paid search marketing makes sense during COVID-19? Think Sophisticated breaks down when PPC works — and when to pause.';
	}
	return $desc;
}
