<?php
/**
 * Template Name: Human Gold Rush
 * Template Post Type: page
 *
 * Site landing page: First Principle video, hero, and Learn more media.
 * Used automatically at /. Do not use for the Welcome lesson page.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/hgr-template-helpers.php';
require_once get_stylesheet_directory() . '/inc/llb-bundle/helpers.php';

$join_url        = hello_elementor_child_hgr_join_url();
$llb_brand_url   = home_url( '/' );
$llb_active_file = '';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php esc_html_e( 'Human Gold Rush | Legacy to Live By', 'hello-elementor-child' ); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'hgr-body llb-bundle-body' ); ?>>
<?php wp_body_open(); ?>

<a class="skip" href="#main"><?php esc_html_e( 'Skip to content', 'hello-elementor-child' ); ?></a>

<?php include get_stylesheet_directory() . '/inc/llb-bundle/header.php'; ?>
<?php include get_stylesheet_directory() . '/inc/llb-bundle/trifecta.php'; ?>
<?php include get_stylesheet_directory() . '/inc/llb-bundle/sidebar.php'; ?>
		<div class="hgr-wrap hgr-hero">
			<span class="hgr-badge hgr-reveal"><?php esc_html_e( 'Testnet demo — no real accounts', 'hello-elementor-child' ); ?></span>
			<h1 class="hgr-reveal hgr-reveal-delay-1"><?php esc_html_e( 'Show up. Strike gold. Carry the proof.', 'hello-elementor-child' ); ?></h1>
			<p class="hgr-tagline hgr-reveal hgr-reveal-delay-2"><?php esc_html_e( 'A research project on presence, covenant, and gratitude.', 'hello-elementor-child' ); ?></p>
			<p class="hgr-welcome hgr-reveal hgr-reveal-delay-2"><?php esc_html_e( "Welcome. Whenever you're ready, there's a stone waiting for your hand.", 'hello-elementor-child' ); ?></p>
			<p class="hgr-desc hgr-reveal hgr-reveal-delay-3"><?php esc_html_e( "Human Gold Rush is a research project built around one mechanic: showing up. Each touchstone is tied to a Practice FAITH covenant. RSVP your intent, then prove you showed up within 50 meters and 3 minutes of acceptance, and you strike gold — earning a Tiger's Eye touchstone as physical proof. No money changes hands anywhere in this project.", 'hello-elementor-child' ); ?></p>
			<div class="hgr-cta-row hgr-reveal hgr-reveal-delay-4">
				<a class="hgr-btn hgr-btn-primary" href="<?php echo esc_url( $join_url ); ?>"><?php esc_html_e( 'Join the rush', 'hello-elementor-child' ); ?></a>
				<a class="hgr-btn hgr-btn-ghost" href="#steps"><?php esc_html_e( 'How it works', 'hello-elementor-child' ); ?></a>
			</div>
		</div>

		<section class="hgr-video" aria-label="<?php esc_attr_e( 'The First Principle', 'hello-elementor-child' ); ?>">
			<div class="hgr-video-frame hgr-reveal">
				<video
					class="hgr-video-player"
					controls
					playsinline
					preload="metadata"
				>
					<source src="https://legacytoliveby.org/wp-content/uploads/2026/07/The_First_Principle.mp4" type="video/mp4">
					<?php esc_html_e( 'Your browser does not support the video tag.', 'hello-elementor-child' ); ?>
				</video>
			</div>
			<p class="hgr-video-caption"><?php esc_html_e( 'The First Principle', 'hello-elementor-child' ); ?></p>
		</section>

		<div class="hgr-wrap">
			<section class="hgr-steps" id="steps">
				<h2><?php esc_html_e( 'How it works', 'hello-elementor-child' ); ?></h2>
				<div class="hgr-step-grid">
					<div class="hgr-step">
						<div class="hgr-step-num">1</div>
						<h3><?php esc_html_e( 'RSVP the covenant', 'hello-elementor-child' ); ?></h3>
						<p><?php esc_html_e( 'Register intent to keep a Practice FAITH commitment at a touchstone.', 'hello-elementor-child' ); ?></p>
					</div>
					<div class="hgr-step">
						<div class="hgr-step-num">2</div>
						<h3><?php esc_html_e( 'Claim window opens', 'hello-elementor-child' ); ?></h3>
						<p><?php esc_html_e( 'Acceptance opens a 50m / 3-minute window to prove you showed up.', 'hello-elementor-child' ); ?></p>
					</div>
					<div class="hgr-step">
						<div class="hgr-step-num">3</div>
						<h3><?php esc_html_e( 'Strike gold', 'hello-elementor-child' ); ?></h3>
						<p><?php esc_html_e( 'Presence proven inside the window counts as a valid claim.', 'hello-elementor-child' ); ?></p>
					</div>
					<div class="hgr-step">
						<div class="hgr-step-num">4</div>
						<h3><?php esc_html_e( 'Carry your stone', 'hello-elementor-child' ); ?></h3>
						<p><?php esc_html_e( "A Tiger's Eye touchstone is queued for you — no purchase, ever.", 'hello-elementor-child' ); ?></p>
					</div>
				</div>
			</section>

			<section class="hgr-handoff">
				<div class="hgr-handoff-card">
					<p class="line"><?php echo esc_html( '"You showed up. That\'s the whole thing — you showed up."' ); ?></p>
					<p class="line"><?php esc_html_e( 'Carry this. Not as a prize — as the moment.', 'hello-elementor-child' ); ?></p>
					<p class="sub"><?php esc_html_e( "This is what you're actually joining: the ten seconds when a stone closes into your hand.", 'hello-elementor-child' ); ?></p>
				</div>
			</section>

			<section class="hgr-media" aria-label="<?php esc_attr_e( 'Project media', 'hello-elementor-child' ); ?>">
				<h2><?php esc_html_e( 'Learn more', 'hello-elementor-child' ); ?></h2>

				<article class="hgr-media-group">
					<h3><?php esc_html_e( 'What this project is designed to accomplish', 'hello-elementor-child' ); ?></h3>
					<p class="hgr-media-intro"><?php esc_html_e( 'Hope this helps understand what this project is designed to accomplish.', 'hello-elementor-child' ); ?></p>

					<div class="hgr-media-item">
						<span class="hgr-media-badge hgr-media-badge--video"><?php esc_html_e( 'Video', 'hello-elementor-child' ); ?></span>
						<div class="hgr-video-frame hgr-media-player">
							<video class="hgr-video-player" controls playsinline preload="metadata">
								<source src="https://legacytoliveby.org/wp-content/uploads/2026/08/Architecting_the_Decoupled_DAO__The_XP_Testnet_Model.mp4" type="video/mp4">
							</video>
						</div>
						<p class="hgr-media-caption"><?php esc_html_e( 'Architecting the Decoupled DAO: The XP Testnet Model', 'hello-elementor-child' ); ?></p>
					</div>

					<div class="hgr-media-item">
						<span class="hgr-media-badge hgr-media-badge--pdf"><?php esc_html_e( 'PDF', 'hello-elementor-child' ); ?></span>
						<a class="hgr-media-doc" href="https://drive.google.com/file/d/1lkNINRSpzmFw1hg_7-qH79YTVBtrjfMF/view?usp=sharing" target="_blank" rel="noopener noreferrer">
							<span class="hgr-media-doc-icon" aria-hidden="true">PDF</span>
							<span class="hgr-media-doc-text">
								<strong><?php esc_html_e( 'Testnet Environment', 'hello-elementor-child' ); ?></strong>
								<small><?php esc_html_e( 'Open PDF in Google Drive', 'hello-elementor-child' ); ?></small>
							</span>
							<span class="hgr-media-doc-arrow" aria-hidden="true">→</span>
						</a>
					</div>

					<div class="hgr-media-item hgr-media-item--audio">
						<div class="hgr-audio-card">
							<span class="hgr-media-badge hgr-media-badge--podcast"><?php esc_html_e( 'Podcast', 'hello-elementor-child' ); ?></span>
							<p class="hgr-audio-title"><?php esc_html_e( 'An economy built on human presence', 'hello-elementor-child' ); ?></p>
							<audio class="hgr-audio-player" controls preload="metadata">
								<source src="https://legacytoliveby.org/wp-content/uploads/2026/08/An_economy_built_on_human_presence.mp4" type="audio/mp4">
							</audio>
						</div>
					</div>
				</article>

				<article class="hgr-media-group">
					<h3><?php esc_html_e( 'Moving towards May 17, 2040', 'hello-elementor-child' ); ?></h3>

					<div class="hgr-media-item">
						<span class="hgr-media-badge hgr-media-badge--video"><?php esc_html_e( 'Video', 'hello-elementor-child' ); ?></span>
						<div class="hgr-video-frame hgr-media-player">
							<video class="hgr-video-player" controls playsinline preload="metadata">
								<source src="https://legacytoliveby.org/wp-content/uploads/2026/08/The_Human_Gold_Rush__Architecting_a_0__DAO_Economy.mp4" type="video/mp4">
							</video>
						</div>
						<p class="hgr-media-caption"><?php esc_html_e( 'The Human Gold Rush: Architecting a $0 DAO Economy', 'hello-elementor-child' ); ?></p>
					</div>

					<div class="hgr-media-item">
						<span class="hgr-media-badge hgr-media-badge--pdf"><?php esc_html_e( 'PDF', 'hello-elementor-child' ); ?></span>
						<a class="hgr-media-doc" href="https://drive.google.com/file/d/1lkNINRSpzmFw1hg_7-qH79YTVBtrjfMF/view?usp=sharing" target="_blank" rel="noopener noreferrer">
							<span class="hgr-media-doc-icon" aria-hidden="true">PDF</span>
							<span class="hgr-media-doc-text">
								<strong><?php esc_html_e( 'Testnet Environment', 'hello-elementor-child' ); ?></strong>
								<small><?php esc_html_e( 'Open PDF in Google Drive', 'hello-elementor-child' ); ?></small>
							</span>
							<span class="hgr-media-doc-arrow" aria-hidden="true">→</span>
						</a>
					</div>

					<div class="hgr-media-item hgr-media-item--audio">
						<div class="hgr-audio-card">
							<span class="hgr-media-badge hgr-media-badge--podcast"><?php esc_html_e( 'Podcast', 'hello-elementor-child' ); ?></span>
							<p class="hgr-audio-title"><?php esc_html_e( 'Separating human presence from financial debt', 'hello-elementor-child' ); ?></p>
							<audio class="hgr-audio-player" controls preload="metadata">
								<source src="https://legacytoliveby.org/wp-content/uploads/2026/08/Separating_human_presence_from_financial_debt.mp4" type="audio/mp4">
							</audio>
						</div>
					</div>
				</article>

				<article class="hgr-media-group">
					<h3><?php esc_html_e( 'Stephen Hawking message', 'hello-elementor-child' ); ?></h3>
					<div class="hgr-media-item">
						<span class="hgr-media-badge hgr-media-badge--video"><?php esc_html_e( 'Video', 'hello-elementor-child' ); ?></span>
						<div class="hgr-video-frame hgr-media-player hgr-media-player--youtube">
							<iframe
								src="https://www.youtube.com/embed/VYxjumUhji0"
								title="<?php esc_attr_e( 'Stephen Hawking message', 'hello-elementor-child' ); ?>"
								allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
								allowfullscreen
								loading="lazy"
							></iframe>
						</div>
						<p class="hgr-media-caption"><?php esc_html_e( 'Stephen Hawking message', 'hello-elementor-child' ); ?></p>
					</div>
				</article>
			</section>

			<footer class="hgr-footer">
				<?php esc_html_e( 'No money changes hands anywhere in Human Gold Rush. This page is a research-project prototype — testnet / demo only.', 'hello-elementor-child' ); ?>
			</footer>
		</div>
	</div>
</main>

<?php include get_stylesheet_directory() . '/inc/llb-bundle/context.php'; ?>

<?php wp_footer(); ?>
</body>
</html>
