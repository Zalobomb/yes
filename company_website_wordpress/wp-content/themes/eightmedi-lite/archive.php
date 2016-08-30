<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package 8Medi Lite
 */

get_header(); ?>
<div class="ed-container">
<?php
$wl_team_cat    =   get_theme_mod('eightmedi_lite_teammember_setting_category');
$wl_news_cat    =   get_theme_mod('eightmedi_lite_news_setting_category');
$wl_featured_cat    =   esc_attr(get_theme_mod('eightmedi_lite_featured_setting_category'));
$addclass = '';
if(get_query_var('cat')==$wl_team_cat){ $addclass = ' category-doctors';}
if(get_query_var('cat')==$wl_news_cat){ $addclass = ' category-news';}
if(get_query_var('cat')==$wl_featured_cat){ $addclass = ' category-featured';}
?>
	<div id="primary" class="content-area right-sidebar<?php echo esc_attr($addclass);?>">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php 
	get_sidebar('right');
	?>
</div>
<?php get_footer(); ?>
