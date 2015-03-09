<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<article>

			<?php while ( have_posts() ) : the_post(); ?>

			<h2><?php the_title(); ?></h2>

			<p class="posted-by">Posted By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author"><?php printf( __( '%s', 'twentyten' ), get_the_author() ); ?></a></p>

			<?php the_content(); ?>

			<div class="comments-block"><?php comments_template(); ?></div>

			<?php endwhile; ?>

			<div class="blog-nav">

				<div class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
				<div class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>

			</div>

		</article>

		<aside>

			<?php get_sidebar(); ?>

		</aside>

<?php get_footer(); ?>