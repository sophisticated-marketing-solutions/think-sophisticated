<?php
/**
 * Plugin Name: SEO Meta – Spanish Landing Page (/es/)
 * Description: Adds title, meta description, viewport, canonical, and hreflang tags for the /es/ Spanish-language landing page.
 */

function seo_es_page_is_target() {
	return get_queried_object() instanceof WP_Post
		&& 'es' === get_queried_object()->post_name;
}

add_filter( 'generate_meta_viewport', 'seo_es_page_viewport', 999 );
function seo_es_page_viewport( $tag ) {
	if ( seo_es_page_is_target() ) {
		return '<meta name="viewport" content="width=device-width, initial-scale=1">';
	}
	return $tag;
}

add_filter( 'wpseo_title', 'seo_es_page_title', 10, 1 );
function seo_es_page_title( $title ) {
	if ( ! seo_es_page_is_target() ) {
		return $title;
	}
	return 'Agencia de Marketing PPC en Phoenix | Sophisticated Marketing';
}

add_filter( 'wpseo_metadesc', 'seo_es_page_desc', 10, 2 );
function seo_es_page_desc( $desc, $presentation ) {
	if ( ! seo_es_page_is_target() ) {
		return $desc;
	}
	return 'Agencia de publicidad PPC y marketing digital en Phoenix. Google Ads, Meta Ads, SEO local y más. Solicite su consulta gratuita hoy.';
}

add_filter( 'wpseo_canonical', 'seo_es_page_canonical', 10, 1 );
function seo_es_page_canonical( $canonical ) {
	if ( ! seo_es_page_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/es/';
}

add_action( 'wp_head', 'seo_es_page_hreflang', 1 );
function seo_es_page_hreflang() {
	if ( ! seo_es_page_is_target() ) {
		return;
	}
	echo '<link rel="alternate" hreflang="es" href="https://thinksophisticated.com/es/" />' . "\n";
	echo '<link rel="alternate" hreflang="en" href="https://thinksophisticated.com/" />' . "\n";
	echo '<link rel="alternate" hreflang="x-default" href="https://thinksophisticated.com/" />' . "\n";
}
