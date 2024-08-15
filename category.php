<?php get_header(); ?>

<div id="content">
    <main>
        <div id="category-posts">
            <?php if (have_posts()) : ?>
                <h1><?php single_cat_title(); ?></h1>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="post">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                <?php endwhile; ?>
                <?php the_posts_navigation(); ?>
            <?php else : ?>
                <p><?php _e('No posts found in this category.'); ?></p>
            <?php endif; ?>
        </div>
    </main>
    <?php get_sidebar(); ?>
</div> <!-- content -->

<?php get_footer(); ?>
