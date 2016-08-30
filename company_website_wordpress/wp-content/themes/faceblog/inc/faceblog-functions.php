<?php
/**
 * Define custom functions for faceblog
 *
 * @package MysteryThemes
 * @subpackage FaceBlog
 * @since 1.0.0
 */

/*--------------------------------------------------------------------------------*/
/**
 * Add admin styles and scripts
 */
add_action( 'admin_enqueue_scripts', 'faceblog_admin_style_scripts' );

if( !function_exists( 'faceblog_admin_style_scripts' ) ):

function faceblog_admin_style_scripts() {
	wp_enqueue_style( 'faceblog-admin-style', get_template_directory_uri() . '/inc/admin/css/admin-style.css' );

	wp_enqueue_script( 'faceblog-admin-scripts', get_template_directory_uri() . '/inc/admin/js/admin-scripts.js' );
}

endif;

/*-----------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'faceblog_scripts' );

if( !function_exists( 'faceblog_scripts' ) ):

function faceblog_scripts() {
	$query_args = array(
        'family' => 'Open+Sans:400,400italic,300italic,300,600,600italic,700',
    );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css', array(), '4.5.0' );
	
	wp_enqueue_style( 'faceblog-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
	
	wp_enqueue_style( 'faceblog-style', get_stylesheet_uri() );
    
    wp_enqueue_style( 'faceblog-responsive-css', get_template_directory_uri().'/css/responsive.css', array(), '' );
    
    wp_enqueue_script( 'jquery-parallax', get_template_directory_uri() . '/js/jquery.parallax.js', array(), '1.1.3', true );
    
    wp_enqueue_script( 'forkit', get_template_directory_uri() . '/js/forkit.js', array(), '0.2', true );

	wp_enqueue_script( 'faceblog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'faceblog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js', array(), '1.4.0', true );

	wp_enqueue_script( 'faceblog-custom-js', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), '1.0.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

endif;

/*--------------------------------------------------------------------------------*/
/**
 * Author info
 */
add_action( 'faceblog_author_info', 'faceblog_author_info_cb', 10 );

if( ! function_exists( 'faceblog_author_info_cb' ) ):
	
	function faceblog_author_info_cb() {
		global $post;
        $author_id = $post->post_author;
        $author_pf_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
        $author_avatar = get_avatar( $author_id, '120' );
        $author_display_name = get_the_author_meta( 'display_name' );
?>
		<div class="faceblog-post-author-wrapper">
			<div class="author-image">
				<a href="<?php echo esc_url( $author_pf_link );?>">
					<figure><?php echo $author_avatar; ?></figure>
				</a>
			</div><!--.author-image-->
			<div class="author-name">
				<span><?php _e( 'By : ', 'faceblog' ); ?><?php echo esc_attr( $author_display_name );?></span>
			</div>
		</div>
<?php
	}

endif; // Faceblog Author Info

/*--------------------------------------------------------------------------------*/
/**
 * Post comments
 */
add_action( 'faceblog_post_comments', 'faceblog_post_comments_cb', 10 );

if( ! function_exists( 'faceblog_post_comments_cb' ) ):
	
	function faceblog_post_comments_cb() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
	?>
			<div class="faceblog-post-comments">
				<span class="comments-link"> <?php comments_popup_link( esc_html__( 'Leave a comment', 'faceblog' ), esc_html__( '1 Comment', 'faceblog' ), esc_html__( '% Comments', 'faceblog' ) ); ?> </span>
			</div>
	<?php
		}
	}

endif;

/*--------------------------------------------------------------------------------*/
/**
 * Post Categories
 */
add_action( 'faceblog_post_categories', 'faceblog_post_categories_cb', 10 );

if( !function_exists( 'faceblog_post_categories_cb' ) ):
	
	function faceblog_post_categories_cb() {
		// Hide category and tag text for pages.
		if ( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'faceblog' ) );
			if ( $categories_list ) {
				printf( '<span class="cat-links">' . esc_html__( 'Category: %1$s', 'faceblog' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'faceblog' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged: %1$s', 'faceblog' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}

endif;

/*---------------------------------------------------------------------------------------*/
/**
 * Front header banner section
 */

add_action( 'faceblog_front_header_banner', 'faceblog_front_header_banner_cb', 10 );

if( !function_exists( 'faceblog_front_header_banner_cb' ) ):

	function faceblog_front_header_banner_cb() {
		$header_banner_type = get_theme_mod( 'faceblog_header_layout', 'banner_layout1' );
		$header_banner_cat = get_theme_mod( 'header_banner_cat', '' );
		$header_bg_img = get_theme_mod( 'header_front_banner_image', '' );
?>
	<div class="header-banner-wrapper">
<?php
		if( $header_banner_type == 'banner_layout1' ) {
		  if( !empty( $header_banner_cat ) ) {
    			$banner_args = array(
    							'post_type' => 'post',
    							'cat' => $header_banner_cat,
    							'post_status' => 'publish',
    							'posts_per_page' => 5,
    							'order' => 'DESC'
    				);
    			$banner_query = new WP_Query( $banner_args );
    			$banner_count = 0;
    			if( $banner_query->have_posts() ) {
    				while( $banner_query->have_posts() ) {
    					$banner_query->the_post();
                        $banner_post_count = $banner_query->post_count;
    					$banner_count++;
    					$image_id = get_post_thumbnail_id();					
    					$image_path = wp_get_attachment_image_src( $image_id, 'large', true );
    					$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
    					if( $banner_count == 1 ) {
    						echo '<div class="banner-left-wrapper">';
    						$image_path = wp_get_attachment_image_src( $image_id, 'large', true );
    					}
    					if( $banner_count == 2 ) {
    						echo '<div class="banner-right-wrapper">';
    					}
    	?>
    					<div class="banner-post-wrapper">
    						<figure>
    							<img src="<?php echo esc_url( $image_path[0] );?>" alt="<?php echo esc_attr( $image_alt );?>" title="<?php the_title();?>" />							
    						</figure>
    						<div class="post-info-wrapper">
    							<?php do_action( 'faceblog_post_categories' ); ?>
    							<h3 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?></a></h3>
    							<?php faceblog_posted_on(); ?>
    						</div><!-- .post-info-wrapper -->
    					</div><!-- .banner-post-wrapper -->
    	<?php
    					if( $banner_count == 1 ) {
    						echo '</div>'; //end div for banner-left-wrapper
    					}
    					if( $banner_count == $banner_post_count ) {
    						echo '</div>'; //end div for banner-right-wrapper
    					}
    				}
    			}
            } 
		}// banner_layou1
		else {
	?>
			<style type="text/css" media="screen">
				.header-banner-wrapper {
					background: url( '<?php echo esc_url( $header_bg_img ); ?>' ) no-repeat fixed center top;
					min-height: 350px ;
				}
			</style>
	<?php
		}
?>
	</div><!-- .header-banner-wrapper -->
<?php
	}

endif;
/*---------------------------------------------------------------------------------------*/
/**
 * Front header banner section
 */

add_action( 'faceblog_inner_header_banner', 'faceblog_inner_header_banner_cb', 10 );

if( !function_exists( 'faceblog_inner_header_banner_cb' ) ):

	function faceblog_inner_header_banner_cb() {
	   $inner_banner_option = get_theme_mod( 'innerpage_banner_option', '' );
       $inner_banner_image = get_theme_mod( 'header_inner_banner_image', '' );
       if( empty( $inner_banner_option ) && $inner_banner_option != 1 ) {
?>
        <div class="header-inner-banner-wrapper"></div><!-- .header-inner-banner-wrapper -->
        <style type="text/css" media="screen">
			.header-inner-banner-wrapper {
				background: url( '<?php echo esc_url( $inner_banner_image ); ?>' ) no-repeat fixed center top;
				min-height: 350px ;
			}
		</style>
<?php
       }
    }

endif;

/*--------------------------------------------------------------------------*/
/**
 * Function to select the sidebar
 */
if ( ! function_exists( 'faceblog_sidebar_select' ) ) :

	function faceblog_sidebar_select() {
		global $post;

		if( $post ) { $sidebar_meta = get_post_meta( $post->ID, 'faceblog_page_sidebar', true ); }

		if( is_home() ) {
			$queried_id = get_option( 'page_for_posts' );
			$sidebar_meta = get_post_meta( $queried_id, 'faceblog_page_sidebar', true );
		}

		if( empty( $sidebar_meta ) || is_archive() || is_search() ) { $sidebar_meta = 'right_sidebar'; }
		$faceblog_archive_sidebar = get_theme_mod( 'archive_sidebar_option', 'right_sidebar' );

		if( is_page() || is_single() ) {
			if( $sidebar_meta == 'right_sidebar' ) { get_sidebar(); }
			elseif( $sidebar_meta == 'left_sidebar' ) { get_sidebar('left'); }
		}else {
			if( $faceblog_archive_sidebar == 'right_sidebar' ) { get_sidebar(); }
			elseif( $faceblog_archive_sidebar == 'left_sidebar' ) { get_sidebar('left'); }
		}		
	}

endif;

/*--------------------------------------------------------------------------*/
/**
 * Function to hexcolor
 */
//Converts hex colors to rgba for the menu background color
function faceblog_hex2rgba($color, $opacity = false) { 
    $default = 'rgb(0,0,0)'; 
    //Return default if no color provided
    if(empty($color))
     return $default;  
    //Sanitize $color if "#" is provided 
   if ($color[0] == '#' ) {
    $color = substr( $color, 1 );
   }

   //Check if color has 6 or 3 characters and get values
   if (strlen($color) == 6) {
           $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
   } elseif ( strlen( $color ) == 3 ) {
           $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
   } else {
           return $default;
   }

   //Convert hexadec to rgb
   $rgb =  array_map('hexdec', $hex);

   //Check if opacity is set(rgba or rgb)
   if($opacity){
    if(abs($opacity) > 1)
    $opacity = 1.0;
    $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
   } else {
    $output = 'rgb('.implode(",",$rgb).')';
   }

   //Return rgb(a) color string
   return $output;
}
/*--------------------------------------------------------------------------*/
/**
 * Function to color brightness
 */
function faceblog_color_brightness($hex, $percent) {
    // Work out if hash given
    $hash = '';
    if (stristr($hex, '#')) {
        $hex = str_replace('#', '', $hex);
        $hash = '#';
    }
    /// HEX TO RGB
    $rgb = array(hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)));
    //// CALCULATE 
    for ($i = 0; $i < 3; $i++) {
        // See if brighter or darker
        if ($percent > 0) {
            // Lighter
            $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1 - $percent));
        } else {
            // Darker
            $positivePercent = $percent - ($percent * 2);
            $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1 - $positivePercent));
        }
        // In case rounding up causes us to go to 256
        if ($rgb[$i] > 255) {
            $rgb[$i] = 255;
        }
    }
    //// RBG to Hex
    $hex = '';
    for ($i = 0; $i < 3; $i++) {
        // Convert the decimal digit to hex
        $hexDigit = dechex($rgb[$i]);
        // Add a leading zero if necessary
        if (strlen($hexDigit) == 1) {
            $hexDigit = "0" . $hexDigit;
        }
        // Append to the hex string
        $hex .= $hexDigit;
    }
    return $hash . $hex;
}