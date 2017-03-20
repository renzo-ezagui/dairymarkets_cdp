<?php if (ember_get_option('featured-toggle') == "1") { ?>
    <section id="<?php if (ember_get_option('fp-featured-slug')=='') {echo "featured";} else {echo esc_attr(ember_get_option('fp-featured-slug'));} ?>" class="frontpage-featured frontpage-row">
        <div class="container">
            <div class="row frontpage_featured row-centered">
                <?php if ( is_active_sidebar( 'frontpage-featured-left' ) ) { ?>
                	<div class="col-sm-4 col-centered featured">
                		<?php dynamic_sidebar( 'frontpage-featured-left' ); ?>
                	</div>
                <?php } ?>
                <?php if ( is_active_sidebar( 'frontpage-featured-center' ) ) { ?>
                	<div class="col-sm-4 col-centered featured">
                		<?php dynamic_sidebar( 'frontpage-featured-center' ); ?>
                	</div>
                <?php } ?>
                <?php if ( is_active_sidebar( 'frontpage-featured-right' ) ) { ?>
                	<div class="col-sm-4 col-centered featured">
                		<?php dynamic_sidebar( 'frontpage-featured-right' ); ?>
                	</div>
                <?php } ?> 
            </div>
        </div> 
    </section>
<?php } else if (ember_get_option('featured-toggle') == "3") { 
    // Do nothing here
} else { ?>
    <section id="<?php if (ember_get_option('fp-featured-slug')=='') {echo "featured";} else {echo esc_attr(ember_get_option('fp-featured-slug'));} ?>" class="frontpage-featured frontpage-row preview">
        <div class="container">
            <div class="row frontpage_featured row-centered">
                <div class="col-sm-4 col-centered featured">
                    <div class="frontpage_featured_item">
                        <i class="fa fa-heart"></i>
                        <h4><?php _e( 'Sample Page', 'ember' ); ?></h4>
                        <?php _e( 'This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes).', 'ember' ); ?>
                    </div>
                    <div class="frontpage_featured_item">
                        <i class="fa fa-paper-plane"></i>
                        <h4><?php _e( 'Sample Page', 'ember' ); ?></h4>
                        <?php _e( 'This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes).', 'ember' ); ?>
                    </div>
                </div>    
                <div class="col-sm-4 col-centered featured">
                    <div class="frontpage_featured_item">
                        <i class="fa fa-paper-plane"></i>
                        <h4><?php _e( 'Sample Page', 'ember' ); ?></h4>
                        <?php _e( 'This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes).', 'ember' ); ?>
                    </div>
                    <div class="frontpage_featured_item">
                        <i class="fa fa-bolt"></i>
                        <h4><?php _e( 'Sample Page', 'ember' ); ?></h4>
                        <?php _e( 'This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes).', 'ember' ); ?>
                    </div>
                </div>  
                <div class="col-sm-4 col-centered featured">
                    <div class="frontpage_featured_item">
                        <i class="fa fa-bolt"></i>
                        <h4><?php _e( 'Sample Page', 'ember' ); ?></h4>
                        <?php _e( 'This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes).', 'ember' ); ?>
                    </div>
                    <div class="frontpage_featured_item">
                        <i class="fa fa-heart"></i>
                        <h4><?php _e( 'Sample Page', 'ember' ); ?></h4>
                        <?php _e( 'This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes).', 'ember' ); ?>
                    </div>
                </div>  
            </div>
        </div> 
    </section>
<?php } ?>