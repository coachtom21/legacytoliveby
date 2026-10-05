<?php
/**
 * Closed-loop return for Legacy to Live By.
 *
 * Human Blockchain issues an opaque hbc_ctx. This theme only echoes that token.
 * It never writes an RSVP or an XP record.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Opaque context from the current request, or empty when missing or malformed.
 *
 * @return string
 */
function llb_hbc_ctx_from_request() {
	if ( ! isset( $_GET['hbc_ctx'] ) ) {
		return '';
	}

	$ctx = sanitize_text_field( wp_unslash( (string) $_GET['hbc_ctx'] ) );
	if ( ! preg_match( '/^[A-Za-z0-9_-]{16,256}$/', $ctx ) ) {
		return '';
	}

	return $ctx;
}

/**
 * Human Blockchain origin for this environment.
 *
 * @return string
 */
function llb_hbc_base_url() {
	$host = (string) wp_parse_url( home_url( '/' ), PHP_URL_HOST );
	if ( preg_match( '/\.local$|localhost$/', $host ) ) {
		return 'http://humanblockchain.local';
	}

	return 'https://humanblockchain.info';
}

/**
 * Append the current hbc_ctx when one was issued.
 *
 * @param string $url Absolute URL.
 * @return string
 */
function llb_with_hbc_ctx( $url ) {
	$ctx = llb_hbc_ctx_from_request();
	if ( '' === $ctx ) {
		return $url;
	}

	return add_query_arg( 'hbc_ctx', $ctx, $url );
}

/**
 * HBC /return for the issued token. Empty when there is no usable token.
 *
 * @return string
 */
function llb_hbc_event_return_url() {
	$ctx = llb_hbc_ctx_from_request();
	if ( '' === $ctx ) {
		return '';
	}

	return add_query_arg( 'hbc_ctx', $ctx, llb_hbc_base_url() . '/return' );
}

/**
 * Return bar. Renders only when the visitor arrived from a Human Blockchain event.
 *
 * @return void
 */
function llb_render_hbc_return_bar() {
	$return_url = llb_hbc_event_return_url();
	if ( '' === $return_url ) {
		return;
	}
	?>
	<aside class="llb-hbc-return" role="region" aria-label="<?php esc_attr_e( 'Return to your event', 'hello-elementor-child' ); ?>">
		<p><?php esc_html_e( 'You came from a Human Blockchain event. Looking around here does not change that RSVP. Touchstone and Discord stay optional.', 'hello-elementor-child' ); ?></p>
		<a href="<?php echo esc_url( $return_url ); ?>"><?php esc_html_e( 'Return to my event', 'hello-elementor-child' ); ?></a>
	</aside>
	<style>
		.llb-hbc-return{display:flex;flex-wrap:wrap;gap:12px 20px;align-items:center;justify-content:space-between;margin:0;padding:12px 20px;background:#0b1f33;color:#f6f1e7;font:15px/1.45 Inter,system-ui,sans-serif}
		.llb-hbc-return p{margin:0;max-width:46rem}
		.llb-hbc-return a{display:inline-flex;align-items:center;min-height:40px;padding:8px 14px;border-radius:8px;background:#e7b558;color:#17212f;font-weight:700;text-decoration:none}
	</style>
	<?php
}
