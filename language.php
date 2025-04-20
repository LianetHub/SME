<?php

/**
 * Template Name: Language Page Template
 */
?>
<?php
set_query_var('logo', 'pink');
get_header();
?>

<?php require_once(TEMPLATE_PATH . '_desc.php'); ?>
<?php require_once(TEMPLATE_PATH . '_cards.php'); ?>
<?php require_once(TEMPLATE_PATH . '_why.php'); ?>
<?php require_once(TEMPLATE_PATH . '_language-desc.php'); ?>
<?php require_once(TEMPLATE_PATH . '_benefits.php'); ?>
<?php require_once(TEMPLATE_PATH . '_teachers.php'); ?>
<?php require_once(TEMPLATE_PATH . '_sign-lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_prices.php'); ?>
<?php require_once(TEMPLATE_PATH . '_reviews.php'); ?>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>

<?php get_footer(); ?>
