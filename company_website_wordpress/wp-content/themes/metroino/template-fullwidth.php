<?php
/**
* Template Name: Full Width Page
*/
get_header(); ?>

<section id="main-content">
    <div class="container">
        <div class="row">

            <section class="col-sm-12 col-md-12 col-lg-12 content">

                <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>

                    <?php if ( has_post_thumbnail() ) { ?>
                    <div class="article-media">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('fullwidth'); ?></a>
                    </div>
                    <?php } ?>

                    <header class="article-header">
                        <h3 class="h3"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                    </header>

                    <div class="article-body">
                        <?php the_content(); ?>
                        <?php wp_link_pages(); ?>
                    </div>

                    <footer class="article-footer">
                        <?php the_tags(); ?>
                    </footer>

                    <div class="article-meta">
                        <div class="alignleft">
                            <?php echo __('By', 'metroino'); ?> <?php the_author_posts_link(); ?><span class="separator">/</span>
                            <?php the_time('F jS, Y'); ?><span class="separator">/</span>
                            <?php the_category(', '); ?><span class="separator">/</span>
                            <?php comments_popup_link(__('0 Comments', 'metroino'), __('1 Comment', 'metroino'), '% '.__('Comments', 'metroino')); ?><span class="separator">/</span>
                        </div>
                    </div>

                </article>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php comments_template(); ?>
            </section>

        </div>
    </div>
</section>
<?php get_footer(); ?>
