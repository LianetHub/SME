<?php

/**
 * Template Name: Vacancies Page Template
 */
?>
<?php
set_query_var('logo', 'pink');
get_header();
?>

<?php require_once(TEMPLATE_PATH . '_desc.php'); ?>
<?php require_once(TEMPLATE_PATH . '_benefits.php'); ?>
<?php require_once(TEMPLATE_PATH . '_teachers.php'); ?>
<?php if (get_field('responsibilities') && get_field('requirements') && get_field('terms')): ?>
    <div class="vacancy-desc">
        <div class="container">
            <div class="vacancy-desc__body">
                <div class="row">
                    <?php if (have_rows('responsibilities')): ?>
                        <div class="col-md-4">
                            <div class="vacancy-desc__column">
                                <div class="vacancy-desc__icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/responsibilities.svg" alt="Иконка">
                                </div>
                                <h3 class="vacancy-desc__caption h5">обязанности</h3>
                                <ul class="vacancy-desc__list text-block-md">
                                    <?php while (have_rows('responsibilities')): the_row(); ?>
                                        <li><?php echo get_sub_field('text'); ?></li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (have_rows('requirements')): ?>
                        <div class="col-md-4">
                            <div class="vacancy-desc__column">
                                <div class="vacancy-desc__icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/requirements.svg" alt="Иконка">
                                </div>
                                <h3 class="vacancy-desc__caption h5">требования</h3>
                                <ul class="vacancy-desc__list text-block-md">
                                    <?php while (have_rows('requirements')): the_row(); ?>
                                        <li><?php echo get_sub_field('text'); ?></li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (have_rows('terms')): ?>
                        <div class="col-md-4">
                            <div class="vacancy-desc__column">
                                <div class="vacancy-desc__icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/terms.svg" alt="Иконка">
                                </div>
                                <h3 class="vacancy-desc__caption h5">Условия</h3>
                                <ul class="vacancy-desc__list text-block-md">
                                    <?php while (have_rows('terms')): the_row(); ?>
                                        <li><?php echo get_sub_field('text'); ?></li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<? endif ?>
<section class="resume">
    <div class="container">
        <?
        $resume_email = get_field('resume_email', 'option');
        ?>
        <div class="resume__body text-center">
            <h2 class="resume__title h3">отправьте ваше резюме на&nbsp;эту&nbsp;почту:</h2>
            <a href="mailto:<? echo $resume_email; ?>" class="resume__email h4">
                <span class="resume__email-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/mail.svg" alt="Иконка">
                </span>
                <? echo $resume_email; ?>
            </a>
        </div>
    </div>
</section>
<?php get_footer(); ?>