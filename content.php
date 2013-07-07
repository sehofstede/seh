	<?php the_date('j F Y', '<h2 class="date-separator">', '</h2>'); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('well'); ?> <?php seh_attribute_lang( get_the_ID() ); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php the_post_thumbnail(); ?>
			<?php if ( is_single() ) : ?>
			<h2 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>

			<?php if ( in_category( 'dutch-blogposts' ) ): ?>
				<?php $cat = get_category_by_slug( 'dutch-blogposts' ); ?>
			<a href="<?php echo get_category_link( $cat->term_id ); ?>" title="<?php echo $cat->name; ?>"><i class="flag flag-dutch"></i></a>
			<?php elseif ( in_category( 'english-blogposts' ) ): ?>
				<?php $cat = get_category_by_slug( 'english-blogposts' ); ?>
			<a href="<?php echo get_category_link( $cat->term_id ); ?>" title="<?php echo $cat->name; ?>"><i class="flag flag-english"></i></a>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ( !is_single() ) : // Only display full posts when is_single() ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>

			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php twentytwelve_entry_meta(); ?>

			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
