<?php
define('TEMPLATE_PATH', dirname(__FILE__) . '/components/');
function my_theme_enqueue_styles()
{
	wp_enqueue_style(
		'theme-style', // handle
		get_template_directory_uri() . '/style.css', // путь до style.css
		array(), // зависимости
		filemtime(get_template_directory() . '/style.css') // версия по времени изменения
	);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function theme_enqueue_styles()
{

	wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/libs/swiper-bundle.min.css');
	wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/css/libs/fancybox.css');
	wp_enqueue_style('reset', get_template_directory_uri() . '/assets/css/reset.min.css');
	wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.min.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


function theme_enqueue_scripts()
{
	wp_deregister_script('jquery');

	wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/libs/jquery-3.7.1.min.js', array(), null, true);

	wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/libs/swiper-bundle.min.js', array(), null, true);
	wp_enqueue_script('fancybox-js', get_template_directory_uri() . '/assets/js/libs/fancybox.umd.js', array(), null, true);

	wp_enqueue_script('app-js', get_template_directory_uri() . '/assets/js/app.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

function allow_svg_uploads($mimes)
{

	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

function register_my_menus()
{
	register_nav_menus(
		array(
			'menu_1' => 'Меню с английским языком',
			'menu_2' => 'Меню программ дошкольников',
			'menu_3' => 'Меню языков',
			'menu_4' => 'Меню информации',
		)
	);
}

add_action('after_setup_theme', 'register_my_menus');

function set_global_acf_fields()
{
	$GLOBALS['global_acf_fields'] = [
		'phone_number' => get_field('phone_number', 'option'),
		'email_address' => get_field('email_address', 'option'),
		'faq_items' => get_field('faq_items', 'option'),
		'gallery_images' => get_field('gallery_images', 'option'),
		'resume_email' => get_field('resume_email', 'option'),
		'vk_url' => get_field('vk_url', 'option'),
		'telegram_url' => get_field('telegram_url', 'option'),
		'phone_number_center_wa' => get_field('phone_number_center_wa', 'option'),
		'dannye' => get_field('dannye', 'option'),
		'liczenziya' => get_field('liczenziya', 'option'),
	];
}
add_action('wp', 'set_global_acf_fields');


add_filter('wpcf7_autop_or_not', '__return_false');

add_theme_support('post-thumbnails');

function register_teachers_post_type()
{
	register_post_type('teacher', [
		'labels' => [
			'name' => 'Преподаватели',
			'singular_name' => 'Преподаватель',
			'add_new' => 'Добавить преподавателя',
			'edit_item' => 'Редактировать преподавателя'
		],
		'public' => true,
		'has_archive' => false,
		'publicly_queryable' => false,
		'menu_icon' => 'dashicons-welcome-learn-more',
		'supports' => ['title', 'editor', 'thumbnail'],
	]);
}
add_action('init', 'register_teachers_post_type');


function register_post_audio_type()
{
	register_post_type('audio_lesson', [
		'labels' => ['name' => 'Аудио-уроки'],
		'public' => true,
		'rewrite' => ['slug' => 'courses/audio'],
		'supports' => ['title', 'editor'],
	]);
}
add_action('init', 'register_post_audio_type');

function register_audio_taxonomy()
{
	register_taxonomy('category_audio', 'audio_lesson', [
		'labels' => ['name' => 'Категории аудио'],
		'hierarchical' => true,
		'rewrite' => ['slug' => 'courses/audio', 'with_front' => false],
		'public' => true,
	]);
}
add_action('init', 'register_audio_taxonomy');
add_action('wp_head', function() {
  if (is_singular()) {
    $keywords = get_post_meta(get_the_ID(), '_yoast_wpseo_focuskw', true);
    if ($keywords) {
      echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";
    }
  }
});


add_action('wpcf7_before_send_mail', 'send_cf7_to_telegram');

function send_cf7_to_telegram($cf7) {
    $form_id = $cf7->id();
    $form_title = $cf7->title();

    // ✅ Укажи ID нужных форм
    $target_forms = [6, 1749];

    error_log("🚀 Hook запущен. Форма ID: $form_id ($form_title)");

    if (!in_array($form_id, $target_forms)) {
        error_log("⛔ Форма не в списке нужных. Прерываю.");
        return;
    }

    $submission = WPCF7_Submission::get_instance();

    if (!$submission) {
        error_log("⚠️ submission = false");
        return;
    }

    $posted_data = $submission->get_posted_data();
    $page_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'неизвестно';

    // ✅ Формируем сообщение
    $message = "📩 Новая заявка с формы: {$form_title}\n";
    $message .= "🧭 Страница отправки: {$page_url}\n\n";

    foreach ($posted_data as $key => $value) {
        if (in_array($key, ['_wpcf7', '_wpnonce', '_wpcf7_unit_tag', '_wpcf7_container_post'])) continue;

        // обработка массива (если поле с checkbox или select multiple)
        if (is_array($value)) {
            $value = implode(', ', $value);
        }

        $message .= "$key: $value\n";
    }

    // ✅ Telegram config
    $token = '7549397283:AAE4eXvuLHv8jwmA7prQtR_zjAujuwFPxgU';
    $chat_id = '-4845275736';
    $send_url = "https://api.telegram.org/bot{$token}/sendMessage";

    // ✅ Отправка
    $response = wp_remote_post($send_url, [
        'body' => [
            'chat_id' => $chat_id,
            'text' => $message,
            // Без Markdown пока — чтобы не ловить ошибку форматирования
        ]
    ]);

    // ✅ Логируем результат
    if (is_wp_error($response)) {
        error_log('❌ Ошибка отправки в Telegram: ' . $response->get_error_message());
    } else {
        error_log('✅ Ответ от Telegram: ' . wp_remote_retrieve_body($response));
    }
}



add_action('template_redirect', function () {
  $redirects = [
    '/o-nashej-shkole/o-nashej-shkole/' => '/about/',
    '/courses/teens/' => '/14-17/',
    '/courses/adults/' => '/adults/',
    '/courses/english-minisad/' => '/mini-garden/',
    '/courses/podgotovka-k-shkole/' => '/preparing-for-school/',
    '/dlya-detei/' => '/preschoolers-age/',
    '/courses/razvivaika/' => '/lets-develop-it/',
    '/languages/spanish/' => '/spain-language/',
    '/languages/french/' => '/french-language/',
    '/languages/japanese/' => '/japan-language/',
    '/languages/german/' => '/german-language/',
    '/courses/individual-lessons/' => '/individual/',
    '/courses/onlajn/' => '/online/',
    '/o-nashej-shkole/rock-the-language/' => '/rock-the-language/',
    '/o-nashej-shkole/teachers/' => '/teachers/',
    '/contact/' => '/centres/',
    '/price/' => '/prices/',
    '/courses/international-certificates/' => '/exams/',
    '/vakansii/' => '/vacancies/',
    '/gallery/filial-1.html' => '/gallery/',
    '/7lending-small-baby/' => '/',
    '/gallery/novyij-god-2017.html' => '/gallery/',
    '/gallery/filial-2.html' => '/gallery/',
    '/courses/' => '/',
    '/landing-kids/' => '/7-9/',
    '/landing-teens/' => '/14-17/',
    '/courses/english-abroad/' => '/',
    '/courses/cambridge/' => '/exams/',
    '/contact/landing-balashikha/' => '/reutovskaya/',
    '/languages/' => '/languages/',
    '/gallery/uchebnyij-god-2019-2020.html' => '/',
    '/courses/domashnee-zadanie/domashnee-zadanie.html' => '/',
    '/gallery/filial-3.html' => '/gallery/',
    '/landing-baby/' => '/',
    '/gallery/halloween-2017.html' => '/gallery/',
    '/landing-adults/' => '/adults/',
    '/languages/english/' => '/',
    '/o-nashej-shkole/certificate/' => '/',
    '/gallery/halloween-2016.html' => '/gallery/',
    '/gallery/proczess-obucheniya.html' => '/gallery/',
    '/landing-rock-the-lang/' => '/rock-the-language/',
    '/o-nashej-shkole/otzivi/' => '/',
    '/lands/' => '/',
    '/price/stock/' => '/prices/',
    '/courses/audio/' => '/',
    '/contact/g.-myitishhi.html' => '/',
     '/courses/audio/super-minds/super-minds-1/super-minds-1-cd2-unit-4-6.html' => '/audio/super-minds-1-cd2-unit-4-6/',
        '/courses/audio/show-and-tell-2/show-and-tell-2-cd2.html' => '/audio/show-and-tell-2-cd2/',
        '/courses/audio/playway/playway-2/playway-2-pupils-book-cd1.html' => '/audio/playway-2-pupils-book-cd1/',
        '/courses/audio/playway/playway-1/playway-1-pupils-book-cd1.html' => '/audio/playway-1-pupils-book-cd1/',
        '/courses/audio/go-getter/go-getter-3-work-book-audio.html' => '/audio/go-getter-3-work-book-audio/',
        '/courses/audio/english-file/english-file-intermediate2-work-book-audio.html' => '/audio/english-file-intermediate2-work-book-audio/',
        '/courses/audio/english-file/english-file-intermediate-work-book-audio.html' => '/audio/english-file-intermediate-work-book-audio/',
        '/courses/audio/playway/playway-3/playway-3-cd1.html' => '/audio/playway-3-cd1/',
        '/courses/audio/english-file/english-file-beginner-work-book-audio.html' => '/audio/english-file-beginner-work-book-audio/',
        '/courses/audio/playway/playway-2/playway-2-pupils-book-cd2.html' => '/audio/playway-2-pupils-book-cd2/',
        '/courses/audio/english-file/english-file-upper-int-work-book-audio.html' => '/audio/english-file-upper-int-work-book-audio/',
        '/courses/audio/go-getter/go-getter-1-work-book-audio.html' => '/audio/go-getter-1-work-book-audio/',
        '/courses/audio/playway/playway-3/playway-3-cd2.html' => '/audio/playway-3-cd2/',
        '/courses/audio/show-and-tell-2/show-and-tell-2-cd1.html' => '/audio/show-and-tell-2-cd1/',
        '/courses/audio/super-minds/super-minds-2/super-minds-2-cd1-unit-1-2.html' => '/audio/super-minds-2-cd1-unit-1-2/',
        '/courses/audio/super-minds/super-minds-1/super-minds-1-cd3-unit-7-9.html' => '/audio/super-minds-1-cd3-unit-7-9/',
        '/courses/audio/super-minds/super-minds-3/super-minds-3-audio-cd1.html' => '/audio/super-minds-3-audio-cd1/',
        '/courses/audio/super-minds/super-minds-1/super-minds-1-cd1-unit-1-3.html' => '/audio/super-minds-1-cd1-unit-1-3/',
        '/courses/audio/go-getter/go-getter-2-work-book-audio.html' => '/audio/go-getter-2-work-book-audio/',
        '/courses/audio/english-file/english-file-pre-int-work-book-audio.html' => '/audio/english-file-pre-int-work-book-audio/',
        '/courses/audio/playway/playway-1/playway-1-pupils-book-cd2.html' => '/audio/playway-1-pupils-book-cd2/',
        '/courses/audio/english-file/english-file-elementary-work-book-audio.html' => '/audio/english-file-elementary-work-book-audio/',
        '/courses/audio/super-minds/super-minds-2/super-minds-2-cd3-unit-6-9.html' => '/audio/super-minds-2-cd3-unit-6-9/',
        '/courses/audio/playway/playway-2/playway-2-pupils-book-cd3.html' => '/audio/playway-2-pupils-book-cd3/',
        '/courses/audio/super-minds/super-minds-3/super-minds-3-audio-cd2.html' => '/audio/super-minds-3-audio-cd2/',
        '/courses/audio/playway/playway-1/playway-1-pupils-book-cd3.html' => '/audio/playway-1-pupils-book-cd3/',
        '/courses/audio/playway/playway-3/playway-3-cd3.html' => '/audio/playway-3-cd3/',
        '/courses/audio/english-file/english-file-advanced-work-book-audio.html' => '/audio/english-file-advanced-work-book-audio/',
        '/courses/audio/super-minds/super-minds-2/super-minds-2-cd2-unit-3-5.html' => '/audio/super-minds-2-cd2-unit-3-5/',
        '/courses/audio/super-minds/super-minds-3/super-minds-3-audio-cd3.html' => '/audio/super-minds-3-audio-cd3/',

  ];

  $current_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  if (isset($redirects[$current_path])) {
    wp_redirect(site_url($redirects[$current_path]), 301);
    exit;
  }
});


add_action('wp_footer', function() {
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const selects = document.querySelectorAll('select[name="place"]');
  selects.forEach(function(select) {
    // Создаём пустой плейсхолдер
    const placeholderOption = document.createElement('option');
    placeholderOption.textContent = 'Выберите филиал';
    placeholderOption.value = '';
    placeholderOption.disabled = true;
    placeholderOption.selected = true;
    placeholderOption.hidden = true;

    // Вставляем в начало списка
    select.insertBefore(placeholderOption, select.firstChild);

    // Переключаем selected на ONLINE занятий если надо
    const options = select.options;
    const lastIndex = options.length - 1;

    for (let i = 0; i < options.length; i++) {
      options[i].selected = false;
    }

    // Оставляем плейсхолдер выбранным по умолчанию
    placeholderOption.selected = true;

    // Если надо: можно программно выбрать ONLINE сразу
    // options[lastIndex].selected = true;
  });
});
</script>
<?php
});
