<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

		<article>

			<ul>

			<?php while ( have_posts() ) : the_post(); ?>

				<li>

					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( $size, $attr ); ?></a>

					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<p class="posted-by">Posted By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author"><?php printf( __( '%s', 'twentyten' ), get_the_author() ); ?></a></p>

					<?php the_excerpt(); ?>

					<a href="<?php the_permalink() ?>" class="permalink">Continue reading</a>

				</li>

				<?php endwhile; ?>

			</ul>

			<div class="blog-nav">
				<div class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
				<div class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
			</div>

		</article>

		<aside>

			<?php get_sidebar(); ?>

		</aside>


<?php get_footer(); ?>