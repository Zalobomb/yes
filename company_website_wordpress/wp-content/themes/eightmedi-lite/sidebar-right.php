<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package eightmedi lite
 */
global $post;
$post_id = "";
if(is_front_page()){
	$post_id = get_option('page_on_front');
}else{
	if($post)
	$post_id = $post->ID;
}
$post_class = get_post_meta( $post_id, 'eightmedi_lite_sidebar_layout', true );
if(empty($post_class) && is_archive()){
	$post_class = "right-sidebar";
}elseif(is_single() || is_search()){
	$post_class = "right-sidebar";
}
if($post_class=='right-sidebar' || $post_class=='both-sidebar'){
    ?>
    <div id="secondary-right" class="widget-area right-sidebar sidebar">
        <?php if ( is_active_sidebar( 'eightmedi-lite-sidebar-right' ) ) : ?>
			<?php dynamic_sidebar( 'eightmedi-lite-sidebar-right' ); ?>
		<?php endif; ?>
    </div>
    <?php    
}    
?>