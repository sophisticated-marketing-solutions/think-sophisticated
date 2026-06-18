<?php
/**
 * Plugin Name: Fix Internal Links – Facebook Ads vs Google Ads
 * Description: Adds id="content" anchor and replaces bare fragment links (href="#") with a real link to /google-ads-management/ on the facebook-ads-vs-google-ads page.
 */

add_filter( 'the_content', 'fix_fbvgg_content', 5 );

function fix_fbvgg_is_target() {
	return get_queried_object() instanceof WP_Post
		&& 'facebook-ads-vs-google-ads' === get_queried_object()->post_name;
}

function fix_fbvgg_content( $content ) {
	if ( ! is_singular() || ! fix_fbvgg_is_target() ) {
		return $content;
	}

	// Prepend id="content" so href="#content" anchor links resolve correctly.
	$content = '<span id="content"></span>' . $content;

	// Replace bare fragment anchors (href="#") with the Google Ads Management service page.
	$content = preg_replace(
		'/<a([^>]*)\shref=["\']#["\']([^>]*)>/i',
		'<a$1 href="https://thinksophisticated.com/google-ads-management/"$2>',
		$content
	);

	return $content;
}
