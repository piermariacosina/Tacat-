<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
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
		echo ' | ' . sprintf( __( 'Page %s', TACATI_TD ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="<?php echo get_theme_root_uri(); ?>/images/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
<link rel="icon" type="image/png" href="<?php echo get_theme_root_uri(); ?>/images/favicon.png">
	<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
    <!--[if lt IE 6]><script src="<?php echo get_theme_root_uri(); ?>/js/warning.js"></script><script>window.onload=function(){e("<?php echo get_theme_root_uri(); ?>/images/")}</script><![endif]-->
    <!--[if lt IE 7]><script src="<?php echo get_theme_root_uri(); ?>/js/warning.js"></script><script>window.onload=function(){e("<?php echo get_theme_root_uri(); ?></script><![endif]-->
    <!--[if lt IE 8]><script src="<?php echo get_theme_root_uri(); ?>/js/warning.js"></script><script>window.onload=function(){e("<?php echo get_theme_root_uri(); ?>/images/")}</script><![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class('textured'); ?>>
<div id="fb-root"></div>
<header id="dashboard">
		<div class="container">

		<div class="header-right"></div>
		<!-- AddThis Button BEGIN -->
		<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
			<a class="addthis_button_facebook"></a>
			<a class="addthis_button_twitter"></a>
			<a class="addthis_button_google_plusone_badge"></a>
			<a class="addthis_counter addthis_bubble_style"></a>
		</div>

		<!-- AddThis Button END -->
	</div>
</header>
<div id="page" class="hfeed">
	<header id="branding" role="banner">
		<section>
			<div class="header-left"></div>
			<h1 id="site-title"><a href="http://tacati.it/" title="Tacatì" rel="home">Tacatì</a></h1>
			
			<ul class="nav nav-pills">
					<li >
						<a class="dropdown-toggle"
							 data-toggle="dropdown"
							 href="#">
							<?php the_field("menu_title","option"); ?>
							<b class="caret"></b>
							</a>
						<ul class="dropdown-menu">
							<?php do_action('menu_list'); ?>
						</ul>
				</li>
			</ul> 
			
			<div class="header-right"></div>
		</section>

		<?php do_action('print_customslideshow',false) ?>

									

					
<div class="border">
	<ul>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>

	<nav id="access" role="navigation">
		<h3 class="assistive-text"><?php _e( 'Main menu', TACATI_TD ); ?></h3>
		<?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
		<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', TACATI_TD ); ?>"><?php _e( 'Skip to primary content', TACATI_TD ); ?></a></div>
		<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', TACATI_TD ); ?>"><?php _e( 'Skip to secondary content', TACATI_TD ); ?></a></div>
		<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav><!-- #access -->

	</header><!-- #branding -->
	
	
	<div id="main" class="generic">
