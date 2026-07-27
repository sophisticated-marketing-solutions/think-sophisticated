<?php
/**
 * Plugin Name: SEO Meta – Benefits of Google Business Profile
 * Description: Injects title, meta description, canonical, viewport, and H1 for the benefits-of-google-business-profile page via Yoast SEO filters.
 */

add_filter( 'wpseo_title',     'seo_gbp_benefits_title',     10, 1 );
add_filter( 'wpseo_metadesc',  'seo_gbp_benefits_metadesc',  10, 2 );
add_filter( 'wpseo_canonical', 'seo_gbp_benefits_canonical', 10, 1 );
add_filter( 'the_content',     'seo_gbp_benefits_content',   1 );
add_action( 'wp_head',         'seo_gbp_benefits_viewport',  1 );

function seo_gbp_benefits_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'benefits-of-google-business-profile' === get_queried_object()->post_name;
}

function seo_gbp_benefits_title( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! seo_gbp_benefits_slug_matches() ) {
		return $title;
	}
	return '10 Benefits of Google Business Profile | Think Sophisticated';
}

function seo_gbp_benefits_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_gbp_benefits_slug_matches() ) {
		return $desc;
	}
	return 'Discover the top 10 benefits of Google Business Profile and how professional GBP management services can grow your local business visibility and conversions.';
}

function seo_gbp_benefits_canonical( $canonical ) {
	if ( ! empty( $canonical ) ) {
		return $canonical;
	}
	if ( ! seo_gbp_benefits_slug_matches() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/benefits-of-google-business-profile/';
}

function seo_gbp_benefits_viewport() {
	if ( ! seo_gbp_benefits_slug_matches() ) {
		return;
	}
	// Only inject if the theme does not already output a viewport meta tag.
	if ( current_theme_supports( 'html5' ) ) {
		return;
	}
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n";
}

function seo_gbp_benefits_content( $content ) {
	if ( ! is_singular() || ! seo_gbp_benefits_slug_matches() ) {
		return $content;
	}
	// Prepend H1 at the top of the page body content.
	$h1 = '<h1>10 Benefits of Google Business Profile for Local Businesses</h1>';
	// Demote H2 "Benefits of Google Business Profile Management Services" to H3.
	$content = preg_replace(
		'/<h2([^>]*)>\s*Benefits of Google Business Profile Management Services\s*<\/h2>/i',
		'<h3$1>Benefits of Google Business Profile Management Services</h3>',
		$content
	);
	return $h1 . $content;
}
