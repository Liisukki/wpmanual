<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> <!-- Adds a bunch of classes for every page -->

<?php if (function_exists( 'wp_body_open' )) {
wp_body_open(  );
}
?> <!-- Enables adding JS right after the body-tag -->

	<div id="site-container">
		<nav id="top-nav" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'wp-manual-theme'); ?>">
			<?php wp_nav_menu([
				'theme_location' => 'primary'
			]) ?>
		</nav>
		<header id="site-header">
			<h1>
				<?php bloginfo('name'); ?>
			</h1>

			<div class="description">
				<?php bloginfo('description'); ?>
			</div>
		</header>