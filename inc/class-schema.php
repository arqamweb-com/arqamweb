<?php
/**
 * Schema.org JSON-LD structured data for Arqam-Web theme.
 *
 * Outputs Organization + WebSite on every page, and contextual schemas
 * (FAQPage, AggregateRating, Article, CreativeWork) on relevant templates.
 *
 * All output is printed inside wp_head() / wp_footer() via hooks.php.
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class ArqamWeb_Schema {

	/**
	 * Print a JSON-LD <script> block with the given data array.
	 */
	private static function print_jsonld( array $data ): void {
		if ( empty( $data ) ) return;
		echo "\n" . '<script type="application/ld+json">'
			. wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
			. '</script>' . "\n";
	}

	/**
	 * Organization + WebSite schemas — emit on every page in wp_head.
	 */
	public static function organization_and_website(): void {
		// Rank Math already emits Organization + WebSite — avoid duplication.
		if ( self::seo_plugin_active() ) return;

		$home  = home_url( '/' );
		$uri   = get_template_directory_uri();
		$name  = get_bloginfo( 'name' );
		$desc  = get_bloginfo( 'description' );

		$organization = [
			'@context'    => 'https://schema.org',
			'@type'       => 'Organization',
			'@id'         => $home . '#organization',
			'name'        => $name,
			'alternateName' => 'Arqam Web',
			'url'         => $home,
			'logo'        => [
				'@type'   => 'ImageObject',
				'url'     => $uri . '/frontend/img/Arqam-Web-Logo.png',
				'width'   => 200,
				'height'  => 55,
			],
			'description' => $desc,
			'email'       => defined( 'ARQAM_CONTACT_EMAIL' ) ? ARQAM_CONTACT_EMAIL : '',
			'telephone'   => defined( 'ARQAM_WHATSAPP_NUMBER' ) ? ARQAM_WHATSAPP_NUMBER : '',
			'sameAs'      => array_values( array_filter( [
				defined( 'ARQAM_SOCIAL_FACEBOOK_URL' )  ? ARQAM_SOCIAL_FACEBOOK_URL  : null,
				defined( 'ARQAM_SOCIAL_INSTAGRAM_URL' ) ? ARQAM_SOCIAL_INSTAGRAM_URL : null,
				defined( 'ARQAM_SOCIAL_LINKEDIN_URL' )  ? ARQAM_SOCIAL_LINKEDIN_URL  : null,
			] ) ),
			'address'     => [
				'@type'           => 'PostalAddress',
				'addressLocality' => 'Cairo',
				'addressCountry'  => 'EG',
			],
		];

		$website = [
			'@context'        => 'https://schema.org',
			'@type'           => 'WebSite',
			'@id'             => $home . '#website',
			'url'             => $home,
			'name'            => $name,
			'description'     => $desc,
			'inLanguage'      => get_bloginfo( 'language' ),
			'publisher'       => [ '@id' => $home . '#organization' ],
			'potentialAction' => [
				'@type'       => 'SearchAction',
				'target'      => [
					'@type'       => 'EntryPoint',
					'urlTemplate' => $home . '?s={search_term_string}',
				],
				'query-input' => 'required name=search_term_string',
			],
		];

		self::print_jsonld( $organization );
		self::print_jsonld( $website );
	}

	/**
	 * FAQPage schema — only on front page where FAQs are rendered.
	 * Pulls from the `faq` custom post type (title = question, content = answer).
	 */
	public static function faq_page(): void {
		if ( ! is_front_page() ) return;

		$query = new WP_Query( [
			'post_type'      => 'faq',
			'posts_per_page' => 10,
			'order'          => 'ASC',
			'no_found_rows'  => true,
		] );

		if ( ! $query->have_posts() ) return;

		$items = [];
		while ( $query->have_posts() ) {
			$query->the_post();
			$items[] = [
				'@type'          => 'Question',
				'name'           => wp_strip_all_tags( get_the_title() ),
				'acceptedAnswer' => [
					'@type' => 'Answer',
					'text'  => wp_strip_all_tags( get_the_content() ),
				],
			];
		}
		wp_reset_postdata();

		if ( empty( $items ) ) return;

		self::print_jsonld( [
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => $items,
		] );
	}

	/**
	 * AggregateRating + individual reviews on the front page.
	 * Uses `review` CPT; rating defaults to 5 unless a `rating` meta exists.
	 */
	public static function reviews_aggregate(): void {
		if ( ! is_front_page() ) return;

		$query = new WP_Query( [
			'post_type'      => 'review',
			'posts_per_page' => 20,
			'order'          => 'ASC',
			'no_found_rows'  => true,
		] );

		if ( ! $query->have_posts() ) return;

		$reviews = [];
		$total   = 0;
		$sum     = 0;
		while ( $query->have_posts() ) {
			$query->the_post();
			$rating = (int) get_post_meta( get_the_ID(), 'rating', true );
			if ( $rating < 1 || $rating > 5 ) $rating = 5;
			$total++;
			$sum += $rating;
			$reviews[] = [
				'@type'         => 'Review',
				'author'        => [
					'@type' => 'Person',
					'name'  => wp_strip_all_tags( get_the_title() ),
				],
				'reviewRating'  => [
					'@type'       => 'Rating',
					'ratingValue' => $rating,
					'bestRating'  => 5,
					'worstRating' => 1,
				],
				'reviewBody'    => wp_strip_all_tags( get_the_content() ),
			];
		}
		wp_reset_postdata();

		if ( $total === 0 ) return;

		$avg  = round( $sum / $total, 1 );
		$home = home_url( '/' );

		self::print_jsonld( [
			'@context'        => 'https://schema.org',
			'@type'           => 'Organization',
			'@id'             => $home . '#organization',
			'aggregateRating' => [
				'@type'       => 'AggregateRating',
				'ratingValue' => $avg,
				'bestRating'  => 5,
				'worstRating' => 1,
				'reviewCount' => $total,
			],
			'review'          => $reviews,
		] );
	}

	/**
	 * Article schema on single blog posts.
	 */
	public static function article(): void {
		if ( ! is_singular( 'post' ) ) return;
		// Rank Math already emits Article schema on single posts.
		if ( self::seo_plugin_active() ) return;

		$post_id = get_the_ID();
		$img     = get_the_post_thumbnail_url( $post_id, 'full' );
		$home    = home_url( '/' );

		$data = [
			'@context'         => 'https://schema.org',
			'@type'            => 'Article',
			'mainEntityOfPage' => [
				'@type' => 'WebPage',
				'@id'   => get_permalink( $post_id ),
			],
			'headline'         => wp_strip_all_tags( get_the_title( $post_id ) ),
			'description'      => wp_strip_all_tags( get_the_excerpt( $post_id ) ),
			'datePublished'    => get_the_date( 'c', $post_id ),
			'dateModified'     => get_the_modified_date( 'c', $post_id ),
			'author'           => [
				'@type' => 'Person',
				'name'  => get_the_author_meta( 'display_name', get_post_field( 'post_author', $post_id ) ),
			],
			'publisher'        => [ '@id' => $home . '#organization' ],
		];

		if ( $img ) {
			$data['image'] = [
				'@type' => 'ImageObject',
				'url'   => $img,
			];
		}

		self::print_jsonld( $data );
	}

	/**
	 * CreativeWork schema on single project pages.
	 */
	public static function project(): void {
		if ( ! is_singular( 'project' ) ) return;

		$post_id = get_the_ID();
		$home    = home_url( '/' );

		$img = null;
		if ( class_exists( 'ArqamWeb_Project' ) ) {
			$pimg = ArqamWeb_Project::get_portfolio_image( $post_id );
			if ( is_array( $pimg ) && ! empty( $pimg['url'] ) ) {
				$img = $pimg['url'];
			}
		}
		if ( ! $img ) {
			$img = get_the_post_thumbnail_url( $post_id, 'full' );
		}

		$data = [
			'@context'      => 'https://schema.org',
			'@type'         => 'CreativeWork',
			'name'          => wp_strip_all_tags( get_the_title( $post_id ) ),
			'description'   => wp_strip_all_tags( get_the_excerpt( $post_id ) ),
			'url'           => get_permalink( $post_id ),
			'datePublished' => get_the_date( 'c', $post_id ),
			'dateModified'  => get_the_modified_date( 'c', $post_id ),
			'creator'       => [ '@id' => $home . '#organization' ],
		];

		if ( $img ) {
			$data['image'] = $img;
		}

		self::print_jsonld( $data );
	}

	/**
	 * ItemList schema on blog index + all archive pages.
	 * Rank Math doesn't emit ItemList automatically, so this is always active.
	 * Also emits a Blog schema node on the blog index (is_home()).
	 */
	public static function item_list(): void {
		if ( ! ( is_home() || is_archive() ) ) return;
		if ( ! have_posts() ) return;

		$items = [];
		$pos   = 1;
		while ( have_posts() ) {
			the_post();
			$items[] = [
				'@type'    => 'ListItem',
				'position' => $pos++,
				'url'      => get_permalink(),
			];
		}
		rewind_posts();

		if ( ! empty( $items ) ) {
			self::print_jsonld( [
				'@context'        => 'https://schema.org',
				'@type'           => 'ItemList',
				'itemListElement' => $items,
			] );
		}

		if ( is_home() ) {
			$posts_page_id = (int) get_option( 'page_for_posts' );
			$blog_url      = $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/' );
			self::print_jsonld( [
				'@context'  => 'https://schema.org',
				'@type'     => 'Blog',
				'@id'       => $blog_url . '#blog',
				'name'      => get_bloginfo( 'name' ) . ' — Journal',
				'url'       => $blog_url,
				'publisher' => [ '@id' => home_url( '/' ) . '#organization' ],
			] );
		}
	}

	/**
	 * Person schema on author archive pages.
	 * Rank Math doesn't emit Person schema on author archives by default.
	 */
	public static function person_author(): void {
		if ( ! is_author() ) return;

		$author_id = (int) get_queried_object_id();
		$name      = get_the_author_meta( 'display_name', $author_id );
		if ( ! $name ) return;

		$data = [
			'@context' => 'https://schema.org',
			'@type'    => 'Person',
			'@id'      => get_author_posts_url( $author_id ) . '#person',
			'name'     => wp_strip_all_tags( $name ),
			'url'      => get_author_posts_url( $author_id ),
			'image'    => [
				'@type' => 'ImageObject',
				'url'   => get_avatar_url( $author_id, [ 'size' => 200 ] ),
			],
		];

		$bio = get_the_author_meta( 'description', $author_id );
		if ( $bio ) {
			$data['description'] = wp_strip_all_tags( $bio );
		}

		$website = get_the_author_meta( 'user_url', $author_id );
		if ( $website ) {
			$data['sameAs'] = [ $website ];
		}

		self::print_jsonld( $data );
	}

	// ──────────────────────────────────────────────────────────────────────────────
	// Open Graph + Twitter Card fallback
	// Only fires when Rank Math (or Yoast) is NOT active, preventing duplication.
	// ──────────────────────────────────────────────────────────────────────────────

	/**
	 * Returns true if an SEO plugin is already outputting OG tags.
	 */
	private static function seo_plugin_active(): bool {
		return defined( 'RANK_MATH_VERSION' )
			|| defined( 'WPSEO_VERSION' )       // Yoast SEO
			|| defined( 'AIOSEO_VERSION' );     // All-in-One SEO
	}

	/**
	 * Returns true when the current singular view is the service CPT.
	 */
	private static function is_service_singular(): bool {
		if ( ! is_singular() ) {
			return false;
		}

		return in_array( get_post_type(), [ 'service', 'services' ], true );
	}

	/**
	 * Build a best-effort description for the current request.
	 */
	private static function current_meta_description(): string {
		if ( is_singular() ) {
			$post_id = get_the_ID();
			$desc    = get_the_excerpt( $post_id );

			if ( ! $desc ) {
				$desc = wp_strip_all_tags( get_post_field( 'post_content', $post_id ) );
			}

			return wp_strip_all_tags( wp_trim_words( $desc, 30 ) );
		}

		if ( is_category() || is_tax() || is_tag() ) {
			$desc = term_description();
			if ( $desc ) {
				return wp_strip_all_tags( wp_trim_words( $desc, 30 ) );
			}
		}

		if ( is_post_type_archive() ) {
			return wp_strip_all_tags( post_type_archive_title( '', false ) );
		}

		return wp_strip_all_tags( get_bloginfo( 'description' ) );
	}

	/**
	 * Outputs Open Graph + Twitter Card meta tags as a theme fallback.
	 * Called via wp_head priority 2 — before most plugins but after title-tag.
	 */
	public static function opengraph_fallback(): void {
		if ( self::seo_plugin_active() ) return;

		$home    = home_url( '/' );
		$sitename= get_bloginfo( 'name' );
		$url     = '';
		$title   = '';
		$desc    = '';
		$img_url = '';
		$img_w   = '';
		$img_h   = '';
		$og_type = 'website';

		if ( is_singular() ) {
			$post_id   = get_the_ID();
			$url       = get_permalink( $post_id );
			$title     = wp_strip_all_tags( get_the_title( $post_id ) );
			$desc      = wp_strip_all_tags( wp_trim_words( get_the_excerpt( $post_id ), 30 ) );
			$og_type   = is_singular( 'post' ) ? 'article' : 'website';
			$thumb_id  = get_post_thumbnail_id( $post_id );
			$thumb_src = $thumb_id ? wp_get_attachment_image_src( $thumb_id, 'arqam-og' ) : false;
			$img_url   = $thumb_src ? $thumb_src[0] : '';
			$img_w     = $thumb_src ? (string) $thumb_src[1] : '';
			$img_h     = $thumb_src ? (string) $thumb_src[2] : '';
		} elseif ( is_front_page() || is_home() ) {
			$url     = $home;
			$title   = get_bloginfo( 'name' );
			$desc    = get_bloginfo( 'description' );
			$og_type = 'website';
		} elseif ( is_archive() || is_search() ) {
			$url   = get_pagenum_link();
			$title = wp_title( '|', false, 'right' ) . $sitename;
			$desc  = get_bloginfo( 'description' );
		} else {
			return;
		}

		// Fallback image: theme logo
		if ( ! $img_url ) {
			$img_url = get_template_directory_uri() . '/frontend/img/Arqam-Web-Logo.png';
		}

		$tags = [
			// ── Open Graph ──────────────────────────────────────────────────
			'og:type'               => $og_type,
			'og:url'                => $url,
			'og:title'              => $title,
			'og:description'        => $desc,
			'og:image'              => $img_url,
			'og:image:width'        => $img_w,
			'og:image:height'       => $img_h,
			'og:site_name'          => $sitename,
			'og:locale'             => str_replace( '-', '_', get_bloginfo( 'language' ) ),
			// ── Twitter Card ─────────────────────────────────────────────────
			'twitter:card'          => 'summary_large_image',
			'twitter:title'         => $title,
			'twitter:description'   => $desc,
			'twitter:image'         => $img_url,
		];

		echo "\n\t<!-- Arqam Web: Open Graph / Twitter Card fallback -->\n";
		foreach ( $tags as $property => $content ) {
			if ( empty( $content ) ) continue;
			$attr = str_starts_with( $property, 'twitter:' ) ? 'name' : 'property';
			printf(
				"\t<meta %s=\"%s\" content=\"%s\">\n",
				esc_attr( $attr ),
				esc_attr( $property ),
				esc_attr( $content )
			);
		}

		// Article-specific OG tags
		if ( $og_type === 'article' && isset( $post_id ) ) {
			printf( "\t<meta property=\"article:published_time\" content=\"%s\">\n", esc_attr( get_the_date( 'c', $post_id ) ) );
			printf( "\t<meta property=\"article:modified_time\" content=\"%s\">\n",  esc_attr( get_the_modified_date( 'c', $post_id ) ) );
		}
		echo "\n";
	}

	/**
	 * Outputs a meta description fallback when no SEO plugin is active.
	 */
	public static function meta_description_fallback(): void {
		if ( self::seo_plugin_active() ) return;

		$desc = self::current_meta_description();

		if ( empty( $desc ) ) {
			return;
		}

		printf(
			"\t<meta name=\"description\" content=\"%s\">\n",
			esc_attr( $desc )
		);
	}

	// ──────────────────────────────────────────────────────────────────────────────
	// Canonical URL fallback
	// Only fires when no SEO plugin is outputting a canonical tag.
	// ──────────────────────────────────────────────────────────────────────────────

	/**
	 * Outputs a <link rel="canonical"> as a theme-level fallback.
	 */
	public static function canonical_fallback(): void {
		if ( self::seo_plugin_active() ) return;

		$canonical = '';

		if ( is_singular() ) {
			$canonical = get_permalink( get_the_ID() );
		} elseif ( is_front_page() || is_home() ) {
			$canonical = home_url( '/' );
		} elseif ( is_archive() ) {
			$canonical = get_pagenum_link();
		} elseif ( is_search() ) {
			$canonical = get_search_link();
		}

		if ( $canonical ) {
			printf(
				"\t<link rel=\"canonical\" href=\"%s\">\n",
				esc_url( $canonical )
			);
		}
	}

	// ──────────────────────────────────────────────────────────────────────────────
	// hreflang — outputs alternate language links for WPML multilingual sites.
	// Rank Math handles hreflang when WPML + Rank Math are both active; this
	// fallback fires when Rank Math is absent but WPML is still active.
	// ──────────────────────────────────────────────────────────────────────────────

	/**
	 * Outputs <link rel="alternate" hreflang="..."> for every active WPML language.
	 * Also outputs an x-default tag pointing to the default language URL.
	 *
	 * Called via wp_head priority 3.
	 */
	public static function hreflang(): void {
		// Need WPML; skip if Rank Math (which handles this) is also present.
		if ( ! function_exists( 'icl_get_languages' ) ) return;
		if ( defined( 'RANK_MATH_VERSION' ) )            return;

		$languages = icl_get_languages( 'skip_missing=0&orderby=code' );
		if ( empty( $languages ) || ! is_array( $languages ) ) return;

		$default_url = '';

		echo "\n\t<!-- Arqam Web: hreflang alternate links -->\n";

		foreach ( $languages as $lang ) {
			// icl_get_languages gives us url, language_code, default_locale, active
			$href      = esc_url( $lang['url'] ?? '' );
			$lang_code = esc_attr( strtolower( $lang['language_code'] ?? '' ) );

			// Build a proper BCP-47 tag: e.g. "en" or "ar" or "ar-EG"
			// WPML provides default_locale like "en_US" or "ar" — convert to BCP-47
			$locale    = $lang['default_locale'] ?? $lang_code;
			$bcp47     = str_replace( '_', '-', $locale );

			if ( empty( $href ) || empty( $bcp47 ) ) continue;

			printf(
				"\t<link rel=\"alternate\" hreflang=\"%s\" href=\"%s\">\n",
				esc_attr( $bcp47 ),
				$href
			);

			// Capture default language URL for x-default
			if ( ! empty( $lang['default_locale'] ) && isset( $lang['active'] ) ) {
				// WPML marks the default language with 'default' key
				if ( ! empty( $lang['default_lang'] ) || ( function_exists( 'icl_get_default_language' ) && icl_get_default_language() === ( $lang['language_code'] ?? '' ) ) ) {
					$default_url = $href;
				}
			}
		}

		// x-default: fallback for users whose language is not listed
		// Use the site default language URL if found, otherwise home_url()
		if ( ! $default_url && function_exists( 'icl_get_default_language' ) ) {
			$default_lang = icl_get_default_language();
			if ( isset( $languages[ $default_lang ]['url'] ) ) {
				$default_url = esc_url( $languages[ $default_lang ]['url'] );
			}
		}
		if ( ! $default_url ) {
			$default_url = esc_url( home_url( '/' ) );
		}

		printf( "\t<link rel=\"alternate\" hreflang=\"x-default\" href=\"%s\">\n\n", $default_url );
	}

	/**
	 * Outputs a BreadcrumbList fallback when no SEO plugin is active.
	 */
	public static function breadcrumb_list(): void {
		if ( self::seo_plugin_active() ) return;
		if ( is_front_page() ) return;

		$items      = [];
		$position   = 1;
		$home_url   = home_url( '/' );
		$items[]    = [
			'@type'    => 'ListItem',
			'position' => $position++,
			'name'     => wp_strip_all_tags( get_bloginfo( 'name' ) ),
			'item'     => $home_url,
		];

		if ( is_home() ) {
			$posts_page_id = (int) get_option( 'page_for_posts' );
			$items[]       = [
				'@type'    => 'ListItem',
				'position' => $position++,
				'name'     => $posts_page_id ? wp_strip_all_tags( get_the_title( $posts_page_id ) ) : wp_strip_all_tags( __( 'Blog', 'arqamweb' ) ),
				'item'     => $posts_page_id ? get_permalink( $posts_page_id ) : get_post_type_archive_link( 'post' ),
			];
		} elseif ( is_singular() ) {
			$post_id    = get_the_ID();
			$post_type  = get_post_type_object( get_post_type( $post_id ) );
			$archive_url = $post_type && ! empty( $post_type->has_archive ) ? get_post_type_archive_link( $post_type->name ) : '';

			if ( 'post' === get_post_type( $post_id ) ) {
				$posts_page_id = (int) get_option( 'page_for_posts' );
				if ( $posts_page_id ) {
					$items[] = [
						'@type'    => 'ListItem',
						'position' => $position++,
						'name'     => wp_strip_all_tags( get_the_title( $posts_page_id ) ),
						'item'     => get_permalink( $posts_page_id ),
					];
				}
			} elseif ( $archive_url && $post_type ) {
				$items[] = [
					'@type'    => 'ListItem',
					'position' => $position++,
					'name'     => wp_strip_all_tags( $post_type->labels->name ),
					'item'     => $archive_url,
				];
			}

			$items[] = [
				'@type'    => 'ListItem',
				'position' => $position++,
				'name'     => wp_strip_all_tags( get_the_title( $post_id ) ),
				'item'     => get_permalink( $post_id ),
			];
		} elseif ( is_category() || is_tax() || is_tag() ) {
			$term = get_queried_object();

			if ( $term instanceof WP_Term ) {
				if ( is_tax() && ! is_category() && ! is_tag() ) {
					$taxonomy = get_taxonomy( $term->taxonomy );
					if ( $taxonomy ) {
						$items[] = [
							'@type'    => 'ListItem',
							'position' => $position++,
							'name'     => wp_strip_all_tags( $taxonomy->labels->name ),
							'item'     => get_post_type_archive_link( $taxonomy->object_type[0] ?? 'post' ) ?: $home_url,
						];
					}
				}

				$items[] = [
					'@type'    => 'ListItem',
					'position' => $position++,
					'name'     => wp_strip_all_tags( single_term_title( '', false ) ),
					'item'     => get_term_link( $term ),
				];
			}
		} elseif ( is_post_type_archive() ) {
			$post_type = get_query_var( 'post_type' );
			$post_type = is_array( $post_type ) ? reset( $post_type ) : $post_type;

			$items[] = [
				'@type'    => 'ListItem',
				'position' => $position++,
				'name'     => wp_strip_all_tags( post_type_archive_title( '', false ) ),
				'item'     => $post_type ? get_post_type_archive_link( $post_type ) : $home_url,
			];
		} elseif ( is_search() ) {
			$items[] = [
				'@type'    => 'ListItem',
				'position' => $position++,
				'name'     => wp_strip_all_tags( sprintf( __( 'Search results for: %s', 'arqamweb' ), get_search_query() ) ),
				'item'     => get_search_link(),
			];
		} elseif ( is_404() ) {
			$items[] = [
				'@type'    => 'ListItem',
				'position' => $position++,
				'name'     => wp_strip_all_tags( __( '404', 'arqamweb' ) ),
				'item'     => home_url( add_query_arg( null, null ) ),
			];
		}

		if ( count( $items ) < 2 ) {
			return;
		}

		self::print_jsonld(
			[
				'@context'        => 'https://schema.org',
				'@type'           => 'BreadcrumbList',
				'itemListElement' => $items,
			]
		);
	}

	// ──────────────────────────────────────────────────────────────────────────────
	// Rank Math integration — enhance its JSON-LD graph rather than duplicate it.
	// Hooks into `rank_math/json_ld` filter.
	// ──────────────────────────────────────────────────────────────────────────────

	/**
	 * Filter Rank Math's JSON-LD graph:
	 *   - Upgrade the Organization node into a LocalBusiness (geo, areaServed,
	 *     openingHoursSpecification, priceRange, sameAs).
	 *   - Inject a Service schema on single-service pages.
	 *
	 * @param array  $data    Rank Math JSON-LD data (associative — keyed by node id).
	 * @param object $jsonld  Rank Math JsonLD instance.
	 * @return array
	 */
	public static function enhance_rank_math_schema( $data, $jsonld ) {
		if ( ! is_array( $data ) ) return $data;

		$home = home_url( '/' );

		// ── 1. Upgrade Organization → LocalBusiness with richer business data ──
		foreach ( $data as $key => $node ) {
			if ( ! is_array( $node ) ) continue;
			$type = $node['@type'] ?? '';
			if ( $type === 'Organization' || $type === 'Corporation' ) {
				$data[ $key ]['@type'] = 'LocalBusiness';

				// Geo coordinates — Cairo, Egypt (approximate; override via constants if defined).
				$lat = defined( 'ARQAM_GEO_LAT' ) ? ARQAM_GEO_LAT : 30.0444;
				$lng = defined( 'ARQAM_GEO_LNG' ) ? ARQAM_GEO_LNG : 31.2357;
				$data[ $key ]['geo'] = [
					'@type'     => 'GeoCoordinates',
					'latitude'  => (float) $lat,
					'longitude' => (float) $lng,
				];

				// Areas served
				$data[ $key ]['areaServed'] = [
					[ '@type' => 'Country', 'name' => 'Egypt' ],
					[ '@type' => 'Country', 'name' => 'United Arab Emirates' ],
					[ '@type' => 'Country', 'name' => 'Saudi Arabia' ],
					[ '@type' => 'City',    'name' => 'Cairo' ],
					[ '@type' => 'City',    'name' => 'Dubai' ],
				];

				// Opening hours — Sun–Thu, 09:00–18:00 Cairo time.
				$data[ $key ]['openingHoursSpecification'] = [
					'@type'     => 'OpeningHoursSpecification',
					'dayOfWeek' => [ 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday' ],
					'opens'     => '09:00',
					'closes'    => '18:00',
				];

				// Price range placeholder
				if ( empty( $data[ $key ]['priceRange'] ) ) {
					$data[ $key ]['priceRange'] = '$$';
				}

				// Merge extra social URLs if we have them
				$extra_social = array_values( array_filter( [
					defined( 'ARQAM_SOCIAL_FACEBOOK_URL' )  ? ARQAM_SOCIAL_FACEBOOK_URL  : null,
					defined( 'ARQAM_SOCIAL_INSTAGRAM_URL' ) ? ARQAM_SOCIAL_INSTAGRAM_URL : null,
					defined( 'ARQAM_SOCIAL_LINKEDIN_URL' )  ? ARQAM_SOCIAL_LINKEDIN_URL  : null,
				] ) );
				if ( $extra_social ) {
					$existing = (array) ( $data[ $key ]['sameAs'] ?? [] );
					$data[ $key ]['sameAs'] = array_values( array_unique( array_merge( $existing, $extra_social ) ) );
				}
			}
		}

		// ── 2. Inject Service schema on single-service pages ──
		if ( self::is_service_singular() ) {
			$post_id = get_the_ID();
			$img     = get_the_post_thumbnail_url( $post_id, 'full' );

			$service = [
				'@context'    => 'https://schema.org',
				'@type'       => 'Service',
				'@id'         => get_permalink( $post_id ) . '#service',
				'name'        => wp_strip_all_tags( get_the_title( $post_id ) ),
				'description' => wp_strip_all_tags( wp_trim_words( get_the_excerpt( $post_id ) ?: get_the_content( null, false, $post_id ), 40 ) ),
				'url'         => get_permalink( $post_id ),
				'provider'    => [ '@id' => $home . '#organization' ],
				'areaServed'  => [
					[ '@type' => 'Country', 'name' => 'Egypt' ],
					[ '@type' => 'Country', 'name' => 'United Arab Emirates' ],
				],
			];
			if ( $img ) {
				$service['image'] = $img;
			}
			$data['service'] = $service;
		}

		return $data;
	}
}
