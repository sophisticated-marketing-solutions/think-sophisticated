<?php
/**
 * Plugin Name: SEO Fix – Beyond Google: The SEO Impact of Emerging Search Engines
 * Description: Fixes viewport meta tag, font sizes, image alt text and lazy loading for /beyond-google-the-seo-impact-of-emerging-search-engines/ page.
 */

define( 'SEO_FIX_BEYOND_GOOGLE_SLUG', 'beyond-google-the-seo-impact-of-emerging-search-engines' );

function seo_fix_beyond_google_is_target() {
	return is_singular()
		&& get_queried_object() instanceof WP_Post
		&& SEO_FIX_BEYOND_GOOGLE_SLUG === get_queried_object()->post_name;
}

add_filter( 'generate_meta_viewport', 'seo_fix_beyond_google_viewport', 999 );
function seo_fix_beyond_google_viewport( $tag ) {
	if ( seo_fix_beyond_google_is_target() ) {
		return '<meta name="viewport" content="width=device-width, initial-scale=1">';
	}
	return $tag;
}

add_filter( 'hello_elementor_viewport_content', 'seo_fix_beyond_google_elementor_viewport', 999 );
function seo_fix_beyond_google_elementor_viewport( $content ) {
	if ( seo_fix_beyond_google_is_target() ) {
		return 'width=device-width, initial-scale=1';
	}
	return $content;
}

add_action( 'wp_head', 'seo_fix_beyond_google_inline_styles', 5 );
function seo_fix_beyond_google_inline_styles() {
	if ( ! seo_fix_beyond_google_is_target() ) {
		return;
	}
	echo '<style>body,p,li,span,a{font-size:16px;line-height:1.6}@media(max-width:768px){body{font-size:16px!important}}</style>' . "\n";
}

add_filter( 'the_content', 'seo_fix_beyond_google_images' );
function seo_fix_beyond_google_images( $content ) {
	if ( ! seo_fix_beyond_google_is_target() ) {
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
