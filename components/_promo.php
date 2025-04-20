<?php
$promo_block = get_field('promo_block');

if (is_404()) {
    $promo_block = [
        'promo_title' => 'Страница не найдена',
        'promo_subtitle' => '',
        'promo_class' => 'promo-grey',
        'promo_title_class' => 'promo__title_lg color-text',
        'promo_subtitle_class' => '',
        'promo_offer_class' => '',
        'promo_image' => '',
        'promo_image_class' => ''
    ];
}


if ($promo_block) {
    $promo_title = $promo_block['promo_title'] ?? '';
    $promo_subtitle = $promo_block['promo_subtitle'] ?? '';

    $promo_class = $promo_block['promo_class'] ?? 'promo-grey';
    $title_class = $promo_block['promo_title_class'] ?? '';
    $subtitle_class = $promo_block['promo_subtitle_class'] ?? '';
    $offer_class = $promo_block['promo_offer_class'] ?? '';

    $promo_image = $promo_block['promo_image'] ?? '';
    $promo_image_class = $promo_block['promo_image_class'] ?? '';

    $tag = ($promo_title) ? 'section' : 'div';

    $title_class = is_array($title_class) ? implode(' ', $title_class) : $title_class;
    $subtitle_class = is_array($subtitle_class) ? implode(' ', $subtitle_class) : $subtitle_class;
    $offer_class = is_array($offer_class) ? implode(' ', $offer_class) : $offer_class;
    $promo_image_class = is_array($promo_image_class) ? implode(' ', $promo_image_class) : $promo_image_class;
?>
    <<?= $tag ?> class="promo <?= esc_attr($promo_class); ?>">
        <div class="container">
            <div class="promo__body">
                <?php if ($promo_title || $promo_subtitle) : ?>
                    <div class="promo__offer <?= esc_attr($offer_class); ?>">
                        <?php if ($promo_title) : ?>
                            <h1 class="promo__title <?= esc_attr($title_class); ?>">
                                <? echo $promo_title ?>
                            </h1>
                        <?php endif; ?>

                        <?php if ($promo_subtitle) : ?>
                            <p class="promo__subtitle <?= esc_attr($subtitle_class); ?>">
                                <? echo $promo_subtitle ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($promo_image) : ?>
                    <div class="promo__image <?= esc_attr($promo_image_class); ?>">
                        <img src="<?= esc_url($promo_image['url']); ?>" alt="<?= esc_attr($promo_image['alt']); ?>">
                    </div>
                <?php endif; ?>

                <div class="promo__side">
                    <?= do_shortcode('[contact-form-7 id="10c718e" title="Контактная форма 1"]'); ?>
                    <div class="promo__info hidden">
                        <button type="button" aria-label="Закрыть окно информации" class="promo__info-close icon-close"></button>
                        <div class="promo__info-text">
                            Мы не передадим Ваши
                            данные третьим лицам
                        </div>
                    </div>
                    <div class="promo__success hidden">
                        <button type="button" aria-label="Закрыть окно успеха" class="promo__success-close icon-close"></button>
                        <div class="promo__info-text">
                            Готово! <br>
                            мы свяжемся с вами!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </<?= $tag ?>>
<?php } ?>