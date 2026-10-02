<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', 'Настройки сайта')
    ->add_tab('Общие настройки', [
        Field::make('image', 'site_logo', 'Логотип'),
        Field::make('text', 'site_copyright', 'Копирайт'),
        Field::make('text', 'site_header_btn_text'.carbon_lang_prefix(), 'Текст кнопки в шапке')->set_width(50),
        Field::make('text', 'site_footer_btn_text'.carbon_lang_prefix(), 'Текст кнопки в подвале')->set_width(50),
    ])

    ->add_tab('Контакты', [
        Field::make('text', 'site_phone', 'Телефон'),
        Field::make('text', 'site_email', 'Email'),
        Field::make('text', 'site_email_support', 'Email поддержки'),
        Field::make('text', 'site_address'.carbon_lang_prefix(), 'Адрес'),
        Field::make('text', 'site_map_coordinates', 'Координаты карты'),
        Field::make('text', 'site_youtube_url', 'Youtube'),
        Field::make('text', 'site_linkedin_url', 'LinkedIn'),
    ])

    ->add_tab('Архив решений', [
        Field::make('text', 'product_name'.carbon_lang_prefix(), 'Название'),
        Field::make('text', 'product_title'.carbon_lang_prefix(), 'Заголовок'),
        Field::make('rich_text', 'product_about'.carbon_lang_prefix(), 'Описание'),
        Field::make('text', 'product_button'.carbon_lang_prefix(), 'Текст кнопки'),
        Field::make('text', 'product_link'.carbon_lang_prefix(), 'Текст ссылки'),
    ])

    ->add_tab('Страница решения', [
        Field::make('text', 'product_title_indicators'.carbon_lang_prefix(), 'Заголовок показателей'),
        Field::make('text', 'product_title_screenshots'.carbon_lang_prefix(), 'Заголовок скриншотов'),
        Field::make('text', 'product_title_videos'.carbon_lang_prefix(), 'Заголовок видео'),
        Field::make('text', 'product_title_features'.carbon_lang_prefix(), 'Заголовок особенностей'),
        Field::make('text', 'product_button_demo'.carbon_lang_prefix(), 'Текст кнопки "Запросить демо"')->set_width(50),
        Field::make('text', 'product_button_more'.carbon_lang_prefix(), 'Текст кнопки "Показать ещё"')->set_width(50),
    ])

    ->add_tab('Формы', [
        Field::make('text', 'form_title'.carbon_lang_prefix(), 'Заголовок основной формы')->set_width(50),
        Field::make('text', 'form_title_modal'.carbon_lang_prefix(), 'Заголовок формы в модальном окне')->set_width(50),
        Field::make('text', 'form_placeholder_name'.carbon_lang_prefix(), 'Текст в поле "Имя"')->set_width(33.333),
        Field::make('text', 'form_placeholder_tel'.carbon_lang_prefix(), 'Текст в поле "Телефон"')->set_width(33.333),
        Field::make('text', 'form_placeholder_message'.carbon_lang_prefix(), 'Текст в поле "Соообщение"')->set_width(33.333),
        Field::make('text', 'form_message'.carbon_lang_prefix(), 'Сообщение об успехе'),
        Field::make('text', 'form_button'.carbon_lang_prefix(), 'Текст кнопки'),
        Field::make('rich_text', 'form_note'.carbon_lang_prefix(), 'Предупреждение'),
        Field::make('rich_text', 'form_about'.carbon_lang_prefix(), 'Информация'),
    ]) ;