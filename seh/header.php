<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * Taken from WordPress Twenty Ten
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="author" content="Sense Egbert Hofstede" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="icon" type="image/x-icon" href="/favicon.ico" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
<link rel="apple-touch-icon" type="image/png" href="/apple-touch-icon-iphone.png"/>
<link rel="apple-touch-icon" type="image/png"sizes="72x72" href="/apple-touch-icon-ipad.png" />
<link rel="apple-touch-icon" type="image/png"sizes="114x114" href="/apple-touch-icon-iphone4.png" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script type="text/javascript">var addthis_config = {"data_ga_tracker":'UA-687771-4',"data_track_clickback":true,"data_track_addressbar":false,"pubid":'ra-4e105e1c31814cbd',"ui_cobrand":'Sense Hofstede'};</script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<?php if ( is_front_page() or is_page() ): ?>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php else: ?>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/Blog">
<?php endif; ?>
<div id="wrapper" class="hfeed">
	<header role="banner">
		<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
		<?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
	</header>

	<div id="main" role="main">
