<?php
defined( 'ABSPATH' ) or die();

// Check for uniqueness
if( ! class_exists( 'Posts_For_All_Pages_Settings' ) ) {
    // Main Plugin Class
    class Posts_For_All_Pages_Settings
    {
        /**
         * Add option box for the editing of page settings to assign categories.
         *
         * @since 0.1.0
         */
        function add_categories_box()
        {
            add_meta_box(
                'pfap_sectionid',
                __( 'Posts For All Pages', 'pfap_text' ),
                array( &$this, 'categories_box_callback' ),
                'page'
            );
        }

        /**
         * Prints the categories box content.
         *
         * @param WP_Post $post.
         */
        function categories_box_callback( $post )
        {
            global $wp_query, $wpdb;

            // Nonce field is set.
            wp_nonce_field('pfap_categories_box', 'pfap_categories_box_nonce');

            $page_id = $post->ID;
            $categories = get_categories();
            $categories_to_page = wp_get_post_categories( $page_id, array('fields' => 'ids'));
            $page_for_posts_id = get_option('page_for_posts');
            $page_on_front_id = get_option( 'page_on_front' );

            // HTML form is built.
            echo '<form method="post" action="options.php"> ';
            foreach ( $categories as $cat ) {
                echo '<label for="pfap_' . $cat->term_id . '">';
                echo '<input type="checkbox" ';
                // In case the category is already assigned the checkbox is checked.
                if ( in_array( $cat->term_id, $categories_to_page ) ) {
                    echo 'checked="checked" ';
                }

                // In case the page is selected as standard post page or front page the checkboxes are disabled.
                if ( $page_id === $page_for_posts_id  || $page_id === $page_on_front_id ) {
                    echo 'disabled="disabled" ';
                }

                echo 'name="pfap_' . $cat->term_id . '" value="' . $cat->term_id . '" id="pfap_' . $cat->term_id . '" /> ' . $cat->name . '</label><br/>';
            }
            echo '</form>';
        }

        /**
         * Validates and saves the plugin options.
         *
         * @since 0.1.0
         *
         * @param int $post_id.
         *
         */
        function save_categories_box_data( $post_id )
        {
            // Check if our nonce is set.
            if ( !isset( $_POST['pfap_categories_box_nonce'] ) ) {
                return;
            }

            // Verify that the nonce is valid.
            if ( !wp_verify_nonce( $_POST['pfap_categories_box_nonce'], 'pfap_categories_box' ) ) {
                return;
            }

            // If this is an autosave, our form has not been submitted, so we don't want to do anything.
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return;
            }

            // Check the user's permissions.
            if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
                if ( !current_user_can( 'edit_page', $post_id ) ) {
                    return;
                }
            }

            $page_for_posts_id = get_option( 'page_for_posts' );
            $page_on_front_id = get_option( 'page_on_front' );

            // To assign categories for the current standard post page and the front page is not valid.
            if ( $post_id == $page_for_posts_id  || $post_id == $page_on_front_id ) {
                return;
            }

            // Assignment of categories to page is saved.
            $categories = get_categories();
            $categories_to_page = array();

            foreach ( $categories as $cat ) {
                if ( isset( $_POST['pfap_' . $cat->term_id]) ) {
                    $pattern = '/^([0-9]+)$/';
                    $new_id = sanitize_text_field( $_POST['pfap_' . $cat->term_id] );
                    // Error in case the post value is not an integer.
                    if ( !preg_match($pattern, $new_id) ) {
                        return;
                    }
                    $categories_to_page[] = $new_id;
                }
            }

            $term_taxonomy_ids = wp_set_post_terms($post_id, $categories_to_page, 'category');

            // Check if an error has occured.
            if ( is_wp_error( $term_taxonomy_ids ) ) {
                return;
            }
        }
    }
}
?>