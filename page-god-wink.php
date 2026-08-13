<?php
/**
 * Template Name: God Wink
 * Template Post Type: page
 *
 * Enhanced welcome page after "Join the Rush" — MEGA study onboarding.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/hgr-template-helpers.php';
require_once get_stylesheet_directory() . '/inc/llb-bundle/helpers.php';

$landing_url      = hello_elementor_child_hgr_landing_url();
$welcome_url      = hello_elementor_child_llb_welcome_url( 'welcome' );
$rsvp_url         = $welcome_url; // RSVP / reserve → Welcome #welcome
$laugh_url        = hello_elementor_child_llb_page_url( 'laugh-events' );
$organizers_url   = hello_elementor_child_llb_page_url( 'prepare-laugh-event' );
$bundle_welcome   = $welcome_url;
$hbc_url          = hello_elementor_child_hbc_register_url();
$faith_url        = hello_elementor_child_llb_page_url( 'tigers-eye-covenant' );
$discord_url      = hello_elementor_child_llb_discord_url();
$touchstone_image = hello_elementor_child_god_wink_touchstone_image_url();
$media_video      = 'https://legacytoliveby.org/wp-content/uploads/2026/08/Human_Gold_Rush__The_Decisive_Separation.mp4';
$media_podcast    = 'https://legacytoliveby.org/wp-content/uploads/2026/08/Funding_Communities_Without_Monetizing_Human_Presence.mp4';
$media_pdf        = 'https://drive.google.com/file/d/1y6qcKz8JnjvwHom_X1SX5U-OBSI1d8ed/view?usp=sharing';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php esc_attr_e( 'Join the Human Gold Rush, a nonpartisan Make Everyone Great Again behavioral study measuring the journey from RSVP intention to verified human presence.', 'hello-elementor-child' ); ?>">
	<title><?php esc_html_e( 'Welcome to the Human Gold Rush | Legacy to Live By', 'hello-elementor-child' ); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'god-wink-body' ); ?>>
<?php wp_body_open(); ?>

<a class="gw-skip-link" href="#welcome"><?php esc_html_e( 'Skip to welcome', 'hello-elementor-child' ); ?></a>

<header class="gw-site-header">
	<nav class="gw-nav gw-container" aria-label="<?php esc_attr_e( 'Main navigation', 'hello-elementor-child' ); ?>">
		<a class="gw-brand" href="<?php echo esc_url( $landing_url ); ?>" aria-label="<?php esc_attr_e( 'Legacy to Live By home', 'hello-elementor-child' ); ?>">
			<span class="gw-brand-mark" aria-hidden="true">L</span>
			<span class="gw-brand-text">
				<strong><?php esc_html_e( 'Legacy to Live By', 'hello-elementor-child' ); ?></strong>
				<span><?php esc_html_e( 'Human Gold Rush', 'hello-elementor-child' ); ?></span>
			</span>
		</a>
		<div class="gw-nav-links">
			<a href="#how-it-works"><?php esc_html_e( 'How it works', 'hello-elementor-child' ); ?></a>
			<a href="#laugh-events"><?php esc_html_e( 'LAUGH Events', 'hello-elementor-child' ); ?></a>
			<a class="gw-btn gw-btn-primary" href="<?php echo esc_url( $rsvp_url ); ?>"><?php esc_html_e( 'Reserve a touchstone', 'hello-elementor-child' ); ?></a>
		</div>
	</nav>
</header>

<?php include get_stylesheet_directory() . '/inc/llb-bundle/trifecta.php'; ?>

<main>
	<section class="gw-hero" id="welcome" aria-labelledby="welcome-title">
		<div class="gw-hero-inner gw-container">
			<div class="gw-hero-copy">
				<span class="gw-eyebrow"><?php esc_html_e( 'Make Everyone Great Again · A nonpartisan behavioral study', 'hello-elementor-child' ); ?></span>
				<h1 id="welcome-title"><?php esc_html_e( 'Join the Human Gold Rush.', 'hello-elementor-child' ); ?></h1>
				<p class="gw-hero-lead"><?php esc_html_e( 'A postcard records what you intend. A LAUGH fulfillment event reveals whether you show up. Together, we are measuring the human value made visible when people freely appear, help one another, and confirm that it happened.', 'hello-elementor-child' ); ?></p>
				<p class="gw-hero-note"><span aria-hidden="true"></span><?php esc_html_e( 'Observe for free. Participate voluntarily. Walk away at any time.', 'hello-elementor-child' ); ?></p>
				<div class="gw-hero-actions">
					<a class="gw-btn gw-btn-primary" href="<?php echo esc_url( $rsvp_url ); ?>"><?php esc_html_e( 'RSVP: I intend to show up', 'hello-elementor-child' ); ?> <span aria-hidden="true">→</span></a>
					<a class="gw-btn gw-ghost" href="#how-it-works"><?php esc_html_e( 'How presence is measured', 'hello-elementor-child' ); ?></a>
				</div>
			</div>
			<div class="gw-stone-wrap">
				<figure class="gw-hero-photo">
					<img src="<?php echo esc_url( $touchstone_image ); ?>" alt="<?php esc_attr_e( 'A polished Tiger’s Eye FAITH touchstone resting in an open hand', 'hello-elementor-child' ); ?>">
				</figure>
			</div>
		</div>
	</section>

	<section class="gw-onboard gw-section" aria-labelledby="onboard-title">
		<div class="gw-container">
			<div class="gw-section-heading">
				<span class="gw-eyebrow"><?php esc_html_e( 'God Wink · Continue onboarding', 'hello-elementor-child' ); ?></span>
				<h2 id="onboard-title"><?php esc_html_e( 'Three paths forward from here.', 'hello-elementor-child' ); ?></h2>
				<p><?php esc_html_e( 'Register your device, reserve your complimentary touchstone, then choose your Peace Pentagon branch and touchstone word.', 'hello-elementor-child' ); ?></p>
			</div>
			<div class="gw-onboard-grid">
				<article class="gw-onboard-card">
					<strong><?php esc_html_e( 'Register your device', 'hello-elementor-child' ); ?></strong>
					<p><?php esc_html_e( 'Human Blockchain registers your device for consent-scanned presence events.', 'hello-elementor-child' ); ?></p>
					<a class="gw-btn gw-btn-outline" href="<?php echo esc_url( $hbc_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Open HBC.info', 'hello-elementor-child' ); ?></a>
				</article>
				<article class="gw-onboard-card">
					<strong><?php esc_html_e( 'Order your touchstone', 'hello-elementor-child' ); ?></strong>
					<p><?php esc_html_e( 'A $0 backorder records anticipated demand. No card is required.', 'hello-elementor-child' ); ?></p>
					<a class="gw-btn gw-btn-outline" href="<?php echo esc_url( $rsvp_url ); ?>"><?php esc_html_e( 'Reserve my free touchstone', 'hello-elementor-child' ); ?></a>
				</article>
				<article class="gw-onboard-card">
					<strong><?php esc_html_e( 'Choose your branch', 'hello-elementor-child' ); ?></strong>
					<p><?php esc_html_e( 'Select a Peace Pentagon branch to observe and pick your touchstone word.', 'hello-elementor-child' ); ?></p>
					<a class="gw-btn gw-btn-outline" href="<?php echo esc_url( $bundle_welcome ); ?>"><?php esc_html_e( 'Continue to Welcome', 'hello-elementor-child' ); ?></a>
				</article>
			</div>
		</div>
	</section>

	<section class="gw-section">
		<div class="gw-welcome-grid gw-container">
			<div class="gw-welcome-copy">
				<span class="gw-eyebrow"><?php esc_html_e( 'From RSVP to reputation', 'hello-elementor-child' ); ?></span>
				<h2><?php esc_html_e( 'Showing up is what we measure.', 'hello-elementor-child' ); ?></h2>
				<p><?php esc_html_e( 'Make Everyone Great Again (MEGA) is a nonpartisan behavioral study expressed publicly as the Human Gold Rush. It compares RSVP intention with actual presence: Who responds? Who arrives? Who accepts delivery? Who returns to help? Who observes or walks away?', 'hello-elementor-child' ); ?></p>
				<p><?php esc_html_e( 'When people freely confirm that they showed up for one another, we acknowledge the experience with XP: Experience Presence. XP is gratitude and community memory—not money, political agreement, popularity, or a measure of human worth.', 'hello-elementor-child' ); ?></p>
			</div>
			<aside class="gw-quote-card">
				<blockquote><?php esc_html_e( 'We do not measure what people say they value. We measure whether they show up.', 'hello-elementor-child' ); ?></blockquote>
				<p><?php esc_html_e( 'Make Everyone Great Again · Human Gold Rush', 'hello-elementor-child' ); ?></p>
			</aside>
		</div>
	</section>

	<div class="gw-faith-strip gw-container" id="meaning" aria-label="<?php esc_attr_e( 'The Practice FAITH covenant carried into the Human Gold Rush', 'hello-elementor-child' ); ?>">
		<div class="gw-faith-grid">
			<div class="gw-faith-item"><span class="gw-faith-letter">F</span><strong><?php esc_html_e( 'Fair', 'hello-elementor-child' ); ?></strong><span><?php esc_html_e( 'Make room for every voice.', 'hello-elementor-child' ); ?></span></div>
			<div class="gw-faith-item"><span class="gw-faith-letter">A</span><strong><?php esc_html_e( 'Accepting', 'hello-elementor-child' ); ?></strong><span><?php esc_html_e( 'Meet people where they are.', 'hello-elementor-child' ); ?></span></div>
			<div class="gw-faith-item"><span class="gw-faith-letter">I</span><strong><?php esc_html_e( 'Insightful', 'hello-elementor-child' ); ?></strong><span><?php esc_html_e( 'Stay curious and listen.', 'hello-elementor-child' ); ?></span></div>
			<div class="gw-faith-item"><span class="gw-faith-letter">T</span><strong><?php esc_html_e( 'Transparent', 'hello-elementor-child' ); ?></strong><span><?php esc_html_e( 'Say clearly what happened.', 'hello-elementor-child' ); ?></span></div>
			<div class="gw-faith-item"><span class="gw-faith-letter">H</span><strong><?php esc_html_e( 'Humble', 'hello-elementor-child' ); ?></strong><span><?php esc_html_e( 'Let service speak first.', 'hello-elementor-child' ); ?></span></div>
		</div>
	</div>

	<section class="gw-section" aria-labelledby="covenant-title">
		<div class="gw-welcome-grid gw-container">
			<div class="gw-welcome-copy">
				<span class="gw-eyebrow"><?php esc_html_e( 'The covenant carried into the study', 'hello-elementor-child' ); ?></span>
				<h2 id="covenant-title"><?php esc_html_e( 'Practice FAITH gives presence a purpose.', 'hello-elementor-child' ); ?></h2>
				<p><?php esc_html_e( 'The complimentary touchstone carries a voluntary covenant to be Fair, Accepting, Insightful, Transparent, and Humble. The covenant does not prove character and the stone does not create value by itself. It gives each person a simple reason to come together and practice those qualities in relationship with others.', 'hello-elementor-child' ); ?></p>
				<p><?php esc_html_e( 'The study measures the behavior that follows: the RSVP, the choice to appear, the accepted delivery, the help offered, and the return visit. Practice FAITH is the invitation. Presence is the evidence.', 'hello-elementor-child' ); ?></p>
			</div>
			<aside class="gw-quote-card">
				<blockquote><?php esc_html_e( 'Wealth is measured by what you share over what you store. Presence confirms the sharing happened.', 'hello-elementor-child' ); ?></blockquote>
				<p><?php esc_html_e( 'Legacy to Live By', 'hello-elementor-child' ); ?></p>
			</aside>
		</div>
	</section>

	<section class="gw-section gw-path-section" aria-labelledby="choose-title">
		<div class="gw-container">
			<div class="gw-section-heading">
				<span class="gw-eyebrow"><?php esc_html_e( 'Your choice remains yours', 'hello-elementor-child' ); ?></span>
				<h2 id="choose-title"><?php esc_html_e( 'Three honest ways to respond.', 'hello-elementor-child' ); ?></h2>
				<p><?php esc_html_e( 'There is no wrong door. You may choose again whenever a new invitation is offered.', 'hello-elementor-child' ); ?></p>
			</div>
			<div class="gw-path-grid">
				<article class="gw-path-card gw-observe">
					<span class="gw-path-number">01</span>
					<h3><?php esc_html_e( 'Observe as a YAM’er', 'hello-elementor-child' ); ?></h3>
					<p><?php esc_html_e( 'Reserve a complimentary Practice FAITH touchstone, attend as a curious observer, and choose a Peace Pentagon branch you may want to learn from or mentor.', 'hello-elementor-child' ); ?></p>
					<p class="gw-micro"><?php esc_html_e( 'Free observer path · No fiscal responsibility', 'hello-elementor-child' ); ?></p>
				</article>
				<article class="gw-path-card gw-participate">
					<span class="gw-path-number">02</span>
					<h3><?php esc_html_e( 'Participate as a MEGAvoter', 'hello-elementor-child' ); ?></h3>
					<p><?php esc_html_e( 'Step forward as a messenger and co-creator. A voluntary $12 annual membership pledge adds responsibility and community voice; it is a pledge, not a payment at signup.', 'hello-elementor-child' ); ?></p>
					<p class="gw-micro"><?php esc_html_e( 'Participant path · Tiger’s Eye waitlist follows RSVP', 'hello-elementor-child' ); ?></p>
				</article>
				<article class="gw-path-card gw-walk">
					<span class="gw-path-number">03</span>
					<h3><?php esc_html_e( 'Walk Away', 'hello-elementor-child' ); ?></h3>
					<p><?php esc_html_e( 'Decline the invitation or gratitude without penalty. An honest “not now” is a meaningful response, and the door remains open if curiosity returns.', 'hello-elementor-child' ); ?></p>
					<p class="gw-micro"><?php esc_html_e( 'No membership created · Re-entry always welcomed', 'hello-elementor-child' ); ?></p>
				</article>
			</div>
		</div>
	</section>

	<section class="gw-section gw-sequence" id="how-it-works" aria-labelledby="sequence-title">
		<div class="gw-container">
			<div class="gw-section-heading">
				<span class="gw-eyebrow"><?php esc_html_e( 'The MEGA measurement', 'hello-elementor-child' ); ?></span>
				<h2 id="sequence-title"><?php esc_html_e( 'Intention begins the record. Presence gives it meaning.', 'hello-elementor-child' ); ?></h2>
				<p><?php esc_html_e( 'Can you practice FAITH by being Fair, Accepting, Insightful, Transparent, and Humble in your relationships with others? Decide now, later, or not at all. The RSVP measures anticipated demand. Showing up reveals presence.', 'hello-elementor-child' ); ?></p>
			</div>
			<div class="gw-steps">
				<article class="gw-step">
					<span class="gw-step-icon">1</span>
					<h3><?php esc_html_e( 'Receive the invitation', 'hello-elementor-child' ); ?></h3>
					<p><?php esc_html_e( 'Take a Practice FAITH RSVP postcard. Scan it when curious, or keep it until you are ready. There is no penalty or judgment either way.', 'hello-elementor-child' ); ?></p>
				</article>
				<article class="gw-step">
					<span class="gw-step-icon">2</span>
					<h3><?php esc_html_e( 'Choose one word', 'hello-elementor-child' ); ?></h3>
					<p><?php esc_html_e( 'Register your device through HBC, review the present-consent terms, and choose the one touchstone word—from twelve—that resonates with you.', 'hello-elementor-child' ); ?></p>
				</article>
				<article class="gw-step">
					<span class="gw-step-icon">3</span>
					<h3><?php esc_html_e( 'RSVP your intention', 'hello-elementor-child' ); ?></h3>
					<p><?php esc_html_e( 'Your selection creates one exact $0 WooCommerce backorder. No card is required, no payment is collected, and no extra giveaway stone is ordered.', 'hello-elementor-child' ); ?></p>
				</article>
				<article class="gw-step">
					<span class="gw-step-icon">4</span>
					<h3><?php esc_html_e( 'Return for LAUGH', 'hello-elementor-child' ); ?></h3>
					<p><?php esc_html_e( 'Scan again to see whether local pickup is scheduled. Continue as a YAM’er Observer or voluntary MEGAvoter Participant. Your selection is reserved only for your RSVP.', 'hello-elementor-child' ); ?></p>
				</article>
				<article class="gw-step">
					<span class="gw-step-icon">5</span>
					<h3><?php esc_html_e( 'Show up and choose', 'hello-elementor-child' ); ?></h3>
					<p><?php esc_html_e( 'Leave your wallet at home. Two device scans record accept, observe, dispute, or walk away. Acceptance is a private FAITH covenant—not proof of character or human worth.', 'hello-elementor-child' ); ?></p>
				</article>
			</div>
		</div>
	</section>

	<section class="gw-section gw-media-section" id="god-wink-media" aria-labelledby="media-title">
		<div class="gw-container">
			<div class="gw-section-heading">
				<span class="gw-eyebrow"><?php esc_html_e( 'God Wink', 'hello-elementor-child' ); ?></span>
				<h2 id="media-title"><?php esc_html_e( 'Watch, listen, and read more.', 'hello-elementor-child' ); ?></h2>
			</div>
			<div class="gw-media-grid">
				<div class="gw-media-item">
					<strong><?php esc_html_e( 'Video', 'hello-elementor-child' ); ?></strong>
					<div class="gw-media-frame gw-media-frame--video">
						<video class="gw-media-video" controls playsinline preload="metadata">
							<source src="<?php echo esc_url( $media_video ); ?>" type="video/mp4">
							<?php esc_html_e( 'Your browser does not support the video tag.', 'hello-elementor-child' ); ?>
						</video>
					</div>
					<p class="gw-media-caption"><?php esc_html_e( 'Human Gold Rush: The Decisive Separation', 'hello-elementor-child' ); ?></p>
				</div>
				<div class="gw-media-item">
					<strong><?php esc_html_e( 'Podcast', 'hello-elementor-child' ); ?></strong>
					<div class="gw-media-audio-card">
						<p class="gw-media-audio-title"><?php esc_html_e( 'Funding Communities Without Monetizing Human Presence', 'hello-elementor-child' ); ?></p>
						<audio class="gw-media-audio" controls preload="metadata">
							<source src="<?php echo esc_url( $media_podcast ); ?>" type="audio/mp4">
						</audio>
					</div>
				</div>
				<div class="gw-media-item">
					<strong><?php esc_html_e( 'PDF', 'hello-elementor-child' ); ?></strong>
					<a class="gw-media-doc" href="<?php echo esc_url( $media_pdf ); ?>" target="_blank" rel="noopener noreferrer">
						<span class="gw-media-doc-text">
							<strong><?php esc_html_e( 'God Wink Hallelujah', 'hello-elementor-child' ); ?></strong>
							<small><?php esc_html_e( 'Open PDF in Google Drive', 'hello-elementor-child' ); ?></small>
						</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<section class="gw-section gw-laugh" id="laugh-events" aria-labelledby="laugh-title">
		<div class="gw-laugh-grid gw-container">
			<div class="gw-laugh-copy">
				<span class="gw-eyebrow"><?php esc_html_e( 'Where the Human Gold Rush becomes visible', 'hello-elementor-child' ); ?></span>
				<h2 id="laugh-title"><?php esc_html_e( 'The invitation becomes real when people gather.', 'hello-elementor-child' ); ?></h2>
				<p><?php esc_html_e( 'LAUGH means Leaders’ Annual United Group Hug. Churches, community centers, merchants, and neighbors create welcoming fulfillment epi-centers where RSVP intention meets the truth of human presence.', 'hello-elementor-child' ); ?></p>
				<p><?php esc_html_e( 'Come without pressure. Pick up your stone. Meet someone new. Share a meal, a lesson, a story, or a helping hand. MEGA measures the community force revealed when people show up through trust—not fundraising or political persuasion.', 'hello-elementor-child' ); ?></p>
				<a class="gw-btn gw-btn-primary" href="<?php echo esc_url( $laugh_url ); ?>"><?php esc_html_e( 'Find a LAUGH event', 'hello-elementor-child' ); ?> <span aria-hidden="true">→</span></a>
			</div>
			<aside class="gw-event-card">
				<span class="gw-event-label"><?php esc_html_e( 'What to expect', 'hello-elementor-child' ); ?></span>
				<h3><?php esc_html_e( 'Leave your wallet behind. Bring your presence.', 'hello-elementor-child' ); ?></h3>
				<ul class="gw-event-list">
					<li><?php esc_html_e( 'Your RSVP and touchstone reservation', 'hello-elementor-child' ); ?></li>
					<li><?php esc_html_e( 'A welcoming Practice FAITH moment', 'hello-elementor-child' ); ?></li>
					<li><?php esc_html_e( 'Your choice to participate, observe, or walk away', 'hello-elementor-child' ); ?></li>
					<li><?php esc_html_e( 'Two-scan confirmation only with present consent', 'hello-elementor-child' ); ?></li>
					<li><?php esc_html_e( 'Gratitude recorded as XP—never money', 'hello-elementor-child' ); ?></li>
				</ul>
				<a class="gw-btn gw-ghost" href="<?php echo esc_url( $rsvp_url ); ?>"><?php esc_html_e( 'RSVP for a touchstone', 'hello-elementor-child' ); ?></a>
			</aside>
		</div>
	</section>

	<section class="gw-section" aria-labelledby="promise-title">
		<div class="gw-container">
			<div class="gw-section-heading">
				<span class="gw-eyebrow"><?php esc_html_e( 'What MEGA measures—and protects', 'hello-elementor-child' ); ?></span>
				<h2 id="promise-title"><?php esc_html_e( 'Presence becomes evidence without becoming surveillance.', 'hello-elementor-child' ); ?></h2>
				<p><?php esc_html_e( 'The smartphone helps compare intention with an accepted human moment; it does not define the human being.', 'hello-elementor-child' ); ?></p>
			</div>
			<div class="gw-truth-grid">
				<article class="gw-truth-card"><strong><?php esc_html_e( 'RSVP measures intention', 'hello-elementor-child' ); ?></strong><p><?php esc_html_e( 'The postcard response records anticipated demand and curiosity. It does not count as attendance or completed fulfillment.', 'hello-elementor-child' ); ?></p></article>
				<article class="gw-truth-card"><strong><?php esc_html_e( 'Consent happens now', 'hello-elementor-child' ); ?></strong><p><?php esc_html_e( 'A previous RSVP, membership choice, or device registration never replaces your present choice at the moment of a scan.', 'hello-elementor-child' ); ?></p></article>
				<article class="gw-truth-card"><strong><?php esc_html_e( 'XP is not money', 'hello-elementor-child' ); ?></strong><p><?php esc_html_e( 'XP recognizes Experience Presence. No fiat, crypto, or stored financial value settles inside the append-only presence record.', 'hello-elementor-child' ); ?></p></article>
				<article class="gw-truth-card"><strong><?php esc_html_e( 'Presence measures follow-through', 'hello-elementor-child' ); ?></strong><p><?php esc_html_e( 'One person declares delivery; the other accepts, observes, disputes, or walks away. Two scans record what happened.', 'hello-elementor-child' ); ?></p></article>
				<article class="gw-truth-card"><strong><?php esc_html_e( 'The quarter tells the truth', 'hello-elementor-child' ); ?></strong><p><?php esc_html_e( 'Monthly review checks the evidence; the full 12-week quarter preserves issued, pending, matured, disputed, and carried-forward presence outcomes. Testnet XP is never extinguished.', 'hello-elementor-child' ); ?></p></article>
				<article class="gw-truth-card"><strong><?php esc_html_e( 'Walk Away is respected', 'hello-elementor-child' ); ?></strong><p><?php esc_html_e( 'Declining gratitude is not failure. It is an honest behavioral response, with no penalty and no membership state created.', 'hello-elementor-child' ); ?></p></article>
			</div>
		</div>
	</section>

	<section class="gw-section gw-cta-section">
		<div class="gw-cta gw-container">
			<span class="gw-eyebrow"><?php esc_html_e( 'Make Everyone Great Again · Human Gold Rush', 'hello-elementor-child' ); ?></span>
			<h2><?php esc_html_e( 'Human value becomes visible when people show up.', 'hello-elementor-child' ); ?></h2>
			<p><?php esc_html_e( 'RSVP for your complimentary Practice FAITH touchstone. The postcard records your intention; your presence at a LAUGH fulfillment event becomes the measure.', 'hello-elementor-child' ); ?></p>
			<div class="gw-cta-actions">
				<a class="gw-btn gw-btn-dark" href="<?php echo esc_url( $rsvp_url ); ?>"><?php esc_html_e( 'Reserve my free touchstone', 'hello-elementor-child' ); ?></a>
				<a class="gw-btn gw-btn-outline" href="<?php echo esc_url( $organizers_url ); ?>"><?php esc_html_e( 'Bring LAUGH to my community', 'hello-elementor-child' ); ?></a>
			</div>
		</div>
	</section>
</main>

<footer class="gw-site-footer">
	<div class="gw-footer-grid gw-container">
		<div class="gw-footer-brand">
			<a class="gw-brand" href="<?php echo esc_url( $landing_url ); ?>">
				<span class="gw-brand-mark" aria-hidden="true">L</span>
				<span class="gw-brand-text">
					<strong><?php esc_html_e( 'Legacy to Live By', 'hello-elementor-child' ); ?></strong>
					<span><?php esc_html_e( 'Human Gold Rush', 'hello-elementor-child' ); ?></span>
				</span>
			</a>
			<p><?php esc_html_e( 'Make Everyone Great Again is a nonpartisan behavioral study expressed through the Human Gold Rush: community centers, churches, merchants, and neighbors learning how community force can be built without money—one confirmed presence at a time.', 'hello-elementor-child' ); ?></p>
		</div>
		<div class="gw-footer-col">
			<strong><?php esc_html_e( 'Begin', 'hello-elementor-child' ); ?></strong>
			<a href="<?php echo esc_url( $rsvp_url ); ?>"><?php esc_html_e( 'Reserve a touchstone', 'hello-elementor-child' ); ?></a>
			<a href="<?php echo esc_url( $laugh_url ); ?>"><?php esc_html_e( 'LAUGH Events', 'hello-elementor-child' ); ?></a>
			<a href="<?php echo esc_url( hello_elementor_child_hgr_god_wink_url() ); ?>"><?php esc_html_e( 'God Wink', 'hello-elementor-child' ); ?></a>
		</div>
		<div class="gw-footer-col">
			<strong><?php esc_html_e( 'Learn', 'hello-elementor-child' ); ?></strong>
			<a href="<?php echo esc_url( $faith_url ); ?>"><?php esc_html_e( 'Practice FAITH', 'hello-elementor-child' ); ?></a>
			<a href="<?php echo esc_url( $bundle_welcome ); ?>"><?php esc_html_e( 'Welcome lesson', 'hello-elementor-child' ); ?></a>
			<a href="<?php echo esc_url( $organizers_url ); ?>"><?php esc_html_e( 'For organizers', 'hello-elementor-child' ); ?></a>
		</div>
	</div>
	<div class="gw-fineprint gw-container"><?php esc_html_e( 'Practice FAITH touchstones are complimentary. XP means Experience Presence and is not currency, legal tender, or a measure of human worth. Any dollar figures shown beside XP use research comparison only (≐), never convertible redemption. Participation is voluntary.', 'hello-elementor-child' ); ?></div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
