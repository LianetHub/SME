<li class="article-card <?php echo isset($is_slider) && $is_slider ? 'swiper-slide' : ''; ?>">
    <a href="<?php the_permalink(); ?>" class="article-card__content">
        <span class="article-card__thumbnail">
            <?php
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
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
        </span>

        <span class="article-card__body">
            <span class="article-card__meta">
                <?php
                $categories = get_the_category();

                $filtered_categories = array_filter($categories, function ($cat) {
                    return $cat->slug !== 'uncategorized' && $cat->term_id !== 1;
                });

                if (!empty($filtered_categories)) : ?>
                    <?php foreach ($filtered_categories as $category) : ?>
                        <span class="article-card__category">
                            <?php echo esc_html($category->name); ?>
                        </span>
                    <?php endforeach; ?>
                <?php endif; ?>
                <span class="article-card__views icon-eye">
                    <?php
                    $views_count = (int)cme_get_post_views(get_the_ID());
                    echo cme_pluralize($views_count, ['просмотр', 'просмотра', 'просмотров']);
                    ?>
                </span>
            </span>
            <span class="article-card__title h6"><?php the_title(); ?></span>

            <?php if (!isset($is_slider) || !$is_slider) : ?>
                <span class="article-card__excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 19); ?>
                </span>
            <?php endif; ?>
        </span>
    </a>
</li>