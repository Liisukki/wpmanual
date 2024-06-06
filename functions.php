<?php

/* Here you can add general functionality to your theme
 *
 * LINK TO FUNCTIONS
 */
?>


<?php
/* Register menus */
register_nav_menus([
    'primary' => __('Main menu', 'textdomain')
]);


/* Register stylesheets and scripts */
function manual_assets()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Sofia+Sans+Condensed:wght@400;700&display=swap', false);
    wp_enqueue_script(
        'responsivity-script',
        get_template_directory_uri() . '/assets/js/responsivity.js',
        array('jquery'),
        '1.0.0',
        true
    );
}


add_action('wp_enqueue_scripts', 'manual_assets');

/* Register sidebar widget area */
function manual_widgets_init()
{
    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        )
    );

}
add_action('widgets_init', 'manual_widgets_init');

/* Customize excerpt read more link */
function excerpt_read_more($more)
{
    return sprintf('<br><br><a href="%s" class="readmore">%s &raquo;</a>', esc_url(get_permalink()), __('Read more', 'textdomain'));
}
add_filter('excerpt_more', 'excerpt_read_more');

/* Theme setup */
function manual_theme_setup()
{
    add_theme_support('title-tag');
}

add_action( 'after_setup_theme', 'manual_theme_setup' );

add_action( 'after_setup_theme', 'wp_add_block_template_part_support' );

function wp_add_block_template_part_support() {
    add_theme_support( 'block-template-parts' );
}

?>