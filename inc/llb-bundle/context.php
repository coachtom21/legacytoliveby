<?php
/**
 * LLB bundle context rail.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pulse_url = hello_elementor_child_llb_page_url( 'community-pulse' );
?>
<aside class="context">
	<div class="context-card">
		<p>HOW ARE YOU ARRIVING?</p>
		<button type="button">Exploring</button>
		<button type="button">Carrying the covenant</button>
		<button type="button">Hosting a LAUGH event</button>
		<button type="button">Representing a community</button>
	</div>
	<div class="context-card">
		<p>CURRENT WINDOW</p>
		<strong>12-week quarter</strong>
		<span>One continuous community dataset</span>
		<a href="<?php echo esc_url( $pulse_url ); ?>">Open Community Pulse →</a>
	</div>
	<div class="context-card gold">
		<p>REMEMBER</p>
		<strong>Walk-aways are gold.</strong>
		<span>Record the voluntary outcome. Never invent the motive.</span>
	</div>
</aside>
