<?php
/**
 * Plugin Name: SEO Meta – Google Chrome Cookies 2024
 * Description: Injects title, meta description, canonical, and heading structure for the google-chrome-cookies-2024 post via Yoast SEO filters.
 */

define( 'SEO_CHROME_COOKIES_SLUG', 'google-chrome-cookies-2024' );

add_filter( 'wpseo_title', 'seo_meta_chrome_cookies_title', 10, 2 );
add_filter( 'wpseo_metadesc', 'seo_meta_chrome_cookies_desc', 10, 2 );
add_filter( 'wpseo_canonical', 'seo_meta_chrome_cookies_canonical', 10, 2 );
add_filter( 'the_content', 'seo_meta_chrome_cookies_inject_headings', 1 );

function seo_meta_chrome_cookies_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_CHROME_COOKIES_SLUG === get_queried_object()->post_name;
}

function seo_meta_chrome_cookies_title( $title, $presentation ) {
	if ( ! seo_meta_chrome_cookies_is_target() ) {
		return $title;
	}
	return 'Google Chrome Cookies 2024: What\'s Changing & What to Do';
}

function seo_meta_chrome_cookies_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_chrome_cookies_is_target() ) {
		return $desc;
	}
	return "Google Chrome's 2024 cookie changes explained. Learn how third-party cookie deprecation affects your site and what steps to take now.";
}

function seo_meta_chrome_cookies_canonical( $canonical, $presentation ) {
	if ( ! seo_meta_chrome_cookies_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/google-chrome-cookies-2024/';
}

function seo_meta_chrome_cookies_inject_headings( $content ) {
	if ( ! is_singular() || ! seo_meta_chrome_cookies_is_target() ) {
		return $content;
	}
	// Only inject if no heading tags exist in the content.
	if ( preg_match( '#<h[1-6][\s>]#i', $content ) ) {
		return $content;
	}
	$headings = '<h1>Google Chrome Cookies 2024: What the Third-Party Cookie Changes Mean for You</h1>' . "\n"
		. '<h2>What Are Third-Party Cookies?</h2>' . "\n"
		. '<h2>Chrome\'s 2024 Privacy Update Explained</h2>' . "\n"
		. '<h3>Timeline of Cookie Deprecation</h3>' . "\n"
		. '<h2>How This Affects Advertisers &amp; Marketers</h2>' . "\n"
		. '<h2>What You Should Do Now</h2>' . "\n";
	return $headings . $content;
}
