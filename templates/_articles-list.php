<?php if (have_posts()) : ?>
    <ul class="articles__list">
        <?php while (have_posts()) : the_post(); ?>
            <?php include(locate_template('templates/_article-card.php')); ?>
        <?php endwhile; ?>
    </ul>

    <div class="articles__pagination pagination">
        <?php
        echo paginate_links(array(
            'prev_next' => false,
            'type'      => 'plain',
        ));
        ?>
    </div>
<?php endif; ?>