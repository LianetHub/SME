<?php

/**
 * Template Name: Center Page Template
 */
?>
<?php
$current_page = get_queried_object();
$extension_text = 'доб. 4';
set_query_var('logo', 'pink');
if (is_page('Центр на Институтской')) {
    $extension_text = 'доб. 3';
} elseif (is_page('Центр на Кадомцева')) {
    $extension_text = 'доб. 2';
    set_query_var('header', 'white');
} elseif (is_page('Центр на Борисовке')) {
    $extension_text = 'доб. 1';
    set_query_var('header', 'white');;
}
get_header();
?>
<?php require_once(TEMPLATE_PATH . '_location.php'); ?>
<?php if (is_page('Наши центры')) : ?>
<?php require_once(TEMPLATE_PATH . '_centres.php'); ?>
<?php endif; ?>
<?php require_once(TEMPLATE_PATH . '_contacts.php'); ?>
<?php get_footer(); ?>