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
        <div class="single-article" data-post-id="<?php echo get_the_ID(); ?>">
            <?php the_content(); ?>
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