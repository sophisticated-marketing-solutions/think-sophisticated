<?php
/**
 * Plugin Name: SEO Meta – Manage Your PPC Budget for Long-Term Success
 * Description: Injects meta description for the manage-your-ppc-budget-for-long-term-success page via Yoast SEO filter.
 */

add_filter( 'wpseo_metadesc', 'seo_manage_ppc_budget_metadesc', 10, 2 );

function seo_manage_ppc_budget_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'manage-your-ppc-budget-for-long-term-success' === get_queried_object()->post_name;
}

function seo_manage_ppc_budget_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_manage_ppc_budget_slug_matches() ) {
		return $desc;
	}
	return 'Learn proven PPC budget management strategies to maximize ROI, reduce wasted spend, and drive long-term paid search success for your business.';
}
