<?php 


/**
 * Enqueue scripts and styles.
 */
function it_news_scripts() {
	wp_enqueue_style( 'it-news-style', get_template_directory_uri().'/assets/css/style.css', array() );

	
}
add_action( 'wp_enqueue_scripts', 'it_news_scripts' );

function it_news_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'it-news' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'it-news' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'it_news_widgets_init' );