<?php if ((ember_get_option('fp-news-toggle') == '1') || (ember_get_option('fp-news-toggle') == '')) { ?>
    <section id="<?php if (ember_get_option('fp-news-slug')=='') {echo "content";} else {echo esc_attr(ember_get_option('fp-news-slug'));} ?>" class="frontpage-news frontpage-row">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (ember_get_option('fp-news-title') != '') { ?>
                        <div class="news-title h1"><?php echo esc_html(ember_get_option('fp-news-title')); ?></div>
                    <?php } ?>
                    <?php if (ember_get_option('fp-news-sub-title') != '') { ?>
                        <div class="news-sub-title h4"><?php echo esc_html(ember_get_option('fp-news-sub-title')); ?></div>
                    <?php } ?>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php } else if (ember_get_option('fp-news-toggle') == '2') {
    // Don't do anything
}  ?>