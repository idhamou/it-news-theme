<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>

<div class="grid-container content-wrapper">
	
	<div class="grid-x grid-padding-x">
		<div class="cell medium-7 large-8">
			
			<?php while(have_posts()) : the_post(); ?>


				<div class="grid-x posts">
					<a href="<?php the_permalink(); ?>" class="cell" data-vr-excerpttitle="">
						<picture>
							<?php the_post_thumbnail('medium'); ?>
						</picture>
					</a>
					<div class="cell auto post-infos">
						<a href="<?php the_permalink(); ?>" data-vr-excerpttitle=""><?php the_title(); ?></a>
						<?php the_excerpt(); ?>
						<div class="grid-x align-justify">
							<div class="cell auto">
								il y a 38 minutes
								<a href="#" class="post-badge">Playstation 5</a>
							</div>
						</div>
					</div>
				</div>


			<?php endwhile; ?>
		</div>
		<div class="cell cell-block-container medium-5 large-4 show-for-medium">
			<?php get_sidebar(); ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>
