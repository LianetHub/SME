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
<?php require_once(TEMPLATE_PATH . '_about.php'); ?>
<?php require_once(TEMPLATE_PATH . '_sign-lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_best-teachers.php'); ?>
<?php require_once(TEMPLATE_PATH . '_cert.php'); ?>
<?php require_once(TEMPLATE_PATH . '_reviews.php'); ?>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>

<?php get_footer(); ?>