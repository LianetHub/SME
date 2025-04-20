<section class="benefits">
    <div class="container">
        <h2 class="benefits__title h3 text-center"><?php the_field('benefits_title'); ?></h2>
        <?php if (have_rows('benefits_items')) : ?>
            <div class="benefits__content">
                <div class="row">
                    <?php while (have_rows('benefits_items')) : the_row();
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                    ?>
                        <div class="col-6">
                            <div class="benefits__item">
                                <?php if ($icon) : ?>
                                    <div class="benefits__icon">
                                        <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="benefits__body">
                                    <?php if ($title) : ?>
                                        <h3 class="benefits__caption h5"><?php echo esc_html($title); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($description) : ?>
                                        <div class="benefits__desc text-block-md"><?php echo $description ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>