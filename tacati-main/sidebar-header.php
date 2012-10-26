<?php
/**
 * The Sidebar containing the header widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

$options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];

if ( 'content' != $current_layout ) :
?>
		
			<?php if ( ! dynamic_sidebar( 'sidebar-7' ) ) : ?>

				

			<?php endif; // end sidebar widget area ?>
			
<?php endif; ?>