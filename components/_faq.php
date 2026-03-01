<?php if (!empty($GLOBALS['global_acf_fields']['faq_items'])): ?>
    <section class="faq">
        <div class="container">
            <div class="faq__body row">
                <div class="faq__main col-lg-5">
                    <h2 class="faq__title h1">Частые вопросы</h2>
                    <p class="faq__subtitle text-block-lg">
                        Здесь мы собрали наиболее часто ​возникающие вопросы наших ​клиентов.
                    </p>
                    <div class="faq__icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/CME-language-centres.png" alt="Логотип">
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-7">
                    <?php
                    $faq_items = $GLOBALS['global_acf_fields']['faq_items'];
                    $column_1 = [];
                    $column_2 = [];

                    foreach ($faq_items as $index => $faq) {
                        if ($index % 2 == 0) {
                            $column_1[] = $faq;
                        } else {
                            $column_2[] = $faq;
                        }
                    }
                    ?>
                    <div class="faq__list row">
                        <div class="col-6">
                            <?php
                            foreach ($column_1 as $faq):
                                $question = $faq['question'];
                                $answer = $faq['answer'];
                                $color_class = !empty($faq['color_class']) ? esc_attr($faq['color_class']) : '';
                            ?>
                                <div class="faq__item icon-plus-circle <?php echo $color_class; ?>">
                                    <h6 class="faq__item-question"><?php echo esc_html($question); ?></h6>
                                    <div class="faq__item-answer"><?php echo wp_kses_post($answer); ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-6">
                            <?php
                            foreach ($column_2 as $faq):
                                $question = $faq['question'];
                                $answer = $faq['answer'];
                                $color_class = !empty($faq['color_class']) ? esc_attr($faq['color_class']) : '';
                            ?>
                                <div class="faq__item icon-plus-circle <?php echo $color_class; ?>">
                                    <h6 class="faq__item-question"><?php echo esc_html($question); ?></h6>
                                    <div class="faq__item-answer"><?php echo wp_kses_post($answer); ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>