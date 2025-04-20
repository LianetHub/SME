<section class="best-teachers">
    <div class="container container-sm">
        <div class="best-teachers__header text-center">
            <h2 class="best-teachers__title">
                Лучшие преподаватели
            </h2>
            <div class="best-teachers__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/CME-teachers.svg" alt="Логотип">
            </div>
            <div class="best-teachers__text text-block-md">
                <p>По статистике, из 50 соискателей на должность преподавателя в CME, прошедших собеседование, мы отбираем только одного.</p>
                <p>Благодаря огромному опыту наших академических специалистов, мы работаем ​только с лучшими преподавателями, для которых быть учителем – это призвание!</p>
            </div>
        </div>
        <div class="best-teachers__slider swiper">
            <ul class="swiper-wrapper">
                <?php
                $teachers = new WP_Query([
                    'post_type' => 'teacher',
                    'posts_per_page' => 8,
                    'order' => 'ASC'
                ]);

                if ($teachers->have_posts()): ?>
                    <?php while ($teachers->have_posts()): $teachers->the_post(); ?>
                        <?php get_template_part('templates/_teacher'); ?>
                    <?php endwhile; ?>
                <?php endif;
                wp_reset_postdata();
                ?>
            </ul>
            <div class="best-teachers__pagination swiper-pagination"></div>
        </div>
        <a href="/teachers" class="best-teachers__btn btn btn-secondary btn-md">подробнее</a>
    </div>
</section>