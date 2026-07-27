<?php
/**
 * Plugin Name: Benefits of PPC for Small Business SEO Meta Fix
 * Description: Sets Rank Math title and description for the benefits-of-ppc-for-small-business page.
 */

add_action( 'init', function () {
	if ( get_option( '_ts_benefits_of_ppc_for_small_business_meta_set' ) ) {
		return;
	}

	$post = get_page_by_path( 'benefits-of-ppc-for-small-business', OBJECT, get_post_types( array( 'public' => true ) ) );
	if ( ! $post ) {
		return;
	}

	update_post_meta( $post->ID, 'rank_math_title', 'PPC for Small Business: Top Benefits & ROI Tips' );
	update_post_meta( $post->ID, 'rank_math_description', 'PPC for small business drives instant traffic & measurable ROI. See how Think Sophisticated\'s data-driven campaigns grow your revenue. Free audit.' );

	update_option( '_ts_benefits_of_ppc_for_small_business_meta_set', true );
} );
