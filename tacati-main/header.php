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
					 <a href="/ilbuonsenso"><!--Fai la spesa!-->Asti</a>
					<!-- <a class="dropdown-toggle"
						 data-toggle="dropdown"
						 href="#">
						non è la tua città?
						<b class="caret"></b>
						</a>
					<ul class="dropdown-menu">
						<li><a href="/macelleria-pavese/">Tacatì-Macelleria Pavese</a></li><li><a href="/ilbuonsenso/">Tacatì- Il Buonsenso</a></li><li><a href="/">Tacatì</a></li>					</ul> -->
					</li>
				</ul> 
				<div class="header-right"></div>
			</section>
			
					

<!-- <ul>
	<div class="menu"><ul><li class="current_page_item"><a href="http://tacati.it/" title="Home">Home</a></li><li class="page_item page-item-470"><a href="http://tacati.it/privacy-policy/">Privacy policy</a></li><li class="page_item page-item-472"><a href="http://tacati.it/termini-condizioni/">Termini e condizioni</a></li></ul></div>


</ul> -->

				<div id="slider" class="flexslider">
						<ul class="slides">
							<li>
							<img src="http://tacati.it/wp-content/uploads/2012/09/foto_frutta_verdura_7042-1-959x372.jpg" alt=""/>
								<div class="sinistra">
<!--									<div class="background"></div>-->
									<div class="content">
										<h1>Il supermercato diffuso</h1>
										<h5>Come funziona?</h5>
										<p>Clicca <a title="Fai la spesa" href="http://tacati.it/torino" >qui</a> per accedere al negozio online e acquistare prodotti di aziende agricole, laboratori artigianali e piccoli commerci di Asti, Torino e dintorni.</p>
	<p>Altrimenti, scorri le diapositive per saperne di più.</p>
	
	<div id="navigation">
	  <div class="button_slider"></div>
	  <div class="button_slider2"></div>
	  <div class="button_slider3"></div>
	 
</div>


									</div>
									
	<div id="content2">
	<h1>Asti</h1>
		
	<div class="stripes"></div>
	
	<div id="box1">
	<div class="stripes"></div>
	
	 
	  <div class="foto"></div>
			<h2>Titolo1</h2>
			<p>Piccola descrizione sul punto vendita Tacatì con prodotti di alta qualità, tutti italiani e a km 0.</p>
			<h4>Formaggio di capra D.O.C</h4>
			<h3>20 % di sconto sulla prima spesa
			Centro, Via XX settembrte</h3>
		
	  </div>
	  
			
		  <div id="box2">
		  <div class="stripes"></div>
		   
			<div class="foto"></div>
				<h2>Titolo1</h2>
				<p>Piccola descrizione sul punto vendita Tacatì con prodotti di alta qualità, tutti italiani e a km 0.</p>
				<h4>Formaggio di capra D.O.C</h4>
				<h3>20 % di sconto sulla prima spesa
				Centro, Via XX settembrte</h3>
			
			</div>
		
				</div>
				
				
				<div id="content3">
				<h1>Torino</h1>
					
				<div class="stripes"></div>
				
				<div id="box1">
				<div class="stripes"></div>
				
				 
				  <div class="foto"></div>
						<a class="title">Titolo1</a>
						<p>Piccola descrizione sul punto vendita Tacatì con prodotti di alta qualità, tutti italiani e a km 0.</p>
						<h4>Formaggio di capra D.O.C</h4>
						<h3>20 % di sconto sulla prima spesa
						Centro, Via XX settembrte</h3>
					
				  </div>
				  
						
					  <div id="box2">
					  <div class="stripes"></div>
					   
						<div class="foto"></div>
							<h2>Titolo1</h2>
							<p>Piccola descrizione sul punto vendita Tacatì con prodotti di alta qualità, tutti italiani e a km 0.</p>
							<h4>Formaggio di capra D.O.C</h4>
							<h3>20 % di sconto sulla prima spesa
							Centro, Via XX settembrte</h3>
						
						</div>
					
							</div>
							
				
			
									
									
								</div>
							</li>
						</ul>
					</div>
					
										
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
	
					
	<!--<h3> Asti </h3>
	<?php get_shops(Asti); ?>
	<h3> Torino	 </h3>
	<?php get_shops(Torino); ?> -->
	</header><!-- #branding -->
	
	
	<div id="main" class="generic">
