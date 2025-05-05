<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;



add_action('carbon_fields_register_fields', 'site_carbon');
function site_carbon()
{

    Container::make('theme_options', 'Контакты')

        ->set_page_menu_position(2)
        ->set_icon('dashicons-megaphone')
        ->add_tab(__('Контакты'), array(
            Field::make("checkbox", "crb_show_on_footer", "Показывать ссылки в подвале")
                ->set_option_value('yes'),
            Field::make('text', 'crb_header_link', 'Ссылка в шапке')
                ->set_width(50),
            Field::make('text', 'crb_header_link_text', 'Текст ссылки в шапке')
                ->set_width(50),

            Field::make('rich_text', 'crb_address', 'Адрес')
                ->set_width(100),

            Field::make('text', 'crb_phone', 'Телефон')
                ->set_width(50),
            Field::make('text', 'crb_phone_link', 'Ссылка телефона')
                ->set_width(50),

            Field::make('text', 'crb_time', 'Время работы')
                ->set_width(50),

            Field::make('complex', 'crb_messengers_contacts', 'Ссылки на мессенджеры')
                ->add_fields(array(
                    Field::make('text', 'crb_contact_name', 'Название')
                        ->set_width(25),
                    Field::make('image', 'crb_contact_image', 'Иконка мессенджера')
                        ->set_width(25),
                    Field::make('text', 'crb_contact_link', 'Ссылка мессенджера')
                        ->set_width(25),
                    Field::make('color', 'crb_contact_background', 'Цвет фона иконки')
                        ->set_width(25),
                )),

            Field::make('complex', 'crb_block_contacts_links', 'Ссылки в блоке Контакты')
                ->add_fields(array(
                    Field::make('text', 'crb_link_name', 'Название')
                        ->set_width(33),
                    Field::make('image', 'crb_block_contacts_link_img', 'Иконка ссылки')
                        ->set_width(33),
                    Field::make('text', 'crb_block_contacts_link_link', 'Ссылка')
                        ->set_width(33),
                    Field::make('color', 'crb_block_contact_background', 'Цвет фона иконки')
                        ->set_width(25),
                )),

            Field::make('text', 'crb_map_code', 'Вставить яндекс карту')
                ->set_width(100),
        ))

        ->add_tab(__('Форма заказа'), array(
            Field::make('text', 'crb_order_button_text', 'Текст кнопки заказа')
                ->set_width(50),
            Field::make('text', 'crb_order_shortcode', 'Шорткод для формы заказа')
                ->set_width(50),
        ));



    /*POST META*/

    Container::make('post_meta', 'Первый экран')
        ->show_on_page('main')

        ->add_tab(__('Слайдер первого экрана'), array(
            Field::make('complex', 'crb_hero_slides', 'Слайды первого экрана')
                ->add_fields(array(
                    Field::make("checkbox", "crb_darker_pic", "Включить затемнение слайда")
                        ->set_option_value('yes'),
                    Field::make('image', 'crb_hero_img', 'Изображение для слайда')
                        ->set_width(50),
                    Field::make('image', 'crb_hero_img_mob', 'Изображение для слайда(мобильная версия)')
                        ->set_width(50),
                    Field::make('text', 'crb_hero_heading', 'Заголовок слайда')
                        ->set_width(33),
                    Field::make('rich_text', 'crb_hero_desc', 'Описание слайда')
                        ->set_width(33),
                    Field::make('text', 'crb_hero_link', 'Ссылка слайда')
                        ->set_width(50),
                    Field::make('text', 'crb_hero_link_text', 'Текст ссылки слайда')
                        ->set_width(50),
                )),
        ))

        ->add_tab(__('Контент второго блока'), array(
            Field::make('text', 'crb_second_block_head', 'Заголовок блока')
                ->set_width(33),
            Field::make('rich_text', 'crb_second_block_text1', 'Абзац1')
                ->set_width(33),
            Field::make('rich_text', 'crb_second_block_text2', 'Абзац2')
                ->set_width(33),
        ))

        ->add_tab(__('Блок Партнеры'), array(
            Field::make('image', 'crb_partners_background', 'Фон секции'),
            Field::make('complex', 'crb_partners', 'Блок Парнеры')
                ->add_fields(array(
                    Field::make('image', 'crb_partner_logo', 'Логотип'),
                    Field::make('text', 'crb_partner_name', 'Название'),
                ))
        ));

    //Container::make('post_meta', 'Добавить контент на эту страницу')
    //->show_on_post_type('decor')
    // ->add_tab(__('Контент страницы декора'), array(
    //     Field::make('rich_text', 'crb_decor_desc', 'Краткое описание страницы')
    //         ->help_text('Фрагмент общего описания, выводится под заголовком страницы')
    //         ->set_width(100),

    //     Field::make('complex', 'crb_decor_items', 'Продукция в этой категории')
    //         ->add_fields(array(
    //             Field::make('image', 'crb_decor_item_img', 'Изображение декора'),
    //             Field::make('text', 'crb_decor_item_head', 'Название декора'),
    //             Field::make('rich_text', 'crb_decor_item_desc', 'Описание декора'),
    //         ))

    //));

    Container::make('post_meta', 'Краткое описание проекта')
        ->show_on_post_type('portfolio')
        ->add_fields(array(
            Field::make('rich_text', 'crb_portfolio_desc', 'Текст описания')
        ));

    Container::make('post_meta', 'Фотографии проекта')
        ->show_on_post_type('portfolio')
        ->add_fields(array(
            Field::make('complex', 'crb_portfolio_pics', 'Изображения для слайдера')
                ->add_fields(array(
                    Field::make('image', 'crb_portfolio_image', 'Изображение проекта')
                        ->set_width(33),
                    Field::make('rich_text', 'crb_portfolio_image_desc', 'Описание к фото')
                        ->set_width(33),
                    Field::make('text', 'crb_portfolio_image_alt', 'Alt для изображения')
                        ->set_width(33),
                ))
        ));

    Container::make('post_meta', 'Информация о мероприятии')
       // ->show_on_post_type('event', 'post')
        ->add_fields(array(
            Field::make('rich_text', 'crb_event_desc', 'Текст описания')
        ))
        ->add_fields(array(
            Field::make('complex', 'crb_event_pics', 'Изображения для слайдера')
                ->add_fields(array(
                    Field::make('image', 'crb_event_image', 'Изображение проекта')
                        ->set_width(33),
                    Field::make('rich_text', 'crb_event_image_desc', 'Описание к фото')
                        ->set_width(33),
                    Field::make('text', 'crb_event_image_alt', 'Alt для изображения')
                        ->set_width(33),
                )),
            Field::make('complex', 'crb_events_links', 'Ссылки')
                ->add_fields(array(
                    Field::make('text', 'crb_event_link', 'Ссылка')
                        ->set_width(50),
                    Field::make('text', 'crb_event_link_text', 'Текст кнопки')
                        ->set_width(50),
                ))
        ));

    /* TERM META */

    Container::make('term_meta', 'Настройки таксономии')
        ->show_on_taxonomy('types')
        ->add_fields(array(
            //Field::make('color', 'crb_title_color'),
            Field::make('image', 'crb_type_thumb', 'Изображение Вида декора'),
        ));
}
