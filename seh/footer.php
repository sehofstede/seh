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

	<footer role="contentinfo">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

			<div id="site-info">
			</div><!-- #site-info -->

			<div id="copyright">
				<?php do_action( 'twentyten_credits' ); ?>
				<?php $language = str_replace( "-", "_", get_bloginfo( 'language' ) );
				if ( is_front_page() ): ?>
				<p>
		            Copyright&nbsp;&copy;&nbsp;2006-<?php echo date("Y"); ?>&nbsp;<a xmlns:cc="http://creativecommons.org/ns#" href="<?php echo home_url( '/' ) ?>" title="Sense Egbert Hofstede" property="cc:attributionName" 
    rel="cc:attributionURL" class="authorname">Sense Egbert Hofstede</a>, this website is licensed under the <abbr title="Creative Commons">CC</abbr> <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/nl/deed.<?php echo $language; ?>" title="Creative Commons &mdash; Attribution-Share Alike 3.0 Netherlands">by-sa 3.0 nl</a> license.
		        </p>
		        <?php else: ?>
				<p itemprop="author" itemscope itemtype="http://schema.org/Person">
		            Copyright&nbsp;&copy;&nbsp;2006-<?php echo date("Y"); ?>&nbsp;<a xmlns:cc="http://creativecommons.org/ns#" href="<?php echo home_url( '/' ) ?>" title="Sense Egbert Hofstede" property="cc:attributionName" 
    rel="cc:attributionURL" class="authorname" itemprop="url"><span itemprop="name">Sense Egbert Hofstede</span></a>, this website is licensed under the <abbr title="Creative Commons">CC</abbr> <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/nl/deed.<?php echo $language; ?>" title="Creative Commons &mdash; Attribution-Share Alike 3.0 Netherlands">by-sa 3.0 nl</a> license.
		        </p>
		        <?php endif; ?>
		        <p>
				    Powered by <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyten' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentyten' ); ?>" rel="generator">WordPress</a>
				</p>
			</div><!-- #copyright -->

		</div><!-- #colophon -->
	</footer>

</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
