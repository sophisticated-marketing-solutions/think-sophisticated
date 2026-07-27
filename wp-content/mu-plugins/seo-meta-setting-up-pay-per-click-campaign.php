<?php
/**
 * Plugin Name: SEO Meta – Setting Up a Pay-Per-Click Campaign
 * Description: Injects title and meta description for the setting-up-pay-per-click-campaign page via Yoast SEO filters.
 */

define( 'SEO_SETTING_UP_PPC_SLUG', 'setting-up-pay-per-click-campaign' );

add_filter( 'wpseo_title',    'seo_setting_up_ppc_title',    10, 2 );
add_filter( 'wpseo_metadesc', 'seo_setting_up_ppc_metadesc', 10, 2 );

function seo_setting_up_ppc_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_SETTING_UP_PPC_SLUG === get_queried_object()->post_name;
}

function seo_setting_up_ppc_title( $title, $presentation ) {
	if ( ! seo_setting_up_ppc_is_target() ) {
		return $title;
	}
	return 'Setting Up a Pay-Per-Click Campaign | Think Sophisticated';
}

function seo_setting_up_ppc_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_setting_up_ppc_is_target() ) {
		return $desc;
	}
	return 'Learn how to set up a pay-per-click campaign that drives real results. Think Sophisticated shares expert PPC strategy, keyword tips, and campaign best practices.';
}
