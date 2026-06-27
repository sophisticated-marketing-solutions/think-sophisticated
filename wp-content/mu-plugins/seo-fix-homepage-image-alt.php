<?php
/**
 * Plugin Name: SEO Fix – Homepage Image Alt Text
 * Description: Adds descriptive alt text to images missing it on the homepage (/).
 */

add_filter( 'the_content', 'seo_fix_homepage_image_alt', 20 );

function seo_fix_homepage_image_alt( $content ) {
	if ( ! is_front_page() ) {
		return $content;
	}

	return preg_replace_callback(
		'#<img\b([^>]*)>#Si',
		static function ( $match ) {
			$attrs = $match[1];

			$has_nonempty_alt = ( false !== stripos( $attrs, 'alt=' )
				&& false === strpos( $attrs, 'alt=""' )
				&& false === strpos( $attrs, "alt=''" ) );

			if ( $has_nonempty_alt ) {
				return $match[0];
			}

			// Derive a label from the src filename as a fallback.
			$label   = 'Sophisticated Marketing Solutions team in Phoenix, AZ';
			$src_pos = stripos( $attrs, 'src=' );
			if ( false !== $src_pos ) {
				$q   = isset( $attrs[ $src_pos + 4 ] ) ? $attrs[ $src_pos + 4 ] : '"';
				$end = strpos( $attrs, $q, $src_pos + 5 );
				if ( false !== $end ) {
					$url  = substr( $attrs, $src_pos + 5, $end - $src_pos - 5 );
					$file = basename( (string) wp_parse_url( $url, PHP_URL_PATH ) );
					$file = preg_replace( '#[-_][0-9]+x[0-9]+\.[a-z0-9]+$#i', '', $file );
					$file = preg_replace( '#\.[a-z0-9]+$#i', '', $file );
					$slug = trim( str_replace( array( '-', '_' ), ' ', $file ) );
					if ( '' !== $slug ) {
						$label = $slug;
					}
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

			return '<img' . $attrs . '>';
		},
		$content
	);
}
