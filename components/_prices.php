<?php
$prices_blocks = get_field('prices_blocks');
$prices_title = get_field('prices_title');

$tag = ($prices_title) ? 'section' : 'div';

function render_prices_slider($title, $title_size, $data)
{
    if (!isset($data['prices_list']) || !is_array($data['prices_list'])) {
        return '';
    }

    $lessons = $data['prices_list'];

    $column_titles = [];
    if (!empty($lessons[0]['columns'])) {
        foreach ($lessons[0]['columns'] as $index => $col) {
            $column_titles[$index] = $col['col_title'];
        }
    }

    ob_start();
?>
    <div class="prices__block">
        <?php if ($title): ?>
            <h3 class="prices__caption <?= $title_size ?>"><?= $title ?></h3>
        <?php endif; ?>
        <div class="prices__slider swiper">
            <div class="swiper-wrapper">

                <div class="prices__slide swiper-slide">
                    <div class="prices__table-row">
                        Продолжительность <br> занятия
                    </div>
                    <?php foreach ($lessons as $lesson): ?>
                        <div class="prices__table-row"><?= esc_html($lesson['time']) ?></div>
                    <?php endforeach; ?>
                </div>

                <?php foreach ($column_titles as $i => $col_title): ?>
                    <div class="prices__slide swiper-slide">
                        <div class="prices__table-row"><?= $col_title ?></div>
                        <?php foreach ($lessons as $lesson): ?>
                            <div class="prices__table-row">
                                <?
                                $col_price = $lesson['columns'][$i]['col_value'];
                                $col_price_sale = $lesson['columns'][$i]['col_value_sale'];
                                ?>
                                <?php if ($col_price_sale): ?>
                                    <span class="prices__table-price-old"><?= $col_price ?></span>
                                    <span class="prices__table-price-current"><?= $col_price_sale ?>р.</span>
                                <?php else: ?>
                                    <span class="prices__table-price-current"><?= $col_price ?>р.</span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="prices__slider-pagination swiper-pagination"></div>
        </div>
    </div>
<?php
    return ob_get_clean();
}
?>

<<?= $tag ?> class="prices">
    <div class="container">
        <?php if ($prices_title): ?>
            <div class="prices__header">
                <h2 class="prices__title h3 text-center"><?= $prices_title ?></h2>
            </div>
        <?php endif ?>
        <div class="prices__body">
            <?php
            if (!empty($prices_blocks) && is_array($prices_blocks)) {
                foreach ($prices_blocks as $block) {
                    echo render_prices_slider($block['title'], $block['title_size'], $block);
                }
            }
            ?>
        </div>
    </div>
</<?= $tag ?>>