<?php
/**
 * Plugin Name: SEO Fix – How to Market Your First Book
 * Description: Fixes broken anchor fragments (#, #content) and removes dead /es/ links on the how-to-market-your-first-book page.
 */

define( 'SEO_FIX_BOOK_SLUG', 'how-to-market-your-first-book' );

add_filter( 'the_content', 'seo_fix_book_content', 5 );

function seo_fix_book_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_FIX_BOOK_SLUG === get_queried_object()->post_name;
}

function seo_fix_book_content( $content ) {
	if ( ! is_singular() || ! seo_fix_book_is_target() ) {
		return $content;
	}

	// Add id="content" anchor at the top so any href="#content" links resolve correctly.
	$content = '<span id="content"></span>' . $content;

	// Replace bare empty-fragment links (href="#") with href="#content" so they point to a real anchor.
	$content = preg_replace(
		'/<a(\s[^>]*)?\shref=["\'](#)["\'][^>]*>/i',
		'<a$1 href="#content"$2>',
		$content
	);

	// Remove links pointing to the /es/ Spanish subdirectory, keeping their inner text.
	$content = preg_replace(
		'/<a\s[^>]*href=["\''][^"\']*\/es\/[^"\']*["\''][^>]*>(.*?)<\/a>/is',
		'$1',
		$content
	);

	return $content;
}
