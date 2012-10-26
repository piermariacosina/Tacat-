<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $woocommerce;
?>
<ul class=" cart_list product_list_widget <?php echo $args['list_class']; ?>">

	<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>

		<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

			$_product = $cart_item['data'];

			// Only display if allowed
			if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
				continue;

			// Get price
			$product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();

			$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
			?>

			<li>
				
				<h5><a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">

	<?php echo $_product->get_image(); ?>

	<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>

</a></h5>
	
				<div class="price">
					<?php echo $woocommerce->cart->get_item_data( $cart_item ); ?>
					
					<p><?php printf( '%s &times; <span>%s</span>', $cart_item['quantity'], $product_price ); ?></p>    
				</div>
				<hr>
			</li>
	
		<?php endforeach; ?>

	<?php else : ?>

		<li class="empty"><?php _e('No products in the cart.', 'woocommerce'); ?></li>

	<?php endif; ?>

</ul><!-- end product list -->

<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>

	<div class="price padded"><p class="total"><?php _e('Subtotal', 'woocommerce'); ?>:<span><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span></p></div>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	
		
		<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="button"><span><?php _e('View Cart &rarr;', 'woocommerce'); ?></span></a>
		<a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="button checkout"><span><?php _e('Checkout &rarr;', 'woocommerce'); ?></span></a>
	

<?php endif; ?>