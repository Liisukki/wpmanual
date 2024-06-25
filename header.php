<?php
/**
 * Header file
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP manual theme
 * 
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!-- Displays the language attributes dynamically -->

<head>
	<meta charset="<?php bloginfo('charset'); ?>"> <!-- Displays the encoding of the current site dynamically -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?> <!-- Prints scripts and data in the head tag on the front end -->
</head>

<body <?php body_class(); ?>> <!-- Displays the class names for the body element dynamically -->

<!-- Check backward compability in case someone uses WP version < 5.2 -->
<?php if (function_exists( 'wp_body_open' )) { 
	wp_body_open(  );
	} ?> <!-- Enables adding JS right after the body-tag -->

	<div id="page" class="site-container">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'sakken-galleria'); ?></a>
    <header id="masthead" class="site-header" style="background-image: url(<?php header_image(); ?>);">
		<nav id="top-nav" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'wp-manual-theme'); ?>">
			<?php wp_nav_menu([
				'theme_location' => 'primary'
			]) ?>
		</nav>

			<div class="site-title-container">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<div class="description">
				<?php bloginfo('description'); ?>
			</div>
		</div>
	</header>