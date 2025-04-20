<?php
$our_centres_title = get_field('our_centres_title');
$our_centres_desc = get_field('our_centres_desc');
$our_centres_has_link = get_field('our_centres_has_link');
$our_centres_youtube_link = get_field('our_centres_youtube_link');
?>

<?php if ($our_centres_title || $our_centres_desc || $our_centres_youtube_link): ?>
    <section class="our-centres our-centres_white">
        <div class="container">
            <div class="our-centres__body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="our-centres__icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/cam.svg" alt="Иконка">
                        </div>
                        <?php if ($our_centres_title): ?>
                            <div class="our-centres__header">
                                <h2 class="our-centres__title h4"><?= $our_centres_title ?></h2>
                            </div>
                        <?php endif ?>
                        <?php if ($our_centres_desc): ?>
                            <div class="our-centres__text text-block-md">
                                <?= $our_centres_desc ?>
                            </div>
                        <?php endif ?>
                        <?php if ($our_centres_has_link): ?>
                            <a href="/about" class="our-centres__btn btn btn-secondary btn-md">подробнее о нас</a>
                        <?php endif ?>
                    </div>
                    <div class="col-xl-6">
                        <div class="our-centres__video icon-camera">
                            <iframe width="560" height="315" src="<?= esc_url($our_centres_youtube_link) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>