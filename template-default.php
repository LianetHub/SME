<?php
/**
 * Template Name: Страница по умолчанию
 */
get_header(); ?>

<main class="default-page">
  <div class="container">
    <h1><?php the_title(); ?></h1>
    <div class="content">
      <?php the_content(); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
