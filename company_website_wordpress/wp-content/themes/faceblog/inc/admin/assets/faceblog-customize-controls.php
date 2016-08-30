<?php
/**
 * Custom calsses and definitions for customizer
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 * 
 */

if( class_exists( 'WP_Customize_Control' ) ) {

	class FaceBlog_Customize_Category_Control extends WP_Customize_Control {
		/**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select Category &mdash;', 'faceblog' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
 
            // Hackily add in the data link parameter.
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
                $this->label,
                $this->description,
                $dropdown
            );
        }
    }

    /**
     * Customize for textarea, extend the WP customizer
     */
    class FaceBlog_Textarea_Custom_Control extends WP_Customize_Control{
    	/**
    	 * Render the control's content.
    	 * 
    	 */
    	public $type = 'faceblog_textarea';

      	public function render_content() {
    ?>
    		<label>
    			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
						<?php echo esc_textarea( $this->value() ); ?>
				</textarea>
    		</label>
    <?php
    	}
    }

    /**
     * Image control by radtion button 
     */
    class FaceBlog_Image_Radio_Control extends WP_Customize_Control {

        public function render_content() {

            if ( empty( $this->choices ) )
                return;

            $name = '_customize-radio-' . $this->id;

            ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <ul class="controls" id ="faceblog-img-container">
            <?php
                foreach ( $this->choices as $value => $label ) :
                    $class = ($this->value() == $value)?'faceblog-radio-img-selected faceblog-radio-img-img':'faceblog-radio-img-img';
                    ?>
                    <li style="display: inline;">
                    <label>
                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                        <img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo $class; ?>' />
                    </label>
                    </li>
                    <?php
                endforeach;
            ?>
            </ul>
            <?php
        }
    }

}