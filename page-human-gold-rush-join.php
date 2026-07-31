<?php
/**
 * Template Name: Human Gold Rush — Join Form
 * Template Post Type: page
 *
 * Dedicated join page for Human Gold Rush participants.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/hgr-template-helpers.php';

$login_url = hello_elementor_child_hgr_login_url();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'hgr-body hgr-join-page' ); ?>>
<?php wp_body_open(); ?>

<div class="hgr-page">
	<?php hello_elementor_child_hgr_render_page_nav( 'join' ); ?>

	<div class="hgr-wrap hgr-login-hero">
		<span class="hgr-badge hgr-reveal"><?php esc_html_e( 'Testnet demo — no real accounts', 'hello-elementor-child' ); ?></span>
		<h1 class="hgr-reveal hgr-reveal-delay-1"><?php esc_html_e( 'Stake your claim.', 'hello-elementor-child' ); ?></h1>
		<p class="hgr-tagline hgr-reveal hgr-reveal-delay-2"><?php esc_html_e( 'RSVP your intent to show up. No money changes hands — ever.', 'hello-elementor-child' ); ?></p>
	</div>

	<div class="hgr-wrap">
		<section class="hgr-auth hgr-auth-standalone" id="join">
			<div class="hgr-auth-card">
				<div class="hgr-tabs" role="tablist">
					<span class="hgr-tab active" role="tab" aria-selected="true"><?php esc_html_e( 'Join', 'hello-elementor-child' ); ?></span>
					<a class="hgr-tab" role="tab" href="<?php echo esc_url( $login_url ); ?>"><?php esc_html_e( 'Log in', 'hello-elementor-child' ); ?></a>
				</div>
				<div class="hgr-auth-body">
					<form id="form-join" data-hgr-mode="join-only">
						<div class="hgr-field">
							<label for="join-name"><?php esc_html_e( 'Name', 'hello-elementor-child' ); ?></label>
							<input id="join-name" name="name" type="text" placeholder="<?php esc_attr_e( 'Your name', 'hello-elementor-child' ); ?>" required autocomplete="name">
						</div>
						<div class="hgr-field">
							<label for="join-phone"><?php esc_html_e( 'Phone', 'hello-elementor-child' ); ?></label>
							<input id="join-phone" name="phone" type="tel" placeholder="<?php esc_attr_e( '+1 (555) 123-4567', 'hello-elementor-child' ); ?>" required autocomplete="tel">
						</div>
						<button class="hgr-submit" type="submit"><?php esc_html_e( 'Stake your claim', 'hello-elementor-child' ); ?></button>
					</form>
					<div id="join-result" aria-live="polite"></div>
					<p class="hgr-auth-switch">
						<?php
						printf(
							/* translators: %s: login page URL */
							wp_kses_post( __( 'Already joined? <a href="%s">Log in with your Participant ID</a>.', 'hello-elementor-child' ) ),
							esc_url( $login_url )
						);
						?>
					</p>
				</div>
			</div>
		</section>

		<footer class="hgr-footer">
			<?php esc_html_e( 'No money changes hands anywhere in Human Gold Rush. This page is a research-project prototype — testnet / demo only.', 'hello-elementor-child' ); ?>
		</footer>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
