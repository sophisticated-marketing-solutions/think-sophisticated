<?php
/**
 * Plugin Name: SEO Meta – Beneficios de Reclamar tu Perfil Comercial en Google
 * Description: Injects title, meta description, and canonical for the beneficios-de-reclamar-tu-perfil-comercial-en-google page via Yoast SEO filters.
 */

define( 'SEO_BENEFICIOS_PERFIL_SLUG', 'beneficios-de-reclamar-tu-perfil-comercial-en-google' );

add_filter( 'wpseo_title',     'seo_beneficios_perfil_title',     10, 2 );
add_filter( 'wpseo_metadesc',  'seo_beneficios_perfil_desc',      10, 2 );
add_filter( 'wpseo_canonical', 'seo_beneficios_perfil_canonical', 10, 2 );

function seo_beneficios_perfil_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_BENEFICIOS_PERFIL_SLUG === get_queried_object()->post_name;
}

function seo_beneficios_perfil_title( $title, $presentation ) {
	if ( ! seo_beneficios_perfil_is_target() ) {
		return $title;
	}
	return 'Reclamar tu Perfil Comercial en Google: Beneficios Clave';
}

function seo_beneficios_perfil_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_beneficios_perfil_is_target() ) {
		return $desc;
	}
	return 'Descubre los principales beneficios de reclamar tu perfil comercial en Google y cómo aumentar la visibilidad local de tu negocio hoy mismo.';
}

function seo_beneficios_perfil_canonical( $canonical, $presentation ) {
	if ( ! seo_beneficios_perfil_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/beneficios-de-reclamar-tu-perfil-comercial-en-google/';
}
