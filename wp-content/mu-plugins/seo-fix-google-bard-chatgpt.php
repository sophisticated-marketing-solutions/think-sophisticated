<?php
/**
 * Plugin Name: SEO Fix – Google Bard and ChatGPT Comparative Analysis
 * Description: Removes the /es/ internal link on the google-bard-and-chatgpt-a-comparative-analysis page to prevent 429 rate-limit errors for crawlers following dead-end links.
 */

add_filter( 'the_content', 'seo_fix_bard_chatgpt_content', 5 );

function seo_fix_bard_chatgpt_is_target() {
	return get_queried_object() instanceof WP_Post
		&& 'google-bard-and-chatgpt-a-comparative-analysis' === get_queried_object()->post_name;
}

function seo_fix_bard_chatgpt_content( $content ) {
	if ( ! is_singular() || ! seo_fix_bard_chatgpt_is_target() ) {
		return $content;
	}

	// Remove links pointing to the /es/ Spanish subdirectory, keeping their inner text.
	$content = preg_replace(
		'/<a\s[^>]*href=["\'`][^"\'>]*\/es\/[^"\'>]*["\'`][^>]*>(.*?)<\/a>/is',
		'$1',
		$content
	);

	return $content;
}
