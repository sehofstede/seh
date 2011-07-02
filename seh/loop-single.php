<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="nav-above" class="navigation" itemprop="breadcrumb">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
				</div><!-- #nav-above -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting">
				    <header>
					    <h1 class="entry-title"><?php the_title(); ?></h1>

					    <div class="entry-meta">
						    <?php twentyten_posted_on(); ?>
					    </div><!-- .entry-meta -->
				    </header>

					<div class="entry-content" itemprop="articleBody">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

                    <footer>
					    <div class="entry-utility">
						    <?php twentyten_posted_in(); ?>
						    <?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					    </div><!-- .entry-utility -->
				    </footer>
				</article><!-- #post-## -->

				<div id="nav-below" class="navigation" itemprop="breadcrumb">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
				</div><!-- #nav-below -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
