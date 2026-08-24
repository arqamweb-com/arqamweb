<?php
/**
 * Floating contact widget (WhatsApp / Email / Call).
 * Rendered site-wide via the `wp_footer` hook — see arqamweb_floating_contact().
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="fixed bottom-6 right-6 z-40 flex flex-col gap-3"><a href="https://wa.me/201118721404" target="_blank"
                                                                rel="noopener noreferrer" aria-label="<?php esc_attr_e('WhatsApp', 'arqamweb'); ?>"
                                                                class="group relative inline-flex items-center justify-center w-12 h-12 rounded-full text-white bg-emerald-500 shadow-glow hover:scale-110 transition-transform">
		<svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
			<path
				d="M20 3.5A11.5 11.5 0 0 0 3.7 19.6L2 22l2.5-1.6A11.5 11.5 0 1 0 20 3.5Zm-2.6 12.3c-.3-.1-1.7-.8-2-.9-.3-.1-.5-.1-.7.2-.2.3-.7.9-.9 1.1-.2.2-.3.2-.6.1-.3-.1-1.3-.5-2.4-1.5-.9-.8-1.5-1.7-1.7-2-.2-.3 0-.5.1-.6l.5-.6c.2-.2.2-.4.3-.6.1-.2 0-.4 0-.6 0-.2-.7-1.7-1-2.3-.3-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.4s1.1 2.8 1.2 3c.2.2 2.1 3.2 5 4.5 1.7.7 2.4.8 3.2.7.5-.1 1.7-.7 1.9-1.4.2-.7.2-1.3.2-1.4-.1-.1-.3-.2-.6-.3Z"></path>
		</svg>
		<span
			class="pointer-events-none absolute right-full mr-3 px-3 py-1.5 rounded-full text-xs font-semibold bg-foreground text-background opacity-0 -translate-x-1 group-hover:opacity-100 group-hover:translate-x-0 transition-all whitespace-nowrap"><?php esc_html_e('WhatsApp', 'arqamweb'); ?></span></a><a
			href="mailto:info@arqamweb.com" aria-label="<?php esc_attr_e('Email', 'arqamweb'); ?>"
			class="group relative inline-flex items-center justify-center w-12 h-12 rounded-full text-white bg-gradient-primary shadow-glow hover:scale-110 transition-transform">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
			<rect x="3" y="5" width="18" height="14" rx="2"></rect>
			<path d="m3 7 9 6 9-6"></path>
		</svg>
		<span
			class="pointer-events-none absolute right-full mr-3 px-3 py-1.5 rounded-full text-xs font-semibold bg-foreground text-background opacity-0 -translate-x-1 group-hover:opacity-100 group-hover:translate-x-0 transition-all whitespace-nowrap"><?php esc_html_e('Email', 'arqamweb'); ?></span></a><a
			href="tel:+201118721404" aria-label="<?php esc_attr_e('Call', 'arqamweb'); ?>"
			class="group relative inline-flex items-center justify-center w-12 h-12 rounded-full text-white bg-foreground text-background shadow-glow hover:scale-110 transition-transform">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5">
			<path
				d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.93.37 1.83.72 2.69a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.39-1.29a2 2 0 0 1 2.11-.45c.86.35 1.76.59 2.69.72A2 2 0 0 1 22 16.92Z"></path>
		</svg>
		<span
			class="pointer-events-none absolute right-full mr-3 px-3 py-1.5 rounded-full text-xs font-semibold bg-foreground text-background opacity-0 -translate-x-1 group-hover:opacity-100 group-hover:translate-x-0 transition-all whitespace-nowrap"><?php esc_html_e('Call', 'arqamweb'); ?></span></a>
</div>
