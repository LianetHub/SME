<?php
/**
 * Template Name: Аудио — Главная страница
 */

get_header(); ?>
<main class="audio-archive">
  <div class="container">
    <h1>Аудио материалы</h1>
    <p>Выберите свой учебник:</p>

    <?php
    $terms = get_terms([
      'taxonomy' => 'category_audio',
      'hide_empty' => false,
    ]);

    foreach ($terms as $term):
        $term_slug = sanitize_title($term->slug);
        $term_id = $term->term_id;
        ?>

        <div class="category-block">
          <h2 class="category-title" data-toggle="collapse" data-target="#cat-<?php echo $term_slug; ?>">
            <?php echo esc_html($term->name); ?> <span class="toggle-btn">–</span>
          </h2>

          <div class="collapse show" id="cat-<?php echo $term_slug; ?>">
            <ul class="lessons-list">
              <?php
              $query = new WP_Query([
                'post_type' => 'audio_lesson',
                'tax_query' => [[
                  'taxonomy' => 'category_audio',
                  'field' => 'term_id',
                  'terms' => $term_id
                ]],
                'posts_per_page' => -1
              ]);

              while ($query->have_posts()): $query->the_post(); ?>
                <li>
                  <a href="<?php the_permalink(); ?>">
                    <strong><?php the_title(); ?></strong> Work Book audio
                  </a>
                </li>
              <?php endwhile;
              wp_reset_postdata();
              ?>
            </ul>
          </div>
        </div>

    <?php endforeach; ?>
  </div>
</main>

<style>
.category-block {
  margin-bottom: 20px;
}
.category-title {
  background: #eee;
  padding: 10px;
  cursor: pointer;
  font-size: 18px;
  margin-bottom: 0;
}
.lessons-list {
  margin: 0;
  padding: 0;
  list-style: none;
}
.lessons-list li {
  background: #f9f9f9;
  padding: 8px 12px;
  border-bottom: 1px solid #ddd;
}
.toggle-btn {
  float: right;
}
</style>

<script>
document.querySelectorAll('.category-title').forEach(el => {
  el.addEventListener('click', () => {
    const target = document.querySelector(el.dataset.target);
    target.classList.toggle('show');
    el.querySelector('.toggle-btn').textContent =
      target.classList.contains('show') ? '–' : '+';
  });
});
</script>

<?php get_footer(); ?>

