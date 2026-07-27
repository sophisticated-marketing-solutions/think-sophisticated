<?php
/**
 * Plugin Name: SEO Meta – Meta Ads FB/IG
 * Description: Injects meta description for the meta-ads-fb-ig page via Yoast SEO filter.
 */

add_filter( 'wpseo_metadesc', 'seo_meta_ads_fb_ig_metadesc', 10, 2 );

function seo_meta_ads_fb_ig_slug_matches() {
	return get_queried_object() instanceof WP_Post
		&& 'meta-ads-fb-ig' === get_queried_object()->post_name;
}

function seo_meta_ads_fb_ig_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_ads_fb_ig_slug_matches() ) {
		return $desc;
	}
	return 'Phoenix Facebook & Instagram Ads agency driving real ROI. We build full-funnel Meta campaigns for local businesses. Get a free strategy session today.';
}
