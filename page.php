<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package trirhena_theme
 */

get_header(); ?>

<?php if (get_option('show_on_front') != 'page' || !is_front_page() ) : ?>
	<div id="primary" class="content-area twocolumn">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php endif; ?>

<?php if ( ! trirhena_theme_is_landing_page() ) get_sidebar(); /* sidebar for page display */  ?>
<?php get_footer(); ?>
