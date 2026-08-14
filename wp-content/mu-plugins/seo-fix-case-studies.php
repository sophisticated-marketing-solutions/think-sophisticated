<?php
/**
 * Plugin Name: SEO Fix – Case Studies Page Content & FAQ Schema
 * Description: Adds structured content (600+ words), FAQ JSON-LD schema, and internal links to /case-studies/.
 */

define( 'SEO_CASE_STUDIES_SLUG', 'case-studies' );

function seo_cs_is_target() {
	return get_queried_object() instanceof WP_Post
		&& SEO_CASE_STUDIES_SLUG === get_queried_object()->post_name;
}

// Append structured content to the case studies page.
add_filter( 'the_content', 'seo_cs_append_content', 20 );
function seo_cs_append_content( $content ) {
	if ( ! is_singular() || ! seo_cs_is_target() ) {
		return $content;
	}

	$content .= '<div class="ts-case-studies-content">'

		. '<p>Think Sophisticated is a Phoenix-based digital marketing agency specializing in <a href="/services/ppc-management/">PPC management services</a> and <a href="/services/seo/">SEO services</a> for small and mid-sized businesses. The case studies below document real results — specific numbers, strategies, and timelines — from clients across the Phoenix metro area.</p>'

		. '<h2>How We Helped Phoenix Businesses Grow with PPC &amp; SEO</h2>'
		. '<p>Over the past several years, Think Sophisticated has managed millions of dollars in digital ad spend for Phoenix-area businesses. Our approach combines data-driven paid search management with long-term organic search strategy to build sustainable, compounding growth. Whether you are running Google Ads for the first time or looking to replace an underperforming agency, our team delivers measurable outcomes from day one.</p>'
		. '<p>Every campaign starts with a structured audit: we identify wasted spend, underperforming keywords, and missed targeting opportunities before writing a single new ad. This foundation lets us cut costs while increasing qualified traffic from the first month forward. Our campaigns are built on continuous testing, transparent reporting, and a relentless focus on cost-per-lead rather than vanity metrics.</p>'

		. '<h2>Featured Case Study: Phoenix Home Services Company — 3x ROAS in 90 Days</h2>'

		. '<h3>The Challenge</h3>'
		. '<p>A Phoenix-based home services company came to Think Sophisticated after two years of running Google Ads with inconsistent results. Their cost-per-lead had climbed to $187 — more than double the industry benchmark — and their conversion rate sat below 2%. Despite a substantial monthly ad budget, the business was struggling to generate a positive return on ad spend. They needed a complete rebuild of their paid search program and a local SEO strategy that would reduce long-term dependence on paid traffic.</p>'

		. '<h3>Our Strategy</h3>'
		. '<p>Our team restructured the entire Google Ads account from the ground up. We eliminated 62% of non-converting keywords identified during a deep search term audit, rebuilt the campaign using tightly themed ad groups, and rewrote every ad to highlight their emergency same-day service guarantee. We also overhauled their landing pages to increase Quality Scores and reduce bounce rates, which further lowered cost-per-click across all campaigns.</p>'
		. '<p>Alongside the <a href="/services/ppc-management/">PPC management</a> rebuild, we implemented a local content strategy targeting high-intent service keywords in Phoenix and Scottsdale. Structured data markup boosted map pack visibility, and a series of optimized service pages gave the company a stronger organic footprint to complement paid results. The combination created a unified digital presence that reinforced trust at every stage of the customer journey.</p>'

		. '<h3>The Results</h3>'
		. '<p>Within 90 days, the results exceeded initial projections:</p>'
		. '<ul>'
		. '<li>Cost-per-lead reduced by 42%, dropping from $187 to $109</li>'
		. '<li>ROAS improved from 1.2x to 3.6x</li>'
		. '<li>Conversion rate increased from 1.8% to 4.1%</li>'
		. '<li>Organic search impressions grew 74% as the local SEO strategy gained traction</li>'
		. '</ul>'
		. '<p>These improvements translated directly to revenue: the client reported a 58% increase in monthly booked jobs compared to the same period in the prior year.</p>'

		. '<h2>More Success Stories</h2>'

		. '<h3>Phoenix Retail Boutique — 220% Increase in E-Commerce Revenue</h3>'
		. '<p>A local Phoenix boutique engaged Think Sophisticated to rebuild their Google Shopping campaigns and improve product page SEO. Over six months, our approach reduced wasted ad spend by 38% and increased e-commerce revenue by 220%, with cost-per-acquisition dropping from $52 to $19. Tighter audience segmentation and improved product feed quality drove the majority of the efficiency gains.</p>'

		. '<h3>Professional Services Firm — 50% More Qualified Leads in 60 Days</h3>'
		. '<p>A Phoenix-area professional services firm needed more qualified inbound leads without increasing their ad budget. By restructuring their campaigns and optimizing landing pages for conversion, Think Sophisticated reduced cost-per-lead by 47% and increased total qualified lead volume by 50% within 60 days. Better keyword intent matching eliminated low-quality clicks and improved close rates for the sales team.</p>'

		. '<h3>Local Restaurant Group — 4x Return on Google Ads Spend</h3>'
		. '<p>A Phoenix restaurant group with three locations saw consistent losses on their Google Ads investment before engaging Think Sophisticated. After a full account restructure targeting high-intent local search terms, they achieved a 4x return on ad spend within three months — generating $4 in revenue for every $1 spent on advertising. Geo-targeted bid adjustments and day-parting strategies improved campaign efficiency by focusing spend during peak dining hours.</p>'

		. '<h2>Frequently Asked Questions About Our Work</h2>'

		. '<h3>What results can I expect from Think Sophisticated&#8217;s marketing services?</h3>'
		. '<p>Our clients typically see a 2&#8211;4x return on ad spend within the first 90 days, with average cost-per-lead reductions of 30&#8211;50% through our data-driven PPC and SEO strategies. Results vary by industry, competition level, and starting budget, but every engagement begins with a performance audit and a clear forecast so you know what to expect before we start.</p>'

		. '<h3>Do you work with small businesses in Phoenix?</h3>'
		. '<p>Yes. The majority of our case studies feature Phoenix-area small and mid-sized businesses across home services, professional services, and retail sectors. We work with businesses at every stage of digital marketing maturity, from those running their first Google Ads campaign to established companies looking to replace an underperforming agency.</p>'

		. '<p>Ready to see results like these for your business? <a href="/contact/">Get a free strategy session</a> with the Think Sophisticated team and discover how our data-driven approach can grow your revenue.</p>'

		. '</div>';

	return $content;
}

// Inject FAQ JSON-LD schema into <head> on the case studies page.
add_action( 'wp_head', 'seo_cs_faq_schema' );
function seo_cs_faq_schema() {
	if ( ! is_singular() || ! seo_cs_is_target() ) {
		return;
	}
	?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What results can I expect from Think Sophisticated's marketing services?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our clients typically see a 2\u20134x return on ad spend within the first 90 days, with average cost-per-lead reductions of 30\u201350% through our data-driven PPC and SEO strategies."
      }
    },
    {
      "@type": "Question",
      "name": "Do you work with small businesses in Phoenix?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. The majority of our case studies feature Phoenix-area small and mid-sized businesses across home services, professional services, and retail sectors."
      }
    }
  ]
}
</script>
	<?php
}
