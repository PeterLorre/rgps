<?php get_header(); ?>

			<div id="content">

				<section class="hero-main" class="m-all t-all d-all cf" role="main">
				<div id="inner-content" class="wrap cf">
					<img class="hero-diagram" src="<?php echo get_template_directory_uri(); ?>/library/images/logos.png" alt="diagram" />
					<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>
				</div>
				</section>

				<div id="inner-content" class="wrap cf">

						<section class="content-main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

									<header class="article-header">

										<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

										<p class="byline vcard">
											<?php printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'rgpstheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
										</p>

									</header>

									<div class="entry-content cf" itemprop="articleBody">
										<?php the_content(); ?>
									</div>

									<footer class="article-footer cf">

									</footer>

									<?php comments_template(); ?>

								</article>

								<?php endwhile; else : ?>

										<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'rgpstheme' ); ?></h1>
											</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'rgpstheme' ); ?></p>
											</section>
											<footer class="article-footer">
													<p><?php _e( 'This is the error message in the page.php template.', 'rgpstheme' ); ?></p>
											</footer>
										</article>

								<?php endif; ?>
							
						</section>

				</div>

			</div>

<?php get_footer(); ?>
