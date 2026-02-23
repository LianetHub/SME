<li class="article-card">
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
                    <span class="article-card__categories">
                        <?php foreach ($filtered_categories as $category) : ?>
                            <span class="article-card__category">
                                <?php echo esc_html($category->name); ?>
                            </span>
                        <?php endforeach; ?>
                    </span>
                <?php endif; ?>
                <span class="article-card__views icon-eye">
                    <?php echo cme_get_post_views(get_the_ID()); ?> просмотров
                </span>
            </span>
            <span class="article-card__title h6"><?php the_title(); ?></span>
            <span class="article-card__excerpt">
                <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
            </span>
        </span>
    </a>
</li>