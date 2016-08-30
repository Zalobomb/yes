<?php
/*
 * Template Name: Home
 *
 * @package scrollme
 *
 */
get_header();
?>
<div id="fullpage" class="scrollme-home">
    <div class="scrollme-main-section" data-anchor="home">
        <?php
        $section_id = esc_attr(get_theme_mod( 'scrollme_section_home', '' ));
        $slider_cat = absint(get_theme_mod( 'scrollme_slider_category', 0 ));
        ?>
        <section id="home" data-anchor="<?php echo $section_id; ?>" class="sec-slide slider-section" data-index="1">
            <?php if( isset( $slider_cat ) && $slider_cat != 0 ): ?>
                <?php
                $cat_args = array( 'cat' => $slider_cat );
                $cat_query = new WP_Query( $cat_args );
                if( $cat_query->have_posts() ) {

                    echo '<ul class="scrollme-slider">';

                    while( $cat_query->have_posts() ) {
                        $cat_query->the_post();
                        $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                        echo '<li class="bx-slides">';
                        ?>
                        <div class="slide-bg" style="background-image:url(<?php echo esc_url($post_thumb[0]); ?>)"></div>

                        <?php if( esc_attr(get_theme_mod( 'scrollme_slider_caption', 'yes' )) == 'yes' ): ?>
                            <div class="slide-caption slideInUp animated">
                                <div class="slide-title">
                                    <?php echo get_the_title(); ?>
                                </div>
                                <div class="slide-desc">
                                    <?php echo get_the_content(); ?>
                                </div>
                            </div>
                        <?php endif; 

                        echo '</li>';

                    }
                    echo '</ul>';
                    wp_reset_postdata();
                }
                
                endif; ?>
            <div class="h-logo">
                <?php
                $h_logo = esc_url(get_theme_mod( 'scrollme_home_logo', '' ));
                if( $h_logo ){
                    ?>
                    <img src="<?php echo $h_logo; ?>" >
                <?php
                }
                ?>
            </div>
        </section>

        <?php        
        $data_index = 1; // For section data-index
        for( $i=1; $i<=7; $i++ ) {
            if(!get_theme_mod( 'scrollme_section_'.$i.'_disable')){
            $section_id = sanitize_title(get_theme_mod( 'scrollme_section_'.$i, '' ));
            $section_type = sanitize_text_field(get_theme_mod( 'scrollme_section_'.$i.'_type', 'page' ));
            
            if($section_type == 'page') {
                $section = 'page';
                $page_id = absint(get_theme_mod( 'scrollme_section_page_'.$i));
            } else {
                $section = sanitize_text_field(get_theme_mod('scrollme_section_layout'.$i, 'services'));
            }
        
            $class = $section.'-section';
            ?>
                <section id="<?php echo $section_id; ?>" data-anchor="<?php echo $section_id; ?>" class="sec-slide <?php echo $class;?>" data-index="<?php echo ++$data_index; ?>">
                    <?php
                        switch ($section) {
                            case 'page' :
                                scrollme_slide_page($page_id);
                                break;
                                
                            case 'services' :
                                scrollme_slide_service();
                                break;
                                
                            case 'portfolio' :
                                scrollme_slide_portfolio();
                                break;
                                
                            case 'clients' :
                                scrollme_slide_clients();
                                break;
                                
                            case 'contact' :
                                scrollme_slide_contact();
                                break;
                            
                            case 'blog' :
                                scrollme_slide_blog();
                                break;
                                
                            default :
                                get_template_part( 'template-parts/content', 'none' );
                                break;
                        }
                    ?>
                </section>
            <?php
            }
        } // end of for
        ?>
    </div>
</div> <!-- #fullpage -->
<?php
get_footer();