<?php
$experience_date = get_field('experience');
$years_text = '';

if ($experience_date) {
    $start_year = (int) date('Y', strtotime($experience_date));
    $current_year = (int) date('Y');
    $years_count = max(0, $current_year - $start_year);
    $years_text = $years_count . ' ' . plural_years($years_count);
}
?>

<div class="teacher swiper-slide">
    <a href="#teacher-<?php the_ID(); ?>" data-fancybox class="teacher__main">
        <span class="teacher__image">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full'); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/teacher-thumb.svg" alt="Заглушка">
            <?php endif; ?>
        </span>
        <span class="teacher__name text-block-md fw-bold">
            <?php the_title(); ?>
        </span>
        <span class="teacher__position text-block-md">
            <?php if (isset($args['show_position']) && $args['show_position'] === true) : ?>
                <?php the_field('position'); ?>
            <?php else : ?>
                Язык: <?php the_field('language'); ?><br>
                Стаж: <?php echo $years_text; ?>
            <?php endif; ?>
        </span>
    </a>

    <div id="teacher-<?php the_ID(); ?>" class="teacher__modal">
        <div class="teacher__modal-content">
            <button type="button" class="teacher__modal-close icon-close" data-fancybox-close></button>
            <div class="teacher__modal-thumb">
                <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('full'); ?>
                <?php endif; ?>
            </div>
            <div class="teacher__modal-body">
                <div class="teacher__modal-header">
                    <div class="teacher__modal-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/CME-teachers.svg" alt="Логотип">
                    </div>
                    <div class="teacher__modal-name">
                        <?php the_title(); ?>
                    </div>
                </div>
                <div class="teacher__modal-info text-block-lg">
                    Язык: <?php the_field('language'); ?><br>
                    Стаж преподавания: <?php echo $years_text; ?>
                </div>
                <div class="teacher__modal-desc">
                    <?php the_content() ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="teacher__modal-btn btn btn-primary">Профиль автора</a>
            </div>
        </div>
    </div>
</div>