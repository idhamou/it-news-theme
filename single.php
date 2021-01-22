<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

<div class="grid-container content-wrapper">
	<div class="grid-x grid-padding-x">
		<div class="cell medium-order-4">
			<div class="grid-x grid-padding-x">
				<div class="cell mt16 show-for-medium fil-ariane">
					<ul class="breadcrumbs breadcrumbs-tags">
						<li>
							<a href="/bons-plans/">Bons plans</a>
						</li>
						<li>
						</li>
						<li>
							<a href="/bons-plans/soldes/">Soldes</a>
						</li>
						<li>
						</li>
					</ul>
				</div>
				<?php while ( have_posts() ) : the_post(); 
					$_post_id = get_the_ID() ;
					$kamino_desktop_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($_post_id), 'single-Desk');
					$kamino_mobile_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($_post_id), 'single-Mob');


					?>
				 <div class="cell medium-8 mt16" id="contenu">
                        <article class="item-marty">
                            <div class="grid-x">
                                <div class="cell">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                            </div>
                            <div class="grid-x mt16 mb16 AuthorBox align-middle">
                                <div class="cell auto fs14 txtleft lh10 txt-nightblue author-bloc">
                                    <a href="/auteur/1878-clubic-bons-plans.html" class="author-avatar" style="background-image: url(https://pic.clubic.com/v1/images/1821383/raw?width=48&amp;height=48&amp;fit=max&amp;hash=3ec89c25c30ff90029e949cfcce9235e7f040958);"></a>
                                    <div class="author-infos">
                                        <div class="bold dflex align-middle">
                                            <a href="/auteur/1878-clubic-bons-plans.html"><span><?php echo get_the_author(); ?></span></a>
                                            <div class="author-infos-badge author-expertise m0 ml4">Expert Bons Plans</div>
                                        </div>
                                        <div class="author-infos-date">
                                            <?php the_time() ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if( get_comments_number($_post_id) > 0 ) { ?>
	                                <div class="cell shrink txtright comments-bloc">
	                                    <a href="#commentaires" class="discourse-comments-count tag-comments-count"><?php comments_number() ; ?></a>
	                                </div>
								<?php } ?> 
                            </div>
                            <div class="grid-x grid-padding-x text">
                                <div class="cell marty-body">
                                    <div class="marty-cell marty-size-12">
                                    	<div class="marty-row">
                                    		<div class="marty-cell marty-size-12">
                                    			<div class="marty-cell-media">
                                    				<a class="marty-picture-link" href="https://pic.clubic.com/v1/images/1856180/raw" rel="albox-gallery">
                                    					<picture class="marty-picture-no-link">
                                    						<source srcset="<?php print($kamino_desktop_image_url[0]); ?>">
															<source srcset="<?php print($kamino_mobile_image_url[0]); ?>">
															<img src="<?php print($kamino_desktop_image_url[0]); ?>" srcset="<?php print($kamino_desktop_image_url[0]); ?>" >
	                            						</picture>
	                            					</a>
                            					</div>
                            				</div>
                            			</div>
                                        <div class="marty-row">
                                            <div class="marty-cell marty-size-12">
                                               <?php the_content()(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
