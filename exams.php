<?php

/**
 * Template Name: Exams Page Template
 */
?>
<?php
set_query_var('logo', 'pink');
get_header();
?>
<?php require_once(TEMPLATE_PATH . '_desc.php'); ?>
<section class="popular">
    <div class="popular__header">
        <div class="container">
            <h2 class="popular__title text-center h4">наиболее популярные и востребованные международные сертификаты:</h2>
            <div class="popular__slider swiper">
                <div class="swiper-wrapper">
                    <a href="#tofel" class="popular__item swiper-slide">
                        <span class="popular__item-name orange">TOEFL</span>
                        <span class="popular__item-title h4">TOEFL</span>
                        <span class="popular__item-info fw-bold h6">Test of English as <br> a Foreign Language</span>
                        <span class="popular__item-desc text-block-md">
                            Этот сертификат необходим для поступления в учебные заведения, работы или иммиграции в страны Северной Америки (США и Канада). <br> Срок действия – 2 года.
                        </span>
                    </a>
                    <a href="#ielts" class="popular__item  swiper-slide">
                        <span class="popular__item-name pink">IELTS</span>
                        <span class="popular__item-title h4">IELTS</span>
                        <span class="popular__item-info fw-bold h6">International English Language Testing System</span>
                        <span class="popular__item-desc text-block-md">
                            Международная система тестирования по английскому языку. Самый восстребованный тест в мире, определяющий уровень и навыки владения английским языком у людей, для которых он не является родным. Срок действия – 2 года.
                        </span>
                    </a>
                    <a href="#b2-first" class="popular__item swiper-slide">
                        <span class="popular__item-name blue">B2 first</span>
                        <span class="popular__item-title h4">B2 first</span>
                        <span class="popular__item-info fw-bold h6">до 2018г. – FCE First&nbsp;Certificate in English</span>
                        <span class="popular__item-desc text-block-md">
                            Этот сертификат необходим для поступления в учебные заведения, работы или иммиграции в страны Северной Америки (США и Канада). <br> Срок действия – 2 года.
                        </span>
                    </a>
                </div>
                <div class="popular__slider-pagination swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="popular__blocks">
        <div id="tofel" class="popular__block">
            <div class="container">
                <h3 class="popular__block-title h1 text-center">TOEFL</h3>
                <div class="popular__block-body text-block-md">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="popular__block-caption h5">Зачем сдавать экзамен TOEFL:</div>
                            <div class="popular__block-desc">
                                <ul>
                                    <li>Сдача этого экзамена необходима для иностранцев при поступлении в вузы США и Канады, устройства на работу и иммиграции</li>
                                    <li>Результаты теста также могут быть востребованы при рекрутинге в зарубежные компании. Результаты теста хранятся в базе данных компании 2 года, после чего удаляются.</li>
                                </ul>
                                <p>Программа подготовки к TOEFL в CME основана на новейших экзаменационных материалах и учебных пособиях. На занятиях готовимся к каждому разделу экзамена, в зависимости от выбранной версии экзамена. На уроках преподаватель объяснит формат и специфику экзамена, и обратит внимание на самые частые ошибки.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="popular__block-caption h6 fw-bold">Тест TOEFL home edition можно сдать он-лайн, что является самым удобным способом сдать международный экзамен в россии в настоящее время.</div>
                            <div class="popular__block-desc">
                                <p>Экзамен TOEFL iBT (internet-based test) состоит из 4 разделов:</p>
                                <ul>
                                    <li>Reading Comprehension (чтение) — умение понимать прочитанную литературу, часто академического характера.</li>
                                    <li>Listening Comprehension (аудирование) — способность воспринимать английскую речь с североамериканским акцентом на слух.</li>
                                    <li>Writing (письмо) - умение грамотно писать на английском языке.</li>
                                    <li>Speaking (говорение) - оценка разговорных навыков.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popular__block-footer h6 text-center">Результат теста действителен в течение двух лет с момента получения.</div>
            </div>
        </div>
        <div id="ielts" class="popular__block">
            <div class="container">
                <h3 class="popular__block-title h1 text-center">IELTS</h3>
                <div class="popular__block-body text-block-md">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="popular__block-caption h5">Зачем сдавать экзамен IELTS:</div>
                            <div class="popular__block-desc">
                                <ul>
                                    <li>Сертификат IELTS необходим для поступления в школы и высшие учебные организации, в которых обучение ведется на английском языке во многих странах мира</li>
                                    <li>Необходим для иммиграции в Канаду, Австралию и Новую Зеландию.</li>
                                    <li>Сертификат необходим при получении рабочей визы, а также в других целях, связанных с обучением, проживанием или работой в англоязычном обществе.</li>
                                    <li>Большинство компаний в мире признают сертификат IELTS</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="popular__block-caption h5">Экзамен IELTS состоит из 4 частей:</div>
                            <div class="popular__block-desc">
                                <ul>
                                    <li>Listening - навыки восприятия английского языка на слух</li>
                                    <li>Reading - навыки чтения</li>
                                    <li>Writing - навыки письменного английского</li>
                                    <li>Speaking - навыки разговорного английского</li>
                                </ul>
                                <p>Курс подготовки к IELTS в CME содержит необходимую информацию об экзамене и предусматривает развитие ключевых языковых навыков. Вы сможете пройти тренировку выполнения экзаменационных упражнений и узнать типичные ошибки, совершаемые на экзамене. Процесс обучения контролируется преподавателем с помощью системы тестов.</p>
                                <p>Курс также включает в себя последовательное освоение двух ключевых навыков – Writing и Speaking. Именно эти разделы экзамена как правило вызывают основные затруднения у экзаменующихся. По окончанию обучения студенты сдают пробный экзамен IELTS, и затем преподаватель подробно объясняет имеющиеся ошибки.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popular__block-footer h6 text-center">Результат теста действителен в течение двух лет с момента получения.</div>
            </div>
        </div>
        <div id="b2-first" class="popular__block">
            <div class="container">
                <h3 class="popular__block-title h1 text-center">В2 first (FCE)</h3>
                <div class="popular__block-body text-block-md">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="popular__block-caption h5">Зачем сдавать экзамен В2 first:</div>
                            <div class="popular__block-desc">
                                <ul>
                                    <li>Во многих учебных заведениях сдача FCE является одним из условий поступления.</li>
                                    <li>Наличие этого сертификата означает способность работать с англоязычной документацией и использовать английский в любой области, где необходимо контактировать с англо-говорящими коллегами.</li>
                                    <li>Сертификат B2 First (FCE) бессрочен и не требует пересдачи.</li>
                                </ul>
                                <p>Наша программа подготовки к экзамену FCE дает языковые навыки, позволяющие свободно общаться на английском языке во множестве ситуаций реального общения.</p>
                                <p>На уроках студенты готовятся ко всем 4 разделам экзамена: развивают навыки чтения, говорения, аудирования, письма, и конечно расширяют словарный запас.</p>
                                <p>Для контроля полученных знаний в процессе обучения проводятся тестирования, позволяющие определить степень готовности к сдаче экзамена.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="popular__block-caption h5">Экзамен IELTS состоит из 4 частей:</div>
                            <div class="popular__block-desc">
                                <ul>
                                    <li>Reading and Use of English (Чтение и грамматика) - умение понимать английские тексты, знания грамматики и лексики</li>
                                    <li>Writing (Письменная часть) - умение грамотно писать на английском языке (эссе и письмо)</li>
                                    <li>Listening (аудирование) - способность воспринимать английскую речь на слух.</li>
                                    <li>Speaking (говорение) - оценка разговорных навыков.</li>
                                </ul>
                                <p>Форматы B2 First (FCE): традиционный с письменным выполнением заданий и компьютерный.</p>
                                <h6>Сертификат b2 first является подтверждением, что вы можете использовать разговорный и письменный английский в повседневной жизни, на учебе или работе на уровне upper-intermediate (b2).</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popular__block-footer h6 text-center">Результат теста действителен в течение двух лет с момента получения.</div>
            </div>
        </div>
    </div>
</section>

<?php
$image = get_field('language-desc_image');
$title = get_field('language-desc_title');
$text = get_field('language-desc_text');
?>
<?php if ($image || $title || $list) : ?>
    <section class="language-desc language-desc-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <div class="language-desc__image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                </div>
                <div class="col-xl-5 col-md-6">
                    <div class="language-desc__main text-center-mobile">
                        <?php if ($title) : ?>
                            <h2 class="language-desc__title h5">
                                <?php echo esc_html($title); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if ($text) : ?>
                            <p class="language-desc__text text-block-md">
                                <?php echo esc_html($text); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php require_once(TEMPLATE_PATH . '_sign-lesson.php'); ?>
<?php require_once(TEMPLATE_PATH . '_partner.php'); ?>
<?php require_once(TEMPLATE_PATH . '_teachers.php'); ?>
<?php require_once(TEMPLATE_PATH . '_prices.php'); ?>
<?php require_once(TEMPLATE_PATH . '_reviews.php'); ?>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>

<?php get_footer(); ?>