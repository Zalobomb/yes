<?php
/**
 * Define custom fields for widgets
 * 
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

function faceblog_widgets_show_widget_field( $instance = '', $widget_field = '', $athm_field_value = '' ) {

    extract( $widget_field );

    switch ( $faceblog_widgets_field_type ) {

        // Standard text field
        case 'text' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id( $faceblog_widgets_name ); ?>"><?php echo $faceblog_widgets_title; ?>:</label>
                <input class="widefat" id="<?php echo $instance->get_field_id( $faceblog_widgets_name ); ?>" name="<?php echo $instance->get_field_name( $faceblog_widgets_name ); ?>" type="text" value="<?php echo $athm_field_value; ?>" />

                <?php if ( isset( $faceblog_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo $faceblog_widgets_description; ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Standard url field
        case 'url' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id( $faceblog_widgets_name ); ?>"><?php echo $faceblog_widgets_title; ?>:</label>
                <input class="widefat" id="<?php echo $instance->get_field_id( $faceblog_widgets_name ); ?>" name="<?php echo $instance->get_field_name( $faceblog_widgets_name ); ?>" type="text" value="<?php echo $athm_field_value; ?>" />

                <?php if ( isset( $faceblog_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo $faceblog_widgets_description; ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Textarea field
        case 'textarea' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id( $faceblog_widgets_name ); ?>"><?php echo $faceblog_widgets_title; ?>:</label>
                <textarea class="widefat" rows="<?php echo $faceblog_widgets_row; ?>" id="<?php echo $instance->get_field_id( $faceblog_widgets_name ); ?>" name="<?php echo $instance->get_field_name( $faceblog_widgets_name ); ?>"><?php echo $athm_field_value; ?></textarea>
            </p>
            <?php
            break;

        // Checkbox field
        case 'checkbox' :
            ?>
            <p>
                <input id="<?php echo $instance->get_field_id( $faceblog_widgets_name ); ?>" name="<?php echo $instance->get_field_name( $faceblog_widgets_name ); ?>" type="checkbox" value="1" <?php checked('1', $athm_field_value); ?>/>
                <label for="<?php echo $instance->get_field_id( $faceblog_widgets_name ); ?>"><?php echo $faceblog_widgets_title; ?></label>

                <?php if ( isset( $faceblog_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo $faceblog_widgets_description; ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Radio fields
        case 'radio' :
            ?>
            <p>
                <?php
                echo $faceblog_widgets_title;
                echo '<br />';
                foreach ( $faceblog_widgets_field_options as $athm_option_name => $athm_option_title ) {
                    ?>
                    <input id="<?php echo $instance->get_field_id( $athm_option_name ); ?>" name="<?php echo $instance->get_field_name( $faceblog_widgets_name ); ?>" type="radio" value="<?php echo $athm_option_name; ?>" <?php checked( $athm_option_name, $athm_field_value ); ?> />
                    <label for="<?php echo $instance->get_field_id( $athm_option_name ); ?>"><?php echo $athm_option_title; ?></label>
                    <br />
                <?php } ?>

                <?php if ( isset( $faceblog_widgets_description ) ) { ?>
                    <small><?php echo $faceblog_widgets_description; ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Select field
        case 'select' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id( $faceblog_widgets_name ); ?>"><?php echo $faceblog_widgets_title; ?>:</label>
                <select name="<?php echo $instance->get_field_name( $faceblog_widgets_name ); ?>" id="<?php echo $instance->get_field_id( $faceblog_widgets_name ); ?>" class="widefat">
                    <?php foreach ( $faceblog_widgets_field_options as $athm_option_name => $athm_option_title ) { ?>
                        <option value="<?php echo $athm_option_name; ?>" id="<?php echo $instance->get_field_id($athm_option_name); ?>" <?php selected( $athm_option_name, $athm_field_value ); ?>><?php echo $athm_option_title; ?></option>
                    <?php } ?>
                </select>

                <?php if ( isset( $faceblog_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo $faceblog_widgets_description; ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'number' :
            ?>
            <p>
                <label for="<?php echo $instance->get_field_id( $faceblog_widgets_name ); ?>"><?php echo $faceblog_widgets_title; ?>:</label><br />
                <input name="<?php echo $instance->get_field_name( $faceblog_widgets_name ); ?>" type="number" step="1" min="1" id="<?php echo $instance->get_field_id( $faceblog_widgets_name ); ?>" value="<?php echo $athm_field_value; ?>" class="small-text" />

                <?php if ( isset( $faceblog_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo $faceblog_widgets_description; ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'upload' :

            $output = '';
            $id = $instance->get_field_id( $faceblog_widgets_name );
            $class = '';
            $int = '';
            $value = $athm_field_value;
            $name = $instance->get_field_name( $faceblog_widgets_name );


            if ( $value ) {
                $class = ' has-file';
                $value = explode( 'wp-content', $value );
                $value = content_url().$value[1];
            }
            $output .= '<div class="sub-option widget-upload">';
            $output .= '<label for="' . $instance->get_field_id( $faceblog_widgets_name ) . '">' . $faceblog_widgets_title . '</label><br/>';
            $output .= '<input id="' . $id . '" class="upload' . $class . '" type="text" name="' . $name . '" value="' . $value . '" placeholder="' . __( 'No file chosen', 'faceblog' ) . '" />' . "\n";
            if ( function_exists( 'wp_enqueue_media' ) ) {
                if ( ( $value == '') ) {
                    $output .= '<input id="upload-' . $id . '" class="upload-button button" type="button" value="' . __( 'Upload', 'faceblog' ) . '" />' . "\n";
                } else {
                    $output .= '<input id="remove-' . $id . '" class="remove-file button" type="button" value="' . __( 'Remove', 'faceblog' ) . '" />' . "\n";
                }
            } else {
                $output .= '<p><i>' . __( 'Upgrade your version of WordPress for full media support.', 'faceblog' ) . '</i></p>';
            }

            $output .= '<div class="screenshot upload-thumb" id="' . $id . '-image">' . "\n";

            if ($value != '') {
                $remove = '<a class="remove-image">'. __( 'Remove', 'faceblog' ).'</a>';
                $attachment_id = faceblog_get_attachment_id_from_url( $value );
                $image_array = wp_get_attachment_image_src( $attachment_id, 'medium' );
                $image = preg_match( '/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value );
                if ($image) {
                    $output .= '<img src="' . $image_array[0] . '" alt="" />';
                } else {
                    $parts = explode( "/", $value );
                    for ( $i = 0; $i < sizeof( $parts ); ++$i ) {
                        $title = $parts[$i];
                    }

                    // No output preview if it's not an image.
                    $output .= '';

                    // Standard generic output if it's not an image.
                    $title = __( 'View File', 'faceblog' );
                    $output .= '<div class="no-image"><span class="file_link"><a href="' . $value . '" target="_blank" rel="external">' . $title . '</a></span></div>';
                }
            }
            $output .= '</div></div>' . "\n";
            echo $output;
            break;        
    }
}

function faceblog_widgets_updated_field_value( $widget_field, $new_field_value ) {

    extract( $widget_field );

    // Allow only integers in number fields
    if ( $faceblog_widgets_field_type == 'number') {
        return intval( $new_field_value );

        // Allow some tags in textareas
    } elseif ( $faceblog_widgets_field_type == 'textarea' ) {
        // Check if field array specifed allowed tags
        if ( !isset( $faceblog_widgets_allowed_tags ) ) {
            // If not, fallback to default tags
            $faceblog_widgets_allowed_tags = '<p><strong><em><a>';
        }
        return strip_tags( $new_field_value, $faceblog_widgets_allowed_tags );

        // No allowed tags for all other fields
    } elseif ( $faceblog_widgets_field_type == 'url' ) {
        return esc_url( $new_field_value );
    } else {
        return strip_tags( $new_field_value );
    }
}

/**
 * Enqueue scripts for file uploader
 */
global $pagenow;
if ( ( $pagenow == 'widgets.php' ) ) {
    function faceblog_widget_admin_scripts( $hook ) {
        
        if (function_exists('wp_enqueue_media')){
            wp_enqueue_media();
        }
    }    
    add_action( 'admin_enqueue_scripts', 'faceblog_widget_admin_scripts' );
}