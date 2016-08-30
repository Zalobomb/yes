<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

?>
			</div> <!-- content-wrapper end -->
		</div><!-- .mt-container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <?php get_sidebar( 'footer' ); ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'faceblog' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'faceblog' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php 
				$theme_author_url = esc_url( 'http://mysterythemes.com/' );
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'faceblog' ), 'faceblog', '<a href="'. $theme_author_url .'" rel="designer">Mystery Themes</a>' ); 
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
    <div class="forkit-curtain">
			<div class="close-button"><i class="fa fa-close"></i></div>
            <div class="forkit-widget-wrapper">
                <div class="mt-container">
        			<?php 
                        if ( is_active_sidebar( 'faceblog_sidebar_contact' ) ) :
                            dynamic_sidebar( 'faceblog_sidebar_contact' );
                        endif;
                    ?>
                </div>
            </div> 
	</div>
    <a class="forkit" data-text="<?php esc_attr_e( 'drag for contact' , 'faceblog' ); ?>" data-text-detached="<?php esc_attr_e( 'Drag down', 'faceblog' );?> >" href="#"></a>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
