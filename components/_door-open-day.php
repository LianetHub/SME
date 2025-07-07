<?php if (have_rows('door_open_day_dates')) :
?>
    <section class="door-open-day">
        <div class="container">
            <div class="door-open-day__header">
                <?php if (get_field('door_open_day_title')) : ?>
                    <h2 class="door-open-day__title title"><?php the_field('door_open_day_title'); ?></h2>
                <?php endif; ?>

                <div class="door-open-day__body">
                    <?php if (have_rows('door_open_day_dates')) : ?>
                        <ul class="door-open-day__list h6">
                            <?php while (have_rows('door_open_day_dates')) : the_row(); ?>
                                <li><?php the_sub_field('date_time_item'); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                    <?php
                    $decor_image = get_field('door_open_day_decor_image');
                    if ($decor_image) :
                    ?>
                        <div class="door-open-day__decor">
                            <img src="<?php echo esc_url($decor_image['url']); ?>" alt="<?php echo esc_attr($decor_image['alt']); ?>">
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="door-open-day__mission">
                <?php
                $mission_logo = get_field('door_open_day_mission_logo');
                if ($mission_logo) :
                ?>
                    <div class="door-open-day__mission-logo">
                        <img src="<?php echo esc_url($mission_logo['url']); ?>" alt="<?php echo esc_attr($mission_logo['alt']); ?>">
                    </div>
                <?php endif; ?>

                <?php
                $mission_desc_image = get_field('door_open_day_mission_desc_image');
                $mission_desc_image_mobile = get_field('door_open_day_mission_desc_image_mobile');

                if ($mission_desc_image || $mission_desc_image_mobile) :
                ?>
                    <picture class="door-open-day__mission-desc">
                        <?php if ($mission_desc_image) :
                        ?>
                            <source media="(min-width: 767.98px)" srcset="<?php echo esc_url($mission_desc_image['url']); ?>">
                        <?php endif; ?>

                        <?php
                        $default_image = $mission_desc_image_mobile ? $mission_desc_image_mobile : $mission_desc_image;
                        if ($default_image) :
                        ?>
                            <img src="<?php echo esc_url($default_image['url']); ?>" alt="<?php echo esc_attr($default_image['alt']); ?>">
                        <?php endif; ?>
                    </picture>
                <?php endif; ?>
            </div>

            <?php if (have_rows('door_open_day_benefits_columns')) : ?>
                <div class="door-open-day__benefits">
                    <div class="row">
                        <?php while (have_rows('door_open_day_benefits_columns')) : the_row(); ?>
                            <div class="col-lg-6">
                                <div class="door-open-day__benefit icon-check">
                                    <?php if (get_sub_field('column_caption')) : ?>
                                        <div class="door-open-day__benefit-caption"><?php the_sub_field('column_caption'); ?></div>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('column_title')) : ?>
                                        <div class="door-open-day__benefit-title h5">
                                            <?php the_sub_field('column_title'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (have_rows('column_list')) : ?>
                                        <ul class="door-open-day__benefit-list">
                                            <?php while (have_rows('column_list')) : the_row(); ?>
                                                <li class="door-open-day__benefit-item">
                                                    <?php
                                                    $item_icon = get_sub_field('item_icon');

                                                    ?>
                                                    <?php if ($item_icon) : ?>
                                                        <div class="door-open-day__benefit-icon">
                                                            <img src="<?php echo esc_url($item_icon['url']); ?>" alt="<?php echo esc_attr($item_icon['alt']); ?>">
                                                        </div>
                                                        <div><?php the_sub_field('item_text'); ?></div>
                                                    <?php else : ?>
                                                        <?php the_sub_field('item_text'); ?>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('column_hint')) : ?>
                                        <div class="door-open-day__benefit-hint"><?php the_sub_field('column_hint'); ?></div>
                                    <?php endif; ?>

                                    <?php
                                    $column_sticker = get_sub_field('column_sticker');
                                    if ($column_sticker) :
                                    ?>
                                        <div class="door-open-day__benefit-sticker">
                                            <img src="<?php echo esc_url($column_sticker['url']); ?>" alt="<?php echo esc_attr($column_sticker['alt']); ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>