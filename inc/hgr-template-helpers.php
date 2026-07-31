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
 * Whether the current request uses an HGR template.
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
 * URL for the Human Gold Rush landing page.
 *
 * @return string
 */
function hello_elementor_child_hgr_landing_url() {
	return home_url( '/' );
}

/**
 * URL for the Human Gold Rush bundle welcome page ("Join the rush").
 *
 * @return string
 */
function hello_elementor_child_hgr_join_url() {
	return hello_elementor_child_llb_page_url( 'llb-welcome' );
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
