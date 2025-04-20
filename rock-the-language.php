<?php

/**
 * Template Name: Rock The Language Page Template
 */
?>
<?php
set_query_var('logo', 'pink');
get_header();
?>


<?php require_once(TEMPLATE_PATH . '_desc.php'); ?>
<?php if (get_field('speaker_items')): ?>
    <section class="speaker">
        <div class="container">
            <h2 class="speaker__title h3 text-center">
                <?php echo get_field('speaker_title') ?>
            </h2>
            <p class="speaker__desc text-block-lg text-center">
                <?php echo get_field('speaker_desc') ?>
            </p>
            <div class="speaker__body">
                <div class="row">
                    <?php foreach (get_field('speaker_items') as $item) : ?>
                        <?php
                        $image = $item['image'];
                        $title = $item['title'];
                        $list = $item['list'];
                        ?>
                        <div class="col-6">
                            <div class="speaker__item">
                                <div class="speaker__item-thumb">
                                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
                                </div>
                                <div class="speaker__item-title h5 icon-energy">
                                    <?php echo $title ?>
                                </div>
                                <ul class="speaker__item-list">
                                    <?php foreach ($list as $item) : ?>
                                        <li><?php echo esc_html($item['item']); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>
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
<?php require_once(TEMPLATE_PATH . '_sign-lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_reviews.php'); ?>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>

<?php get_footer(); ?>