<?php

/**
 * The template for displaying the footer.
 *
 * @package Arqam-Web
 */

?>

<footer class="relative text-primary-foreground pt-24 pb-10 overflow-hidden bg-[oklch(0.14_0.03_252)]">
	<div class="aw-footer-atmosphere absolute inset-0 opacity-90"></div>
	<div class="absolute inset-0 grid-bg opacity-[0.07]"></div>
	<div class="absolute -top-40 -left-32 w-[520px] h-[520px] rounded-full bg-primary/25 blur-[120px] pointer-events-none"></div>
	<div class="absolute -bottom-40 -right-32 w-[560px] h-[560px] rounded-full bg-[color:var(--primary-deep)]/30 blur-[120px] pointer-events-none"></div>
	<div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-primary/60 to-transparent"></div>
	<div class="container relative">
		<div class="grid grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-10 pb-16 border-b border-white/10">
			<div class="col-span-2 lg:col-span-4">
				<div class="inline-block"><span class="text-2xl font-bold tracking-tight text-primary-foreground">ARQAM <span class="text-gradient">WEB</span></span></div>
				<p class="mt-6 text-primary-foreground/65 text-sm leading-relaxed max-w-sm"><?php esc_html_e('A senior digital marketing agency building high-performance websites, SEO strategies, brand identities and social-first content for ambitious brands across +10 countries — since 2010.', 'arqamweb'); ?></p>
				<div class="mt-7 flex items-center gap-2.5">
					<a href="https://www.facebook.com/ArqamWeb" target="_blank" rel="noopener noreferrer"
					   aria-label="<?php esc_attr_e('Facebook', 'arqamweb'); ?>"
					   class="w-10 h-10 rounded-full bg-white/8 hover:bg-gradient-primary text-primary-foreground flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5 hover:shadow-glow border border-white/10 hover:border-transparent">
						<?php get_template_part('template-parts/icons/facebook'); ?>
					</a>
					<a href="https://www.instagram.com/arqamweb/" target="_blank" rel="noopener noreferrer"
					   aria-label="<?php esc_attr_e('Instagram', 'arqamweb'); ?>"
					   class="w-10 h-10 rounded-full bg-white/8 hover:bg-gradient-primary text-primary-foreground flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5 hover:shadow-glow border border-white/10 hover:border-transparent">
						<?php get_template_part('template-parts/icons/instagram'); ?>
					</a>
					<a href="https://www.linkedin.com/company/68729209/" target="_blank" rel="noopener noreferrer"
					   aria-label="<?php esc_attr_e('LinkedIn', 'arqamweb'); ?>"
					   class="w-10 h-10 rounded-full bg-white/8 hover:bg-gradient-primary text-primary-foreground flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5 hover:shadow-glow border border-white/10 hover:border-transparent">
						<?php get_template_part('template-parts/icons/linkedin'); ?>
					</a>
					<a href="https://www.youtube.com/@ArqamWeb" target="_blank" rel="noopener noreferrer"
					   aria-label="<?php esc_attr_e('YouTube', 'arqamweb'); ?>"
					   class="w-10 h-10 rounded-full bg-white/8 hover:bg-gradient-primary text-primary-foreground flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5 hover:shadow-glow border border-white/10 hover:border-transparent">
						<?php get_template_part('template-parts/icons/youtube'); ?>
					</a>
				</div>
			</div>
			<div class="lg:col-span-2">
				<h4 class="font-semibold mb-5 text-sm tracking-wider uppercase text-primary-foreground/90"><?php esc_html_e('Company', 'arqamweb'); ?></h4>
				<?php wp_nav_menu( [
					'theme_location' => 'quick-links',
					'container'      => false,
					'items_wrap'     => '<ul class="footer-nav-list space-y-3 text-sm text-primary-foreground/65">%3$s</ul>',
					'depth'          => 1,
					'fallback_cb'    => false,
				] ); ?>
			</div>
			<div class="lg:col-span-3">
				<h4 class="font-semibold mb-5 text-sm tracking-wider uppercase text-primary-foreground/90"><?php esc_html_e('Services', 'arqamweb'); ?></h4>
				<?php wp_nav_menu( [
					'theme_location' => 'services',
					'container'      => false,
					'items_wrap'     => '<ul class="footer-nav-list space-y-3 text-sm text-primary-foreground/65">%3$s</ul>',
					'depth'          => 1,
					'fallback_cb'    => false,
				] ); ?>
			</div>
			<div class="lg:col-span-3">
				<h4 class="font-semibold mb-5 text-sm tracking-wider uppercase text-primary-foreground/90"><?php esc_html_e('Get in touch', 'arqamweb'); ?></h4>
				<ul class="space-y-4 text-sm text-primary-foreground/75">
					<li class="flex items-start gap-3"><span class="mt-0.5 shrink-0 text-primary"><?php get_template_part('template-parts/icons/mail'); ?></span><a href="mailto:info@arqamweb.com" class="hover:text-primary transition-colors">info@arqamweb.com</a></li>
					<li class="flex items-start gap-3"><span class="mt-0.5 shrink-0 text-primary"><?php get_template_part('template-parts/icons/phone'); ?></span><a href="tel:+201118721404" class="hover:text-primary transition-colors" dir="ltr">+201118721404</a></li>
					<li class="flex items-start gap-3"><span class="mt-0.5 shrink-0 text-primary"><?php get_template_part('template-parts/icons/map-pin'); ?></span><span class="leading-snug text-primary-foreground/65"><?php esc_html_e('44 Almehwar Almarkazi, Alsaraya', 'arqamweb'); ?><br><?php esc_html_e('Mall, Sheikh Zayed, Giza, Egypt.', 'arqamweb'); ?></span></li>
				</ul>
			</div>
		</div>
		<div class="pt-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4 text-xs text-primary-foreground/55">
			<div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3"><span>© <?php echo esc_html(arqamweb_get_copyright_year()); ?> <?php esc_html_e('Arqam Web. All rights reserved.', 'arqamweb'); ?></span></div>
			<div class="flex items-center gap-6">
				<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_PRIVACY_PAGE_SLUG)); ?>" class="hover:text-primary transition-colors"><?php esc_html_e('Privacy Policy', 'arqamweb'); ?></a>
				<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_TERMS_PAGE_SLUG)); ?>" class="hover:text-primary transition-colors"><?php esc_html_e('Terms of Service', 'arqamweb'); ?></a>
				<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_COOKIE_PAGE_SLUG)); ?>" class="hover:text-primary transition-colors"><?php esc_html_e('Cookies', 'arqamweb'); ?></a>
			</div>
		</div>
	</div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
