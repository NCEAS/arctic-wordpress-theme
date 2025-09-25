<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
  <meta charset="utf-8">

  <?php // force Internet Explorer to use the latest rendering engine available ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?php wp_title(''); ?></title>

  <?php // mobile meta (hooray!) ?>
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
  <!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
  <?php // or, set /favicon.ico for IE10 win ?>
  <meta name="msapplication-TileColor" content="#f01d4f">
  <meta name="msapplication-TileImage"
    content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
  <meta name="theme-color" content="#121212">

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <?php // wordpress head functions ?>
  <?php wp_head(); ?>
  <?php // end of wordpress head ?>

  <?php // drop Google Analytics Here ?>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-12EKQM14SH"></script>
  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-12EKQM14SH');
  </script>
  <?php // end analytics ?>

  <script type="application/ld+json" id="jsonld">
  {
    "@context": [
      "https://schema.org/"
    ],
    "@type": [
      "Service",
      "Organization",
      "ResearchProject"
    ],
    "@id": "https://arcticdata.io",
    "name": "Arctic Data Center",
    "legalName": "Arctic Data Center",
    "alternateName": "ADC",
    "logo": "https://arcticdata.io/wp-content/themes/aurora/library/images/logo_.png",
    "url": "https://arcticdata.io",
    "description": "The Arctic Data Center is the primary data and software repository for the Arctic section of NSF Polar Programs.",
    "identifier": [{
        "@type": "PropertyValue",
        "name": "ROR:055hrh286",
        "propertyID": "https://registry.identifiers.org/registry/ror",
        "value": "ror:055hrh286",
        "url": "https://ror.org/055hrh286"
      },
      {
        "@type": "PropertyValue",
        "name": "Re3data DOI: 10.17616/R37P98",
        "propertyID": "https://registry.identifiers.org/registry/doi",
        "value": "doi:10.17616/R37P98",
        "url": "https://doi.org/10.17616/R37P98"
      },
      {
        "@type": "PropertyValue",
        "name": "wikidata:Q77285095",
        "propertyID": "https://registry.identifiers.org/registry/wikidata",
        "value": "wikidata:Q77285095",
        "url": "https://www.wikidata.org/wiki/Q77285095"
      },
      {
        "@type": "PropertyValue",
        "name": "grid:grid.507882.0",
        "propertyID": "https://registry.identifiers.org/registry/grid",
        "value": "grid:grid.507882.0",
        "url": "https://www.grid.ac/institutes/grid.507882.0"
      }
    ],
    "sameAs": [
      "https://ror.org/055hrh286",
      "https://www.grid.ac/institutes/grid.507882.0",
      "https://www.wikidata.org/wiki/Q77285095",
      "https://www.re3data.org/repository/r3d100011973",
      "http://doi.org/10.17616/R37P98",
      "urn:node:ARCTIC"
    ],
    "category": [
      "Arctic Research"
    ],
    "provider": {
      "@id": "https://arcticdata.io"
    },
    "contactPoint": {
      "@type": "ContactPoint",
      "name": "Support",
      "email": "support@arcticdata.io",
      "url": "https://arcticdata.io/support/",
      "contactType": "customer support"
    },
    "foundingDate": "2016-02-01",
    "funder": {
      "@type": "Organization",
      "@id": "https://doi.org/10.13039/100000087",
      "legalName": "Office of Polar Programs",
      "alternateName": "OPP",
      "url": "https://www.nsf.gov/div/index.jsp?div=OPP",
      "identifier": {
        "@type": "PropertyValue",
        "propertyID": "https://registry.identifiers.org/registry/doi",
        "value": "doi:10.13039/100000087",
        "url": "https://doi.org/10.13039/100000087"
      },
      "parentOrganization": {
        "@type": "Organization",
        "@id": "https://doi.org/10.13039/100000085",
        "legalName": "Directorate for Geosciences",
        "alternateName": "NSF-GEO",
        "url": "http://www.nsf.gov",
        "identifier": {
          "@type": "PropertyValue",
          "propertyID": "https://registry.identifiers.org/registry/doi",
          "value": "10.13039/100000085",
          "url": "https://doi.org/10.13039/100000085"
        },
        "parentOrganization": {
          "@type": "Organization",
          "@id": "https://doi.org/10.13039/100000001",
          "legalName": "National Science Foundation",
          "alternateName": "NSF",
          "url": "http://www.nsf.gov",
          "identifier": {
            "@type": "PropertyValue",
            "propertyID": "https://registry.identifiers.org/registry/doi",
            "value": "10.13039/100000001",
            "url": "https://doi.org/10.13039/100000001"
          }
        }
      }
    },
    "hasOfferCatalog": {
      "@type": "OfferCatalog",
      "name": "Arctic Data Center Data Catalog",
      "itemListElement": [{
        "@type": "DataCatalog",
        "@id": "https://arcticdata.io/catalog/data",
        "name": "Arctic Data Center Catalog",
        "audience": {
          "@type": "Audience",
          "audienceType": "public",
          "name": "General Public"
        }
      }]
    },
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "1021 Anacapa Street",
      "addressLocality": "Santa Barbara",
      "addressRegion": "CA",
      "postalCode": "93101",
      "addressCountry": "US"
    },
    "parentOrganization": {
      "@type": "Organization",
      "@id": "https://ror.org/0146z4r19",
      "legalName": "National Center for Ecological Analysis and Synthesis",
      "alternateName": "NCEAS",
      "url": "http://nceas.ucsb.edu",
      "identifier": {
        "@type": "PropertyValue",
        "propertyID": "https://registry.identifiers.org/registry/ror",
        "value": "ror:0146z4r19",
        "url": "https://ror.org/0146z4r19"
      },
      "parentOrganization": {
        "@type": "Organization",
        "@id": "https://ror.org/02t274463",
        "legalName": "University of California, Santa Barbara",
        "alternateName": "UCSB",
        "url": "http://ucsb.edu",
        "identifier": {
          "@type": "PropertyValue",
          "propertyID": "https://registry.identifiers.org/registry/ror",
          "value": "ror:02t274463",
          "url": "https://ror.org/02t274463"
        }
      }
    },
    "inLanguage": "en-US",
    "addressCountry": "US",
    "license": [
      "http://spdx.org/licenses/CC0-1.0",
      "https://spdx.org/licenses/CC-BY-4.0"
    ],
    "credentialCategory": "CoreTrustSeal",
    "termsOfService": [
      "http://spdx.org/licenses/CC0-1.0",
      "https://spdx.org/licenses/CC-BY-4.0"
    ],
    "ex:persistentIdentifiers": [
      "https://registry.identifiers.org/registry/doi",
      "https://registry.identifiers.org/registry/orcid",
      "https://registry.identifiers.org/registry/ror",
      "https://registry.identifiers.org/registry/rrid",
      "https://registry.identifiers.org/registry/d1id",
      "https://registry.identifiers.org/registry/ark"
    ],
    "ex:machineInteroperability": [
      "DataONE", "OAI-PMH", "DataCite", "REST", "SPARQL"
    ],
    "ex:metadata": [
      "EML", "ISO-19115", "DDI", "Dublin Core", "FGDC CSDGM", "METS", "DataCite", "OAI-ORE", "other"
    ],
    "ex:curation": "https://arcticdata.io/submit/",
    "ex:preservationPolicy": "https://arcticdata.io/preservation/",
    "ex:termsOfAccess": [
      "http://spdx.org/licenses/CC0-1.0",
      "https://spdx.org/licenses/CC-BY-4.0"
    ]
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

      <div id="inner-header" class="wrap cf">

        <a href="<?php echo home_url(); ?>" rel="nofollow" id="logo" class="h1 brand" itemscope
          itemtype="http://schema.org/Organization">
          <img src="<?php bloginfo( 'template_url' ); ?>/library/images/logo_.png" alt="Arctic Data Center"
            title="Arctic Data Center" />
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