<?php
/**
 * Template Name: Human Gold Rush
 * Template Post Type: page
 *
 * Site landing page: Oligopoly video, hero, and Practice FAITH postcard.
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
$welcome_url     = hello_elementor_child_llb_welcome_url( 'welcome' );
$video_url       = hello_elementor_child_hgr_first_principle_video_url();
$postcard_img    = hello_elementor_child_hgr_postcard_image_url();
$postcard_pdf    = hello_elementor_child_hgr_postcard_pdf_url();
$postcard_qr     = hello_elementor_child_hgr_rsvp_qr_url();
$postcard_scan   = hello_elementor_child_hgr_postcard_scan_url();
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

		<div class="hgr-wrap" id="coach-tom-welcome">
			<?php hello_elementor_child_render_coach_tom_welcome(); ?>
		</div>

		<section class="hgr-video" aria-label="<?php esc_attr_e( 'The First Principle', 'hello-elementor-child' ); ?>">
			<div class="hgr-video-frame hgr-reveal">
				<video
					class="hgr-video-player"
					controls
					playsinline
					preload="metadata"
				>
					<source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
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

			<section class="hgr-postcard" aria-labelledby="postcard-title">
				<h2 id="postcard-title"><?php esc_html_e( 'Practice FAITH postcard', 'hello-elementor-child' ); ?></h2>
				<div class="hgr-postcard-pair">
					<figure class="hgr-postcard-media">
						<img
							src="<?php echo esc_url( $postcard_img ); ?>"
							alt="<?php esc_attr_e( 'Human Gold Rush RSVP postcard', 'hello-elementor-child' ); ?>"
							width="1400"
							height="900"
							loading="lazy"
							decoding="async"
						>
					</figure>
					<figure class="hgr-postcard-qr">
						<a href="<?php echo esc_url( $postcard_scan ); ?>" target="_blank" rel="noopener noreferrer">
							<img
								src="<?php echo esc_url( $postcard_qr ); ?>"
								alt="<?php esc_attr_e( 'Human Gold RSVP code — scan to open megavoters.com', 'hello-elementor-child' ); ?>"
								width="512"
								height="669"
								loading="lazy"
								decoding="async"
							>
						</a>
						<figcaption><?php esc_html_e( 'Human Gold RSVP — scan to megavoters.com', 'hello-elementor-child' ); ?></figcaption>
					</figure>
				</div>
				<blockquote class="hgr-postcard-quote">
					<p><?php esc_html_e( 'Could you Practice FAITH by being Fair, Accepting, Insightful, Transparent, and Humble in your relationships with others?', 'hello-elementor-child' ); ?></p>
					<p><?php esc_html_e( 'If so, here’s a postcard.', 'hello-elementor-child' ); ?></p>
					<p><?php esc_html_e( 'Choose the touchstone word that means the most to you and reserve your complimentary stone. Keep this postcard and scan the QR code whenever you’re curious about when and where your LAUGH fulfillment event will take place.', 'hello-elementor-child' ); ?></p>
					<p><?php esc_html_e( 'Come pick up your stone—or choose not to. Either response matters.', 'hello-elementor-child' ); ?></p>
					<p><?php esc_html_e( 'We’re simply curious who shows up.', 'hello-elementor-child' ); ?></p>
				</blockquote>
				<p class="hgr-postcard-gratitude"><?php esc_html_e( 'Sharing your time with us means more than money ever could. In return, we offer gratitude—not money—recorded as XP: Experience Presence. It simply recognizes that you showed up.', 'hello-elementor-child' ); ?></p>
				<div class="hgr-cta-row">
					<a class="hgr-btn hgr-btn-primary" href="<?php echo esc_url( $welcome_url ); ?>"><?php esc_html_e( 'RSVP for your touchstone', 'hello-elementor-child' ); ?></a>
					<a class="hgr-btn hgr-btn-ghost" href="<?php echo esc_url( $postcard_pdf ); ?>" download><?php esc_html_e( 'Download postcard PDF', 'hello-elementor-child' ); ?></a>
				</div>
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
