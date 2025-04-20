<?php
$goals_title = get_field('goals_title');
$goals_list = get_field('goals_list');

?>
<?php if ($goals_title || $goals_list) : ?>
    <section class="goals">
        <div class="container">
            <?php if ($goals_title) : ?>
                <h2 class="goals__title h3"><?= $goals_title ?></h2>
            <?php endif; ?>
            <?php if ($goals_list) : ?>
                <div class="goals__slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($goals_list as $item) : ?>
                            <?
                            $icon = $item['icon'];
                            $title = $item['title'];
                            $desc = $item['desc'];

                            ?>
                            <div class="goals__slide swiper-slide">
                                <div class="goals__slide-icon">
                                    <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                                </div>
                                <h4 class="goals__slide-title h5"><?= $title ?></h4>
                                <div class="goals__slide-desc text-block-md">
                                    <?= $desc ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="goals__pagination swiper-pagination"></div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>