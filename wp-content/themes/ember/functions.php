<?php

/* **************************************************************************************************** */
// Setup Theme
/* **************************************************************************************************** */

add_action('after_setup_theme', 'ember_setup');

if (!function_exists('ember_setup')):

    function ember_setup() {


       // Localization

        $lang_local = get_template_directory() . '/lang';
        load_theme_textdomain('ember', $lang_local);

        // Register Thumbnail Sizes

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1170, 9999, true);
        add_image_size('ember_750_500', 750, 500, true);


        // Load feed links

        add_theme_support('automatic-feed-links');

        // Support Custom Background

        $ember_custom_background_defaults = array(
            'default-color' => 'eeedec'
        );
        add_theme_support( 'custom-background', $ember_custom_background_defaults );
        
        // Support title tag
        
        add_theme_support( "title-tag" );

        // Register Menus

        register_nav_menu('primary', __('Primary Menu', 'ember'));
        
        // Set Content Width
        
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1170;
        }
    }

endif;


/* **************************************************************************************************** */
// Load Admin Panel
/* **************************************************************************************************** */

require_once( trailingslashit( get_template_directory() ) . 'inc/kirki/kirki.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/options.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/pro/class-customize.php' );


/* **************************************************************************************************** */
// Do TGM
/* **************************************************************************************************** */

require_once( trailingslashit( get_template_directory() ) . '/inc/tgm/tgm-init.php' );


/* **************************************************************************************************** */
// Clear Helper/s
/* **************************************************************************************************** */

function ember_clear($ht = "0") {
echo "<div class='clear' style='height:" . $ht . "px;'></div>";
}


/* **************************************************************************************************** */
// Modify Search Form
/* **************************************************************************************************** */

function ember_modify_search_form($form) {
    $form = '<form method="get" id="searchform" action="' . esc_url(home_url()) . '/" >';
    if (is_search()) {
        $form .='<input type="text" value="' . esc_attr(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />';
    } else {
        $form .='<input type="text" value="Search" name="s" id="s"  onfocus="if(this.value==this.defaultValue)this.value=\'\';" onblur="if(this.value==\'\')this.value=this.defaultValue;"/>';
    }
    $form .= '<input type="image" id="searchsubmit" src="' . get_template_directory_uri() . '/assets/images/search_icon.png" />
            </form>';
    return $form;
}
add_filter('get_search_form', 'ember_modify_search_form');


/* **************************************************************************************************** */
// Override gallery style
/* **************************************************************************************************** */

add_filter( 'use_default_gallery_style', '__return_false' );


/* **************************************************************************************************** */
// More Tag
/* **************************************************************************************************** */

function ember_wrap_more_tag($link){
    return "<p class='more_tag_wrap'>$link</p>";
}
add_filter('the_content_more_link', 'ember_wrap_more_tag');


/* **************************************************************************************************** */
// Register Sidebars
/* **************************************************************************************************** */

add_action('widgets_init', 'ember_register_sidebars');

function ember_register_sidebars() {

    register_sidebar(array(
        'name' => __('Default Page Sidebar', 'ember'),
        'id' => 'sidebar_pages',
        'description' => __('Widgets in this area will be displayed in the sidebar on the pages.', 'ember'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Default Blog Sidebar', 'ember'),
        'id' => 'sidebar_blog',
        'description' => __('Widgets in this area will be displayed in the sidebar on the blog and posts.', 'ember'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));
    
    // create 50 alternate sidebar widget areas for use on post and pages
    $i = 1;
    while ($i <= 50) {
        register_sidebar(array(
            'name' => __('Alternate Sidebar #', 'ember') . $i,
            'id' => 'sidebar_' . $i,
            'description' => __('Widgets in this area will be displayed in the sidebar for any posts or pages that are tagged with sidebar', 'ember') . $i . '.',
            'before_widget' => '<div class="%1$s" class="widget %2$s widget sidebar_widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget_title">',
            'after_title' => '</h3>'
        ));
        $i++;
    }
}


/* **************************************************************************************************** */
// Custom NavWalker
/* **************************************************************************************************** */
 
require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');


/* **************************************************************************************************** */
// Excerpt Modifications
/* **************************************************************************************************** */

// Excerpt Length

add_filter('excerpt_length', 'ember_excerpt_length');

function ember_excerpt_length($length) {
    return 30;
}

// Excerpt More

add_filter('excerpt_more', 'ember_excerpt_more');

function ember_excerpt_more($more) {
    return '';
}

// Add to pages

add_action('init', 'ember_add_excerpts_to_pages');

function ember_add_excerpts_to_pages() {
    add_post_type_support('page', 'excerpt');
}


/* **************************************************************************************************** */
// Enable Threaded Comments
/* **************************************************************************************************** */

add_action('wp_enqueue_scripts', 'ember_threaded_comments');

function ember_threaded_comments() {
    if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
        wp_enqueue_script('comment-reply');
    }
}

/* **************************************************************************************************** */
// Modify Comments Output
/* **************************************************************************************************** */

if (!function_exists('ember_comment')){
    function ember_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>
        <li <?php comment_class(); ?> id="li_comment_<?php comment_ID() ?>">
            <div id="comment_<?php comment_ID(); ?>" class="comment_wrap clearfix">
                <?php echo get_avatar($comment, $size = '75'); ?>
                <div class="comment_content">
                    <p class="left"><strong><?php comment_author_link(); ?></strong><br />
                    <?php echo(get_comment_date()) ?> <?php edit_comment_link(__('(Edit)', 'ember'), '  ', '') ?></p>
                    <p class="right"><?php comment_reply_link(array_merge($args, array('reply_text' => __('Leave a Reply', 'ember'), 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
                    <div class="clear"></div>
                    <?php
                    if ($comment->comment_approved == '0') {
                    ?>
                        <em><?php _e('Your comment is awaiting moderation.', 'ember') ?></em>
                    <?php
                    }
                    ?>
                    <?php comment_text() ?>
                </div>
                <div class="clear"></div>
            </div>
    <?php
    }
}


/* **************************************************************************************************** */
// Modify Ping Output
/* **************************************************************************************************** */

if (!function_exists('ember_ping')){
    function ember_ping($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>
        <li id="comment_<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
    <?php
    }
}


/* **************************************************************************************************** */
// Modify Comment Text Fields
/* **************************************************************************************************** */

add_filter('comment_form_default_fields', 'ember_comment_fields');

if (!function_exists('ember_comment_fields')){
    function ember_comment_fields($fields) {

        $commenter = wp_get_current_commenter();
        $req = get_option('require_name_email');
        $aria_req = ( $req ? " aria-required='true'" : '' );

        $fields['author'] = '<div class="row"><div class="col-md-4 comment_fields"><p class="comment-form-author">' . '<label for="author">' . __('Name', 'ember') . '</label> ' . ( $req ? '<span class="required">*</span><br />' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>';
        $fields['email'] = '<p class="comment-form-email"><label for="email">' . __('Email', 'ember') . '</label> ' . ( $req ? '<span class="required">*</span><br />' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>';
        $fields['url'] = '<p class="comment-form-url"><label for="url">' . __('Website', 'ember') . '</label><br />' . '<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p></div> ';

        return $fields;
    }
}


/* **************************************************************************************************** */
// Modify Avatar Classes
/* **************************************************************************************************** */

add_filter('get_avatar','ember_avatar_class');

if (!function_exists('ember_avatar_class')){
    function ember_avatar_class($class) {
        $class = str_replace("class='avatar", "class='avatar img-responsive", $class) ;
        return $class;
    }
}


/* **************************************************************************************************** */
// Add Image Classes ##Look for way to apply to exsisting
/* **************************************************************************************************** */

function ember_add_image_class($class){
    $class .= ' img-responsive';
    return $class;
}
add_filter('get_image_tag_class','ember_add_image_class');


/* **************************************************************************************************** */
// Remove page template if no companion plugin
/* **************************************************************************************************** */

function ember_filter_theme_page_templates( $page_templates ) {

    if ( !function_exists('ember_companion') ) {
        if ( isset( $page_templates['landing.php'] ) ) {
            unset( $page_templates['landing.php'] );
        }
    }
    return $page_templates;
}
add_filter( 'theme_page_templates', 'ember_filter_theme_page_templates', 20, 3 );


/* **************************************************************************************************** */
// Load Public Scripts
/* **************************************************************************************************** */

add_action('wp_enqueue_scripts', 'ember_public_scripts');

function ember_public_scripts() {
    if (!is_admin()) {
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.0.0');
        wp_enqueue_script('waypoints',get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js','','3.1.1',true);
        wp_enqueue_script('scrollreveal',get_template_directory_uri() . '/assets/js/scrollReveal.min.js','','2.3.2',true);
        wp_enqueue_script('easing',get_template_directory_uri() . '/assets/js/jquery.easing.min.js','','1.3',true);
        wp_enqueue_script('waypoints-sticky',get_template_directory_uri() . '/assets/js/sticky.min.js','','3.1.1',true);
        wp_enqueue_script('nicescroll',get_template_directory_uri() . '/assets/js/nicescroll.min.js','','3.1.1',true);
        wp_enqueue_script('parallax',get_template_directory_uri() . '/assets/js/parallax.min.js','','3.1.1',true);
        wp_enqueue_script('ember_public',get_template_directory_uri() . '/assets/js/public.js','','1.0.0',true);
        wp_enqueue_script('html5shiv',get_template_directory_uri() . '/assets/js/html5shiv.js','','3.6.2',false);
        wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
        wp_enqueue_script('respond',get_template_directory_uri() . '/assets/js/respond.min.js','','1.3.0',false);
        wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
    }
}




/* **************************************************************************************************** */
// Load Public CSS
/* **************************************************************************************************** */


add_action('wp_enqueue_scripts', 'ember_public_styles');

function ember_public_styles() {
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0', 'all');
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0', 'all');
        wp_enqueue_style( 'raleway', '//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,700', array(), '1.0', 'all');
        wp_enqueue_style( 'lato', '//fonts.googleapis.com/css?family=Lato:400,100,300,700,100italic,300italic,400italic', array(), '1.0', 'all');
        wp_enqueue_style( 'ember-style', get_bloginfo( 'stylesheet_url' ), false, get_bloginfo('version') );
}