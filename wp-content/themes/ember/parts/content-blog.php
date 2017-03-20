<?php
$ember_blog_sidebar_position = ember_get_option('ember_blog_sidebar_position');
if ($ember_blog_sidebar_position == 'right') {
    $sidebar_select_aside_classes = 'col-sm-pull-8';
    $sidebar_select_content_classes = 'col-sm-push-4';
} else {
    $sidebar_select_aside_classes = '';
    $sidebar_select_content_classes = '';
}
?>
<div class="row">
    <div class="col-sm-8 blog-content-container <?php echo $sidebar_select_content_classes; ?>">
        <?php
        global $more;
        $more = 0;
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                <div <?php post_class('frontpage-post'); ?> data-sr="scale up 25%">
                    <?php get_template_part( 'parts/image', '750_500'); ?>
                    <div class="frontpage-post-content">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p class="meta">
                        <?php the_time( 'M' ); ?>. <?php the_time( 'j' ); ?>, <?php the_time( 'Y' ); ?> <?php _e('by', 'ember'); ?> <?php the_author_posts_link(); ?></p>
                        <?php the_excerpt(); ?>
                    </div>
                </div>
                <?php
            }
        } else {
                get_template_part( 'parts/error', 'no_results');
        }
        get_template_part( 'parts/blog', 'pagination');
        ?>
    </div>
    <div class="col-sm-4 <?php echo $sidebar_select_aside_classes; ?> sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>