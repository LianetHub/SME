<?php

/**
 * Template Name: ЖК «Люблинский Парк» Template
 */
set_query_var('logo', 'pink');
get_header();
?>
<?php
$phone_number = get_field('phone_number', 'option');
$formatted_phone_number = preg_replace('/[^0-9+]/', '', $phone_number);
$location_title = get_field('location_title');
$contacts_address = get_field('contacts_address');
$yandex_map_url = get_field('yandex_map_url');
$phone_number_center_wa = get_field('phone_number_center_wa');
$formatted_phone_number_center_wa = preg_replace('/\D/', '', $phone_number_center_wa);

?>
<?php if ($contacts_address) : ?>
    <section class="contacts">
        <div class="container">
            <div class="contacts__header">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contacts__title h4 text-center"><?= $location_title ?>, <br> <?= $contacts_address ?></h2>
                    </div>
                    <div class="col-xl-6 offset-xl-3">
                        <div class="contacts__map">
                            <?
                            if ($yandex_map_url) :
                                echo '<iframe width="100%" height="400" src="' . esc_attr($yandex_map_url) . '" frameborder="0"></iframe>';
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? endif ?>
<?php require_once(TEMPLATE_PATH . '_door-open-day.php'); ?>
<div class="container">
    <ul class="contacts__list contacts__list--large text-block-md">
        <li class="contacts__item">
            <div class="contacts__item-icon">
                <img src="https://www.me-english.ru/wp-content/uploads/2025/07/icon-phone.svg" alt="Иконка">
            </div>
            <span>
                Телефон:
                <a href="tel:<? echo esc_html($formatted_phone_number); ?>">
                    <? echo esc_html($phone_number); ?>
                </a>
            </span>
        </li>
        <li class="contacts__item">
            <div class="contacts__item-icon">
                <img src="https://www.me-english.ru/wp-content/uploads/2025/07/icon-whatsapp.svg" alt="Иконка">
            </div>
            <span>WhatsApp: <a href="https://wa.me/<? echo esc_html($formatted_phone_number_center_wa); ?>" target="_blank"><? echo esc_html($phone_number_center_wa); ?></a></span>
        </li>
    </ul>
</div>
<section class="programms">
    <div class="container container-sm">
        <h2 class="programms__title text-center">
            <img src="https://www.me-english.ru/wp-content/uploads/2025/04/cambridge-logo.svg" alt="Лого">
            наши программы
        </h2>
        <div class="programms__list">
            <ul class="row">
                <li class="programms__item col-md-4 col-sm-6">
                    <div class="programms__item-num h1">3-6</div>
                    <div class="programms__item-caption">ДОШКОЛЬНИКИ</div>
                    <ul class="programms__item-list text-block-md">
                        <li>Английский язык</li>
                        <li>Развивающий мини-сад</li>
                        <li>Подготовка к школе</li>
                    </ul>
                </li>
                <li class="programms__item col-md-4 col-sm-6">
                    <div class="programms__item-num h1">7-17</div>
                    <div class="programms__item-caption">Школьники</div>
                    <ul class="programms__item-list text-block-md">
                        <li>Английский и другие языки</li>
                        <li>Занятия в группах и индивидуально</li>
                        <li>Подготовка к сдаче международных экзаменов</li>
                        <li>Подготовка к ОГЭ/ЕГЭ</li>
                    </ul>
                </li>
                <li class="programms__item col-md-4 col-sm-6">
                    <div class="programms__item-num h1">18<span>+</span></div>
                    <div class="programms__item-caption">Взрослые</div>
                    <ul class="programms__item-list text-block-md">
                        <li>Английский и другие языки, занятия в&nbsp;группах и индивидуально</li>
                        <li>Деловой и корпоративный английский</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</section>
<?php require_once(TEMPLATE_PATH . '_desc.php'); ?>
<?php require_once(TEMPLATE_PATH . '_nums.php'); ?>
<?php require_once(TEMPLATE_PATH . '_about.php'); ?>
<?php require_once(TEMPLATE_PATH . '_cert.php'); ?>
<?php get_footer(); ?>