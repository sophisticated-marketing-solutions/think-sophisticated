<?php
/**
 * Plugin Name: SEO Fix – Hiring a PPC Expert to Advertise Your Organic Business
 * Description: Fixes broken anchor fragments (#, #content) and removes dead /es/ links on the hiring-a-ppc-expert-to-advertise-your-organic-business page.
 */

define( 'SEO_FIX_PPC_EXPERT_SLUG', 'hiring-a-ppc-expert-to-advertise-your-organic-business' );

add_filter( 'the_content', 'seo_fix_ppc_expert_content', 5 );

function seo_fix_ppc_expert_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_FIX_PPC_EXPERT_SLUG === get_queried_object()->post_name;
}

function seo_fix_ppc_expert_content( $content ) {
	if ( ! is_singular() || ! seo_fix_ppc_expert_is_target() ) {
		return $content;
	}

	// Add id="content" anchor at the top so any href="#content" links resolve correctly.
	$content = '<span id="content"></span>' . $content;

	// Replace bare empty-fragment links (href="#") with a real link to /google-ads-management/.
	$content = preg_replace(
		'/<a(\s[^>]*)?\shref=["\']#["\']([^>]*)>/i',
		'<a$1 href="/google-ads-management/"$2>',
		$content
	);

	// Remove links pointing to the /es/ Spanish subdirectory, keeping their inner text.
	$content = preg_replace(
		'/<a\s[^>]*href=["\'][^"\']*\/es\/[^"\']*["\'][^>]*>(.*?)<\/a>/is',
		'$1',
		$content
	);

	return $content;
}
