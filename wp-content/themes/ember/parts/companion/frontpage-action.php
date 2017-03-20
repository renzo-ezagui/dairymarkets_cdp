<?php 
if (ember_get_option('fp-action1-toggle') == "1") {
    ?>
    <section id="<?php if (ember_get_option('fp-action1-slug')=='') {echo "action1";} else {echo esc_attr(ember_get_option('fp-action1-slug'));} ?>" class="frontpage-action1 frontpage-row">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (ember_get_option('fp-action1-title') != '') { ?>
                        <div class="action1-title h1"><?php echo esc_html(ember_get_option('fp-action1-title')); ?></div>
                    <?php } ?>
                    <?php if (ember_get_option('fp-action1-sub-title') != '') { ?>
                        <div class="action1-sub-title h4"><?php echo esc_html(ember_get_option('fp-action1-sub-title')); ?></div>
                    <?php } ?>
                    <?php if ((ember_get_option('fp-action1-button-text') != '') && (ember_get_option('fp-action1-button-url') != '')) { ?>
                        <div class="action1-link-button"><a class="btn-ember-ghost" href="<?php echo esc_url(ember_get_option('fp-action1-button-url')); ?>"><?php echo esc_html(ember_get_option('fp-action1-button-text')); ?></a></div>
                    <?php } ?>
                </div> 
            </div>    
        </div>    
    </section> 
    <?php
} else if (ember_get_option('fp-action1-toggle') == "3") {
    // Don't do anything
} else {
?>
    <section id="<?php if (ember_get_option('fp-action1-slug')=='') {echo "action1";} else {echo esc_attr(ember_get_option('fp-action1-slug'));} ?>" class="frontpage-action1 frontpage-row preview">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="action1-title h1"><?php _e( 'Call To Action', 'ember' ); ?></div>
                    <div class="action1-sub-title h4"><?php _e( 'Convince me why I should take this action.', 'ember' ); ?></div>
                    <div class="action1-link-button"><a class="btn-ember-ghost" href="#"><?php _e( 'Go For It!', 'ember' ); ?></a></div>
                </div> 
            </div>    
        </div>    
    </section> 
<?php
}    
?>