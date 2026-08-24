<?php /* Template Name: Pricing V2 */ ?>
<?php
/**
 * Pricing V2 — WordPress implementation of the `pricing-v3` design.
 *
 * Mirrors the structure of template-parts/pricing.php: a self-contained page
 * template that opens with get_header(), renders the same section skeleton
 * (hero + glass orbs, trusted-globally marquee, service sections, why-block,
 * dynamic FAQ loop, closing CTA) and ends with get_footer(). Markup uses the
 * same Tailwind utilities, the same `container-x max-w-*` wrappers and the
 * same inline lucide SVGs as pricing.php.
 *
 * Deliberate differences from pricing.php:
 *   - Seven services instead of four, and no bundles section.
 *   - Cards are static for now. pricing.php pulls its cards from WooCommerce
 *     through the arqam-woo-pricing plugin; the per-section grids below are
 *     the drop-in points for awp_service_has_packages() /
 *     awp_render_service_cards() once products exist for these services.
 *   - Prices are published in USD. Currency switching is left to WPML/WCML:
 *     the sticky bar renders WooCommerce Multilingual's own currency switcher
 *     when that plugin is active and stays hidden otherwise. No custom
 *     currency JavaScript is shipped by this template.
 *
 * @package Arqam-Web
 */

if (!defined('ABSPATH')) exit;

$aw_quote_url   = arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG);
$aw_contact_url = arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG);

if (!function_exists('arqamweb_v2_icon')) {
	/**
	 * Inline lucide icon, matching the SVG conventions used in pricing.php.
	 */
	function arqamweb_v2_icon(string $name, string $classes = 'w-4 h-4'): string
	{
		static $paths = [
			'arrow-right'   => '<path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path>',
			'check'         => '<path d="M20 6 9 17l-5-5"></path>',
			'chevron-right' => '<path d="m9 18 6-6-6-6"></path>',
			'clapperboard'  => '<path d="M20.2 6 3 11l-.9-2.4c-.3-1.1.3-2.2 1.3-2.5l13.5-4c1.1-.3 2.2.3 2.5 1.3Z"></path><path d="m6.2 5.3 3.1 3.9"></path><path d="m12.4 3.4 3.1 4"></path><path d="M3 11h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"></path>',
			'info'          => '<circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path>',
			'life-buoy'     => '<circle cx="12" cy="12" r="10"></circle><path d="m4.93 4.93 4.24 4.24"></path><path d="m14.83 9.17 4.24-4.24"></path><path d="m14.83 14.83 4.24 4.24"></path><path d="m9.17 14.83-4.24 4.24"></path><circle cx="12" cy="12" r="4"></circle>',
			'rocket'        => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91 0z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>',
			'search'        => '<circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path>',
			'server'        => '<rect width="20" height="8" x="2" y="2" rx="2" ry="2"></rect><rect width="20" height="8" x="2" y="14" rx="2" ry="2"></rect><line x1="6" x2="6.01" y1="6" y2="6"></line><line x1="6" x2="6.01" y1="18" y2="18"></line>',
			'share-2'       => '<circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" x2="15.42" y1="13.51" y2="17.49"></line><line x1="15.41" x2="8.59" y1="6.51" y2="10.49"></line>',
			'shopping-cart' => '<circle cx="8" cy="21" r="1"></circle><circle cx="19" cy="21" r="1"></circle><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>',
			'smartphone'    => '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"></rect><path d="M12 18h.01"></path>',
			'sparkles'      => '<path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path><path d="M20 2v4"></path><path d="M22 4h-4"></path><circle cx="4" cy="20" r="2"></circle>',
			'tag'           => '<path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z"></path><circle cx="7.5" cy="7.5" r=".5" fill="currentColor"></circle>',
			'target'        => '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle>',
			'trophy'        => '<path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path><path d="M4 22h16"></path><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"></path><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"></path><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"></path>',
			'wrench'        => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>',
			'zap'           => '<path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>',
		];

		if (!isset($paths[$name])) return '';

		return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"'
			. ' stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"'
			. ' class="lucide lucide-' . esc_attr($name) . ' ' . esc_attr($classes) . '" aria-hidden="true">'
			. $paths[$name] . '</svg>';
	}
}

if (!function_exists('arqamweb_v2_price')) {
	/**
	 * Published price. USD is the single source of truth for every figure on
	 * this page; WPML/WCML handles presentation in other currencies.
	 */
	function arqamweb_v2_price(int $usd): string
	{
		return '$' . number_format_i18n($usd);
	}
}

/**
 * Service sections, mirroring the SERVICES array in the design source.
 *
 * Keys per service:
 *   id / num / label   anchor id, "01"-style index, sticky-bar + section label
 *   title / subtitle   section heading and intro copy
 *   icon               arqamweb_v2_icon() key for the "From …" chip
 *   from_usd           chip price; null renders "Quoted to scope" instead
 *   ships_in           delivery line under the chip
 *   service_slug       optional /services/<slug> link rendered beside the note
 *   tiers              0, 1 or 2 pricing cards (see arqamweb_v2_card())
 *   extra_note         optional paragraph rendered above the reassurance block
 *   reassure           heading / body / cta / href block shown under the cards
 *   note               closing note; note_highlight renders it as a blue band
 */
$aw_services = [
	[
		'id'             => 'websites',
		'num'            => '01',
		'label'          => __('Websites pricing', 'arqamweb'),
		'title'          => __('Websites', 'arqamweb'),
		'subtitle'       => __('Fixed-specification websites, custom-coded and live in one week — the same price for every client, in every market.', 'arqamweb'),
		'icon'           => 'rocket',
		'from_usd'       => 490,
		'ships_in'       => __('Live in 5 working days', 'arqamweb'),
		'note_highlight' => true,
		'tiers'          => [
			[
				'id'             => 'launch-informative',
				'name'           => __('Launch — Informative', 'arqamweb'),
				'tagline'        => __('A complete site, live in one week.', 'arqamweb'),
				'price'          => 490,
				'period'         => __('one-time', 'arqamweb'),
				'checkout'       => true,
				'checkout_label' => __('Buy Launch now', 'arqamweb'),
				'features'       => [
					__('Fixed proven structure, shown as a live demo before you buy', 'arqamweb'),
					__('Custom-coded, no templates and no page builders', 'arqamweb'),
					__('Up to 5 pages', 'arqamweb'),
					__('Your logo, two colours, one font, your images and text', 'arqamweb'),
					__('1 content review round, on content only', 'arqamweb'),
					__('Domain and first year of hosting included', 'arqamweb'),
					__('Delivery: 5 working days from receiving your content', 'arqamweb'),
				],
			],
			[
				'id'             => 'launch-ecommerce',
				'name'           => __('Launch — E-commerce', 'arqamweb'),
				'tagline'        => __('A working store, live in one week.', 'arqamweb'),
				'price'          => 885,
				'period'         => __('one-time', 'arqamweb'),
				'popular'        => true,
				'checkout'       => true,
				'checkout_label' => __('Buy Launch Store now', 'arqamweb'),
				'features'       => [
					__('Everything in Launch Informative', 'arqamweb'),
					__('Full store with cart and checkout', 'arqamweb'),
					__('Cash on delivery and one payment gateway', 'arqamweb'),
					__('Customer accounts and order history', 'arqamweb'),
					__('First 20 products entered by us', 'arqamweb'),
					__('Admin dashboard for products, stock and orders', 'arqamweb'),
					__('Delivery: 5 working days from receiving your content', 'arqamweb'),
				],
			],
		],
		'reassure'       => [
			'heading' => __('Need more than a Launch site?', 'arqamweb'),
			'body'    => __("Most businesses do. Corporate sites, full online stores and custom web platforms are built to your requirements — the number of pages, the languages, the integrations and the systems you need to connect. Tell us what you're working with and we'll map the exact specification your project needs, then send you the price for it. It takes one conversation, and there's no obligation at the end of it.", 'arqamweb'),
			'cta'     => __('Tell us about your project', 'arqamweb'),
			'href'    => $aw_quote_url,
		],
		'note'           => __('We take on a limited number of Launch projects each month to protect delivery quality. When the month is full, new projects move to the following month, and a deposit reserves your slot in the queue. Need it sooner? A rush slot is available at +50%.', 'arqamweb'),
	],
	[
		'id'           => 'seo',
		'num'          => '02',
		'label'        => __('SEO / AEO pricing', 'arqamweb'),
		'title'        => __('SEO / AEO', 'arqamweb'),
		'subtitle'     => __('Search engine optimisation and AI answer optimisation — so your business is found in Google, and cited by AI assistants when people ask.', 'arqamweb'),
		'icon'         => 'search',
		'from_usd'     => 235,
		'ships_in'     => __('Foundation work starts in week one', 'arqamweb'),
		'service_slug' => 'seo',
		'tiers'        => [
			[
				'id'       => 'seo-essential',
				'name'     => __('Essential', 'arqamweb'),
				'tagline'  => __('The steady baseline that compounds.', 'arqamweb'),
				'price'    => 235,
				'period'   => __('/month', 'arqamweb'),
				'features' => [
					__('3-month commitment, paid upfront', 'arqamweb'),
					__('Available for up to 6 months, then we review and recommend the right tier', 'arqamweb'),
					__('2 articles per month', 'arqamweb'),
					__('3 external links from vetted sources', 'arqamweb'),
					__('25 tracked keywords', 'arqamweb'),
					__('1 hour of technical follow-up per month', 'arqamweb'),
					__('Monthly performance report', 'arqamweb'),
				],
			],
		],
		'extra_note'   => __('At this size, expect meaningful movement in nine to twelve months. If your competitors publish four times this much, Essential keeps you in the race rather than moving you up it.', 'arqamweb'),
		'reassure'     => [
			'heading' => __('Most brands need more than Essential.', 'arqamweb'),
			'body'    => __("How much more depends on your market, your competitors, and how far ahead or behind you already are. And there is a real cost to starting too small: six months on a plan below what your situation needs is six months you then spend catching up — and in most businesses, time is customers. We look at your site and the people you're competing with, define the level of coverage that will actually move you, and send you the price for exactly that.", 'arqamweb'),
			'cta'     => __('Get your SEO plan priced', 'arqamweb'),
			'href'    => $aw_quote_url,
		],
		'note'         => __('AI search optimisation (AEO) can be added to any tier. We do not sell guaranteed rankings — we are accountable for executing every item in the plan, measurably and reviewably.', 'arqamweb'),
	],
	[
		'id'       => 'hosting',
		'num'      => '03',
		'label'    => __('Hosting pricing', 'arqamweb'),
		'title'    => __('Managed Hosting', 'arqamweb'),
		'subtitle' => __('Monitored, backed-up hosting with human support in Arabic and English — billed annually.', 'arqamweb'),
		'icon'     => 'server',
		'from_usd' => 15,
		'ships_in' => __('Free migration up to 10 GB', 'arqamweb'),
		'tiers'    => [
			[
				'id'         => 'hosting-essential',
				'name'       => __('Essential', 'arqamweb'),
				'audience'   => __('for an informative site', 'arqamweb'),
				'tagline'    => __('Monitored hosting for a simple site.', 'arqamweb'),
				'price'      => 15,
				'period'     => __('/month', 'arqamweb'),
				'price_note' => __('billed annually — 12 months', 'arqamweb'),
				'features'   => [
					__('Up to 5 GB', 'arqamweb'),
					__('SSL certificate', 'arqamweb'),
					__('Daily backup, 30-day retention', 'arqamweb'),
					__('Full site copy handed to you at launch', 'arqamweb'),
					__('Automated uptime check every minute', 'arqamweb'),
					__('Email on your own domain', 'arqamweb'),
					__('WhatsApp support in Arabic and English', 'arqamweb'),
					__('24-hour response time', 'arqamweb'),
				],
			],
		],
		'reassure' => [
			'heading' => __('A bigger site needs a bigger home.', 'arqamweb'),
			'body'    => __("If your site outgrows Essential — more storage, more traffic, a store that needs staging and hourly database backups — we'll look at what you're actually running and recommend the plan that fits it, with its price. We won't move you up a level you don't need.", 'arqamweb'),
			'cta'     => __('Ask about larger plans', 'arqamweb'),
			'href'    => $aw_contact_url,
		],
		'note'     => __('Hosting faults — the server, the certificate, email, downtime — are always fixed in full at no cost. That is our responsibility, not yours. Work on the site itself, including plugin updates, content changes and new features, is covered by a Care & Support plan. Moving your site from your current provider is free with an annual plan, up to 10 GB; larger sites are quoted by size and type.', 'arqamweb'),
	],
	[
		'id'       => 'care',
		'num'      => '04',
		'label'    => __('Care & Support pricing', 'arqamweb'),
		'title'    => __('Care & Support', 'arqamweb'),
		'subtitle' => __('An hours-based retainer with published task pricing — every request estimated and approved first.', 'arqamweb'),
		'icon'     => 'life-buoy',
		'from_usd' => 30,
		'ships_in' => __('Tasks scheduled the same week', 'arqamweb'),
		'tiers'    => [
			[
				'id'             => 'care-essentials',
				'name'           => __('Essentials', 'arqamweb'),
				'tagline'        => __('Your site, quietly looked after.', 'arqamweb'),
				'price'          => 30,
				'period'         => __('/month', 'arqamweb'),
				'checkout'       => true,
				'checkout_label' => __('Buy Essentials now', 'arqamweb'),
				'features'       => [
					__('A weekly check that your site is up and working', 'arqamweb'),
					__('Plugin, theme and core updates kept current', 'arqamweb'),
					__('A backup taken before every update', 'arqamweb'),
					__('If an update causes a problem, we roll the site back straight away', 'arqamweb'),
					__('Security and uptime monitoring', 'arqamweb'),
					__('A short monthly summary of what was done', 'arqamweb'),
					__('Up to 1 hour per month of routine care', 'arqamweb'),
					__('Development work is estimated and quoted separately', 'arqamweb'),
				],
			],
		],
		'reassure' => [
			'heading' => __('When you need more than routine care.', 'arqamweb'),
			'body'    => __("Larger retainers give you a monthly bank of hours for real development work — every task estimated and approved by you before it starts, and charged at the approved estimate whether it takes us more time or less. We'll look at what you've actually been asking for over a few months and recommend the size that fits.", 'arqamweb'),
			'cta'     => __('Ask about larger retainers', 'arqamweb'),
			'href'    => $aw_contact_url,
		],
		'note'     => __('Essentials covers routine care, not development. If an update causes a problem we roll the site back at no cost, but fixing the underlying conflict is development work and is quoted separately. For larger sites we agree the visit frequency that suits them. Anything above 8 hours becomes its own quoted project.', 'arqamweb'),
	],
	[
		'id'       => 'video',
		'num'      => '05',
		'label'    => __('AI video production pricing', 'arqamweb'),
		'title'    => __('AI Video Production', 'arqamweb'),
		'subtitle' => __('Finished video, produced with AI direction and human editing — priced per video, the same everywhere.', 'arqamweb'),
		'icon'     => 'clapperboard',
		'from_usd' => 35,
		'ships_in' => __('Most clips delivered in 2–4 days', 'arqamweb'),
		'tiers'    => [
			[
				'id'       => 'video-spark',
				'name'     => __('Spark', 'arqamweb'),
				'tagline'  => __('A steady stream of social clips.', 'arqamweb'),
				'price'    => 35,
				'period'   => __('per video', 'arqamweb'),
				'features' => [
					__('Single-concept clip', 'arqamweb'),
					__('Simple, energetic movement', 'arqamweb'),
					__('Native background sound', 'arqamweb'),
					__('720p HD', 'arqamweb'),
					__('Best for Reels, TikTok and Stories', 'arqamweb'),
					__('Revisions $5 per 5-second segment', 'arqamweb'),
				],
			],
		],
		'reassure' => [
			'heading' => __('When a clip needs to be a film.', 'arqamweb'),
			'body'    => __("Higher tiers add real dialogue with lip-sync, consistent characters and products across every shot, full sound design and 4K. Tell us what the video has to do and we'll recommend the right level and price it for you.", 'arqamweb'),
			'cta'     => __('Discuss your video', 'arqamweb'),
			'href'    => $aw_contact_url,
		],
		'note'     => __('Spark is priced per finished video for the 0–15 second bracket; longer clips are quoted to your brief. On-location filming at your premises is quoted separately.', 'arqamweb'),
	],
	[
		'id'       => 'apps',
		'num'      => '06',
		'label'    => __('Mobile apps pricing', 'arqamweb'),
		'title'    => __('Mobile Apps', 'arqamweb'),
		'subtitle' => __('iOS and Android apps built with Flutter, published under your own store accounts and followed up until acceptance.', 'arqamweb'),
		'icon'     => 'smartphone',
		'from_usd' => null,
		'ships_in' => __('Typically 2–10 weeks', 'arqamweb'),
		'tiers'    => [],
		'reassure' => [
			'heading' => __('Every app starts with a specification.', 'arqamweb'),
			'body'    => __("Whether you need your existing store on the app stores quickly, or a complete app built from the ground up with its own API, the work is defined before it's priced. We write a detailed scope document first — screens, features, what's included and what isn't — and the price follows from it. Your store accounts and source code stay in your name throughout.", 'arqamweb'),
			'cta'     => __('Scope your app', 'arqamweb'),
			'href'    => $aw_quote_url,
		],
		'note'     => __('Annual maintenance applies from year two. Google requires an annual Target API update — without it an app stops appearing in the store.', 'arqamweb'),
	],
	[
		'id'           => 'social',
		'num'          => '07',
		'label'        => __('Social media marketing pricing', 'arqamweb'),
		'title'        => __('Social Media Marketing', 'arqamweb'),
		'subtitle'     => __('Reels, designs and shoots produced on a monthly rhythm by a dedicated account team.', 'arqamweb'),
		'icon'         => 'share-2',
		'from_usd'     => null,
		'ships_in'     => __('First content live within 7–10 days', 'arqamweb'),
		'service_slug' => 'social-media',
		'tiers'        => [],
		'reassure'     => [
			'heading' => __('Priced to your brand, not to a package.', 'arqamweb'),
			'body'    => __('Content volume, video production, shooting sessions and community management vary enormously between brands — a single-location business and a national retailer need very different things. We look at where you are now, agree what a month should look like, and price that. You will see exactly what each part costs before anything starts.', 'arqamweb'),
			'cta'     => __('Tell us about your brand', 'arqamweb'),
			'href'    => $aw_quote_url,
		],
		'note'         => __('Paid media management is quoted separately from ad spend, which you pay directly to the platform. Ad accounts and pages are created in your name and remain yours.', 'arqamweb'),
	],
];

if (!function_exists('arqamweb_v2_card')) {
	/**
	 * One pricing card. The "popular" variant uses the same dark treatment as
	 * the highlighted cards in pricing.php (bg-[#124f85] + ring-primary/50).
	 *
	 * A tier without a 'price' renders the "Quoted to scope" pill instead.
	 *
	 * Every card CTA — both the "Buy …" checkout button and the "Request a
	 * Quote" button — points at the contact page, carrying the tier id in a
	 * `plan` query arg so the contact form knows which package was clicked.
	 */
	function arqamweb_v2_card(array $tier, string $contact_url): void
	{
		$dark   = !empty($tier['popular']);
		$quoted = !isset($tier['price']);
		?>
		<div class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full <?php echo $dark
			? 'bg-[#124f85] text-white shadow-elevated hover:-translate-y-1.5 border border-white/10 ring-1 ring-primary/50'
			: 'bg-background text-foreground shadow-card border border-border hover:shadow-elevated hover:-translate-y-1'; ?>">
			<?php if ($dark) : ?>
				<div class="absolute -inset-px rounded-3xl bg-gradient-to-br from-primary/40 via-primary/0 to-primary/30 opacity-60 -z-10 blur-sm"></div>
				<div class="absolute -top-3 left-1/2 -translate-x-1/2 whitespace-nowrap">
					<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gradient-primary text-primary-foreground text-[10px] font-bold tracking-[0.18em] uppercase shadow-glow">
						<?php echo arqamweb_v2_icon('sparkles', 'w-3 h-3'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php echo esc_html($tier['badge'] ?? __('Most Popular', 'arqamweb')); ?>
					</span>
				</div>
				<div class="absolute -top-24 -right-24 w-64 h-64 rounded-full bg-primary/20 blur-3xl pointer-events-none"></div>
			<?php endif; ?>

			<div class="relative flex-1">
				<?php if (!empty($tier['audience'])) : ?>
					<p class="mb-2 text-[10px] font-bold tracking-[0.22em] uppercase <?php echo $dark ? 'text-white/55' : 'text-muted-foreground'; ?>">
						<?php echo esc_html($tier['audience']); ?>
					</p>
				<?php endif; ?>

				<h3 class="text-xl lg:text-2xl font-semibold tracking-tight <?php echo $dark ? 'text-white' : ''; ?>">
					<?php echo esc_html($tier['name']); ?>
				</h3>
				<p class="mt-2 text-sm leading-relaxed <?php echo $dark ? 'text-white/70' : 'text-muted-foreground'; ?>">
					<?php echo esc_html($tier['tagline']); ?>
				</p>

				<div class="mt-6">
					<?php if ($quoted) : ?>
						<span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold tracking-tight <?php echo $dark
							? 'bg-white/10 text-white border border-white/20'
							: 'bg-primary/[0.06] text-primary border border-primary/25'; ?>">
							<?php esc_html_e('Quoted to scope', 'arqamweb'); ?>
						</span>
					<?php else : ?>
						<p class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase <?php echo $dark ? 'text-white/60' : 'text-primary/80'; ?>">
							<?php esc_html_e('Starting from', 'arqamweb'); ?>
						</p>
						<div class="flex items-baseline gap-2 flex-wrap">
							<span class="text-4xl lg:text-5xl font-semibold tracking-tight <?php echo $dark ? 'text-white' : 'text-gradient'; ?>">
								<?php echo esc_html(arqamweb_v2_price((int) $tier['price'])); ?>
							</span>
							<span class="text-sm font-medium <?php echo $dark ? 'text-white/60' : 'text-muted-foreground'; ?>">
								<?php echo esc_html($tier['period'] ?? ''); ?>
							</span>
						</div>
						<?php if (!empty($tier['price_note'])) : ?>
							<p class="mt-1.5 text-xs <?php echo $dark ? 'text-white/50' : 'text-muted-foreground'; ?>">
								<?php echo esc_html($tier['price_note']); ?>
							</p>
						<?php endif; ?>
					<?php endif; ?>
				</div>

				<div class="mt-7 h-px <?php echo $dark ? 'bg-white/15' : 'bg-border'; ?>"></div>

				<ul class="mt-7 space-y-3.5">
					<?php foreach ($tier['features'] as $feature) : ?>
						<li class="flex items-start gap-3 text-sm leading-relaxed">
							<span class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 <?php echo $dark ? 'bg-white/10 text-primary-foreground' : 'bg-primary/10 text-primary'; ?>">
								<?php echo arqamweb_v2_icon('check', 'w-3 h-3'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</span>
							<span class="<?php echo $dark ? 'text-white/85' : 'text-foreground/85'; ?>"><?php echo esc_html($feature); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="relative mt-8 pt-2 flex flex-col gap-3">
				<?php
				$cta_classes = $dark
					? 'bg-white text-primary hover:shadow-glow'
					: 'bg-gradient-primary text-primary-foreground shadow-soft hover:shadow-glow';
				?>
				<?php if (!empty($tier['checkout'])) : ?>
					<a href="<?php echo esc_url(add_query_arg('plan', $tier['id'], $contact_url)); ?>"
					   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 <?php echo esc_attr($cta_classes); ?>">
						<?php echo arqamweb_v2_icon('shopping-cart'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php echo esc_html($tier['checkout_label'] ?? __('Get started', 'arqamweb')); ?>
					</a>
				<?php else : ?>
					<a href="<?php echo esc_url(add_query_arg('plan', $tier['id'], $contact_url)); ?>"
					   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 <?php echo esc_attr($cta_classes); ?>">
						<?php esc_html_e('Request a Quote', 'arqamweb'); ?>
						<?php echo arqamweb_v2_icon('arrow-right'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</a>
				<?php endif; ?>

				<a href="<?php echo esc_url($contact_url); ?>"
				   class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors <?php echo $dark ? 'text-white/70 hover:text-white' : 'text-muted-foreground hover:text-primary'; ?>">
					<?php esc_html_e('or talk to us', 'arqamweb'); ?>
					<?php echo arqamweb_v2_icon('arrow-right', 'w-3 h-3'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
			</div>
		</div>
		<?php
	}
}

if (!function_exists('arqamweb_v2_reassure')) {
	/**
	 * The calm "you probably need more than this" block under each section.
	 * $stacked lays it out vertically for the narrow column beside a single card.
	 */
	function arqamweb_v2_reassure(array $block, bool $stacked = false, string $margin = 'mt-8'): void
	{
		?>
		<div class="<?php echo esc_attr($margin); ?> rounded-3xl border border-primary/25 bg-primary/[0.04] p-7 lg:p-9 shadow-card">
			<div class="<?php echo $stacked ? 'flex flex-col gap-6' : 'grid lg:grid-cols-12 gap-6 lg:gap-8 items-center'; ?>">
				<div class="<?php echo $stacked ? '' : 'lg:col-span-8'; ?>">
					<div class="flex items-start gap-3">
						<span class="inline-flex items-center justify-center w-10 h-10 rounded-2xl bg-gradient-primary text-primary-foreground shadow-soft shrink-0">
							<?php echo arqamweb_v2_icon('wrench'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</span>
						<div class="min-w-0">
							<h3 class="text-lg lg:text-xl font-semibold tracking-tight"><?php echo esc_html($block['heading']); ?></h3>
							<p class="mt-2.5 text-sm text-muted-foreground leading-relaxed"><?php echo esc_html($block['body']); ?></p>
						</div>
					</div>
				</div>
				<div class="<?php echo $stacked ? '' : 'lg:col-span-4 lg:text-right'; ?>">
					<a href="<?php echo esc_url($block['href']); ?>"
					   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full bg-gradient-primary text-primary-foreground shadow-soft hover:shadow-glow hover:-translate-y-0.5 transition-all">
						<?php echo esc_html($block['cta']); ?>
						<?php echo arqamweb_v2_icon('arrow-right'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</a>
				</div>
			</div>
		</div>
		<?php
	}
}

if (!function_exists('arqamweb_v2_note')) {
	/**
	 * Closing note for a section: a highlighted blue band when 'note_highlight'
	 * is set, otherwise the subtle strip with an optional service-page link.
	 */
	function arqamweb_v2_note(array $svc): void
	{
		if (!empty($svc['note_highlight'])) :
			?>
			<div class="mt-8 rounded-3xl border border-primary/25 bg-primary/[0.05] px-6 py-5 flex items-start gap-3 shadow-card">
				<span class="text-primary shrink-0 mt-0.5"><?php echo arqamweb_v2_icon('info'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				<p class="text-sm text-foreground/80 leading-relaxed"><?php echo esc_html($svc['note']); ?></p>
			</div>
			<?php
			return;
		endif;
		?>
		<div class="mt-8 rounded-2xl border border-border bg-secondary/40 px-5 py-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
			<p class="text-sm text-muted-foreground leading-relaxed"><?php echo esc_html($svc['note']); ?></p>
			<?php if (!empty($svc['service_slug'])) : ?>
				<a href="<?php echo esc_url(home_url('/services/' . $svc['service_slug'])); ?>"
				   class="shrink-0 inline-flex items-center gap-1.5 text-xs font-semibold text-primary hover:gap-2.5 transition-all">
					<?php
					/* translators: %s: service name, e.g. "SEO / AEO". */
					printf(esc_html__('Explore the %s page', 'arqamweb'), esc_html($svc['title']));
					?>
					<?php echo arqamweb_v2_icon('arrow-right', 'w-3.5 h-3.5'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
			<?php endif; ?>
		</div>
		<?php
	}
}

get_header();
?>

<div class="min-h-screen bg-background text-foreground">
	<main>
		<?php
		/**
		 * Sticky bar. In the design this hosts the currency switcher; here it is
		 * rendered only when WooCommerce Multilingual (WCML) is active, so the
		 * switcher is WPML's own. Without WCML the bar stays out of the markup.
		 */
		if (has_action('wcml_currency_switcher')) :
			?>
			<div class="sticky top-[var(--aw-header-height,4rem)] z-40 bg-background/80 backdrop-blur-xl border-b border-border/60 shadow-soft">
				<div class="container-x max-w-7xl mx-auto py-2.5 flex items-center justify-between gap-4">
					<div class="flex items-center gap-2 min-w-0">
						<span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-primary/10 text-primary shrink-0">
							<?php echo arqamweb_v2_icon('tag', 'w-3 h-3'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</span>
						<span class="text-[11px] font-semibold tracking-[0.18em] uppercase text-muted-foreground truncate">
							<?php esc_html_e('Pricing', 'arqamweb'); ?>
						</span>
					</div>
					<div class="flex items-center gap-2">
						<span class="text-[10px] font-medium text-muted-foreground shrink-0"><?php esc_html_e('Prices in', 'arqamweb'); ?></span>
						<?php do_action('wcml_currency_switcher', ['format' => '%name% (%symbol%)']); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<section class="relative pt-28 lg:pt-36 pb-20 lg:pb-24 overflow-hidden">
			<div class="absolute inset-0 -z-10 bg-gradient-to-b from-secondary/40 via-background to-background"></div>
			<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
				<div class="absolute inset-0 opacity-[0.08]"
				     style="background:radial-gradient(ellipse 80% 60% at 20% 40%, hsl(200 62% 52%) 0%, transparent 70%), radial-gradient(ellipse 60% 50% at 80% 30%, hsl(213 53% 45%) 0%, transparent 70%)"></div>
				<div class="absolute rounded-full"
				     style="width:280px;height:280px;left:5%;top:10%;background:radial-gradient(circle at 30% 30%, hsla(200, 62%, 52%, 0.18), hsla(200, 62%, 52%, 0.03) 60%, transparent 80%);border:1px solid hsla(200, 62%, 52%, 0.12);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);box-shadow:inset 0 0 40px hsla(200, 62%, 80%, 0.08), 0 0 60px hsla(200, 62%, 52%, 0.06);animation:glass-float-1 14s ease-in-out infinite;animation-delay:0s;transform:translate(0px, 0px);will-change:transform;transition:transform 0.6s cubic-bezier(0.16, 1, 0.3, 1)"></div>
				<div class="absolute rounded-full"
				     style="width:200px;height:200px;left:70%;top:55%;background:radial-gradient(circle at 30% 30%, hsla(213, 53%, 45%, 0.20), hsla(200, 62%, 52%, 0.03) 60%, transparent 80%);border:1px solid hsla(200, 62%, 52%, 0.12);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);box-shadow:inset 0 0 40px hsla(200, 62%, 80%, 0.08), 0 0 60px hsla(200, 62%, 52%, 0.06);animation:glass-float-2 16s ease-in-out infinite;animation-delay:-4s;transform:translate(0px, 0px);will-change:transform;transition:transform 0.6s cubic-bezier(0.16, 1, 0.3, 1)"></div>
				<div class="absolute rounded-full"
				     style="width:140px;height:140px;left:55%;top:5%;background:radial-gradient(circle at 30% 30%, hsla(200, 62%, 52%, 0.15), hsla(200, 62%, 52%, 0.03) 60%, transparent 80%);border:1px solid hsla(200, 62%, 52%, 0.12);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);box-shadow:inset 0 0 40px hsla(200, 62%, 80%, 0.08), 0 0 60px hsla(200, 62%, 52%, 0.06);animation:glass-float-3 12s ease-in-out infinite;animation-delay:-8s;transform:translate(0px, 0px);will-change:transform;transition:transform 0.6s cubic-bezier(0.16, 1, 0.3, 1)"></div>
				<div class="absolute rounded-full"
				     style="width:240px;height:240px;left:20%;top:65%;background:radial-gradient(circle at 30% 30%, hsla(213, 53%, 45%, 0.16), hsla(200, 62%, 52%, 0.03) 60%, transparent 80%);border:1px solid hsla(200, 62%, 52%, 0.12);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);box-shadow:inset 0 0 40px hsla(200, 62%, 80%, 0.08), 0 0 60px hsla(200, 62%, 52%, 0.06);animation:glass-float-4 15s ease-in-out infinite;animation-delay:-2s;transform:translate(0px, 0px);will-change:transform;transition:transform 0.6s cubic-bezier(0.16, 1, 0.3, 1)"></div>
				<div class="absolute rounded-full"
				     style="width:110px;height:110px;left:82%;top:25%;background:radial-gradient(circle at 30% 30%, hsla(200, 62%, 52%, 0.19), hsla(200, 62%, 52%, 0.03) 60%, transparent 80%);border:1px solid hsla(200, 62%, 52%, 0.12);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);box-shadow:inset 0 0 40px hsla(200, 62%, 80%, 0.08), 0 0 60px hsla(200, 62%, 52%, 0.06);animation:glass-float-1 11s ease-in-out infinite;animation-delay:-6s;transform:translate(0px, 0px);will-change:transform;transition:transform 0.6s cubic-bezier(0.16, 1, 0.3, 1)"></div>
			</div>
			<div class="reveal container-x max-w-6xl mx-auto relative z-10 in">

				<div class="arqamweb-breadcrumb">
					<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
				</div>

				<h1 class="text-5xl md:text-6xl lg:text-7xl xl:text-[5.25rem] font-semibold leading-[1.02] tracking-[-0.03em] max-w-5xl">
					<?php esc_html_e('Clear prices where we can.', 'arqamweb'); ?><!-- --> <span
						class="text-gradient"><?php esc_html_e('Honest quotes where we should.', 'arqamweb'); ?></span></h1>

				<p class="mt-8 text-lg md:text-xl text-muted-foreground max-w-2xl leading-relaxed"><?php esc_html_e('Our productised services carry one published price worldwide — the same for a client in Cairo, Riyadh or London. Everything custom is scoped and quoted, because no two custom projects are the same.', 'arqamweb'); ?></p>

				<div class="mt-8 flex items-start gap-3 max-w-2xl rounded-2xl border border-border bg-secondary/40 px-5 py-4">
					<span class="text-primary shrink-0 mt-0.5"><?php echo arqamweb_v2_icon('info'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<p class="text-xs lg:text-sm text-muted-foreground leading-relaxed"><?php esc_html_e('All prices are shown in USD as a reference currency. You can pay in Egyptian Pounds, Saudi Riyal, UAE Dirham, Euro or US Dollar — whichever is easiest for you.', 'arqamweb'); ?></p>
				</div>

				<div class="mt-10 flex flex-wrap items-center gap-4">
					<a href="#service-websites"
					   class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-primary-foreground bg-gradient-primary rounded-full shadow-glow hover:-translate-y-0.5 transition-transform"><?php esc_html_e('See all plans', 'arqamweb'); ?>
						<?php echo arqamweb_v2_icon('arrow-right'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</a>
					<a href="<?php echo esc_url($aw_contact_url); ?>"
					   class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-foreground rounded-full border border-border hover:bg-accent transition-all">
						<?php esc_html_e('Talk to a strategist', 'arqamweb'); ?>
					</a>
				</div>

				<nav aria-label="<?php esc_attr_e('Pricing sections', 'arqamweb'); ?>" class="mt-12 flex flex-wrap gap-2.5">
					<?php foreach ($aw_services as $aw_nav) : ?>
						<a href="#service-<?php echo esc_attr($aw_nav['id']); ?>"
						   class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-border bg-background/70 backdrop-blur text-xs font-semibold text-muted-foreground hover:text-primary hover:border-primary/40 transition-all">
							<span class="font-mono text-[10px] text-primary/70"><?php echo esc_html($aw_nav['num']); ?></span>
							<?php echo esc_html($aw_nav['title']); ?>
						</a>
					<?php endforeach; ?>
				</nav>
			</div>
		</section>

		<section class="py-16 lg:py-20 border-y border-border/60 bg-surface/40 overflow-hidden">
			<div class="reveal container-x max-w-7xl mx-auto">
				<div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-10">
					<div>
						<div
							class="text-xs font-semibold tracking-[0.2em] uppercase text-primary mb-3"><?php esc_html_e('Trusted globally', 'arqamweb'); ?>
						</div>
						<h2 class="text-3xl lg:text-4xl font-semibold tracking-tight"><?php esc_html_e('Partnering with brands across', 'arqamweb'); ?>
							<span class="text-gradient"><?php esc_html_e('+10 countries', 'arqamweb'); ?></span></h2>
					</div>
					<p class="text-muted-foreground max-w-md text-sm"><?php esc_html_e('From Riyadh and Dubai to London, New York, Cairo and beyond — we ship websites that perform across every market we touch.', 'arqamweb'); ?></p>
				</div>
			</div>
			<div class="relative marquee-mask overflow-hidden">
				<div class="flex animate-marquee py-2" style="animation-duration:70s;width:max-content">
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/eg.png"
									     srcset="https://flagcdn.com/w160/eg.png 1x, https://flagcdn.com/w320/eg.png 2x"
									     alt="<?php esc_attr_e('Egypt flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Egypt', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/sa.png"
									     srcset="https://flagcdn.com/w160/sa.png 1x, https://flagcdn.com/w320/sa.png 2x"
									     alt="<?php esc_attr_e('Saudi Arabia flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Saudi Arabia', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/ae.png"
									     srcset="https://flagcdn.com/w160/ae.png 1x, https://flagcdn.com/w320/ae.png 2x"
									     alt="<?php esc_attr_e('United Arab Emirates flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('United Arab Emirates', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/kw.png"
									     srcset="https://flagcdn.com/w160/kw.png 1x, https://flagcdn.com/w320/kw.png 2x"
									     alt="<?php esc_attr_e('Kuwait flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Kuwait', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/om.png"
									     srcset="https://flagcdn.com/w160/om.png 1x, https://flagcdn.com/w320/om.png 2x"
									     alt="<?php esc_attr_e('Oman flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Oman', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/qa.png"
									     srcset="https://flagcdn.com/w160/qa.png 1x, https://flagcdn.com/w320/qa.png 2x"
									     alt="<?php esc_attr_e('Qatar flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Qatar', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/us.png"
									     srcset="https://flagcdn.com/w160/us.png 1x, https://flagcdn.com/w320/us.png 2x"
									     alt="<?php esc_attr_e('United States flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('United States', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/gb.png"
									     srcset="https://flagcdn.com/w160/gb.png 1x, https://flagcdn.com/w320/gb.png 2x"
									     alt="<?php esc_attr_e('United Kingdom flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('United Kingdom', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/ie.png"
									     srcset="https://flagcdn.com/w160/ie.png 1x, https://flagcdn.com/w320/ie.png 2x"
									     alt="<?php esc_attr_e('Ireland flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5">
										<?php esc_html_e('Ireland', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/de.png"
									     srcset="https://flagcdn.com/w160/de.png 1x, https://flagcdn.com/w320/de.png 2x"
									     alt="<?php esc_attr_e('Germany flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5">
										<?php esc_html_e('Germany', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/es.png"
									     srcset="https://flagcdn.com/w160/es.png 1x, https://flagcdn.com/w320/es.png 2x"
									     alt="<?php esc_attr_e('Spain flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Spain', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/eg.png"
									     srcset="https://flagcdn.com/w160/eg.png 1x, https://flagcdn.com/w320/eg.png 2x"
									     alt="<?php esc_attr_e('Egypt flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Egypt', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/sa.png"
									     srcset="https://flagcdn.com/w160/sa.png 1x, https://flagcdn.com/w320/sa.png 2x"
									     alt="<?php esc_attr_e('Saudi Arabia flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Saudi Arabia', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/ae.png"
									     srcset="https://flagcdn.com/w160/ae.png 1x, https://flagcdn.com/w320/ae.png 2x"
									     alt="<?php esc_attr_e('United Arab Emirates flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('United Arab Emirates', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/kw.png"
									     srcset="https://flagcdn.com/w160/kw.png 1x, https://flagcdn.com/w320/kw.png 2x"
									     alt="<?php esc_attr_e('Kuwait flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Kuwait', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/om.png"
									     srcset="https://flagcdn.com/w160/om.png 1x, https://flagcdn.com/w320/om.png 2x"
									     alt="<?php esc_attr_e('Oman flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Oman', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/qa.png"
									     srcset="https://flagcdn.com/w160/qa.png 1x, https://flagcdn.com/w320/qa.png 2x"
									     alt="<?php esc_attr_e('Qatar flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Qatar', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/us.png"
									     srcset="https://flagcdn.com/w160/us.png 1x, https://flagcdn.com/w320/us.png 2x"
									     alt="<?php esc_attr_e('United States flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('United States', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/gb.png"
									     srcset="https://flagcdn.com/w160/gb.png 1x, https://flagcdn.com/w320/gb.png 2x"
									     alt="<?php esc_attr_e('United Kingdom flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('United Kingdom', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/ie.png"
									     srcset="https://flagcdn.com/w160/ie.png 1x, https://flagcdn.com/w320/ie.png 2x"
									     alt="<?php esc_attr_e('Ireland flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5">
										<?php esc_html_e('Ireland', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/de.png"
									     srcset="https://flagcdn.com/w160/de.png 1x, https://flagcdn.com/w320/de.png 2x"
									     alt="<?php esc_attr_e('Germany flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5">
										<?php esc_html_e('Germany', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/es.png"
									     srcset="https://flagcdn.com/w160/es.png 1x, https://flagcdn.com/w320/es.png 2x"
									     alt="<?php esc_attr_e('Spain flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Spain', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php foreach ($aw_services as $aw_index => $aw_svc) : ?>
			<?php
			$aw_tiers  = $aw_svc['tiers'];
			$aw_single = 1 === count($aw_tiers);
			$aw_eyebrow_title = trim(explode('&', $aw_svc['title'])[0]);
			?>
			<section id="service-<?php echo esc_attr($aw_svc['id']); ?>"
			         data-pricing-section="<?php echo esc_attr($aw_svc['label']); ?>"
			         class="py-16 lg:py-24 scroll-mt-28 <?php echo 0 === $aw_index % 2 ? 'bg-background' : 'bg-secondary/30'; ?>">
				<div class="container-x max-w-7xl mx-auto">

					<div class="grid lg:grid-cols-12 gap-8 items-end mb-12">
						<div class="lg:col-span-7">
							<div class="inline-flex items-center gap-3 mb-4">
								<span class="text-[11px] font-mono font-semibold tracking-[0.22em] uppercase text-primary">
									<?php echo esc_html($aw_svc['num']); ?><!-- --> / <!-- --><?php echo esc_html($aw_eyebrow_title); ?>
								</span>
							</div>
							<h2 class="text-4xl lg:text-5xl xl:text-[3.25rem] font-semibold tracking-[-0.025em] leading-[1.05]">
								<?php echo esc_html($aw_svc['title']); ?>
							</h2>
							<p class="mt-4 text-muted-foreground text-base lg:text-lg max-w-xl leading-relaxed">
								<?php echo esc_html($aw_svc['subtitle']); ?>
							</p>
						</div>
						<div class="lg:col-span-5 lg:text-right">
							<div class="inline-flex flex-col gap-2 px-5 py-4 rounded-2xl bg-background border border-border shadow-card">
								<div class="flex items-center gap-2 text-primary">
									<?php echo arqamweb_v2_icon($aw_svc['icon'], 'w-5 h-5'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									<span class="text-xs font-bold tracking-[0.18em] uppercase">
										<?php
										if (null !== $aw_svc['from_usd']) {
											/* translators: %s: lowest published price for the service. */
											printf(esc_html__('From %s', 'arqamweb'), esc_html(arqamweb_v2_price((int) $aw_svc['from_usd'])));
										} else {
											esc_html_e('Quoted to scope', 'arqamweb');
										}
										?>
									</span>
								</div>
								<span class="text-xs text-muted-foreground"><?php echo esc_html($aw_svc['ships_in']); ?></span>
							</div>
						</div>
					</div>

					<?php if ($aw_single) : ?>
						<div class="grid lg:grid-cols-12 gap-8 lg:gap-10 items-start">
							<div class="lg:col-span-5">
								<?php
								// Drop-in point for the WooCommerce cards, matching pricing.php:
								// if (awp_service_has_packages('<slug>')) awp_render_service_cards('<slug>'); else …
								arqamweb_v2_card($aw_tiers[0], $aw_contact_url);
								?>
							</div>
							<div class="lg:col-span-7 flex flex-col justify-center lg:self-stretch">
								<?php arqamweb_v2_reassure($aw_svc['reassure'], true, 'mt-0'); ?>
								<?php if (!empty($aw_svc['extra_note'])) : ?>
									<p class="mt-6 max-w-2xl text-sm text-muted-foreground leading-relaxed"><?php echo esc_html($aw_svc['extra_note']); ?></p>
								<?php endif; ?>
								<?php arqamweb_v2_note($aw_svc); ?>
							</div>
						</div>
					<?php else : ?>
						<?php if (!empty($aw_tiers)) : ?>
							<div class="grid gap-6 lg:gap-7 auto-rows-fr <?php echo 2 === count($aw_tiers) ? 'md:grid-cols-2 max-w-4xl mx-auto' : 'md:grid-cols-2 lg:grid-cols-3'; ?>">
								<?php foreach ($aw_tiers as $aw_tier) : ?>
									<?php arqamweb_v2_card($aw_tier, $aw_contact_url); ?>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<?php if (!empty($aw_svc['extra_note'])) : ?>
							<p class="mt-6 max-w-2xl text-sm text-muted-foreground leading-relaxed"><?php echo esc_html($aw_svc['extra_note']); ?></p>
						<?php endif; ?>
						<?php arqamweb_v2_reassure($aw_svc['reassure']); ?>
						<?php arqamweb_v2_note($aw_svc); ?>
					<?php endif; ?>

				</div>
			</section>
		<?php endforeach; ?>

		<div class="container-x max-w-7xl mx-auto pt-4">
			<p class="text-center text-xs text-muted-foreground max-w-3xl mx-auto leading-relaxed"><?php esc_html_e('Prices exclude VAT. 50% deposit to start, 50% on delivery (one-time services) or monthly upfront (retainers). Prices are subject to update. Any change is communicated by email at least 60 days before renewal and never affects a contract term already in progress.', 'arqamweb'); ?></p>
		</div>

		<section class="py-20 lg:py-28 bg-secondary/30">
			<div class="reveal container-x max-w-7xl mx-auto in">
				<div class="text-center mb-14">
					<div class="inline-flex items-center gap-3 mb-5"><span class="h-px w-10 bg-primary/60"></span><span
							class="text-[11px] font-semibold tracking-[0.22em] uppercase text-primary"><?php esc_html_e('Why it works', 'arqamweb'); ?></span><span
							class="h-px w-10 bg-primary/60"></span></div>
					<h2 class="text-4xl lg:text-5xl xl:text-[3.5rem] font-semibold tracking-[-0.025em] leading-[1.05] max-w-3xl mx-auto">
						<?php esc_html_e('Priced on scope,', 'arqamweb'); ?><!-- --> <span
							class="text-gradient"><?php esc_html_e('confirmed in writing.', 'arqamweb'); ?></span></h2>
				</div>

				<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
					<?php
					$aw_why = [
						[
							'icon'  => 'trophy',
							'title' => __('Senior team on every engagement.', 'arqamweb'),
							'body'  => __('The people who scope your project are the ones who build it — no hand-off to a junior bench after the kickoff call.', 'arqamweb'),
						],
						[
							'icon'  => 'target',
							'title' => __('Scope-priced, not hour-priced.', 'arqamweb'),
							'body'  => __('We count the units of work — templates, languages, integrations, roles — and quote the exact figure before anything starts.', 'arqamweb'),
						],
						[
							'icon'  => 'zap',
							'title' => __('Built to scale, not to lock you in.', 'arqamweb'),
							'body'  => __('Short minimum terms, published task pricing, and accounts and source code that stay in your name.', 'arqamweb'),
						],
					];
					foreach ($aw_why as $aw_item) :
						?>
						<div class="p-7 rounded-3xl border border-border bg-background shadow-card">
							<div class="inline-flex items-center justify-center w-11 h-11 rounded-2xl bg-gradient-primary text-primary-foreground shadow-soft">
								<?php echo arqamweb_v2_icon($aw_item['icon'], 'w-5 h-5'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</div>
							<h3 class="mt-5 text-lg font-semibold tracking-tight"><?php echo esc_html($aw_item['title']); ?></h3>
							<p class="mt-2 text-sm text-muted-foreground leading-relaxed"><?php echo esc_html($aw_item['body']); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<section class="py-24 lg:py-32 bg-secondary/30">
			<div class="container-x max-w-4xl mx-auto">
				<div class="mb-12 text-center">
					<div class="inline-flex items-center gap-3 mb-5"><span class="h-px w-10 bg-primary/60"></span><span
							class="text-[11px] font-semibold tracking-[0.22em] uppercase text-primary"><?php esc_html_e('FAQ', 'arqamweb'); ?></span><span
							class="h-px w-10 bg-primary/60"></span></div>
					<h2 class="text-4xl lg:text-5xl font-semibold tracking-[-0.025em] leading-[1.05]"><?php esc_html_e('Questions, answered.', 'arqamweb'); ?></h2>
				</div>

				<?php

				set_query_var('faq_category', 'pricing');

				get_template_part('/template-parts/faqs/custom-loop', 'faqs'); ?>

			</div>
		</section>

		<section class="py-24 lg:py-32 bg-background">
			<div class="container-x max-w-5xl mx-auto">
				<div class="relative overflow-hidden rounded-[2rem] bg-[#124f85] text-white p-10 lg:p-16 shadow-elevated">
					<div class="absolute -top-32 -right-32 w-[28rem] h-[28rem] rounded-full bg-primary/30 blur-3xl"></div>
					<div class="absolute -bottom-32 -left-32 w-[28rem] h-[28rem] rounded-full bg-primary/20 blur-3xl"></div>
					<div class="relative text-center">
						<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/15 text-[11px] font-semibold tracking-[0.18em] uppercase text-white/80 mb-6">
							<?php echo arqamweb_v2_icon('sparkles', 'w-3 h-3'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php esc_html_e('Let\'s talk', 'arqamweb'); ?>
						</div>
						<h2 class="text-4xl lg:text-5xl xl:text-6xl font-semibold tracking-[-0.025em] leading-[1.05]">
							<?php esc_html_e('Not sure which plan', 'arqamweb'); ?><br><span
								class="text-gradient"><?php esc_html_e('fits your brand?', 'arqamweb'); ?></span></h2>
						<p class="mt-6 text-white/75 text-base lg:text-lg max-w-2xl mx-auto"><?php esc_html_e('Book a free 30-minute call. We\'ll recommend the right tier and send a written quote with the exact figure.', 'arqamweb'); ?></p>
						<div class="mt-10 flex flex-wrap justify-center gap-4">
							<a href="<?php echo esc_url($aw_contact_url); ?>"
							   class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-primary bg-white rounded-full shadow-glow hover:-translate-y-0.5 transition-transform"><?php esc_html_e('Request a Quote', 'arqamweb'); ?>
								<?php echo arqamweb_v2_icon('arrow-right'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</a>
							<a href="<?php echo esc_url($aw_contact_url); ?>"
							   class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-white rounded-full border border-white/30 hover:bg-white/10 transition-all">
								<?php esc_html_e('Book a free call', 'arqamweb'); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="py-20 lg:py-24 bg-secondary/30 border-t border-border">
			<div class="container-x max-w-4xl mx-auto text-center">
				<p class="text-[11px] font-semibold tracking-[0.22em] uppercase text-muted-foreground"><?php esc_html_e('Client Partnership Program', 'arqamweb'); ?></p>
				<h2 class="mt-5 text-3xl lg:text-4xl font-semibold tracking-[-0.02em] leading-[1.1]"><?php esc_html_e('Clients who grow with us, grow with us.', 'arqamweb'); ?></h2>
				<p class="mt-5 text-base text-muted-foreground leading-relaxed max-w-2xl mx-auto"><?php esc_html_e('Clients who share their experience — a short video, a case study, or a referral — take part in our partnership program. Ask us about it when we scope your project.', 'arqamweb'); ?></p>
				<a href="<?php echo esc_url($aw_contact_url); ?>"
				   class="mt-7 inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:gap-2.5 transition-all"><?php esc_html_e('Talk to us', 'arqamweb'); ?>
					<?php echo arqamweb_v2_icon('arrow-right', 'w-3.5 h-3.5'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
			</div>
		</section>
	</main>
</div>


<?php get_footer(); ?>
