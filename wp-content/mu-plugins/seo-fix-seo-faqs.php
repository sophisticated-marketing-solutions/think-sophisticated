<?php
/**
 * Plugin Name: SEO Fix – SEO FAQs Viewport and Image Alt
 * Description: Adds viewport meta tag and fixes image alt text / lazy loading for /seo-faqs/ page.
 */

add_filter( 'generate_meta_viewport', 'seo_fix_seofaqs_viewport', 999 );
function seo_fix_seofaqs_viewport( $tag ) {
	if ( is_singular() && get_queried_object() instanceof WP_Post
		&& 'seo-faqs' === get_queried_object()->post_name ) {
		return '<meta name="viewport" content="width=device-width, initial-scale=1">';
	}
	return $tag;
}

add_filter( 'the_content', 'seo_fix_seofaqs_images' );
function seo_fix_seofaqs_images( $content ) {
	if ( ! is_singular() || ! ( get_queried_object() instanceof WP_Post )
		|| 'seo-faqs' !== get_queried_object()->post_name ) {
		return $content;
	}
	$index = 0;
	return preg_replace_callback(
		'#<img\b([^>]*)>#Si',
		static function ( $match ) use ( &$index ) {
			$index++;
			$attrs = $match[1];

			$has_nonempty_alt = ( false !== stripos( $attrs, 'alt=' )
				&& false === strpos( $attrs, 'alt=""' )
				&& false === strpos( $attrs, "alt=''" ) );

			if ( ! $has_nonempty_alt ) {
				$label   = '';
				$src_pos = stripos( $attrs, 'src=' );
				if ( false !== $src_pos ) {
					$q   = isset( $attrs[ $src_pos + 4 ] ) ? $attrs[ $src_pos + 4 ] : '"';
					$end = strpos( $attrs, $q, $src_pos + 5 );
					if ( false !== $end ) {
						$url   = substr( $attrs, $src_pos + 5, $end - $src_pos - 5 );
						$file  = basename( (string) wp_parse_url( $url, PHP_URL_PATH ) );
						$file  = preg_replace( '#[-_][0-9]+x[0-9]+\.[a-z0-9]+$#i', '', $file );
						$file  = preg_replace( '#\.[a-z0-9]+$#i', '', $file );
						$label = trim( str_replace( array( '-', '_' ), ' ', $file ) );
					}
				}
				$new_alt = 'alt="' . esc_attr( $label ) . '"';
				if ( false !== strpos( $attrs, 'alt=""' ) ) {
					$attrs = str_replace( 'alt=""', $new_alt, $attrs );
				} elseif ( false !== strpos( $attrs, "alt=''" ) ) {
					$attrs = str_replace( "alt=''", $new_alt, $attrs );
				} else {
					$attrs .= ' ' . $new_alt;
				}
			}

			if ( $index > 1 && false === stripos( $attrs, 'loading=' ) ) {
				$attrs .= ' loading="lazy"';
			}

			return '<img' . $attrs . '>';
		},
		$content
	);
}
