<?php get_header(); ?>


<?php if ( 'posts' == get_option( 'show_on_front' ) ) { ?>
    <?php include( get_home_template() ); ?>
<?php } else { ?>


<section id="homepage" class="section pt-page-current" style="background-image: url(<?php echo esc_url ( get_theme_mod('metroino_homebgimage', get_template_directory_uri().'/images/homepage.jpg') ); ?>);">
    <div id="homepage-wrapper" class="section-wrapper" style="background-color: <?php echo esc_attr ( get_theme_mod('metroino_homebgcolor') ); ?>;background-color: <?php echo esc_attr ( metroino_hex2rgba ( get_theme_mod('metroino_homebgcolor'), 0.6 ) ); ?>;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">

                    <div class="top-panel">
						
						<?php if ( has_custom_logo() ) : ?>
							<div class="logo-holder">
								<?php the_custom_logo() ?>
							</div>
						
						<?php else: ?>
						
							<div class="site-branding">
								<?php
									if ( is_front_page() && is_home() ) : ?>
										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php else : ?>
										<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php endif;

									$description = get_bloginfo( 'description', 'display' );
									if ( $description || is_customize_preview() ) : ?>
										<p class="site-description"><?php echo $description; ?></p>
									<?php endif;
								?>
							</div>
							
						<?php endif; ?>
						
                    </div>
					
					
                    <div class="tile-list">

                    <?php if ( get_theme_mod('metroino_enable_1', 1) ): ?>
                        <div class="tileicon tileicon-1" style="<?php echo esc_attr ( get_theme_mod('metroino_css_1', 'background: linear-gradient(215deg, rgba(255,0,255,1) , rgba(0,255,255,1) );') ); ?>;background:<?php echo esc_attr ( get_theme_mod('metroino_color_1') ); ?>;">
                            <a class="tilenav tile-link" href="#<?php echo esc_attr ( preg_replace('/\s+/', '', get_theme_mod('metroino_name_1', 'portfolio')) ); ?>"><h3 class="h3 tile-title" style="color:<?php echo esc_attr ( get_theme_mod('metroino_tile_title_color', '#FFFFFF') ); ?>"><?php echo esc_attr ( get_theme_mod('metroino_name_1','Portfolio') ); ?></h3><img src="<?php echo esc_url( get_theme_mod('metroino_icon_1', get_template_directory_uri().'/images/tile/tile-portfolio.png') ) ?>" alt="tileicon"></a>
                        </div>
                    <?php endif; ?>

                    <?php if ( get_theme_mod('metroino_enable_2', 1) ): ?>
                        <div class="tileicon tileicon-2" style="<?php echo esc_attr ( get_theme_mod('metroino_css_2', 'background: linear-gradient(45deg, rgba(0,59,59,1) , rgba(5,193,255,1) , rgba(0,59,59,1) );') ); ?>;background:<?php echo esc_attr ( get_theme_mod('metroino_color_2') ); ?>;">
                            <a class="tilenav tile-link" href="#<?php echo esc_attr ( preg_replace('/\s+/', '', get_theme_mod('metroino_name_2', 'about')) ); ?>"><h3 class="h3 tile-title" style="color:<?php echo esc_attr ( get_theme_mod('metroino_tile_title_color', '#FFFFFF') ); ?>"><?php echo esc_attr ( get_theme_mod('metroino_name_2','About') ); ?></h3><img src="<?php echo esc_url( get_theme_mod('metroino_icon_2', get_template_directory_uri().'/images/tile/tile-about.png') ) ?>" alt="tileicon"></a>
                        </div>
                    <?php endif; ?>

                    <?php if ( get_theme_mod('metroino_enable_3', 1) ): ?>
                        <div class="tileicon tileicon-3" style="<?php echo esc_attr ( get_theme_mod('metroino_css_3', 'background: linear-gradient(45deg, rgba(0,255,0,1), rgba(0,255,255,1));') ); ?>;background:<?php echo esc_attr ( get_theme_mod('metroino_color_3') ); ?>;">
                            <a class="tilenav tile-link" href="#<?php echo esc_attr ( preg_replace('/\s+/', '', get_theme_mod('metroino_name_3', 'team')) ); ?>"><h3 class="h3 tile-title" style="color:<?php echo esc_attr ( get_theme_mod('metroino_tile_title_color', '#FFFFFF') ); ?>"><?php echo esc_attr ( get_theme_mod('metroino_name_3','Team') ); ?></h3><img src="<?php echo esc_url( get_theme_mod('metroino_icon_3', get_template_directory_uri().'/images/tile/tile-team.png') ) ?>" alt="tileicon"></a>
                        </div>
                    <?php endif; ?>
					
                    <?php if ( get_theme_mod('metroino_enable_4', 1) ): ?>
                        <div class="tileicon tileicon-4" style="<?php echo esc_attr ( get_theme_mod('metroino_css_4', 'background: linear-gradient(215deg, rgba(255,102,102,1) , rgba(0,255,255,1) );') ); ?>;background:<?php echo esc_attr ( get_theme_mod('metroino_color_4') ); ?>;">
                            <a class="tilenav tile-link" href="#<?php echo esc_attr ( preg_replace('/\s+/', '', get_theme_mod('metroino_name_4', 'blog')) ); ?>"><h3 class="h3 tile-title" style="color:<?php echo esc_attr ( get_theme_mod('metroino_tile_title_color', '#FFFFFF') ); ?>"><?php echo esc_attr ( get_theme_mod('metroino_name_4','Blog') ); ?></h3><img src="<?php echo esc_url( get_theme_mod('metroino_icon_4', get_template_directory_uri().'/images/tile/tile-blog.png') ) ?>" alt="tileicon"></a>
                        </div>
                    <?php endif; ?>
					
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $metroino_default_page_content = '<h1 class="h1 section-title">' . __('Your Content Here', 'metroino') . '</h1><h3 class="h3" style="margin-top:100px;color:#00FF0D;text-align:center;">' . __('Go To Appearance -> Customize and Select a Page To Display Here.', 'metroino') . '</h3>'; ?>

<?php if ( get_theme_mod('metroino_enable_1', 1) ):
	list($metroino_outclass,$metroino_inclass) = explode( '$', get_theme_mod('metroino_transition_1', 'pt-page-rotateCubeLeftOut pt-page-ontop$pt-page-rotateCubeLeftIn') ); ?>
	<section id="<?php echo esc_attr ( preg_replace('/\s+/', '', get_theme_mod('metroino_name_1','portfolio')) ) ?>" class="section section-1" data-outclass="<?php echo esc_attr ( $metroino_outclass ); ?>" data-inclass="<?php echo esc_attr ( ( $metroino_inclass ) ); ?>" style="background-image: url(<?php echo esc_url( get_theme_mod('metroino_pagebgimage_1', get_template_directory_uri().'/images/background.jpg') ) ?>);">
		<div id="<?php echo esc_attr ( preg_replace('/\s+/', '', get_theme_mod('metroino_name_1','portfolio')) ) ?>-wrapper" class="section-wrapper section-wrapper-1" style="background-color: <?php echo esc_attr ( get_theme_mod('metroino_pagebgcolor_1', '#0FA2CB') ); ?>;background-color: <?php echo esc_attr ( metroino_hex2rgba ( get_theme_mod('metroino_pagebgcolor_1', '#61CAFF') , 0.6 ) ); ?>;">
			<div class="container">
				<?php if ( get_theme_mod('metroino_page_1') > 0 ): ?>
					<h1 class="h1 section-title" style="color:<?php echo esc_attr ( get_theme_mod('metroino_tile_title_color', '#FFFFFF') ); ?>"><?php echo esc_attr ( get_the_title( get_theme_mod('metroino_page_1') ) ); ?></h1>
					<?php $metroino_post = get_post( get_theme_mod('metroino_page_1') ); $metroino_content = apply_filters( 'the_content',$metroino_post->post_content); echo $metroino_content; ?>
				<?php else: ?>
				<?php if ( current_user_can( 'manage_options' ) ) : echo $metroino_default_page_content; endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( get_theme_mod('metroino_enable_2', 1) ):
	list($metroino_outclass,$metroino_inclass) = explode( '$', get_theme_mod('metroino_transition_2', 'pt-page-rotateFoldRight$pt-page-moveFromLeftFade') ); ?>
	<section id="<?php echo esc_attr ( preg_replace('/\s+/', '', get_theme_mod('metroino_name_2','about')) ) ?>" class="section section-2" data-outclass="<?php echo esc_attr ( $metroino_outclass ); ?>" data-inclass="<?php echo esc_attr ( ( $metroino_inclass ) ); ?>" style="background-image: url(<?php echo esc_url( get_theme_mod('metroino_pagebgimage_2', get_template_directory_uri().'/images/background.jpg') ) ?>);">
		<div id="<?php echo esc_attr ( preg_replace('/\s+/', '', get_theme_mod('metroino_name_2','about')) ) ?>-wrapper" class="section-wrapper section-wrapper-2" style="background-color: <?php echo esc_attr ( get_theme_mod('metroino_pagebgcolor_2', '#0FA2CB') ); ?>;background-color: <?php echo esc_attr ( metroino_hex2rgba ( get_theme_mod('metroino_pagebgcolor_2', '#61CAFF') , 0.6 ) ); ?>;">
			<div class="container">
				<?php if ( get_theme_mod('metroino_page_2') > 0 ): ?>
					<h1 class="h1 section-title" style="color:<?php echo esc_attr ( get_theme_mod('metroino_tile_title_color', '#FFFFFF') ); ?>"><?php echo esc_attr ( get_the_title( get_theme_mod('metroino_page_2') ) ); ?></h1>
					<?php $metroino_post = get_post( get_theme_mod('metroino_page_2') ); $metroino_content = apply_filters( 'the_content',$metroino_post->post_content); echo $metroino_content; ?>
				<?php else: ?>
					<?php if ( current_user_can( 'manage_options' ) ) : echo $metroino_default_page_content; endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( get_theme_mod('metroino_enable_3', 1) ):
	list($metroino_outclass,$metroino_inclass) = explode( '$', get_theme_mod('metroino_transition_3', 'pt-page-moveToBottom$pt-page-moveFromTop') ); ?>
	<section id="<?php echo esc_attr ( preg_replace('/\s+/', '', get_theme_mod('metroino_name_3','team')) ) ?>" class="section section-3" data-outclass="<?php echo esc_attr ( $metroino_outclass ); ?>" data-inclass="<?php echo esc_attr ( ( $metroino_inclass ) ); ?>" style="background-image: url(<?php echo esc_url( get_theme_mod('metroino_pagebgimage_3', get_template_directory_uri().'/images/background.jpg') ) ?>);">
		<div id="<?php echo esc_attr ( preg_replace('/\s+/', '', get_theme_mod('metroino_name_3','team')) ) ?>-wrapper" class="section-wrapper section-wrapper-3" style="background-color: <?php echo esc_attr ( get_theme_mod('metroino_pagebgcolor_3', '#0FA2CB') ); ?>;background-color: <?php echo esc_attr ( metroino_hex2rgba ( get_theme_mod('metroino_pagebgcolor_3', '#61CAFF') , 0.6 ) ); ?>;">
			<div class="container">
				<?php if ( get_theme_mod('metroino_page_3') > 0 ): ?>
					<h1 class="h1 section-title" style="color:<?php echo esc_attr ( get_theme_mod('metroino_tile_title_color', '#FFFFFF') ); ?>"><?php echo esc_attr ( get_the_title( get_theme_mod('metroino_page_3') ) ); ?></h1>
					<?php $metroino_post = get_post( get_theme_mod('metroino_page_3') ); $metroino_content = apply_filters( 'the_content',$metroino_post->post_content); echo $metroino_content; ?>
				<?php else: ?>
					<?php if ( current_user_can( 'manage_options' ) ) : echo $metroino_default_page_content; endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( get_theme_mod('metroino_enable_4', 1) ):
	list($metroino_outclass,$metroino_inclass) = explode( '$', get_theme_mod('metroino_transition_4', 'pt-page-moveToRight$pt-page-moveFromLeft') ); ?>
	<section id="<?php echo esc_attr ( preg_replace('/\s+/', '', get_theme_mod('metroino_name_4','blog')) ) ?>" class="section section-4" data-outclass="<?php echo esc_attr ( $metroino_outclass ); ?>" data-inclass="<?php echo esc_attr ( ( $metroino_inclass ) ); ?>" style="background-image: url(<?php echo esc_url( get_theme_mod('metroino_pagebgimage_4', get_template_directory_uri().'/images/background.jpg') ) ?>);">
		<div id="<?php echo esc_attr ( preg_replace('/\s+/', '', get_theme_mod('metroino_name_4','blog')) ) ?>-wrapper" class="section-wrapper section-wrapper-4" style="background-color: <?php echo esc_attr ( get_theme_mod('metroino_pagebgcolor_4', '#0FA2CB') ); ?>;background-color: <?php echo esc_attr ( metroino_hex2rgba ( get_theme_mod('metroino_pagebgcolor_4', '#61CAFF') , 0.6 ) ); ?>;">
			<div class="container">
				<?php if ( get_theme_mod('metroino_page_4') > 0 ): ?>
					<h1 class="h1 section-title" style="color:<?php echo esc_attr ( get_theme_mod('metroino_tile_title_color', '#FFFFFF') ); ?>"><?php echo esc_attr ( get_the_title( get_theme_mod('metroino_page_4') ) ); ?></h1>
					<?php $metroino_post = get_post( get_theme_mod('metroino_page_4') ); $metroino_content = apply_filters( 'the_content',$metroino_post->post_content); echo $metroino_content; ?>
				<?php else: ?>
					<?php if ( current_user_can( 'manage_options' ) ) : echo $metroino_default_page_content; endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php } ?>

<?php get_footer(); ?>
