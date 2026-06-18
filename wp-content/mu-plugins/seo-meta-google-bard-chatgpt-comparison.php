<?php
/**
 * Plugin Name: SEO Meta – Google Bard vs ChatGPT Comparison
 * Description: Injects title, meta description, canonical, and fixes H1 for the google-bard-and-chatgpt-a-comparative-analysis post via Yoast SEO filters.
 */

define( 'SEO_BARD_CHATGPT_SLUG', 'google-bard-and-chatgpt-a-comparative-analysis' );

add_filter( 'wpseo_title', 'seo_meta_bard_chatgpt_title', 10, 2 );
add_filter( 'wpseo_metadesc', 'seo_meta_bard_chatgpt_desc', 10, 2 );
add_filter( 'wpseo_canonical', 'seo_meta_bard_chatgpt_canonical', 10, 2 );
add_filter( 'the_content', 'seo_meta_bard_chatgpt_fix_h1', 5 );

function seo_meta_bard_chatgpt_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_BARD_CHATGPT_SLUG === get_queried_object()->post_name;
}

function seo_meta_bard_chatgpt_title( $title, $presentation ) {
	if ( ! seo_meta_bard_chatgpt_is_target() ) {
		return $title;
	}
	return 'Google Bard vs ChatGPT: Full Comparison Guide';
}

function seo_meta_bard_chatgpt_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_bard_chatgpt_is_target() ) {
		return $desc;
	}
	return 'Compare Google Bard and ChatGPT side by side — features, pricing, use cases, and which AI tool best fits your business needs in 2024.';
}

function seo_meta_bard_chatgpt_canonical( $canonical, $presentation ) {
	if ( ! seo_meta_bard_chatgpt_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/google-bard-and-chatgpt-a-comparative-analysis/';
}

function seo_meta_bard_chatgpt_fix_h1( $content ) {
	if ( ! is_singular() || ! seo_meta_bard_chatgpt_is_target() ) {
		return $content;
	}
	$content = preg_replace(
		'/<h1([^>]*)>Breaking Down the Differences Between Two Leading AI Tools<\/h1>/i',
		'<h1$1>Google Bard vs ChatGPT: Breaking Down the Differences Between Two Leading AI Tools<\/h1>',
		$content
	);
	return $content;
}
