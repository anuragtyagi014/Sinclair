<?php

$portfolio_style = themerain_meta( 'portfolio_style' );

if ( 'slider' === $portfolio_style || 'carousel' === $portfolio_style || is_404() ) {
	return;
}

?>

<footer class="footer-main">
    <div class="container">
        <div class="row">
        <?php 
            get_website_footer_builder_block();
            //echo "test";
        ?>    
           
       </div>
       <div class="bottom-row">
            <p>© 2024 Sinclair. All rights reserved.</p>
            <ul class="bottom-links">
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Cookies</a></li>
            </ul>
        </div>
   </div>
</footer>




<!-- <footer class="site-footer">
	<div class="footer-column">
		<?php echo wp_kses_post( wpautop( get_theme_mod( 'themerain_footer_1', '&copy; ' . date( 'Y ' ) . esc_html( get_bloginfo( 'name' ) ) ) ) ); ?>
	</div>

	<div class="footer-column">
		<?php echo wp_kses_post( wpautop( get_theme_mod( 'themerain_footer_2' ) ) ); ?>
	</div>
</footer> -->
