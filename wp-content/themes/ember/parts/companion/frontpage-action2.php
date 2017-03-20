<?php if (ember_get_option('fp-action2-toggle') == '1') { ?>
    <section id="<?php if (ember_get_option('fp-action2-slug')=='') {echo "action2";} else {echo esc_attr(ember_get_option('fp-action2-slug'));} ?>" class="frontpage-action2 frontpage-row">  
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (ember_get_option('fp-action2-title') != '') { ?>
                    <div class="action2-title h4"><?php echo esc_html(ember_get_option('fp-action2-title')); ?></div>
                    <?php } ?>
                    <?php if ((ember_get_option('fp-action2-button-text') != '') && (ember_get_option('fp-action2-button-url') != '')) { ?>
                        <div class="action2-link-button"><a class="btn-ember-ghost-dark" href="<?php echo esc_url(ember_get_option('fp-action2-button-url')); ?>"><?php echo esc_html(ember_get_option('fp-action2-button-text')); ?></a></div>
                    <?php } ?>
                </div> 
            </div>    
        </div>    
    </section> 
<?php } else if (ember_get_option('fp-action2-toggle') == '3') {
    // Don't do anything
} else { ?>  
    <section id="<?php if (ember_get_option('fp-action2-slug')=='') {echo "action2";} else {echo esc_attr(ember_get_option('fp-action2-slug'));} ?>" class="frontpage-action2 frontpage-row preview">  
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="action2-title h4"><?php _e( 'Call To Action - Convince me why I should take this action.', 'ember' ); ?></div>
                    <div class="action2-link-button"><a class="btn-ember-ghost-dark" href="#"><?php _e( 'Go For It!', 'ember' ); ?></a></div>
                </div> 
            </div>    
        </div>    
    </section> 
<?php } ?> 

