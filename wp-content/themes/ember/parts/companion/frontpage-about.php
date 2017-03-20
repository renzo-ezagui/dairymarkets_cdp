<?php if (ember_get_option('fp-about-toggle') == '1') { ?>
    <section id="<?php if (ember_get_option('fp-about-slug')=='') {echo "about";} else {echo esc_attr(ember_get_option('fp-about-slug'));} ?>" class="frontpage-about frontpage-row">   
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (ember_get_option('fp-about-title') != '') { ?>
                        <div class="about-title h1"><?php echo esc_html(ember_get_option('fp-about-title')); ?></div>
                    <?php } ?>
                    <?php if (ember_get_option('fp-about-sub-title') != '') { ?>
                        <div class="about-sub-title h4"><?php echo esc_html(ember_get_option('fp-about-sub-title')); ?></div>
                    <?php } ?>
                    <?php if (ember_get_option('fp-about-description') != '') { ?>
                        <p class="about-desc"><?php echo esc_html(ember_get_option('fp-about-description')); ?></p>
                    <?php } ?>
                    <div class="row row-centered" data-sr="enter left and move 50px after 1s">
                        <?php if ( is_active_sidebar( 'frontpage-about' ) ) { ?>
                        	<?php dynamic_sidebar( 'frontpage-about' ); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
     </section>
<?php } else if (ember_get_option('fp-about-toggle') == '3') {
    // Don't do anything
} else { ?>
    <section id="<?php if (ember_get_option('fp-about-slug')=='') {echo "about";} else {echo esc_attr(ember_get_option('fp-about-slug'));} ?>" class="frontpage-about frontpage-row preview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row row-centered" data-sr="enter left and move 50px after 1s">
                        <div class="col-sm-3 col-centered item">
                            <a href="#"><i class="fa fa-heart"></i><h4><?php _e( 'BRAND &amp; IDENTITY', 'ember' ); ?></h4><p><?php _e( 'Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.', 'ember' ); ?></p></a>
                        </div>
                        <div class="col-sm-3 col-centered item">
                            <a href="#"><i class="fa fa-sort-amount-desc"></i><h4><?php _e( 'PARALLAX MOTION', 'ember' ); ?></h4><p><?php _e( 'Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.', 'ember' ); ?></p></a>
                        </div>  
                        <div class="col-sm-3 col-centered item">
                            <a href="#"><i class="fa fa-star"></i><h4><?php _e( 'QUALITY DESIGN', 'ember' ); ?></h4><p><?php _e( 'Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.', 'ember' ); ?></p></a>
                        </div>
                        <div class="col-sm-3 col-centered item">
                            <a href="#"><i class="fa fa-support"></i><h4><?php _e( 'EXPERT SUPPORT', 'ember' ); ?></h4><p><?php _e( 'Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.', 'ember' ); ?></p></a>
                        </div>  
                    </div>
                </div> 
            </div>    
        </div>    
     </section>
<?php } ?> 