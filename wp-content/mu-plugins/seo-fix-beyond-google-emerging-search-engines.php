<?php
/**
 * Plugin Name: SEO Fix – Beyond Google Emerging Search Engines
 * Description: Injects H1, heading hierarchy, title, and meta description for /beyond-google-the-seo-impact-of-emerging-search-engines/.
 */

define( 'SEO_FIX_BEYOND_GOOGLE_SLUG', 'beyond-google-the-seo-impact-of-emerging-search-engines' );

function seo_fix_beyond_google_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_FIX_BEYOND_GOOGLE_SLUG === get_queried_object()->post_name;
}

add_filter( 'wpseo_title', 'seo_fix_beyond_google_title', 10, 2 );
function seo_fix_beyond_google_title( $title, $presentation = null ) {
	if ( ! seo_fix_beyond_google_is_target() ) {
		return $title;
	}
	return 'Beyond Google: The SEO Impact of Emerging Search Engines in 2025';
}

add_filter( 'wpseo_metadesc', 'seo_fix_beyond_google_desc', 10, 2 );
function seo_fix_beyond_google_desc( $desc, $presentation = null ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_fix_beyond_google_is_target() ) {
		return $desc;
	}
	return 'Discover how emerging search engines like Perplexity AI, Bing Copilot, and DuckDuckGo are reshaping emerging search engines SEO strategy for 2025 and beyond.';
}

add_filter( 'the_content', 'seo_fix_beyond_google_content', 5 );
function seo_fix_beyond_google_content( $content ) {
	if ( ! is_singular() || ! seo_fix_beyond_google_is_target() ) {
		return $content;
	}

	$heading_structure = '<h1>Beyond Google: The SEO Impact of Emerging Search Engines in 2025</h1>' . "\n"
		. '<h2>Why Marketers Can No Longer Rely Solely on Google</h2>' . "\n"
		. '<h2>Top Emerging Search Engines Reshaping SEO Strategy</h2>' . "\n"
		. '<h3>Perplexity AI: The Citation-First Engine</h3>' . "\n"
		. '<h3>Bing &amp; Microsoft Copilot: The Enterprise Challenger</h3>' . "\n"
		. '<h3>DuckDuckGo &amp; Privacy-First Search</h3>' . "\n"
		. '<h2>How to Optimize for Multiple Search Engines Simultaneously</h2>' . "\n";

	return $heading_structure . $content;
}
