<?php
/**
 * Onboarding trifecta — device, touchstone, Discord.
 * Shown on landing (/), God Wink, and Welcome only.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/llb-bundle/helpers.php';
require_once get_stylesheet_directory() . '/inc/hgr-template-helpers.php';

$hbc_url     = hello_elementor_child_hbc_register_url();
$rsvp_url    = hello_elementor_child_hgr_touchstone_order_url();
$discord_url = hello_elementor_child_llb_discord_url();
?>
<div class="llb-trifecta" aria-label="<?php esc_attr_e( 'Onboarding trifecta', 'hello-elementor-child' ); ?>">
	<div class="llb-trifecta-inner">
		<span class="llb-trifecta-label"><?php esc_html_e( 'Your next steps', 'hello-elementor-child' ); ?></span>
		<a href="<?php echo esc_url( $hbc_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( '1 · Register your device', 'hello-elementor-child' ); ?></a>
		<a href="<?php echo esc_url( $rsvp_url ); ?>"><?php esc_html_e( '2 · Order your touchstone', 'hello-elementor-child' ); ?></a>
		<a href="<?php echo esc_url( $discord_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( '3 · Accept Discord Gracebook', 'hello-elementor-child' ); ?></a>
	</div>
</div>
