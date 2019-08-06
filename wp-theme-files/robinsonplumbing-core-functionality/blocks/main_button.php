<?php $link = get_field('main_button_link'); ?>
<a href="<?php echo esc_url($link['url']); ?>" class="btn-main"><?php echo esc_html($link['title']); ?></a>