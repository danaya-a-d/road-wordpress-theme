<?php
$product_id = get_the_ID();
$product_img_src = get_the_post_thumbnail_url($product_id, 'full');
$product_advantages = carbon_get_post_meta($product_id, 'product_advantages');
$product_indications = carbon_get_post_meta($product_id, 'product_indications');
$product_videos = carbon_get_post_meta($product_id, 'product_videos');
$product_description = wpautop(do_shortcode(carbon_get_post_meta($product_id, 'product_description')));

?>

<?php get_header() ?>

    <div class="breadcrumbs">
        <ul class="breadcrumbs__list wrapper">
            <li class="breadcrumbs__item"><a href="<?php echo get_home_url(); ?>">RoadAR</a></li>
            <li class="breadcrumbs__item"><a href="<?php echo get_post_type_archive_link('product'); ?>"><?php echo $GLOBALS['prod']['name']; ?></a></li>
            <li class="breadcrumbs__item"><a><?php the_title(); ?></a></li>
        </ul>
    </div>

    <main class="page-main">
        <?php if (have_posts()) : ?>

            <section class="solution">
                <div class="solution__wrapper wrapper">
                    <h1 class="solution__title title mob"><?php the_title(); ?></h1>

                    <div class="solution__photo-block"><img class="solution__photo" src="<?php echo $product_img_src ?>"
                                                            alt=""></div>

                    <div class="solution__text-block">
                        <h1 class="solution__title title deck"><?php the_title(); ?></h1>
                        <p><?php the_content(); ?></p>
                    </div>
                </div>
            </section>

            <?php if ($product_indications) : ?>
                <section class="indications">
                    <div class="indications__wrapper wrapper">
                        <h2 class="indications__title title title--line"><?php echo $GLOBALS['prod_item']['title_indicators']; ?></h2>
                        <ul class="indications__list">

                            <?php foreach ($product_indications as $indication) : ?>
                                <li class="indications__item">
                                    <p class="indications__count"><?php echo $indication['name'] ?></p>
                                    <p class="indications__name"><?php echo $indication['title'] ?></p>
                                    <p class="indications__about"><?php echo $indication['description'] ?></p>
                                </li>
                            <?php endforeach ?>
                        </ul>

                        <button class="indications__button button button--blue button-modal"><span><?php echo $GLOBALS['prod_item']['button_demo']; ?></span></button>
                    </div>
                </section>
            <?php endif; ?>

            <article class="article">
                <div class="article__wrapper wrapper">
                    <?php echo $product_description ?>
                </div>
            </article>

            <?php
            $product_gallery = carbon_get_post_meta($product_id, 'product_gallery');
            $posts_per_page = 6;
            $product_count = 0;

            $product_count_current = 0;
            ?>

            <section class="gallery">
                <div class="gallery__wrapper wrapper">
                    <?php if ($product_gallery) : ?>

                        <h2 class="gallery__title title title--line"><?php echo $GLOBALS['prod_item']['title_screenshots']; ?></h2>

                        <?php foreach ($product_gallery as $gallery_id) : ?>
                            <?php $product_count += 1; ?>
                        <?php endforeach ?>

                        <ul class="gallery__list" id="row_append">
                            <?php foreach ($product_gallery as $gallery_id) : ?>
                                <?php $product_count_current++; ?>

                                <?php if ($product_count_current <= $posts_per_page) : ?>
                                    <li class="gallery__item"><a class="gallery__link"
                                                                 href="<?php echo wp_get_attachment_image_url($gallery_id, 'full') ?>"
                                                                 data-fancybox="gallery">
                                            <img class="gallery__photo"
                                                 src="<?php echo wp_get_attachment_image_url($gallery_id, 'product') ?>"
                                                 alt="">
                                        </a></li>
                                <?php endif ?>

                            <?php endforeach ?>
                        </ul>

                        <?php if ($product_count > $posts_per_page): ?>
                            <button class="gallery__button button button--orange-down" id="more_photos"
                                    data-template="gallery-content"
                                    data-posts-per-page="<?php echo $posts_per_page ?>"
                                    data-post-id="<?php echo $product_id ?>"
                                    data-post-count="<?php echo $product_count ?>">
                                <span><?php echo $GLOBALS['prod_item']['button_more']; ?> (<i><?php echo $product_count - $posts_per_page ?></i>)</span>
                            </button>
                        <?php endif ?>

                    <?php endif ?>

                    <?php if ($product_videos) : ?>
                        <div class="gallery__video-block">
                            <h3 class="gallery__subtitle"><?php echo $GLOBALS['prod_item']['title_videos']; ?></h3>
                            <ul class="gallery__list">
                                <?php foreach ($product_videos as $video) : ?>
                                    <li class="gallery__item">
                                        <div class="gallery__video-link">
                                            <iframe class="gallery__video" loading="lazy"
                                                    src="https://www.youtube.com/embed/<?php echo $video['link'] ?>"
                                                    srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img{position:absolute;width:100%;height:100%;top:0;bottom:0;object-fit:cover}</style><a href=https://www.youtube.com/embed/<?php echo $video['link'] ?>?autoplay=1><img src=https://img.youtube.com/vi/<?php echo $video['link'] ?>/maxresdefault.jpg alt='<?php echo $video['name'] ?>'></a>"
                                                    title="YouTube video player"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen="" frameborder="0"></iframe>

                                            <div class="gallery__play-btn"></div>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>
                </div>
            </section>

            <?php if ($product_advantages) : ?>
                <section class="specificity">
                    <div class="specificity__wrapper wrapper">

                        <h2 class="specificity__title title"><?php echo $GLOBALS['prod_item']['title_features']; ?></h2>

                        <ul class="specificity__advantages advantages advantages--slider">

                            <?php foreach ($product_advantages as $advantage) : ?>
                                <li class="advantages__item">
                                    <img class="advantages__icon"
                                         src="<?php echo wp_get_attachment_image_url($advantage['icon']) ?>" alt="">
                                    <p class="advantages__text"><?php echo $advantage['title'] ?></p>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </section>
            <?php endif ?>

            <?php include 'contact-form.php' ?>

        <?php endif; ?>
    </main>


<?php get_footer() ?>