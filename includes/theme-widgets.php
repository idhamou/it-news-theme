<?php 
// include all PHP files in ./includes/widgets/ directory:
foreach (glob(dirname(__FILE__) . '/widgets/*.php') as $file) {
	include $file;
}


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

register_sidebar( array(
	'name'          => __( 'Homepage widgets', 'it_news' ),
	'id'            => 'sidebar-home',
	'description'   => __( 'Main sidebar that appears on the homepage.', 'it_news' ),
	'before_widget' => '<section id="%1$s" class="%2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
) ); 