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

					<div class="footer-grid">
						<div>
							<a href="<?php echo home_url(); ?>" rel="nofollow" class="brand">
								<img src="<?php bloginfo( 'template_url' ); ?>/library/images/logo_.png" title="Arctic Data Center" alt="Arctic Data Center"/>
							</a>
						</div>
						
						<nav role="navigation" class="footer-links contact-menu">
							<?php
							wp_nav_menu(array(
							'container' => '',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
							'container_class' => '',         // class of container (should you choose to use it)
							'menu' => __( 'Contact Footer Links', 'auroratheme' ),   // nav name
							'menu_class' => 'nav footer-nav cf',            // adding custom nav class
							'theme_location' => 'contact-footer-links',             // where it's located in the theme
							'before' => '',                                 // before the menu
							'after' => '',                                  // after the menu
							'link_before' => '',                            // before each link
							'link_after' => '',                             // after each link
							'items_wrap' => '<ul><li class="nav-title">Contact</li>%3$s</ul>', //Show a "Contact" title
							'depth' => 0,                                   // limit the depth of the nav
							'fallback_cb' => 'aurora_footer_links_fallback'  // fallback function
							)); ?>
						</nav>
						<div>
							<a href="http://coretrustseal.org" target="_blank">
							<img src="https://arcticdata.io/wp-content/uploads/coretrustseal_100px.png" class="core-trust-logo"
								title="A CoreTrustSeal certified repository" />
							</a>
						</div>
					</div>

        </div>
						<div class="logos">
							<a class="nceas-logo" href="http://nceas.ucsb.edu" target="_blank"></a>
							<a class="ucsb-logo" href="http://ucsb.edu" target="_blank"></a>
							<a class="dataone-logo" href="https://dataone.org" target="_blank"></a>
							<a class="ncei-logo" href="https://ncei.noaa.gov" target="_blank"></a>
							<a class="noaa-logo" href="http://noaa.gov" target="_blank"></a>
							<a class="nsf-logo" href="http://nsf.gov" target="_blank"></a>
						</div>
						<p class="smaller center">
							This material is based upon work supported by the National Science Foundation under <a href="http://www.nsf.gov/awardsearch/showAward?AWD_ID=1546024" target="_blank">NSF Award Number 1546024</a>
						</p>
					</div>
				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
