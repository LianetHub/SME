<?php
$phone_number = get_field('phone_number', 'option');
$formatted_phone_number = preg_replace('/[^0-9+]/', '', $phone_number);
$email_address = get_field('email_address', 'option');
$contacts_address = get_field('contacts_address');
$yandex_map_url = get_field('yandex_map_url');
$gallery = get_field('gallery_images');
$phone_number_center_wa = get_field('phone_number_center_wa');
$formatted_phone_number_center_wa = preg_replace('/\D/', '', $phone_number_center_wa);
$liczenziya = get_field('liczenziya');
$dannye = get_field('dannye');
$dogovor = get_field('dogovor');

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
                                            <? echo esc_html($phone_number); ?></a> 
                                    </span>
                                </li>
                                <li class="contacts__item">
                                    <div class="contacts__item-icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/whatsapp.svg" alt="Иконка">
                                    </div>
                                    <span>WhatsApp: <a href="https://wa.me/<? echo esc_html($formatted_phone_number_center_wa); ?>" target="_blank"><? echo esc_html($phone_number_center_wa); ?></a></span>
                                </li>
                                <li class="contacts__item icon-location">
                                    <address>
                                        Адрес: <? echo $contacts_address ?>
                                    </address>
                                </li>
                                <li class="contacts__item icon-envelope">
                                    <span>Email: <a href="mailto:<? echo esc_html($email_address); ?>"><? echo esc_html($email_address); ?></a></span>
                                </li>
								<li class="contacts__item">
                                    <span><a href="<? echo esc_html($dogovor); ?>" target="_blank">Договор</a></span>
                                </li>
								 <li class="contacts__item">
                                    <span><a href="<? echo esc_html($dannye); ?>" target="_blank">Данные об организации</a></span>
                                </li>
								 <li class="contacts__item">
                                    <span> <a href="<? echo esc_html($liczenziya); ?>" target="_blank">Лицензия</a></span>
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
                                    <img src="<?php echo esc_url($image['url']); ?>" class="cover-image" alt="<?php echo esc_attr($image['alt']); ?>">
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