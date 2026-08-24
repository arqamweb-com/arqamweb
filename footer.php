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
						<svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
							<path d="M22 12a10 10 0 10-11.6 9.9v-7H8v-2.9h2.4V9.8c0-2.4 1.4-3.7 3.6-3.7 1 0 2.1.2 2.1.2v2.3h-1.2c-1.2 0-1.5.7-1.5 1.5v1.8h2.6l-.4 2.9h-2.2v7A10 10 0 0022 12z"></path>
						</svg>
					</a>
					<a href="https://www.instagram.com/arqamweb/" target="_blank" rel="noopener noreferrer"
					   aria-label="<?php esc_attr_e('Instagram', 'arqamweb'); ?>"
					   class="w-10 h-10 rounded-full bg-white/8 hover:bg-gradient-primary text-primary-foreground flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5 hover:shadow-glow border border-white/10 hover:border-transparent">
						<svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
							<path d="M3 7a4 4 0 014-4h10a4 4 0 014 4v10a4 4 0 01-4 4H7a4 4 0 01-4-4zM12 8a4 4 0 100 8 4 4 0 000-8zM18 5.5a1 1 0 110 2 1 1 0 010-2z"></path>
						</svg>
					</a>
					<a href="https://www.linkedin.com/company/68729209/" target="_blank" rel="noopener noreferrer"
					   aria-label="<?php esc_attr_e('LinkedIn', 'arqamweb'); ?>"
					   class="w-10 h-10 rounded-full bg-white/8 hover:bg-gradient-primary text-primary-foreground flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5 hover:shadow-glow border border-white/10 hover:border-transparent">
						<svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
							<path d="M4 4h4v16H4zM6 2a2 2 0 110 4 2 2 0 010-4zM10 8h4v2c.7-1 2-2 4-2 3 0 4 2 4 5v7h-4v-6c0-2-1-3-2-3s-2 1-2 3v6h-4z"></path>
						</svg>
					</a>
					<a href="https://www.youtube.com/@ArqamWeb" target="_blank" rel="noopener noreferrer"
					   aria-label="<?php esc_attr_e('YouTube', 'arqamweb'); ?>"
					   class="w-10 h-10 rounded-full bg-white/8 hover:bg-gradient-primary text-primary-foreground flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5 hover:shadow-glow border border-white/10 hover:border-transparent">
						<svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
							<path d="M23 7.5a3 3 0 00-2.1-2.1C19 5 12 5 12 5s-7 0-8.9.4A3 3 0 001 7.5C.6 9.4.6 12 .6 12s0 2.6.4 4.5a3 3 0 002.1 2.1C5 19 12 19 12 19s7 0 8.9-.4a3 3 0 002.1-2.1c.4-1.9.4-4.5.4-4.5s0-2.6-.4-4.5zM10 15.5v-7l6 3.5-6 3.5z"></path>
						</svg>
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
					<li class="flex items-start gap-3"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="mt-0.5 shrink-0 text-primary">
							<rect x="3" y="5" width="18" height="14" rx="2"></rect>
							<path d="M3 7l9 6 9-6"></path>
						</svg><a href="mailto:info@arqamweb.com" class="hover:text-primary transition-colors">info@arqamweb.com</a></li>
					<li class="flex items-start gap-3"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="mt-0.5 shrink-0 text-primary">
							<path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L8 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0122 16.92z"></path>
						</svg><a href="tel:+201118721404" class="hover:text-primary transition-colors" dir="ltr">+201118721404</a></li>
					<li class="flex items-start gap-3"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="mt-0.5 shrink-0 text-primary">
							<path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1118 0z"></path>
							<circle cx="12" cy="10" r="3"></circle>
						</svg><span class="leading-snug text-primary-foreground/65"><?php esc_html_e('44 Almehwar Almarkazi, Alsaraya', 'arqamweb'); ?><br><?php esc_html_e('Mall, Sheikh Zayed, Giza, Egypt.', 'arqamweb'); ?></span></li>
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
