<?php
/**
 * Plugin Name: SEO Meta – Gemini AI Google
 * Description: Injects title, meta description, canonical, H1, and viewport for the gemini-ai-google page via Yoast SEO filters.
 */

define( 'SEO_GEMINI_SLUG', 'gemini-ai-google' );

add_filter( 'wpseo_title',           'seo_gemini_title',     10, 2 );
add_filter( 'wpseo_metadesc',        'seo_gemini_metadesc',  10, 2 );
add_filter( 'wpseo_canonical',       'seo_gemini_canonical', 10, 2 );
add_filter( 'the_content',           'seo_gemini_h1',        1 );
add_filter( 'generate_meta_viewport', 'seo_gemini_viewport', 999 );

function seo_gemini_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_GEMINI_SLUG === get_queried_object()->post_name;
}

function seo_gemini_title( $title, $presentation ) {
	if ( ! seo_gemini_is_target() ) {
		return $title;
	}
	return 'Gemini AI Google: What It Means for Your Business | Think Sophisticated';
}

function seo_gemini_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_gemini_is_target() ) {
		return $desc;
	}
	return 'Discover how Gemini AI by Google is reshaping digital marketing. Learn what it means for your ads, SEO, and business growth with Think Sophisticated.';
}

function seo_gemini_canonical( $canonical, $presentation ) {
	if ( ! seo_gemini_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/gemini-ai-google/';
}

function seo_gemini_h1( $content ) {
	if ( ! is_singular() || ! seo_gemini_is_target() ) {
		return $content;
	}
	return '<h1>Gemini AI Google: Redefining the Future of Digital Marketing</h1>' . $content;
}

function seo_gemini_viewport( $tag ) {
	if ( is_singular() && seo_gemini_is_target() ) {
		return '<meta name="viewport" content="width=device-width, initial-scale=1">';
	}
	return $tag;
}
