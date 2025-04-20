<?php if (get_field('cards_slider')) : ?>
    <?php
    $cards_slider = get_field('cards_slider');
    $cards_caption = $cards_slider['cards_caption'];
    $cards_subtitle = $cards_slider['cards_subtitle'];
    $cards_slides = $cards_slider['cards_slides'];
    ?>

    <?php if ($cards_caption): ?>
        <section class="cards">
        <?php else: ?>
            <div class="cards">
            <?php endif; ?>

            <div class="container">
                <?php if ($cards_caption): ?>
                    <h2 class="cards__title text-center h3"><?php echo esc_html($cards_caption); ?></h2>
                <?php endif; ?>

                <?php if ($cards_subtitle): ?>
                    <p class="cards__subtitle text-block-lg text-center"><?php echo esc_html($cards_subtitle); ?></p>
                <?php endif; ?>

                <div class="cards__slider swiper">
                    <div class="swiper-wrapper">
                        <?php if ($cards_slides): ?>
                            <?php foreach ($cards_slides as $slide): ?>
                                <div class="cards__slide swiper-slide">
                                    <?php if ($image = $slide['image']): ?>
                                        <div class="cards__slide-image">
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt'] ? esc_attr($image['alt']) : 'Иконка'; ?>">
                                        </div>
                                    <?php endif; ?>

                                    <div class="cards__slide-title h5">
                                        <?php echo $slide['title'] ?>
                                    </div>

                                    <div class="cards__slide-desc <?php echo esc_attr($slide['desc_size']); ?>">
                                        <?php echo $slide['description'] ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="cards__slider-pagination swiper-pagination"></div>
                </div>
            </div>

            <?php if ($cards_caption): ?>
        </section>
    <?php else: ?>
        </div>
    <?php endif; ?>

<?php endif; ?>