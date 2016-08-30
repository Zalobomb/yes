<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package 8Medi Lite
 */

if ( ! is_active_sidebar( 'eightmedi-lite-sidebar-1' ) ) {
	return;
}
?>

<div id="secondary-right" class="widget-area right-sidebar sidebar">
	<?php dynamic_sidebar( 'eightmedi-lite-sidebar-1' ); ?>
</div><!-- #secondary -->
