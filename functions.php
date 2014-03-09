<?php
/**
 * sanctuary functions and definitions
 *
 * @package sanctuary
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'sanctuary_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sanctuary_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sanctuary, use a find and replace
	 * to change 'sanctuary' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sanctuary', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sanctuary' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sanctuary_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // sanctuary_setup
add_action( 'after_setup_theme', 'sanctuary_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function sanctuary_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sanctuary' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'sanctuary_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sanctuary_scripts() {
	wp_enqueue_style( 'sanctuary-style', get_stylesheet_uri() );
	wp_enqueue_style( 'arvo', "http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic" );
	wp_enqueue_style( 'opensans', "http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" );
	wp_enqueue_style( 'opensans-condensed', "http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic" );
  

	//wp_enqueue_script( 'sanctuary-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'sanctuary-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
  wp_enqueue_script( 'jquery');
  wp_enqueue_script( 'scrollorama', get_template_directory_uri() . '/js/jquery.scrollorama.js', array('jquery'), '', true );
  wp_enqueue_script( 'scrolldeck', get_template_directory_uri() . '/js/jquery.scrolldeck.js', array('jquery'), '', true );
  wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '', true );
  wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.js', array('jquery'), '', true );
  wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'sanctuary_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
