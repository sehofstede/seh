<?php
if ( ! function_exists( 'sehof_attribute_lang' ) ) :
function sehof_attribute_lang ( $post_id ) {
	if ( in_category( 'dutch-blogposts' ) ) {
		print ('lang="nl-NL"');
	} elseif ( in_category( 'english-blogposts' ) ) {
		print ('lang="en-GB"');
	}
}
endif;

function sehof_enqueue () {
	// Register bootstrap JavaScript
	wp_register_script( 'bootstrap-script',
			get_stylesheet_directory_uri() . '/../../bootstrap/js/bootstrap.min.js',
			array( 'jquery' ) );

	wp_register_script( 'seh-fonts',
			get_stylesheet_directory_uri() . '/javascript/webfonts.js' );

	// Enque the lot
	wp_enqueue_script( 'bootstrap-script' );
	wp_enqueue_script( 'seh-fonts' );

	// Remove custom font
	wp_dequeue_style( 'twentytwelve-fonts' );
}
add_action( 'wp_enqueue_scripts', 'sehof_enqueue', 15 );

function sehof_remove_sidebars () {
	// Remove parent's sidebars we don't use
	unregister_sidebar( 'sidebar-2' );
	unregister_sidebar( 'sidebar-3' );
}
add_action( 'widgets_init', 'sehof_remove_sidebars', 11 );

function sehof_setup () {
	// Add translation support
	load_theme_textdomain( 'sehof', get_stylesheet_directory() . '/languages' );

	// Remove functionality from TwentyTwelve we don't offer
	remove_theme_support ( 'custom-background', 'custom-header' );

	register_nav_menu( 'primary', __( 'Main navigation menu', 'sehof' ) );
	register_nav_menu( 'home', __( 'Home page menu', 'sehof' ) );

	// Add custom widget area
	register_sidebar(array(
		'name' => __( 'Bottom widget', 'sehof' ),
		'id' => 'bottom-widget',
		'description' => __( 'This sidebar contains widgets, preferably one, that show below the loop of blog posts.', 'sehof' )
	));
}
add_action( 'after_setup_theme', 'sehof_setup', 15 );

function sehof_twitter_cards ( $twitter_card ) {
	if ( is_array( $twitter_card ) ) {
		$twitter_card['creator'] = '@sehof';
		$twitter_card['creator:id'] = '10872822';
	}

	return $twitter_card;
}
add_filter( 'twitter_cards_properties', 'sehof_twitter_cards' );

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'sehof' ) );

	$date = sprintf( '<a href="%1$s" title="&quot;%2$s&quot;" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s %5$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_title() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_attr( get_the_time() ),
		esc_html( get_the_date() )
	);

	// Translators: 1 is the date and 2 is the tag list.
	if ( $tag_list ) {
		$utility_text = __( '%1$s, tagged %2$s.', 'sehof' );
	} else {
		$utility_text = __( '%1$s.', 'sehof' );
	}

	printf(
		$utility_text,
		$date,
		$tag_list
	);
}
endif;