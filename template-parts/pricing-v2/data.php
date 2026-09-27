<?php
/**
 * Pricing V2 Services Data
 *
 * Service sections data array for pricing-v2 template.
 *
 * @package Arqam-Web
 */

if (!defined('ABSPATH')) exit;

$aw_quote_url   = arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG);
$aw_contact_url = arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG);

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

