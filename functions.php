<?php
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
		'name' => 'Top widget',
		'id' => 'top-widget',
		'description' => 'This sidebar contains widgets, preferably one, that show above the blog posts.'
	));
}
add_action( 'after_setup_theme', 'seh_setup', 15 );