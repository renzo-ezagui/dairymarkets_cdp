<div <?php post_class('content row'); ?>>
    <div class="col-sm-8 content-column">
        <?php 
        the_content();
        ember_clear();
        get_template_part( 'parts/wp_link_pages');
        comments_template();
        ?>
    </div>
    <div class="col-sm-4 sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>
