<?php

add_filter('show_admin_bar', '__return_false');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

remove_action('wp_head', 'wp_resource_hints', 2); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); // remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head');// remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate

add_action('wp_enqueue_scripts', 'site_scripts');

function site_scripts()
{
    $version = '0.0.0.0';

    wp_dequeue_style('wp-block-library');
    wp_deregister_script('wp-embed');

    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/script/slick/slick.css', [], $version);
    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/script/slick/slick-theme.css', [], $version);
    wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/script/fancybox/jquery.fancybox.min.css', [], $version);
    wp_enqueue_style('main-style', get_stylesheet_uri(), [], $version);

    wp_enqueue_script('jq', get_template_directory_uri() . '/assets/script/jquery.min.js', [], $version, true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/script/slick/slick.min.js', [], $version, true);
    wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/script/fancybox/jquery.fancybox.min.js', [], $version, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/script/main.js', [], $version, true);
}

add_action('after_setup_theme', 'theme_support');
function theme_support()
{
    register_nav_menu('menu_main_header', 'Меню в шапке');
    register_nav_menu('menu_footer', 'Меню в подвале');
    add_theme_support('post-thumbnails');
    add_image_size('product', 342, 233, true);
}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('includes/carbon-fields/vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'register_carbon_fields');
function register_carbon_fields()
{
    require_once('includes/carbon-fields-options/theme-options.php');
    require_once('includes/carbon-fields-options/post-meta.php');
}

add_action('init', 'create_global_variable');
function create_global_variable()
{
    global $road, $prod, $prod_item, $form;

    $road = [
        'logo' => wp_get_attachment_image_url(carbon_get_theme_option('site_logo')),
        'phone' => carbon_get_theme_option('site_phone'),
        'email' => carbon_get_theme_option('site_email'),
        'email_support' => carbon_get_theme_option('site_email_support'),
        'address' => carbon_get_theme_option('site_address'.carbon_lang_prefix()),
        'map_coordinates' => carbon_get_theme_option('site_map_coordinates'),
        'youtube_url' => carbon_get_theme_option('site_youtube_url'),
        'linkedin_url' => carbon_get_theme_option('site_linkedin_url')
    ];

    $prod = [
        'name' => carbon_get_theme_option('product_name'.carbon_lang_prefix()),
        'title' => carbon_get_theme_option('product_title'.carbon_lang_prefix()),
        'about' => carbon_get_theme_option('product_about'.carbon_lang_prefix()),
        'button' => carbon_get_theme_option('product_button'.carbon_lang_prefix()),
        'link' => carbon_get_theme_option('product_link'.carbon_lang_prefix())
    ];

    $prod_item =  [
        'title_indicators' => carbon_get_theme_option('product_title_indicators'.carbon_lang_prefix()),
        'title_screenshots' => carbon_get_theme_option('product_title_screenshots'.carbon_lang_prefix()),
        'title_videos' => carbon_get_theme_option('product_title_videos'.carbon_lang_prefix()),
        'title_features' => carbon_get_theme_option('product_title_features'.carbon_lang_prefix()),
        'button_demo' => carbon_get_theme_option('product_button_demo'.carbon_lang_prefix()),
        'button_more' => carbon_get_theme_option('product_button_more'.carbon_lang_prefix()),
    ];

    $form = [
        'title' => carbon_get_theme_option('form_title'.carbon_lang_prefix()),
        'title_modal' => carbon_get_theme_option('form_title_modal'.carbon_lang_prefix()),
        'placeholder_name' => carbon_get_theme_option('form_placeholder_name'.carbon_lang_prefix()),
        'placeholder_tel' => carbon_get_theme_option('form_placeholder_tel'.carbon_lang_prefix()),
        'placeholder_message' => carbon_get_theme_option('form_placeholder_message'.carbon_lang_prefix()),
        'button' => carbon_get_theme_option('form_button'.carbon_lang_prefix()),
        'note' => carbon_get_theme_option('form_note'.carbon_lang_prefix()),
        'about' => carbon_get_theme_option('form_about'.carbon_lang_prefix()),
        'message' => carbon_get_theme_option('form_message'.carbon_lang_prefix()),
    ];
}

function copy_post_metas( $metas, $sync, $from ) {
    if($sync) return $metas;

    $cproduct_metas = array_filter(get_post_custom_keys($from), function($v) {
        return strpos($v, 'cproduct') !== false;
    });

    return array_merge( $metas, $cproduct_metas );
}
add_filter( 'pll_copy_post_metas', 'copy_post_metas', 10, 3 );



add_action('init', 'carbon_lang_prefix');
function carbon_lang_prefix() {
    $prefix = '';
    if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
        return $prefix;
    }
    $prefix = '_' . ICL_LANGUAGE_CODE;
    return $prefix;
}


add_action('init', 'register_post_types');

function register_post_types()
{
    register_post_type('product', [
        'label' => null,
        'labels' => [
            'name' => 'Решения', // основное название для типа записи
            'singular_name' => 'Решение', // название для одной записи этого типа
            'add_new' => 'Добавить решение', // для добавления новой записи
            'add_new_item' => 'Добавление решения', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование решения', // для редактирования типа записи
            'new_item' => 'Новое решение', // текст новой записи
            'view_item' => 'Смотреть решение', // для просмотра записи этого типа.
            'search_items' => 'Искать решение', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Решения', // название меню
        ],
        'description' => '',
        'public' => true,
        'show_in_rest' => null, // добавить в REST API. C WP 4.7
        'rest_base' => null, // $post_type. C WP 4.7
        'menu_position' => 5,
        'menu_icon' => null,
        'hierarchical' => false,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'], // 'title','editor','author','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => true,
        'rewrite' => ['slug' => 'solutions'],
        'query_var' => true,
    ]);
}


function blog_scripts()
{
    // Register the script
    wp_register_script('custom-script', get_template_directory_uri() . '/assets/script/custom.js', [], false, true);

    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('load_more_posts'),
    );
    wp_localize_script('custom-script', 'blog', $script_data_array);

    // Enqueued script with localized data.
    wp_enqueue_script('custom-script');
}

add_action('wp_enqueue_scripts', 'blog_scripts');

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');


add_action('wp_ajax_callback_mail', 'callback_mail');
add_action('wp_ajax_nopriv_callback_mail', 'callback_mail');

function callback_mail()
{
    $name = $_POST['name'];
    $phone = $_POST['tel'];
    $message = $_POST['message'];
    $theme = $_POST['theme'];
    $to = $GLOBALS['road']['email'];


    remove_all_filters('wp_mail_from');
    remove_all_filters('wp_mail_from_name');

    $headers = array(
        'From: RoadAR Analytics <' . $to .'>',
        'content-type: text/html',
    );

    $message_text = '<br>' . 'Имя: ' . $name . '<br>' .
        'Телефон: ' . $phone . '<br>' .
        'Сообщение: ' . $message;

    wp_mail($to, $theme, $message_text, $headers);
    wp_die();
}

function load_posts_by_ajax_callback()
{
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $template = $_POST['template'];

    if ($template == 'product-content') : ?>

        <?php
        $page_id = $_POST['page-id'];
        $catalog_products = carbon_get_post_meta($page_id, 'catalog_products');
        $catalog_products_ids = wp_list_pluck($catalog_products, 'id');

        $catalog_products_query_args = [
            'posts_per_page' => 3,
            'post_type' => 'product',
            'post_status' => 'publish',
            'post_in' => $catalog_products_ids,
            'paged' => $paged,
        ];

        $catalog_products_query = new WP_Query($catalog_products_query_args);
        ?>

        <?php if ($catalog_products_query->have_posts()) : ?>

            <?php while ($catalog_products_query->have_posts()) : $catalog_products_query->the_post(); ?>
                <?php echo get_template_part('product-content') ?>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        <?php endif ?>
    <?php endif; ?>


    <?php if ($template == 'gallery-content') : ?>

    <?php
    $product_id = $_POST['post-id'];
    $product_gallery = carbon_get_post_meta($product_id, 'product_gallery');
    $posts_per_page = 6;
    $product_count_current = 0;
    $formula = $posts_per_page * ($paged - 1);
    ?>

    <?php if ($product_gallery) : ?>

        <?php for ($i = $formula; $i < count($product_gallery); $i++) : ?>

            <?php $product_count_current++; ?>

            <?php if ($product_count_current <= $posts_per_page) : ?>

                <li class="gallery__item"><a class="gallery__link"
                                             href="<?php echo wp_get_attachment_image_url($product_gallery[$i], 'full') ?>"
                                             data-fancybox="gallery">
                        <img class="gallery__photo"
                             src="<?php echo wp_get_attachment_image_url($product_gallery[$i], 'product') ?>" alt="">
                    </a></li>
            <?php endif ?>

        <?php endfor ?>

    <?php endif ?>
<?php endif; ?>

    <?php wp_die();
}
