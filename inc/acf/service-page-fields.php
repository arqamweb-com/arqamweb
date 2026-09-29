<?php
/**
 * ACF fields for the single service page (Lovable service detail design).
 *
 * The site runs the free ACF, so every list is a textarea: one item per line,
 * columns separated by " | ". The instructions under each field show the format.
 *
 * @package Arqam-Web
 */

if (! defined('ABSPATH')) {
	exit;
}

add_action('acf/include_fields', 'arqamweb_register_service_page_fields');

function arqamweb_register_service_page_fields(): void
{
	if (! function_exists('acf_add_local_field_group')) {
		return;
	}

	// wpml_cf_preferences = 2 → ACFML يعامل الحقل كنص بيتترجم لكل لغة.
	$text = function (string $name, string $label, string $instructions = '', string $placeholder = ''): array {
		return [
			'key' => 'field_sp_' . $name,
			'name' => 'sp_' . $name,
			'label' => $label,
			'type' => 'text',
			'instructions' => $instructions,
			'placeholder' => $placeholder,
			'wpml_cf_preferences' => 2,
		];
	};
	$area = function (string $name, string $label, string $instructions = '', int $rows = 4): array {
		return [
			'key' => 'field_sp_' . $name,
			'name' => 'sp_' . $name,
			'label' => $label,
			'type' => 'textarea',
			'instructions' => $instructions,
			'rows' => $rows,
			'new_lines' => '',
			'wpml_cf_preferences' => 2,
		];
	};
	$tab = function (string $name, string $label): array {
		return [
			'key' => 'field_sp_tab_' . $name,
			'label' => $label,
			'type' => 'tab',
			'placement' => 'top',
		];
	};

	$visuals = implode(', ', array_keys(arqamweb_service_illustrations()));

	acf_add_local_field_group([
		'key' => 'group_arqam_service_page',
		'title' => 'Service Page',
		'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'service']]],
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'menu_order' => 5,
		'fields' => [
			$tab('listing', 'Services page card'),
			$text('summary', 'Short summary', 'One sentence on the Services page card and in "Other services". Empty = excerpt.', 'Custom-coded websites and online stores that bring in business.'),
			$text('card_price', 'Price chip', 'Small chip on the Services page card. Empty = hidden.', 'From $490'),

			$tab('hero', 'Hero'),
			$text('eyebrow', 'Eyebrow / short name', 'Shown in the pill above the title, and in "Other services" cards. Empty = post title.', 'Website Design & Development'),
			$text('title', 'Title (first part)', 'Empty = post title.', 'Websites built to'),
			$text('highlight', 'Title (gradient part)', 'Shown after the title in the blue gradient.', 'bring in business.'),
			$area('intro', 'Intro paragraph', 'Empty = post excerpt.', 3),
			$area('trust', 'Trust chips', 'One chip per line.', 3),
			$text('chip_a', 'Floating card: Delivery', 'Value under "Delivery". Empty = hidden.', '5 working days'),
			$text('chip_b_label', 'Floating card 2: label', '', 'Starting from'),
			$text('chip_b', 'Floating card 2: value', 'Empty = hidden.', '$490'),
			$area('metrics', 'Metrics row', 'One per line: Value | Label', 4),

			$tab('problem', 'Problem'),
			$text('problem_title', 'Title'),
			$area('problem_lead', 'Lead paragraph', '', 3),
			$area('problem_points', 'Problem points', 'One per line: Title | Description', 6),

			$tab('included', 'Included'),
			$text('included_title', 'Title', 'The last 3 words are shown in the gradient.'),
			$area('included', 'Included items', 'One per line: Title | Description | illustration. Illustrations: ' . $visuals, 8),
			$text('included_callout', 'Dark callout card text'),
			$text('included_note', 'Dark callout small note', 'Optional, e.g. "No lock-in, ever."'),

			$tab('compare', 'Compare'),
			$text('compare_1_label', 'Tab 1 label', '', 'vs Freelancer'),
			$text('compare_1_other', 'Tab 1 competitor name', '', 'Freelancer'),
			$area('compare_1_us', 'Tab 1: Arqam Web points', 'One per line.', 5),
			$area('compare_1_them', 'Tab 1: competitor points', 'One per line.', 5),
			$text('compare_2_label', 'Tab 2 label', '', 'vs Typical agency'),
			$text('compare_2_other', 'Tab 2 competitor name', '', 'Typical agency'),
			$area('compare_2_us', 'Tab 2: Arqam Web points', 'One per line.', 5),
			$area('compare_2_them', 'Tab 2: competitor points', 'One per line.', 5),

			$tab('process', 'Process'),
			$text('process_title', 'Title', 'Text after the first full stop is shown in the gradient. Empty = "Six steps. No surprises."'),
			$text('process_lead', 'Subtitle', 'Empty = default sentence.'),
			$area('process', 'Steps', 'One per line: Title | Description (numbers are added automatically)', 6),

			$tab('work', 'Work'),
			[
				'key' => 'field_sp_work_style',
				'name' => 'sp_work_style',
				'label' => 'Work section style',
				'type' => 'select',
				'choices' => ['case' => 'Case studies ("What we\'ve built")', 'hosted' => 'Hosted sites ("Sites we host & look after")'],
				'default_value' => 'case',
				'wpml_cf_preferences' => 1,
			],
			$area('projects', 'Projects', 'One per line: Name | Country | Tag | Image URL (or a path inside the theme) | Link URL | Description | Metrics. Metrics format: value=label; value=label (up to 3).', 6),

			$tab('pricing', 'Pricing'),
			$text('pricing_title', 'Title', 'Text after the first full stop goes on a new line in the gradient.'),
			[
				'key' => 'field_sp_pricing_service',
				'name' => 'sp_pricing_service',
				'label' => 'WooCommerce packages',
				'type' => 'select',
				'instructions' => 'Plans come from WooCommerce products in this Pricing service (Arqam Woo Pricing). None = section hidden.',
				'choices' => [
					'' => 'None',
					'web-development' => 'Web development',
					'seo' => 'SEO',
					'branding' => 'Branding',
					'social-media' => 'Social media',
				],
				'allow_null' => 0,
				'wpml_cf_preferences' => 1,
			],

			$tab('reviews', 'Reviews'),
			$area('reviews', 'Reviews', 'One per line: Quote | Name | Role', 5),

			$tab('faq', 'FAQ'),
			$area('faq', 'Questions', 'One per line: Question | Answer', 8),

			$tab('cta', 'Final CTA'),
			$text('cta_eyebrow', 'Eyebrow', 'Empty = "Ready to get started?"'),
			$text('cta_title', 'Title'),
			$text('cta_accent', 'Title (gradient line)'),
			$area('cta_text', 'Text', '', 3),
		],
	]);
}
