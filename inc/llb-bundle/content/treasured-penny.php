<?php
/**
 * Treasured Penny page content (client LegacyToLiveBy_Treasured_Penny.html).
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! isset( $join_url ) ) {
	require_once get_stylesheet_directory() . '/inc/hgr-template-helpers.php';
	$join_url = hello_elementor_child_hgr_god_wink_url();
}
?>
<div class="page-wrap llb-penny-page">
	<section class="llb-penny-hero">
		<div>
			<p class="eyebrow"><?php esc_html_e( 'A Human Gold Rush invitation', 'hello-elementor-child' ); ?></p>
			<h1><?php esc_html_e( 'The Treasured', 'hello-elementor-child' ); ?> <em><?php esc_html_e( 'Penny.', 'hello-elementor-child' ); ?></em></h1>
			<p class="intro"><?php esc_html_e( 'I would do this for free, but you have to accept one treasured penny—person to person, just You And Me.', 'hello-elementor-child' ); ?></p>
			<p><?php esc_html_e( 'Don’t worry. The community supports the penny. You simply accept the gratitude and enjoy the Easter Egg your presence created.', 'hello-elementor-child' ); ?></p>
			<div class="actions">
				<a href="<?php echo esc_url( $join_url ); ?>"><?php esc_html_e( 'Join the rush', 'hello-elementor-child' ); ?><span>→</span></a>
				<a class="cta-walk" href="#how-it-works"><?php esc_html_e( 'Follow the postcard', 'hello-elementor-child' ); ?><span>→</span></a>
			</div>
		</div>
		<aside class="llb-penny-card" aria-label="<?php esc_attr_e( 'Treasured Penny RSVP postcard', 'hello-elementor-child' ); ?>">
			<p class="llb-penny-stamp"><?php esc_html_e( 'Postcard RSVP', 'hello-elementor-child' ); ?></p>
			<div class="llb-penny-coin" aria-hidden="true">1¢</div>
			<h2><?php esc_html_e( 'Your time matters more than money.', 'hello-elementor-child' ); ?></h2>
			<p><?php esc_html_e( 'Keep the invitation. Register your device when you are curious. Then show up for the LAUGH fulfillment event and allow another person to thank you.', 'hello-elementor-child' ); ?></p>
		</aside>
	</section>

	<section class="llb-penny-faith" id="faith">
		<p class="eyebrow"><?php esc_html_e( 'The covenant comes first', 'hello-elementor-child' ); ?></p>
		<h2><?php esc_html_e( 'Can you practice FAITH in your relationships with others?', 'hello-elementor-child' ); ?></h2>
		<p><?php esc_html_e( 'If yes, accept the invitation and carry the touchstone word that means the most to you. If not, observing or walking away remains your choice—without penalty or judgment.', 'hello-elementor-child' ); ?></p>
		<div class="llb-penny-words" aria-label="<?php esc_attr_e( 'Meaning of FAITH', 'hello-elementor-child' ); ?>">
			<span><?php esc_html_e( 'Fair', 'hello-elementor-child' ); ?></span>
			<span><?php esc_html_e( 'Accepting', 'hello-elementor-child' ); ?></span>
			<span><?php esc_html_e( 'Insightful', 'hello-elementor-child' ); ?></span>
			<span><?php esc_html_e( 'Transparent', 'hello-elementor-child' ); ?></span>
			<span><?php esc_html_e( 'Humble', 'hello-elementor-child' ); ?></span>
		</div>
	</section>

	<section class="llb-penny-process" id="how-it-works">
		<p class="eyebrow"><?php esc_html_e( 'Two scans • One shared moment', 'hello-elementor-child' ); ?></p>
		<h2><?php esc_html_e( 'The treasured penny is accepted, not paid.', 'hello-elementor-child' ); ?></h2>
		<p class="intro"><?php esc_html_e( 'It is the smallest acknowledgment that a seller/giver benefactor and buyer/recipient beneficiary chose to be present together.', 'hello-elementor-child' ); ?></p>
		<div class="content-grid">
			<article>
				<span>01</span>
				<div>
					<h2><?php esc_html_e( 'Receive the postcard', 'hello-elementor-child' ); ?></h2>
					<p><?php esc_html_e( 'A friend, stranger, church, nonprofit or community host invites you into the Human Gold Rush.', 'hello-elementor-child' ); ?></p>
				</div>
			</article>
			<article>
				<span>02</span>
				<div>
					<h2><?php esc_html_e( 'Confirm You And Me', 'hello-elementor-child' ); ?></h2>
					<p><?php esc_html_e( 'Two registered devices signal Y/Y/Y: FAITH Covenant accepted, device UUID registered and Discord Gracebook accepted.', 'hello-elementor-child' ); ?></p>
				</div>
			</article>
			<article>
				<span>03</span>
				<div>
					<h2><?php esc_html_e( 'Create the moment', 'hello-elementor-child' ); ?></h2>
					<p><?php esc_html_e( 'The giver offers one treasured penny. The recipient personally accepts. The completed proof records Experience Presence.', 'hello-elementor-child' ); ?></p>
				</div>
			</article>
		</div>
	</section>

	<section class="llb-penny-wink" id="god-wink">
		<p class="eyebrow"><?php esc_html_e( 'The entire process is the discovery', 'hello-elementor-child' ); ?></p>
		<h2><?php esc_html_e( 'Your presence created the Easter Egg.', 'hello-elementor-child' ); ?></h2>
		<p><?php esc_html_e( 'You did not have to hunt for it, earn it, buy it or win it. By showing up and accepting one another’s presence, the benefactor and beneficiary created a God Wink moment together. You enjoy the Easter Egg.', 'hello-elementor-child' ); ?></p>
	</section>

	<section class="llb-penny-levels">
		<p class="eyebrow"><?php esc_html_e( 'Race to the bottom of the money pool', 'hello-elementor-child' ); ?></p>
		<h2><?php esc_html_e( 'Choose the smallest reference and leave room for others.', 'hello-elementor-child' ); ?></h2>
		<p><?php esc_html_e( 'Three treasured pennies can record three separate encounters before one recipient reaches the same fixed daily capacity as one Guild-level encounter.', 'hello-elementor-child' ); ?></p>
		<div class="llb-penny-level-grid">
			<article class="llb-penny-level is-treasure">
				<span><?php esc_html_e( 'Recommended', 'hello-elementor-child' ); ?></span>
				<strong>$0.01</strong>
				<h3><?php esc_html_e( 'Treasured Penny', 'hello-elementor-child' ); ?></h3>
				<p><?php esc_html_e( 'Individual gratitude that leaves room for more people to show up today.', 'hello-elementor-child' ); ?></p>
				<small><?php esc_html_e( '$0.01 NWP ≐ 1 sextillion XP', 'hello-elementor-child' ); ?></small>
			</article>
			<article class="llb-penny-level">
				<span><?php esc_html_e( 'Verified POC', 'hello-elementor-child' ); ?></span>
				<strong>$0.02</strong>
				<h3><?php esc_html_e( 'Patron Organizing Community', 'hello-elementor-child' ); ?></h3>
				<p><?php esc_html_e( 'A five-seller POC may recognize network-weighted presence at the community level.', 'hello-elementor-child' ); ?></p>
				<small><?php esc_html_e( '$0.02 NWP ≐ 2 sextillion XP', 'hello-elementor-child' ); ?></small>
			</article>
			<article class="llb-penny-level">
				<span><?php esc_html_e( 'Verified Guild', 'hello-elementor-child' ); ?></span>
				<strong>$0.03</strong>
				<h3><?php esc_html_e( 'Guild Standard', 'hello-elementor-child' ); ?></h3>
				<p><?php esc_html_e( 'Guild recognition that fills one recipient’s individual daily capacity.', 'hello-elementor-child' ); ?></p>
				<small><?php esc_html_e( '$0.03 NWP ≐ 3 sextillion XP', 'hello-elementor-child' ); ?></small>
			</article>
		</div>
	</section>

	<section class="llb-penny-balance" aria-label="<?php esc_attr_e( 'Treasured Penny balance', 'hello-elementor-child' ); ?>">
		<article>
			<h3><?php esc_html_e( 'Giving remains limitless.', 'hello-elementor-child' ); ?></h3>
			<p><?php esc_html_e( 'A seller/giver can initiate as many genuine, independently accepted acts of gratitude as people are willing to receive.', 'hello-elementor-child' ); ?></p>
		</article>
		<article>
			<h3><?php esc_html_e( 'Personal capacity remains fixed.', 'hello-elementor-child' ); ?></h3>
			<p><?php esc_html_e( 'A buyer/recipient may accept no more than $0.03 NWP into individual capacity each day. Additional accepted gratitude is supported by the Gratitude Community Surplus.', 'hello-elementor-child' ); ?></p>
		</article>
	</section>

	<section class="llb-penny-close">
		<h2><?php esc_html_e( 'Leave your wallet at home. Bring the one thing money cannot buy.', 'hello-elementor-child' ); ?></h2>
		<p><?php esc_html_e( 'Your time. Your choice. Your presence. One treasured penny simply lets another person say, “I am grateful you showed up.”', 'hello-elementor-child' ); ?></p>
	</section>

	<aside class="notice">
		<strong><?php esc_html_e( 'XP means Experience Presence.', 'hello-elementor-child' ); ?></strong>
		<p><?php esc_html_e( 'The $0.01, $0.02 and $0.03 amounts are Network Weighted Presence references only. They are not cash, cryptocurrency, wages, credit or payment obligations. No response is treated as a character judgment.', 'hello-elementor-child' ); ?></p>
	</aside>
</div>
