<?php
/**
 * Cookie consent banner partial.
 * Displays GDPR-compliant cookie consent notice with Accept/Reject/Settings options.
 * Rendered site-wide via the `wp_footer` hook.
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$cookie_policy_url = arqamweb_get_page_permalink( ARQAM_COOKIE_PAGE_SLUG );
?>

<div id="cookie-consent-banner"
     class="fixed bottom-0 left-0 right-0 z-50 transform translate-y-full transition-transform duration-500 ease-out"
     role="dialog"
     aria-live="polite"
     aria-label="<?php esc_attr_e( 'Cookie consent banner', 'arqamweb' ); ?>"
     aria-hidden="true"
     data-consent-state="hidden">

	<div class="relative bg-[oklch(0.14_0.03_252)] text-primary-foreground shadow-2xl border-t border-white/10">
		<!-- Decorative gradients -->
		<div class="absolute inset-0 grid-bg opacity-[0.05] pointer-events-none"></div>
		<div class="absolute -top-20 ltr:-left-20 rtl:-right-20 w-[300px] h-[300px] rounded-full bg-primary/20 blur-[100px] pointer-events-none"></div>
		<div class="absolute -bottom-20 ltr:-right-20 rtl:-left-20 w-[350px] h-[350px] rounded-full bg-[color:var(--primary-deep)]/25 blur-[100px] pointer-events-none"></div>

		<div class="container relative">
			<div class="py-6 md:py-8">
				<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

					<!-- Message content -->
					<div class="flex-1 max-w-3xl">
						<div class="flex items-start gap-3 mb-3">
							<svg class="w-6 h-6 shrink-0 text-primary mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
								<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
							</svg>
							<div>
								<h3 class="text-lg font-semibold mb-2 text-primary-foreground">
									<?php esc_html_e( 'Cookie Settings', 'arqamweb' ); ?>
								</h3>
								<p class="text-sm text-primary-foreground/75 leading-relaxed">
									<?php
									printf(
										/* translators: %s: link to cookie policy page */
										esc_html__( 'We use cookies to enhance your browsing experience, serve personalized content, and analyze our traffic. By clicking "Accept All", you consent to our use of cookies. You can manage your preferences or learn more in our %s.', 'arqamweb' ),
										sprintf(
											'<a href="%s" class="text-primary hover:underline font-medium">%s</a>',
											esc_url( $cookie_policy_url ),
											esc_html__( 'Cookie Policy', 'arqamweb' )
										)
									);
									?>
								</p>
							</div>
						</div>
					</div>

					<!-- Action buttons -->
					<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 lg:shrink-0">
						<button type="button"
						        id="cookie-settings-btn"
						        class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-primary-foreground/90 bg-white/8 hover:bg-white/12 rounded-lg border border-white/10 hover:border-white/20 transition-all duration-300 hover:-translate-y-0.5"
						        aria-label="<?php esc_attr_e( 'Customize cookie settings', 'arqamweb' ); ?>">
							<svg class="w-4 h-4 me-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<circle cx="12" cy="12" r="3"></circle>
								<path d="M12 1v6m0 6v6m8.66-10.66-4.24 4.24m-4.24 4.24-4.24 4.24M23 12h-6m-6 0H1m19.07-8.07-4.24 4.24m-4.24 4.24-4.24 4.24"></path>
							</svg>
							<?php esc_html_e( 'Cookie Settings', 'arqamweb' ); ?>
						</button>

						<button type="button"
						        id="cookie-reject-btn"
						        class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-primary-foreground/90 bg-white/8 hover:bg-white/12 rounded-lg border border-white/10 hover:border-white/20 transition-all duration-300 hover:-translate-y-0.5"
						        aria-label="<?php esc_attr_e( 'Reject optional cookies', 'arqamweb' ); ?>">
							<svg class="w-4 h-4 me-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<path d="M18 6 6 18"></path>
								<path d="m6 6 12 12"></path>
							</svg>
							<?php esc_html_e( 'Reject All', 'arqamweb' ); ?>
						</button>

						<button type="button"
						        id="cookie-accept-btn"
						        class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-semibold text-white bg-gradient-primary hover:shadow-glow rounded-lg transition-all duration-300 hover:-translate-y-0.5"
						        aria-label="<?php esc_attr_e( 'Accept all cookies', 'arqamweb' ); ?>">
							<svg class="w-4 h-4 me-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<path d="M20 6 9 17l-5-5"></path>
							</svg>
							<?php esc_html_e( 'Accept All', 'arqamweb' ); ?>
						</button>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
