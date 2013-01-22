<?php
/**
 * Pay for order form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $woocommerce;
?>
<form id="order_review" method="post">

	<table class="shop_table">
		<thead>
			<tr>
				<th><?php _e('Product', TACATI_TD); ?></th>
				<th><?php _e('Qty', TACATI_TD); ?></th>
				<th><?php _e('Totals', TACATI_TD); ?></th>
			</tr>
		</thead>
		<tfoot>
		<?php
			if ( $totals = $order->get_order_item_totals() ) foreach ( $totals as $total ) :
				?>
				<tr>
					<th scope="row" colspan="2"><?php echo $total['label']; ?></th>
					<td><?php echo $total['value']; ?></td>
				</tr>
				<?php
			endforeach;
		?>
		</tfoot>
		<tbody>
			<?php
			if (sizeof($order->get_items())>0) :
				foreach ($order->get_items() as $item) :
					echo '
						<tr>
							<td>'.$item['name'].'</td>
							<td>'.$item['qty'].'</td>
							<td>' . $order->get_formatted_line_subtotal($item) . '</td>
						</tr>';
				endforeach;
			endif;
			?>
		</tbody>
	</table>
	<div id="payment">
		<?php if ($order->order_total > 0) : ?>
			<!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="#" onclick="javascript:window.open('https://www.paypal.com/it/cgi-bin/webscr?cmd=xpt/Marketing/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=400, height=350');"><img  src="https://www.paypalobjects.com/it_IT/IT/Marketing/i/bnr/bnr_horizontal_solutiongraphic_335x80.gif" border="0" alt="Che cos'&egrave; PayPal"></a></td></tr></table><!-- PayPal Logo -->
		<ul class="payment_methods methods">
			<?php
				$available_gateways = $woocommerce->payment_gateways->get_available_payment_gateways();
				if ($available_gateways) :
					// Chosen Method
					if (sizeof($available_gateways)) current($available_gateways)->set_current();
					foreach ($available_gateways as $gateway ) :
						?>
						<li>
							<input type="radio" id="payment_method_<?php echo $gateway->id; ?>" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php if ($gateway->chosen) echo 'checked="checked"'; ?> />
							<label for="payment_method_<?php echo $gateway->id; ?>"><?php echo $gateway->get_title(); ?> <?php echo $gateway->get_icon(); ?></label>
							<?php
								if ( $gateway->has_fields() || $gateway->get_description() ) :
									echo '<div class="payment_box payment_method_'.$gateway->id.'" style="display:none;">';
									$gateway->payment_fields();
									echo '</div>';
								endif;
							?>
						</li>
						<?php
					endforeach;
				else :

					echo '<p>'.__('Sorry, it seems that there are no available payment methods for your location. Please contact us if you require assistance or wish to make alternate arrangements.', TACATI_TD).'</p>';

				endif;
			?>
		</ul>
		<?php endif; ?>

		<div class="form-row">
			<?php $woocommerce->nonce_field('pay')?>
			<input type="submit" class="button alt" id="place_order" value="<?php _e('Pay for order', TACATI_TD); ?>" />
			<input type="hidden" name="woocommerce_pay" value="1" />
		</div>

	</div>

</form>