<?php
$master_class = get_field('master_class');

?>
<?php if ($master_class): ?>
    <?php
    $title = $master_class['title'];
    $desc = $master_class['desc'];
    $image = $master_class['image'];
    $icon = $master_class['icon'];
    ?>
    <section class="desc desc-white">
        <div class="container">
            <div class="desc__body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="desc__main">
                            <?php if ($title): ?>
                                <h2 class="desc__title h3"><?= $title ?></h2>
                            <?php endif ?>
                            <?php if ($desc): ?>
                                <div class="desc__text text-block-lg">
                                    <?= $desc ?>
                                </div>
                            <?php endif ?>
                            <?php if ($icon): ?>
                                <div class="desc__logo">
                                    <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php if ($image): ?>
                            <div class="desc__image">
                                <img src="<?= $image['url'] ?>" class="cover-image" alt="<?= $image['alt'] ?>">
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>