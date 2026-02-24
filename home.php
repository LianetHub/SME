<?php
set_query_var('header', '');
set_query_var('logo', 'pink');
set_query_var('blog_title', 'Рассказываем про английский');

get_header();

include(locate_template('templates/blog-layout.php'));

get_footer();
