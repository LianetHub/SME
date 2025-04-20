<?php
$sections_desc = get_field('sections_desc');
$sections_title = get_field('sections_title');
$sections_list = get_field('sections_list');
?>

<?php if ($sections_desc || $sections_title || $sections_list): ?>
    <section class="sections">
        <div class="container">
            <?php if ($sections_desc): ?>
                <p class="sections__desc text-block-md text-center"><?= $sections_desc ?></p>
            <?php endif ?>
            <?php if ($sections_title): ?>
                <?php
                $title_class = !$sections_desc ? 'h3' : 'h4';
                ?>
                <h2 class="sections__title text-center <?= $title_class ?>"><?= $sections_title ?></h2>
            <?php endif ?>
            <?php if ($sections_list): ?>
                <ul class="sections__list">
                    <?php
                    $caption_class = count($sections_list) < 5 ? 'h5' : 'h4';
                    ?>
                    <?php foreach ($sections_list as $item) : ?>
                        <?php
                        $icon = $item['icon'];
                        $title = $item['title'];
                        $desc = $item['desc'];
                        ?>
                        <li class="sections__item">
                            <?php if ($icon): ?>
                                <div class="sections__item-icon">
                                    <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                                </div>
                            <?php endif ?>
                            <?php if ($title): ?>
                                <div class="sections__item-caption <?= $caption_class ?>"><?= $title ?></div>
                            <?php endif ?>
                            <?php if ($desc): ?>
                                <div class="sections__item-desc text-block-md">
                                    <?= $desc ?>
                                </div>
                            <?php endif ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif ?>
        </div>
    </section>
<?php endif ?>