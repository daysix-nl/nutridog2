<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="lg:flex lg:justify-between">
	<form class="woocommerce-cart-form w-full lg:max-w-[651px] xl:max-w-[736px] bg-white h-fit p-[0px] md:p-[27px] lg:p-[45px]" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
		<div class="w-full">
		<?php do_action( 'woocommerce_before_cart_table' ); ?>

		<table class="relative w-full overflow-hidden" cellspacing="0">
			
			<tbody class="pt-[60px] block w-full">
			
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
					/**
					 * Filter the product name.
					 *
					 * @since 2.1.0
					 * @param string $product_name Name of the product in the cart.
					 * @param array $cart_item The product in the cart.
					 * @param string $cart_item_key Key for the product in the cart.
					 */
					$product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						?>
						<tr class="woocommerce-cart-form__cart-item w-full flex items-center border-b-[1px] border-[#DDDDDD] pb-[20px] mb-[20px] <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

						

							<td class="w-[40px] md:w-[60px] lg:w-[73px] xl:w-[75px] h-[40px] md:h-[60px] lg:h-[73px] xl:h-[75px] block mr-[10px] md:mr-[15px] overflow-hidden">
								<img src="<?php echo get_the_post_thumbnail_url($product_id); ?>" alt="" class="packshot-full">
							</td>
							<td class="grid md:gap-[2px] w-[137px] md:w-[343px] lg:w-[223px] xl:w-[299px] mr-[-10px] md:mr-[10px] lg:mr-[20px]">
								<div class="product-name font-jakarta text-12 leading-16 md:text-16 md:leading-20 xl:text-17 xl:leading-20 font-semibold text-[#000000]" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
								<?php
								if ( ! $product_permalink ) {
									echo wp_kses_post( $product_name . '&nbsp;' );
								} else {
									/**
									 * This filter is documented above.
									 *
									 * @since 2.1.0
									 */
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
								}

								do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

								
								?>
								</div>
								<div class="bg-transparent">
									<?php 
										// Meta data.
										echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

										// Backorder notification.
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
										}
									?>
								</div>

								<div class="product-price font-jakarta text-12 leading-15 md:text-15 md:leading-19 xl:text-16 xl:leading-19 text-[#888888]" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
									<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
									?>
								</div>
							</td>
							
							<td>
							<td class="" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
							<div class="scale-[0.7] md:scale-[unset] mr-[8px] origin-right md:orgin-[unset]">
							<?php
							if ( $_product->is_sold_individually() ) {
								$min_quantity = 1;
								$max_quantity = 1;
							} else {
								$min_quantity = 0;
								$max_quantity = $_product->get_max_purchase_quantity();
							}

							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $max_quantity,
									'min_value'    => $min_quantity,
									'product_name' => $product_name,
								),
								$_product,
								false
							);

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
							?>
							</div>
							</td>
							<td class="h-[42px] md:h-[47px] xl:h-[45px] w-[42px] md:w-[47px] xl:w-[45px] border-[1px] border-[#E5E5E5] rounded-full flex items-center justify-center scale-[0.7] md:scale-[unset] origin-left md:orgin-[unset]">
								<?php
									echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										'woocommerce_cart_item_remove_link',
										sprintf(
											'<a href="%s" class="" aria-label="%s" data-product_id="%s" data-product_sku="%s"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="16.1" viewBox="0 0 14 16.1">
											<g id="bin-delete-recycle-svgrepo-com" transform="translate(-4 -1)">
												<path id="Path_496" data-name="Path 496" d="M17.3,1.7H12.4a.7.7,0,0,0-.7-.7H10.3a.7.7,0,0,0-.7.7H4.7a.7.7,0,0,0,0,1.4H17.3a.7.7,0,1,0,0-1.4Z" fill="#acacac"/>
												<path id="Path_497" data-name="Path 497" d="M17.5,9.7V20.9H8.4V9.7H7V21.6a.7.7,0,0,0,.7.7H18.2a.7.7,0,0,0,.7-.7V9.7Z" transform="translate(-1.95 -5.2)" fill="#acacac"/>
												<path id="Path_498" data-name="Path 498" d="M18.4,24.7v-7H17v7Z" transform="translate(-8.45 -11.1)" fill="#acacac"/>
												<path id="Path_499" data-name="Path 499" d="M28.4,24.7v-7H27v7Z" transform="translate(-14.95 -11.1)" fill="#acacac"/>
											</g>
											</svg>
											</a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											/* translators: %s is the product name */
											esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
											esc_attr( $product_id ),
											esc_attr( $_product->get_sku() )
										),
										$cart_item_key
									);
								?>
							</td>

							<td class="product-subtotal text-right text-12 leading-12 md:text-16 md:leading-20 xl:text-17 xl:leading-[20px] font-semibold w-[50px] md:w-[100px] lg:w-[100px] xl:w-[105px] text-[#000000]" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
								<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
								?>
							</td>
						</tr>
						<?php
					}
				}
				?>

				<?php do_action( 'woocommerce_cart_contents' ); ?>

				<tr class="w-full block mb-[30px] mt-[30pxl md:mb-[0px] lg:mt-[50px]">
					<td class="w-full block">

						<?php if ( wc_coupons_enabled() ) { ?>
							<div class="w-full block bg-[#fff] p-[15px] md:p-[0px] rounded-[99px] mt-[30px] md:mt-[unset]">
								<label for="coupon_code" class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label>
								<div class="coupon flex w-full">
									 <input type="text" name="coupon_code" class="w-full bg-transparent border-[1px] border-[#dddd] px-[20px] text-[#121212] rounded-l-[99px] text-12 leading-15 md:text-15 md:leading-19 xl:text-15 xl:leading-19 font-jakarta" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="w-[200px] bg-[#dddd] text-12 leading-15 md:text-15 md:leading-19 xl:text-15 xl:leading-19 font-jakarta font-semibold text-[#000000] h-[47px] lg:h-[52px] rounded-r-[99px]" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>">Toepassen</button>
									<?php do_action( 'woocommerce_cart_coupon' ); ?>
								</div>
							</div>
							
						<?php } ?>
						

						<div class="absolute top-0 left-0 right-0">
							<h1 class="font-jakarta font-extrabold text-22 leading-30 xl:text-22 xl:leading-30 text-[#000000]">Winkelwagen</h1>
							<hr class="mt-[12px] border-[#DDDDDD]">
						</div>
						<div class="absolute bottom-[117px] md:bottom-[unset] md:top-0 right-0 flex justify-end w-[173px] h-[28px] items-center">
							<button type="submit" class="update-cart items-center button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" class="mr-[8px]">
								<g id="renew-svgrepo-com" transform="translate(-0.672 -0.672)">
									<path id="Path_585" data-name="Path 585" d="M7.909,6.413H5.358a5.375,5.375,0,0,1,9.879,2.932h.977A6.352,6.352,0,0,0,4.977,5.279v-1.8H4V7.39H7.909Z" transform="translate(-2.009 -1.49)" fill="#525252"/>
									<path id="Path_586" data-name="Path 586" d="M11.306,18.932h2.55A5.375,5.375,0,0,1,3.977,16H3a6.352,6.352,0,0,0,11.238,4.065v1.8h.977V17.954H11.306Z" transform="translate(-1.498 -8.146)" fill="#525252"/>
									<g id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" transform="translate(0.368 0.368)">
									<rect id="Rectangle_340" data-name="Rectangle 340" width="15" height="15" transform="translate(0.304 0.304)" fill="none"/>
									</g>
								</g>
							</svg>
							Update winkelwagen
						</button>
						</div>
						
							

						<?php do_action( 'woocommerce_cart_actions' ); ?>

						<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
					</td>
				</tr>

				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			</tbody>
		</table>
		<?php do_action( 'woocommerce_after_cart_table' ); ?>
		</div>
	</form>

	<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

	<div class="bg-white h-fit w-full lg:max-w-[414px] xl:max-w-[464px] p-[0px] md:p-[27px] lg:p-[45px] md:mt-[35px] lg:mt-[unset]">
		<div class="sticky top-[168px] xl:top-[183px]">
			<div class="flex items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="19.995" height="19.315" viewBox="0 0 19.995 19.315">
					<path id="shopping-bag" d="M22.294,10.058a.649.649,0,0,0-.514-.262H18.373A5.222,5.222,0,0,0,13.387,5H12.044A5.222,5.222,0,0,0,7.059,9.8H3.651a.647.647,0,0,0-.522.26.791.791,0,0,0-.15.607l1.8,11.178a2.253,2.253,0,0,0,2.152,1.974H18.5a2.254,2.254,0,0,0,2.152-1.977l1.8-11.175A.789.789,0,0,0,22.294,10.058ZM12.044,6.476h1.343A3.806,3.806,0,0,1,17.017,9.8h-8.6A3.806,3.806,0,0,1,12.044,6.476Zm7.289,15.1a.868.868,0,0,1-.833.76H6.931a.868.868,0,0,1-.829-.756L4.45,11.272H20.982Z" transform="translate(-2.717 -4.75)" stroke="#000" stroke-width="0.5"/>
				</svg>
				<h3 class="font-jakarta font-extrabold text-20 leading-30 xl:text-22 xl:leading-30 text-[#000000] ml-[15px]">Overzicht</h3>
			</div>
			<hr class="my-[12px] border-[#DDDDDD]">
			<?php
				/**
				 * Cart collaterals hook.
				 *
				 * @hooked woocommerce_cross_sell_display
				 * @hooked woocommerce_cart_totals - 10
				 */
				do_action( 'woocommerce_cart_collaterals' );
			?>
		</div>
	</div>
</div>








<?php do_action( 'woocommerce_after_cart' ); ?>
