<?php
/**
 * Pagination
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $wp_query;
?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>

<div class="navigation">
 <div class="nav-next"><?php next_posts_link( __( 'next', 'woocommerce' ) ); ?></div>
 <div class="nav-previous"><?php previous_posts_link( __( 'prev', 'woocommerce' ) ); ?></div>
</div>

<?php endif; ?>