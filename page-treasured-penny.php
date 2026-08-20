<?php
/**
 * Template Name: Treasured Penny
 * Template Post Type: page
 *
 * Human Gold Rush invitation — gratitude-only Treasured Penny page.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/hgr-template-helpers.php';
require_once get_stylesheet_directory() . '/inc/llb-bundle/helpers.php';

$join_url        = hello_elementor_child_hgr_god_wink_url();
$llb_brand_url   = home_url( '/' );
$llb_active_file = 'treasured-penny.html';
$page_title      = __( 'The Treasured Penny | Legacy To Live By', 'hello-elementor-child' );
$page_desc       = __( 'The Treasured Penny — a Human Gold Rush invitation from Legacy To Live By.', 'hello-elementor-child' );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo esc_html( $page_title ); ?></title>
	<meta name="description" content="<?php echo esc_attr( $page_desc ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'llb-bundle-body llb-penny-body' ); ?>>
<?php wp_body_open(); ?>

<a class="skip" href="#main"><?php esc_html_e( 'Skip to content', 'hello-elementor-child' ); ?></a>

<?php include get_stylesheet_directory() . '/inc/llb-bundle/header.php'; ?>
<?php include get_stylesheet_directory() . '/inc/llb-bundle/trifecta.php'; ?>
<?php include get_stylesheet_directory() . '/inc/llb-bundle/sidebar.php'; ?>

<main id="main">
	<?php include get_stylesheet_directory() . '/inc/llb-bundle/content/treasured-penny.php'; ?>
	<?php include get_stylesheet_directory() . '/inc/llb-bundle/footer.php'; ?>
</main>

<?php include get_stylesheet_directory() . '/inc/llb-bundle/context.php'; ?>

<?php wp_footer(); ?>
</body>
</html>
