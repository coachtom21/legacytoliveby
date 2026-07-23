<?php
/**
 * LLB bundle sidebar navigation — fixed left column on desktop.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$active_file   = isset( $llb_active_file ) ? $llb_active_file : '';
$discord_url = hello_elementor_child_llb_discord_url();
$url_map       = hello_elementor_child_llb_url_map();
?>
<aside id="sidebar" class="sidebar" aria-label="<?php esc_attr_e( 'Community navigation', 'hello-elementor-child' ); ?>">
	<nav>
		<?php foreach ( hello_elementor_child_llb_nav_groups() as $group ) : ?>
			<div class="nav-group">
				<p><?php echo esc_html( $group['label'] ); ?></p>
				<?php foreach ( $group['items'] as $item ) : ?>
					<?php
					$href      = isset( $url_map[ $item['file'] ] ) ? $url_map[ $item['file'] ] : '#';
					$is_active = ( $active_file === $item['file'] );
					?>
					<a class="<?php echo $is_active ? 'active' : ''; ?>" href="<?php echo esc_url( $href ); ?>">
						<?php echo esc_html( $item['label'] ); ?>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</nav>
	<a class="discord-button" href="<?php echo esc_url( $discord_url ); ?>" target="_blank" rel="noopener noreferrer">
		<span>◉</span>
		<div>
			<strong>Discord Gracebook</strong>
			<small>Enter the community</small>
		</div>
	</a>
</aside>
