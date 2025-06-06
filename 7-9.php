<?php

/**
 * Template Name: Age 7 - 9 Page Template
 */
?>
<?php

set_query_var('logo', 'pink');
get_header();
?>

<?php require_once(TEMPLATE_PATH . '_desc.php'); ?>
<?php require_once(TEMPLATE_PATH . '_goals.php'); ?>
<?php require_once(TEMPLATE_PATH . '_cards.php'); ?>
<section class="desc desc-green">
    <div class="container container-sm">
        <div class="desc__body">
            <div class="row">
                <div class="col-md-8">
                    <div class="desc__main">
                        <h2 class="desc__title h3">обучение алфавиту и&nbsp;чтению</h2>
                        <div class="desc__text text-block-lg">
                            <p>Для обучения наших маленьких студентов алфавиту и базовым навыкам чтения, мы применяем методику, разработанную нашими высококвалифицированными академическими специалистами. В начале обучения, каждый ребенок бесплатно получает наше учебное пособие, которое помогает детям быстро освоить технику чтения.</p>
                        </div>
                        <div class="desc__logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/letter.png" alt="Буква">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="desc__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/textbook.jpg" class="cover-image" alt="Фото Учебник">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once(TEMPLATE_PATH . '_atmosphere.php'); ?>
<?php require_once(TEMPLATE_PATH . '_why.php'); ?>
<?php require_once(TEMPLATE_PATH . '_marazine.php'); ?>
<?php require_once(TEMPLATE_PATH . '_teachers.php'); ?>
<?php require_once(TEMPLATE_PATH . '_lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_sign-lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_holidays.php'); ?>
<?php require_once(TEMPLATE_PATH . '_license.php'); ?>
<?php require_once(TEMPLATE_PATH . '_info-block.php'); ?>
<?php require_once(TEMPLATE_PATH . '_regular.php'); ?>
<?php require_once(TEMPLATE_PATH . '_partner.php'); ?>
<?php require_once(TEMPLATE_PATH . '_banner.php'); ?>
<?php require_once(TEMPLATE_PATH . '_our-centres.php'); ?>
<?php require_once(TEMPLATE_PATH . '_prices-v2.php'); ?>
<?php require_once(TEMPLATE_PATH . '_reviews.php'); ?>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>

<?php get_footer(); ?>