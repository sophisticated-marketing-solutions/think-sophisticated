<?php
/**
 * Plugin Name: SEO Title – SEO Trends in 2024
 * Description: Injects the optimized title tag for the seo-trends-in-2024 post via Yoast SEO filter.
 */

add_filter( 'wpseo_title', 'ts_seo_title_seo_trends_2024', 10, 1 );

function ts_seo_title_seo_trends_2024( $title ) {
	if ( get_queried_object() instanceof WP_Post
		&& 'seo-trends-in-2024' === get_queried_object()->post_name ) {
		return 'SEO Trends in 2024: What Businesses Must Know | Think Sophisticated';
	}
	return $title;
}
