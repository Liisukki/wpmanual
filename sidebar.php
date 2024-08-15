<?php
/**
 * Sidebar file
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Manual_Theme
 */
?>

<div id="sidebar">
    <?php if (is_active_sidebar('sidebar')): ?>
        <?php dynamic_sidebar('sidebar'); ?>
    <?php else: ?>
        <p><?php esc_html_e('No widgets added.', 'wp-manual-theme'); ?></p>
    <?php endif; ?>
</div>
