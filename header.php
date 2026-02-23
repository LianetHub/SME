<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- WordPress Title -->
    <title><?php wp_title(); ?></title>

    <!-- favicon -->
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/assets//favicon.svg" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="CME" />
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/site.webmanifest" />
    <!-- favicon -->

    <!-- Open Graph  -->
    <meta property="og:type" content="business.business">
    <meta property="og:title" content="СМЕ Центр иностранных языков">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/OG.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="627">
    <meta property="og:site_name" content="CME">
    <meta property="og:locale" content="ru_RU">
    <!-- Open Graph -->

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="СМЕ Центр иностранных языков">
    <meta property="twitter:description" content="<?php bloginfo('description'); ?>">
    <meta property="twitter:site" content="@site_handle">
    <meta property="twitter:url" content="<?php echo esc_url(get_permalink()); ?>">
    <meta property="twitter:image:src" content="<?php echo get_template_directory_uri(); ?>/OG.png">
    <!-- Twitter -->


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    $phone_number = get_field('phone_number', 'option');
    $formatted_phone_number = preg_replace('/[^0-9+]/', '', $phone_number);

    $header_type = get_query_var('header', 'default');
    $logo_type = get_query_var('logo', 'initial');

    $white_class = ($header_type === 'white') ? 'header__content_white' : '';

    ?>



    <div class="wrapper">
        <header class="header">
            <div class="header__wrapper">
                <div class="header__banner">
                    <div class="container">
                        <div class="header__banner-body">
                            <div class="header__banner-text header__banner-text--large fw-bold text-uppercase">ОТКРЫТИЕ НОВОГО ФИЛИАЛА В ЖК «ЛЮБЛИНСКИЙ ПАРК»</div>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('lyublinskiy-park'))); ?>" class="header__banner-btn btn btn-primary btn-sm">Подробнее</a>
                            <div class="header__banner-logo">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Cambridge-University-logo.svg" alt="Логотип университета">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__body">
                    <div class="container">
                        <div class="header__content <?php echo $white_class; ?>">
                            <div class="header__content-top">
                                <a href="/" class="header__logo">
                                    <?php if ($logo_type === 'pink' && $header_type === 'white') : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.svg" class="header__logo-white" alt="Логотип">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-color.svg" class="header__logo-color" alt="Логотип">
                                    <?php elseif ($logo_type === 'pink') : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-color.svg" alt="Логотип">
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" class="header__logo-white" alt="Логотип">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-color.svg" class="header__logo-color" alt="Логотип">
                                    <?php endif; ?>
                                </a>
                                <button type="button" class="header__menu-btn" aria-label="Открыть меню">
                                    <span class="header__menu-icon icon-menu">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="2" viewBox="0 0 18 2" fill="none">
                                                <path d="M0 0V2.00087H18V0H0Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="2" viewBox="0 0 18 2" fill="none">
                                                <path d="M0 0V2.00087H18V0H0Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="2" viewBox="0 0 18 2" fill="none">
                                                <path d="M0 0V2.00087H18V0H0Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="header__menu-text">меню</span>
                                </button>
                            </div>
                            <div class="header__content-bottom">
                                <div class="header__menu menu">
                                    <div class="container">
                                        <nav class="menu__body">
                                            <ul class="menu__list">
                                                <li class="menu__item has-children">
                                                    <button type="button" class="menu__link">
                                                        <span class="menu__link-icon">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/flag.svg" alt="Иконка">
                                                        </span>
                                                        <span class="menu__link-text">
                                                            <strong>Английский</strong>
                                                            <span>Все программы по английскому языку</span>
                                                        </span>
                                                    </button>
                                                    <div class="submenu">
                                                        <div class="container">
                                                            <button type="button" class="submenu__close icon-close">
                                                                <span class="submenu__close-text">Закрыть</span>
                                                            </button>
                                                            <?php
                                                            wp_nav_menu(array(
                                                                'theme_location' => 'menu_1',
                                                                'container' => false,
                                                                'menu_class' => '',
                                                            ));
                                                            ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="menu__item has-children">
                                                    <button type="button" class="menu__link">
                                                        <span class="menu__link-icon">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/preschoolers.svg" alt="Иконка">
                                                        </span>
                                                        <span class="menu__link-text">
                                                            <strong>Дошкольники</strong>
                                                            <span>Все развивающие занятия для детей 3-6 лет</span>
                                                        </span>
                                                    </button>
                                                    <div class="submenu">
                                                        <div class="container">
                                                            <button type="button" class="submenu__close icon-close">
                                                                <span class="submenu__close-text">Закрыть</span>
                                                            </button>
                                                            <?php
                                                            wp_nav_menu(array(
                                                                'theme_location' => 'menu_2',
                                                                'container' => false,
                                                                'menu_class' => '',
                                                            ));
                                                            ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="menu__item has-children">
                                                    <button type="button" class="menu__link">
                                                        <span class="menu__link-icon">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/languages.svg" alt="Иконка">
                                                        </span>
                                                        <span class="menu__link-text">
                                                            <strong>Языки</strong>
                                                            <span>Все программы по другим языкам</span>
                                                        </span>
                                                    </button>
                                                    <div class="submenu">
                                                        <div class="container">
                                                            <button type="button" class="submenu__close icon-close">
                                                                <span class="submenu__close-text">Закрыть</span>
                                                            </button>
                                                            <?php
                                                            wp_nav_menu(array(
                                                                'theme_location' => 'menu_3',
                                                                'container' => false,
                                                                'menu_class' => '',
                                                            ));
                                                            ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="menu__item has-children">
                                                    <button type="button" class="menu__link">
                                                        <span class="menu__link-icon">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/lamp.svg" alt="Иконка">
                                                        </span>
                                                        <span class="menu__link-text">
                                                            <strong>О нас</strong>
                                                            <span>Вся информация о нашей компании</span>
                                                        </span>
                                                    </button>
                                                    <div class="submenu">
                                                        <div class="container">
                                                            <button type="button" class="submenu__close icon-close">
                                                                <span class="submenu__close-text">Закрыть</span>
                                                            </button>
                                                            <?php
                                                            wp_nav_menu(array(
                                                                'theme_location' => 'menu_4',
                                                                'container' => false,
                                                                'menu_class' => '',
                                                            ));
                                                            ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="menu__item has-children">
													<button type="button" class="menu__link">
                                              
                                                        <span class="menu__link-icon">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/price.svg" alt="Иконка">
                                                        </span>
                                                        <span class="menu__link-text">
                                                            <strong>Цены</strong>
                                                            <span>Стоимость занятий и&nbsp;акции</span>
                                                        </span>
                                       
														 </button>
                                                    <div class="submenu">
                                                        <div class="container">
                                                            <button type="button" class="submenu__close icon-close">
                                                                <span class="submenu__close-text">Закрыть</span>
                                                            </button>
                                                            <ul>
                                                                <li><a href="/prices-moscow/">г.Москва</a></li>
																<li><a href="/czeny-i-akczii-g-mytishhi/">г.Мытищи</a></li>
																<li><a href="/prices/">г.Балашиха</a></li>
                                                                <li><a href="/akczii-i-czeny-online-uroki/">ONLINE уроки</a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="menu__item has-children">
                                                    <a href="/centres/" class="menu__link">
                                                        <span class="menu__link-icon">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/location-outline.svg" alt="Иконка">
                                                        </span>
                                                        <span class="menu__link-text">
                                                            <strong>Контакты</strong>
                                                            <span>Адреса и телефоны наших центров</span>
                                                        </span>
                                                    </a>
                                                    <div class="submenu">
                                                        <div class="container">
                                                            <button type="button" class="submenu__close icon-close">
                                                                <span class="submenu__close-text">Закрыть</span>
                                                            </button>
                                                            <ul>
                                                                <li><a href="/centres#moskow/">г. Москва</a></li>
                                                                <li><a href="/centres#mytishi/">г. Мытищи</a></li>
                                                                <li><a href="/centres#balashiha/">г. Балашиха</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="header__location">
                                    <button class="header__location-btn icon-chevron">ФИЛИАЛЫ</button>
                                    <ul class="header__location-list">
                                        <li class="header__location-item">
                                            <a href="/lyublinskiy-park/" class="header__location-link">г. Москва, ул. Люблинская, 72Ак2</a>
                                        </li>
                                        <li class="header__location-item">
                                            <a href="/borisovka/" class="header__location-link">г. Мытищи, ул. Борисовка, 16</a>
                                        </li>
                                        <li class="header__location-item">
                                            <a href="/kadomtseva/" class="header__location-link">г. Мытищи, ул. Кадомцева, 2</a>
                                        </li>
                                        <li class="header__location-item">
                                            <a href="/institutskaya/" class="header__location-link">г. Мытищи, ул. 2-я Институтская, 24а</a>
                                        </li>
                                        <li class="header__location-item">
                                            <a href="/reutovskaya/" class="header__location-link">г. Балашиха, ул. Реутовская, 20</a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="tel:<? echo esc_html($formatted_phone_number); ?>" class="header__phone icon-phone"><? echo esc_html($phone_number); ?></a>
                                <div class="header__whatsapp">
                                    <button type="button" class="header__whatsapp-btn">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/whatsapp.svg" alt="Иконка">
                                        whatsapp
                                    </button>
                                    <div class="header__whatsapp-items">
                                        <a href="https://wa.me/79932506658" class="header__whatsapp-item">
                                            г. Москва, ул. Люблинская, 72Ак2
                                        </a>
                                        <a href="https://wa.me/79259235142" class="header__whatsapp-item">
                                            г. Мытищи, ул. Борисовка, 16
                                        </a>
                                        <a href="https://wa.me/79067744866" class="header__whatsapp-item">
                                            г. Мытищи, ул. Кадомцева, 2
                                        </a>
                                        <a href="https://wa.me/79856303053" class="header__whatsapp-item">
                                            г. Мытищи, ул. 2-я Институтская, 24а
                                        </a>
                                        <a href="https://wa.me/79956557339" class="header__whatsapp-item">
                                            г. Балашиха, ул. Реутовская, 20
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="page">
            <?php require_once(TEMPLATE_PATH . '_promo.php'); ?>