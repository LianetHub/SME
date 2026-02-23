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
            <h1 class="articles__title h3 text-center">Рассказываем про английский</h1>

            <?php if (have_posts()) : ?>
                <ul class="articles__list">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php include(locate_template('templates/_article-card.php')); ?>
                    <?php endwhile; ?>
                </ul>

                <div class="articles__pagination pagination">
                    <?php
                    echo paginate_links(array(
                        'prev_next' => false,
                        'type'      => 'plain',
                    ));
                    ?>
                </div>
            <?php endif; ?>

            <section class="popular-tags">
                <h3 class="popular-tags__title text-center">ПОПУЛЯРНЫЕ ТЕГИ</h3>
                <div class="popular-tags__cloud">
                    <?php wp_tag_cloud(array('smallest' => 14, 'largest' => 14, 'unit' => 'px', 'number' => 15)); ?>
                </div>
            </section>

            <section class="most-read">
                <h3 class="most-read__title text-center">САМОЕ ЧИТАЕМОЕ</h3>
                <div class="most-read__slider">
                    <?php
                    $popular_query = new WP_Query(array(
                        'posts_per_page' => 3,
                        'meta_key'       => 'post_views_count',
                        'orderby'        => 'meta_value_num',
                        'order'          => 'DESC'
                    ));

                    if ($popular_query->have_posts()) : ?>
                        <ul class="articles__list">
                            <?php while ($popular_query->have_posts()) : $popular_query->the_post(); ?>
                                <?php include(locate_template('templates/_article-card.php')); ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </section>
        </div>
    </div>
</section>

<?php get_footer(); ?>