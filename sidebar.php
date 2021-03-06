<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package trirhena_theme
 */
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Archives', 'trirhena_theme' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h1 class="widget-title"><?php _e( 'Meta', 'trirhena_theme' ); ?></h1>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
		<?php 
			if( is_single() )
			{
				// output author avatar and description
			}
			// Add support for 2-clock social media widget
			if(function_exists('get_twoclick_buttons')) 
			{
				get_twoclick_buttons(get_the_ID());
			}
		?>
	</div><!-- #secondary -->
