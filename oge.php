<?php

/**
 * Template Name: OGE Page Template
 */
?>
<?php
set_query_var('logo', 'pink');
get_header();
?>

<?php require_once(TEMPLATE_PATH . '_desc.php'); ?>
<?php require_once(TEMPLATE_PATH . '_sections-block.php'); ?>
<?php require_once(TEMPLATE_PATH . '_exam-desc.php'); ?>
<?php require_once(TEMPLATE_PATH . '_cards.php'); ?>
<?php
$image = get_field('language-desc_image');
$title = get_field('language-desc_title');
$text = get_field('language-desc_text');
?>
<?php if ($image || $title || $text) : ?>
    <section class="language-desc">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="language-desc__image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="language-desc__main">
                        <?php if ($title) : ?>
                            <h2 class="language-desc__title h5 text-center-mobile">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/doc.svg" alt="Иконка">
                                <?php echo esc_html($title); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if ($text) : ?>
                            <p class="language-desc__text text-block-md">
                                <?php echo esc_html($text); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php require_once(TEMPLATE_PATH . '_teachers.php'); ?>
<?php require_once(TEMPLATE_PATH . '_lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_sign-lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_partner.php'); ?>
<?php require_once(TEMPLATE_PATH . '_regular.php'); ?>
<?php require_once(TEMPLATE_PATH . '_license.php'); ?>
<?php require_once(TEMPLATE_PATH . '_prices.php'); ?>
<?php require_once(TEMPLATE_PATH . '_reviews.php'); ?>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>

<?php get_footer(); ?>