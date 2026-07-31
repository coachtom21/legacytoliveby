<?php
/**
 * LLB bundle top header — logo left; hamburger opens left nav on mobile.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$welcome_url = isset( $llb_brand_url ) ? $llb_brand_url : hello_elementor_child_llb_page_url( 'llb-welcome' );
$logo_id     = (int) get_theme_mod( 'custom_logo' );
?>
<header class="llb-header">
	<a class="llb-header-brand" href="<?php echo esc_url( $welcome_url ); ?>">
		<?php if ( $logo_id ) : ?>
			<?php echo wp_get_attachment_image( $logo_id, 'medium', false, array( 'class' => 'llb-header-logo-img', 'alt' => 'Legacy to Live By' ) ); ?>
		<?php else : ?>
			<span class="llb-header-logo-text">Legacy to Live By</span>
		<?php endif; ?>
		<span class="llb-header-tagline"><?php esc_html_e( 'Human Gold Rush', 'hello-elementor-child' ); ?></span>
	</a>
	<button
		type="button"
		class="llb-menu-toggle"
		id="menu"
		aria-expanded="false"
		aria-controls="sidebar"
		aria-label="<?php esc_attr_e( 'Open menu', 'hello-elementor-child' ); ?>"
	>
		<svg class="llb-menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
			<path class="llb-menu-line llb-menu-line-top" d="M4 7h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
			<path class="llb-menu-line llb-menu-line-mid" d="M4 12h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
			<path class="llb-menu-line llb-menu-line-bot" d="M4 17h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
		</svg>
	</button>
</header>
<div class="llb-sidebar-overlay" id="sidebar-overlay" hidden></div>
