<?php
/**
 * Change password form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $woocommerce;
?>

<?php $woocommerce->show_messages(); ?>

<form action="<?php echo esc_url( get_permalink(woocommerce_get_page_id('change_password')) ); ?>" method="post">
	<div class="password">
	<p class="form-row form-row-first">
		<label for="password_1"><?php _e('New password', TACATI_TD); ?> <span class="required">*</span></label>
		<input type="password" class="input-text" name="password_1" id="password_1" />
	</p>
	<p class="form-row form-row-last">
		<label for="password_2"><?php _e('Re-enter new password', TACATI_TD); ?> <span class="required">*</span></label>
		<input type="password" class="input-text" name="password_2" id="password_2" />
	</p>
	</div>
	<div class="clear"></div>


		<input type="submit" class="button" name="change_password" value="<?php _e('Save', TACATI_TD); ?>" />
	

	
	<?php $woocommerce->nonce_field('change_password')?>
	<input type="hidden" name="action" value="change_password" />
</form>