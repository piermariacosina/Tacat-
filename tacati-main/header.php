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

<body <?php body_class('textured'); ?>>
<div id="fb-root"></div>
<header id="dashboard">
	<div class="container">
		<?php get_sidebar( 'header' ); ?>
		<div class="header-right"></div>
		<!-- AddThis Button BEGIN -->
		<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
			<a class="addthis_button_facebook"></a>
			<a class="addthis_button_twitter"></a>
			<a class="addthis_button_compact"></a>
			<a class="addthis_counter addthis_bubble_style"></a>
		</div>
		<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
		<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-504e04fd25d63caa"></script>
		<!-- AddThis Button END -->
	</div>
</header>
<div id="page" class="hfeed">
	<header id="branding" role="banner">
		
			<section>
				<div class="header-left"></div>
				<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				
				<ul class="nav nav-pills">
				  <li >
					 <a href="/torino">Fai la spesa!</a>
					<!-- <a class="dropdown-toggle"
					   data-toggle="dropdown"
					   href="#">
						non è la tua città?
						<b class="caret"></b>
					  </a>
					<ul class="dropdown-menu">
						<?php do_action('list_sites'); ?>
					</ul> -->
				  </li>
				</ul> 
				<div class="header-right"></div>
			</section>
			
<!-- <ul>
	<?php wp_nav_menu( array( 'menu' => 'header', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
	

</ul> -->
	<?php if(is_front_page()): ?>
			
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
					
	<?php elseif(get_post_type()=='product'): ?>
			
	<?php else: ?>
			
			<?php do_action('print_slideshow','slideshow',false) ?>
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
	<?php endif;?>
				
			<nav id="access" role="navigation" class="main-access">
				<div class="bottone_rosso">
					<a href="/torino">Fai la spesa!</a>
				</div>
			</nav>
			
			<?php
			 if ( (is_active_sidebar( 'sidebar-6' ) && (280 == $post->ID)) ||  (is_active_sidebar( 'sidebar-6' ) &&  is_page('home')) ||  (is_active_sidebar( 'sidebar-6' ) &&  (513 == $post->ID)) || (is_active_sidebar( 'sidebar-6' ) &&  ( get_post_type() == "product"))):?>
				<div class="categories">
					<?php dynamic_sidebar( 'sidebar-6' ); ?>
				</div><!-- #first .widget-area -->
			<?php endif; ?>
		
	</header><!-- #branding -->
	
	
	<div id="main" class="generic">
