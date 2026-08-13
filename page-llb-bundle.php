<?php
/**
 * Template Name: LLB Community Bundle
 * Template Post Type: page
 *
 * Legacy to Live By — Codepixelzmedia publishing bundle pages.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/llb-bundle/helpers.php';

$slug   = get_post_field( 'post_name', get_the_ID() );
$config = hello_elementor_child_llb_page_config( $slug );

if ( ! $config ) {
	wp_safe_redirect( hello_elementor_child_llb_welcome_url() );
	exit;
}

$llb_active_file = $config['file'];
$page_title      = $config['title'];
$page_desc       = $config['description'];
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo esc_html( $page_title ); ?></title>
	<meta name="description" content="<?php echo esc_attr( $page_desc ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'llb-bundle-body' ); ?>>
<?php wp_body_open(); ?>

<a class="skip" href="#main"><?php esc_html_e( 'Skip to content', 'hello-elementor-child' ); ?></a>

<?php include get_stylesheet_directory() . '/inc/llb-bundle/header.php'; ?>
<?php
// Fallback: Welcome should use page-llb-welcome.php; keep trifecta if Bundle is assigned.
if ( in_array( $slug, hello_elementor_child_llb_welcome_slugs(), true ) ) {
	include get_stylesheet_directory() . '/inc/llb-bundle/trifecta.php';
}
?>
<?php include get_stylesheet_directory() . '/inc/llb-bundle/sidebar.php'; ?>

<main id="main">
	<?php hello_elementor_child_llb_render_content( $slug ); ?>
	<?php include get_stylesheet_directory() . '/inc/llb-bundle/footer.php'; ?>
</main>

<?php include get_stylesheet_directory() . '/inc/llb-bundle/context.php'; ?>

<?php wp_footer(); ?>
</body>
</html>
