<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 * @author hicham ajarif <[<hicham.ajarif@gmail.com>]>
 * @package Tech_IT
 */

// Silence is golden.
// jira://DETS-321 remove PHP fatal errors -- exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}


get_header();

do_action( 'before_the_main_loop' ); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<div class="grid-container content-wrapper">

				<div class="grid-x grid-padding-x">
					<!-- BLOCK LATEST NEWS -->
					<div class="cell HeroSlider medium-order-2 mt16">
						<div class="grid-x align-justify scrolling-wrapper-flexbox">
							
						<?php 
						// get last 4 articles 
						$options = array(
				            'post_type' => array('post'),
				            'posts_per_page' => '4' ,
				            'post_status' => 'publish',
				        );
						$exclude_ids = [];
				        $theQuery = new WP_Query($options);
				        if ($theQuery->have_posts()) {
	            			while ( $theQuery->have_posts() ) : $theQuery->the_post();
	            				$exclude_ids[] = get_the_ID();
								get_template_part( 'template-parts/content-grid', get_post_format() );
	            			endwhile;
	            		}
						?>
						</div>
					</div>
					<div class="cell medium-7 large-8">

						<div class="grid-x ListingTitle">
							<h2>
								<?php echo __('latest news', 'it_news'); ?>
							</h2>
						</div>
						<?php do_action( 'before_the_main_loop' ); ?>

						<?php
						if ( have_posts() ) :
							// Start the Loop. excluding top stories articles
							$main_loop_i = 0;

							while ( have_posts() ) : the_post();
								if( in_array(get_the_ID(), $exclude_ids) ) { 
									$main_loop_i++;
									continue;
								}
								do_action( 'the_main_loop', $main_loop_i );

								get_template_part( 'template-parts/content', get_post_format() );

								$main_loop_i++;

							endwhile;

						else :
							// If no content, include the "No posts found" template.
							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
						<?php 	//dynamic_sidebar('sidebar-home'); ?>
					</div>
					<div class="cell cell-block-container medium-5 large-4 show-for-medium">
						<?php get_sidebar(); ?>
					</div>

				</div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();