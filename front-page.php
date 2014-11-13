<?php get_header(); ?>

			<div id="content">

				<section class="hero-main" class="m-all t-all d-all cf" role="main">
					<div id="inner-content" class="wrap cf">
						<img class="hero-diagram" src="<?php echo get_template_directory_uri(); ?>/library/images/hero-diagram.png" alt="diagram" />
						<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>
						<a class="btn-cta-hero" href="<?php echo site_url(); ?>/sign-up/">Get Started Free!</a>
					</div>
				</section>

				<h1>Your Complete Business Review Solution</h1>

					<section class="how-it-works cf">

						<div class="consumer d-1of3 cf">
							<h3>Consumer</h3>
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/consumer.jpg" alt="The Consumers Perspective" />
							<blockquote>I don't have time to write 20 different reviews.</blockquote>
						</div>
						<div class="business-owner d-1of3 cf">
							<h3>Owner</h3>
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/owner.jpg" alt="The Consumers Perspective" />
							<blockquote>I can't believe how a one star rating kills my business.</blockquote>
						</div>
						<div class="reputation d-1of3 cf">
							<h3>Reputation GPS</h3>
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/reputation-gps.jpg" alt="The Consumers Perspective" />
							<blockquote>Don't worry. We'll put you in control of your online reviews.</blockquote>
						</div>

						<a href="<?php echo site_url(); ?>/pricing" class="btn-red-lrg">How it works</a>
					
					</section>
					<div class="connect cf">
						<div class="call-us wrap cf">

							<!-- Call us today -->
							<?php
							if ( wp_is_mobile() ) {
								echo '<h3>Call Us Today!</h3><a class="phone-footer" href="tel:+1-800-345-6789">1-800-345-6789</a>';
							}
							else{
								echo '<h3>Call Us Today!</h3><p class="phone-footer">1-800-345-6789</p>';
							}
							?>

						</div>

						<div class="social">
							<h3>Connect With Us:</h3>
							<div class="icons">
								<ul class="cf">
									<li><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin fa-2x"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
									<li><a href="#"><i class="fa fa-youtube fa-2x"></i></a></li>
								</ul>
							</div>
						</div>								
					</div>
			</div>

<?php get_footer(); ?>
