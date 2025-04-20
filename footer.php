<?php if (!is_page('Вакансии')) require_once(TEMPLATE_PATH . '_trial.php'); ?>

</main>
<footer class="footer">
    <?php
    $phone_number = get_field('phone_number', 'option');
    $formatted_phone_number = preg_replace('/[^0-9+]/', '', $phone_number);
    ?>
    <div class="container">
        <div class="footer__header row">
            <div class="footer__column col-lg-3 col-sm-6">
                <a href="/" class="footer__home icon-home"></a>
                <nav class="footer__menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu_4',
                        'container' => false,
                        'menu_class' => '',
                    ));
                    ?>
                </nav>
                <a href="/prices" class="footer__caption text-block-md fw-bold">Цены</a>
                <nav class="footer__menu">
                    <ul>
                        <li><a href="/prices">Стоимость занятий и акции</a></li>
                    </ul>
                </nav>
                <div class="footer__contacts">
                    <a href="tel:<? echo esc_html($formatted_phone_number); ?>" class="footer__link icon-phone"><? echo esc_html($phone_number); ?></a>
                    <a href="https://wa.me/<? echo esc_html($formatted_phone_number); ?>" target="_blank" class="footer__link icon-whatsapp">whatsapp</a>
                    <div class="footer__socials">
                        <a href="" class="footer__social icon-vk"></a>
                        <a href="" class="footer__social icon-telegram"></a>
                    </div>
                </div>
            </div>
            <div class="footer__column col-lg-3 col-sm-6">
                <div class="footer__caption text-block-md fw-bold">Английский</div>
                <nav class="footer__menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu_1',
                        'container' => false,
                        'menu_class' => '',
                    ));
                    ?>
                </nav>
            </div>
            <div class="footer__column col-lg-4 col-sm-6">
                <a href="/3-6" class="footer__caption text-block-md fw-bold">Дошкольники</a>
                <nav class="footer__menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu_2',
                        'container' => false,
                        'menu_class' => '',
                    ));
                    ?>
                </nav>
                <a href="/centres" class="footer__caption text-block-md fw-bold offset-lg">Наши центры</a>
                <nav class="footer__menu">
                    <ul>
                        <li><a href="/centres#mytishi">г. Мытищи</a></li>
                        <li><a href="/centres#balashiha">г. Балашиха</a></li>
                    </ul>
                </nav>
            </div>
            <div class="footer__column col-lg-2 col-sm-6">
                <div class="footer__caption text-block-md fw-bold">Другие языки</div>
                <nav class="footer__menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu_3',
                        'container' => false,
                        'menu_class' => '',
                    ));
                    ?>
                </nav>
                <a href="/vacancies" class="footer__vacanies">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/vacancies.svg" alt="Наши вакансии">
                    Вакансии
                </a>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="footer__copy"> <?php echo '© ООО «Центр Модерн Инглиш» ' . date('Y') . '. Все права защищены.'; ?></div>
            <a href="/" class="footer__logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-en.svg" alt="Логотип">
            </a>
        </div>
    </div>
</footer>
<div id="order" class="popup">
    <div class="popup__body">
        <button type="button" class="popup__close icon-plus-circle" data-fancybox-close></button>
        <div class="popup__content">
            <form action="#" class="popup__form">
                <div class="popup__form-body">
                    <div class="popup__form-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/CME-languages.svg" alt="Логотип">
                    </div>
                    <input type="text" name="name" class="form__input" placeholder="Имя">
                    <input type="tel" name="phone" class="form__input" placeholder="Телефон">
                    <select class="select">
                        <option disabled selected value="0">Выберите филиал</option>
                        <option value="1">г. Мытищи, Борисовка 16</option>
                        <option value="2">г. Мытищи, Кадомцева 2</option>
                        <option value="3">г. Мытищи, 2-я Институтская 24А</option>
                        <option value="4">г. Балашиха, Реутовская 20</option>
                    </select>
                </div>
                <button type="submit" class="popup__form-btn btn btn-blue btn-md">Отправить</button>
            </form>
            <div class="popup__desc">
                <h4 class="popup__title">
                    Запишитесь на
                    бесплатный&nbsp;урок
                </h4>
                <div class="popup__text text-block-md">
                    <p>* Оставьте нам свои контактные данные и&nbsp;мы обязательно свяжемся с Вами в&nbsp;ближайшее время</p>
                    <p>* * Мы не передадим Ваши данные третьим лицам</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="success" class="popup">
    <div class="popup__body">
        <button type="button" class="popup__close icon-plus-circle" data-fancybox-close></button>
        <div class="popup__success text-center">
            <div class="popup__title h4">
                Ваша заявка принята
            </div>
            <div class="popup__success-desc text-block-md">
                Наш менеджер свяжется с вами
            </div>
        </div>
    </div>
</div>
</div>
<?php wp_footer(); ?>
</body>

</html>