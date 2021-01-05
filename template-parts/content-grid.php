<div class="cell">
	<span class="hero-comments-count"><?php comments_number(); ?></span>        
	<a href="<?php the_permalink(); ?>" data-datalayer="heroTop" class="flex-container align-bottom">
		<picture class="heroTop">
			<?php the_post_thumbnail('medium'); ?>
		</picture>
		<div data-datalayer="heroTop" data-datalayer-url="<?php the_permalink(); ?>" class="titre"><?php the_title(); ?></div>
	</a>
</div>