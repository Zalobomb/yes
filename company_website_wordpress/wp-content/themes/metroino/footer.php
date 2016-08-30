        <?php if ( 'posts' == get_option( 'show_on_front' ) ) : ?>

        <footer id="footer-copyright">
            <a id="back_to_top" href="#"><i class="fa fa-angle-double-up"></i></a>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div id="copyright-center">
                           	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'metroino' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'metroino' ), 'WordPress' ); ?></a>
							<span class="sep"> | </span>
							<a href="<?php echo esc_url( __( 'http://theme77.com/metroino/', 'metroino' ) ); ?>"><?php printf( __( 'Metroino Theme by %s', 'metroino' ), 'Theme77.com' ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <?php endif; ?>

        </div>
        </div> <!-- /wapper -->

        <?php wp_footer(); ?>

    </body>
</html>
