<?php 
/** 
 * Template Name: Categories
 * 
 * This categories page displays the post categories and their 
 * sub categories and their descriptions. 
 *
 * @package WP manual theme
 */
get_header(); ?>

<div id="content">
    <main>
        <div id="categories-container">
            <?php
            $categories = get_categories(array(
                'hide_empty' => true,
            ));

            $categories_with_subcats = [];
            $categories_without_subcats = [];

            foreach ($categories as $category) :
                $subcategories = get_categories(array(
                    'child_of' => $category->term_id,
                    'hide_empty' => true,
                ));

                if (!empty($subcategories)) {
                    $categories_with_subcats[] = [
                        'category' => $category,
                        'subcategories' => $subcategories
                    ];
                } else {
                    $categories_without_subcats[] = $category;
                }
            endforeach;
            ?>

            <!-- Kategoriat ilman alakategorioita - kolme rinnakkain tai koko leveys -->
            <div class="no-subcategories-container">
                <?php foreach ($categories_without_subcats as $category) : ?>
                    <div class="desc-box">
                        <h2><?php echo esc_html($category->name); ?></h2>
                        <p><?php echo esc_html($category->description); ?></p>
                        <a href="<?php echo get_category_link($category_id); ?>">View Category</a>

                    </div>
                <?php endforeach; ?>
            </div>


            <!-- Kategoriat, joilla on alakategorioita -->
            <?php foreach ($categories_with_subcats as $cat_data) : ?>
                <div class="full-width-category-box">
                    <h2><?php echo esc_html($cat_data['category']->name); ?></h2>
                    <p><?php echo esc_html($cat_data['category']->description); ?></p>

                    <div class="subcat-container">
                        <?php foreach ($cat_data['subcategories'] as $subcategory) : ?>
                            <div class="subcat-box">
                                <h3><?php echo esc_html($subcategory->name); ?></h3>
                                <p><?php echo esc_html($subcategory->description); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?php get_sidebar(); ?>
</div> <!-- content -->

<?php get_footer(); ?>
