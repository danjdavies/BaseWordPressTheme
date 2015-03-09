<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

		<div id="primary" class="widget-area" role="complementary">

			<ul>

		<?php

			if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

				<li id="search" class="widget-container widget_search">
					<?php get_search_form(); ?>
				</li>

				<li id="archives" class="widget-container">
					<h3 class="widget-title"><?php _e( 'Archives', 'twentyten' ); ?></h3>
					<ul>
						<?php wp_get_archives( 'type=monthly' ); ?>
					</ul>
				</li>

				<?php endif; // end primary widget area ?>

			</ul>

		</div>


		<?php

			if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

			<div id="secondary" class="widget-area" role="complementary">

				<ul>
					<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
				</ul>

			</div><!-- #secondary .widget-area -->

		<?php endif; ?>
