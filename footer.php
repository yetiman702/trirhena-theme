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
</div><!-- #page -->
<nav id="sub" class="opacity-bg">
	<!-- Funktioniert noch nicht! -->
	<div class="align-right">Impressum | Kontakt | Admin &nbsp;&nbsp;</div>
</nav>

<?php wp_footer(); ?>

</body>
</html>