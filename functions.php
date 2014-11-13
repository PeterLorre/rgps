<?php
/*
Author: Eddie Machado
URL: htp://themble.com/rgps/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD rgps CORE (if you remove this, the theme will break)
require_once( 'library/rgps.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH rgps
Let's get everything up and running.
*********************/

function rgps_ahoy() {

  //Allow editor style.
  add_editor_style();

  // let's get language support going, if you need it
  load_theme_textdomain( 'rgpstheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  //require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'rgps_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'rgps_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'rgps_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'rgps_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'rgps_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'rgps_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  rgps_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'rgps_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'rgps_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'rgps_excerpt_more' );

} /* end rgps ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'rgps_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'rgps-thumb-600', 600, 150, true );
add_image_size( 'rgps-thumb-300', 300, 100, true );

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
<?php the_post_thumbnail( 'rgps-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'rgps-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'rgps_custom_image_sizes' );

function rgps_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'rgps-thumb-600' => __('600px by 150px'),
        'rgps-thumb-300' => __('300px by 100px'),
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

function rgps_theme_customizer($wp_customize) {
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
}

add_action( 'customize_register', 'rgps_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function rgps_register_sidebars() {
	register_sidebar(array(
		'id' => 'footer-trial',
		'name' => __( 'Footer Trial Info', 'rgpstheme' ),
		'description' => __( 'Trial info in footer.', 'rgpstheme' ),
		'before_widget' => '<div id="%1$s" class="widget footer-trial m-all t-1of2 d-1of4 cf %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="footer-trial-title widgettitle">',
		'after_title' => '</h4>',
	));

    register_sidebar(array(
    'id' => 'footer-blog',
    'name' => __( 'Footer Blog Posts', 'rgpstheme' ),
    'description' => __( 'Blog Posts in Footer.', 'rgpstheme' ),
    'before_widget' => '<div id="%1$s" class="widget m-all t-1of2 d-1of4 footer-blog %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="footer-blog-title widgettitle">',
    'after_title' => '</h4>',
  ));

    register_sidebar(array(
    'id' => 'footer-links',
    'name' => __( 'Footer Links', 'rgpstheme' ),
    'description' => __( 'Links in Footer.', 'rgpstheme' ),
    'before_widget' => '<div id="%1$s" class="widget m-all t-1of2 d-1of4 footer-links %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="footer-links-title widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-press',
    'name' => __( 'Footer Press', 'rgpstheme' ),
    'description' => __( 'Press in Footer.', 'rgpstheme' ),
    'before_widget' => '<div id="%1$s" class="widget m-all t-1of2 d-1of4 footer-press %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class=" footer-press-title widgettitle">',
    'after_title' => '</h4>',
  ));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'rgpstheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'rgpstheme' ),
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
function rgps_comments( $comment, $args, $depth ) {
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
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'rgpstheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'rgpstheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'rgpstheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'rgpstheme' ) ?></p>
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
// function rgps_fonts() {
//   wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
// }

// add_action('wp_enqueue_scripts ', 'rgps_fonts');





/*-------------------------------------------------
Calling Font Awesome CDN, Bootstrap CDN CSS and JS
---------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'rgps_enqueue_awesome' );

function rgps_enqueue_awesome() {
    wp_enqueue_style( 'prefix-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css', array(), '4.1.0' );
}

add_action( 'wp_enqueue_scripts', 'rgps_enqueue_bootstrap_css' );

function rgps_enqueue_bootstrap_css() {
    wp_enqueue_style( 'prefix-bootstrap_css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css', array(), '4.1.0' );
}

add_action( 'wp_enqueue_scripts', 'rgps_enqueue_bootstrap_js' );

function rgps_enqueue_bootstrap_js() {
    wp_enqueue_style( 'prefix-bootstrap_js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js', array(), '4.1.0' );
}



/* Add data-toggle attribute to wp menu item */
add_filter( 'nav_menu_link_attributes', 'rgps_modal_data', 10, 3 );
function rgps_modal_data( $atts, $item, $args ) {

  // The ID of the target menu item
  $menu_target = 5;

  // inspect $item
  if ($item->ID == $menu_target) {
    $atts['data-toggle'] = 'modal';
    $atts['data-target'] = '.bs-example-modal-sm';
  }
  return $atts;
}



/* DON'T DELETE THIS CLOSING TAG */ ?>

