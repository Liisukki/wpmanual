<?php
/**
 * The main page template file

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 */

get_header(); ?>

<div id="content">
    <main>
        <?php

        if (have_posts()):

            while (have_posts()):
                the_post(); ?>
                <article>
                    <?php the_content(); ?>
                </article>
                <?php
            endwhile;
        else: ?>
            <p>No posts</p>
            <?php
        endif; ?>
    </main>
    <?php

    get_sidebar(); ?>
</div> <!-- content -->
<?php
get_footer();
?>