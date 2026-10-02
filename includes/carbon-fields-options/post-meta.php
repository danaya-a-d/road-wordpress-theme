<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

//features

Container::make('post_meta', 'Настройки главной страницы')
    ->show_on_template('page-home.php')
    ->add_tab('Первый экран', [
        Field::make('text', 'top_title' . carbon_lang_prefix(), 'Заголовок')->set_width(50),
        Field::make('text', 'top_info' . carbon_lang_prefix(), 'Подзаголовок')->set_width(50),
        Field::make('image', 'top_photo', 'Изображение')->set_width(50),
    ])
    ->add_tab('О продукте', [
        Field::make('text', 'about_title' . carbon_lang_prefix(), 'Заголовок')->set_width(50),
        Field::make('text', 'about_button' . carbon_lang_prefix(), 'Текст кнопки')->set_width(50),
        Field::make('rich_text', 'about_text' . carbon_lang_prefix(), 'Описание')->set_width(50),
        Field::make('complex', 'about_advantages' . carbon_lang_prefix(), 'Особенности')->set_width(50)
            ->add_fields([
                Field::make('image', 'icon', 'Иконка')->set_width(50),
                Field::make('text', 'title', 'Заголовок')->set_width(50)
            ]),
    ])
    ->add_tab('Каталог', [
        Field::make('text', 'catalog_title' . carbon_lang_prefix(), 'Заголовок')->set_width(50),
        Field::make('text', 'catalog_button' . carbon_lang_prefix(), 'Текст кнопки')->set_width(50),
        Field::make('association', 'catalog_products', 'Решения')
            ->set_types([
                [
                    'type' => 'post',
                    'post_type' => 'product',
                ]
            ])
    ])
    ->add_tab('Ообенности', [
        Field::make('text', 'features_title' . carbon_lang_prefix(), 'Заголовок')->set_width(50),
        Field::make('text', 'features_subtitle' . carbon_lang_prefix(), 'Заголовок схемы')->set_width(50),
        Field::make('complex', 'features_advantages' . carbon_lang_prefix(), 'Особенности')->set_width(50)
            ->add_fields([
                Field::make('image', 'icon', 'Иконка')->set_width(50),
                Field::make('text', 'title', 'Заголовок')->set_width(50),
                Field::make('textarea', 'text', 'Описание')->set_width(50)
            ]),

        Field::make('complex', 'features_scheme' . carbon_lang_prefix(), 'Схема')->set_width(50)
            ->add_fields([
                Field::make('image', 'icon', 'Иконка')->set_width(50),
                Field::make('text', 'title', 'Заголовок')->set_width(50)
            ])
    ])
    ->add_tab('Задачи', [
        Field::make('rich_text', 'tasks_text' . carbon_lang_prefix(), 'Текст')->set_width(50),
        Field::make('rich_text', 'tasks_list' . carbon_lang_prefix(), 'Список')->set_width(50)
    ])
    ->add_tab('Возможности', [
        Field::make('text', 'opportunities_title' . carbon_lang_prefix(), 'Заголовок'),
        Field::make('textarea', 'opportunities_text' . carbon_lang_prefix(), 'Описание'),
        Field::make('complex', 'opportunities_advantages' . carbon_lang_prefix(), 'Особенности')->set_width(50)
            ->add_fields([
                Field::make('image', 'icon', 'Иконка')->set_width(50),
                Field::make('text', 'title', 'Заголовок')->set_width(50)
            ]),
    ]);

Container::make('post_meta', 'Настройки страницы о компании')
    ->show_on_template('page-about.php')
    ->add_tab('Основное', [
        Field::make('image', 'about_logo', 'Логотип')->set_width(50),
    ])
    ->add_tab('Специализация', [
        Field::make('text', 'specialization_title', 'Заголовок')->set_width(50),
        Field::make('text', 'specialization_button', 'Текст кнопки')->set_width(50),
        Field::make('textarea', 'specialization_text', 'Описание'),
        Field::make('complex', 'specialization_advantages', 'Особенности')
            ->add_fields([
                Field::make('image', 'icon', 'Иконка')->set_width(50),
                Field::make('text', 'text', 'Описание')->set_width(50)
            ]),
    ])
    ->add_tab('Связаться с нами', [
        Field::make('text', 'future_title', 'Заголовок')->set_width(50),
        Field::make('text', 'future_button', 'Текст кнопки')->set_width(50),
        Field::make('text', 'future_text', 'Описание'),
        Field::make('image', 'future_logo', 'Изображение')->set_width(50),
    ])
    ->add_tab('История', [
        Field::make('text', 'history_title', 'Заголовок'),
        Field::make('text', 'history_text', 'Описание'),
        Field::make('complex', 'history_advantages', 'Компании')->set_width(50)
            ->add_fields([
                Field::make('image', 'icon', 'Иконка')->set_width(50),
                Field::make('text', 'name', 'Название')->set_width(50),
                Field::make('text', 'text', 'Описание')->set_width(50)
            ]),
    ]);

Container::make('post_meta', 'Настройки страницы контактов')
    ->show_on_template('page-contacts.php')
    ->add_tab('Основное', [
        Field::make('text', 'contact_recall', 'Текст ссылки "перезвонить"')->set_width(50),
        Field::make('text', 'contact_texting', 'Текст ссылки "написать"')->set_width(50),
    ]);


Container::make('post_meta', 'Информация о решении')
    ->show_on_post_type('product')
    ->add_tab('Информация', [
        Field::make('rich_text', 'product_description', 'Текст полного описания'),

        Field::make('complex', 'product_advantages', 'Особенности')
            ->add_fields([
                Field::make('image', 'icon', 'Иконка')->set_width(50),
                Field::make('text', 'title', 'Заголовок')->set_width(50)
            ]),

        Field::make('complex', 'product_indications', 'Показатели')
            ->add_fields([
                Field::make('text', 'name', 'Показатель')->set_width(50),
                Field::make('text', 'title', 'Заголовок')->set_width(50),
                Field::make('text', 'description', 'Описание')->set_width(50)
            ])
    ])
    ->add_tab('Контент решения', [
        Field::make('media_gallery', 'product_gallery', 'Галерея')->set_width(50),
        Field::make('complex', 'product_videos', 'Видео')
            ->add_fields([
                Field::make('text', 'name', 'Название')->set_width(50),
                Field::make('text', 'link', 'ID YouTube видео')->set_width(50),
            ])

    ]);
