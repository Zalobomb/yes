<?php
/**
 * The Sidebar containing the footer widget areas.
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */
?>

<?php
/**
 * The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
 
if( !is_active_sidebar( 'faceblog_sidebar_footer1' ) &&
	!is_active_sidebar( 'faceblog_sidebar_footer2' ) &&
    !is_active_sidebar( 'faceblog_sidebar_footer3' ) &&
    !is_active_sidebar( 'faceblog_sidebar_footer4' ) ) {
	return;
}
$faceblog_footer_layout = get_theme_mod( 'footer_widget_option', 'column3' );
?>
<div class="footer-widgets-wrapper clearfix">
	<div class="mt-container <?php echo esc_attr( $faceblog_footer_layout ); ?> ">
		<div class="footer-widgets-area clearfix">
            <div class="mt-footer-widget-wrapper clearfix">
            		<div class="mt-first-footer-widget mt-footer-widget">
            			<?php
            			if ( !dynamic_sidebar( 'faceblog_sidebar_footer1' ) ):
            			endif;
            			?>
            		</div>
        		<?php if( $faceblog_footer_layout != 'column1' ){ ?>
                    <div class="mt-second-footer-widget mt-footer-widget">
            			<?php
            			if ( !dynamic_sidebar( 'faceblog_sidebar_footer2' ) ):
            			endif;
            			?>
            		</div>
                <?php } ?>
                <?php if( $faceblog_footer_layout == 'column3' || $faceblog_footer_layout == 'column4' ){ ?>
                    <div class="mt-third-footer-widget mt-footer-widget">
                       <?php
                       if ( !dynamic_sidebar( 'faceblog_sidebar_footer3' ) ):
                       endif;
                       ?>
                    </div>
                <?php } ?>
                <?php if( $faceblog_footer_layout == 'column4' ){ ?>
                    <div class="mt-fourth-footer-widget mt-footer-widget">
                       <?php
                       if ( !dynamic_sidebar( 'faceblog_sidebar_footer4' ) ):
                       endif;
                       ?>
                    </div>
                <?php } ?>
            </div>
		</div>
	</div>
</div>