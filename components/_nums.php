<?php
$nums_blocks = get_field('nums_blocks');

if ($nums_blocks): ?>
    <div class="nums">
        <div class="container">
            <ul class="nums__list">
                <?php foreach ($nums_blocks as $block): ?>
                    <li class="nums__item <?php echo $block['is_pc_only'] ? 'pc-only' : ''; ?>">
                        <?php if (!empty($block['icon'])):
                            $icon_url = is_array($block['icon']) ? esc_url($block['icon']['url']) : esc_url($block['icon']);
                            $icon_alt = is_array($block['icon']) && !empty($block['icon']['alt']) ? esc_attr($block['icon']['alt']) : 'Иконка';
                        ?>
                            <div class="nums__item-icon">
                                <img src="<?php echo $icon_url; ?>" alt="<?php echo $icon_alt; ?>">
                            </div>
                        <?php endif; ?>
                        <div class="nums__item-value <?php echo esc_attr($block['value_size']); ?>">
                            <?php echo esc_html($block['value']); ?>
                        </div>
                        <div class="nums__item-desc text-block-md">
                            <?php echo wp_kses_post($block['description']); ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>