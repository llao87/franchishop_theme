<?php
// Theme
define('THEME_DIR', get_stylesheet_directory_uri());
// Menu
define('MAIN_MENU_SLUG', 'main-menu');
define('FOOTER_MENU_SLUG', 'footer-menu');
define('CATEGORY_FRANCHISES_THEMES', 'franchise-category');
define('CATEGORY_INVESTMENT', 'investment');
define('CATEGORY_REGIONS', 'regions');
define('CATEGORY_OTHER', 'franchise-other');

// Подключаем CSS и JS
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style("style", THEME_DIR . "/css/style.min.css", [], time(), 'all');
    wp_enqueue_style("custom", THEME_DIR . "/css/custom.css", [], time(), 'all');

    // обновляем версию jquery и подключаем его в libs.js
    wp_deregister_script('jquery');

    // пользовательские js
    wp_enqueue_script('libs-js', THEME_DIR . '/js/libs.min.js', [], time(), true);
    wp_enqueue_script('main-js', THEME_DIR . '/js/main.js', [], time(), true);
    wp_enqueue_script('loadmore', THEME_DIR . '/js/loadmore.js', ['libs-js'], true);
    wp_enqueue_script('loadmore-catalog', THEME_DIR . '/js/loadmore-catalog.js', ['libs-js'], true);
    wp_enqueue_script('custom', THEME_DIR . '/js/custom.js', ['libs-js'], true);
});

// Поддержка title-tag
add_theme_support('title-tag');

// включаем поддержку меню в теме
add_theme_support('menus');

// Включаем поддержку виджетов
add_theme_support('widgets');

// включаем поддержку миниатюр в теме
add_theme_support('post-thumbnails', ['post', 'news']);

// Включаем поддержку html5
add_theme_support('html5', ['search-form']);

// Создаем области меню
if (function_exists('register_nav_menus')) {
    register_nav_menus(
        array(
            'top-menu',
            'bottom-menu',
        )
    );
}

// Создаем страницы настроек в админке
if (function_exists('acf_add_options_page')) {
    // Главный пункт настроек
    $option_page = acf_add_options_page(
        [
            'page_title' => 'Настройки сайта',
            'menu_title' => 'Настройки сайта',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
        ]
    );
    // Вложенныя страницы
    $child = acf_add_options_page(
        [
            'page_title' => 'Настройка баннеров',
            'menu_title' => 'Настройка баннеров',
            'parent_slug' => $option_page['menu_slug'],
        ]
    );
    $child = acf_add_options_page(
        [
            'page_title' => 'Форма тех поддержки',
            'menu_title' => 'Форма тех поддержки',
            'parent_slug' => $option_page['menu_slug'],
        ]
    );
}

// Регистрация типа записи "Франшиза"
add_action('init', function () {
    register_taxonomy('franchise-category', array('object'), array(
        'label' => 'Категории франшиз',
        'labels' => array(
            'name' => 'Категории франшиз',
            'singular_name' => 'Категории франшиз',
            'search_items' => 'Искать категории',
            'all_items' => 'Все категории',
            'parent_item' => 'Родит. категория',
            'parent_item_colon' => 'Родит. категория:',
            'edit_item' => 'Редактировать категорию',
            'update_item' => 'Обновить категорию',
            'add_new_item' => 'Добавить категорию',
            'new_item_name' => 'Заголовок',
            'menu_name' => 'Категории франшиз',
        ),
        'description' => 'Категории для франшиз',
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,
        'rewrite' => array(
            'hierarchical' => true,
            // 'slug' => '/categories',
        ),
        'show_admin_column' => true,
    ));
    register_taxonomy('regions', array('object'), array(
        'label' => 'Регионы франшиз',
        'labels' => array(
            'name' => 'Регионы франшиз',
            'singular_name' => 'Регионы франшиз',
            'search_items' => 'Искать регионы',
            'all_items' => 'Все регионы',
            'parent_item' => 'Родит. регион',
            'parent_item_colon' => 'Родит. регион:',
            'edit_item' => 'Редактировать регион',
            'update_item' => 'Обновить регион',
            'add_new_item' => 'Добавить регион',
            'new_item_name' => 'Заголовок',
            'menu_name' => 'Регионы франшиз',
        ),
        'description' => 'Регионы франшиз',
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,
        'rewrite' => array(
            'hierarchical' => true,
            // 'slug' => '/regions',
        ),
        'show_admin_column' => true,
    ));
    register_taxonomy('investment', array('object'), array(
        'label' => 'Размер инвестиций',
        'labels' => array(
            'name' => 'Размер инвестиций',
            'singular_name' => 'Размер инвестиций',
            'search_items' => 'Искать инвестиции',
            'all_items' => 'Все инвестиции',
            'parent_item' => 'Родит. инвестиция',
            'parent_item_colon' => 'Родит. инвестиция:',
            'edit_item' => 'Редактировать инвестицию',
            'update_item' => 'Обновить инвестицию',
            'add_new_item' => 'Добавить инвестицию',
            'new_item_name' => 'Заголовок',
            'menu_name' => 'Размер инвестиций',
        ),
        'description' => 'Размер инвестиций',
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,
        'rewrite' => array(
            'hierarchical' => true,
            // 'slug' => '/investment',
        ),
        'show_admin_column' => true,
    ));
    register_taxonomy('franchise-other', array('object'), array(
        'label' => 'Прочие категории',
        'labels' => array(
            'name' => 'Прочие категории',
            'singular_name' => 'Прочие категории',
            'search_items' => 'Искать категории',
            'all_items' => 'Все категории',
            'parent_item' => 'Родит. категория',
            'parent_item_colon' => 'Родит. категория:',
            'edit_item' => 'Редактировать категорию',
            'update_item' => 'Обновить категорию',
            'add_new_item' => 'Добавить категорию',
            'new_item_name' => 'Заголовок',
            'menu_name' => 'Прочие категории',
        ),
        'description' => 'Категории для франшиз',
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,
        'rewrite' => array(
            'hierarchical' => true,
            // 'slug' => '/other',
        ),
        'show_admin_column' => true,
    ));
    register_post_type('franchise', [
        'taxonomies' => ['franchise-category', 'regions', 'investment', 'franchise-other'],
        'labels' => [
            'name' => 'Франшизы',
            'singular_name' => 'Франшиза',
            'add_new' => 'Добавить франшизу',
            'add_new_item' => 'Добавить новую франшизу',
            'edit_item' => 'Редактировать франшизу',
            'new_item' => 'Новая франшиза',
            'all_items' => 'Все франшизы',
            'view_item' => 'Просмотр франшизы на сайте',
            'search_items' => 'Искать франшизу',
            'not_found' => 'Франшиз не найдено.',
            'not_found_in_trash' => 'В корзине нет франшиз.',
            'menu_name' => 'Франшизы',
        ],
        'public' => true,
        'show_ui' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-aside',
        'rewrite' => [
            'slug' => '/catalog',
            'pages' => true,
        ],
        'supports' => ['title'],
    ]);

    // Регистрация типа записи "Новости"
    register_taxonomy('news-categories', ['object'], [
        'label' => 'Рубрики новостей',
        'labels' => array(
            'name' => 'Рубрики новостей',
            'singular_name' => 'Рубрики новостей',
            'search_items' => 'Искать рубрики',
            'all_items' => 'Все рубрики',
            'parent_item' => 'Родит. рубрика',
            'parent_item_colon' => 'Родит. рубрика:',
            'edit_item' => 'Редактировать рубрику',
            'update_item' => 'Обновить рубрику',
            'add_new_item' => 'Добавить рубрику',
            'new_item_name' => 'Заголовок',
            'menu_name' => 'Рубрики новостей',
        ),
        'description' => 'Рубрики для новостей',
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,
        'rewrite' => ['hierarchical' => true],
        'show_admin_column' => true,
    ]);
    register_post_type('news', [
        'taxonomies' => ['news-categories'],
        'labels' => [
            'name' => 'Новости',
            'singular_name' => 'Новость',
            'add_new' => 'Добавить новость',
            'add_new_item' => 'Добавить новую новость',
            'edit_item' => 'Редактировать новость',
            'new_item' => 'Новая новость',
            'all_items' => 'Все новости',
            'view_item' => 'Просмотр новости на сайте',
            'search_items' => 'Искать новость',
            'not_found' => 'Новостей не найдено.',
            'not_found_in_trash' => 'В корзине нет новостей.',
            'menu_name' => 'Новости',
        ],
        'public' => true,
        'show_ui' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-aside',
        'rewrite' => [
            'slug' => '/news',
            'pages' => true,
        ],
        'supports' => array('title'),
    ]);
});

// формируем левое навигационное меню по статье
function getArticleNav($data)
{
    $nav = [];

    foreach ($data['content'] as $block) {
        if (!in_array($block['acf_fc_layout'], ['header-h2', 'header-h3'])) {
            continue;
        }

        if ($block['anchor'] != '') {
            $nav[] = [
                'title' => $block['text'],
                'link' => '#' . cleanData($block['anchor']),
            ];
        }
    }

    return $nav;
}

// функция очистки входных данных от кода
function cleanData($data = "")
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);

    return $data;
}

// подгрузка новостей
function loadmore_get_posts()
{
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';

    query_posts($args);
    // если посты есть
    if (have_posts()) :
        while (have_posts()) : the_post();
            // the_post();
            $categories = get_the_terms($post->ID, 'news-categories');
            $postData = get_field('news_item_group', $post->ID); ?>

            <a class="news-item" href="<?= get_permalink($post); ?>">
                <div class="news-item-inner">
                    <div class="photo">
                        <img class="photo-img" src="<?= $postData['news-card']['picture'] ?>" alt="">
                        <div class="category"><?= $categories[0]->name ?></div>
                    </div>
                    <div class="news-item-name"><?= $post->post_title ?></div>
                    <div class="preview-text"><?= $postData['news-card']['short-description'] ?></div>
                </div>
                <div class="more"></div>
            </a>
        <?php endwhile;
    endif;
    die();
}

add_action('wp_ajax_loadmore', 'loadmore_get_posts');
add_action('wp_ajax_nopriv_loadmore', 'loadmore_get_posts');

// подгрузка Франшиз в каталоге
function loadmore_get_franchises()
{
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';

    query_posts($args);
    // если посты есть
    if (have_posts()) :
        while (have_posts()) : the_post();
            // the_post();
            $categories = get_the_terms($post->ID, 'franchise-category');
            $postData = get_field('group-franchise', $post->ID); ?>

            <div class="franchise">
                <div class="row-top">
                    <div class="name"><?= $post->post_title ?></div>
                    <div class="fr-logo"> <img class="fr-logo-img" src="<?= $postData['logo'] ?>" alt="<?= $post->post_title ?>"></div>
                </div>
                <div class="row-middle">
                    <div class="photo"><img class="photo-img" src="<?= $postData['cover-catalog'] ?>" alt="Фото <?= $post->post_title ?>"></div>
                </div>
                <div class="row-bottom">
                    <div class="investment"> <span class="label">Инвестиции: </span><span class="value"><?= number_format($postData['investment'], 0, '.', ' ') ?></span><span class="currency"> руб.</span></div>
                    <div class="category"><?= $categories[0]->name ?></div><a class="more" href="<?= get_permalink($post); ?>">Подробнее</a>
                </div>
            </div>
<?php endwhile;
    endif;
    die();
}

add_action('wp_ajax_loadmore_catalog', 'loadmore_get_franchises');
add_action('wp_ajax_nopriv_loadmore_catalog', 'loadmore_get_franchises');

// оставим только термины с parent=0
// $terms = wp_list_filter($terms, ['parent'=>0]);
function getTaxonomyItems($taxName, $firstElem)
{
    $franchisesCats = get_terms([
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC',
        'taxonomy' => $taxName,
    ]);

    $list = [];

    if (count($firstElem)) {
        $list[] = $firstElem;
    }

    foreach ($franchisesCats as $cat) {
        $list[] = [
            'title' => $cat->name,
            'link' => get_term_link($cat),
            'slug' => $cat->slug,
        ];
    }

    return $list;
}


// возвращает цвет категории франшизы
function getCategoryData($postId)
{
    $term = get_the_terms($postId, CATEGORY_FRANCHISES_THEMES);

    if ($term) {
        $themeColor = get_field('group-franchise-themes', $term[0]) ? get_field('group-franchise-themes', $term[0]) : '#ccc';
        $result = [
            'name' => $term[0]->name,
            'style' => 'style="background-color:' . $themeColor['color'] . '"'
        ];
    } else {
        $result = false;
    }

    return $result;
}
