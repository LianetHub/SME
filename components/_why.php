<?php
$why_cards = get_field('why_cards');
$why_title = get_field('why_title');

$tag = ($why_title) ? 'section' : 'div';
?>
<?php if ($why_cards) : ?>
    <<?= $tag ?> class="why">
        <div class="container">
            <?php if ($why_title) : ?>
                <h2 class="why__title h4 text-center"><?php echo $why_title; ?></h2>
            <?php endif; ?>
            <div class="why__body swiper">
                <div class="swiper-wrapper">
                    <? foreach ($why_cards as $key => $card) : ?>
                        <?
                        $title = $card['title'];
                        $desc = $card['desc'];
                        if ($key === 1 || $key === 3) {
                            $color = "orange";
                        } elseif ($key === 6) {
                            $color = "violet";
                        } else {
                            $color = "grey";
                        }
                        $image = $card['image'];
                        ?>
                        <div class="why__card swiper-slide <? echo $color ?> <? if ($key !== 0): ?> icon-plus-circle <?php endif; ?>">
                            <?php if ($key === 0) : ?>
                                <div class="why__card-logo">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/CME-language-centres.svg" alt="Логотип">
                                </div>
                            <?php endif; ?>
                            <?php if ($title) : ?>
                                <div class="why__card-title <?php if ($image): ?> h6 <? else: ?> h5 <? endif; ?>">
                                    <? echo $title ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($desc) : ?>
                                <div class="why__card-desc text-block">
                                    <? echo $desc ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($image) : ?>
                                <div class="why__card-background">
                                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    <? endforeach ?>
                </div>
                <span class="why__pagination swiper-pagination"></span>
            </div>
        </div>
    </<?= $tag ?>>
<?php endif; ?>