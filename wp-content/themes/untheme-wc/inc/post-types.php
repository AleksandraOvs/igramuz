<?php

add_action( 'init', 'register_post_types' );

	function register_post_types(){
	
		register_post_type( 'event', [
			'label'  => null,
			'labels' => [
				'name'               => 'Мероприятия', // основное название для типа записи
				'singular_name'      => 'Мероприятие', // название для одной записи этого типа
				'add_new'            => 'Добавить Мероприятие', // для добавления новой записи
				'add_new_item'       => 'Добавление Мероприятия', // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование Мероприятия', // для редактирования типа записи
				'new_item'           => 'Новое Мероприятие', // текст новой записи
				'view_item'          => 'Смотреть Мероприятия', // для просмотра записи этого типа.
				'search_items'       => 'Искать Мероприятия', // для поиска по этим типам записи
				'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => 'Мероприятие', // название меню
			],
			'description'            => '',
			'public'                 => true,
			// 'publicly_queryable'  => null, // зависит от public
			// 'exclude_from_search' => null, // зависит от public
			// 'show_ui'             => null, // зависит от public
			// 'show_in_nav_menus'   => null, // зависит от public
			'show_in_menu'           => true, // показывать ли в меню админки
			// 'show_in_admin_bar'   => null, // зависит от show_in_menu
			'show_in_rest'        => true, // добавить в REST API. C WP 4.7
			'rest_base'           => false, // $post_type. C WP 4.7
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-buddicons-groups',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => true,
			'supports'            => [ 'title','thumbnail', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => ['types'],
			'has_archive'         => true,
			'rewrite'             => true,
			'query_var'           => 'event',
		] );

		//register_taxonomy( 'decor-type', [

		//]);

		// register_post_type( 'portfolio', [
		// 	'label'  => null,
		// 	'labels' => [
		// 		'name'               => 'Проект', // основное название для типа записи
		// 		'singular_name'      => 'Проект', // название для одной записи этого типа
		// 		'add_new'            => 'Добавить Проект', // для добавления новой записи
		// 		'add_new_item'       => 'Добавление Проекта', // заголовка у вновь создаваемой записи в админ-панели.
		// 		'edit_item'          => 'Редактирование Проекта', // для редактирования типа записи
		// 		'new_item'           => 'Новый Проект', // текст новой записи
		// 		'view_item'          => 'Смотреть Проект', // для просмотра записи этого типа.
		// 		'search_items'       => 'Искать Проект', // для поиска по этим типам записи
		// 		'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
		// 		'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
		// 		'parent_item_colon'  => '', // для родителей (у древовидных типов)
		// 		'menu_name'          => 'Портфолио', // название меню
		// 	],
		// 	'description'            => '',
		// 	'public'                 => true,
		// 	// 'publicly_queryable'  => null, // зависит от public
		// 	// 'exclude_from_search' => null, // зависит от public
		// 	// 'show_ui'             => null, // зависит от public
		// 	// 'show_in_nav_menus'   => null, // зависит от public
		// 	'show_in_menu'           => true, // показывать ли в меню админки
		// 	// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		// 	'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		// 	'rest_base'           => null, // $post_type. C WP 4.7
		// 	'menu_position'       => 5,
		// 	'menu_icon'           => 'dashicons-format-gallery',
		// 	//'capability_type'   => 'post',
		// 	//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		// 	//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		// 	'hierarchical'        => true,
		// 	'supports'            => [ 'title','thumbnail', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		// 	//'taxonomies'          => ['category'],
		// 	'has_archive'         => true,
		// 	'rewrite'             => true,
		// 	'query_var'           => 'portfolio',
		// ] );
    }

	/* Регистрируем иерархическую таксономию по жанрам
 */
// add_action('init', function () {
//     $labels = array(
//         'name'          => 'Вид декора',
//         'singular_name' => 'Вид декора',
//         'menu_name'     => 'Виды декора' ,
//         'all_items'     => 'Все виды декора',
//         'edit_item'     => 'Редактировать вид декора',
//         'view_item'     => 'Посмотреть вид декора',
//         'update_item'   => 'Сохранить вид декора',
//         'add_new_item'  => 'Добавить новый вид декора',
//         'parent_item'   => 'Родительский вид декора',
//         'search_items'  => 'Поиск по видам декора',
//         'back_to_items' => 'Назад на страницу вида декоров',
//         'most_used'     => 'Популярные виды декоров',
//     );
//     $args = array(
//         'labels'            => $labels,
//         'show_admin_column' => true,
//         'hierarchical'      => true,
//     );
//     register_taxonomy('types', ['decor'], $args);
// });