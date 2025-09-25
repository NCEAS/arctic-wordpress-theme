<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							
							<h1 class="page-title">
								<?php
								//the_archive_title( '<h1 class="page-title">', '</h1>' );
								add_filter( 'get_the_archive_title', function ( $title ) {
	
	    							if( is_category() ) {
		        						$title = single_cat_title( '', false );
	    							}
	
									return $title;
	
								});
								printf(get_the_archive_title());
								?>
							</h1>
							<?php 
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
								if (have_posts()) : while (have_posts()) : the_post(); 
							?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="entry-header article-header">

									<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<p class="byline entry-meta vcard">
										<?php printf( __( 'Posted', 'auroratheme' ).' %1$s ',
                  							     /* the time the post was published */
                  							     '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>'
                    							); ?>
                    					 <?php edit_post_link("Edit"); ?>
									</p>

								</header>

								<section class="entry-content cf">

									<?php the_post_thumbnail( 'aurora-thumb-600' ); ?>

									<?php the_excerpt(); ?>

								</section>

							</article>

							<?php endwhile; ?>

									<?php aurora_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'auroratheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'auroratheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the archive.php template.', 'auroratheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
