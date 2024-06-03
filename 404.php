<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * 
 * @package YourTheme
 */

get_header();
?>

<div id="content">
	<main>
		<article <?php post_class(); ?>>
			<h2><?php esc_html_e("Oops! Sorry, looks like there's nothing here!", 'yourtheme'); ?></h2>
			<p><?php esc_html_e("Perhaps you would like to go back or look for something else?", 'yourtheme'); ?></p>
			<?php get_search_form(); ?>
			<p><br>
				<?php esc_html_e("If you'd like, you can also send us a message with the following form.", 'yourtheme'); ?>
			</p>
			<?php echo do_shortcode('[contact-form-7 id="7c98b2f" title="404-form"]'); ?>
		</article>
	</main>
	<?php get_sidebar(); ?>
</div> <!-- content -->

<?php get_footer(); ?>