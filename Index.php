<?php get_header(); ?>
<div class="container">
    <div class="main">
        <?php if (have_posts()): while (have_posts()):the_post();?>
        <article class="post">
            <h3>
                <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
            </h3>
            <div class="meta">
                Created By
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
                    <?php the_author();?>
                </a>
                <?php the_time('F j,Y g:i a');?>
            </div>
            <?php if(has_post_thumbnail()):?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail();?>
            </div>
            <?php endif;?>
            <?php the_excerpt();?>
            <a class="button" href="<?php the_permalink();?>">Read More</a>
        </article>
         <?php endwhile;?>
        <?php endif; wp_reset_postdata();?>
    </div>

    <?php
    if (is_active_sidebar('sidebar-right')){
        get_sidebar();
    } ?>

    <div class="clr"></div>
</div>
<?php get_footer(); ?>