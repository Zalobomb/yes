<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tora
 */

?>

<?php do_action('tora_before_post'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() && ( get_theme_mod( 'post_feat_image' ) != 1 ) ) : ?>
	<div class="single-thumb">
		<?php the_post_thumbnail('tora-large-thumb'); ?>
	</div>
	<?php endif; ?>

	<div class="single-meta">
		<?php tora_entry_meta(); ?>
	</div>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tora' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php tora_entry_tags(); ?>
	</footer>

</article><!-- #post-## -->

<?php do_action('tora_after_post'); ?>