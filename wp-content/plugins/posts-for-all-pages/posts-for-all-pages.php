<?php
/*
Plugin Name: Posts For All Pages
Plugin URI: https://wordpress.org/plugins/posts-for-all-pages/
Description: Allows to distribute posts on different pages by means of categories.
Version: 0.1.0
Author: wpyb
Author URI: https://profiles.wordpress.org/wpyb/
License: GPL2
*/

/*
Copyright (C)  2016 Yvonne Breuer

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

defined( 'ABSPATH' ) or die();

/**
 * Class Post_For_All_Pages with functionalitiy
 */
require_once( 'lib/class-posts-for-all-pages.php' );
/**
 * Class Post_For_All_Pages_Settings for settings page
 */
require_once ( 'lib/class-posts-for-all-pages-settings.php' );

// Check for availability
if ( class_exists( 'Posts_For_All_Pages' ) ) {

    // Creation of instance
    $post_for_all_pages = new Posts_For_All_Pages();

    // Check for availability
    if ( isset( $post_for_all_pages ) ) {
        /**
         * Filter posts and potential static page content assigned to the current page.
         *
         * @since 0.1.0
         */
        add_filter( 'posts_where', array( &$post_for_all_pages, 'posts_where' ), 10, 2 );
        /**
         * Sort content by prioritize static page content over posts.
         *
         * @since 0.1.0
         */
        add_filter( 'posts_orderby', array( &$post_for_all_pages, 'posts_orderby' ), 10, 2 );
        /**
         * Limit count of contents to the option 'Posts per page'.
         *
         * @since 0.1.0
         */
        add_filter( 'post_limits', array( &$post_for_all_pages, 'post_limits' ), 10, 2 );
    }
}

// Check for availability
if ( class_exists( 'Posts_For_All_Pages_Settings' ) ) {

    // Creation of instance
    $post_for_all_pages_settings = new Posts_For_All_Pages_Settings();

    // Check for availability
    if ( isset( $post_for_all_pages_settings ) ) {
        /**
         * Add option box for the editing of page settings to assign categories.
         *
         * @since 0.1.0
         */
        add_action( 'add_meta_boxes', array( &$post_for_all_pages_settings, 'add_categories_box' ) );
        /**
         * Validates and saves the plugin options.
         *
         * @since 0.1.0
         */
        add_action( 'save_post', array( &$post_for_all_pages_settings, 'save_categories_box_data' ) );
    }
}
?>