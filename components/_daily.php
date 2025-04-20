<?php
$daily = get_field('daily');

?>
<?php if ($daily): ?>
    <?php
    $list = $daily['list'];
    ?>
    <section class="daily-routine">
        <div class="container">
            <h2 class="daily-routine__title h3">
                распорядок дня:
            </h2>
            <div class="daily-routine__body">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="daily-routine__items swiper">
                            <ul class="swiper-wrapper">
                                <?php foreach ($list as $list_item) : ?>
                                    <?php
                                    $time = $list_item['time'];
                                    $desc = $list_item['desc'];
                                    ?>
                                    <li class="daily-routine__item swiper-slide">
                                        <div class="daily-routine__item-time h6">
                                            <?= $time  ?>
                                        </div>
                                        <div class="daily-routine__item-desc text-block-md">
                                            <?= $desc  ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="daily-routine__pagination swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 pc-only">
                        <div class="daily-routine__image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/daily.svg" alt="Иконка календаря">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>