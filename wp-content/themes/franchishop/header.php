<?php
session_start();
$seoData = get_field('seo-group');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $seoData['description'] ?>">
    <meta name="keywords" content="<?= $seoData['keywords'] ?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <title><?= $seoData['title'] ?></title>
    <?php wp_head(); ?> 
    <style>
        .local {
            position: fixed;
            top: 0;
            background-color: red;
            font-size: 1.4em;
            padding: 1em;
            color: white;
            text-align: center;
            opacity: 0.6;
        }
    </style>
</head>

<body <?php body_class('home') ?>>
    <div class="local">This is local version</div>
    <header class="header">
        <div class="container">
            <a class="logo" href="/">
                <img class="logo-img" src="<?= THEME_DIR . '/img/logo.svg'?>">
            </a>
            <nav class="navigation">
                <?php
                    wp_nav_menu([
                        'theme_location' => '',
                        'menu' => MAIN_MENU_SLUG,
                        'container' => '<div>',
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => '',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul>%3$s</ul>',
                        'depth' => 0,
                        'walker' => '',
                    ]);
                ?>
            </nav>
            <div class="personal"> 
                <div class="icon icon-favourites"></div>
                <div class="icon icon-search"> </div>
            </div>
            <a class="auth" href="/lk/">
                <span class="auth-caption">Войти</span>
            </a>
        </div>
    </header>