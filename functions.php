<?php 
/**
 * Enqueue scripts and styles.
 */
function it_news_scripts() {
	wp_enqueue_style( 'it-news-style', get_template_directory_uri().'/assets/css/style.css', array() );

	
}
add_action( 'wp_enqueue_scripts', 'it_news_scripts' );

function my_post_time_ago_function() {
return sprintf( esc_html__( '%s ago', 'textdomain' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
}
add_filter( 'the_time', 'my_post_time_ago_function' );

// include all PHP files in ./includes/ directory:
foreach (glob(dirname(__FILE__) . '/includes/*.php') as $file) {
    include $file;
}