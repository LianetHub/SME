<?php

$title = get_field('heading_title');
$logo = get_field('heading_logo');
$subtitle = get_field('heading_subtitle');
$subtitle_size = get_field('heading_subtitle_size');

if ($title || $logo || $subtitle): ?>
    <section class="heading">
        <div class="container">
            <div class="heading__body text-center">
                <?php if ($title): ?>
                    <h2 class="heading__title h3"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if ($logo): ?>
                    <div class="heading__logo">
                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                    </div>
                <?php endif; ?>

                <?php if ($subtitle): ?>
                    <div class="heading__subtitle <?= esc_attr($subtitle_size); ?>">
                        <?php echo $subtitle ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>