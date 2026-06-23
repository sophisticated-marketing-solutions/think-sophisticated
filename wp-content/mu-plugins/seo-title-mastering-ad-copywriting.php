<?php
/**
 * Plugin Name: SEO Title – Mastering Ad Copywriting Post
 * Description: Injects the optimized title tag for the mastering-ad-copywriting post via Yoast SEO filter.
 */

add_filter( 'wpseo_title', 'seo_title_mastering_ad_copywriting', 10, 2 );

function seo_title_mastering_ad_copywriting( $title, $presentation ) {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return $title;
	}
	if ( 'mastering-ad-copywriting' !== get_queried_object()->post_name ) {
		return $title;
	}
	return 'Mastering Ad Copywriting: Tips That Convert | Think Sophisticated';
}
