<?php 
/* 
Template Name: Archives
*/
get_header(); ?>

<div id="content">
    <main>
    <h2><a><?php the_title(); ?></a></h2>
        <div id="category-box">
            <?php 
            // Haetaan kaikki kategoriat aakkosjärjestyksessä
            $categories = get_categories(array(
                'orderby' => 'name',
                'order' => 'ASC'
            ));

            // Käydään läpi kaikki kategoriat
            foreach ( $categories as $category ) {

                echo '<section id="category-section">';

                // Tulostetaan kategorian nimi
                echo '<h2>' . $category->name . '</h2>';

                // Haetaan kategorian postaukset aakkosjärjestyksessä
                $args = array(
                    'post_type' => 'post',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'category_name' => $category->slug,
                    'posts_per_page' => -1
                );

                $category_posts = new WP_Query($args);

                // Jos kategorialla on postauksia, näytetään ne
                if ($category_posts->have_posts()) : 

                    while($category_posts->have_posts()) : $category_posts->the_post(); ?>   
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else: ?>
                    <p>Ei kirjoituksia tässä kategoriassa.</p>
                <?php
                endif;
                  // Suljetaan div kategorian sisällä
                  echo '</section>';
            }
            ?>
        </div>
    </main>
    <?php get_sidebar(); ?>
</div> <!-- #content -->

<?php get_footer(); ?>
