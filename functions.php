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
    'primary' => esc_html__('Main menu', 'wp-manual-theme')
]);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );
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
    
    wp_register_style( 'lightbox.min-css', get_template_directory_uri() . '/assets/lightbox/lightbox.min.css', [], false, 'all' );
    wp_register_style( 'lightbox-css', get_template_directory_uri() . '/assets/lightbox/lightbox.min.css', [], false, 'all' );

    // Register scripts
    wp_register_script( 'responsivity-script', get_template_directory_uri() . '/assets/js/responsivity.js',
        array('jquery'), filemtime( get_template_directory() . '/assets/js/responsivity.js' ), true );
    wp_register_script( 'lightbox-script', get_template_directory_uri() . '/assets//lightbox/lightbox.min.js', [ 'jquery' ], false, true);
    wp_register_script( 'lightbox-browse', get_template_directory_uri() . '/assets/lightbox/lightbox.js', [], filemtime( get_template_directory() . '/assets/js/responsivity.js' ), true );

    // Enqueue styles
    wp_enqueue_style('style');
    wp_enqueue_style( 'google-fonts' );
    wp_enqueue_style( 'lightbox-css');
    wp_enqueue_style( 'lightbox.min-css');

    // Enqueue scripts
    wp_enqueue_script( 'responsivity-script' );
    wp_enqueue_script( 'lightbox-script' );
    wp_enqueue_script( 'lightbox-browse' );
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
function manual_custom_logo_setup() {
    $defaults = array(
        'height'    => 100,
        'width'     => 400,
        'flex-height'   => true,
        'flex-width'    => true,
        'header-text'   => array( 'site-title', 'site-description'),
    );
    add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'manual_custom_logo_setup' );
function manual_theme_setup()
{
    add_theme_support( 'manual_title-tag' );
    add_theme_support( 'custom-logo', [
        'header-text'   => [ 'site-title', 'site-description' ],
        'height'    => 100,
        'width'     => 400,
        'flex-height'   => true,
        'flex-width'    => true,
        ] );
    }

add_action( 'after_setup_theme', 'manual_theme_setup' );

function wp_add_block_template_part_support() {
    add_theme_support( 'block-template-parts' );
}

add_action( 'after_setup_theme', 'wp_add_block_template_part_support' );