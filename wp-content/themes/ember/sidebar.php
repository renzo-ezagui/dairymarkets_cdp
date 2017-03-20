<?php
// set conditions to show widget areas
if (is_page() || is_single()) {
    if ( is_single() ) {
        if (is_active_sidebar( "sidebar_blog" )) {
            dynamic_sidebar( "sidebar_blog" );
        }
    } else {
        if (is_active_sidebar( "sidebar_pages" )) {
            dynamic_sidebar( "sidebar_pages" );
        }
    }
} else if (is_home() || is_front_page() || is_archive() || is_search()) {
    if (is_active_sidebar( "sidebar_blog" )) {
        dynamic_sidebar( "sidebar_blog" );
    } else {
        the_widget('WP_Widget_Pages', 'title=Pages', 'before_title=<h3 class="widget_title">&after_title=</h3>&before_widget=<div class="widget sidebar_widget">&after_widget=</div>'); 
        the_widget('WP_Widget_Categories', 'title=Categories', 'before_title=<h3 class="widget_title">&after_title=</h3>&before_widget=<div class="widget sidebar_widget">&after_widget=</div>');
        the_widget( 'WP_Widget_Meta', 'title=Meta', 'before_title=<h3 class="widget_title">&after_title=</h3>&before_widget=<div class="widget sidebar_widget">&after_widget=</div>');
    }
}
?>