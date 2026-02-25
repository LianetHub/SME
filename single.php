<?php
set_query_var('header', '');
set_query_var('logo', 'pink');
get_header();
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
                    <div class="col-md-5">
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
                    <div class="col-md-7">
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
            <div class="single-article" data-post-id="<?php echo get_the_ID(); ?>">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<script>
    $(function() {

        const $article = $('.single-article');

        if ($article.length) {
            const postId = $article.data('post-id');
            const viewStorageKey = 'article_viewed_' + postId;
            const now = Date.now();
            const dayInMs = 24 * 60 * 60 * 1000;

            const lastView = localStorage.getItem(viewStorageKey);

            if (!lastView || (now - lastView) > dayInMs) {
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'POST',
                    data: {
                        action: 'cme_increment_views',
                        post_id: postId
                    },
                    success: function(res) {
                        if (res.success) {
                            localStorage.setItem(viewStorageKey, now);
                        }
                    }
                });
            }
        }
    });
</script>

<?php get_footer(); ?>