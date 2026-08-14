<?php
/**
 * Plugin Name: SEO Meta – Business Scan Tool
 * Description: Injects title, meta description, canonical, and H1 for the /business-scan-tool/ page via Yoast SEO filters.
 */

add_filter( 'wpseo_title',     'seo_bst_title',     10, 1 );
add_filter( 'wpseo_metadesc',  'seo_bst_metadesc',  10, 2 );
add_filter( 'wpseo_canonical', 'seo_bst_canonical', 10, 2 );
add_filter( 'the_content',     'seo_bst_h1',        1 );

function seo_bst_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'business-scan-tool' === get_queried_object()->post_name;
}

function seo_bst_title( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! seo_bst_slug_matches() ) {
		return $title;
	}
	return 'Free Business Scan Tool | Check Your Digital Footprint';
}

function seo_bst_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_bst_slug_matches() ) {
		return $desc;
	}
	return 'Use our free business scan tool to instantly check how your business is listed across the web. Get your visibility score, missing directories, and error log in seconds.';
}

function seo_bst_canonical( $canonical ) {
	if ( ! seo_bst_slug_matches() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/business-scan-tool/';
}

function seo_bst_h1( $content ) {
	if ( ! is_singular() || ! seo_bst_slug_matches() ) {
		return $content;
	}
	$content = preg_replace(
		'/<h1([^>]*)>Scan Your Digital Footprint<\/h1>/i',
		'<h1$1>Free Business Scan Tool — Check Your Digital Footprint<\/h1>',
		$content
	);
	return $content;
}
