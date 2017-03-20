<?php if (is_front_page() && !is_paged())  { ?>
    <?php $section_bg=ember_get_option('fp-banner-background-image');
    if (!empty($section_bg)) {
        $ember_parallax="data-parallax='scroll' data-image-src='" . esc_url($section_bg) . "' style='background: rgba(0, 0, 0, 0.35);'";
        $parallax_active="parallax_active";
    } else {
        $ember_parallax="data-parallax='scroll' data-image-src='" . get_template_directory_uri() . "/assets/images/preview/fire.jpg' style='background: rgba(0, 0, 0, 0.35);'";
        $parallax_active="parallax_active";
    } ?>
    <?php if (ember_get_option('fp-banner-toggle') == '1') { ?>
        <section class="ssbanner frontpage-banner <?php if(isset($parallax_active)){echo $parallax_active;} ?>" <?php if(isset($ember_parallax)){echo $ember_parallax;} ?>>
            <div class="container">
                <div class="banner-wrap" data-sr='wait 0.4s, scale up 25%'>
                    <?php if (ember_get_option('fp-banner-title') != '') { ?>
                        <div class="banner-title titlefamily"><?php echo esc_html(ember_get_option('fp-banner-title')); ?></div>
                    <?php } ?>
                    <?php if (ember_get_option('fp-banner-sub-title') != '') { ?>
                        <div class="banner-sub-title titlefamily"><?php echo esc_html(ember_get_option('fp-banner-sub-title')); ?></div>
                    <?php } ?>
                    <?php if (ember_get_option('fp-banner-button-url') != '') { ?>
                        <div class="banner-link-button"><a class="btn-ember" href="<?php echo esc_url(ember_get_option('fp-banner-button-url')); ?>"><?php echo esc_html(ember_get_option('fp-banner-button-text')); ?></a></div>
                    <?php } ?>
                </div>      
            </div>    
        </section>  
    <?php } else { ?>  
        <?php $ember_pp_toggle=trim(ember_get_option('fp-pp-banner-toggle'));
        $p='';
        if (!empty($ember_pp_toggle)){
            if ($ember_pp_toggle=='post') {
                $p=intval(ember_get_option('fp_pp_banner_posts'));
                $custom_args = array('posts_per_page' => 1, 'post__not_in' => get_option( 'sticky_posts' ), 'p' => $p);
            } else if ($ember_pp_toggle=='page') {
                $p=intval(ember_get_option('fp_pp_banner_page'));
                $custom_args = array('posts_per_page' => 1, 'page_id' => $p);
            }
        } else {
            $custom_args = array('posts_per_page' => 1, 'post__not_in' => get_option( 'sticky_posts' ));
        }
        $custom_query = new WP_Query( $custom_args );
        if ( $custom_query->have_posts() ) {
            while ( $custom_query->have_posts() ) {
                $custom_query->the_post(); 
                $sub_title=trim(ember_get_option('fp-pp-banner-sub-title-override'));
                if (empty($sub_title)) {
                    $content = get_the_content();
                    $sub_title=wp_trim_words( $content , '5' );
                }
                if ( has_post_thumbnail() ) {
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url_array = wp_get_attachment_image_src($thumb_id);
                    $thumb_url = $thumb_url_array[0];
                    if (!empty($thumb_url)) {
                        $ember_parallax="data-parallax='scroll' data-image-src='" . esc_url($thumb_url) . "' style='background: rgba(0, 0, 0, 0.35);'";
                        $parallax_active="parallax_active";
                    }
                } else {
                    $section_bg=ember_get_option('fp-banner-background-image');
                    if (!empty($section_bg)) {
                        $ember_parallax="data-parallax='scroll' data-image-src='" . esc_url($section_bg) . "' style='background: rgba(0, 0, 0, 0.35);'";
                        $parallax_active="parallax_active";
                    } else {
                        $ember_parallax="data-parallax='scroll' data-image-src='" . get_template_directory_uri() . "/assets/images/preview/fire.jpg' style='background: rgba(0, 0, 0, 0.35);'";
                        $parallax_active="parallax_active";
                    }
                }
                ?>
                <section class="ssbanner frontpage-banner <?php if(isset($parallax_active)){echo $parallax_active;} ?>" <?php if(isset($ember_parallax)){echo $ember_parallax;} ?>>
                    <div class="container">
                        <div class="banner-wrap" data-sr='wait 0.4s, scale up 25%'>
                            <?php the_title('<div class="banner-title">','</div>'); ?>
                            <div class="banner-sub-title"><?php echo $sub_title; ?></div>
                            <div class="banner-link-button"><a class="btn-ember" href="<?php the_permalink(); ?>"><?php _e('Learn More', 'ember' ); ?></a></div>
                        </div>    
                    </div>    
                </section> 
            <?php  }      
        }
        wp_reset_postdata(); ?>
    <?php } ?> 
<?php } else { ?> 
    <?php
    if ( has_post_thumbnail() ) {
        $thumb_id = get_post_thumbnail_id();
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full');
        $thumb_url = $thumb_url_array[0];
        if (!empty($thumb_url)) {
            $ember_parallax="data-parallax='scroll' data-image-src='" . esc_url($thumb_url) . "' style='background: rgba(0, 0, 0, 0.35);'";
            $parallax_active="parallax_active";
        }
    } else {
        $section_bg=ember_get_option('sub-banner-background-image');
        if (!empty($section_bg)) {
            $ember_parallax="data-parallax='scroll' data-image-src='" . esc_url($section_bg) . "' style='background: rgba(0, 0, 0, 0.35);'";
            $parallax_active="parallax_active";
        } else {
            $ember_parallax="data-parallax='scroll' data-image-src='" . get_template_directory_uri() . "/assets/images/preview/fire.jpg' style='background: rgba(0, 0, 0, 0.35);'";
            $parallax_active="parallax_active";
        }
    }
    ?>
        <section class="ssbanner subpage-banner <?php if(isset($parallax_active)){echo $parallax_active;} ?>"  <?php if(isset($ember_parallax)){echo $ember_parallax;} ?>>
            <div class="container">
                <div class="banner-wrap" data-sr='wait 0.4s, scale up 25%'>
                    <h1 class="banner-title titlefamily"><?php get_template_part( 'parts/title'); ?></h1>
                </div>
            </div>
        </section>
<?php } ?>