<div?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theFIRMA_example_2
 */
?>

<footer id="site-footer" role="contentinfo">
<div id="footer-logo"> 
<?php if ( function_exists( 'the_custom_logo') ) {
			the_custom_logo();
		}
		?>
		<div id="copyright-text">
	&copy; <?php echo date('Y'); ?> <?php _e('theFIRMA & Liisa Kotilainen', 'theFIRMA_example_2'); ?>
	</div>
</div>
</footer>
</div> <!-- site-container -->
<?php wp_footer(); ?>
</body>

</html>