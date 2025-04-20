<?php
$exam_desc_title = get_field('exam_desc_title');
$exam_desc_body = get_field('exam_desc_body');
$exam_desc_image = get_field('exam_desc_image');
?>


<?php if ($exam_desc_title || $exam_desc_body || $exam_desc_image): ?>
    <section class="selection">
        <div class="container">
            <div class="selection__body">
                <div class="row">
                    <div class="col-xl-7 col-md-6">
                        <div class="selection__main">
                            <?php if ($exam_desc_title): ?>
                                <h2 class="selection__title h5">
                                    <?= $exam_desc_title ?>
                                </h2>
                            <?php endif ?>
                            <?php if ($exam_desc_body): ?>
                                <div class="selection__text text-block-md">
                                    <?= $exam_desc_body ?>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-6">
                        <?php if ($exam_desc_image): ?>
                            <div class="selection__image">
                                <img src="<?= $exam_desc_image["url"] ?>" class="cover-image" alt="<?= $exam_desc_image["alt"] ?>">
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>