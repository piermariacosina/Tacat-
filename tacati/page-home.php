<?php
/*
Template Name: Home
*/
get_header(); ?>

		<div id="primary">
			
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>
				<?php do_action('custom_featured_products', 12, 'rand', 'ASC', 4) ?>
				
			</div><!-- #content -->
			<div class="clear"></div>
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
			<div class="clear"></div>

		
		<?php get_footer(); ?>
</div>