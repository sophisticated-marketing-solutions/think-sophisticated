<?php
/**
 * Plugin Name: SEO Fix – /es/ Spanish Page Image Alt Text
 * Description: Adds descriptive Spanish alt text to images lacking it on the /es/ landing page, and lazy-loads below-fold images.
 */

add_filter( 'the_content', 'seo_fix_es_images' );

function seo_fix_es_images( $content ) {
	if ( ! is_singular() || ! ( get_queried_object() instanceof WP_Post )
		|| 'es' !== get_queried_object()->post_name ) {
		return $content;
	}

	// Keyword-to-Spanish-alt mapping keyed on lowercase filename fragments.
	$alt_map = array(
		'gmb-screenshot-spanish'           => 'Captura de pantalla de Google My Business en español para Sophisticated Marketing',
		'gmb-screenshot'                   => 'Captura de pantalla de Google My Business gestionado por Sophisticated Marketing',
		'benefits-of-ppc-services'         => 'Beneficios de los servicios de publicidad PPC para negocios en Phoenix',
		'best-ppc-service-provider'        => 'Mejor proveedor de servicios PPC para negocios en Phoenix, Arizona',
		'ppc-management-company'           => 'Empresa de gestión de campañas PPC en Phoenix – Sophisticated Marketing',
		'ppc-management-services'          => 'Servicios de gestión de publicidad PPC para negocios locales en Arizona',
		'ppc-service-provider'             => 'Proveedor de servicios de publicidad PPC en Phoenix, Arizona',
		'ppc-company'                      => 'Agencia de publicidad PPC en Phoenix, Arizona – Sophisticated Marketing',
		'ppc-advertising'                  => 'Publicidad PPC para negocios que buscan crecer en Phoenix, Arizona',
		'paid-advertising'                 => 'Servicios de publicidad pagada PPC para negocios en Arizona',
		'small-business'                   => 'Agencia de publicidad PPC para pequeños negocios en Phoenix, Arizona',
		'saint-aesthetix'                  => 'Gráfico mostrando reducción del 96% en costo por adquisición para Saint Aesthetix',
		'phoenix-ppc'                      => 'Agencia de publicidad PPC en Phoenix, Arizona – Sophisticated Marketing',
		'five-reasons'                     => 'Cinco razones para invertir en servicios de gestión de publicidad PPC',
		'top-questions'                    => 'Preguntas clave al seleccionar un proveedor de servicios PPC',
	);

	$index = 0;
	return preg_replace_callback(
		'#<img\b([^>]*)>#Si',
		static function ( $match ) use ( &$index, $alt_map ) {
			$index++;
			$attrs = $match[1];

			$has_nonempty_alt = ( false !== stripos( $attrs, 'alt=' )
				&& false === strpos( $attrs, 'alt=""' )
				&& false === strpos( $attrs, "alt=''" ) );

			if ( ! $has_nonempty_alt ) {
				$new_alt = '';

				// Extract src URL to derive a meaningful alt text.
				$src_pos = stripos( $attrs, 'src=' );
				if ( false !== $src_pos ) {
					$q   = isset( $attrs[ $src_pos + 4 ] ) ? $attrs[ $src_pos + 4 ] : '"';
					$end = strpos( $attrs, $q, $src_pos + 5 );
					if ( false !== $end ) {
						$url      = substr( $attrs, $src_pos + 5, $end - $src_pos - 5 );
						$file     = basename( (string) wp_parse_url( $url, PHP_URL_PATH ) );
						$file     = preg_replace( '#[-_][0-9]+x[0-9]+\.[a-z0-9]+$#i', '', $file );
						$file     = preg_replace( '#\.[a-z0-9]+$#i', '', $file );
						$file_lc  = strtolower( $file );

						// Check the keyword map first.
						foreach ( $alt_map as $fragment => $label ) {
							if ( false !== strpos( $file_lc, $fragment ) ) {
								$new_alt = $label;
								break;
							}
						}

						// Fallback: humanize filename.
						if ( '' === $new_alt ) {
							$new_alt = trim( str_replace( array( '-', '_' ), ' ', $file ) );
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
			}

			// Add lazy loading to all below-fold images (index > 1).
			if ( $index > 1 && false === stripos( $attrs, 'loading=' ) ) {
				$attrs .= ' loading="lazy"';
			}

			return '<img' . $attrs . '>';
		},
		$content
	);
}
