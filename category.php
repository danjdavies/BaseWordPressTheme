<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

		<article>

			<h1 class="page-title category-title"><?php printf( '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<ul>

				<?php while ( have_posts() ) : the_post(); ?>

				<li>

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