<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<div class="border">
	 <ul>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
<div class="shadow top"></div>
	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
			
			<a href="<?php bloginfo('url') ?>"><h1 class="logo-brand">tacati</h1></a>
			<?php if(function_exists('nsu_signup_form')) nsu_signup_form(); ?>
			
			<ul class="footer">
				<li class="footer">
					<h3><?php the_field("press_title","option"); ?></h3>
					<?php get_press() ?>
				</li>
				<li class="footer">
					<h3><?php the_field("where_title","option"); ?></h3>
					<p><?php the_field("where","option");?></p>
					<ul id="channels">
						<li class="fb_icon"><a href="http://www.facebook.com/tacati">Facebook</a></li>
						<li class="tw_icon"><a href="http://twitter.com/tacatwit">Twitter</a></li>
					</ul>
				</li>
			</ul>
			<div class="fb-like-box" data-href="http://www.facebook.com/tacati" data-width="292" data-height="260" data-show-faces="true" data-stream="false" data-header="false"></div>

			<ul class="formal">
				<?php wp_nav_menu( array( 'menu' => 'footer', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
			</ul>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>