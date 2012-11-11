<?php
/**
 * Sorting
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

?>
<form class="woocommerce_ordering" method="POST">
	<select name="sort" class="orderby">
		<?php
			$catalog_orderby = apply_filters('woocommerce_catalog_orderby', array(
				'menu_order' 	=> __('Default sorting', TACATI_TD),
				'title' 		=> __('Sort alphabetically', TACATI_TD),
				'date' 			=> __('Sort by most recent', TACATI_TD),
				'price' 		=> __('Sort by price', TACATI_TD)
			));

			foreach ( $catalog_orderby as $id => $name )
				echo '<option value="' . $id . '" ' . selected( $_SESSION['orderby'], $id, false ) . '>' . $name . '</option>';
		?>
	</select>
</form>