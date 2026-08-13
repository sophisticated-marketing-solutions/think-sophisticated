<?php
/**
 * Plugin Name: SEO Fix – Elevating Your E-commerce Website's SEO Images
 * Description: Adds fetchpriority=high to the hero image and loading=lazy to below-fold images on the elevating-your-e-commerce-websites-seo page.
 */

define( 'SEO_FIX_ECOM_SEO_SLUG', 'elevating-your-e-commerce-websites-seo' );

add_filter( 'the_content', 'seo_fix_ecom_seo_images', 5 );

function seo_fix_ecom_seo_is_target() {
	return is_singular()
		&& get_queried_object() instanceof WP_Post
		&& SEO_FIX_ECOM_SEO_SLUG === get_queried_object()->post_name;
}

function seo_fix_ecom_seo_images( $content ) {
	if ( ! seo_fix_ecom_seo_is_target() ) {
		return $content;
	}

	$index = 0;
	return preg_replace_callback(
		'#<img\b([^>]*)>#Si',
		static function ( $match ) use ( &$index ) {
			$index++;
			$attrs = $match[1];

			if ( 1 === $index ) {
				// Hero image: remove loading="lazy" if added by WordPress/plugins, ensure fetchpriority="high".
				$attrs = str_replace( ' loading="lazy"', '', $attrs );
				if ( false === stripos( $attrs, 'fetchpriority=' ) ) {
					$attrs .= ' fetchpriority="high"';
				}
			} else {
				// Below-fold images (2, 3, 4+): add loading="lazy" if not already set.
				if ( false === stripos( $attrs, 'loading=' ) ) {
					$attrs .= ' loading="lazy"';
				}
			}

			return '<img' . $attrs . '>';
		},
		$content
	);
}
