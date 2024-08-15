<?php
/**
 * The post template file
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); 
?>

<div id="content">
    <main>
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <article <?php post_class(); ?>>
                    <h1><?php the_title(); ?></h1>
                    <p class="category"><?php echo wp_kses_post(get_the_category_list(', ')); ?></p>
                    <?php echo wp_kses_post(the_content()); ?>
                </article>
            <?php endwhile; 
            ?>
        <?php else: ?>
            <p><?php esc_html_e('No posts found'); ?></p>
        <?php endif; ?>
    </main>
    
    <?php get_sidebar(); ?>
</div> <!-- #content -->

<?php get_footer(); ?>
