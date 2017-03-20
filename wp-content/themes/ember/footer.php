    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <p id="copyright"><?php if (ember_get_option('copyright') != '') { echo esc_html(ember_get_option('copyright')); } else { echo "&copy ". get_bloginfo( 'name' ) . " " . date('Y'); } ?></p>
                </div>
                <div class="col-md-5 col-md-offset-2 text-right">
                    <p id="credit">Ember <?php _e('from', 'ember' ); ?> <a href="http://www.nimbusthemes.com">Nimbus Themes</a> - <?php _e('Powered by', 'ember') ?> <a href="http://wordpress.org">WordPress</a></p>
                </div>
            </div>
        </div>
    </footer> 
    <?php wp_footer(); ?>
</body>
</html>