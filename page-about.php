<?php

 //Template Name: About Us
 
 ?>
<?php get_header(); ?>

<div id="content">
	<?php if ( function_exists('yoast_breadcrumb') ) {
		
		yoast_breadcrumb('<div class="breadcrumbs"><div class="wrap">','</div></div>');
		
	} ?>
	<div id="inner-content" class="wrap cf">

		<div id="main" class="m-all cf" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="article-header">

					<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

				</header> <?php // end article header ?>

				<section class="entry-content cf" itemprop="articleBody">
				<!-- Large modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

				<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg">
				    <div class="modal-content">
				      <h1>THIS IS WHAT ITS ALL ABOUT</h1>
				    </div>
				  </div>
				</div>

				<!-- Small modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>

				<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-sm">
				    <div class="modal-content">
				      ...
				    </div>
				  </div>
				</div>
					<?php the_content(); ?>

				</section> <?php // end article section ?>

				<footer class="article-footer cf">

				</footer>

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

		</div>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer( 'page-template' ); ?>
