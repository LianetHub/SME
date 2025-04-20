<?

$subtitle = get_field('best_teachers_subtitle');
$desc = get_field('best_teachers_desc');
$has_logo = get_field('best_teachers_has_logo');
$has_link = get_field('best_teachers_has_link');
?>

<section class="teachers">
    <div class="container">
        <div class="teachers__body">
            <div class="row">
                <div class="col-xl-5 col-md-6">
                    <div class="teachers__main">
                        <h2 class="teachers__title h3">
                            лучшие преподаватели
                        </h2>
                        <?php if ($subtitle): ?>
                            <p class="teachers__tagline fw-bold text-center-mobile">
                                <?php echo esc_html($subtitle); ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($desc): ?>
                            <div class="teachers__text">
                                <?php echo $desc ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($has_logo): ?>
                            <div class="teachers__logo">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/CME-for-kids.svg" alt="Логотип">
                            </div>
                        <?php endif; ?>
                        <?php if ($has_link): ?>
                            <a href="/teachers" class="teachers__link h4 icon-arrow-cirlce">подробнее</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6 offset-xl-1">
                    <div class="teachers__images row">
                        <div class="col-6">
                            <div class="teachers__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/teachers/olga-bakleneva.jpg" alt="Фото преподавателя">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="teachers__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/teachers/maria-kozlova.jpg" alt="Фото преподавателя">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="teachers__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/teachers/yana-kuznetsova.jpg" alt="Фото преподавателя">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="teachers__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/teachers/reuel-emmanuel.jpg" alt="Фото преподавателя">
                            </div>
                        </div>
                    </div>
                    <?php if ($has_link): ?>
                        <a href="/teachers" class="teachers__link h4 icon-arrow-cirlce mobile-only">подробнее</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>