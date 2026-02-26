<?php
set_query_var('header', '');
set_query_var('logo', 'pink');
get_header();

$t_id = get_the_ID();
$t_name = get_the_title();
$t_thumb = get_the_post_thumbnail_url($t_id, 'large');
$t_desc = get_the_content();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$author_articles = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 9,
    'paged'          => $paged,
    'meta_query'     => [
        'relation' => 'OR',
        [
            'key'     => 'article_author',
            'value'   => $t_id,
            'compare' => '='
        ],
        [
            'key'     => 'article_author',
            'value'   => '"' . $t_id . '"',
            'compare' => 'LIKE'
        ]
    ]
]);
?>

<section class="teacher-page">
    <div class="teacher-page__wrapper">
        <div class="container">
            <?php if (function_exists('yoast_breadcrumb')) : ?>
                <nav class="teacher-page__breadcrumbs breadcrumbs">
                    <?php yoast_breadcrumb(); ?>
                </nav>
            <?php endif; ?>
        </div>
        <div class="teacher-page__content">
            <div class="container container-sm">
                <div class="teacher-page__photo">
                    <?php if ($t_thumb) : ?>
                        <img src="<?php echo esc_url($t_thumb); ?>" alt="<?php echo esc_attr($t_name); ?>">
                    <?php else : ?>
                        <div class="teacher-page__placeholder"><?php echo mb_substr($t_name, 0, 1, 'UTF-8'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="teacher-page__details">
                    <h1 class="teacher-page__title">
                        <span class="teacher-page__title-image">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/icons/CME-author.svg' ?>" alt="Иконка">
                        </span>
                        <?php echo esc_html($t_name); ?>
                    </h1>

                    <div class="teacher-page__meta">
                        <p>Язык: <?php the_field('language'); ?></p>
                        <p>
                            Стаж преподавания:
                            <?php
                            if (!function_exists('plural_years')) {
                                function plural_years($n)
                                {
                                    $n = abs($n) % 100;
                                    $n1 = $n % 10;
                                    if ($n > 10 && $n < 20) return 'лет';
                                    if ($n1 > 1 && $n1 < 5) return 'года';
                                    if ($n1 == 1) return 'год';
                                    return 'лет';
                                }
                            }
                            $experience_date = get_field('experience');

                            if ($experience_date) {

                                $start_year = (int) date('Y', strtotime($experience_date));
                                $current_year = (int) date('Y');
                                $years = max(0, $current_year - $start_year);

                                echo $years . ' ' . plural_years($years);
                            }
                            ?>
                        </p>

                    </div>

                    <div class="teacher-page__desc text-block">
                        <?php echo apply_filters('the_content', $t_desc); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if ($author_articles->have_posts()) : ?>
    <section class="teacher-articles">
        <div class="container">
            <div class="articles__content">
                <h2 class="articles__title h3 text-center">Статьи автора</h2>

                <ul class="articles__list">
                    <?php while ($author_articles->have_posts()) : $author_articles->the_post(); ?>
                        <?php include(locate_template('templates/_article-card.php')); ?>
                    <?php endwhile; ?>
                </ul>

                <div class="articles__pagination pagination">
                    <?php
                    echo paginate_links([
                        'total'     => $author_articles->max_num_pages,
                        'current'   => $paged,
                        'prev_next' => false,
                        'type'      => 'plain',
                    ]);
                    ?>
                </div>
                <?php wp_reset_postdata(); ?>

            </div>
        </div>
    </section>
<?php endif; ?>
<?php require_once(TEMPLATE_PATH . '_banner.php'); ?>
<div class="best-teachers">
    <div class="container container-sm">
        <h2 class="best-teachers__title text-center">
            Все наши авторы
        </h2>
        <div class="best-teachers__slider swiper">
            <ul class="swiper-wrapper">
                <?php
                global $wpdb;
                $author_ids = $wpdb->get_col("
                    SELECT DISTINCT meta_value 
                    FROM $wpdb->postmeta 
                    WHERE meta_key = 'article_author' 
                    AND meta_value != ''
                ");

                $clean_author_ids = [];
                foreach ($author_ids as $id_value) {
                    if (is_numeric($id_value)) {
                        $clean_author_ids[] = $id_value;
                    } else {
                        $unserialized = maybe_unserialize($id_value);
                        if (is_array($unserialized)) {
                            $clean_author_ids = array_merge($clean_author_ids, $unserialized);
                        }
                    }
                }
                $clean_author_ids = array_unique(array_filter($clean_author_ids));

                if (!empty($clean_author_ids)) {
                    $teachers = new WP_Query([
                        'post_type'      => 'teacher',
                        'posts_per_page' => -1,
                        'post__in'       => $clean_author_ids,
                        'orderby'        => 'post__in',
                        'order'          => 'ASC'
                    ]);

                    if ($teachers->have_posts()): ?>
                        <?php while ($teachers->have_posts()): $teachers->the_post(); ?>
                            <?php get_template_part('templates/_teacher'); ?>
                        <?php endwhile; ?>
                <?php endif;
                    wp_reset_postdata();
                }
                ?>
            </ul>
            <div class="best-teachers__pagination swiper-pagination"></div>
        </div>
    </div>
</div>

<section class="most-read">
    <div class="container">
        <h3 class="most-read__title text-center">САМОЕ ЧИТАЕМОЕ</h3>
        <div class="most-read__slider">
            <div class="swiper">
                <?php
                $popular_query = new WP_Query(array(
                    'post_type'      => 'post',
                    'posts_per_page' => 10,
                    'meta_key'       => 'post_views_count',
                    'orderby'        => 'meta_value_num',
                    'order'          => 'DESC'
                ));

                if ($popular_query->have_posts()) : ?>
                    <ul class="swiper-wrapper">
                        <?php
                        $is_slider = true;
                        while ($popular_query->have_posts()) : $popular_query->the_post();
                        ?>
                            <?php include(locate_template('templates/_article-card.php')); ?>
                        <?php endwhile;
                        $is_slider = false;
                        ?>
                    </ul>
                    <div class="most-read__pagination swiper-pagination"></div>
                <?php
                endif;
                wp_reset_postdata();
                ?>
            </div>
            <button type="button" class="most-read__slider-prev icon-prev-circle"></button>
            <button type="button" class="most-read__slider-next icon-next-circle"></button>
        </div>
    </div>
</section>
<?php get_footer(); ?>