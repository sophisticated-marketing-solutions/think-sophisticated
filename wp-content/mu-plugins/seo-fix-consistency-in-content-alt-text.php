<?php
/**
 * Plugin Name: SEO Fix – Consistency in Content Alt Text
 * Description: Adds descriptive, keyword-contextual alt attributes to images missing alt text on the /consistency-in-content-is-key-to-seo/ page.
 */

add_filter( 'the_content', 'seo_fix_consistency_images', 20 );

function seo_fix_consistency_images( $content ) {
	if ( ! is_singular() || ! ( get_queried_object() instanceof WP_Post )
		|| 'consistency-in-content-is-key-to-seo' !== get_queried_object()->post_name ) {
		return $content;
	}

	$alt_map = array(
		'content-consistency-impacts-seo-success' => 'Content consistency impacts SEO success with a steady publishing schedule',
		'content-calendar'                         => 'Content calendar showing consistent blog publishing schedule for SEO growth',
		'seo-content-strategy'                     => 'SEO content strategy diagram illustrating how consistent publishing builds organic traffic',
		'content-marketing'                        => 'Content marketing funnel showing how regular content drives consistent SEO results',
	);

	return preg_replace_callback(
		'#<img\b([^>]*)>#Si',
		static function ( $match ) use ( $alt_map ) {
			$attrs = $match[1];

			$has_nonempty_alt = ( false !== stripos( $attrs, 'alt=' )
				&& false === strpos( $attrs, 'alt=""' )
				&& false === strpos( $attrs, "alt=''" ) );

			if ( $has_nonempty_alt ) {
				return $match[0];
			}

			$new_alt = 'Illustration supporting content consistency SEO best practices';

			$src_pos = stripos( $attrs, 'src=' );
			if ( false !== $src_pos ) {
				$q   = isset( $attrs[ $src_pos + 4 ] ) ? $attrs[ $src_pos + 4 ] : '"';
				$end = strpos( $attrs, $q, $src_pos + 5 );
				if ( false !== $end ) {
					$url      = substr( $attrs, $src_pos + 5, $end - $src_pos - 5 );
					$file     = basename( (string) wp_parse_url( $url, PHP_URL_PATH ) );
					$file     = preg_replace( '#[-_][0-9]+x[0-9]+\.[a-z0-9]+$#i', '', $file );
					$file     = preg_replace( '#\.[a-z0-9]+$#i', '', $file );
					$file_key = strtolower( $file );

					foreach ( $alt_map as $pattern => $label ) {
						if ( false !== strpos( $file_key, $pattern ) ) {
							$new_alt = $label;
							break;
						}
					}

					if ( 'Illustration supporting content consistency SEO best practices' === $new_alt ) {
						$readable = trim( str_replace( array( '-', '_' ), ' ', $file ) );
						if ( '' !== $readable ) {
							$new_alt = $readable . ' for content consistency SEO';
						}
					}
				}
			}

			$new_alt_attr = 'alt="' . esc_attr( $new_alt ) . '"';

			if ( false !== strpos( $attrs, 'alt=""' ) ) {
				$attrs = str_replace( 'alt=""', $new_alt_attr, $attrs );
			} elseif ( false !== strpos( $attrs, "alt=''" ) ) {
				$attrs = str_replace( "alt=''", $new_alt_attr, $attrs );
			} else {
				$attrs .= ' ' . $new_alt_attr;
			}

			return '<img' . $attrs . '>';
		},
		$content
	);
}
