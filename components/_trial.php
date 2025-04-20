<?php
$trial_title = get_field('trial_title') ?: "Запишитесь на бесплатный пробный урок";
$trial_subtitle = get_field('trial_subtitle') ?: "Наши администраторы ответят на все вопросы и подберут подходящую группу";
?>
<section class="trial">
    <div class="container">
        <div class="trial__body text-center">
            <h2 class="trial__title h3"><? echo esc_html($trial_title); ?></h2>
            <p class="trial__subtitle"><? echo esc_html($trial_subtitle); ?></p>
            <a href="#order" data-fancybox class="trial__btn btn btn-blue">оставить заявку</a>
        </div>
    </div>
</section>