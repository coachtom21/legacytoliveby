<?php
/**
 * Template Name: Human Gold Rush — Login
 * Template Post Type: page
 *
 * Dedicated login page for Human Gold Rush participants.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/hgr-template-helpers.php';

$join_url = hello_elementor_child_hgr_join_url();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'hgr-body hgr-login-page' ); ?>>
<?php wp_body_open(); ?>

<?php hello_elementor_child_hgr_render_site_header(); ?>

<div class="hgr-page">
	<?php hello_elementor_child_hgr_render_page_nav( 'login' ); ?>

	<div class="hgr-wrap hgr-login-hero">
		<span class="hgr-badge hgr-reveal"><?php esc_html_e( 'Testnet demo — no real accounts', 'hello-elementor-child' ); ?></span>
		<h1 class="hgr-reveal hgr-reveal-delay-1"><?php esc_html_e( 'Welcome back.', 'hello-elementor-child' ); ?></h1>
		<p class="hgr-tagline hgr-reveal hgr-reveal-delay-2"><?php esc_html_e( 'Enter with the phone number and Participant ID from your signup.', 'hello-elementor-child' ); ?></p>
	</div>

	<div class="hgr-wrap">
		<section class="hgr-auth hgr-auth-standalone" id="login">
			<div class="hgr-auth-card">
				<div class="hgr-tabs" role="tablist">
					<a class="hgr-tab" role="tab" href="<?php echo esc_url( $join_url ); ?>"><?php esc_html_e( 'Join', 'hello-elementor-child' ); ?></a>
					<span class="hgr-tab active" role="tab" aria-selected="true"><?php esc_html_e( 'Log in', 'hello-elementor-child' ); ?></span>
				</div>
				<div class="hgr-auth-body">
					<form id="form-login" data-hgr-mode="login-only">
						<div class="hgr-field">
							<label for="login-phone"><?php esc_html_e( 'Phone', 'hello-elementor-child' ); ?></label>
							<input id="login-phone" name="phone" type="tel" placeholder="<?php esc_attr_e( '+1 (555) 123-4567', 'hello-elementor-child' ); ?>" required autocomplete="tel">
						</div>
						<div class="hgr-field">
							<label for="login-id"><?php esc_html_e( 'Participant ID', 'hello-elementor-child' ); ?></label>
							<input id="login-id" name="participant_id" type="text" placeholder="<?php esc_attr_e( 'the UUID you were given at signup', 'hello-elementor-child' ); ?>" required autocomplete="off">
						</div>
						<button class="hgr-submit" type="submit"><?php esc_html_e( 'Enter', 'hello-elementor-child' ); ?></button>
					</form>
					<div id="login-result" aria-live="polite"></div>
					<p class="hgr-auth-switch">
						<?php
						printf(
							/* translators: %s: join page URL */
							wp_kses_post( __( 'New here? <a href="%s">Stake your claim on the join page</a>.', 'hello-elementor-child' ) ),
							esc_url( $join_url )
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
