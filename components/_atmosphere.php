<section class="atmosphere">
    <div class="container">
        <div class="atmosphere__body">
            <div class="row">
                <div class="col-xl-4 col-md-5">
                    <div class="atmosphere__main">
                        <h2 class="atmosphere__title h3">
                            атмосфера в наших центрах
                        </h2>
                        <p class="atmosphere__desc text-block-md">
                            Комфортные, уютные аудитории, оснащенные всем&nbsp;необходимым для эффективного обучения!
                        </p>
                        <a href="/gallery" class="atmosphere__link h4 icon-arrow-cirlce">ФОТОгалерея</a>
                    </div>
                </div>
                <div class="col-md-7 offset-xl-1">
                    <? $gallery = get_field('gallery_images', 'option'); ?>
                    <div class="atmosphere__slider swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($gallery as $image): ?>
                                <a href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery" class="gallery__slide swiper-slide">
                                    <img src="<?php echo esc_url($image['url']); ?>" class="cover-image" alt="<?php echo esc_attr($image['alt']); ?>">
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <button type="button" class="atmosphere__prev swiper-button-prev"></button>
                        <button type="button" class="atmosphere__next swiper-button-next"></button>
                        <div class="atmosphere__pagination swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>