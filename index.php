<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * 
 * @package WP manual theme
 */

get_header(); 
?>

<div id="content">
    <main>
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <article <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="category"><?php echo wp_kses_post(get_the_category_list(', ')); ?></p>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p><?php esc_html_e('No posts found', 'WP manual theme'); ?></p>
        <?php endif; ?>
    </main>
    <?php get_sidebar(); ?>
</div> <!-- #content -->

<?php get_footer(); ?>
