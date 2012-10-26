<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product;
?>
<?php if(get_field('weight')){
$weight=0;
while(the_repeater_field('weight'))
{
    if($weight==0){
    the_sub_field('value');
    the_sub_field('mesure');
    }
    $weight++;
}}?>
<?php if ($price_html = $product->get_price_html()) : ?>
	<?php echo $price_html; ?>
<?php endif; ?>