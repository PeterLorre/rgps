
<div class="footer-widgets cf" role="complementary">

	<!-- Trial Information Text Widget -->
	<?php if ( is_active_sidebar( 'footer-trial' ) ) : ?>
		<?php dynamic_sidebar( 'footer-trial' ); ?>

	<?php else : ?>

		<?php	
			echo '<h3 style="color:red;">This content shows up if there are no widgets defined in the backend.</h3>';
		?>

		<div class="no-widgets">
			<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'rgpstheme' );  ?></p>
		</div>

	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-blog' ) ) : ?>

		<?php dynamic_sidebar( 'footer-blog' ); ?>

	<?php else : ?>

		<?php
			/*
			 * This content shows up if there are no widgets defined in the backend.
			*/
		?>

		<div class="no-widgets">
			<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'rgpstheme' );  ?></p>
		</div>

	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-links' ) ) : ?>

		<?php dynamic_sidebar( 'footer-links' ); ?>

	<?php else : ?>

		<?php
			/*
			 * This content shows up if there are no widgets defined in the backend.
			*/
		?>

		<div class="no-widgets">
			<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'rgpstheme' );  ?></p>
		</div>

	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-press' ) ) : ?>

		<?php dynamic_sidebar( 'footer-press' ); ?>

	<?php else : ?>

		<?php
			/*
			 * This content shows up if there are no widgets defined in the backend.
			*/
		?>

		<div class="no-widgets">
			<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'rgpstheme' );  ?></p>
		</div>

	<?php endif; ?>
</div>


