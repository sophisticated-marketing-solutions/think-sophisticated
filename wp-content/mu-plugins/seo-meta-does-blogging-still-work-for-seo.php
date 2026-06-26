<?php
/**
 * Plugin Name: SEO Meta – Does Blogging Still Work for SEO
 * Description: Injects title, meta description, and canonical for the does-blogging-still-work-for-seo post via Yoast SEO filters.
 */

define( 'SEO_BLOGGING_SLUG', 'does-blogging-still-work-for-seo' );

add_filter( 'wpseo_title', 'seo_meta_blogging_title', 10, 2 );
add_filter( 'wpseo_metadesc', 'seo_meta_blogging_desc', 10, 2 );
add_filter( 'wpseo_opengraph_desc', 'seo_meta_blogging_og_desc', 10, 2 );
add_filter( 'wpseo_canonical', 'seo_meta_blogging_canonical', 10, 2 );

function seo_meta_blogging_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_BLOGGING_SLUG === get_queried_object()->post_name;
}

function seo_meta_blogging_title( $title, $presentation ) {
	if ( ! seo_meta_blogging_is_target() ) {
		return $title;
	}
	return 'Does Blogging Still Work for SEO? | Think Sophisticated';
}

function seo_meta_blogging_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_blogging_is_target() ) {
		return $desc;
	}
	return 'Discover whether blogging still drives SEO results in 2025. Learn how consistent, strategic blog content builds authority and organic traffic.';
}

function seo_meta_blogging_og_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_blogging_is_target() ) {
		return $desc;
	}
	return 'Discover whether blogging still drives SEO results in 2025. Learn how consistent, strategic blog content builds authority and organic traffic.';
}

function seo_meta_blogging_canonical( $canonical, $presentation ) {
	if ( ! seo_meta_blogging_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/does-blogging-still-work-for-seo/';
}
