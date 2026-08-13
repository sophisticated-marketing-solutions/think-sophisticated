<?php
/**
 * Plugin Name: SEO Canonical – Does Blogging Still Work for SEO
 * Description: Injects canonical tag for the does-blogging-still-work-for-seo post via Yoast SEO filter.
 */

define( 'SEO_BLOGGING_SEO_SLUG', 'does-blogging-still-work-for-seo' );

add_filter( 'wpseo_canonical', 'seo_canonical_blogging_seo', 10, 2 );

function seo_canonical_blogging_seo_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_BLOGGING_SEO_SLUG === get_queried_object()->post_name;
}

function seo_canonical_blogging_seo( $canonical, $presentation ) {
	if ( ! seo_canonical_blogging_seo_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/does-blogging-still-work-for-seo/';
}
