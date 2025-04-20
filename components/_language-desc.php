<?php
$image = get_field('language-desc_image');
$title = get_field('language-desc_title');
$list = get_field('language-desc_list');
$text = get_field('language-desc_text');
?>
<?php if ($image || $title || $list) : ?>
    <section class="language-desc">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="language-desc__image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                </div>
                <div class="col-xl-5 col-md-6">
                    <div class="language-desc__main">
                        <?php if ($title) : ?>
                            <h2 class="language-desc__title h5 text-center-mobile">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/handshake.svg" alt="Иконка">
                                <?php echo esc_html($title); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if ($list) : ?>
                            <ul class="language-desc__list text-block-md">
                                <?php foreach ($list as $item) : ?>
                                    <li><?php echo esc_html($item['item']); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if ($text) : ?>
                            <p class="language-desc__text text-block-md">
                                <?php echo esc_html($text); ?>
                            </p>
                        <?php endif; ?>
                        <div class="language-desc__icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/handshake.svg" alt="Иконка">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>