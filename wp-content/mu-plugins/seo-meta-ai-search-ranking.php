<?php
/**
 * Plugin Name: SEO Meta – How to Rank in AI Search
 * Description: Injects title, meta description, and canonical for the AI search ranking post via Yoast SEO filters.
 */

define( 'SEO_AI_RANK_SLUG', 'how-to-rank-your-business-in-ai-search' );

add_filter( 'wpseo_title', 'seo_meta_ai_rank_title', 10, 2 );
add_filter( 'wpseo_metadesc', 'seo_meta_ai_rank_desc', 10, 2 );
add_filter( 'wpseo_opengraph_desc', 'seo_meta_ai_rank_og_desc', 10, 2 );
add_filter( 'wpseo_canonical', 'seo_meta_ai_rank_canonical', 10, 2 );

function seo_meta_ai_rank_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_AI_RANK_SLUG === get_queried_object()->post_name;
}

function seo_meta_ai_rank_title( $title, $presentation ) {
	if ( ! seo_meta_ai_rank_is_target() ) {
		return $title;
	}
	return 'How to Rank Your Business in AI Search (2026 Guide)';
}

function seo_meta_ai_rank_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_ai_rank_is_target() ) {
		return $desc;
	}
	return 'Learn how to rank your business in AI search engines like ChatGPT, Perplexity & Google AI Overviews. Actionable 2026 strategies for AI visibility.';
}

function seo_meta_ai_rank_og_desc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_meta_ai_rank_is_target() ) {
		return $desc;
	}
	return 'Learn how to rank your business in AI search engines like ChatGPT, Perplexity & Google AI Overviews. Actionable 2026 strategies for AI visibility.';
}

function seo_meta_ai_rank_canonical( $canonical, $presentation ) {
	if ( ! seo_meta_ai_rank_is_target() ) {
		return $canonical;
	}
	return 'https://thinksophisticated.com/how-to-rank-your-business-in-ai-search/';
}
