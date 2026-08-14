<?php
/**
 * Plugin Name: SEO Meta – Remarketing 101
 * Description: Injects meta description and OG description for the remarketing-101-bringing-back-lost-visitors post via Yoast SEO filters.
 */

add_filter( 'wpseo_metadesc',      'seo_meta_remarketing_101_desc',    10, 2 );
add_filter( 'wpseo_opengraph_desc', 'seo_meta_remarketing_101_og_desc', 10, 2 );

function seo_meta_remarketing_101_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'remarketing-101-bringing-back-lost-visitors' === get_queried_object()->post_name;
}

function seo_meta_remarketing_101_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_remarketing_101_slug_matches() ) {
		return $desc;
	}
	return 'Learn how remarketing works to re-engage lost visitors, boost conversions, and lower ad costs. A beginner\'s guide from Think Sophisticated.';
}

function seo_meta_remarketing_101_og_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_remarketing_101_slug_matches() ) {
		return $desc;
	}
	return 'Learn how remarketing works to re-engage lost visitors, boost conversions, and lower ad costs. A beginner\'s guide from Think Sophisticated.';
}
