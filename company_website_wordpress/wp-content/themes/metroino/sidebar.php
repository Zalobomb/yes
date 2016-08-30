<?php if ( get_theme_mod('metroino_blog_sidebar', 'rightsidebar') == 'rightsidebar' ): ?>
        <aside class="col-sm-12 col-md-4 col-lg-3 sidebar">
<?php else: ?>
        <aside class="col-sm-12 col-md-4 col-lg-3 col-sm-pull-8 col-md-pull-8 col-lg-pull-9 sidebar">
<?php endif; ?>
            <div class="row">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('blog_sidebar')): endif; ?>
            </div>
        </aside>

