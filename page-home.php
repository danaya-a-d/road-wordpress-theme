<?php
/*
Template Name: Главная
*/
?>

<?php $page_id = get_the_ID() ?>

<?php
$about_advantages = carbon_get_post_meta($page_id, 'about_advantages' . carbon_lang_prefix());
$opportunities_advantages = carbon_get_post_meta($page_id, 'opportunities_advantages' . carbon_lang_prefix());
$features_advantages = carbon_get_post_meta($page_id, 'features_advantages'. carbon_lang_prefix());
$features_scheme = carbon_get_post_meta($page_id, 'features_scheme'. carbon_lang_prefix());
?>

<?php get_header() ?>

<main class="page-main">
    <section class="upper-block">
        <div class="upper-block__wrapper wrapper">
            <img class="upper-block__image"
                 src="<?php echo wp_get_attachment_image_url(carbon_get_post_meta($page_id, 'top_photo'), 'full') ?>"
                 alt="">
            <div class="upper-block__text">
                <h1><?php echo carbon_get_post_meta($page_id, 'top_title' . carbon_lang_prefix()); ?></h1>
                <p><?php echo carbon_get_post_meta($page_id, 'top_info' . carbon_lang_prefix()); ?></p>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="about__wrapper wrapper">
            <div class="about__text-block">
                <h2><?php echo carbon_get_post_meta($page_id, 'about_title'. carbon_lang_prefix()); ?></h2>
                <p><?php echo carbon_get_post_meta($page_id, 'about_text'. carbon_lang_prefix()); ?></p>

                <button class="about__button button button--orange deck button-modal">
                    <span><?php echo carbon_get_post_meta($page_id, 'about_button'. carbon_lang_prefix()); ?></span></button>
            </div>

            <ul class="about__advantages advantages advantages--slider">
                <?php foreach ($about_advantages as $advantage) : ?>
                    <li class="advantages__item">
                        <img class="advantages__icon"
                             src="<?php echo wp_get_attachment_image_url($advantage['icon']) ?>" alt="">
                        <p class="advantages__text"><?php echo $advantage['title'] ?></p>
                    </li>
                <?php endforeach ?>
            </ul>

            <button class="about__button button button--orange mob button-modal">
                <span><?php echo carbon_get_post_meta($page_id, 'about_button'. carbon_lang_prefix()); ?></span></button>
        </div>
    </section>

    <section class="solutions">
        <div class="solutions__wrapper wrapper">
            <h2 class="solutions__title title title--line"><?php echo carbon_get_post_meta($page_id, 'catalog_title'. carbon_lang_prefix()); ?></h2>

            <?php
            $catalog_products = carbon_get_post_meta($page_id, 'catalog_products');
            $catalog_products_ids = wp_list_pluck($catalog_products, 'id');
            $product_count = 0;

            $catalog_products_query_args = [
                'posts_per_page' => 3,
                'post_type' => 'product',
                'post_in' => $catalog_products_ids,
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

                <ul class="solutions__list">
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

                <a href="<?php echo get_post_type_archive_link('product'); ?>" class="solutions__button button button--blue">
                    <span><?php echo carbon_get_post_meta($page_id, 'catalog_button'. carbon_lang_prefix()); ?> (<?php echo $product_count; ?>)</span></a>

            <?php endif ?>
        </div>
    </section>

    <section class="features">
        <div class="features__wrapper wrapper">
            <h2 class="features__title title"><?php echo carbon_get_post_meta($page_id, 'features_title'. carbon_lang_prefix()); ?></h2>

            <ul class="features__list">

                <?php foreach ($features_advantages as $advantage) : ?>
                    <li class="features__item">
                        <div class="features__container">
                            <img class="features__icon"
                                 src="<?php echo wp_get_attachment_image_url($advantage['icon']) ?>" alt="">
                            <p class="features__name"><?php echo $advantage['title'] ?></p>
                            <p class="features__text"><?php echo $advantage['text'] ?></p>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>

            <div class="scheme">
                <h2 class="scheme__title"><?php echo carbon_get_post_meta($page_id, 'features_subtitle'. carbon_lang_prefix()); ?></h2>

                <ul class="scheme__list">

                    <?php foreach ($features_scheme as $scheme) : ?>
                        <li class="scheme__item">
                            <img class="scheme__icon" src="<?php echo wp_get_attachment_image_url($scheme['icon']) ?>"
                                 alt="">
                            <p class="scheme__name"><?php echo $scheme['title'] ?></p>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="tasks">
        <div class="tasks__wrapper wrapper">
            <div class="tasks__container">
                <div class="tasks__text-block">
                    <?php echo wpautop(carbon_get_post_meta($page_id, 'tasks_text'. carbon_lang_prefix())); ?>
                </div>
                <?php echo carbon_get_post_meta($page_id, 'tasks_list'. carbon_lang_prefix()); ?>
            </div>
        </div>
    </section>

    <section class="opportunities">
        <div class="opportunities__wrapper wrapper">
            <h2 class="opportunities__title title title--line"><?php echo carbon_get_post_meta($page_id, 'opportunities_title' . carbon_lang_prefix()); ?></h2>
            <p class="opportunities__about"><?php echo carbon_get_post_meta($page_id, 'opportunities_text' . carbon_lang_prefix()); ?></p>

            <ul class="opportunities__advantages advantages advantages--slider">
                <?php foreach ($opportunities_advantages as $advantage) : ?>
                    <li class="advantages__item">
                        <img class="advantages__icon"
                             src="<?php echo wp_get_attachment_image_url($advantage['icon']) ?>" alt="">
                        <p class="advantages__text"><?php echo $advantage['title'] ?></p>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </section>

    <?php include 'contact-form.php' ?>

</main>

<?php get_footer() ?>
