<?php

/**
 * Template Name: Teachers Page Template
 */
?>
<?php
set_query_var('logo', 'pink');
get_header();
?>
<?php require_once(TEMPLATE_PATH . '_heading.php'); ?>
<?php require_once(TEMPLATE_PATH . '_desc.php'); ?>
<div class="best-teachers">
    <div class="container container-sm">
        <div class="best-teachers__logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/CME-teachers.svg" alt="Логотип">
        </div>
        <div class="best-teachers__slider swiper">
            <ul class="swiper-wrapper">
                <?php
                $teachers = new WP_Query([
                    'post_type' => 'teacher',
                    'posts_per_page' => -1,
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
    </div>
</div>
<? $requirements = get_field('requirements');
if ($requirements) : ?>
    <section class="requirements">
        <div class="container container-sm">
            <h2 class="requirements__title h3">
                <span class="requirements__title-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/CME-teachers.svg" alt="Логотип">
                </span>
                Наши требования к преподавателям
            </h2>
            <div class="requirements__body text-block-md">
                <? echo $requirements ?>
            </div>
        </div>
    </section>
<? endif; ?>
<?php require_once(TEMPLATE_PATH . '_lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_sign-lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_reviews.php'); ?>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>

<?php get_footer(); ?>