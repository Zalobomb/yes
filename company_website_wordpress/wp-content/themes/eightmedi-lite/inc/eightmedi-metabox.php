<?php
/**
 * 8Medi Lite Theme Metabox Options
 *
 * @package 8MediLite
 */

add_action('add_meta_boxes', 'eightmedi_lite_add_sidebar_layout_box');
$event_category = get_theme_mod('eightmedi_lite_event');
$eightmedi_lite_event_category = !empty($event_category) ? $event_category:"";

function eightmedi_lite_add_sidebar_layout_box()
{
	add_meta_box(
                 'eightmedi_lite_sidebar_layout', // $id
                 __('Sidebar Layout','eightmedi-lite'), // $title
                 'eightmedi_lite_sidebar_layout_callback', // $callback
                 'post', // $page
                 'normal', // $context
                 'high'); // $priority

	add_meta_box(
                 'eightmedi_lite_sidebar_layout', // $id
                 __('Sidebar Layout','eightmedi-lite'), // $title
                 'eightmedi_lite_sidebar_layout_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority

}


$eightmedi_lite_sidebar_layout = array(
	'left-sidebar' => array(
		'value'     => 'left-sidebar',
		'label'     => __( 'Left sidebar', 'eightmedi-lite' ),
		'thumbnail' => get_template_directory_uri() . '/inc/admin-panel/images/left-sidebar.png'
		), 
	'right-sidebar' => array(
		'value' => 'right-sidebar',
		'label' => __( 'Right sidebar<br/>(default)', 'eightmedi-lite' ),
		'thumbnail' => get_template_directory_uri() . '/inc/admin-panel/images/right-sidebar.png'
		),
	'both-sidebar' => array(
		'value'     => 'both-sidebar',
		'label'     => __( 'Both Sidebar', 'eightmedi-lite' ),
		'thumbnail' => get_template_directory_uri() . '/inc/admin-panel/images/both-sidebar.png'
		),

	'no-sidebar' => array(
		'value'     => 'no-sidebar',
		'label'     => __( 'No sidebar', 'eightmedi-lite' ),
		'thumbnail' => get_template_directory_uri() . '/inc/admin-panel/images/no-sidebar.png'
		)   

	);

function eightmedi_lite_sidebar_layout_callback()
{ 
	global $post , $eightmedi_lite_sidebar_layout;
	wp_nonce_field( basename( __FILE__ ), 'eightmedi_lite_sidebar_layout_nonce' ); 
	?>

	<table class="form-table">
		<tr>
			<td colspan="4"><em class="f13"><?php _e('Choose Sidebar Template','eightmedi-lite'); ?></em></td>
		</tr>

		<tr>
			<td>
				<?php  
				foreach ($eightmedi_lite_sidebar_layout as $field) {  
					$eightmedi_lite_sidebar_metalayout = get_post_meta( $post->ID, 'eightmedi_lite_sidebar_layout', true ); ?>

					<div class="radio-image-wrapper" style="float:left; margin-right:30px;">
						<label class="description">
							<span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
							<input type="radio" name="eightmedi_lite_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $eightmedi_lite_sidebar_metalayout ); if(empty($eightmedi_lite_sidebar_metalayout) && $field['value']=='right-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $field['label']; ?>
						</label>
					</div>
                <?php } // end foreach 
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>

    <?php } 

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function eightmedi_lite_save_sidebar_layout( $post_id ) { 
	global $eightmedi_lite_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
	if ( !isset( $_POST[ 'eightmedi_lite_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'eightmedi_lite_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
		return;

    // Stop WP from clearing custom fields on autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
		return;

	if ('page' == $_POST['post_type']) {  
		if (!current_user_can( 'edit_page', $post_id ) )  
			return $post_id;  
	} elseif (!current_user_can( 'edit_post', $post_id ) ) {  
		return $post_id;  
	}  


	foreach ($eightmedi_lite_sidebar_layout as $field) {  
        //Execute this saving function
		$old = get_post_meta( $post_id, 'eightmedi_lite_sidebar_layout', true); 
		$new = sanitize_text_field($_POST['eightmedi_lite_sidebar_layout']);
		if ($new && $new != $old) {  
			update_post_meta($post_id, 'eightmedi_lite_sidebar_layout', $new);  
		} elseif ('' == $new && $old) {  
			delete_post_meta($post_id,'eightmedi_lite_sidebar_layout', $old);  
		} 
     } // end foreach   
     
 }
 add_action('save_post', 'eightmedi_lite_save_sidebar_layout'); 