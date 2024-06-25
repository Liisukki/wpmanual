<?php
/**
 * Registers options with the Theme Customizer
 *
 * @param      object    $wp_customize    The WordPress Theme Customizer
 */

add_action( 'customize_register', 'manual_customize_register' );
function manual_customize_register( $wp_customize ) {

  // All the Customize Options you create goes here

  // Move Homepage Settings section underneath the "Site Identity" section
  $wp_customize->get_section('title_tagline')->priority=1;
  $wp_customize->get_section('static_front_page')->priority = 2;

}
function manual_custom_header_setup() {
    $defaults = array(
        'width'              => 1200,
        'height'             => 5400,
        'header-text '       => true,
        'flex-height'        => true,
        'flex-width'         => true,
        'uploads'            => true,
        'default-image'      => '',
    );
    add_theme_support( 'custom-header', $defaults );

}

add_action( 'after_setup_theme', 'manual_custom_header_setup' );