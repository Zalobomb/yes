<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

    			<section class="error-404 not-found">
    				<article>
	                     <div class="number-404"><?php echo esc_attr( '404', 'faceblog' );?></div>
	                     <div class="not-found-text"><?php echo esc_attr( 'Page Not found', 'faceblog' ); ?></div>
	                     <div class="looks-text"> <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'faceblog' ); ?> </div>
                     </article>
     			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
    
<?php 
faceblog_sidebar_select();
get_footer();