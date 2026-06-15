<?php
/**
 * Plugin Name: SEO Title – Paid Search COVID-19 Post
 * Description: Injects the optimized title tag for the paid-search-marketing COVID-19 post.
 */
add_filter( 'pre_get_document_title', 'ts_seo_title_paid_search_covid', 9999 );

function ts_seo_title_paid_search_covid( $title ) {
	if ( is_singular() ) {
		$post = get_queried_object();
		if ( $post instanceof WP_Post && 'is-paid-search-marketing-right-for-you-during-the-covid-19-crisis' === $post->post_name ) {
			return 'Paid Search Marketing During COVID-19 | Think Sophisticated';
		}
	}
	return $title;
}
