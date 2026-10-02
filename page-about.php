<?php
/*
Template Name: О нас
*/
?>

<?php $page_id = get_the_ID() ?>

<?php
$specialization_advantages = carbon_get_post_meta($page_id, 'specialization_advantages');
$history_advantages = carbon_get_post_meta($page_id, 'history_advantages');
?>

<?php get_header() ?>

<div class="breadcrumbs">
    <ul class="breadcrumbs__list wrapper">
        <li class="breadcrumbs__item"><a href="<?php echo get_home_url(); ?>">RoadAR</a></li>
        <li class="breadcrumbs__item"><a><?php the_title(); ?></a></li>
    </ul>
</div>

<main class="page-main">
    <section class="company">
        <div class="company__wrapper wrapper">
            <h1 class="company__title title mob"><?php the_title(); ?></h1>
            <img class="company__logo" src="<?php echo wp_get_attachment_image_url(carbon_get_post_meta($page_id, 'about_logo')) ?>" alt="RoadAR">
            <div class="company__text-block">
                <h1 class="company__title title deck"><?php the_title(); ?></h1>

                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>

                <?php endif ?>
            </div>
        </div>
    </section>

    <section class="specialization">
        <div class="specialization__wrapper wrapper">
            <h2 class="specialization__title title title--line"><?php echo carbon_get_post_meta($page_id, 'specialization_title'); ?></h2>
            <p class="specialization__about"><?php echo carbon_get_post_meta($page_id, 'specialization_text'); ?></p>

            <ul class="specialization__list">
                <?php foreach ($specialization_advantages as $advantage) : ?>
                    <li class="specialization__item">
                        <div class="specialization__container">
                            <img class="specialization__icon" src="<?php echo wp_get_attachment_image_url($advantage['icon']) ?>" alt="">
                            <p class="specialization__name"><?php echo $advantage['text'] ?></p>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>

            <a class="specialization__button button button--orange" href="<?php echo get_post_type_archive_link('product'); ?>"><span><?php echo carbon_get_post_meta($page_id, 'specialization_button'); ?></span></a>
        </div>
    </section>

    <section class="future">
        <div class="future__wrapper wrapper">
            <div class="future__container">
                <div class="future__text-block">
                    <h2 class="future__title title"><?php echo carbon_get_post_meta($page_id, 'future_title'); ?></h2>
                    <p class="future__text"><?php echo carbon_get_post_meta($page_id, 'future_text'); ?></p>
                    <button class="future__button button button--blue button-modal"><span><?php echo carbon_get_post_meta($page_id, 'future_button'); ?></span></button>
                </div>

                <img class="future__image" src="<?php echo wp_get_attachment_image_url(carbon_get_post_meta($page_id, 'future_logo'), 'full') ?>" alt="">
            </div>
        </div>
    </section>

    <section class="history">
        <div class="history__wrapper wrapper">
            <h2 class="history__title title title--line"><?php echo carbon_get_post_meta($page_id, 'history_title'); ?></h2>
            <p class="history__about"><?php echo carbon_get_post_meta($page_id, 'history_text'); ?></p>

            <ul class="history__list">

                <?php foreach ($history_advantages as $advantage) : ?>
                    <li class="specialization__item">
                        <div class="specialization__container">
                            <img class="history__icon" src="<?php echo wp_get_attachment_image_url($advantage['icon']) ?>" alt="">
                            <p class="history__name"><?php echo $advantage['name'] ?></p>
                            <p class="history__description"><?php echo $advantage['text'] ?></p>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </section>

    <?php include 'contact-form.php' ?>

</main>

<?php get_footer() ?>
