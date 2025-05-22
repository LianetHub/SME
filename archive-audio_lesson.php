<?php get_header(); ?>
<main class="audio-archive">
  <div class="container">
    <h1>Аудио материалы</h1>
    <?php
    $terms = get_terms(['taxonomy' => 'category_audio', 'hide_empty' => false]);
    foreach ($terms as $term) {
        echo '<h2>' . esc_html($term->name) . '</h2>';

        $query = new WP_Query([
            'post_type' => 'audio_lesson',
            'tax_query' => [[
                'taxonomy' => 'category_audio',
                'field' => 'term_id',
                'terms' => $term->term_id,
            ]],
            'posts_per_page' => -1
        ]);

        if ($query->have_posts()) {
            echo '<ul>';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
            wp_reset_postdata();
        }
    }
    ?>
  </div>
</main>
<?php get_footer(); ?>
