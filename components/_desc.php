<?php if ($desc_section = get_field('desc_section')) : ?>
    <section class="desc">
        <div class="container">
            <div class="desc__body">
                <div class="row">
                    <?php $image_order = $desc_section['image_order'] === 'order-first' ? 'order-first col-md-4' : esc_attr($desc_section['photo_size']); ?>

                    <?php if ($desc_section['image_order'] === 'order-first') : ?>
                        <div class="<?php echo $image_order; ?>">
                            <div class="desc__image">
                                <?php if ($desc_section['photo']): ?>
                                    <img src="<?php echo esc_url($desc_section['photo']['url']); ?>" class="cover-image" alt="<?php echo esc_attr($desc_section['photo']['alt'] ?: 'Фото'); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="<?php echo $desc_section['image_order'] === 'order-first' ? 'col-md-7 offset-md-1' : (esc_attr($desc_section['photo_size']) === 'col-md-6' ? 'col-md-6' : 'col-md-7'); ?>">
                        <div class="desc__main <?php echo $desc_section['image_order'] === 'order-first' ? 'text-center' : ''; ?>">
                            <?php if ($desc_section['title']): ?>
                                <h2 class="desc__title <?php echo esc_attr($desc_section['title_size']); ?>">
                                    <?php echo $desc_section['title'] ?>
                                </h2>
                            <?php endif; ?>

                            <?php if ($desc_section['subtitle']): ?>
                                <p class="desc__tagline h5 text-center">
                                    <?php echo $desc_section['subtitle'] ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($desc_section['text']): ?>
                                <div class="desc__text text-block">
                                    <?php echo $desc_section['text']; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($desc_section['image_order'] !== 'order-first' && $desc_section['has_icon_logo']) : ?>
                                <div class="desc__logo">
                                    <?php
                                    $logo_name = is_page_template('lets-develop-it.php') ? 'CME-for-kids.svg' : 'CME-language-centres.png';
                                    ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/<?php echo $logo_name; ?>" alt="Логотип">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if ($desc_section['image_order'] !== 'order-first') : ?>
                        <div class="<?php echo $image_order; ?>">
                            <div class="desc__image">
                                <?php if ($desc_section['photo']): ?>
                                    <img src="<?php echo esc_url($desc_section['photo']['url']); ?>" class="cover-image" alt="<?php echo esc_attr($desc_section['photo']['alt'] ?: 'Фото'); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>