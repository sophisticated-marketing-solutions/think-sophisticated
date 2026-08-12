<?php
/**
 * Plugin Name: SEO Fix – How Google Is Changing Search Advertising
 * Description: Ensures viewport meta tag and 16px minimum font size on the how-google-is-changing-search-advertising page for mobile-first indexing compliance.
 */

define( 'SEO_FIX_HGICSA_SLUG', 'how-google-is-changing-search-advertising' );

function seo_fix_hgicsa_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_FIX_HGICSA_SLUG === get_queried_object()->post_name;
}

add_filter( 'generate_meta_viewport', 'seo_fix_hgicsa_viewport', 999 );
function seo_fix_hgicsa_viewport( $tag ) {
	if ( is_singular() && seo_fix_hgicsa_is_target() ) {
		return '<meta name="viewport" content="width=device-width, initial-scale=1">';
	}
	return $tag;
}

add_action( 'wp_head', 'seo_fix_hgicsa_font_sizes', 99 );
function seo_fix_hgicsa_font_sizes() {
	if ( ! is_singular() || ! seo_fix_hgicsa_is_target() ) {
		return;
	}
	echo '<style>body,p,li,td,span{font-size:16px;line-height:1.6}@media(max-width:768px){body{font-size:16px}}</style>' . "\n";
}
