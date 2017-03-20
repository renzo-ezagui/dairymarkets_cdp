<div <?php post_class('content row'); ?>>
    <div class="col-sm-8 content-column">
        <div class="row single_meta">
            <div class="col-sm-8">
                <p>
                <?php
                _e('Posted by ', 'ember');
                the_author_posts_link();
                _e(' on ', 'ember');
                the_time(get_option( 'date_format' ));
                ?></p>
            </div>
            <div class="col-sm-4">
                <?php if (comments_open()) { ?><p class="text-right"><a href="<?php the_permalink(); ?>#comments" ><?php comments_number( 'No comments', 'One comment', '% comments' ); ?></a></p><?php } ?>
            </div>
        </div>
        <?php
        the_content();
        ember_clear();
        get_template_part( 'parts/wp_link_pages');
        get_template_part( 'parts/tax_tags');
        comments_template();
        get_template_part( 'parts/single_post_nav');
        ?>
    </div>
    <div class="col-sm-4 sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>