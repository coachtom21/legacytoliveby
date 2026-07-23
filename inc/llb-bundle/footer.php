<?php
/**
 * LLB bundle footer.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$research_url = hello_elementor_child_llb_page_url( 'research-technology' );
$resources_url = hello_elementor_child_llb_page_url( 'resources' );
$gracebook_url = hello_elementor_child_llb_page_url( 'discord-gracebook' );
?>
<footer>
	<strong>Legacy to Live By</strong>
	<p>Seeking Gratitude recognizes trade value without accepting gratitude as money.</p>
	<p class="laugh-def"><abbr title="Leaders Annual United Group Hug">LAUGH</abbr> = Leaders Annual United Group Hug — a Detente 2030 human building block / experiment.</p>
	<nav>
		<a href="<?php echo esc_url( $research_url ); ?>">Research &amp; privacy</a>
		<a href="<?php echo esc_url( $resources_url ); ?>">Resource library</a>
		<a href="<?php echo esc_url( $gracebook_url ); ?>">Discord Gracebook</a>
	</nav>
</footer>
