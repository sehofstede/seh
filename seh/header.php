<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta  charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="author" content="Sense Hofstede" />
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
		echo ' | ' . sprintf( __( 'Page %s', 'seh' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
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
<!-- source: http://css-tricks.com/scrollfollow-sidebar/ -->
<script type="text/javascript">
$(function() {

    var $blog       = $("#blog"),
        $blogtab    = $("#blogtab");

    function placeBlog() {
        var bottom = $blogtab.outerHeight(true) + parseInt($blog.css("padding-top").replace("px", "")) - $blog.outerHeight(true);
        $blog.css("bottom", bottom + "px");
    }

    $(document).ready(placeBlog);
    $(window).resize(placeBlog);

    $("#blogtab > a").live("click", function(event){
        event.preventDefault();
    });

    $blogtab.click(function(){
         	$('html,body').animate({scrollTop: $blog.offset().top},'slow');
         	var stateObj = { pos: "blog" };
            history.pushState(stateObj, "Blog", "#blog");
    });
    
<?php if ( is_home() ) : ?>
    
    $(".expandarrow,#logo").click(function(event){
            event.preventDefault();
            if($("#welcome").width() == 300) {
                $(".expandarrow").html("&#x21F1;");
                $("#welcome").animate({height: 500, width: 520}, 'slow');
            } else {
                $(".expandarrow").html("&#x21F2;");
                $("#welcome").animate({height: 300, width: 300}, 'slow');
            }
    });
    
<?php endif; ?>

});
</script>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
<?php if ( ! is_home() ) : ?>
    <div id="headerlogo">
        <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php bloginfo('template_directory'); ?>/images/seh-rounded-100.png" id="logo" alt="SH"/></a>
    </div>
<?php endif; ?>
