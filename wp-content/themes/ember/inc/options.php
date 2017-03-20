<?php
  

// #################################################
// Reg js spicifiv to the customizer
// #################################################

function ember_customizer_styles() { ?>
	<style type="text/css">
        .button-ember{background: #e92c6a!important; border-color:#e92c6a!important; -webkit-box-shadow: 0 1px 0 #e92c6a!important; box-shadow: 0 1px 0 #e92c6a!important; color: #fff!important; text-decoration: none!important; text-shadow: 0 -1px 1px #e92c6a,1px 0 1px #e92c6a,0 1px 1px #e92c6a,-1px 0 1px #e92c6a!important;width: 80%!important; margin: 5px auto 5px auto!important; display: block!important; text-align: center!important;margin-top:15px!important;margin-bottom:15px!important;}
        .button-ember-secondary{width: 80%!important;margin: 5px auto 5px auto!important; display: block!important; text-align: center!important;margin-top:15px!important;margin-bottom:15px!important;}
        .ember_pro_title{text-align:center;display:block;}
	</style>
<?php }

add_action( 'customize_controls_print_styles', 'ember_customizer_styles', 20 );



// #################################################
// Get Options
// #################################################
    
function ember_get_option($optionID, $default_data = false) {
    if (get_theme_mod( $optionID )) {
        return get_theme_mod( $optionID );   
    } else {
        return NULL;
    }
}
    

// #################################################
// Kirki -- Config, Settings, Options
// #################################################

   
Kirki::add_config( 'ember', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

// Guide

Kirki::add_section( 'setup', array(
    'title'          => __( 'Theme Userguide', 'ember' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'ember', array(
	'settings' => 'userguide-info',
	'label'    => __( 'Userguide', 'ember' ),
	'section'  => 'setup',
	'type'     => 'custom',
	'priority' => 1,
	'description'   => __( 'This theme was designed to be very easy to set up but just in case we\'ve created a Google Doc userguide to assist: ', 'ember' ) . '<a href="https://docs.google.com/document/d/1a9mDgzM4nWDnsOFhDB8KKYi8EgMD_IQQQoK3fcT9AvI/" target="_blank" class="button button-ember-secondary">View User Guide</a>',
) );

// GENERAL

Kirki::add_section( 'general_settings', array(
    'title'          => __( 'General', 'ember' ),
    'description'    => '',
    'panel'          => '', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
  
Kirki::add_field( 'ember', array(
	'settings' => 'copyright',
	'label'    => __('Copyright Text', 'ember' ),
	'section'  => 'general_settings',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
) );      

Kirki::add_field( 'ember', array(
	'settings' => 'home-slug',
	'label'    => __( 'Top of Homepage Navigation Menu ID', 'ember' ),
	'description'=> __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default shown in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'ember' ),
	'section'  => 'general_settings',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'home',
) ); 
      
           
// SOCIAL MEDIA IN HEADER

Kirki::add_section( 'social', array(
    'title'          => __( 'Header Social Media', 'ember' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'ember', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'social-toggle',
	'label'       => __( 'Social Icons Status', 'ember' ),
	'section'     => 'social',
	'default'     => '1',
	'priority'    => 1,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'ember' ),
		'2'  => esc_attr__( 'Hide', 'ember' ),
	),
) );

Kirki::add_field( 'ember', array(
	'settings' => 'ember_facebook_url',
	'label'    => __( 'Facebook URL', 'ember' ),
	'section'  => 'social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'sanitize_callback' => 'ember_sanitize_url'
) );

Kirki::add_field( 'ember', array(
	'settings' => 'ember_linkedin_url',
	'label'    => __( 'LinkedIn URL', 'ember' ),
	'section'  => 'social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'sanitize_callback' => 'ember_sanitize_url'
) );

Kirki::add_field( 'ember', array(
	'settings' => 'ember_twitter_url',
	'label'    => __( 'Twitter URL', 'ember' ),
	'section'  => 'social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'sanitize_callback' => 'ember_sanitize_url'
) );

Kirki::add_field( 'ember', array(
	'settings' => 'ember_youtube_url',
	'label'    => __( 'YouTube URL', 'ember' ),
	'section'  => 'social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'sanitize_callback' => 'ember_sanitize_url'
) );

Kirki::add_field( 'ember', array(
	'settings' => 'ember_google_plus_url',
	'label'    => __( 'Google+ URL', 'ember' ),
	'section'  => 'social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'sanitize_callback' => 'ember_sanitize_url'
) );

Kirki::add_field( 'ember', array(
	'settings' => 'ember_vimeo_url',
	'label'    => __( 'Vimeo URL', 'ember' ),
	'section'  => 'social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'sanitize_callback' => 'ember_sanitize_url'
) );

Kirki::add_field( 'ember', array(
	'settings' => 'ember_flickr_url',
	'label'    => __( 'Flickr URL', 'ember' ),
	'section'  => 'social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'sanitize_callback' => 'ember_sanitize_url'
) );

Kirki::add_field( 'ember', array(
	'settings' => 'ember_wpcom_url',
	'label'    => __( 'WordPress.com URL', 'ember' ),
	'section'  => 'social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'sanitize_callback' => 'ember_sanitize_url'
) );

Kirki::add_field( 'ember', array(
	'settings' => 'ember_pinterest_url',
	'label'    => __( 'Pinterest URL', 'ember' ),
	'section'  => 'social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'sanitize_callback' => 'ember_sanitize_url'
) );

Kirki::add_field( 'ember', array(
	'settings' => 'ember_instagram_url',
	'label'    => __( 'Instagram URL', 'ember' ),
	'section'  => 'social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'sanitize_callback' => 'ember_sanitize_url'
) );

Kirki::add_field( 'ember', array(
	'settings' => 'ember_tumblr_url',
	'label'    => __( 'Tumblr URL', 'ember' ),
	'section'  => 'social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'sanitize_callback' => 'ember_sanitize_url'
) );

Kirki::add_field( 'ember', array(
	'settings' => 'ember_mail_url',
	'label'    => __( 'Email Address', 'ember' ),
	'section'  => 'social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'sanitize_callback' => 'ember_sanitize_email'
) );

Kirki::add_field( 'ember', array(
	'type'        => 'checkbox',
	'settings'    => 'ember_hide_rss_icon',
	'label'       => __( 'Hide RSS Icon', 'ember' ),
	'section'     => 'social',
	'default'     => '0',
	'priority'    => 10,
) );



// BANNER SECTIONS

Kirki::add_panel( 'banner_settings', array(
    'priority'    => 2,
    'title'       => __( 'Banner Settings', 'ember' ),
    'description' => '',
) );

Kirki::add_section( 'fp_banner_options', array(
    'title'          => __( 'Frontpage General Options', 'ember' ),
    'description'    => '',
    'panel'          => 'banner_settings',
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'ember', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-banner-toggle',
	'label'       => __( 'Frontpage Banner Status', 'ember' ),
	'section'     => 'fp_banner_options',
	'default'     => '2',
	'priority'    => 1,
	'choices'     => array(
		'1'   => esc_attr__( 'Customizer', 'ember' ),
		'2' => esc_attr__( 'Post/Page', 'ember' ),
	),
) );

Kirki::add_section( 'fp_banner_customizer_options', array(
    'title'          => __( 'Frontpage Custom Banner Options', 'ember' ),
    'description'    => '',
    'panel'          => 'banner_settings',
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'ember', array(
	'type'        => 'color',
	'settings'    => 'fp-banner-background-color',
	'label'       => __( 'Row Background Color', 'ember' ),
	'section'     => 'fp_banner_customizer_options',
	'default'     => '#ea940d',
	'priority'    => 1,
	'alpha'       => true,
	'description'   => __( 'Pick a background color for the row.', 'ember' ),
	'output' => array(
		array(
			'element'  => '.frontpage-banner',
			'property' => 'background-color',
		),
	),
) );

Kirki::add_field( 'ember', array(
	'type'        => 'image',
	'settings'    => 'fp-banner-background-image',
	'label'       => __( 'Parallax Row Background', 'ember' ),
	'section'     => 'fp_banner_customizer_options',
	'default'     => '',
	'priority'    => 1,
) );

Kirki::add_field( 'ember', array(
	'settings' => 'fp-banner-title',
	'label'    => __( 'Banner - Main Title', 'ember' ),
	'section'  => 'fp_banner_customizer_options',
	'type'     => 'text',
	'priority' => 1,
	'default'  => '',
	'description'   => __( 'This is the big text in the banner. Leave blank to hide.', 'ember' ),
) );

Kirki::add_field( 'ember', array(
	'settings' => 'fp-banner-sub-title',
	'label'    => __( 'Banner - Sub Title', 'ember' ),
	'section'  => 'fp_banner_customizer_options',
	'type'     => 'text',
	'priority' => 1,
	'default'  => '',
	'description'   => __( 'This is the smaller text in the banner. Leave blank to hide.', 'ember' ),
) );

Kirki::add_field( 'ember', array(
	'settings' => 'fp-banner-button-text',
	'label'    => __( 'Banner - Button Text', 'ember' ),
	'section'  => 'fp_banner_customizer_options',
	'type'     => 'text',
	'priority' => 1,
	'default'  => '',
	'description'   => __( 'This is the button in the banner. Leave blank to hide.', 'ember' ),
) );

Kirki::add_field( 'ember', array(
	'settings' => 'fp-banner-button-url',
	'label'    => __( 'Banner - Button Destination URL', 'ember' ),
	'section'  => 'fp_banner_customizer_options',
	'type'     => 'text',
	'priority' => 1,
	'default'  => '',
	'description'   => __( 'This is the button link destination in the banner.', 'ember' ),
	'sanitize_callback' => 'ember_sanitize_url'
) );

Kirki::add_section( 'fp_banner_pp_options', array(
    'title'          => __( 'Frontpage Post/Page Banner Options', 'ember' ),
    'description'    => '',
    'panel'          => 'banner_settings',
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'ember', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-pp-banner-toggle',
	'label'       => __( 'Use Post or Page?', 'ember' ),
	'section'     => 'fp_banner_pp_options',
	'default'     => 'post',
	'priority'    => 1,
	'choices'     => array(
		'post'    => esc_attr__( 'Use Post', 'ember' ),
		'page'    => esc_attr__( 'Use Page', 'ember' ),
	),
) );

Kirki::add_field( 'ember', array(
	'type'        => 'select',
	'settings'    => 'fp_pp_banner_posts',
	'label'       => __( 'Choose a Post (from latest 50)', 'ember' ),
	'section'     => 'fp_banner_pp_options',
	'default'     => 'option-1',
	'priority'    => 1,
	'multiple'    => 1,
	'choices'     => Kirki_Helper::get_posts( array( 'posts_per_page' => 50, 'post_type' => 'post' ) ),
) );

Kirki::add_field( 'ember', array(
	'type'        => 'select',
	'settings'    => 'fp_pp_banner_page',
	'label'       => __( 'Choose a Page (from latest 50)', 'ember' ),
	'section'     => 'fp_banner_pp_options',
	'default'     => 'option-1',
	'priority'    => 1,
	'multiple'    => 1,
	'choices'     => Kirki_Helper::get_posts( array( 'posts_per_page' => 50, 'post_type' => 'page' ) ),
) );

Kirki::add_field( 'ember', array(
	'settings' => 'fp-pp-banner-sub-title-override',
	'label'    => __( 'Banner - Sub Title - Override', 'ember' ),
	'section'  => 'fp_banner_pp_options',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
	'description'   => __( 'This is the smaller text in the banner. This will override the automatically generated exerpt.', 'ember' ),
) );

Kirki::add_section( 'sub_banner_options', array(
    'title'          => __( 'Subpage Banner Options', 'ember' ),
    'description'    => '',
    'panel'          => 'banner_settings',
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'ember', array(
	'type'        => 'color',
	'settings'    => 'sub-banner-background-color',
	'label'       => __( 'Row Background Color', 'ember' ),
	'section'     => 'sub_banner_options',
	'default'     => '#ea940d',
	'priority'    => 1,
	'alpha'       => true,
	'description'   => __( 'Pick a background color for the row.', 'ember' ),
	'output' => array(
		array(
			'element'  => '.frontpage-banner',
			'property' => 'background-color',
		),
	),
) );

Kirki::add_field( 'ember', array(
	'type'        => 'image',
	'settings'    => 'sub-banner-background-image',
	'label'       => __( 'Parallax Row Background', 'ember' ),
	'section'     => 'sub_banner_options',
	'default'     => '',
	'priority'    => 1,
) );






// BLOG SETTINGS

Kirki::add_section( 'blog-settings', array(
    'title'          => __( 'Blog Settings', 'ember' ),
    'description'    => '',
    'panel'          => '', 
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'ember', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'ember_blog_sidebar_position',
	'label'       => __( 'Blog Sidebar Position', 'ember' ),
	'section'     => 'blog-settings',
	'default'     => 'left',
	'priority'    => 1,
	'choices'     => array(
		'1'   => esc_attr__( 'Right', 'ember' ),
		'2'  => esc_attr__( 'Left', 'ember' ),
	),
) );



// #################################################
// Some Custom Sanitize Functions
// #################################################

function ember_sanitize_url( $value ) {

    $value=esc_url_raw( $value );

    return $value;

}

function ember_sanitize_email( $value ) {

    $value=sanitize_email( $value );

    return $value;

}