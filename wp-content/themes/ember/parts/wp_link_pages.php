<?php
$args = array(
    'before'           => '<p class="wp_link_pages">' . __('Pages:', 'ember'),
    'after'            => '</p>',
    'link_before'      => '<span>',
    'link_after'       => '</span>'
);
wp_link_pages($args);
?>