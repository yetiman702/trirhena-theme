<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package trirhena_theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'trirhena_theme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( '<img src="'.get_template_directory_uri().'/img/gear.png" class="edit-link"> Edit', '<footer class="entry-meta"><div class="edit-link">', '</div></footer>' ); ?>
</article><!-- #post-## -->
