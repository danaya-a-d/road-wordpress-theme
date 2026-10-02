<?php $page_id = get_the_ID(); ?>
<?php get_header() ?>

<div class="breadcrumbs">
    <ul class="breadcrumbs__list wrapper">
        <li class="breadcrumbs__item"><a href="<?php echo get_home_url(); ?>">RoadAR</a></li>
        <li class="breadcrumbs__item"><a><?php echo $GLOBALS['prod']['name']; ?></a></li>
    </ul>
</div>

<main class="page-main">
    <section class="solutions main-solutions">
        <div class="solutions__wrapper wrapper">
            <div class="solutions__text-block">
                <h1 class="solutions__main-title title"><?php echo $GLOBALS['prod']['title']; ?></h1>
                <p><?php echo $GLOBALS['prod']['about']; ?></p>
            </div>

            <?php
            $catalog_products = carbon_get_post_meta($page_id, 'catalog_products');
            $catalog_products_ids = wp_list_pluck($catalog_products, 'id');
            $posts_per_page = 20;
            $product_count = 0;

            $catalog_products_query_args = [
                'posts_per_page' => $posts_per_page,
                'post_type' => 'product',
                'post_status' => 'publish',
                'post_in' => $catalog_products_ids,
                'paged' => 1
            ];

            $catalog_products_query_args_count = [
                'posts_per_page' => -1,
                'post_type' => 'product',
                'post_in' => $catalog_products_ids,
            ];

            $catalog_products_query = new WP_Query($catalog_products_query_args);
            $catalog_products_query_count = new WP_Query($catalog_products_query_args_count);
            ?>

            <?php if ($catalog_products_query->have_posts()) : ?>

                <ul class="solutions__list" id="row_append">
                    <?php while ($catalog_products_query->have_posts()) : $catalog_products_query->the_post(); ?>
                        <?php echo get_template_part('product-content') ?>
                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                </ul>

            <?php endif ?>

            <?php if ($catalog_products_query_count->have_posts()) : ?>
                <?php while ($catalog_products_query_count->have_posts()) : $catalog_products_query_count->the_post(); ?>
                    <?php $product_count += 1; ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

                <?php if ($product_count > $posts_per_page): ?>
                    <button class="solutions__button button button--blue-down" id="more_posts"
                            data-template="product-content"
                            data-posts-per-page="<?php echo $posts_per_page ?>"
                            data-page-id="<?php echo $page_id ?>"
                            data-post-count="<?php echo $product_count ?>">
                        <span><?php echo $GLOBALS['prod']['button']; ?> (<i><?php echo $product_count - $posts_per_page; ?></i>)</span>
                    </button>
                <?php endif ?>

            <?php endif ?>

        </div>
    </section>

    <?php include 'contact-form.php' ?>
</main>

<?php get_footer() ?>
