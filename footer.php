<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package trirhena_theme
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'trirhena_theme' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'trirhena_theme' ), 'trirhena_theme', '<a href="http://trirhena-consulting.de/" rel="designer">TRC</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
<nav id="sub" class="opacity-bg">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="big gray">www.trirhena-consulting.de</a><br>
	<?php if(has_nav_menu('footer')) : ?>
	<span class="foot-menu">
		<?php $links = wp_nav_menu( array( 'theme_location'  => 'footer',
										   'depth'           => -1,
										   'echo'            => 0,
										   'container'       => false,
										   'walker'          => new Trirhena_Theme_Nav_Link_Walker(),
										   'items_wrap'      => '%3$s'
										  )
								   );
			  $links_array = array_filter(explode("\n", $links));
			  echo implode('<span>|</span>', $links_array);
		?>
	</span>
	<?php endif; ?>
</nav>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>