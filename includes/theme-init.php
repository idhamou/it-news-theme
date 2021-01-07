<?php
/**
 * Enqueue scripts and styles.
 */
function it_news_scripts() {
	wp_enqueue_style( 'it-news-style', get_template_directory_uri().'/assets/css/style.css', array() );

	
}
add_action( 'wp_enqueue_scripts', 'it_news_scripts' );

function it_news_time_ago_function() {

return sprintf( esc_html__( '%s ago', 'textdomain' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
}
add_filter( 'the_time', 'it_news_time_ago_function' );


// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Add default posts and comments RSS feed links to head.
add_theme_support( 'it-news-feed-links' );

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