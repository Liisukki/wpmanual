<?php
/**
 * Template Name: Gallery Page
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php
    if ( has_shortcode( $post->post_content, 'gallery' ) ) {

        // Hae kaikki mediakirjaston kuvat
        $args = array(
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'post_status'    => 'inherit',
            'posts_per_page' => -1,
        );

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) {
            echo '<div class="custom-gallery">';
            while ( $query->have_posts() ) {
                $query->the_post();
                $img_url = wp_get_attachment_url( get_the_ID() );
                echo '<div class="gallery-item">';
                echo '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                echo '</div>';
            }
            echo '</div>';
        }

        wp_reset_postdata();
    } else {
        echo '<p>No gallery shortcode found on this page.</p>';
    }
    ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
