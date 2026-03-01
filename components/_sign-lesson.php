<section class="sign-lesson">
    <div class="container">
        <h2 class="sign-lesson__title h4 text-center">Запишитесь на бесплатный урок!</h2>
        <p class="sign-lesson__subtitle h5 text-center">
            Наши филиалы:
        </p>
        <div class="sign-lesson__body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="certer-card">
                        <a href="<?php echo get_permalink(get_page_by_path('centres')); ?>#moskow" class="certer-card__address h5 icon-location">
                            Москва
                        </a>
                        <div class="certer-card__image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/location/lyublino.png" alt="Фото нашего центра">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="certer-card">
                        <a href="<?php echo get_permalink(get_page_by_path('centres')); ?>#mytishi" class="certer-card__address h5 icon-location">
                            Мытищи
                        </a>
                        <div class="certer-card__image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/location/01.jpg" alt="Фото нашего центра">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="certer-card">
                        <a href="<?php echo get_permalink(get_page_by_path('centres')); ?>#balashiha/" class="certer-card__address h5 icon-location">
                            Балашиха
                        </a>
                        <div class="certer-card__image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/location/04.jpg" alt="Фото нашего центра">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#order" data-fancybox class="sign-lesson__calllback btn btn-primary btn-sm">ОСТАВИТЬ ЗАЯВКУ</a>
    </div>
</section>