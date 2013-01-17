<?php
/*
Template Name: Domande
*/
get_header(); ?>

		<div id="primary">
			
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>
				<?php echo do_shortcode('[odd_faq]');?>
				<?php //echo do_shortcode('[gravityform id="1" name="Contattaci"]');?>
				
			</div><!-- #content -->
			<div class="clear"></div>
			</div><!-- #primary -->

			<div class="clear"></div>
	
		<?php get_footer(); ?>
	</div>