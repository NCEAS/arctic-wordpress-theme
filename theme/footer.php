			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

			  <div id="inner-footer" class="wrap cf">

			    <div class="footer-content">

			      <nav role="navigation">
			        <?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'auroratheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'aurora_footer_links_fallback'  // fallback function
						)); ?>
			      </nav>

			      <!-- arbitrary content here, like a contact us button -->
			      <?php
			      $footer_callout = get_theme_mod( 'footer_callout_content', '' );
			      if ( $footer_callout ) :
			      ?>
			      <div class="footer-callout">
			        <?php echo wp_kses_post( $footer_callout ); ?>
			      </div>
			      <?php endif; ?>




			      <div class="footer-grid center">
			        <?php
			      $left_logo_src  = get_theme_mod( 'footer_left_logo_image', aurora_get_default_left_logo_src() );
			      $left_logo_link = get_theme_mod( 'footer_left_logo_link', aurora_get_default_left_logo_link() );
			      $left_logo_alt  = get_theme_mod( 'footer_left_logo_alt', aurora_get_default_left_logo_alt() );
			      $right_logo_src  = get_theme_mod( 'footer_right_logo_image', aurora_get_default_right_logo_src() );
			      $right_logo_link = get_theme_mod( 'footer_right_logo_link', aurora_get_default_right_logo_link() );
			      $right_logo_alt  = get_theme_mod( 'footer_right_logo_alt', aurora_get_default_right_logo_alt() );
			      ?>
			        <div class="left-logo">
			          <?php if ( $left_logo_src ) :
			        	$left_logo_src = esc_url( $left_logo_src );
			        	$left_logo_link = $left_logo_link ? esc_url( $left_logo_link ) : '';
			        	$left_logo_alt = esc_attr( $left_logo_alt );
			        	if ( $left_logo_link ) : ?>
			          <a href="<?php echo $left_logo_link; ?>" target="_blank" rel="noopener">
			            <img src="<?php echo $left_logo_src; ?>" alt="<?php echo $left_logo_alt; ?>"
			              class="footer-logo-image footer-logo-image--left" />
			          </a>
			          <?php else : ?>
			          <img src="<?php echo $left_logo_src; ?>" alt="<?php echo $left_logo_alt; ?>"
			            class="footer-logo-image footer-logo-image--left" />
			          <?php endif; ?>
			          <?php endif; ?>
			        </div>

			        <?php
								$footer_ack_text = get_theme_mod( 'footer_acknowledgement_text', aurora_get_default_footer_ack_text() );
								if ( $footer_ack_text ) :
							?>
			        <p class="acknowledgement-text"><?php echo wp_kses_post( $footer_ack_text ); ?></p>
			        <?php endif; ?>

			        <div class="right-logo">
			          <?php if ( $right_logo_src ) :
			        	$right_logo_src = esc_url( $right_logo_src );
			        	$right_logo_link = $right_logo_link ? esc_url( $right_logo_link ) : '';
			        	$right_logo_alt = esc_attr( $right_logo_alt );
			        	if ( $right_logo_link ) : ?>
			          <a href="<?php echo $right_logo_link; ?>" rel="nofollow" class="brand">
			            <img src="<?php echo $right_logo_src; ?>" alt="<?php echo $right_logo_alt; ?>"
			              class="footer-logo-image footer-logo-image--right" />
			          </a>
			          <?php else : ?>
			          <img src="<?php echo $right_logo_src; ?>" alt="<?php echo $right_logo_alt; ?>"
			            class="footer-logo-image footer-logo-image--right" />
			          <?php endif; ?>
			          <?php endif; ?>
			        </div>
			      </div>
			      <div class="logos">
			        <?php if ( is_active_sidebar( 'footer_logos' ) ) : ?>
			        <?php dynamic_sidebar( 'footer_logos' ); ?>
			        <?php endif; ?>
			      </div>

			    </div>

			</footer>

			</div>

			<?php // all js scripts are loaded in library/bones.php ?>
			<?php wp_footer(); ?>

			</body>

			</html> <!-- end of site. what a ride! -->
