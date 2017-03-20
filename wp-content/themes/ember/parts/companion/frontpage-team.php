<?php if (ember_get_option('fp-team-toggle') == '1') { ?>
    <section id="<?php if (ember_get_option('fp-team-slug')=='') {echo "team";} else {echo esc_attr(ember_get_option('fp-team-slug'));} ?>" class="frontpage-team frontpage-row">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="team-title h1"><?php echo esc_html(ember_get_option('fp-team-title')); ?></div>
                    <div class="team-sub-title h4"><?php echo esc_html(ember_get_option('fp-team-sub-title')); ?></div>
                    <div class="row row-centered">
                        <?php if ( is_active_sidebar( 'frontpage-team-left' ) ) { ?>
                        	<div class="col-sm-3 col-centered">
                        		<?php dynamic_sidebar( 'frontpage-team-left' ); ?>
                        	</div>
                        <?php } ?>
                        <?php if ( is_active_sidebar( 'frontpage-team-center-left' ) ) { ?>
                        	<div class="col-sm-3 col-centered">
                        		<?php dynamic_sidebar( 'frontpage-team-center-left' ); ?>
                        	</div>
                        <?php } ?>
                        <?php if ( is_active_sidebar( 'frontpage-team-center-right' ) ) { ?>
                        	<div class="col-sm-3 col-centered">
                        		<?php dynamic_sidebar( 'frontpage-team-center-right' ); ?>
                        	</div>
                        <?php } ?>
                        <?php if ( is_active_sidebar( 'frontpage-team-right' ) ) { ?>
                        	<div class="col-sm-3 col-centered">
                        		<?php dynamic_sidebar( 'frontpage-team-right' ); ?>
                        	</div>
                        <?php } ?>
                    </div>
                </div> 
            </div>    
        </div>    
    </section> 
<?php } else if (ember_get_option('fp-team-toggle') == '3') {
    // Don't do anything
} else { ?>  
    <section id="<?php if (ember_get_option('fp-team-slug')=='') {echo "team";} else {echo esc_attr(ember_get_option('fp-team-slug'));} ?>" class="frontpage-team frontpage-row preview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="team-title h1"><?php _e( 'Meet the Team', 'ember' ); ?></div>
                    <div class="team-sub-title h4"><?php _e( 'Showcase the great people behind your company.', 'ember' ); ?></div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">
                                <img class="img-responsive img-circle center-block" src="<?php echo get_template_directory_uri(); ?>/images/preview/184x184-6.jpg" />
                                <h4 class="team-item-title">Sally Brown</h4>
                                <h5 class="team-item-sub-title"><?php _e( 'CEO and Chair Woman', 'ember' ); ?></h5>
                                <p class="team-social-icons"><a href="#"><i class="fa fa-youtube"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a></p>
                            </div>
                        </div> 
                       <div class="col-sm-3">
                            <div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">
                                <img class="img-responsive img-circle center-block" src="<?php echo get_template_directory_uri(); ?>/images/preview/184x184-1.jpg" />
                                <h4 class="team-item-title">John Smith</h4>
                                <h5 class="team-item-sub-title"><?php _e( 'CFO and Mascot', 'ember' ); ?></h5>
                                <p class="team-social-icons"><a href="#"><i class="fa fa-youtube"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a></p>
                            </div>
                        </div>     
                        <div class="col-sm-3">
                            <div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">
                                <img class="img-responsive img-circle center-block" src="<?php echo get_template_directory_uri(); ?>/images/preview/184x184-2.jpg" />
                                <h4 class="team-item-title">Emma Kline</h4>
                                <h5 class="team-item-sub-title"><?php _e( 'Vice President', 'ember' ); ?></h5>
                                <p class="team-social-icons"><a href="#"><i class="fa fa-youtube"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a></p>
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">
                                <img class="img-responsive img-circle center-block" src="<?php echo get_template_directory_uri(); ?>/images/preview/184x184-3.jpg" />
                                <h4 class="team-item-title">Thomas Baggins</h4>
                                <h5 class="team-item-sub-title"><?php _e( 'Project Manager', 'ember' ); ?></h5>
                                <p class="team-social-icons"><a href="#"><i class="fa fa-youtube"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a></p>
                            </div>
                        </div> 
                    </div>    
                </div> 
            </div>    
        </div>    
    </section> 
<?php } ?>