<?php

/** 
* Here you can add general functionality to your theme.
 *
 * @package WP manual theme
 */
?>


<?php

/* Register menus */
register_nav_menus([
    'primary' => __('Main menu', 'textdomain')
]);


/* 
* Register and enqueue all assets
* https://www.wpbeginner.com/wp-tutorials/how-to-properly-add-javascripts-and-styles-in-wordpress/
*
* The function filemtime() gets the version number dynamically
*/
function manual_assets()
{
    // Register styles
    wp_register_style( 'style', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css' ), 'all' );
    wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Sofia+Sans+Condensed:wght@400;700&display=swap', false );
    
    // Register scripts
    wp_register_script( 'responsivity-script', get_template_directory_uri() . '/assets/js/responsivity.js',
        array('jquery'), filemtime( get_template_directory() . '/assets/js/responsivity.js' ), true );

    // Enqueue styles
    wp_enqueue_style('style');
    wp_enqueue_style( 'google-fonts' );

    // Enqueue scripts
    wp_enqueue_script( 'responsivity-script' );
    }

/*  */
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
        ));
}

add_action('widgets_init', 'manual_widgets_init');

/* Customize excerpt read more link */
function excerpt_read_more($more)
{
    return sprintf('<br><br><a href="%s" class="readmore">%s &raquo;</a>', esc_url(get_permalink()), __('Read more', 'textdomain'));
}

add_filter('excerpt_more', 'excerpt_read_more');

/**
 * --------------------------------------------------------------------------------
 * Theme Customization Options
 * --------------------------------------------------------------------------------
*/
require_once ( get_template_directory() . '/customizer/customizer.php' );


/* Theme setup */

/* 
* Function to get the document title from WordPress 
* dynamically instead of a hard coded <title> 
*/
function manual_theme_setup()
{
    add_theme_support('title-tag');
}

add_action( 'after_setup_theme', 'manual_theme_setup' );

function wp_add_block_template_part_support() {
    add_theme_support( 'block-template-parts' );
}

add_action( 'after_setup_theme', 'wp_add_block_template_part_support' );