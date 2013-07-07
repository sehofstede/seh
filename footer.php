		</div><!-- .row-fluid -->
	</div><!-- #main .container .wrapper -->

	<?php if ( !is_front_page() ) : ?>
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'twentytwelve_credits' ); ?>
			
			Copyright&nbsp;&copy;&nbsp;2006-<?php echo date("Y"); ?>&nbsp;<a href="<?php echo home_url( '/about/' ) ?>" title="Sense Egbert Hofstede" >Sense Egbert Hofstede</a>.

			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>