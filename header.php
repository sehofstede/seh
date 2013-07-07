<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="icon" type="image/x-icon" href="/favicon.ico" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php if ( !is_front_page() ) : ?>
	<header id="masthead" class="navbar navbar-inverse" role="banner">
		<div class="navbar-inner">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="brand" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<nav id="site-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary',
						'container' => false,
						'menu_class' => 'nav' ) ); ?>
			</nav><!-- #site-navigation -->

			<form class="navbar-search pull-right">
				<?php get_search_form(); ?>
			</form>
		</div><!-- .navbar-inner -->
	</header><!-- #masthead .navbar -->
	<?php endif; ?>

	<div id="main" class="container wrapper">
		<div class="row-fluid">