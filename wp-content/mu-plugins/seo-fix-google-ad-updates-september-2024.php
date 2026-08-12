<?php
/**
 * Plugin Name: SEO Fix – Google Ad Updates September 2024
 * Description: Adds H1 and supporting heading hierarchy to the /google-ad-updates-september-2024/ page.
 */

define( 'SEO_FIX_GAU_SLUG', 'google-ad-updates-september-2024' );

function seo_fix_gau_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_FIX_GAU_SLUG === get_queried_object()->post_name;
}

add_filter( 'the_content', 'seo_fix_gau_inject_headings', 5 );

function seo_fix_gau_inject_headings( $content ) {
	if ( ! is_singular() || ! seo_fix_gau_is_target() ) {
		return $content;
	}

	$headings = '<article class="seo-heading-structure">
<h1>Google Ads Updates: September 2024 &#8212; What Advertisers Need to Know</h1>
<h2>Key Changes to Google Ads in September 2024</h2>
<h3>1. Smart Bidding Enhancements</h3>
<h3>2. Performance Max Campaign Updates</h3>
<h3>3. New Audience Segmentation Features</h3>
<h2>How These Updates Impact Your PPC Strategy</h2>
<h2>Action Steps for Advertisers</h2>
</article>';

	return $headings . $content;
}
