<?php
$phone_number = get_field('phone_number', 'option');
$formatted_phone_number = preg_replace('/[^0-9+]/', '', $phone_number);
$email_address = get_field('email_address', 'option');

$contacts_address = get_field('contacts_address');
$yandex_map_url = get_field('yandex_map_url');
$gallery = get_field('gallery_images');

?>
<?php if ($contacts_address) : ?>
    <section class="contacts">
        <div class="container">
            <div class="contacts__header">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="contacts__main">
                            <h2 class="contacts__title h4">Контакты:</h2>
                            <ul class="contacts__list text-block-md">
                                <li class="contacts__item icon-phone">
                                    <span>
                                        Телефон <span class="pc-only">для связи</span>:
                                        <a href="tel:<? echo esc_html($formatted_phone_number); ?>">
                                            <? echo esc_html($phone_number); ?></a> <? echo $extension_text ?>
                                    </span>
                                </li>
                                <li class="contacts__item">
                                    <div class="contacts__item-icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/whatsapp.svg" alt="Иконка">
                                    </div>
                                    <span>WhatsApp: <a href="https://wa.me/<? echo esc_html($formatted_phone_number); ?>" target="_blank"><? echo esc_html($phone_number); ?></a></span>
                                </li>
                                <li class="contacts__item icon-location">
                                    <address>
                                        Адрес: <? echo $contacts_address ?>
                                    </address>
                                </li>
                                <li class="contacts__item icon-envelope">
                                    <span>Email: <a href="mailto:<? echo esc_html($email_address); ?>"><? echo esc_html($email_address); ?></a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 offset-xl-1">
                        <div class="contacts__map">
                            <?
                            if ($yandex_map_url) :
                                echo '<iframe width="100%" height="460" src="' . esc_attr($yandex_map_url) . '" frameborder="0"></iframe>';
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?
            if ($gallery):
            ?>
                <div class="gallery__slider">
                    <div class="gallery__slider-content swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($gallery as $image): ?>
                                <a href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery" class="gallery__slide swiper-slide">
                                    <img src="<?php echo esc_url($image['sizes']['full']); ?>" class="cover-image" alt="<?php echo esc_attr($image['alt']); ?>">
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button type="button" class="gallery__slider-prev icon-prev-circle"></button>
                    <button type="button" class="gallery__slider-next icon-next-circle"></button>
                    <div class="gallery__slider-pagination swiper-pagination"></div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<? endif ?>