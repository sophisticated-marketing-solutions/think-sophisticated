<?php
/**
 * Plugin Name: SEO Meta – Google Chrome Cookies 2024
 * Description: Injects title, meta description, and canonical for the google-chrome-cookies-2024 post via Yoast SEO filters.
 */

define( 'SEO_CHROME_COOKIES_SLUG', 'google-chrome-cookies-2024' );

add_filter( 'wpseo_title', 'seo_meta_chrome_cookies_title', 10, 2 );
add_filter( 'wpseo_metadesc', 'seo_meta_chrome_cookies_desc', 10, 2 );
add_filter( 'wpseo_canonical', 'seo_meta_chrome_cookies_canonical', 10, 2 );

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
