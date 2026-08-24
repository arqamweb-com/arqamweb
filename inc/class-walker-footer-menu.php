<?php

/**
 * Custom Footer Walker
 *
 * Moved from functions.php (lines 307-365) during architecture refactor
 *
 * @package Arqam-Web
 */

if (! defined('ABSPATH')) {
	exit;
}

class ArqamWeb_Walker_Footer_Menu extends Walker_Nav_Menu
{
	function start_lvl(&$output, $depth = 0, $args = null)
	{
		$output .= '<ul class="space-y-3 pl-4 text-gray-400">'; // إضافة تنسيق مخصص للقائمة الفرعية
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		$classes = !empty($item->classes) && is_array($item->classes) ? $item->classes : array();

		$output .= '<li class="text-gray-400 hover:text-white transition-colors">';

		$atts = array();

		if (!empty($item->url)) {
			$atts['href'] = $item->url;
		}

		if (in_array('current-menu-item', $classes)) {
			$atts['aria-current'] = 'page';
		}

		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (!empty($value)) {
				$value = esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$output .= '<a' . $attributes . ' class="flex items-center group text-base">';
		$output .= '<span class="mr-1 group-hover:opacity-100 opacity-0 transition-opacity rtl:ml-1">';
		$output .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3 w-3 mr-2 opacity-0 group-hover:opacity-100 transition-opacity rtl:rotate-180"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>';
		$output .= '</span>';
		$output .= apply_filters('the_title', $item->title, $item->ID);
		$output .= '</a>';
		$output .= '</li>';
	}

	function end_lvl(&$output, $depth = 0, $args = null)
	{
		$output .= '</ul>'; // نهاية الـ <ul> للقائمة الفرعية
	}

	function end_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		$output .= '</li>'; // نهاية كل <li>
	}
}
