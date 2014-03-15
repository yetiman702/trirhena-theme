<?php
error_reporting(E_ALL);
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _s
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="titlebar" class="opacity-bg">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php bloginfo('template_directory'); ?>/img/trc_circles.png" 
				class="title-logo"
				title="Corporate Logo: TriRhena Consulting -- Studentische Unternehmensberatung"
				alt="TriRhena Corporate Logo und Schriftzug: TriRhena Consulting -- Studentische Unternehmensberatung">
			<div id="logo-text">
				<div id="logo-text-normal">TriRhena Consulting e.V.</div>
				<div id="logo-subtext">Studentische Unternehmensberatung</div>
			</div>
		</a>
	</header><!-- /#titlebar -->
	
	<!---
	<div class="site-branding">
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	</div>
	-->
	
	<div id="window">
		<div id="header-img">
			<img src="<?php echo get_background_image(); ?>" id="header-img">
		</div>
		
		<!-- hier die Slideshow hin -->
		<div id="claim"><h1>&laquo;Bla Bla Bla&raquo;</h1></div>
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
			
			<?php 
					/* check if nav menu at location 'top' is customized
	 				 * if not wp falls back to the wp_page_menu which causes errors in the
					 * Walker_Nav_Menu class and all of its extensions :( :( AND
					 * BEHAVES COMPLETELY DIFFERENT IN CSS!
					 */  
					 
						if (has_nav_menu('top'))
						{
							wp_nav_menu( array(
								// echo the menu
								'echo' => 1,
								// count only top-level entries
								'depth' => 1,
								// display here when set to top
								'theme_location'	=> 'top',
								// wrap only nav items
								'container_class' => 'menu opacity-bg'
							) );
						}	
						else // anticipate fallback on wp_page_menu
						{
							wp_page_menu( array(
								// echo the menu
								'echo' => 1,
								// count only top-level entries
								'depth' => 1,
								// display here when set to top
								'theme_location'	=> 'top',
								// now wrap only page items
								'menu_class' => 'menu opacity-bg'
						) );
						}	
			?>
		</nav><!-- #site-navigation -->
		<nav id="sub" class="opacity-bg">
			<!-- Funktioniert noch nicht! -->
			<div class="align-right">Impressum | Kontakt | Admin &nbsp;&nbsp;</div>
		</nav>
		</div><!-- /#window -->
	<div id="content" class="site-content">