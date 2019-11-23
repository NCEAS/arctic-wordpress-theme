<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>
		
		<script type="application/ld+json" id="jsonld">
{
    "@context": {
        "@vocab": "http://schema.org/",
        "datacite": "http://purl.org/spar/datacite/"
    },
    "@type": ["Service", "ResearchProject"],
    "@id": "https://arcticdata.io",
    "identifier": {
        "@type": ["PropertyValue", "datacite:OrganizationIdentifier"],
        "propertyID": "DOI",
        "value": "10.17616/R37P98",
        "url": "https://doi.org/10.17616/R37P98"
    },
    "name": "Arctic Data Center",
    "legalName": "Arctic Data Center",
    "sameAs": [
        "https://www.re3data.org/repository/r3d100011973",
        "http://doi.org/10.17616/R37P98",
        "urn:node:ARCTIC"
    ],
    "url": "https://arcticdata.io",
    "description": "The Arctic Data Center is the primary data and software repository for the Arctic section of NSF Polar Programs.",
    "category": [
        "Arctic Research"
    ],
    "provider": {
        "@id": "https://arcticdata.io"
    },
    "funder": {
        "@type": "Organization",
        "@id": "https://doi.org/10.13039/100000087",
        "legalName": "Office of Polar Programs",
        "alternateName": "OPP",
        "url": "https://www.nsf.gov/div/index.jsp?div=OPP",
        "identifier": {
            "@type": ["PropertyValue", "datacite:ResourceIdentifier"],
            "propertyID": "DOI",
            "value": "10.13039/100000087",
            "url": "https://doi.org/10.13039/100000087"
        },
        "parentOrganization": {
            "@type": "Organization",
            "@id": "http://doi.org/10.13039/100000085",
            "legalName": "Directorate for Geosciences",
            "alternateName": "NSF-GEO",
            "url": "http://www.nsf.gov",
            "identifier": {
                "@type": ["PropertyValue", "datacite:ResourceIdentifier"],
                "propertyID": "DOI",
                "value": "10.13039/100000085",
                "url": "https://doi.org/10.13039/100000085"
            },
            "parentOrganization": {
                "@type": "Organization",
                "@id": "http://dx.doi.org/10.13039/100000001",
                "legalName": "National Science Foundation",
                "alternateName": "NSF",
                "url": "http://www.nsf.gov",
                "identifier": {
                    "@type": ["PropertyValue", "datacite:ResourceIdentifier"],
                    "propertyID": "DOI",
                    "value": "10.13039/100000001",
                    "url": "https://doi.org/10.13039/100000001"
                }
            }
        }
    }
}
</script>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
			
			<?php if ( is_active_sidebar( 'top_banner' ) ) : ?>

						<?php dynamic_sidebar( 'top_banner' ); ?>
			<?php endif; ?>
			
			
			<?php if ( is_active_sidebar( 'top_banner_warning' ) ) : ?>

						<?php dynamic_sidebar( 'top_banner_warning' ); ?>
			<?php endif; ?>

				<div class="border-image" role="img"></div>

				<div id="inner-header" class="wrap cf">

					<a href="<?php echo home_url(); ?>" rel="nofollow" id="logo" class="h1 brand" itemscope itemtype="http://schema.org/Organization">
						<img src="<?php bloginfo( 'template_url' ); ?>/library/images/logo_.png" alt="Arctic Data Center" title="Arctic Data Center"/>
					</a>

					<a id="nav-trigger"><i class="fa fa-bars icon"></i><i class="fa fa-close icon hidden"></i></a>

					
					<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" id="main-nav">
						<?php wp_nav_menu(array(
    					         'container' => false,                           // remove nav container
    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
    					         'menu' => __( 'The Main Menu', 'auroratheme' ),  // nav name
    					         'menu_class' => 'nav top-nav cf',               // adding custom nav class
    					         'theme_location' => 'main-nav',                 // where it's located in the theme
    					         'before' => '',                                 // before the menu
        			               'after' => '',                                  // after the menu
        			               'link_before' => '',                            // before each link
        			               'link_after' => '',                             // after each link
        			               'depth' => 0,                                   // limit the depth of the nav
    					         'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>
						
					</nav>
					
				</div>
				
			</header>
