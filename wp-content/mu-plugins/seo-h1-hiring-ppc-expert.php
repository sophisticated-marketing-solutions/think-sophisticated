<?php
/**
 * Plugin Name: SEO H1 – Hiring a PPC Expert to Advertise Your Organic Business
 * Description: Injects a missing H1 for the hiring-a-ppc-expert-to-advertise-your-organic-business page and demotes the leading H2 to H3.
 */

define( 'SEO_HPE_SLUG', 'hiring-a-ppc-expert-to-advertise-your-organic-business' );

add_filter( 'the_content', 'seo_hpe_inject_h1', 1 );

function seo_hpe_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_HPE_SLUG === get_queried_object()->post_name;
}

function seo_hpe_inject_h1( $content ) {
	if ( ! is_singular() || ! seo_hpe_is_target() ) {
		return $content;
	}
	// Demote "Amplify Your Organic Business Reach" H2 to H3 so it becomes a
	// supporting subheading beneath the new H1 rather than a competing heading.
	$content = preg_replace(
		'/<h2([^>]*)>Amplify Your Organic Business Reach<\/h2>/i',
		'<h3$1>Amplify Your Organic Business Reach</h3>',
		$content
	);
	return '<h1>Hiring a PPC Expert to Advertise Your Organic Business</h1>' . $content;
}
