<?php
/**
 * Plugin Name: SEO Title – Manage Your PPC Budget for Long-Term Success
 * Description: Injects the optimized title tag for the manage-your-ppc-budget-for-long-term-success page.
 */
add_filter( 'wpseo_title',            'ts_seo_title_manage_ppc_budget', 10, 1 );
add_filter( 'pre_get_document_title', 'ts_seo_title_manage_ppc_budget_fallback', 9999 );

function ts_seo_title_manage_ppc_budget_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'manage-your-ppc-budget-for-long-term-success' === get_queried_object()->post_name;
}

function ts_seo_title_manage_ppc_budget( $title ) {
	if ( ! empty( $title ) ) {
		return $title;
	}
	if ( ! ts_seo_title_manage_ppc_budget_slug_matches() ) {
		return $title;
	}
	return 'PPC Budget Management: Strategies for Long-Term Success';
}

function ts_seo_title_manage_ppc_budget_fallback( $title ) {
	if ( ! is_singular() || ! ts_seo_title_manage_ppc_budget_slug_matches() ) {
		return $title;
	}
	return 'PPC Budget Management: Strategies for Long-Term Success';
}
