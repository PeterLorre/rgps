			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="cf">

				<img class="guarantee" src="<?php echo get_template_directory_uri(); ?>/library/images/guarantee.png" alt="" />
				<img class="logo-footer" src="<?php echo get_template_directory_uri(); ?>/library/images/logo-footer.png" alt="" />

				<?php get_sidebar( 'footer' ); ?>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> All rights Reserved.</p>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/rgps.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
