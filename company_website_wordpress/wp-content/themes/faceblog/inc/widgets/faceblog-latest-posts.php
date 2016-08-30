<?php
/**
 * Latest Posts widget used in Sidebar.
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */


add_action( 'widgets_init', 'faceblog_register_latest_posts_widget' );

function faceblog_register_latest_posts_widget() {
    register_widget( 'faceblog_latest_posts' );
}

/**
 * Extend WP_Widget for latest posts
 */
class Faceblog_Latest_posts extends WP_Widget {

	public function __construct() {
        parent::__construct(
            'faceblog_latest_posts', 'FaceBlog: Latest Posts', array(
            'description' => __( 'A widget that shows latest posts', 'faceblog' )
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'latest_posts_title' => array(
                'faceblog_widgets_name' => 'latest_posts_title',
                'faceblog_widgets_title' => __( 'Title', 'faceblog' ),
                'faceblog_widgets_field_type' => 'text',
                ),
            'latest_posts_count' => array(
                'faceblog_widgets_name' => 'latest_posts_count',
                'faceblog_widgets_title' => __( 'Number of Posts', 'faceblog' ),
                'faceblog_widgets_field_type' => 'number',
            ),            
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );

        if( empty( $instance ) ) {
            return;
        }

        $latest_posts_title = $instance[ 'latest_posts_title' ];
        $posts_count = $instance['latest_posts_count'];
        echo $before_widget; 
    ?>
        <div class="latest-posts clearfix">
           <h2 class="widget-title"><?php echo esc_attr( $latest_posts_title ); ?></h2>     
           <div class="latest-posts-wrapper">
                <?php
                    $latest_posts_args = array( 'post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>$posts_count, 'order'=>'DESC' );
                    $latest_posts_query = new WP_Query( $latest_posts_args );
                    if( $latest_posts_query->have_posts() ) {
                        while( $latest_posts_query->have_posts() ) {
                            $latest_posts_query->the_post();
                            $image_id = get_post_thumbnail_id();
                            $image_path = wp_get_attachment_image_src( $image_id, 'thumbnail', true );
                            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                ?>
                    <div class="latest-single-post clearfix">
                        <div class="latest-post-img">
                        	<a href="<?php the_permalink();?>" title="<?php the_title();?>">
	                            <?php if( has_post_thumbnail() ) { ?>
	                             <figure><img src="<?php echo $image_path[0];?>" alt="<?php echo esc_attr( $image_alt );?>" /></figure>
	                            <?php } ?>
                        	</a>
                        </div><!-- .latest-post-img -->
                        <div class="latest-post-desc-wrapper">
                            <h4 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                            <div class="post-meta"><?php faceblog_posted_on();?></div>
                        </div><!-- .latest-post-desc-wrapper -->
                    </div><!-- .latest-single-post -->
                <?php
                        }                                               
                    }
                ?>
           </div><!-- .latest-posts-wrapper -->
        </div><!-- .latest-posts-wrapper -->
        <?php 
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	faceblog_mag_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[ $faceblog_widgets_name ] = faceblog_widgets_updated_field_value( $widget_field, $new_instance[ $faceblog_widgets_name ] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	faceblog_mag_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form( $instance ) {

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $faceblog_widgets_field_value = !empty($instance[$faceblog_widgets_name]) ? esc_attr($instance[$faceblog_widgets_name]) : '';
            faceblog_widgets_show_widget_field($this, $widget_field, $faceblog_widgets_field_value);
        }
    }


}