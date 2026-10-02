<?php
/*
Template Name: Политика конфиденциальности
*/
?>

<?php $page_id = get_the_ID(); ?>
<?php get_header() ?>

<div class="breadcrumbs">
    <ul class="breadcrumbs__list wrapper">
        <li class="breadcrumbs__item"><a href="<?php echo get_home_url(); ?>">RoadAR</a></li>
        <li class="breadcrumbs__item"><a><?php the_title(); ?></a></li>
    </ul>
</div>

<main class="page-main">
    <section class="policy">
        <div class="policy__wrapper wrapper">
            <?php the_content(); ?>
        </div>
    </section>
</main>

<?php get_footer() ?>
