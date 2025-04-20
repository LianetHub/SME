<?php

/**
 * Template Name: Gallery Page Template
 */
?>
<?php
set_query_var('header', 'white');
get_header();
?>

<section class="gallery">
    <div class="container">
        <div class="gallery__header">
            <h2 class="gallery__title text-center">фотогалерея</h2>
            <div class="gallery__logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/CME-photos.svg" alt="Логотип">
            </div>
        </div>
        <? $gallery = get_field('gallery_images', 'option'); ?>
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
    </div>
</section>

<?php get_footer(); ?>