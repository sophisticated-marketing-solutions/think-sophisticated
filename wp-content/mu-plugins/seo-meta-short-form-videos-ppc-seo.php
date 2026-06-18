<?php
/**
 * Plugin Name: SEO Meta – Short-Form Videos for PPC & SEO Success
 * Description: Injects title, meta description, and canonical for the short-form videos PPC SEO post via Yoast SEO filters.
 */

define( 'SEO_SHORT_FORM_VIDEO_SLUG', 'how-to-leverage-short-form-videos-for-ppc-seo-success' );

add_filter( 'wpseo_title',        'seo_short_form_video_title',    10, 2 );
add_filter( 'wpseo_metadesc',     'seo_short_form_video_desc',     10, 2 );
add_filter( 'wpseo_opengraph_desc', 'seo_short_form_video_og_desc', 10, 2 );
add_filter( 'wpseo_canonical',    'seo_short_form_video_canonical', 10, 2 );

function seo_short_form_video_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_SHORT_FORM_VIDEO_SLUG === get_queried_object()->post_name;
}

function seo_short_form_video_title( $title, $presentation ) {
	if ( ! seo_short_form_video_is_target() ) {
		return $title;
	}
	return 'Short-Form Videos for PPC & SEO Success | Think Sophisticated';
}

function seo_short_form_video_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_short_form_video_is_target() ) {
		return $desc;
	}
	return 'Learn how to leverage short-form videos to boost PPC ad performance and SEO rankings. Proven strategies from a Phoenix digital marketing agency.';
}

function seo_short_form_video_og_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_short_form_video_is_target() ) {
		return $desc;
	}
	return 'Learn how to leverage short-form videos to boost PPC ad performance and SEO rankings. Proven strategies from a Phoenix digital marketing agency.';
}

function seo_short_form_video_canonical( $canonical, $presentation ) {
	if ( ! seo_short_form_video_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/how-to-leverage-short-form-videos-for-ppc-seo-success/';
}
