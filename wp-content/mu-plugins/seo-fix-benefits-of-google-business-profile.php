<?php
/**
 * Plugin Name: SEO Fix – Benefits of Google Business Profile H1
 * Description: Adds a keyword-rich H1 tag to the /benefits-of-google-business-profile/ page.
 */

define( 'SEO_FIX_GBP_SLUG', 'benefits-of-google-business-profile' );

add_filter( 'the_content', 'seo_fix_gbp_add_h1', 5 );

function seo_fix_gbp_add_h1( $content ) {
	if ( ! is_singular() || ! ( get_queried_object() instanceof WP_Post )
		|| SEO_FIX_GBP_SLUG !== get_queried_object()->post_name ) {
		return $content;
	}

	$h1 = '<h1>10 Key Benefits of Google Business Profile (And Why You Need One)</h1>';

	return $h1 . $content;
}
