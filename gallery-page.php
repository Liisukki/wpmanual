<?php
/**
 * Template Name: Gallery Page
 */

get_header(); ?>


<div id="content">
    <main>

    <?php
    global $post;
    if ( strpos( $post->post_content, '[gallery' ) !== false ) {

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
                $img_full_url = wp_get_attachment_image_src( get_the_ID(), 'full' )[0];
                echo '<div class="gallery-item">';
                echo '<a href="' . esc_url( $img_full_url ) . '" data-lightbox="gallery">';
                echo '<img src="' . esc_url( $img_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                echo '</a>';
                echo '</div>';
            }
            echo '</div>';
        }

        wp_reset_postdata();
    } else {
        echo '<p>No gallery shortcode found on this page.</p>';
    }
    ?>

</main>
    <?php get_sidebar(); ?>
</div> <!-- #content -->

<?php get_footer(); ?>
