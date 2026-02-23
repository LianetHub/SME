<?php
set_query_var('header', '');
set_query_var('logo', 'pink');
get_header();
?>

<section class="articles">
    <div class="articles__header">
        <div class="container">
            <div class="articles__logo">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/CME-blog.svg' ?>" alt="Иконка">
            </div>
        </div>
    </div>
    <div class="articles__content">
        <div class="container">
            <?php if (function_exists('yoast_breadcrumb')) : ?>
                <nav class="articles__breadcrumbs breadcrumbs">
                    <?php yoast_breadcrumb(); ?>
                </nav>
            <?php endif; ?>

            <h1 class="articles__title h3 text-center"><?php single_cat_title(); ?></h1>

            <?php include(locate_template('templates/_articles-list.php')); ?>

            <section class="popular-categories">
                <h3 class="popular-categories__title">КАТЕГОРИИ</h3>
                <div class="popular-categories__list">
                    <?php
                    wp_list_categories(array(
                        'title_li' => '',
                        'style'    => 'none',
                        'separator' => '',
                        'class'    => 'popular-categories__link'
                    ));
                    ?>
                </div>
            </section>
        </div>
    </div>
</section>

<?php get_footer(); ?>