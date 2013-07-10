<?php get_header(); ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="span6 offset3 well persoon">
				<h1>
					<a href="<?php echo home_url( '/about' ); ?>">
						<?php _e( 'Sense Egbert Hofstede', 'sehof' ); ?>

						<br/>

						<small>[&#712;s&#603;n.s&#601; &#712;&#603;&#611;.b&#601;rt &#712;&#614;&#596;f.ste&#720;.d&#601;]</small>
					</a>
				</h1>

				<?php the_content(); ?>

				<?php wp_nav_menu( array( 'theme_location' => 'home', 
						'container' => false,
						'menu_class' => 'nav nav-pills pull-right' ) ); ?>
			</div>
			<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>