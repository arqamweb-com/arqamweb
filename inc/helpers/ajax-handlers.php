<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function arqamweb_handle_quote_request() {
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'arqamweb_quote_nonce' ) ) {
		wp_send_json_error( __( 'Security check failed. Please refresh and try again.', 'arqamweb' ) );
	}

	$service = sanitize_text_field( wp_unslash( $_POST['service'] ?? '' ) );
	$allowed_services = [ 'branding', 'website', 'seo' ];

	if ( empty( $service ) || ! in_array( $service, $allowed_services, true ) ) {
		wp_send_json_error( __( 'Please select a service.', 'arqamweb' ) );
	}

	$data = [];

	foreach ( $_POST as $key => $value ) {
		if ( $key === 'nonce' || $key === 'action' || $key === 'service' ) continue;

		if ( is_array( $value ) ) {
			$data[$key] = array_map( 'sanitize_text_field', wp_unslash( $value ) );
		} else {
			$data[$key] = sanitize_text_field( wp_unslash( $value ) );
		}
	}

	$full_name = $data['full_name'] ?? '';
	$email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );

	if ( empty( $full_name ) || ! is_email( $email ) ) {
		wp_send_json_error( __( 'Name and a valid email address are required.', 'arqamweb' ) );
	}

	$attachments = [];
	$uploaded_files = [];
	$uploaded_file_fields = [];

	if ( ! empty( $_FILES ) ) {
		require_once ABSPATH . 'wp-admin/includes/file.php';

		$allowed_file_fields = [
			'upload_logo',
			'upload_seo_report',
		];

		$allowed_mimes = [
			'jpg|jpeg' => 'image/jpeg',
			'png'      => 'image/png',
			'svg'      => 'image/svg+xml',
			'pdf'      => 'application/pdf',
			'doc'      => 'application/msword',
			'docx'     => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
			'xls'      => 'application/vnd.ms-excel',
			'xlsx'     => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			'csv'      => 'text/csv',
			'ai'       => 'application/postscript',
			'eps'      => 'application/postscript',
		];

		foreach ( $_FILES as $field => $file ) {
			if ( ! in_array( $field, $allowed_file_fields, true ) ) {
				continue;
			}

			if ( empty( $file['name'] ) || ! isset( $file['error'] ) || UPLOAD_ERR_NO_FILE === (int) $file['error'] ) {
				continue;
			}

			if ( UPLOAD_ERR_OK !== (int) $file['error'] ) {
				wp_send_json_error( __( 'One of the uploaded files could not be processed.', 'arqamweb' ) );
			}

			if ( ! empty( $file['size'] ) && (int) $file['size'] > 8 * 1024 * 1024 ) {
				wp_send_json_error( __( 'Uploaded files must be 8 MB or smaller.', 'arqamweb' ) );
			}

			$uploaded = wp_handle_upload(
				$file,
				[
					'test_form' => false,
					'mimes'     => $allowed_mimes,
				]
			);

			if ( isset( $uploaded['error'] ) ) {
				wp_send_json_error( sanitize_text_field( $uploaded['error'] ) );
			}

			if ( ! empty( $uploaded['file'] ) ) {
				$attachments[] = $uploaded['file'];
				$uploaded_files[] = sanitize_file_name( wp_basename( $uploaded['file'] ) );
				$uploaded_file_fields[] = $field;
			}
		}
	}

	$to = defined( 'ARQAM_CONTACT_EMAIL' ) ? ARQAM_CONTACT_EMAIL : get_option( 'admin_email' );
	$subject = sprintf(
		__( 'New Quote Request – %s from %s', 'arqamweb' ),
		strtoupper( $service ),
		$full_name
	);

	$body = "── Contact ───────────────────────────────\n";
	$body .= 'Name:    ' . $full_name . "\n";
	if ( ! empty( $data['phone'] ?? '' ) ) $body .= 'Phone:   ' . $data['phone'] . "\n";
	$body .= 'Email:   ' . $email . "\n";
	if ( ! empty( $data['company_name'] ?? '' ) ) $body .= 'Company: ' . $data['company_name'] . "\n";
	if ( ! empty( $data['role'] ?? '' ) ) {
		$body .= 'Role:    ' . $data['role'];
		if ( ! empty( $data['role_other'] ?? '' ) ) $body .= ' (' . $data['role_other'] . ')';
		$body .= "\n";
	}

	$body .= "\n── Project Overview ────────────────────\n";
	if ( ! empty( $data['industry'] ?? '' ) ) $body .= 'Industry: ' . $data['industry'] . "\n";
	if ( ! empty( $data['target_market'] ?? '' ) ) $body .= 'Target Market: ' . $data['target_market'] . "\n";
	if ( ! empty( $data['business_type'] ?? '' ) ) {
		$body .= 'Business Type: ' . $data['business_type'];
		if ( ! empty( $data['business_type_other'] ?? '' ) ) $body .= ' (' . $data['business_type_other'] . ')';
		$body .= "\n";
	}
	if ( ! empty( $data['business_stage'] ?? '' ) ) $body .= 'Business Stage: ' . $data['business_stage'] . "\n";
	if ( ! empty( $data['has_investment'] ?? '' ) ) $body .= 'Has Investment: ' . $data['has_investment'] . "\n";
	if ( ! empty( $data['website_link'] ?? '' ) ) $body .= 'Website/Social Link: ' . $data['website_link'] . "\n\n";

	if ( $service === 'branding' ) {
		$body .= "── Branding Level ───────────────────────\n";
		if ( ! empty( $data['branding_level'] ?? '' ) ) $body .= 'Level: ' . $data['branding_level'] . "\n\n";

		$body .= "── Logo Status ─────────────────────────\n";
		if ( ! empty( $data['logo_status'] ?? '' ) ) $body .= 'Logo Status: ' . $data['logo_status'] . "\n";
		if ( ! empty( $data['designer'] ?? '' ) ) $body .= 'Designer: ' . $data['designer'] . "\n";
		if ( ! empty( $data['source_files'] ?? '' ) ) $body .= 'Has Source Files: ' . $data['source_files'] . "\n";
		if ( ! empty( $data['logo_reason'] ?? '' ) ) {
			$body .= 'Reason: ' . $data['logo_reason'];
			if ( ! empty( $data['logo_reason_other'] ?? '' ) ) $body .= ' (' . $data['logo_reason_other'] . ')';
			$body .= "\n";
		}
		if ( in_array( 'upload_logo', $uploaded_file_fields, true ) ) $body .= '[Logo upload attached]' . "\n\n";

		$body .= "── Brand Assets ─────────────────────────\n";
		if ( ! empty( $data['assets'] ?? [] ) ) {
			$body .= 'Assets: ' . implode( ', ', $data['assets'] ) . "\n";
			if ( ! empty( $data['assets_other'] ?? '' ) ) $body .= 'Other: ' . $data['assets_other'] . "\n";
		}
		$body .= "\n── Execution Details ──────────────────────\n";
		if ( ! empty( $data['content_writing'] ?? '' ) ) $body .= 'Content Writing: ' . $data['content_writing'] . "\n";
		if ( ! empty( $data['translation'] ?? '' ) ) $body .= 'Translation: ' . $data['translation'] . "\n";
		if ( ! empty( $data['product_count'] ?? '' ) ) $body .= 'Product Count: ' . $data['product_count'] . "\n";
		if ( ! empty( $data['branches_count'] ?? '' ) ) $body .= 'Branches Count: ' . $data['branches_count'] . "\n\n";

		$body .= "── Strategy ──────────────────────────────\n";
		if ( ! empty( $data['objective'] ?? '' ) ) $body .= "Objective:\n" . $data['objective'] . "\n";
		if ( ! empty( $data['audience'] ?? '' ) ) $body .= "Audience:\n" . $data['audience'] . "\n";
		if ( ! empty( $data['competitors'] ?? '' ) ) $body .= "Competitors:\n" . $data['competitors'] . "\n";
		if ( ! empty( $data['personality'] ?? '' ) ) $body .= 'Brand Personality: ' . $data['personality'] . "\n";
		if ( ! empty( $data['success_metrics'] ?? [] ) ) $body .= 'Success Metrics: ' . implode( ', ', $data['success_metrics'] ) . "\n\n";

		$body .= "── Decision & Communication ────────────────\n";
		if ( ! empty( $data['decision_maker'] ?? '' ) ) $body .= 'Decision Maker: ' . $data['decision_maker'] . "\n";
		if ( ! empty( $data['urgency'] ?? '' ) ) $body .= 'Urgency: ' . $data['urgency'] . "\n";
		if ( ! empty( $data['communication'] ?? '' ) ) $body .= 'Communication: ' . $data['communication'] . "\n\n";

		$body .= "── Investment & Timeline ───────────────────\n";
		if ( ! empty( $data['budget_level'] ?? '' ) ) $body .= 'Budget Level: ' . $data['budget_level'] . "\n";
		if ( ! empty( $data['start_date'] ?? '' ) ) $body .= 'Start Date: ' . $data['start_date'] . "\n";
		if ( ! empty( $data['launch_date'] ?? '' ) ) $body .= 'Launch Date: ' . $data['launch_date'] . "\n";
		if ( ! empty( $data['referral'] ?? '' ) ) $body .= 'Referral: ' . $data['referral'] . "\n\n";
	}

	if ( $service === 'website' ) {
		$body .= "── Website Status ────────────────────────\n";
		if ( ! empty( $data['website_status'] ?? '' ) ) $body .= 'Website Status: ' . $data['website_status'] . "\n";
		if ( ! empty( $data['website_url'] ?? '' ) ) $body .= 'Website URL: ' . $data['website_url'] . "\n";
		if ( ! empty( $data['website_issue'] ?? '' ) ) $body .= "Website Issue:\n" . $data['website_issue'] . "\n";
		if ( ! empty( $data['has_investment'] ?? '' ) ) $body .= 'Has Investment: ' . $data['has_investment'] . "\n\n";

		$body .= "── Website Type ──────────────────────────\n";
		if ( ! empty( $data['website_type'] ?? '' ) ) {
			$body .= 'Website Type: ' . $data['website_type'];
			if ( ! empty( $data['website_type_other'] ?? '' ) ) $body .= ' (' . $data['website_type_other'] . ')';
			$body .= "\n";
		}
		$body .= "\n── Project Scope ─────────────────────────\n";
		if ( ! empty( $data['page_count'] ?? '' ) ) $body .= 'Page Count: ' . $data['page_count'] . "\n";
		if ( ! empty( $data['page_sections'] ?? '' ) ) $body .= "Expected Sections:\n" . $data['page_sections'] . "\n";
		if ( ! empty( $data['require_cms'] ?? '' ) ) $body .= 'Require CMS: ' . $data['require_cms'] . "\n";
		if ( ! empty( $data['cms_elements'] ?? [] ) ) {
			$body .= 'CMS Elements: ' . implode( ', ', $data['cms_elements'] ) . "\n";
			if ( ! empty( $data['cms_elements_other'] ?? '' ) ) $body .= 'Other: ' . $data['cms_elements_other'] . "\n";
		}
		$body .= "\n── Features ──────────────────────────────\n";
		if ( ! empty( $data['features'] ?? [] ) ) {
			$body .= 'Features: ' . implode( ', ', $data['features'] ) . "\n";
			if ( ! empty( $data['features_other'] ?? '' ) ) $body .= 'Other: ' . $data['features_other'] . "\n";
		}
		$body .= "\n── Design & Branding ─────────────────────\n";
		if ( ! empty( $data['has_brand_identity'] ?? '' ) ) $body .= 'Has Visual Identity: ' . $data['has_brand_identity'] . "\n";
		if ( ! empty( $data['follow_brand'] ?? '' ) ) $body .= 'Follow Existing Brand: ' . $data['follow_brand'] . "\n";
		if ( ! empty( $data['reference_websites'] ?? '' ) ) $body .= "Reference Websites:\n" . $data['reference_websites'] . "\n\n";

		$body .= "── Audience & Objectives ────────────────────\n";
		if ( ! empty( $data['target_audience'] ?? '' ) ) $body .= "Target Audience:\n" . $data['target_audience'] . "\n";
		if ( ! empty( $data['primary_objective'] ?? '' ) ) {
			$body .= 'Primary Objective: ' . $data['primary_objective'];
			if ( ! empty( $data['primary_objective_other'] ?? '' ) ) $body .= ' (' . $data['primary_objective_other'] . ')';
			$body .= "\n";
		}
		if ( ! empty( $data['success_measurement'] ?? '' ) ) $body .= "Success Measurement:\n" . $data['success_measurement'] . "\n\n";

		$body .= "── Decision & Timeline ──────────────────────\n";
		if ( ! empty( $data['decision_maker'] ?? '' ) ) $body .= 'Decision Maker: ' . $data['decision_maker'] . "\n";
		if ( ! empty( $data['urgency'] ?? '' ) ) $body .= 'Urgency: ' . $data['urgency'] . "\n";
		if ( ! empty( $data['communication'] ?? '' ) ) $body .= 'Communication: ' . $data['communication'] . "\n\n";

		$body .= "── Execution Level & Timeline ────────────────\n";
		if ( ! empty( $data['execution_level'] ?? '' ) ) $body .= 'Execution Level: ' . $data['execution_level'] . "\n";
		if ( ! empty( $data['start_date'] ?? '' ) ) $body .= 'Start Date: ' . $data['start_date'] . "\n";
		if ( ! empty( $data['has_launch_date'] ?? '' ) ) $body .= 'Has Fixed Launch Date: ' . $data['has_launch_date'] . "\n";
		if ( ! empty( $data['launch_date'] ?? '' ) ) $body .= 'Launch Date: ' . $data['launch_date'] . "\n";
		if ( ! empty( $data['referral'] ?? '' ) ) $body .= 'Referral: ' . $data['referral'] . "\n\n";
	}

	if ( $service === 'seo' ) {
		$body .= "── Website Information ──────────────────────\n";
		if ( ! empty( $data['website_live'] ?? '' ) ) $body .= 'Website Live: ' . $data['website_live'] . "\n";
		if ( ! empty( $data['website_url'] ?? '' ) ) $body .= 'Website URL: ' . $data['website_url'] . "\n";
		if ( ! empty( $data['previous_seo'] ?? '' ) ) $body .= 'Previous SEO Work: ' . $data['previous_seo'] . "\n";
		if ( ! empty( $data['seo_challenges'] ?? '' ) ) $body .= "SEO Challenges:\n" . $data['seo_challenges'] . "\n\n";

		$body .= "── Current Performance ────────────────────\n";
		if ( ! empty( $data['analytics_tools'] ?? [] ) ) $body .= 'Analytics Tools: ' . implode( ', ', $data['analytics_tools'] ) . "\n";
		if ( ! empty( $data['has_previous_reports'] ?? '' ) ) $body .= 'Has Previous Reports: ' . $data['has_previous_reports'] . "\n";
		if ( ! empty( $data['monthly_traffic'] ?? '' ) ) $body .= 'Monthly Traffic: ' . $data['monthly_traffic'] . "\n\n";

		$body .= "── SEO Objectives ──────────────────────────\n";
		if ( ! empty( $data['primary_goal'] ?? '' ) ) {
			$body .= 'Primary SEO Goal: ' . $data['primary_goal'];
			if ( ! empty( $data['primary_goal_other'] ?? '' ) ) $body .= ' (' . $data['primary_goal_other'] . ')';
			$body .= "\n";
		}
		if ( ! empty( $data['target_keywords'] ?? '' ) ) $body .= "Target Keywords:\n" . $data['target_keywords'] . "\n";
		if ( ! empty( $data['seo_focus'] ?? '' ) ) $body .= 'SEO Focus: ' . $data['seo_focus'] . "\n\n";

		$body .= "── Competitors & Market ─────────────────────\n";
		if ( ! empty( $data['competitors'] ?? '' ) ) $body .= "Competitors:\n" . $data['competitors'] . "\n";
		if ( ! empty( $data['knows_ranking'] ?? '' ) ) $body .= 'Knows Ranking Position: ' . $data['knows_ranking'] . "\n\n";

		$body .= "── Content Strategy ──────────────────────────\n";
		if ( ! empty( $data['internal_content_team'] ?? '' ) ) $body .= 'Internal Content Team: ' . $data['internal_content_team'] . "\n";
		if ( ! empty( $data['publish_blog'] ?? '' ) ) $body .= 'Publish Blog Regularly: ' . $data['publish_blog'] . "\n";
		if ( ! empty( $data['article_count'] ?? '' ) ) $body .= 'Article Count: ' . $data['article_count'] . "\n";
		if ( ! empty( $data['content_writing'] ?? '' ) ) $body .= 'Content Writing Required: ' . $data['content_writing'] . "\n\n";

		$body .= "── Technical & Platform Details ────────────────\n";
		if ( ! empty( $data['technical_seo_done'] ?? '' ) ) $body .= 'Technical SEO Done: ' . $data['technical_seo_done'] . "\n";
		if ( ! empty( $data['website_platform'] ?? '' ) ) $body .= 'Website Platform: ' . $data['website_platform'] . "\n";
		if ( ! empty( $data['speed_issues'] ?? '' ) ) $body .= 'Speed Issues: ' . $data['speed_issues'] . "\n\n";

		$body .= "── Decision & Timeline ──────────────────────\n";
		if ( ! empty( $data['decision_maker'] ?? '' ) ) $body .= 'Decision Maker: ' . $data['decision_maker'] . "\n";
		if ( ! empty( $data['urgency'] ?? '' ) ) $body .= 'Urgency: ' . $data['urgency'] . "\n\n";

		$body .= "── SEO Strategy Level & Timeline ───────────────\n";
		if ( ! empty( $data['strategy_level'] ?? '' ) ) $body .= 'Strategy Level: ' . $data['strategy_level'] . "\n";
		if ( ! empty( $data['start_date'] ?? '' ) ) $body .= 'Start Date: ' . $data['start_date'] . "\n";
		if ( ! empty( $data['referral'] ?? '' ) ) $body .= 'Referral: ' . $data['referral'] . "\n\n";
	}

	$body .= '── Service: ' . strtoupper( $service ) . " ──\n\n";
	if ( ! empty( $uploaded_files ) ) {
		$body .= '── Attachments: ' . implode( ', ', $uploaded_files ) . " ──\n\n";
	}
	$body .= '── Submitted: ' . gmdate( 'Y-m-d H:i:s' ) . " UTC ──\n";

	$headers = [
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $full_name . ' <' . $email . '>',
	];

	if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
		$log_file = WP_CONTENT_DIR . '/quote-requests.log';
		file_put_contents( $log_file, "=== " . gmdate( 'Y-m-d H:i:s' ) . " ===\n" . $body . "\n\n", FILE_APPEND );
		wp_send_json_success( __( 'Your quote request has been received.', 'arqamweb' ) );
		return;
	}

	$sent = wp_mail( $to, $subject, $body, $headers, $attachments );

	if ( $sent ) {
		wp_send_json_success( __( 'Your quote request has been received.', 'arqamweb' ) );
	} else {
		wp_send_json_error( __( 'We could not send your request. Please email us directly.', 'arqamweb' ) );
	}
}

add_action( 'wp_ajax_arqamweb_quote_request', 'arqamweb_handle_quote_request' );
add_action( 'wp_ajax_nopriv_arqamweb_quote_request', 'arqamweb_handle_quote_request' );
