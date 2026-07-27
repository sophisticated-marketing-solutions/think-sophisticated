<?php
/**
 * Plugin Name: SEO Fix – Benefits of Targeted PPC Advertising Campaigns
 * Description: Adds missing H1 tag and ensures viewport meta tag for /benefits-of-targeted-ppc-advertising-campaigns/.
 */

define( 'SEO_FIX_PPC_BENEFITS_SLUG', 'benefits-of-targeted-ppc-advertising-campaigns' );

function seo_fix_ppc_benefits_is_target() {
	return is_singular()
		&& get_queried_object() instanceof WP_Post
		&& SEO_FIX_PPC_BENEFITS_SLUG === get_queried_object()->post_name;
}

// Ensure viewport meta tag is present (covers themes that may not output it).
add_action( 'wp_head', 'seo_fix_ppc_benefits_viewport', 1 );
function seo_fix_ppc_benefits_viewport() {
	if ( ! seo_fix_ppc_benefits_is_target() ) {
		return;
	}
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n";
}

// Prepend H1 to page content.
add_filter( 'the_content', 'seo_fix_ppc_benefits_h1', 1 );
function seo_fix_ppc_benefits_h1( $content ) {
	if ( ! seo_fix_ppc_benefits_is_target() ) {
		return $content;
	}
	return '<h1>Benefits of Targeted PPC Advertising Campaigns</h1>' . $content;
}
