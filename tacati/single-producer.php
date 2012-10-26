<?php
/*
	Template name:Producer
 */

get_header();?>
<div id="primary">
	<div id="content" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'producer' ); ?>
	<?php endwhile; // end of the loop. ?>
	<hr />
	<ul class="featured products">
		<?php do_action("featured_products_by_producer",$post->ID); ?>
	</ul>
	<hr />
	<ul class="products">
		<?php do_action("related_products",$post->ID); ?>
	</ul>
	</div>
</div>
	<?php get_sidebar(); ?>	
<div class="clear"></div>

<?php get_footer(); ?>
</div>