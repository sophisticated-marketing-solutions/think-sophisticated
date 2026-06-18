<?php
/**
 * Plugin Name: SEO Meta – Local SEO Checklist
 * Description: Injects meta description for the local-seo-checklist page via Yoast SEO filters.
 */

add_filter( 'wpseo_metadesc', 'seo_local_checklist_metadesc', 10, 2 );

function seo_local_checklist_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'local-seo-checklist' === get_queried_object()->post_name;
}

function seo_local_checklist_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_local_checklist_slug_matches() ) {
		return $desc;
	}
	return 'Follow our 6-step local SEO checklist to optimize your Google Business Profile, build local citations, and dominate local search results. Free actionable guide.';
}
