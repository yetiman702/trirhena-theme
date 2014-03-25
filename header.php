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
		<div id="header-text" style="padding-left:<?php echo((get_header_image())? 60 : 0); ?>px;">
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="nolink" style="color: #<?php header_textcolor(); ?>;"><?php bloginfo( 'name' ); ?></a>
			</h1>
			<h2 class="site-description">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="nolink" style="color: #<?php header_textcolor(); ?>;"><?php bloginfo( 'description' ); ?></a>
			</h2>
		</div>
	</header>

	<nav id="site-navigation" class="main-navigation opacity-bg" role="navigation">
		<?php
		wp_nav_menu( array(
						   // count only top-level entries
						   'depth' => 1,
						   // display here when set to top
						   'theme_location' => 'primary',
						   'container_class' => 'menu',
						   'fallback_cb' => 'wp_page_menu'
			) );
		?>
		<h1 class="menu-toggle"><?php _e( 'Menu', 'trirhena_theme' ); ?></h1>
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'trirhena_theme' ); ?></a>
	</nav><!-- #site-navigation -->

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home", class="nolink">
		<img src="<?php header_image(); ?>"
			id="header-image"
			title="<?php bloginfo( 'name' ); ?> -- <?php bloginfo( 'description' ); ?>"
			alt="<?php bloginfo( 'name' ); ?> -- <?php bloginfo( 'description' ); ?>">
	</a>
	<?php endif; // End header image check. ?>

	
	<div id="window">
		
		<!-- hier die Slideshow hin -->
		<div id="claim"><h1>&laquo;Bla Bla Bla&raquo;</h1></div>
		
		<nav id="sub" class="opacity-bg">
			<!-- Funktioniert noch nicht! -->
			<div class="align-right">Impressum | Kontakt | Admin &nbsp;&nbsp;</div>
		</nav>
		</div><!-- /#window -->
	<div id="content" class="site-content">
