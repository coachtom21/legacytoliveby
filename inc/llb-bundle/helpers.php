<?php
/**
 * LLB Codepixelzmedia bundle helpers.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current page uses the LLB bundle template.
 *
 * @return bool
 */
function hello_elementor_child_llb_is_template() {
	return is_page_template( 'page-llb-bundle.php' );
}

/**
 * Bundle page registry from pages.json.
 *
 * @return array<int, array<string, string>>
 */
function hello_elementor_child_llb_pages_config() {
	static $config = null;
	if ( null === $config ) {
		$path = get_stylesheet_directory() . '/inc/llb-bundle/pages.json';
		$config = file_exists( $path ) ? json_decode( file_get_contents( $path ), true ) : array();
	}
	return is_array( $config ) ? $config : array();
}

/**
 * Config for a bundle page slug.
 *
 * @param string $slug Page slug.
 * @return array<string, string>|null
 */
function hello_elementor_child_llb_page_config( $slug ) {
	foreach ( hello_elementor_child_llb_pages_config() as $page ) {
		if ( isset( $page['slug'] ) && $page['slug'] === $slug ) {
			return $page;
		}
	}
	return null;
}

/**
 * Permalink for a bundle page by slug.
 *
 * @param string $slug Page slug.
 * @return string
 */
function hello_elementor_child_llb_page_url( $slug ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : home_url( '/' . $slug . '/' );
}

/**
 * Map static HTML filenames to WordPress URLs.
 *
 * @return array<string, string>
 */
function hello_elementor_child_llb_url_map() {
	$map = array();
	foreach ( hello_elementor_child_llb_pages_config() as $page ) {
		if ( ! empty( $page['file'] ) && ! empty( $page['slug'] ) ) {
			$map[ $page['file'] ] = hello_elementor_child_llb_page_url( $page['slug'] );
		}
	}
	return $map;
}

/**
 * Discord Gracebook invite URL.
 *
 * @return string
 */
function hello_elementor_child_llb_discord_url() {
	return 'https://discord.com/invite/g5jreAPbra';
}

/**
 *
 * @param string $html Content HTML.
 * @return string
 */
function hello_elementor_child_llb_rewrite_links( $html ) {
	foreach ( hello_elementor_child_llb_url_map() as $file => $url ) {
		$html = str_replace( 'href="' . $file . '"', 'href="' . esc_url( $url ) . '"', $html );
	}

	$html = str_replace(
		'href="{{discord_invite}}"',
		'href="' . esc_url( hello_elementor_child_llb_discord_url() ) . '"',
		$html
	);

	return $html;
}

/**
 * Navigation groups for the bundle sidebar.
 *
 * @return array<int, array{label: string, items: array<int, array{file: string, label: string}>}>
 */
function hello_elementor_child_llb_nav_groups() {
	return array(
		array(
			'label' => 'START HERE',
			'items' => array(
				array( 'file' => 'human-gold-rush.html', 'label' => 'Welcome' ),
				array( 'file' => 'tigers-eye-covenant.html', 'label' => "Tiger's Eye Covenant" ),
				array( 'file' => 'three-ways-to-respond.html', 'label' => 'Three Ways to Respond' ),
				array( 'file' => 'community-force.html', 'label' => 'Community Force' ),
			),
		),
		array(
			'label' => 'CURRENT QUARTER',
			'items' => array(
				array( 'file' => 'community-pulse.html', 'label' => 'Community Pulse' ),
				array( 'file' => 'laugh-events.html', 'label' => 'LAUGH Events' ),
				array( 'file' => 'proof-of-fulfillment.html', 'label' => 'Proof of Fulfillment' ),
				array( 'file' => 'three-ways-to-respond.html', 'label' => 'Walk-Away Gold' ),
				array( 'file' => 'community-reflection.html', 'label' => 'Twelve-Week Snapshot' ),
			),
		),
		array(
			'label' => 'LEARN & GATHER',
			'items' => array(
				array( 'file' => 'prepare-laugh-event.html', 'label' => 'Host a LAUGH Event' ),
				array( 'file' => 'stories-trust-motion.html', 'label' => 'Stories of Trust' ),
				array( 'file' => 'resources.html', 'label' => 'Resource Library' ),
				array( 'file' => 'discord-gracebook.html', 'label' => 'Discord Gracebook' ),
			),
		),
		array(
			'label' => 'RESEARCH',
			'items' => array(
				array( 'file' => 'research-technology.html', 'label' => 'Technology & Research' ),
			),
		),
	);
}

/**
 * Render bundle page content partial.
 *
 * @param string $slug Page slug.
 * @return void
 */
function hello_elementor_child_llb_render_content( $slug ) {
	$path = get_stylesheet_directory() . '/inc/llb-bundle/content/' . $slug . '.php';
	if ( ! file_exists( $path ) ) {
		echo '<div class="page-wrap"><p>Content not found.</p></div>';
		return;
	}
	ob_start();
	echo '<div class="page-wrap">';
	include $path;
	echo '</div>';
	$html = ob_get_clean();
	echo hello_elementor_child_llb_rewrite_links( $html ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
