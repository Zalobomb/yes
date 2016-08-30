<?php
/**
 * Template part for displaying posts.
 *
 * @package 8Medi Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if (has_post_thumbnail()): 
	$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'eightmedi-lite-archive-image');
	?>
	<figure>
		<a href="<?php the_permalink();?>">
			<img src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
		</a>
	</figure>
	<?php
	endif;
	?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php eightmedi_lite_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php echo eightmedi_lite_excerpt(get_the_excerpt(),300,'...',true,true);?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eightmedi-lite' ),
				'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php eightmedi_lite_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</article><!-- #post-## -->
