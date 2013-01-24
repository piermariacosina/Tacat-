<?php
/*
Template Name: Home
*/
get_header(); ?>
	<div id="primary">
		<div id="content" role="main">
			<?php $posts_array = get_posts( $args );  
			foreach( $posts_array as $post ) :	setup_postdata($post); ?>
				<?php get_template_part( 'content-single', get_post_format() ); ?>
			<?php endforeach; ?>
	
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
<?php get_footer(); ?>