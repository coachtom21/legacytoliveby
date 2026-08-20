<?php
/**
 * Shared helpers for Human Gold Rush page templates.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the request is the site root URL (not /llb-welcome/ etc.).
 *
 * WordPress treats the static front page as is_front_page() on both / and its
 * canonical slug — we only want the landing layout on the root path.
 *
 * @return bool
 */
function hello_elementor_child_is_site_root() {
	if ( ! is_front_page() ) {
		return false;
	}

	$path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH ), '/' );

	return '' === $path || 'index.php' === $path;
}

/**
 * Whether the current page uses the God Wink template.
 *
 * @return bool
 */
function hello_elementor_child_hgr_is_god_wink_template() {
	return is_page_template( 'page-god-wink.php' );
}

/**
 * Whether the current request uses an HGR landing/join/login template.
 *
 * @return bool
 */
function hello_elementor_child_hgr_is_template() {
	return hello_elementor_child_is_site_root()
		|| is_page_template( 'page-human-gold-rush.php' )
		|| is_page_template( 'page-human-gold-rush-join.php' )
		|| is_page_template( 'page-human-gold-rush-login.php' );
}

/**
 * Whether the current page is the LLB Welcome lesson (not the site landing).
 *
 * @return bool
 */
function hello_elementor_child_llb_is_welcome_template() {
	return is_page_template( 'page-llb-welcome.php' );
}

/**
 * URL for the Human Gold Rush landing page.
 *
 * @return string
 */
function hello_elementor_child_hgr_landing_url() {
	return home_url( '/' );
}

/**
 * URL for the God Wink enhanced welcome page.
 *
 * @param string $fragment Optional hash fragment.
 * @return string
 */
function hello_elementor_child_hgr_god_wink_url( $fragment = '' ) {
	$page = get_page_by_path( 'god-wink' );
	$url  = $page ? get_permalink( $page ) : home_url( '/god-wink/' );
	if ( $fragment ) {
		$url .= '#' . ltrim( $fragment, '#' );
	}
	return $url;
}

/**
 * Human Blockchain device registration URL.
 *
 * @return string
 */
function hello_elementor_child_hbc_register_url() {
	return 'https://humanblockchain.info/';
}

/**
 * Touchstone RSVP entry — Welcome lesson (#welcome), not Host a LAUGH Event.
 *
 * @return string
 */
function hello_elementor_child_hgr_touchstone_order_url() {
	return hello_elementor_child_llb_welcome_url( 'welcome' );
}

/**
 * Landing hero video — The First Principle (client: keep this on LLB index).
 *
 * @return string
 */
function hello_elementor_child_hgr_first_principle_video_url() {
	return 'https://legacytoliveby.org/wp-content/uploads/2026/07/The_First_Principle.mp4';
}

/**
 * Oligopoly / Community Checkers video (use on megavoters, not LLB home).
 *
 * @return string
 */
function hello_elementor_child_hgr_oligopoly_video_url() {
	return 'https://legacytoliveby.org/wp-content/uploads/2026/08/Community_Checkers__The_LAUGH_Gathering_Blueprint.mp4';
}

/**
 * Human Gold RSVP QR artwork (do not regenerate). Encodes megavoters.com.
 *
 * @return string
 */
function hello_elementor_child_hgr_rsvp_qr_url() {
	return get_stylesheet_directory_uri() . '/assets/hgr/postcard/Human_Gold_RSVP.svg';
}

/**
 * Postcard QR scan destination.
 *
 * @return string
 */
function hello_elementor_child_hgr_postcard_scan_url() {
	return 'https://megavoters.com/';
}

/**
 * Human Gold RSVP postcard image (front preview).
 *
 * @return string
 */
function hello_elementor_child_hgr_postcard_image_url() {
	return get_stylesheet_directory_uri() . '/assets/hgr/postcard/human-gold-rsvp-postcard-front.jpg';
}

/**
 * Human Gold RSVP postcard PDF download (two-sided proof).
 *
 * @return string
 */
function hello_elementor_child_hgr_postcard_pdf_url() {
	return get_stylesheet_directory_uri() . '/assets/hgr/postcard/Human_Gold_Rush_RSVP_Postcard_Two-Sided_Proof_6x4.pdf';
}

/**
 * Centerpiece touchstone image for God Wink (Google Drive until uploaded to media library).
 *
 * @return string
 */
function hello_elementor_child_god_wink_touchstone_image_url() {
	return 'https://legacytoliveby.org/wp-content/uploads/2026/08/unnamed.jpg';
}

/**
 * URL for "Join the rush" — God Wink enhanced welcome.
 *
 * @return string
 */
function hello_elementor_child_hgr_join_url() {
	return hello_elementor_child_hgr_god_wink_url();
}

/**
 * URL for the Human Gold Rush login page.
 *
 * @return string
 */
function hello_elementor_child_hgr_login_url() {
	$page = get_page_by_path( 'human-gold-rush-login' );
	return $page ? get_permalink( $page ) : home_url( '/human-gold-rush-login/' );
}

/**
 * Render the Elementor site header.
 *
 * @return void
 */
function hello_elementor_child_hgr_render_site_header() {
	$header_done = false;
	if ( function_exists( 'elementor_theme_do_location' ) ) {
		$header_done = elementor_theme_do_location( 'header' );
	}
	if ( ! $header_done && class_exists( '\Elementor\Plugin' ) ) {
		echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( 20 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

/**
 * Render the in-page HGR navigation bar.
 *
 * @param string $active One of: landing, join, login.
 * @return void
 */
function hello_elementor_child_hgr_render_page_nav( $active = 'landing' ) {
	$landing_url = hello_elementor_child_hgr_landing_url();
	$join_url    = hello_elementor_child_hgr_join_url();
	$login_url   = hello_elementor_child_hgr_login_url();
	?>
	<div class="hgr-wrap">
		<header class="hgr-top">
			<a class="hgr-brand" href="<?php echo esc_url( $landing_url ); ?>">HUMAN <span>GOLD RUSH</span></a>
			<nav class="hgr-nav" aria-label="<?php esc_attr_e( 'Human Gold Rush', 'hello-elementor-child' ); ?>">
				<a href="<?php echo esc_url( $landing_url . '#steps' ); ?>"><?php esc_html_e( 'How it works', 'hello-elementor-child' ); ?></a>
				<a class="<?php echo 'join' === $active ? 'hgr-nav-active' : ''; ?>" href="<?php echo esc_url( $join_url ); ?>" <?php echo 'join' === $active ? 'aria-current="page"' : ''; ?>><?php esc_html_e( 'Join', 'hello-elementor-child' ); ?></a>
				<a class="<?php echo 'login' === $active ? 'hgr-nav-active' : ''; ?>" href="<?php echo esc_url( $login_url ); ?>" <?php echo 'login' === $active ? 'aria-current="page"' : ''; ?>><?php esc_html_e( 'Log in', 'hello-elementor-child' ); ?></a>
			</nav>
		</header>
	</div>
	<?php
}
