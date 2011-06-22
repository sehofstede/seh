<?php get_template_part( 'header' ); ?>
    <div id="singlepost">
        <div id="content">
        	<?php get_sidebar( 'blog-top-bar' ); ?>
        	
                <div class="postwrap" role="main">
                    <?php if (in_category("dutch-blogposts")) { ?>
                    <div lang="nl-NL" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php } else { ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php } ?>
				        <div class="entry-top">
					        <h1 class="entry-title"><?php the_title(); ?></h1>

					        <div class="entry-meta">
						        <?php seh_posted_on(); ?>
					        </div><!-- .entry-meta -->
				        </div><!-- .entry-meta -->

					    <div class="entry-content">
						    <?php the_content(); ?>
						    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'seh' ), 'after' => '</div>' ) ); ?>
					    </div><!-- .entry-content -->

    <?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					    <div id="entry-author-info">
						    <div id="author-avatar">
							    <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'seh_author_bio_avatar_size', 60 ) ); ?>
						    </div><!-- #author-avatar -->
						    <div id="author-description">
							    <h2><?php printf( esc_attr__( 'About %s', 'seh' ), get_the_author() ); ?></h2>
							    <?php the_author_meta( 'description' ); ?>
							    <div id="author-link">
								    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									    <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'seh' ), get_the_author() ); ?>
								    </a>
							    </div><!-- #author-link	-->
						    </div><!-- #author-description -->
					    </div><!-- #entry-author-info -->
    <?php endif; ?>

					    <div class="entry-utility">
						    <?php seh_posted_in(); ?>
						    <?php edit_post_link( __( 'Edit', 'seh' ), '<span class="edit-link">', '</span>' ); ?>
					    </div><!-- .entry-utility -->
				    </div><!-- #post-## -->
                    <div class="ie-shadow ie-post-shadow">
                    </div>
                </div>
    	</div>
	</div>
    	
<?php get_template_part( 'footer' ); ?>
