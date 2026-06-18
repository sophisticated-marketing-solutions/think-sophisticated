<?php
/**
 * Plugin Name: Local SEO 101 SEO Meta Fix
 * Description: Sets missing Rank Math title, description, and canonical for the local-seo-101 page.
 */

add_action( 'init', function () {
	if ( get_option( '_ts_local_seo_101_meta_set' ) ) {
		return;
	}

	$post = get_page_by_path( 'local-seo-101', OBJECT, get_post_types( array( 'public' => true ) ) );
	if ( ! $post ) {
		return;
	}

	update_post_meta( $post->ID, 'rank_math_title', 'Local SEO 101: Beginner\'s Guide to Local Search Optimization' );
	update_post_meta( $post->ID, 'rank_math_description', 'Learn the fundamentals of local SEO — from Google Business Profile optimization to local keyword research. Grow your local search visibility today.' );
	update_post_meta( $post->ID, 'rank_math_canonical_url', 'https://thinksophisticated.com/local-seo-101/' );

	update_option( '_ts_local_seo_101_meta_set', true );
} );
