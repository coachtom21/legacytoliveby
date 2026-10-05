<?php
/**
 * Template Name: LLB Welcome
 * Template Post Type: page
 *
 * Human Gold Rush welcome lesson (human-gold-rush.html). Use slug: llb-welcome.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/llb-bundle/helpers.php';

$slug            = 'llb-welcome';
$config          = hello_elementor_child_llb_page_config( $slug );
$llb_active_file = $config ? $config['file'] : 'human-gold-rush.html';
$page_title      = $config ? $config['title'] : __( 'Human Gold Rush | Legacy to Live By', 'hello-elementor-child' );
$page_desc       = $config ? $config['description'] : '';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo esc_html( $page_title ); ?></title>
	<?php if ( $page_desc ) : ?>
	<meta name="description" content="<?php echo esc_attr( $page_desc ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'llb-bundle-body' ); ?>>
<?php wp_body_open(); ?>

<a class="skip" href="#main"><?php esc_html_e( 'Skip to content', 'hello-elementor-child' ); ?></a>

<?php include get_stylesheet_directory() . '/inc/llb-bundle/header.php'; ?>
<?php llb_render_hbc_return_bar(); ?>
<?php include get_stylesheet_directory() . '/inc/llb-bundle/trifecta.php'; ?>
<?php include get_stylesheet_directory() . '/inc/llb-bundle/sidebar.php'; ?>

<main id="main">
	<?php hello_elementor_child_llb_render_content( $slug ); ?>
	<?php include get_stylesheet_directory() . '/inc/llb-bundle/footer.php'; ?>
</main>

<?php include get_stylesheet_directory() . '/inc/llb-bundle/context.php'; ?>

<?php wp_footer(); ?>
</body>
</html>
