<?php
if ( ! function_exists( 'seh_attribute_lang' ) ) :
function seh_attribute_lang ( $post_id ) {
	if ( in_category( 'dutch-blogposts' ) ) {
		print ('lang="nl-NL"');
	} elseif ( in_category( 'english-blogposts' ) ) {
		print ('lang="en-GB"');
	}
}
endif;

function seh_enqueue () {
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
add_action( 'wp_enqueue_scripts', 'seh_enqueue', 15 );

function seh_setup () {
	// Remove functionality from TwentyTwelve we don't offer
	remove_theme_support ( 'custom-background', 'custom-header' );

	register_nav_menu( 'primary', 'Header navigation menu' );
	register_nav_menu( 'home', 'Home page menu' );

	// Add custom widget area
	register_sidebar(array(
		'name' => 'Bottom widget',
		'id' => 'bottom-widget',
		'description' => 'This sidebar contains widgets, preferably one, that show below the loop of blog posts.'
	));
}
add_action( 'after_setup_theme', 'seh_setup', 15 );

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'seh' ) );

	$date = sprintf( '<a href="%1$s" title="&quot;%2$s&quot;" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s %5$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_title() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_attr( get_the_time() ),
		esc_html( get_the_date() )
	);

	// Translators: 1 is the date and 2 is the tag list.
	if ( $tag_list ) {
		$utility_text = __( '%1$s, tagged %2$s.', 'seh' );
	} else {
		$utility_text = __( '%1$s.', 'seh' );
	}

	printf(
		$utility_text,
		$date,
		$tag_list
	);
}
endif;