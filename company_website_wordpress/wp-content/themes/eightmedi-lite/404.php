<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package 8Medi Lite
 */

get_header(); ?>
<div class="ed-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'eightmedi-lite' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<div class="error-404-section">
						<div class="error-404-contain-wrap">
							<h2 class="error-404-title"><span><?php echo __('error', 'eightmedi-lite')?></span> <?php echo __('404', 'eightmedi-lite')?></h2>
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try search?', 'eightmedi-lite' ); ?></p>
						</div>
						<?php get_search_form(); ?>		
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>
