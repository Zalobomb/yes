<?php
    /** Scrollme Extra Customizer Controls **/
    if( class_exists( 'WP_Customize_Control' ) ):
    	
        /** Select Page Control **/
        class WP_Customize_Select_Page_Control extends WP_Customize_Control {
            
            public function render_content() {
                $pages = $this->scrollme_get_par_pagelist();
                
                if ( empty( $pages ) )
                return;
                
                ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                    
                    <select <?php $this->link(); ?>>
                    <?php
                    foreach ( $pages as $value => $label )
                    echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
                    ?>
                    </select>
                </label>
                <?php
            }
            
            public function scrollme_get_par_pagelist() {
                $pglist = array();
                $pglist[0] = 'Select Page';
                
                $pages = get_pages(array('parent' => 0));
                foreach($pages as $page) {
                    $pglist[$page->ID] = $page->post_title;
                }
                
                return $pglist;
            }
        }
        
        /** Select Single Category Control **/
        class WP_Customize_Select_Single_Cat_Control extends WP_Customize_Control {
            public function render_content() {
                $cats = $this->scrollme_get_catlist();
                $values = $this->value();
                
                if ( empty( $cats ) )
                return;
                ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                    
                    <select <?php $this->link(); ?>>
                    <?php
                    foreach ( $cats as $id => $label )
                    echo '<option value="' . esc_attr( $id ) . '"' . selected( $this->value(), $id, false ) . '>' . $label . '</option>';
                    ?>
                    </select>   
                </label>
                <?php
            }
            
            public function scrollme_get_catlist() {
                $catlist = array();
                
                $catlist[0] = 'Select Category';
                $categories = get_categories( array('hide_empty' => 0) );
                
                foreach($categories as $cat){
                    $catlist[$cat->term_id] = $cat->name;
                }
                
                return $catlist;
            }
        }
        
        /** Exclude Multiple Category Control **/
        class WP_Customize_Select_Mul_Cat_Control extends WP_Customize_Control {
            public function render_content() {
                $cats = $this->scrollme_get_catlist();
                $values = $this->value();
                
                if ( empty( $cats ) )
                return;
                ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                    
                    <?php if ( ! empty( $this->label ) ) : ?>
                        <div id="ex-cat-wrap">
                            <?php $cat_arr = explode(',', $values); array_pop($cat_arr); $count = 1; ?>
                            
                            <?php foreach($cats as $id => $label) : ?>
                                <div class="chk-group <?php if($count++%2 == 0){echo "right";}else{echo "left";} ?>">
                                    <input id="ex-cat-<?php echo $id; ?>" type="checkbox" value="<?php echo $id; ?>" <?php if(in_array($id,$cat_arr)){ echo "checked"; }; ?> />
                                    <label for="ex-cat-<?php echo $id; ?>"><?php echo $label; ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <input type="hidden" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
                    <?php endif; ?>    
                </label>
                <?php
            }
            
            public function scrollme_get_catlist() {
                $catlist = array();
                $categories = get_categories( array('hide_empty' => 0) );
                
                foreach($categories as $cat){
                    $catlist[$cat->term_id] = $cat->name;
                }
                
                return $catlist;
            }
        }
        
        /** Select Widget Control **/
        class WP_Customize_Select_Widget_Control extends WP_Customize_Control {
            
            public function render_content() {
                $sidebars = $this->scrollme_get_registered_sidebars();
                
                if ( empty( $sidebars ) )
                return;
                
                ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                    
                    <select <?php $this->link(); ?>>
                    <?php
                    foreach ( $sidebars as $sidebar )
                    echo '<option value="' . esc_attr( $sidebar['id'] ) . '"' . selected( $this->value(), $sidebar['id'], false ) . '>' . $sidebar['name'] . '</option>';
                    ?>
                    </select>
                </label>
                <?php
            }
            
            public function scrollme_get_registered_sidebars() {
                $sidebars = array();
                
                $sidebars['sidebar-none'] = array('name' => 'Select Widget', 'id' => 0);
                $rsidebars = $GLOBALS['wp_registered_sidebars'];
                
                if(!empty($rsidebars)) {
                    foreach($rsidebars as $rsidebar) {
                        $sidebars[$rsidebar['id']] = array('name' => $rsidebar['name'], 'id' => $rsidebar['id']);
                    }
                }
                
                return $sidebars;
            }
        }
        
        /** Help Info Control **/
        class WP_Customize_Help_Info_Control extends WP_Customize_Control {
            
            public function render_content() {
                $input_attrs = $this->input_attrs;
                $info = isset($input_attrs['info']) ? $input_attrs['info'] : '';
                ?>
                <div class="help-info">
                    <h4 class="help-info-title"><?php _e('Instruction', 'scrollme'); ?></h4>
                    <div style="font-weight: bold;">
                        <?php echo $info; ?>
                    </div>
                </div>
                <?php
            }
        }        
        
        /** Select Post Control **/
        class WP_Customize_Select_Post_Control extends WP_Customize_Control {
            
            public function render_content() {
                $posts = $this->scrollme_get_posts();
                
                if ( empty( $posts ) )
                return;
                
                ?>
                <label>
                    <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                    
                    <select <?php $this->link(); ?>>
                    <?php
                    foreach ( $posts as $id => $label )
                    echo '<option value="' . $id . '"' . selected( $this->value(), $id, false ) . '>' . $label . '</option>';
                    ?>
                    </select>
                </label>
                <?php
            }
            
            public function scrollme_get_posts() {
                $postlist = array();
                $postlist[0] = 'Select Post';
                
                $posts = get_posts();
                
                foreach($posts as $post) {
                    $postlist[$post->ID] = $post->post_title;
                }
                
                return $postlist;
            }
        }

        // AccessPress Store Pro Features
        if(class_exists( 'WP_Customize_control')){
            class Theme_Info_Custom_Control extends WP_Customize_Control
            {
                public function render_content()
                {
                    ?>
                    <label>
                        <h2 class="customize-title"><?php echo esc_html( $this->label ); ?></h2>
                        <br />
                        <span class="customize-text_editor_desc">                  
                          <img class="feat-list-img" src="<?php echo get_template_directory_uri() ?>/images/feature-list-pro.jpg"/>
                              <ul class="admin-pro-feature-list">   
                                <li><span><?php _e('Fully built on customizer!','scrollme'); ?> </span></li>
                                <li><span><?php _e('Full Page Slider Options','scrollme'); ?> </span></li>
                                <li><span><?php _e('Advanced Typography Options','scrollme'); ?> </span></li>
                                <li><span><?php _e('Custom Template Color','scrollme'); ?> </span></li>
                                <li><span><?php _e('Added Horizontal Sections','scrollme'); ?> </span></li>
                                <li><span><?php _e('Custom Section Background','scrollme'); ?> </span></li>
                                <li><span><?php _e('9 Preloader','scrollme'); ?> </span></li>
                                <li><span><?php _e('Home Section Reorder Option','scrollme'); ?> </span></li>
                                <li><span><?php _e('Youtube video integration','scrollme'); ?> </span></li>
                                <li><span><?php _e('Advance Team Page','scrollme'); ?> </span></li>
                                <li><span><?php _e('Beautiful Portfolio Page','scrollme'); ?> </span></li>
                                <li><span><?php _e('13 Inbuilt Widgets','scrollme'); ?> </span></li>
                                <li><span><?php _e('13 Inbuilt useful Shortcodes','scrollme'); ?> </span></li>
                                <li><span><?php _e('Countdown Page','scrollme'); ?> </span></li>
                            </ul>

                            <a href="https://accesspressthemes.com/wordpress-themes/scrollme-pro/" class="button button-primary buynow" target="_blank"><?php _e('Buy Now','scrollme'); ?></a>
                        </span>
                    </label>
                    <?php
                }
            }
        }
        
    endif; /** Condition to Check if WP_Customize_Control Class exists **/