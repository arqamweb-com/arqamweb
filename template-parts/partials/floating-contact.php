<?php
/**
 * Floating contact widget — single WhatsApp CTA.
 *
 * Previously rendered three stacked buttons (WhatsApp / Email / Call), which
 * visually overlapped the Tawk chat bubble and, on small viewports, sat on
 * top of page headings/body copy. Consolidated into one clear WhatsApp CTA
 * per the CRO/UX review (unify floating contact buttons).
 *
 * Rendered site-wide via the `wp_footer` hook — see arqamweb_floating_contact().
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="aw-floating-contact">
	<a href="https://wa.me/201118721404" target="_blank"
	   rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Chat with us on WhatsApp', 'arqamweb' ); ?>"
	   class="aw-floating-contact__btn group">
		<svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
			<path
				d="M20 3.5A11.5 11.5 0 0 0 3.7 19.6L2 22l2.5-1.6A11.5 11.5 0 1 0 20 3.5Zm-2.6 12.3c-.3-.1-1.7-.8-2-.9-.3-.1-.5-.1-.7.2-.2.3-.7.9-.9 1.1-.2.2-.3.2-.6.1-.3-.1-1.3-.5-2.4-1.5-.9-.8-1.5-1.7-1.7-2-.2-.3 0-.5.1-.6l.5-.6c.2-.2.2-.4.3-.6.1-.2 0-.4 0-.6 0-.2-.7-1.7-1-2.3-.3-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.4s1.1 2.8 1.2 3c.2.2 2.1 3.2 5 4.5 1.7.7 2.4.8 3.2.7.5-.1 1.7-.7 1.9-1.4.2-.7.2-1.3.2-1.4-.1-.1-.3-.2-.6-.3Z"></path>
		</svg>
		<span class="aw-floating-contact__tooltip"><?php esc_html_e( 'Chat on WhatsApp', 'arqamweb' ); ?></span>
	</a>
</div>
