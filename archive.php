<?php 
/** 
* Template Name: Archives
* 
* This archives page displays an excerpt of the three latest articles
* iterating through them category per category.
*
* @package WP manual theme
*/
get_header(); ?>

<div id="content">
    <main>
        <div id="category-box">
<?php 

$categories = get_categories(); // Get all categories

foreach ($categories as $category) : ?>

<div class="category-section">
        <h2><?php echo esc_html($category->name); ?></h2>

        <?php

        $the_query = new WP_Query(array(
            'cat' => $category->term_id, // Get all articles from a category
            'orderby' => 'date',
            'order' => 'desc',
            'posts_per_page' => '3',
    ));

    if ($the_query->have_posts()) : ?>

        <div class="articles-row"> <!-- Articles are displayed in rows  -->

        <?php
        while($the_query->have_posts()) : $the_query->the_post(); ?>   
        <div class="article-box">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="date"><?php echo get_the_date(); ?></p>
            <?php the_excerpt(); ?>
         </div> <!-- article-box -->
        <?php
        endwhile;
        ?>
        </div> <!-- articles-row -->
        <?php
        wp_reset_postdata();
    else: ?>
                    <p>No articles in this category.</p>
                    <?php
    endif; ?>
        </div> <!-- category-section -->
        <?php 
        endforeach; ?>
        </div> <!-- category-box -->
    </main>

    <?php get_sidebar(); ?>

</div> <!-- content -->
<?php 
get_footer();
?>