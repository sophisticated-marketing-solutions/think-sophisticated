<?php
/**
 * Plugin Name: SEO Fix – Phoenix PPC Company Scales H1
 * Description: Adds missing H1 heading to the how-a-phoenix-ppc-company-scales-what-actually-matters page.
 */

define( 'SEO_FIX_PHOENIX_PPC_SLUG', 'how-a-phoenix-ppc-company-scales-what-actually-matters' );

add_filter( 'the_content', 'seo_fix_phoenix_ppc_h1', 5 );

function seo_fix_phoenix_ppc_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_FIX_PHOENIX_PPC_SLUG === get_queried_object()->post_name;
}

function seo_fix_phoenix_ppc_h1( $content ) {
	if ( ! is_singular() || ! seo_fix_phoenix_ppc_is_target() ) {
		return $content;
	}

	// Prepend keyword-rich H1 as the primary heading for this page.
	return '<h1>How a Phoenix PPC Company Scales What Actually Matters: Revenue Over Vanity Metrics</h1>' . $content;
}
