<?php
$results_blocks = get_field('results_blocks');
?>
<?php if ($results_blocks): ?>

    <?php foreach ($results_blocks as $key => $item) : ?>
        <?php
        $title = $item['title'];
        $list = $item['list'];
        $body_color = $key % 2 !== 0 ? 'blue' : '';
        ?>
        <section class="results">
            <div class="container">
                <?php if ($title): ?>
                    <h2 class="results__title h3"><?= $title ?></h2>
                <?php endif ?>
                <?php if ($list): ?>
                    <div class="results__body <?= $body_color  ?>">
                        <div class="row">
                            <?php foreach ($list as $list_item) : ?>
                                <?php
                                $list_item_icon = $list_item['icon'];
                                $list_item_title = $list_item['title'];
                                $list_item_desc = $list_item['desc'];
                                ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="results__item">
                                        <?php if ($list_item_icon): ?>
                                            <div class="results__item-icon">
                                                <img src="<?= $list_item_icon['url'] ?>" alt="<?= $list_item_icon['alt'] ?>">
                                            </div>
                                        <?php endif ?>
                                        <?php if ($list_item_title): ?>
                                            <div class="results__item-caption h5"><?= $list_item_title ?></div>
                                        <?php endif ?>
                                        <?php if ($list_item_desc): ?>
                                            <div class="results__item-desc text-block-md">
                                                <?= $list_item_desc ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </section>

    <?php endforeach; ?>

<?php endif ?>