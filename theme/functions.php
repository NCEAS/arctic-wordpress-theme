<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/aurora.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function aurora_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'auroratheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'aurora_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'aurora_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'aurora_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'aurora_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'aurora_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'aurora_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  aurora_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'aurora_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'aurora_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'aurora_excerpt_more' );
  
  //Give editors access to theme options
  $role = get_role('editor');
  $role->add_cap('edit_theme_options');

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'aurora_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'aurora-thumb-600', 600, 150, true );
add_image_size( 'aurora-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'aurora-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'aurora-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'aurora_custom_image_sizes' );

function aurora_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'aurora-thumb-600' => __('600px by 150px'),
        'aurora-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function aurora_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );

	$wp_customize->add_section(
		'aurora_footer_settings',
		array(
			'title'    => __( 'Footer', 'auroratheme' ),
			'priority' => 160,
		)
	);

	$wp_customize->add_setting(
		'footer_acknowledgement_text',
		array(
			'default'           => aurora_get_default_footer_ack_text(),
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'footer_acknowledgement_text',
		array(
			'label'       => __( 'Acknowledgement Text', 'auroratheme' ),
			'description' => __( 'Displayed below the footer menus. HTML links are allowed.', 'auroratheme' ),
			'section'     => 'aurora_footer_settings',
			'type'        => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'footer_callout_content',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'footer_callout_content',
		array(
			'label'       => __( 'Callout Content', 'auroratheme' ),
			'description' => __( 'Appears above the footer logos; useful for buttons or short CTAs.', 'auroratheme' ),
			'section'     => 'aurora_footer_settings',
			'type'        => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'footer_left_logo_image',
		array(
			'default'           => aurora_get_default_left_logo_src(),
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'footer_left_logo_image',
			array(
				'label'   => __( 'Left Logo Image', 'auroratheme' ),
				'section' => 'aurora_footer_settings',
			)
		)
	);

	$wp_customize->add_setting(
		'footer_left_logo_link',
		array(
			'default'           => aurora_get_default_left_logo_link(),
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'footer_left_logo_link',
		array(
			'label'   => __( 'Left Logo Link URL', 'auroratheme' ),
			'section' => 'aurora_footer_settings',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'footer_left_logo_alt',
		array(
			'default'           => aurora_get_default_left_logo_alt(),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'footer_left_logo_alt',
		array(
			'label'   => __( 'Left Logo Alt Text', 'auroratheme' ),
			'section' => 'aurora_footer_settings',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'footer_right_logo_image',
		array(
			'default'           => aurora_get_default_right_logo_src(),
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'footer_right_logo_image',
			array(
				'label'   => __( 'Right Logo Image', 'auroratheme' ),
				'section' => 'aurora_footer_settings',
			)
		)
	);

	$wp_customize->add_setting(
		'footer_right_logo_link',
		array(
			'default'           => aurora_get_default_right_logo_link(),
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'footer_right_logo_link',
		array(
			'label'   => __( 'Right Logo Link URL', 'auroratheme' ),
			'section' => 'aurora_footer_settings',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'footer_right_logo_alt',
		array(
			'default'           => aurora_get_default_right_logo_alt(),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'footer_right_logo_alt',
		array(
			'label'   => __( 'Right Logo Alt Text', 'auroratheme' ),
			'section' => 'aurora_footer_settings',
			'type'    => 'text',
		)
	);
}

add_action( 'customize_register', 'aurora_theme_customizer' );


function aurora_get_default_footer_ack_text() {
	return __( 'This material is based upon work supported by the National Science Foundation under NSF Award Numbers <a href="https://www.nsf.gov/awardsearch/showAward?AWD_ID=1546024" target="_blank">1546024</a> and <a href="https://www.nsf.gov/awardsearch/showAward?AWD_ID=2042102" target="_blank">2042102</a>.', 'auroratheme' );
}

function aurora_get_default_left_logo_src() {
	return 'https://arcticdata.io/wp-content/uploads/coretrustseal_100px.png';
}

function aurora_get_default_left_logo_link() {
	return 'http://coretrustseal.org';
}

function aurora_get_default_left_logo_alt() {
	return __( 'A CoreTrustSeal certified repository', 'auroratheme' );
}

function aurora_get_default_right_logo_src() {
	return get_template_directory_uri() . '/library/images/logo_.png';
}

function aurora_get_default_right_logo_link() {
	return home_url();
}

function aurora_get_default_right_logo_alt() {
	return __( 'Arctic Data Center', 'auroratheme' );
}



/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function aurora_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'auroratheme' ),
		'description' => __( 'The first (primary) sidebar.', 'auroratheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'id' => 'top_banner',
		'name' => __( 'Top Banner', 'auroratheme' ),
		'description' => __( 'A banner that displays at the top of the page above the header.', 'auroratheme' ),
		'before_widget' => '<div id="%1$s" class="alert alert-success %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'id' => 'top_banner_warning',
		'name' => __( 'Top Warning Banner (Yellow)', 'auroratheme' ),
		'description' => __( 'A yellow warning banner that displays at the top of the page above the header.', 'auroratheme' ),
		'before_widget' => '<div id="%1$s" class="alert alert-warning %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'footer_logos',
		'name' => __( 'Footer Logos', 'auroratheme' ),
		'description' => __( 'Displays widgets inside the footer logo area; use Image widgets to add linked logos.', 'auroratheme' ),
		'before_widget' => '<span id="%1$s" class="footer-logo %2$s">',
		'after_widget' => '</span>',
		'before_title' => '',
		'after_title' => '',
	));
	

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'auroratheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'auroratheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function aurora_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'auroratheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'auroratheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'auroratheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'auroratheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function aurora_fonts() {
  #wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

add_action('wp_enqueue_scripts', 'aurora_fonts');

/* DON'T DELETE THIS CLOSING TAG */ ?>
