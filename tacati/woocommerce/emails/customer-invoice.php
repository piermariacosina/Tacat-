<?php
/**
 * Customer invoice email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if (!defined('ABSPATH')) exit; ?>

<?php do_action('woocommerce_email_header', $email_heading); ?>

<?php if ($order->status=='pending') : ?>

	<p><?php printf( __( 'An order has been created for you on &ldquo;%s&rdquo;. To pay for this order please use the following link: <a href="%s">Pay</a>', TACATI_TD ), get_bloginfo( 'name' ), $order->get_checkout_payment_url() ); ?></p>

<?php endif; ?>

<?php do_action('woocommerce_email_before_order_table', $order, false); ?>

<h2><?php echo __('Order:', TACATI_TD) . ' ' . $order->get_order_number(); ?> (<?php printf( '<time datetime="%s">%s</time>', date_i18n( 'c', strtotime( $order->order_date ) ), date_i18n( __('jS F Y', TACATI_TD), strtotime( $order->order_date ) ) ); ?>)</h2>

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
	<thead>
		<tr>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e('Product', TACATI_TD); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e('Quantity', TACATI_TD); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e('Price', TACATI_TD); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
			switch ( $order->status ) {
				case "completed" :
					echo $order->email_order_items_table( true, false, true );
				break;
				case "processing" :
					echo $order->email_order_items_table( get_option('woocommerce_downloads_grant_access_after_payment')=='yes' ? true : false, true, true );
				break;
				default :
					echo $order->email_order_items_table( false, true, false );
				break;
			}
		?>
	</tbody>
	<tfoot>
		<?php
			if ( $totals =get_order_item_totals_custom( $order) ) {
				$i = 0;
				foreach ( $totals as $total ) {
					$i++;
					?><tr>
						<th scope="row" colspan="2" style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['label']; ?></th>
						<td style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['value']; ?></td>
					</tr><?php
				}
			}
		?>
		<div class="hours">
			<h2>orario ritiro</h2> <h3><?php woocommerce_custom_hours($order); ?></h3>
		</div>
		<div class="days">
			<h2>giorno di ritiro</h2> <h3><?php woocommerce_custom_days($order); ?></h3>
		</div>
		<div class="noprofit">
			<h2>donazione fatta a</h2> <h3><?php woocommerce_custom_noprofit($order) ?></h3>
		</div>
	</tfoot>
</table>

<?php do_action('woocommerce_email_after_order_table', $order, false); ?>

<?php do_action('woocommerce_email_footer'); ?>