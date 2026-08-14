<?php
/**
 * Plugin Name: SEO H1 – Setting Up Pay-Per-Click Campaign
 * Description: Injects a keyword-rich H1 at the top of the setting-up-pay-per-click-campaign page content via the_content filter.
 */

function seo_setup_ppc_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'setting-up-pay-per-click-campaign' === get_queried_object()->post_name;
}

function seo_setup_ppc_inject_h1( $content ) {
	if ( ! is_singular() || ! seo_setup_ppc_slug_matches() ) {
		return $content;
	}
	return '<h1>How to Set Up a Pay-Per-Click Campaign: A Step-by-Step Guide</h1>' . $content;
}
add_filter( 'the_content', 'seo_setup_ppc_inject_h1', 1 );
