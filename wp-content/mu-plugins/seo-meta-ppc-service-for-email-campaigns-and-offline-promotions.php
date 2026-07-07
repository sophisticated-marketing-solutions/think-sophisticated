<?php
/**
 * Plugin Name: SEO Meta – PPC Service for Email Campaigns and Offline Promotions
 * Description: Injects meta description for the ppc-service-for-email-campaigns-and-offline-promotions page via Yoast SEO filters.
 */

add_filter( 'wpseo_metadesc', 'seo_ppc_email_offline_metadesc', 10, 2 );

function seo_ppc_email_offline_slug_matches() {
	if ( ! ( get_queried_object() instanceof WP_Post ) ) {
		return false;
	}
	return 'ppc-service-for-email-campaigns-and-offline-promotions' === get_queried_object()->post_name;
}

function seo_ppc_email_offline_metadesc( $desc, $presentation ) {
	if ( ! empty( $desc ) ) {
		return $desc;
	}
	if ( ! seo_ppc_email_offline_slug_matches() ) {
		return $desc;
	}
	return 'Boost ROI with our PPC service for email campaigns and offline promotions. Precision targeting, measurable results. Get a free strategy session today.';
}
