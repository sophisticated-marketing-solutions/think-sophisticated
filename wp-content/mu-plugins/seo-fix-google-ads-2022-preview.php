<?php
/**
 * Plugin Name: SEO Fix – Google Ads 2022 Preview Image Lazy Loading
 * Description: Adds loading="lazy" to below-the-fold images on /google-ads-2022-preview/ to improve LCP and reduce initial page weight.
 */

add_filter( 'the_content', 'seo_fix_gads2022_lazy_images' );

function seo_fix_gads2022_lazy_images( $content ) {
	if ( ! is_singular() || ! ( get_queried_object() instanceof WP_Post )
		|| 'google-ads-2022-preview' !== get_queried_object()->post_name ) {
		return $content;
	}

	$index = 0;
	return preg_replace_callback(
		'#<img\b([^>]*)>#Si',
		static function ( $match ) use ( &$index ) {
			$index++;
			$attrs = $match[1];

			// First image is the hero — keep it eager. Lazy-load all subsequent images.
			if ( $index > 1 && false === stripos( $attrs, 'loading=' ) ) {
				$attrs .= ' loading="lazy"';
			}

			return '<img' . $attrs . '>';
		},
		$content
	);
}
