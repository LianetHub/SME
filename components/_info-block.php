<?php
$info_block = get_field('info_block');
?>

<?php if ($info_block) : ?>
    <?php
    $title = $info_block['title'];
    $list = $info_block['list'];
    ?>
    <div class="info">
        <div class="container">
            <?php if ($title) : ?>
                <h2 class="info__title h3 text-center"><?= $title ?></h2>
            <?php endif ?>
            <?php if ($list) : ?>
                <div class="info__slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($list as $item) : ?>
                            <div class="info__card swiper-slide">
                                <div class="info__card-image">
                                    <img src="<?= $item['image']['url'] ?>" class="cover-image" alt="<?= $item['image']['alt'] ?>">
                                </div>
                                <div class="info__card-body">
                                    <div class="info__card-title h5"><?= $item['title'] ?></div>
                                    <div class="info__card-text">
                                        <?= $item['description'] ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="info__slider-pagination swiper-pagination"></div>
                </div>
            <?php endif ?>
        </div>
    </div>
<?php endif ?>