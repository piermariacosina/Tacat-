<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibilty
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;
?>
<li class="prodotto <?php
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
		echo 'last';
	elseif ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 )
		echo 'first';
	?>">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<a href="<?php the_permalink(); ?>">
		<div class="image"></div>
		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		</a>
		<?php
			switch (get_field('tipo-prodotto')) {
				case "dop":?>
					<div class="dop"></div>					
				<?php case "igp":?>
					<div> <?php the_field('tipo-prodotto','product');?></div>
			<?php }	?>
		<div class="info">
			<h3 class="product"><?php the_title(); ?></h3>
			<h4 class="product"> 
				<?php do_action('first_related_producer');?>
			</h4>        
			<div class="price">
				<h3><?php do_action( 'woocommerce_after_shop_loop_item_title' );?></h3>
					<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
			</div>
		</div>
	</li>