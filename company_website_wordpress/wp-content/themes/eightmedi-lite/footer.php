<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package 8Medi Lite
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="footer-wrap">
		<div class="ed-container-home">
			<?php
			if(is_active_sidebar('eightmedi-lite-widget-footer-1')){ ?>
				<div class="top-footer wow fadeInLeft">
					<?php
					dynamic_sidebar('eightmedi-lite-widget-footer-1');
					?>
				</div>
				<?php
			}
			?>
		</div>
		<div class="main-footer">
			<div class="ed-container-home">
				<div class="site-info">
					<?php _e( 'WordPress Theme : ', 'eightmedi-lite' );  ?><a  title="<?php echo __('Free WordPress Theme','eightmedi-lite');?>" href="<?php echo esc_url( __( 'https://8degreethemes.com/wordpress-themes/eightmedi-lite/', 'eightmedi-lite' ) ); ?>"><?php _e( 'EightMedi Lite', 'eightmedi-lite' ); ?> </a>
					<span><?php echo __(' by 8Degree Themes','eightmedi-lite');?></span>
				</div><!-- .site-info -->
				<?php if(get_theme_mod('eightmedi_lite_social_icons_in_footer','1')==1){ ?>
					<div class="footer-social social-links">
						<?php do_action('eightmedi_lite_social_links');?>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<div id="es-top"></div>
<?php wp_footer(); ?>

</body>
</html>