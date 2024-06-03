<div id="sidebar">
    <?php if (is_active_sidebar('sidebar')): ?>
        <?php dynamic_sidebar('sidebar'); ?>
    <?php else: ?>
        <p><?php esc_html_e('No widgets added.', 'yourtheme'); ?></p>
    <?php endif; ?>
</div>