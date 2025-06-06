<?php

/**
 * Template Name: Age 18 + Page Template
 */
?>
<?php

set_query_var('logo', 'pink');
get_header();
?>


<?php require_once(TEMPLATE_PATH . '_desc.php'); ?>
<?php require_once(TEMPLATE_PATH . '_cards.php'); ?>
<?php
$image = get_field('language-desc_image');
$title = get_field('language-desc_title');
$list = get_field('language-desc_list');
?>
<?php if ($image || $title || $list) : ?>
    <section class="language-desc">
        <div class="container">
            <div class="row">
                <div class="offset-lg-2 col-lg-4 col-md-6">
                    <div class="language-desc__image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 offset-md-1">
                    <div class="language-desc__main">
                        <?php if ($title) : ?>
                            <h2 class="language-desc__title h5 text-center-mobile">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/handshake.svg" alt="Иконка">
                                <?php echo esc_html($title); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if ($list) : ?>
                            <ul class="language-desc__list text-block-md">
                                <?php foreach ($list as $item) : ?>
                                    <li><?php echo esc_html($item['item']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="language-desc__icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/handshake.svg" alt="Иконка">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php require_once(TEMPLATE_PATH . '_why.php'); ?>
<?php require_once(TEMPLATE_PATH . '_atmosphere.php'); ?>
<?php require_once(TEMPLATE_PATH . '_teachers.php'); ?>
<?php require_once(TEMPLATE_PATH . '_lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_sign-lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_info-block.php'); ?>
<?php require_once(TEMPLATE_PATH . '_regular.php'); ?>
<?php require_once(TEMPLATE_PATH . '_partner.php'); ?>
<?php require_once(TEMPLATE_PATH . '_banner.php'); ?>
<?php require_once(TEMPLATE_PATH . '_prices-v2.php'); ?>
<?php require_once(TEMPLATE_PATH . '_reviews.php'); ?>
<?php require_once(TEMPLATE_PATH . '_our-centres.php'); ?>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>

<?php get_footer(); ?>