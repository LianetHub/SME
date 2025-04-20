<?php
$location_title = get_field('location_title') ?? 'выберите удобный вам Центр CME:';
?>
<section class="location">
    <div class="container">
        <h1 class="location__title"><?= esc_html($location_title); ?></h1>
        <div class="location__btns">
            <a href="/centres#mytishi" class="location__btn btn btn-lg btn-secondary">Центры в Мытищах</a>
            <a href="/centres#balashiha" class="location__btn btn btn-lg btn-primary">Центры в Балашихе</a>
        </div>
    </div>
</section>