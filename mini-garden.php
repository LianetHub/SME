<?php

/**
 * Template Name: Mini-Garden Page Template
 */
?>
<?php

get_header();
?>

<?php require_once(TEMPLATE_PATH . '_heading.php'); ?>
<?php require_once(TEMPLATE_PATH . '_desc.php'); ?>
<?php require_once(TEMPLATE_PATH . '_results.php'); ?>
<?php require_once(TEMPLATE_PATH . '_daily.php'); ?>
<section class="banner banner-violet">
    <div class="container container-sm">
        <div class="banner__body row">
            <div class="col-md-2">
                <div class="banner__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/clock.svg" alt="Иконка">
                </div>
            </div>
            <div class="col-md-10">
                <h2 class="banner__title h3">
                    Детям - 4 часа развивающих занятий! <br>
                    Родителям - 4 часа свободного времени!
                </h2>
            </div>
        </div>
    </div>
</section>
<?php require_once(TEMPLATE_PATH . '_cards.php'); ?>
<?php require_once(TEMPLATE_PATH . '_atmosphere.php'); ?>
<?php require_once(TEMPLATE_PATH . '_why.php'); ?>
<?php require_once(TEMPLATE_PATH . '_master-class.php'); ?>
<?php require_once(TEMPLATE_PATH . '_teachers.php'); ?>
<?php require_once(TEMPLATE_PATH . '_lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_sign-lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_sections-block.php'); ?>
<?php require_once(TEMPLATE_PATH . '_license.php'); ?>
<?php require_once(TEMPLATE_PATH . '_banner.php'); ?>
<?php require_once(TEMPLATE_PATH . '_prices-v2.php'); ?>
<?php require_once(TEMPLATE_PATH . '_reviews.php'); ?>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>

<?php get_footer(); ?>