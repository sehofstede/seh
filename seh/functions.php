<?php
/**
 * seh functions and definitions
 */
 
if ( ! function_exists( 'twentyten_setup' ) ):
function twentyten_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'seh', TEMPLATEPATH . '/languages' );
	load_theme_textdomain( 'twentyten', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
		'frontabout' => __( 'Frontpage Navigation', 'seh' )
	) );
}
endif;

if ( ! function_exists( 'twentyten_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * Based on the original function taken from Twenty Ten
 */
function twentyten_posted_on() {
	printf('<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date updated" pubdate itemprop="datePublished" datetime="%3$s">%4$s, %5$s</time></a> %6$s %7$s',
			get_permalink(),
			get_the_title(),
			get_the_time('c'),
			get_the_date(),
			esc_attr( get_the_time() ),
			__('by', 'seh'),
		    sprintf( '<span class="author vcard" itemprop="author" itemscope itemtype="http://schema.org/Person"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			    get_author_posts_url( get_the_author_meta( 'ID' ) ),
			    sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
			    sprintf( '<span itemprop="name">%s</span>', get_the_author() )
		    )
		);
}
endif;

?>
