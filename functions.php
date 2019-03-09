<?php
/**
 * Starter Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Starter_Theme
 */

 function theme_enqueue_styles() {

	wp_enqueue_style( 'custom_css', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/main.js', array(), '1.0', 'all' );

 }
 add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 11 );



if ( ! function_exists( 'starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function starter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Christian Mizon, use a find and replace
	 * to change 'christian-mizon' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'starter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'starter' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'starter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'starter_setup' );


// Options page - ACF


if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Theme Settings');
}


// Sharing Buttons Shortcode

function sharing_buttons($content) {
	global $post;
	if(is_singular() || is_home()){

		// Get current page URL
		$crunchifyURL = urlencode(get_permalink());

		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());

		// Get Post Thumbnail for pinterest
		$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL;
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		$bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
		$whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
		$dir = get_stylesheet_directory_uri();

		// Add sharing button at the end of page/page content
		$variable .= '<span class=post-social>';
		$variable .= '<a class="dec-text small-text--inline social-twitter" href="'. $twitterURL .'" target="_blank"><img src="'. $dir .'/images/icons/twitter.svg"></a> ';
		$variable .= '<a class="dec-text small-text--inline social-facebook" href="'.$facebookURL.'" target="_blank"><img src="'. $dir .'/images/icons/facebook.svg"></a> ';
		// $variable .= '<a class="small-text small-text--inline social-whatsapp" href="'.$whatsappURL.'" target="_blank">WhatsApp</a>';
    $variable .= '<a class="dec-text small-text--inline social-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank"><img src="'. $dir .'/images/icons/pinterest.svg"></a>';
		$variable .= '<a class="no-transition" href="mailto:?subject='. $crunchifyTitle .'&amp;body=Check out this article on Menagerie: '. $crunchifyURL .'"><img src="'. $dir .'/images/icons/email.svg"></a>';
		$variable .= '</span>';

		return $variable.$content;
	}else{
		// if not a post/page then don't include sharing button
		return $variable.$content;
	}
};
add_shortcode('share', 'sharing_buttons');


//Limit excerpt length

function custom_excerpt_length( $length ) {
	return 18;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


// Remove standard content editor box from the CMS for all page_for_posts
add_action('admin_init', 'remove_textarea');

function remove_textarea() {
        remove_post_type_support( 'page', 'editor' );
}


// Adds google API key to ACF Google Map field

function my_acf_init() {

$key = get_field('api_key', 'option');

acf_update_setting('google_api_key', $key);
}

add_action('acf/init', 'my_acf_init');
