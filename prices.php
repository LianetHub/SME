<?php

/**
 * Template Name: Prices Page Template
 */
?>
<?php

set_query_var('logo', 'pink');
get_header();
?>
<?php require_once(TEMPLATE_PATH . '_heading.php'); ?>
<?php require_once(TEMPLATE_PATH . '_prices.php'); ?>
<?php if (have_rows('promotions')): ?>
    <section class="promotions">
        <div class="container">
            <h2 class="promotions__title icon-sale text-center">
                Акции:
            </h2>
            <div class="promotions__body text-block-md">
                <ul>
                    <?php while (have_rows('promotions')): the_row(); ?>
                        <li>
                            <strong><?php the_sub_field('promotion_title'); ?></strong> <br>
                            <?php the_sub_field('promotion_description'); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php require_once(TEMPLATE_PATH . '_banner.php'); ?>
<?php require_once(TEMPLATE_PATH . '_license.php'); ?>
<?php require_once(TEMPLATE_PATH . '_reviews.php'); ?>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>

<?php get_footer(); ?>