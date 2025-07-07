<?php
// set_query_var('header', '');
// set_query_var('logo', 'pink');
get_header();
?>

<?
$our_centres_title = get_field('our_centres_title');
$our_centres_desc = get_field('our_centres_desc');
$our_centres_has_link = get_field('our_centres_has_link');
$our_centres_youtube_link = get_field('our_centres_youtube_link');
$our_centres_video_poster = get_field('our_centres_video_poster');
?>

<?php if ($our_centres_title || $our_centres_desc || $our_centres_youtube_link): ?>
    <section class="our-centres">
        <div class="container">
            <div class="our-centres__body">
                <div class="row">
                    <div class="col-xl-6">
                        <?php if ($our_centres_title): ?>
                            <div class="our-centres__header">
                                <div class="our-centres__header-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/CME-language-centres.svg" alt="Логотип">
                                </div>
                                <h2 class="our-centres__title h4"><?= $our_centres_title ?></h2>
                            </div>
                        <?php endif ?>
                        <?php if ($our_centres_desc): ?>
                            <div class="our-centres__text text-block-md">
                                <?= $our_centres_desc ?>
                            </div>
                        <?php endif ?>
                        <?php if ($our_centres_has_link): ?>
                            <a href="/about" class="our-centres__btn btn btn-secondary btn-md">подробнее о нас</a>
                        <?php endif ?>
                    </div>
                    <div class="col-xl-6">
                        <div class="our-centres__video icon-camera">
                            <video width="430" height="235" controls preload="metadata" <?php if ($our_centres_video_poster): ?>poster="<?= esc_url($our_centres_video_poster) ?>" <?php endif; ?>>
                                <source src="<?= esc_url($our_centres_youtube_link) ?>" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>
<?php require_once(TEMPLATE_PATH . '_nums.php'); ?>
<section class="groups">
    <div class="container">
        <h2 class="groups__title text-center h3">Групповое Обучение английскому языку</h2>
        <ul class="groups__list">
            <li class="groups__item">
                <div class="groups__item-age">3-6</div>
                <div class="groups__item-caption h5">ДОШКОЛЬНИКИ</div>
                <p class="groups__item-desc text-block-md">
                    Занятия по 45 мин 2&nbsp;раза в неделю
                </p>
                <div class="groups__item-price h5">
                    4 480 Р./МЕС
                </div>
                <a href="/preschoolers-age/" class="groups__item-btn btn btn-secondary btn-md">ПОДРОБНЕЕ</a>
            </li>
            <li class="groups__item">
                <div class="groups__item-age">7-9</div>
                <div class="groups__item-caption h5">младшая <br> школа</div>
                <p class="groups__item-desc text-block-md">
                    Занятия по 60 мин 2&nbsp;раза в неделю
                </p>
                <div class="groups__item-price h5">
                    5 580 Р./МЕС
                </div>
                <a href="/7-9/" class="groups__item-btn btn btn-secondary btn-md">ПОДРОБНЕЕ</a>
            </li>
            <li class="groups__item">
                <div class="groups__item-age">10-13</div>
                <div class="groups__item-caption h5">СРЕДНЯЯ школа</div>
                <p class="groups__item-desc text-block-md">
                    Занятия по 45 мин 2&nbsp;раза в неделю
                </p>
                <div class="groups__item-price h5">
                    5 580 Р./МЕС
                </div>
                <a href="/10-13/" class="groups__item-btn btn btn-secondary btn-md">ПОДРОБНЕЕ</a>
            </li>
            <li class="groups__item">
                <div class="groups__item-age">14-17</div>
                <div class="groups__item-caption h5">ТИНЕЙДЖЕРЫ</div>
                <p class="groups__item-desc text-block-md">
                    Занятия по 90 мин 2&nbsp;раза в неделю
                </p>
                <div class="groups__item-price h5">
                    6 880 Р./МЕС
                </div>
                <a href="/14-17/" class="groups__item-btn btn btn-secondary btn-md">ПОДРОБНЕЕ</a>
            </li>
            <li class="groups__item">
                <div class="groups__item-age">18<span>+</span></div>
                <div class="groups__item-caption h5">ВЗРОСЛЫЕ</div>
                <p class="groups__item-desc text-block-md">
                    Занятия по 90 мин 2&nbsp;раза в неделю
                </p>
                <div class="groups__item-price h5">
                    6 880 Р./МЕС
                </div>
                <a href="/adults/" class="groups__item-btn btn btn-secondary btn-md">ПОДРОБНЕЕ</a>
            </li>
        </ul>
    </div>
</section>
<div class="types-learning">
    <div class="container container-sm">
        <div class="types-learning__body">
            <div class="row">
                <div class="col-md-6">
                    <div class="types-learning__card">
                        <div class="types-learning__card-header">
                            <div class="types-learning__card-icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/online-learning.svg" alt="Иконка">
                            </div>
                            <h3 class="types-learning__card-title">
                                <span>online</span>
                                обучение
                            </h3>
                        </div>
                        <p class="types-learning__card-desc text-block-lg">Удобный формат занятий для любого возраста.</p>
                        <a href="/online/" class="types-learning__card-btn btn btn-secondary btn-md">ПОДРОБНЕЕ</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="types-learning__card">
                        <div class="types-learning__card-header">
                            <div class="types-learning__card-icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/individual-learning.svg" alt="Иконка">
                            </div>
                            <h3 class="types-learning__card-title h4">
                                индивидуальное
                                <span>обучение</span>
                            </h3>
                        </div>
                        <p class="types-learning__card-desc text-block-lg">Свободный график и индивидуально подобранная программа обучения.</p>
                        <a href="/individual/" class="types-learning__card-btn btn btn-secondary btn-md">ПОДРОБНЕЕ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="languages">
    <div class="container">
        <h2 class="languages__title text-center h3">другие языки</h2>
        <div class="languages__slider swiper">
            <ul class="swiper-wrapper">
                <?php

                $menu_items = wp_get_nav_menu_items('Меню языков');

                if ($menu_items) {
                    foreach ($menu_items as $item) {
                        $flag_icon = '';
                        $caption = '';
                        switch ($item->title) {
                            case 'Испанский язык':
                                $caption = 'Испанский';
                                $flag_icon = 'spain.svg';
                                break;
                            case 'Китайский язык':
                                $caption = 'Китайский';
                                $flag_icon = 'china.svg';
                                break;
                            case 'Японский язык':
                                $caption = 'Японский';
                                $flag_icon = 'japan.svg';
                                break;
                            case 'Немецкий язык':
                                $caption = 'Немецкий';
                                $flag_icon = 'german.svg';
                                break;
                            case 'Французский язык':
                                $caption = 'Французский';
                                $flag_icon = 'france.svg';
                                break;
                        }
                ?>
                        <li class="languages__item swiper-slide">
                            <a href="<?php echo esc_url($item->url); ?>" class="languages__item-caption">
                                <span class="languages__item-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/<?php echo $flag_icon; ?>" alt="Флаг">
                                </span>
                                <span class="languages__item-name h6 fw-bold">
                                    <?php echo $caption; ?>
                                </span>
                            </a>
                            <p class="languages__item-desc">
                                В группах, индивидуально и&nbsp;онлайн
                            </p>
                            <a href="<?php echo esc_url($item->url); ?>" class="languages__item-btn btn btn-secondary btn-md">ПОДРОБНЕЕ</a>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
            <div class="languages__pagination swiper-pagination"></div>
        </div>
    </div>
</section>
<section class="programms">
    <div class="container container-sm">
        <h2 class="programms__title text-center h3">Программы для дошкольников 3-6 лет:</h2>
        <div class="programms__slider swiper">
            <div class="swiper-wrapper">
                <div class="programms__card swiper-slide">
                    <div class="programms__card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/programms/01.png" alt="Рисунок детей">
                    </div>
                    <div class="programms__card-caption">развивающий <br> мини-сад</div>
                    <div class="programms__card-age">для детей 3-6 лет</div>
                    <div class="programms__card-time text-block-md">3 раза в неделю <br> по 4 часа</div>
                    <ul class="programms__card-list text-block-md">
                        <li class="programms__card-item">Английский</li>
                        <li class="programms__card-item">Чтение</li>
                        <li class="programms__card-item">Математика</li>
                        <li class="programms__card-item">Эмоциональный интеллект</li>
                        <li class="programms__card-item">Гимнастика</li>
                    </ul>
                    <a href="/mini-garden/" class="programms__card-btn btn btn-secondary btn-md">ПОДРОБНЕЕ</a>
                </div>
                <div class="programms__card swiper-slide">
                    <div class="programms__card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/programms/02.png" alt="Рисунок детей">
                    </div>
                    <div class="programms__card-caption">«развивай-ка»</div>
                    <div class="programms__card-age">для детей 3-4 лет</div>
                    <div class="programms__card-time text-block-md">2 раза в неделю <br> по 45 минут</div>
                    <ul class="programms__card-list text-block-md">
                        <li class="programms__card-item">Развитие речи</li>
                        <li class="programms__card-item">Развитие памяти</li>
                        <li class="programms__card-item">Изучение чисел</li>
                        <li class="programms__card-item">Творчество</li>
                        <li class="programms__card-item">Моторика</li>
                    </ul>
                    <a href="/lets-develop-it/" class="programms__card-btn btn btn-secondary btn-md">ПОДРОБНЕЕ</a>
                </div>
                <div class="programms__card swiper-slide">
                    <div class="programms__card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/programms/03.png" alt="Рисунок детей">
                    </div>
                    <div class="programms__card-caption">подготовка <br>
                        к школе</div>
                    <div class="programms__card-age">для детей 3-6 лет</div>
                    <div class="programms__card-time text-block-md">2 раза в неделю <br> по 45 минут</div>
                    <ul class="programms__card-list text-block-md">
                        <li class="programms__card-item">Развитие речи</li>
                        <li class="programms__card-item">Чтение</li>
                        <li class="programms__card-item">Письмо</li>
                        <li class="programms__card-item">Основы математики</li>
                        <li class="programms__card-item">Окружающий мир</li>
                    </ul>
                    <a href="/preparing-for-school/" class="programms__card-btn btn btn-secondary btn-md">ПОДРОБНЕЕ</a>
                </div>
            </div>
            <div class="programms__pagination swiper-pagination"></div>
        </div>
    </div>
</section>
<?php require_once(TEMPLATE_PATH . '_desc.php'); ?>
<?php require_once(TEMPLATE_PATH . '_atmosphere.php'); ?>
<?php require_once(TEMPLATE_PATH . '_sign-lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_why.php'); ?>
<?php require_once(TEMPLATE_PATH . '_license.php'); ?>
<section class="method">
    <div class="container container-sm">
        <div class="method__content row">
            <div class="col-xl-7 col-lg-6 col-sm-8">
                <div class="method__body">
                    <h2 class="method__title h3">коммуникативная ​методика</h2>
                    <div class="method__desc text-block-md">
                        <p>
                            Делаем основной упор на навыках общения и посвящаем ​большую часть занятия разговорной практике.
                        </p>
                        <p>
                            Уделяем внимание всем аспектам языка - устная речь, ​восприятие на слух, чтение, письмо и словарный запас, а ​так же грамматика и произношение по международным ​стандартам.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 offset-lg-1">
                <div class="method__image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cambridge-logo.svg" alt="Лого университета">
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once(TEMPLATE_PATH . '_partner.php'); ?>
<?php require_once(TEMPLATE_PATH . '_regular.php'); ?>
<?php require_once(TEMPLATE_PATH . '_best-teachers.php'); ?>
<?php require_once(TEMPLATE_PATH . '_lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_banner.php'); ?>
<?php require_once(TEMPLATE_PATH . '_cert.php'); ?>
<?php require_once(TEMPLATE_PATH . '_reviews.php'); ?>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>

<?php get_footer(); ?>