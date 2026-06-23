<?php
/**
 * Plugin Name: SEO Meta – Mastering Ad Copywriting
 * Description: Injects meta description for the mastering-ad-copywriting page via Yoast SEO filters.
 */

add_filter( 'wpseo_metadesc', 'seo_mastering_ad_copywriting_metadesc', 10, 2 );

function seo_mastering_ad_copywriting_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'mastering-ad-copywriting' === get_queried_object()->post_name;
}

function seo_mastering_ad_copywriting_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_mastering_ad_copywriting_slug_matches() ) {
		return $desc;
	}
	return 'Master ad copywriting with proven frameworks that boost conversions. Learn how to write compelling PPC and social ad copy that drives real results.';
}
