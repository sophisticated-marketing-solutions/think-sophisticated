<?php
/**
 * Plugin Name: SEO Meta – Local SEO Checklist
 * Description: Injects title tag for the local-seo-checklist post via Yoast SEO filters.
 */

define( 'SEO_LOCAL_CHECKLIST_SLUG', 'local-seo-checklist' );

add_filter( 'wpseo_title', 'seo_local_checklist_title', 10, 1 );

function seo_local_checklist_slug_matches() {
	return get_queried_object() instanceof WP_Post
		&& SEO_LOCAL_CHECKLIST_SLUG === get_queried_object()->post_name;
}

function seo_local_checklist_title( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! seo_local_checklist_slug_matches() ) {
		return $title;
	}
	return 'Local SEO Checklist: Essential Steps to Boost Local Visibility';
}
