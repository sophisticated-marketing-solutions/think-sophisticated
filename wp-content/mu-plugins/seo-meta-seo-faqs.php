<?php
/**
 * Plugin Name: SEO Meta – SEO FAQs
 * Description: Injects title, meta description, and canonical for the /seo-faqs/ page via Yoast SEO filters.
 */

define( 'SEO_FAQS_SLUG', 'seo-faqs' );

add_filter( 'wpseo_title',        'seo_faqs_title',     10, 1 );
add_filter( 'wpseo_metadesc',     'seo_faqs_metadesc',  10, 2 );
add_filter( 'wpseo_canonical',    'seo_faqs_canonical', 10, 1 );

function seo_faqs_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_FAQS_SLUG === get_queried_object()->post_name;
}

function seo_faqs_title( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! seo_faqs_is_target() ) {
		return $title;
	}
	return 'SEO FAQs | Phoenix SEO Agency – Think Sophisticated';
}

function seo_faqs_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_faqs_is_target() ) {
		return $desc;
	}
	return 'Get answers to the most common SEO questions. Think Sophisticated is Phoenix\'s top-rated SEO agency helping local businesses dominate search results.';
}

function seo_faqs_canonical( $canonical ) {
	if ( ! seo_faqs_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/seo-faqs/';
}
