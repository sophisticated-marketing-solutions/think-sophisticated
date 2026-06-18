<?php
/**
 * Plugin Name: Fix Internal Links – Short-Form Videos PPC SEO
 * Description: Replaces bare fragment anchors (href="#") on the short-form videos page with a real internal link to /google-ads-management/.
 */

add_filter( 'the_content', 'fix_sfv_bare_fragment_links', 1 );

function fix_sfv_is_target() {
	return get_queried_object() instanceof WP_Post
		&& 'how-to-leverage-short-form-videos-for-ppc-seo-success' === get_queried_object()->post_name;
}

function fix_sfv_bare_fragment_links( $content ) {
	if ( ! is_singular() || ! fix_sfv_is_target() ) {
		return $content;
	}
	// Replace bare fragment anchors with a real link to the Google Ads Management service page.
	$content = preg_replace(
		'/<a([^>]*)\shref=["\'\']#["\'\']([^>]*)>/i',
		'<a$1 href="https://thinksophisticated.com/google-ads-management/"$2>',
		$content
	);
	return $content;
}
