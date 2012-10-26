<?php
/*
Template Name: Punti di raccolta
*/
get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>
				<ul class="pdr">
					<?php do_action("list_pdr"); ?>
				</ul>
			</div><!-- #content -->
			
		<div class="clear"></div>
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	<div class="clear"></div>

<?php get_footer(); ?></div>
