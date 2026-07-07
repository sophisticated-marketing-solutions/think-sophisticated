<?php
/**
 * Plugin Name: SEO Meta – Privacy Policy
 * Description: Injects meta description and canonical for the /privacy-policy/ page via Yoast SEO filters.
 */

define( 'SEO_PRIVACY_POLICY_SLUG', 'privacy-policy' );

add_filter( 'wpseo_metadesc', 'seo_meta_privacy_policy_desc', 10, 2 );
add_filter( 'wpseo_canonical', 'seo_meta_privacy_policy_canonical', 10, 2 );

function seo_meta_privacy_policy_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_PRIVACY_POLICY_SLUG === get_queried_object()->post_name;
}

function seo_meta_privacy_policy_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_privacy_policy_is_target() ) {
		return $desc;
	}
	return 'Read the Think Sophisticated privacy policy to understand how we collect, use, and protect your personal information. Your privacy matters to us.';
}

function seo_meta_privacy_policy_canonical( $canonical, $presentation ) {
	if ( ! seo_meta_privacy_policy_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/privacy-policy/';
}
