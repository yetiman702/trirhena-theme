<?php
error_reporting(E_ALL);
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package trirhena_theme
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
	<header id="masthead" class="site-branding opacity-bg">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php if ( get_header_image() ) : ?>
			<img src="<?php header_image(); ?>"
				title="<?php bloginfo( 'name' ); ?> -- <?php bloginfo( 'description' ); ?>"
				alt="<?php bloginfo( 'name' ); ?> -- <?php bloginfo( 'description' ); ?>">
			<?php endif; // End header image check. ?>
			<div id="logo-text" style="color: #<?php header_textcolor(); ?>;">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		</a>
	</header>

	
	<div id="window">
		
		<!-- hier die Slideshow hin -->
		<div id="claim"><h1>&laquo;Bla Bla Bla&raquo;</h1></div>
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php 
				wp_nav_menu( array(
							// count only top-level entries
							'depth' => 1,
							// display here when set to top
							'theme_location' => 'primary',
							'container_class' => 'menu opacity-bg',
							'fallback_cb' => 'wp_page_menu'
				) );
			?>
			<h1 class="menu-toggle"><?php _e( 'Menu', 'trirhena_theme' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'trirhena_theme' ); ?></a>

		</nav><!-- #site-navigation -->
		<nav id="sub" class="opacity-bg">
			<!-- Funktioniert noch nicht! -->
			<div class="align-right">Impressum | Kontakt | Admin &nbsp;&nbsp;</div>
		</nav>
		</div><!-- /#window -->
	<div id="content" class="site-content">
