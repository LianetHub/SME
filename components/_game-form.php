<?php
$game_form = get_field('game_form');

?>
<?php if ($game_form): ?>
    <?php
    $title = $game_form['title'];
    $list = $game_form['list'];
    ?>
    <section class="game-form">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-md-8">
                    <?php if ($title): ?>
                        <h2 class="game-form__title h3"><?= $title ?></h2>
                    <?php endif ?>
                    <?php if ($list): ?>
                        <ul class="game-form__list text-block-md">
                            <?php foreach ($list as $list_item) : ?>
                                <li><?= $list_item['item'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif ?>
                </div>
                <div class="col-md-4 offset-xl-1">
                    <div class="game-form__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/game-form-lamp.svg" alt="иконка">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>