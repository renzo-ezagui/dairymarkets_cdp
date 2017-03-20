<?php
defined( 'ABSPATH' ) or die();

// Check for uniqueness
if( ! class_exists( 'Posts_For_All_Pages' ) ) {
    // Main Plugin Class
    class Posts_For_All_Pages
    {
        /**
         * Filter posts and potential static page content assigned to the current page.
         *
         * @since 0.1.0
         *
         * @param string $where.
         * @param WP_Query $query.
         *
         * @return string Modified where part in sql query.
         *
         */
        function posts_where( $where, $query )
        {
            global $wpdb;

            $categories = get_categories();
            $default_category = get_option( 'default_category' );

            // For the standard post page the posts assigned to the default category will be displayed.
            if ( $query->is_home() && $query->is_main_query() ) {

                $where = "AND ( " . $wpdb->prefix . "posts.ID IN ( SELECT object_id FROM " . $wpdb->prefix . "term_relationships WHERE term_taxonomy_id IN (" . $default_category . ") ) ) AND (" . $wpdb->prefix . "posts.post_type = 'post') AND (" . $wpdb->prefix . "posts.post_status = 'publish' OR " . $wpdb->prefix . "posts.post_status = 'private')";

            // For all other pages posts that belong the assigned categories will be displayed.
            } else if ( !$query->is_home() && is_page() ) {

                $cat_add = '';
                $page_id = $query->queried_object->ID;
                $categories_for_page = wp_get_post_categories($page_id);

                // Set up the sql part for the in operator.
                for ( $i = 0; $i < count($categories_for_page); $i++ ) {
                    $cat_add .= $categories_for_page[$i];
                    if ( $i != count($categories_for_page) - 1 ) {
                        $cat_add .= ',';
                    }
                }

                if ( $cat_add != '' ) {
                    $where = "AND ( " . $wpdb->prefix . "posts.ID IN ( SELECT object_id FROM " . $wpdb->prefix . "term_relationships WHERE term_taxonomy_id IN (" . $cat_add . ") ) ) AND ((" . $wpdb->prefix . "posts.post_type = 'post')  OR (" . $wpdb->prefix . "posts.post_type='page' AND " . $wpdb->prefix . "posts.ID=" . $page_id . ")) AND (" . $wpdb->prefix . "posts.post_status = 'publish' OR " . $wpdb->prefix . "posts.post_status = 'private') ";
                }
            }

            return $where;
        }

        /**
         * Sort content by prioritize static page content over posts.
         *
         * @since 0.1.0
         *
         * @param string $orderby_statement.
         * @param WP_Query $query.
         *
         * @return string Modified orderby part in sql query.
         */
        function posts_orderby( $orderby_statement, $query )
        {
            global $wpdb;

            if ( $query->is_page() ) {
                $orderby_statement = $wpdb->prefix . "posts.post_type, " . $wpdb->prefix . "posts.post_date DESC";
            }

            return $orderby_statement;
        }

        /**
         * Limit count of contents to the option 'Posts per page'.
         *
         * @since 0.1.0
         *
         * @param string $limits_statement.
         * @param WP_Query $query.
         *
         * @return string Modified limits part in sql query.
         */
        function post_limits( $limits_statement, $query )
        {
            $posts_per_page = get_option( 'posts_per_page' );

            if ( $query->is_page() ) {
                $limits_statement = "LIMIT " . $posts_per_page;
            }
            
            return $limits_statement;
        }
    }
}
?>