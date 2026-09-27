<?php
/**
 * Pricing V2 Client Partnership Section
 *
 * Information about the client partnership program.
 *
 * @package Arqam-Web
 */

if (!defined('ABSPATH')) exit;

$aw_contact_url = arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG);
?>

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
