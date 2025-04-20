<?php

/**
 * Template Name:  Preparing for School Page Template
 */
?>
<?php
set_query_var('logo', 'pink');
get_header();
?>

<?php require_once(TEMPLATE_PATH . '_heading.php'); ?>
<?php require_once(TEMPLATE_PATH . '_desc.php'); ?>
<?php require_once(TEMPLATE_PATH . '_results.php'); ?>
<?php require_once(TEMPLATE_PATH . '_cards.php'); ?>
<?php require_once(TEMPLATE_PATH . '_atmosphere.php'); ?>
<?php require_once(TEMPLATE_PATH . '_why.php'); ?>
<?php require_once(TEMPLATE_PATH . '_teachers.php'); ?>
<?php require_once(TEMPLATE_PATH . '_lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_sign-lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_sections-block.php'); ?>
<?php require_once(TEMPLATE_PATH . '_license.php'); ?>
<?php require_once(TEMPLATE_PATH . '_banner.php'); ?>
<?php require_once(TEMPLATE_PATH . '_prices.php'); ?>
<?php require_once(TEMPLATE_PATH . '_reviews.php'); ?>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>

<?php get_footer(); ?>