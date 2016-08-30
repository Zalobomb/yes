<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content-wrapper">
		<div class="entry-content">
			<?php
	            $image_id = get_post_thumbnail_id();
	            $image_path = wp_get_attachment_image_src( $image_id, 'faceblog_single_default', true );
	            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
	            if( has_post_thumbnail() ) {
	        ?>
	            <div class="single-post-image">
	                <figure><img src="<?php echo esc_url( $image_path[0] );?>" alt="<?php echo esc_attr( $image_alt );?>" title="<?php the_title();?>" /></figure>
	                <?php faceblog_posted_date(); ?>
	            </div>
	        <?php } ?>
            
            <div class="post-meta-content-wrapper">
                <div class="post-content-wrapper">
			        <header class="entry-header">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header><!-- .entry-header -->
			        <div class="single-post-content">
				        <?php the_excerpt(); ?>
					</div>
					<a class="post-btn" href="<?php the_permalink();?>"><?php _e( 'Read More', 'faceblog' );?></a>
				</div><!-- .post-content-wrapper -->
	            <div class="post-meta-wrapper">
	            	<?php do_action( 'faceblog_author_info' ); ?>
	            	<?php do_action( 'faceblog_post_comments' ); ?>
	            	<?php do_action( 'faceblog_post_categories' ); ?>
                    <?php do_action( 'faceblog_post_share' ); ?>
	            </div><!-- .post-meta-wrapper -->
            </div>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'faceblog' ),
					'after'  => '</div>',
				) );
			?>			
			<div class="entry-meta">
				<?php faceblog_entry_footer(); ?>
			</div><!-- .entry-meta -->
		</div><!-- .entry-content -->
	</div><!-- .entry-content-wrapper -->
</article><!-- #post-## -->
