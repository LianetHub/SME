<?php if (!is_page('Вакансии')) require_once(TEMPLATE_PATH . '_trial.php'); ?>

</main>
<footer class="footer">
    <?php
    $phone_number = get_field('phone_number', 'option');
    $vk_url = get_field('vk_url', 'option');
    $telegram_url = get_field('telegram_url', 'option');
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
                    <div class="footer__whatsapp">
                        <button type="button" class="footer__whatsapp-btn icon-whatsapp">
                            whatsapp
                        </button>
                        <div class="footer__whatsapp-items">
                            <a href="https://wa.me/79932506658" class="footer__whatsapp-item">
                                г. Москва, ул. Люблинская, 72Ак2
                            </a>
                            <a href="https://wa.me/79259235142" class="footer__whatsapp-item">
                                г. Мытищи, ул. Борисовка, 16
                            </a>
                            <a href="https://wa.me/79067744866" class="footer__whatsapp-item">
                                г. Мытищи, ул. Кадомцева, 2
                            </a>
                            <a href="https://wa.me/79856303053" class="footer__whatsapp-item">
                                г. Мытищи, ул. 2-я Институтская, 24а
                            </a>
                            <a href="https://wa.me/79956557339" class="footer__whatsapp-item">
                                г. Балашиха, ул. Реутовская, 20
                            </a>
                        </div>
                    </div>
                    <div class="footer__socials">
                        <a href="<?= $vk_url ?>" target="_blank" rel="noopener noreferrer" class="footer__social icon-vk"></a>
                        <a href="<?= $telegram_url ?>" target="_blank" rel="noopener noreferrer" class="footer__social icon-telegram"></a>
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
                <div class="footer__caption text-block-md fw-bold">Дошкольники</div>
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
                        <li><a href="/centres#moskow">г. Москва</a></li>
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
                <a href="/vacancies/" class="footer__vacanies">
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
    <div class="popup__body form__wrapper">
        <button type="button" class="popup__close icon-plus-circle form__success-close" data-fancybox-close></button>
        <div class="popup__content">
            <div class="popup__form">
                <?= do_shortcode('[contact-form-7 id="d7901da" title="Контактная форма в модальном окне"]'); ?>
            </div>
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
        <div class="popup__success form__success-block text-center hidden">
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

<!-- Yandex.Metrika informer 
<a href="//metrika.yandex.ru/stat/?id=23802907&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/23802907/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:23802907,lang:'ru'});return false}catch(e){}"/></a>
/Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter23802907 = new Ya.Metrika({id:23802907,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/23802907" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>

</html>