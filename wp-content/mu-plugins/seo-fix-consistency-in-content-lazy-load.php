<?php
/**
 * Plugin Name: SEO Fix – Consistency in Content Lazy Load
 * Description: Adds loading="lazy" to below-fold images on /consistency-in-content-is-key-to-seo/ to improve LCP and PageSpeed score.
 */

add_filter( 'the_content', 'seo_fix_consistency_lazy_images' );
function seo_fix_consistency_lazy_images( $content ) {
	if ( ! is_singular() || ! ( get_queried_object() instanceof WP_Post )
		|| 'consistency-in-content-is-key-to-seo' !== get_queried_object()->post_name ) {
		return $content;
	}
	$index = 0;
	return preg_replace_callback(
		'#<img\b([^>]*)>#Si',
		static function ( $match ) use ( &$index ) {
			$index++;
			$attrs = $match[1];
			// First image is the hero/LCP image — do not lazy-load it.
			if ( $index > 1 && false === stripos( $attrs, 'loading=' ) ) {
				$attrs .= ' loading="lazy"';
			}
			return '<img' . $attrs . '>';
		},
		$content
	);
}
