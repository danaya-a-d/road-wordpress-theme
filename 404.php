<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>


<main class="page-main page-main--not-found">
    <section class="not-found">
        <div class="not-found__wrapper wrapper">
            <h1 class="not-found__title">404!</h1>
            <p class="not-found__subtitle">Извините! Страница, которую Вы ищете, не может быть найдена</p>
            <a href="<?php echo get_home_url(); ?>" class="not-found__button button button--blue"><span>На главную</span></a>
        </div>
    </section>
</main>

<?php get_footer()?>
