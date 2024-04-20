<?php
/**
 * Single variation cart button
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	 <div class="flex w-full justify-between">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	woocommerce_quantity_input(
		array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		)
	);

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>

	
	
    <button type="submit" class="h-[45px] bg-[#C2F0A0] rounded-[29px] font-jakarta font-bold text-[#000000] ml-[15px] lg:ml-[0px] text-15 xl:text-16 w-full lg:w-[336px] xl:w-[401px] flex items-center justify-center alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">Voeg toe</button>
			
	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
	<?php $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
            <button class="add-favorite h-[45px] w-[45px] border-[1px] border-[#000] rounded-full justify-center items-center hidden lg:flex <?php echo str_contains($actual_link, 'verlanglijst') ? "close-button-favorite" : "" ?> " id-data="<?php echo $product->get_id(); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/ fill="#000"></svg>
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/ fill="#000"></svg>
            </button>
            <button class="h-[45px] w-[45px] border-[1px] border-[#000] rounded-full justify-center items-center hidden lg:flex">
                <svg id="Page-1" xmlns="http://www.w3.org/2000/svg" width="16.213" height="17.564" viewBox="0 0 16.213 17.564">
                    <g id="Icon-Set">
                        <path id="share" d="M324.836,742.213a2.027,2.027,0,1,1,2.027-2.027,2.027,2.027,0,0,1-2.027,2.027Zm-9.458-5.4a2.027,2.027,0,1,1,2.027-2.027,2.027,2.027,0,0,1-2.027,2.027Zm9.458-9.458a2.027,2.027,0,1,1-2.027,2.027,2.027,2.027,0,0,1,2.027-2.027Zm0,9.458a3.368,3.368,0,0,0-2.84,1.562l-3.618-2.067a3.172,3.172,0,0,0,.219-2.492l3.764-2.15a3.543,3.543,0,1,0-.744-1.312l-3.764,2.15a3.381,3.381,0,1,0-.435,4.96l-.014.026,4.09,2.337a3.243,3.243,0,0,0-.037.365,3.378,3.378,0,1,0,3.378-3.378Z" transform="translate(-312 -726)" fill-rule="evenodd"/>
                    </g>
                </svg>
            </button>
        </div>
</div>
