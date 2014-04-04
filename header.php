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
<!-- Hack for only with script elements http://rickyrosario.com/blog/the-opposite-of-the-noscript-element-yesscript-scriptonly/ -->
<script type="text/javascript">
//<![CDATA[
	document.getElementsByTagName('html')[0].className='jsOn';
//]]>
</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-branding">
		<div id="site-branding" class="opacity-bg<?php echo((get_header_image())? " image" : ""); ?>" >
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="nolink" style="color: #<?php header_textcolor(); ?>;"><?php bloginfo( 'name' ); ?></a>
			</h1>
			<h2 class="site-description">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="nolink" style="color: #<?php header_textcolor(); ?>;"><?php bloginfo( 'description' ); ?></a>
			</h2>
		</div>

		<!-- hier die Slideshow hin -->
		<div id="claim" <?php if( ! trirhena_theme_is_landing_page() ){ echo 'class="non_landing_page"'; } ?>><h1>&laquo;
			<?php 
				if(get_option('show_on_front') != 'page') :
					_e('This Theme is designed for a static front page. Please select one!', 'trirhena_theme');
				else :
						echo get_the_title(get_option('page_on_front'));
				  endif; ?>
		&raquo;</h1></div>

		<nav id="site-navigation" class="opacity-bg<?php echo((get_header_image())? " image" : ""); ?>" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'trirhena_theme' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'trirhena_theme' ); ?></a>
			<?php
				wp_nav_menu( array(
								   // count only top-level entries
								   'depth' => -1,
								   // display here when set to top
								   'theme_location' => 'primary',
								   'container_class' => 'menu',
								   'fallback_cb' => 'wp_page_menu'
							 )
				);
			?>
		</nav><!-- #site-navigation -->

		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home", class="nolink">
			<img src="<?php header_image(); ?>"
				id="header-image"
				title="<?php bloginfo( 'name' ); ?> -- <?php bloginfo( 'description' ); ?>"
				alt="<?php bloginfo( 'name' ); ?> -- <?php bloginfo( 'description' ); ?>">
		</a>
		<?php endif; // End header image check. ?>
	</header>

	<div id="content" class="site-content" <?php if( trirhena_theme_is_landing_page() ) { echo "style=\"display:none;\""; } ?>>
