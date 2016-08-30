<?php
/**
 * Metabox for toggling the header area on a per page basis
 *
 * @package Tora
 */


function tora_header_toggle_init() {
    new Tora_Header_Toggle();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'tora_header_toggle_init' );
    add_action( 'load-post-new.php', 'tora_header_toggle_init' );
}

class Tora_Header_Toggle {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        $post_types = array('post', 'page');
        if ( in_array( $post_type, $post_types )) {
			add_meta_box(
				'tora_header_metabox'
				,__( 'Page header', 'tora' )
				,array( $this, 'render_meta_box_content' )
				,$post_type
				,'side'
				,'low'
			);
        }
	}

	public function save( $post_id ) {
	
		// Check if our nonce is set.
		if ( ! isset( $_POST['tora_header_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['tora_header_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'tora_header_box' ) )
			return $post_id;

		// If this is an autosave, our form has not been submitted,
                //     so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		// Sanitize the user input.
		$mydata = isset( $_POST['tora_header_field'] ) ? (bool) $_POST['tora_header_field'] : false;

		// Update the meta field.
		update_post_meta( $post_id, '_tora_header_key', $mydata );
	}

	public function render_meta_box_content( $post ) {
	
		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'tora_header_box', 'tora_header_box_nonce' );

		// Use get_post_meta to retrieve an existing value from the database.
		$value = get_post_meta( $post->ID, '_tora_header_key', true );

	?>

		<p><input type="checkbox" class="checkbox" id="tora_header_field" name="tora_header_field" <?php checked( $value ); ?> />
		<label for="tora_header_field"><?php _e( 'Disable the header for this page?', 'tora' ); ?></label><br />

	<?php
	}
}