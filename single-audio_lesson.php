<?php
set_query_var('header', '');
set_query_var('logo', 'pink');
get_header(); ?>
<main class="audio-lesson">
  <div class="container">
    <h1><?php the_title(); ?></h1>

    <?php if (have_rows('audio_files')): ?>
      <ul class="custom-audio-list">
        <?php while (have_rows('audio_files')): the_row(); ?>
          <?php
          $file = get_sub_field('audio_file');
          ?>
          <?php if ($file): ?>
            <li class="custom-audio-item" data-src="<?= esc_url($file['url']) ?>">
              <div class="audio-row">
                <button class="play-button">
                  <span class="icon">▶</span>
                </button>
                <span class="file-name"><?= basename($file['url']) ?></span>
              </div>
              <div class="progress-bar">
                <div class="progress"></div>
              </div>
            </li>
          <?php endif; ?>
        <?php endwhile; ?>
      </ul>
    <?php else: ?>
      <p>Аудио не добавлено.</p>
    <?php endif; ?>
  </div>
</main>

<style>
  h1 {
    padding-bottom: 40px;
  }

  .audio-lesson {
    padding-top: 170px;
    text-align: center;
  }

  .custom-audio-list {
    list-style: none;
    padding: 0;
    max-width: 640px;
    margin: 0 auto;
  }

  .custom-audio-item {
    margin-bottom: 30px;
    font-family: sans-serif;
  }

  .audio-row {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 10px;
  }

  .play-button {
    background: none;
    border: none;
    color: #000;
    font-size: 18px;
    cursor: pointer;
    padding: 2px;
  }

  .play-button.active .icon {
    color: #f1592a;
  }

  .file-name {
    font-size: 16px;
    text-align: left;
  }

  .progress-bar {
    width: 100%;
    height: 2px;
    background: #e0e0e0;
    position: relative;
    margin-top: 4px;
  }

  .progress {
    height: 2px;
    width: 0;
    background: #f1592a;
  }
</style>

<script>
  document.querySelectorAll('.custom-audio-item').forEach(item => {
    const playBtn = item.querySelector('.play-button');
    const progress = item.querySelector('.progress');
    const icon = playBtn.querySelector('.icon');
    const audio = new Audio(item.dataset.src);
    let isPlaying = false;

    playBtn.addEventListener('click', () => {
      if (!isPlaying) {
        audio.play();
        playBtn.classList.add('active');
        icon.textContent = '⏸';
      } else {
        audio.pause();
        playBtn.classList.remove('active');
        icon.textContent = '▶';
      }
      isPlaying = !isPlaying;
    });

    audio.addEventListener('timeupdate', () => {
      const percent = (audio.currentTime / audio.duration) * 100;
      progress.style.width = percent + '%';
    });

    audio.addEventListener('ended', () => {
      playBtn.classList.remove('active');
      icon.textContent = '▶';
      isPlaying = false;
    });
  });
</script>

<?php get_footer(); ?>