<?php
set_query_var('header', '');
set_query_var('logo', 'pink');
get_header();

$raw_content = get_the_content();
$data = cme_content_with_toc(apply_filters('the_content', $raw_content));
$content = $data['content'];
$toc_list = $data['toc'];

$teacher_id = get_field('article_author');
$for_whom_list = get_field('for_whom');
?>
<section class="article">
    <div class="article__header">
        <div class="container">
            <?php if (function_exists('yoast_breadcrumb')) : ?>
                <nav class="article__breadcrumbs breadcrumbs">
                    <?php yoast_breadcrumb(); ?>
                </nav>
            <?php endif; ?>
            <div class="article__header-content">
                <div class="row">
                    <div class="col-xl-5">
                        <h1 class="article__title h3"><?php echo get_the_title() ?></h1>
                        <div class="article__meta">
                            <?php
                            $categories = get_the_category();
                            $filtered_categories = array_filter($categories, function ($cat) {
                                return $cat->slug !== 'uncategorized' && $cat->term_id !== 1;
                            });

                            if (!empty($filtered_categories)) : ?>
                                <?php foreach ($filtered_categories as $category) : ?>
                                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="article__category">
                                        <?php echo esc_html($category->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <span class="article__views icon-eye">
                                <?php
                                $views_count = (int)cme_get_post_views(get_the_ID());
                                echo cme_pluralize($views_count, ['просмотр', 'просмотра', 'просмотров']);
                                ?>
                            </span>
                        </div>
                        <p class="article__excerpt"><?php echo get_the_excerpt() ?></p>
                    </div>
                    <div class="col-xl-7">
                        <div class="article__poster">
                            <?php
                            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            ?>

                            <?php if ($thumbnail_url) : ?>
                                <img src="<?php echo esc_url($thumbnail_url); ?>"
                                    alt="<?php the_title_attribute(); ?>"
                                    class="cover-image">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.svg"
                                    alt="<?php the_title_attribute(); ?>"
                                    class="">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="article__content">
        <div class="container">
            <div class="article__details">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="article__details-column">
                            <div class="article__details-caption h5">Содержание</div>
                            <ul class="article__toc" id="toc">
                                <?php if ($toc_list) : ?>
                                    <?php echo $toc_list; ?>
                                <?php else : ?>
                                    <li class="article__toc-item">Содержание пусто</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="article__details-column">
                            <div class="article__details-caption h5">Для кого эта статья</div>
                            <ul class="article__details-list">
                                <?php if ($for_whom_list) : ?>
                                    <?php if (is_array($for_whom_list)) : ?>
                                        <?php foreach ($for_whom_list as $item) : ?>
                                            <li class="article__details-item">
                                                <?php echo esc_html($item['text'] ?? $item); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <li class="article__details-item">
                                            <?php echo esc_html($for_whom_list); ?>
                                        </li>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <li class="article__details-item">Для всех интересующихся</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="article__body single-article typography-block" data-post-id="<?php echo get_the_ID(); ?>">
                <?php echo $content; ?>
            </div>

            <?php
            if ($teacher_id) :
                if (is_array($teacher_id)) {
                    $teacher_id = $teacher_id[0];
                }

                $t_name = get_the_title($teacher_id);
                $t_thumb = get_the_post_thumbnail_url($teacher_id, 'thumbnail');
                $t_link = get_permalink($teacher_id);

                $first_letter = mb_substr($t_name, 0, 1, 'UTF-8');

                $exp_date = get_field('experience', $teacher_id);
                $emp_date = get_field('employment_date', $teacher_id);

                $exp_year = '';
                if ($exp_date) {
                    $date_obj = DateTime::createFromFormat('d/m/Y', $exp_date);
                    if ($date_obj) {
                        $exp_year = $date_obj->format('Y');
                    }
                }

                $emp_year = '';
                if ($emp_date) {
                    $date_obj = DateTime::createFromFormat('d/m/Y', $emp_date);
                    if ($date_obj) {
                        $emp_year = $date_obj->format('Y');
                    }
                }
            ?>
                <a href="<?php echo esc_url($t_link); ?>" class="article__author">
                    <span class="article__author-thumb">
                        <?php if ($t_thumb) : ?>
                            <img src="<?php echo esc_url($t_thumb); ?>"
                                alt="<?php echo esc_attr($t_name); ?>"
                                class="cover-image">
                        <?php else : ?>
                            <span><?php echo esc_html($first_letter); ?></span>
                        <?php endif; ?>
                    </span>
                    <span class="article__author-info">
                        <span class="article__author-name">Автор <?php echo esc_html($t_name); ?></span>
                        <span class="article__author-details">
                            <?php if ($emp_year) : ?>
                                Педагог СME с <?php echo $emp_year; ?>г.
                            <?php endif; ?>
                            <?php if ($exp_year) : ?>
                                Стаж преподавания: с <?php echo $exp_year; ?> года
                            <?php endif; ?>
                        </span>
                    </span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const article = document.querySelector('.single-article');

        if (article) {
            const postId = article.dataset.postId;
            const viewStorageKey = 'article_viewed_' + postId;
            const now = Date.now();
            const dayInMs = 24 * 60 * 60 * 1000;
            const lastView = localStorage.getItem(viewStorageKey);

            if (!lastView || (now - lastView) > dayInMs) {
                const params = new URLSearchParams();
                params.append('action', 'cme_increment_views');
                params.append('post_id', postId);

                fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                        method: 'POST',
                        header: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: params
                    })
                    .then(response => response.json())
                    .then(res => {
                        if (res.success) {
                            localStorage.setItem(viewStorageKey, now);
                        }
                    })
                    .catch(err => console.warn('Fetch error:', err));
            }
        }
    });
</script>

<?php get_footer(); ?>