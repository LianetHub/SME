<?php

/**
 * Template Name: About Page Template
 */
?>
<?php

set_query_var('logo', 'pink');
get_header();
?>

<?php require_once(TEMPLATE_PATH . '_heading.php'); ?>
<?php require_once(TEMPLATE_PATH . '_desc.php'); ?>
<?php require_once(TEMPLATE_PATH . '_nums.php'); ?>
<?php if (have_rows('about_section')): ?>
    <section class="about">
        <div class="container">
            <h2 class="about__title h3 text-center">Почему выбирают CME:</h2>
            <div class="about__body">
                <?php
                $counter = 1;
                while (have_rows('about_section')): the_row(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="about__image">
                                <?php
                                $image = get_sub_field('about_image');
                                $cover_class = '';
                                if (get_sub_field('about_cover')) {
                                    $cover_class = 'cover-image';
                                }
                                if ($image):
                                    echo wp_get_attachment_image($image['ID'], 'full', false, array('class' => $cover_class, 'alt' => 'Фото компании'));
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about__column">
                                <div class="about__num"><?php echo $counter; ?></div>
                                <div class="about__caption h4"><?php the_sub_field('about_title'); ?></div>
                                <? if (get_sub_field('about_tagline')): ?>
                                    <div class="about__tagline">
                                        <?php echo get_sub_field('about_tagline') ?>
                                    </div>
                                <?php endif; ?>

                                <? $desc = get_sub_field('about_desc');
                                if ($desc): ?>
                                    <div class="about__desc">
                                        <?php echo $desc ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php
                    $counter++;
                endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php require_once(TEMPLATE_PATH . '_sign-lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_best-teachers.php'); ?>
<?php require_once(TEMPLATE_PATH . '_cert.php'); ?>
<?php require_once(TEMPLATE_PATH . '_reviews.php'); ?>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>

<?php get_footer(); ?>