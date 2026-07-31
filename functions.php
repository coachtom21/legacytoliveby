<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '3.2.0' );

require_once get_stylesheet_directory() . '/inc/hgr-template-helpers.php';
require_once get_stylesheet_directory() . '/inc/llb-bundle/helpers.php';

/**
 * Use the HGR landing template only on the site root — not on /llb-welcome/.
 *
 * @param string $template Path to the template file.
 * @return string
 */
function hello_elementor_child_root_landing_template( $template ) {
	if ( is_admin() || ! hello_elementor_child_is_site_root() ) {
		return $template;
	}

	$landing = get_stylesheet_directory() . '/page-human-gold-rush.php';

	return file_exists( $landing ) ? $landing : $template;
}
add_filter( 'template_include', 'hello_elementor_child_root_landing_template', 99 );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );

/**
 * Assets for the Human Gold Rush Join landing template.
 *
 * @return void
 */
function hello_elementor_child_hgr_assets() {
	if ( ! hello_elementor_child_hgr_is_template() ) {
		return;
	}

	wp_enqueue_style(
		'hgr-fonts',
		'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,700&family=Source+Sans+3:wght@400;600;700&display=swap',
		[],
		null
	);

	wp_enqueue_style(
		'llb-bundle-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,700;1,700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'llb-bundle',
		get_stylesheet_directory_uri() . '/assets/llb-bundle/styles.css',
		array( 'llb-bundle-fonts' ),
		HELLO_ELEMENTOR_CHILD_VERSION
	);

	wp_enqueue_style(
		'llb-bundle-overrides',
		get_stylesheet_directory_uri() . '/assets/llb-bundle/llb-overrides.css',
		array( 'llb-bundle' ),
		HELLO_ELEMENTOR_CHILD_VERSION
	);

	wp_enqueue_style(
		'hgr-join',
		get_stylesheet_directory_uri() . '/assets/hgr/join.css',
		array( 'hgr-fonts', 'llb-bundle-overrides' ),
		HELLO_ELEMENTOR_CHILD_VERSION
	);

	wp_enqueue_script(
		'llb-bundle',
		get_stylesheet_directory_uri() . '/assets/llb-bundle/app.js',
		array(),
		HELLO_ELEMENTOR_CHILD_VERSION,
		true
	);

	wp_localize_script(
		'llb-bundle',
		'llbBundle',
		array(
			'gracebookUrl' => hello_elementor_child_llb_page_url( 'discord-gracebook' ),
		)
	);

	wp_enqueue_script(
		'hgr-join',
		get_stylesheet_directory_uri() . '/assets/hgr/join.js',
		[],
		HELLO_ELEMENTOR_CHILD_VERSION,
		true
	);

	// Keep Elementor header styles; drop only page/theme chrome that fights the landing layout.
	$dequeue_styles = [
		'hello-elementor-child-style',
		'hello-elementor',
		'hello-elementor-theme-style',
		'hello-elementor-header-footer',
		'elementor-frontend',
		'elementor-post-6',
		'elementor-post-20',
		'elementor-post-122',
		'wp-block-library',
	];

	foreach ( $dequeue_styles as $handle ) {
		wp_dequeue_style( $handle );
		wp_deregister_style( $handle );
	}
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_hgr_assets', 100 );

/**
 * Keep the Elementor site header; hide only the theme-builder footer on HGR pages.
 *
 * @return void
 */
function hello_elementor_child_hgr_disable_theme_builder_footer() {
	if ( ! hello_elementor_child_hgr_is_template() ) {
		return;
	}

	remove_all_actions( 'elementor/theme/header' );
	remove_all_actions( 'elementor/theme/footer' );
}
add_action( 'template_redirect', 'hello_elementor_child_hgr_disable_theme_builder_footer', 5 );

/**
 * Hide admin bar on the Human Gold Rush landing page for a clean demo.
 *
 * @param bool $show Whether to show the admin bar.
 * @return bool
 */
function hello_elementor_child_hgr_hide_admin_bar( $show ) {
	if ( hello_elementor_child_hgr_is_template() ) {
		return false;
	}
	return $show;
}
add_filter( 'show_admin_bar', 'hello_elementor_child_hgr_hide_admin_bar' );

/**
 * Assets for LLB Codepixelzmedia bundle pages.
 *
 * @return void
 */
function hello_elementor_child_llb_assets() {
	if ( ! hello_elementor_child_llb_is_template() ) {
		return;
	}

	wp_enqueue_style(
		'llb-bundle-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,700;1,700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'llb-bundle',
		get_stylesheet_directory_uri() . '/assets/llb-bundle/styles.css',
		array( 'llb-bundle-fonts' ),
		HELLO_ELEMENTOR_CHILD_VERSION
	);

	wp_enqueue_style(
		'llb-bundle-overrides',
		get_stylesheet_directory_uri() . '/assets/llb-bundle/llb-overrides.css',
		array( 'llb-bundle' ),
		HELLO_ELEMENTOR_CHILD_VERSION
	);

	wp_enqueue_script(
		'llb-bundle',
		get_stylesheet_directory_uri() . '/assets/llb-bundle/app.js',
		array(),
		HELLO_ELEMENTOR_CHILD_VERSION,
		true
	);

	wp_localize_script(
		'llb-bundle',
		'llbBundle',
		array(
			'gracebookUrl' => hello_elementor_child_llb_page_url( 'discord-gracebook' ),
		)
	);

	$dequeue = array(
		'hello-elementor-child-style',
		'hello-elementor',
		'hello-elementor-theme-style',
		'hello-elementor-header-footer',
		'elementor-frontend',
		'elementor-post-6',
		'elementor-post-20',
		'elementor-post-122',
		'widget-image',
		'widget-nav-menu',
		'widget-off-canvas',
		'widget-icon-list',
		'e-animation-slideInRight',
		'elementor-gf-local-roboto',
		'elementor-gf-local-worksans',
		'wp-block-library',
	);

	foreach ( $dequeue as $handle ) {
		wp_dequeue_style( $handle );
		wp_deregister_style( $handle );
	}
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_llb_assets', 999 );

/**
 * Hide admin bar on LLB bundle pages.
 *
 * @param bool $show Whether to show the admin bar.
 * @return bool
 */
function hello_elementor_child_llb_hide_admin_bar( $show ) {
	if ( hello_elementor_child_llb_is_template() ) {
		return false;
	}
	return $show;
}
add_filter( 'show_admin_bar', 'hello_elementor_child_llb_hide_admin_bar' );

/**
 * Disable Elementor theme builder chrome on LLB bundle pages.
 *
 * @return void
 */
function hello_elementor_child_llb_disable_theme_builder() {
	if ( ! hello_elementor_child_llb_is_template() ) {
		return;
	}

	remove_all_actions( 'elementor/theme/header' );
	remove_all_actions( 'elementor/theme/footer' );
}
add_action( 'template_redirect', 'hello_elementor_child_llb_disable_theme_builder', 5 );
