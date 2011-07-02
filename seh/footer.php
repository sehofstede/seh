<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * Taken from WordPress Twenty Ten
 */
?>
	</div><!-- #main -->

</div><!-- #wrapper -->

<footer role="contentinfo">
	<div id="colophon">
		<ul id="copyright">
			<?php do_action( 'twentyten_credits' ); ?>
			<?php if ( is_front_page() ): ?>
			<li>
	            Copyright&nbsp;&copy;&nbsp;2006-<?php echo date("Y"); ?>&nbsp;<a href="<?php echo home_url( '/' ) ?>" title="Sense Egbert Hofstede" >Sense Egbert Hofstede</a>.
	        </li>
	        <?php else: ?>
			<li itemprop="author" itemscope itemtype="http://schema.org/Person">
	            Copyright&nbsp;&copy;&nbsp;2006-<?php echo date("Y"); ?>&nbsp;<a href="<?php echo home_url( '/' ) ?>" title="Sense Egbert Hofstede" itemprop="url"><span itemprop="name">Sense Egbert Hofstede</span></a>.
	        </li>
	        <?php endif; ?>
	        <li>
			    Powered by <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyten' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentyten' ); ?>" rel="generator">WordPress</a>
			</li>
		</div><!-- #copyright -->

	</div><!-- #colophon -->
</footer>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
