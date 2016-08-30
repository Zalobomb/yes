<?php
/**
 * Fucntions for rendering metaboxes in Page and post area
 * 
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

add_action( 'add_meta_boxes', 'faceblog_page_metabox' );

if( ! function_exists( 'faceblog_page_metabox' ) ) :
	function faceblog_page_metabox() {
		
        add_meta_box( 
			'faceblog_pages_meta_settings', // $id
            __( 'Page Options', 'faceblog' ), // $title
            'faceblog_pages_meta_settings_callback', // $callback
            'page', // $page
            'normal', // $context
            'high' // $priority
		);

        add_meta_box( 
            'faceblog_pages_meta_settings', // $id
            __( 'Post Options', 'faceblog' ), // $title
            'faceblog_pages_meta_settings_callback', // $callback
            'post', // $page
            'normal', // $context
            'high' // $priority
        );
	}
/*------------------------------------------------------------------------------*/
	/**
	 * Define page/post sidebar
	 */

	$faceblog_page_sidebar_layout = array(
        'right-sidebar' => array(
                        'value' => 'right_sidebar',
                        'label' => __( 'Right sidebar', 'faceblog' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/admin/assets/images/right-sidebar.png'
                    ),
        'left-sidebar' => array(
                        'value'     => 'left_sidebar',
                        'label'     => __( 'Left sidebar', 'faceblog' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/admin/assets/images/left-sidebar.png'
                    ),
        'no-sidebar' => array(
                        'value'     => 'no_sidebar',
                        'label'     => __( 'No sidebar', 'faceblog' ),
                        'thumbnail' => get_template_directory_uri() . '/inc/admin/assets/images/no-sidebar.png'
                    )
    );
/*---------------------------------------------------------------------------------------*/
/**
 * Call back function for Page option
 */
if( !function_exists( 'faceblog_pages_meta_settings_callback' ) ):
	function faceblog_pages_meta_settings_callback () {
		global $post, $faceblog_page_sidebar_layout;

		wp_nonce_field( basename( __FILE__ ), 'faceblog_pages_meta_nonce' );
?>
		<ul class="mt-page-meta-tabs">
	        <li class="meta-menu-titlebar active" atr="pg-metabox-info"><i class="fa fa-info"></i><?php _e( 'Information', 'faceblog' ); ?></li>        
	        <li class="meta-menu-sidebars" atr="pg-metabox-sidebars"><i class="fa fa-map-o"></i><?php _e( 'Sidebars', 'faceblog' ); ?></li>
	    </ul><!--.mt-page-meta-tabs-->
	    <div class="pg-metabox">
            <!-- Header -->
            <div id="pg-metabox-info" class="pg-metabox-inside">
                <h3><?php _e( 'About Metabox Options', 'faceblog' ); ?></h3>
                <hr />
                <ul>
                    <li><?php _e( "Sidebars is globally available to every page you create.", 'faceblog' ); ?></li>
                </ul>
            </div><!-- #pg-metabox-info-->

            <!-- Page sidebars -->
            <div id="pg-metabox-sidebars" class="pg-metabox-inside">
            	<div class="meta-row">
                    <div class="meta-title"> <?php _e( 'Available Sidebars', 'faceblog' ); ?> </div>
                    <span class="section-desc"><em><?php _e( 'Select available sidebar which replaced sidebar layout from customizer settings.', 'faceblog' ); ?></em></span>
                    <div class="meta-options">
                        <div class="layout-thmub-section">
			                <ul class="single-sidebar-layout" id="mt-img-container-meta">
			                <?php
			                    $img_count = 0 ; 
			                   foreach ( $faceblog_page_sidebar_layout as $field ) {
			                        $img_count++;
			                        $faceblog_page_sidebar = get_post_meta( $post->ID, 'faceblog_page_sidebar', true );
                                    $default_class ='';
			                        if( empty($faceblog_page_sidebar) && $img_count == 1 ){
			                            $img_class = 'faceblog-radio-img-selected';
			                        } else {
                                        $img_class = ( $field['value'] == $faceblog_page_sidebar )?'faceblog-radio-img-selected faceblog-radio-img-img':'faceblog-radio-img-img'; 
                                    }			                        
			                ?>
			                    <li>
			                        <label>
			                            <img class="<?php echo esc_attr( $img_class );?>" src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="<?php echo esc_attr( $field['label'] );?>" title="<?php echo esc_attr( $field['label'] );?>" />
			                            <input style = 'display:none' type="radio" value="<?php echo $field['value']; ?>" name="faceblog_page_sidebar" <?php checked( $field['value'], $faceblog_page_sidebar ); if( empty( $faceblog_page_sidebar ) && $field['value'] == 'right_sidebar' ){ echo "checked='checked'";}  ?> />
			                        </label>
			                    </li>
			                    
			                <?php } ?>
			                </ul>
			            </div><!-- .layout-thmub-section -->
                    </div><!-- .meta-options -->
                </div><!-- .meta-row -->
            </div><!--.pg-metabox-->
    		<div class="clear"></div>   
        </div><!-- #pg-metabox-sidebars -->
<?php
	}
endif;

/*------------------------------------------------------------------------------*/
/**
 * Save the metabox value
 */

add_action( 'pre_post_update', 'faceblog_save_page_sidebar_meta' );
/**
 * save the custom metabox data
 * @hooked to pre_post_update hook
 */
function faceblog_save_page_sidebar_meta( $post_id ) {
    global $post, $faceblog_page_sidebar_layout;

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'faceblog_pages_meta_nonce' ] ) || !wp_verify_nonce( $_POST[ 'faceblog_pages_meta_nonce' ], basename( __FILE__ ) ) )
      return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
      return;

    if ( 'page' == $_POST['post_type'] ) {
      if ( !current_user_can( 'edit_page', $post_id ) )
         return $post_id;
   }
   elseif ( !current_user_can( 'edit_post', $post_id ) ) {
      return $post_id;
   }

    //Execute this saving function
    
    
    $old_sidebar = get_post_meta( $post_id, 'faceblog_page_sidebar', true );
    $new_sidebar = sanitize_text_field( $_POST['faceblog_page_sidebar'] );
    
    if ( $new_sidebar && $new_sidebar != $old_sidebar ) {  
        update_post_meta ( $post_id, 'faceblog_page_sidebar', $new_sidebar );  
    } elseif ( '' == $new_sidebar && $old_sidebar ) {  
        delete_post_meta( $post_id,'faceblog_page_sidebar', $old_sidebar );  
    }
}

endif; //faceblog_page_metabox