<?php
/**
 * 8Medi Lite functions and definitions
 *
 * @package 8Medi Lite
 */
/**
 * My Functions
 */

//adding custom scripts and styles in header for favicon and other
function eightmedi_lite_header_scripts(){
	$appointment_bg_v = get_theme_mod('eightmedi_lite_appointment_bkgimage');
	echo "<style type='text/css' media='all'>";
	if(!empty($appointment_bg_v)){
		$appointment_bg_v =   '.appointment .custom-appointment-form { background: url("'.esc_url($appointment_bg_v).'") no-repeat scroll right bottom rgba(0, 0, 0, 0); }';
		echo $appointment_bg_v;
		echo "\n";
	}
	echo "</style>\n";
}
add_action('wp_head','eightmedi_lite_header_scripts');

function eightmedi_lite_web_layout($classes){
	$web_layout = get_theme_mod('eightmedi_lite_webpage_layout','fullwidth');
	if($web_layout == 'boxed'){
		$classes[]= 'boxed-layout';
	}
	elseif($web_layout == 'fullwidth'){
		$classes[]='fullwidth';
	}
	
	return $classes;
}
add_filter( 'body_class', 'eightmedi_lite_web_layout' );

add_action('eightmedi_lite_homepage_slider_config','eightmedi_lite_homepage_slider_config');
//homepage slider configuration settings
function eightmedi_lite_homepage_slider_config(){
	$display_slider = (get_theme_mod('eightmedi_lite_display_slider'))?get_theme_mod('eightmedi_lite_display_slider'):"1";
	
	$display_pager = absint( get_theme_mod('eightmedi_lite_display_pager','0') );
	($display_pager=='1')?$display_pager='true':$display_pager='false';
	
	$display_controls = absint ( get_theme_mod('eightmedi_lite_display_controls','0'));
	($display_controls=='1')?$display_controls='true':$display_controls='false';
	
	$auto_transition = absint ( get_theme_mod('eightmedi_lite_auto_transition','0'));
	($auto_transition=='1')?$auto_transition='true':$auto_transition='false';
	
	$transition_type = absint ( get_theme_mod('eightmedi_lite_transition_type','0'));
	($transition_type=='1')?$transition_type='horizontal':$transition_type='fade';

	$transition_speed = absint( get_theme_mod( 'eightmedi_lite_transition_speed', 5000 ) );	

	$transition_pause = absint( get_theme_mod( 'eightmedi_lite_transition_pause', 1000 ) );	

	// Send data to client
	wp_localize_script('eightmedi-lite-custom-scripts', 'SliderData', array(
		'mode' => $transition_type,
		'controls' => $display_controls,
		'speed' => $transition_speed,
		'pause' => $transition_pause,
		'pager' => $display_pager,
		'auto' => $auto_transition
		));
	
	/*
	if( $display_slider != "0") : ?>
	<script type="text/javascript">
		jQuery(function($){
			$('#home-slider .em-slider').bxSlider({
				mode: '<?php echo $transition_type;?>',
				controls: <?php echo $display_controls; ?>,
				speed: <?php echo $transition_speed; ?>,
				pause: <?php echo $transition_pause; ?>,
				pager: <?php echo $display_pager; ?>,
				auto : <?php echo $auto_transition; ?>
			});
		});
	</script>
	<?php endif;
	*/
}


add_action('eightmedi_lite_homepage_slider','eightmedi_lite_homepage_slider_content', 10);
//homepage slider content
function eightmedi_lite_homepage_slider_content(){
	$display_slider = absint ( get_theme_mod('eightmedi_lite_display_slider','1') );

	$display_captions = absint ( get_theme_mod('eightmedi_lite_slider_text', '1') );
	
	if( $display_slider == "1"){
		?>
		<div id="home-slider">
			<?php 
			$slider_category = get_theme_mod('eightmedi_lite_slider_category');
			if( !empty($slider_category)) {
				$loop = new WP_Query(
					array(
						'cat' => $slider_category,
						'posts_per_page' => -1    
						)
					);
				?>
				<div class="em-slider">
					<?php
					if($loop->have_posts()) {
						while($loop->have_posts()) {
							$loop->the_post();
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false );
							?>
							<div class="slides">
								<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" />
								<?php
								if($display_captions == '1'){
									?>
									<div class="caption-wrapper">  
										<div class="em-container">
											<div class="slider-caption">
												<div class="mid-content">
													<div class="slider-title"> <?php the_title(); ?> </div>
													<div class="slider-content"> <?php the_content(); ?> </div>
												</div>
											</div>
										</div>
									</div>
									<?php
								}
								?>
							</div>
							<?php 
						}
					}
					?>
				</div>
				<a href="#featured-content" class="home-slider-pointer"><i class="fa fa-angle-double-down"></i></a>
				<a class="home-slider-pointer cta-btn" href="<?php echo get_theme_mod('eightmedi_lite_slider_cta_btnlink','#book-an-appointment');?>"><?php echo get_theme_mod('eightmedi_lite_slider_cta_btntext',__('BOOK AN APPOINTMENT','eightmedi-lite'));?></a>
				<?php
			}
			?>
		</div>
		<?php
	}
}

	//Social Icons Settings
add_action('eightmedi_lite_social_links','eightmedi_lite_social_links', 10);
function eightmedi_lite_social_links(){
	$facebooklink = esc_url( get_theme_mod('eightmedi_lite_social_facebook') );
	$twitterlink = esc_url( get_theme_mod('eightmedi_lite_social_twitter') );
	$google_pluslink = esc_url( get_theme_mod('eightmedi_lite_social_googleplus') );
	$youtubelink = esc_url( get_theme_mod('eightmedi_lite_social_youtube') );
	$pinterestlink = esc_url( get_theme_mod('eightmedi_lite_social_pinterest') );
	$linkedinlink = esc_url( get_theme_mod('eightmedi_lite_social_linkedin') );
	$vimeolink = esc_url( get_theme_mod('eightmedi_lite_social_vimeo') );
	$instagramlink = esc_url( get_theme_mod('eightmedi_lite_social_instagram') );
	$skypelink = esc_url( get_theme_mod('eightmedi_lite_social_skype') );
	?>
	<div class="social-icons">
		<?php 
		if(!empty($facebooklink)){ ?>
			<a href="<?php echo $facebooklink; ?>" class="facebook" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
			<?php 
		}
		if(!empty($twitterlink)){ ?>
			<a href="<?php echo $twitterlink; ?>" class="twitter" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
			<?php 
		}
		if(!empty($google_pluslink)){ ?>
			<a href="<?php echo $google_pluslink; ?>" class="gplus" data-title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php 
		}
		if(!empty($youtubelink)){ ?>
			<a href="<?php echo $youtubelink; ?>" class="youtube" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a>
			<?php 
		}
		if(!empty($pinterestlink)){ ?>
			<a href="<?php echo $pinterestlink; ?>" class="pinterest" data-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
			<?php 
		}
		if(!empty($linkedinlink)){ ?>
			<a href="<?php echo $linkedinlink; ?>" class="linkedin" data-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
			<?php 
		}
		if(!empty($vimeolink)){ ?>
			<a href="<?php echo $vimeolink; ?>" class="vimeo" data-title="Vimeo" target="_blank"><i class="fa fa-vimeo-square"></i></a>
			<?php 
		}
		if(!empty($instagramlink)){ ?>
			<a href="<?php echo $instagramlink; ?>" class="instagram" data-title="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
			<?php 
		}
		if(!empty($skypelink)){ ?>
			<a href="<?php echo __('skype:','eightmedi-lite').$skypelink; ?>" class="skype" data-title="Skype"><i class="fa fa-skype"></i></a>
			<?php
		} ?>
	</div>
	<?php
}

	/** 
	 * Truncates text without breaking HTML Code
	 */
	function eightmedi_lite_excerpt($eightmedi_lite_text, $eightmedi_lite_length = 100, $eightmedi_lite_ending = '...', $eightmedi_lite_exact = true, $eightmedi_lite_considerHtml = true) {
		if ($eightmedi_lite_considerHtml) {
  // if the plain text is shorter than the maximum length, return the whole text
			if (strlen(preg_replace('/<.*?>/', '', $eightmedi_lite_text)) <= $eightmedi_lite_length) {
				return $eightmedi_lite_text;
			}

  // splits all html-tags to scanable lines
			preg_match_all('/(<.+?>)?([^<>]*)/s', $eightmedi_lite_text, $eightmedi_lite_lines, PREG_SET_ORDER);

			$eightmedi_lite_total_length = strlen($eightmedi_lite_ending);
			$eightmedi_lite_open_tags = array();
			$eightmedi_lite_truncate = '';

			foreach ($eightmedi_lite_lines as $eightmedi_lite_line_matchings) {
   // if there is any html-tag in this line, handle it and add it (uncounted) to the output
				if (!empty($eightmedi_lite_line_matchings[1])) {
    // if it’s an “empty element” with or without xhtml-conform closing slash (f.e.)
					if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $eightmedi_lite_line_matchings[1])) {
    // do nothing
    // if tag is a closing tag (f.e.)
					} else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $eightmedi_lite_line_matchings[1], $eightmedi_lite_tag_matchings)) {
     // delete tag from $open_tags list
						$eightmedi_lite_pos = array_search($eightmedi_lite_tag_matchings[1], $eightmedi_lite_open_tags);
						if ($eightmedi_lite_pos !== false) {
							unset($eightmedi_lite_open_tags[$eightmedi_lite_pos]);
						}
     // if tag is an opening tag (f.e. )
					} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $eightmedi_lite_line_matchings[1], $eightmedi_lite_tag_matchings)) {
     // add tag to the beginning of $open_tags list
						array_unshift($eightmedi_lite_open_tags, strtolower($eightmedi_lite_tag_matchings[1]));
					}
    // add html-tag to $truncate’d text
					$eightmedi_lite_truncate .= $eightmedi_lite_line_matchings[1];
				}

   // calculate the length of the plain text part of the line; handle entities as one character
				$eightmedi_lite_content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $eightmedi_lite_line_matchings[2]));
				if ($eightmedi_lite_total_length+$eightmedi_lite_content_length > $eightmedi_lite_length) {
    // the number of characters which are left
					$eightmedi_lite_left = $eightmedi_lite_length - $eightmedi_lite_total_length;
					$eightmedi_lite_entities_length = 0;
    // search for html entities
					if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $eightmedi_lite_line_matchings[2], $eightmedi_lite_entities, PREG_OFFSET_CAPTURE)) {
     // calculate the real length of all entities in the legal range
						foreach ($eightmedi_lite_entities[0] as $eightmedi_lite_entity) {
							if ($eightmedi_lite_entity[1]+1-$eightmedi_lite_entities_length <= $eightmedi_lite_left) {
								$eightmedi_lite_left--;
								$eightmedi_lite_entities_length += strlen($eightmedi_lite_entity[0]);
							} else {
       // no more characters left
								break;
							}
						}
					}
					$eightmedi_lite_truncate .= substr($eightmedi_lite_line_matchings[2], 0, $eightmedi_lite_left+$eightmedi_lite_entities_length);
    // maximum lenght is reached, so get off the loop
					break;
				} else {
					$eightmedi_lite_truncate .= $eightmedi_lite_line_matchings[2];
					$eightmedi_lite_total_length += $eightmedi_lite_content_length;
				}

   // if the maximum length is reached, get off the loop
				if($eightmedi_lite_total_length >= $eightmedi_lite_length) {
					break;
				}
			}
		} else {
			if (strlen($eightmedi_lite_text) <= $eightmedi_lite_length) {
				return $eightmedi_lite_text;
			} else {
				$eightmedi_lite_truncate = substr($eightmedi_lite_text, 0, $eightmedi_lite_length - strlen($eightmedi_lite_ending));
			}
		}

 // if the words shouldn't be cut in the middle...
		if (!$eightmedi_lite_exact) {
  // ...search the last occurance of a space...
			$eightmedi_lite_spacepos = strrpos($eightmedi_lite_truncate, ' ');
			if (isset($eightmedi_lite_spacepos)) {
   // ...and cut the text in this position
				$eightmedi_lite_truncate = substr($eightmedi_lite_truncate, 0, $eightmedi_lite_spacepos);
			}
		}

 // add the defined ending to the text
		$eightmedi_lite_truncate .= $eightmedi_lite_ending;

		if($eightmedi_lite_considerHtml) {
  // close all unclosed html-tags
			foreach ($eightmedi_lite_open_tags as $eightmedi_lite_tag) {
				$eightmedi_lite_truncate .= '';
			}
		}

		return $eightmedi_lite_truncate;

	}



	/** Plugin Install ***/
	function eightmedi_lite_required_plugins() {

/**
* Array of plugin arrays. Required keys are name and slug.
* If the source is NOT from the .org repo, then source is also required.
*/
$plugins = array(
	array(
		'name'      => 'Ultimate Form Builder Lite',
		'slug'      => 'ultimate-form-builder-lite',
		'required'  => true,		
		'force_activation'   => false,
		'force_deactivation' => false,
		),
	array(
		'name'      => '8 Degree Coming Soon Page',
		'slug'      => '8-degree-coming-soon-page',
		'required'  => false,
		'force_activation'   => false,
		'force_deactivation' => true,
		),
	array(
		'name'      => '8 Degree Availability Calendar',
		'slug'      => '8-degree-availability-calendar',
		'required'  => false,
		'force_activation'   => false,
		'force_deactivation' => true,
		)
	);

	/**
	* Array of configuration settings. Amend each line as needed.
	* If you want the default strings to be available under your own theme domain,
	* leave the strings uncommented.
	* Some of the strings are added into a sprintf, so see the comments at the
	* end of each line for what each argument will be.
	*/
	$config = array(
		'default_path' => '',
		'menu'         => 'eightmedi-lite-install-plugins',
		'has_notices'  => true,
		'dismissable'  => false,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'eightmedi-lite' ),
			'menu_title'                      => __( 'Install Plugins', 'eightmedi-lite' ),
			'installing'                      => __( 'Installing Plugin: %s', 'eightmedi-lite' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'eightmedi-lite' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','eightmedi-lite' ),
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','eightmedi-lite' ),
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','eightmedi-lite' ),
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','eightmedi-lite' ),
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','eightmedi-lite' ),
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','eightmedi-lite' ),
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','eightmedi-lite' ),
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','eightmedi-lite' ),
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','eightmedi-lite' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','eightmedi-lite' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'eightmedi-lite' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'eightmedi-lite' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'eightmedi-lite' ),
			'nag_type'                        => 'updated'
			)
		);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'eightmedi_lite_required_plugins' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

function eightmedi_lite_wrapper_start() {
    echo '<div class="ed-container"><div id="primary" class="right-sidebar">';
}
add_action('woocommerce_before_main_content', 'eightmedi_lite_wrapper_start', 10);

function eightmedi_lite_wrapper_end() {
    echo '</div>';
    do_action( 'woocommerce_sidebar' );
    echo '</div>';
}
add_action('woocommerce_after_main_content','eightmedi_lite_wrapper_end',9);

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 8;' ), 20 );