<?php get_header(); ?>

<section id="main-content">
    <div class="container">
        <div class="row">

        <?php if ( get_theme_mod('metroino_blog_sidebar', 'rightsidebar') == 'rightsidebar' ): ?>
            <section class="col-sm-12 col-md-8 col-lg-9 content">
        <?php else: ?>
            <section class="col-sm-12 col-md-8 col-lg-9 col-sm-push-4 col-md-push-4 col-lg-push-3 content">
        <?php endif; ?>
				<article class="error404">

                    <header class="article-header"><h3><?php echo __('Oops, This Page Could Not Be Found!', 'metroino'); ?></h3></header>
                    <div class="article-body">
                        <p><?php echo __('Can\'t find what you need? Take a moment and do a search below!', 'metroino'); ?></p>
					</div>
					<?php get_search_form(); ?>

                 </article>
            </section>
            <?php get_sidebar(); ?>

        </div>
    </div>
</section>
<?php get_footer(); ?>

