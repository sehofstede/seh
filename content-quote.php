	<?php the_date('j F Y', '<h2 class="date-separator">', '</h2>'); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('well'); ?> <?php sehof_attribute_lang( get_the_ID() ); ?>>
		<header class="entry-header">
			<?php if ( in_category( 'dutch-blogposts' ) ): ?>
				<?php $cat = get_category_by_slug( 'dutch-blogposts' ); ?>
			<a href="<?php echo get_category_link( $cat->term_id ); ?>" title="<?php echo $cat->name; ?>"><i class="flag flag-dutch"></i></a>
			<?php elseif ( in_category( 'english-blogposts' ) ): ?>
				<?php $cat = get_category_by_slug( 'english-blogposts' ); ?>
			<a href="<?php echo get_category_link( $cat->term_id ); ?>" title="<?php echo $cat->name; ?>"><i class="flag flag-english"></i></a>
			<?php endif; ?>
		</header>

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<?php twentytwelve_entry_meta(); ?>

			<?php edit_post_link( __( 'Edit', 'sehof' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
