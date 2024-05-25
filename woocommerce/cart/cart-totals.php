<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h2><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h2>

	<table cellspacing="0" class="shop_table shop_table_responsive">

		<tr class="cart-subtotal">
			<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<tr class="woocommerce-shipping-totals shipping">
				<th>Verzendkosten</th>
				<td data-title="Verzendkosten"><?php
				$verzendkosten = WC()->cart->shipping_total;

				if ($verzendkosten >= 1) {
					echo '' . wc_price($verzendkosten);
				} else {
					echo '<span class="text-[#000]">Gratis</span>';
				}
				?></td>

				</tr>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

			<tr class="shipping">
				<th>Verzendkosten</th>
				<td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
			</tr>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php
		if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
			$taxable_address = WC()->customer->get_taxable_address();
			$estimated_text  = '';

			if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
				/* translators: %s location. */
				$estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
			}

			if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
				foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					?>
					<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<th><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
						<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
					<?php
				}
			} else {
				?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
					<td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
				<?php
			}
		}
		?>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	</table>
	<hr class="border-[#DDDDDD] my-[20px]">
	<div class="w-full mx-auto flex justify-between max-w-[360px] md:max-w-[unset]">
                <div class="border-[#EDEDED] border-[1px] rounded-[4px] h-[23px] w-[36.64px] overflow-hidden flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19.474" height="6.247" viewBox="0 0 19.474 6.247">
                        <g id="Group_75" data-name="Group 75" transform="translate(0 0)">
                            <path id="Path_66" data-name="Path 66" d="M19.668,57.661H18.079l.993-6.035h1.589Zm-2.926-6.035-1.515,4.151-.179-.894h0l-.535-2.714a.678.678,0,0,0-.754-.543h-2.5l-.029.1a5.984,5.984,0,0,1,1.662.69l1.381,5.243h1.656l2.528-6.035Zm12.5,6.035H30.7l-1.272-6.035H28.15a.729.729,0,0,0-.734.45l-2.37,5.585H26.7l.331-.9h2.02Zm-1.749-2.135.835-2.258.47,2.258Zm-2.321-2.449.227-1.3a4.632,4.632,0,0,0-1.429-.263c-.789,0-2.661.341-2.661,2,0,1.559,2.2,1.578,2.2,2.4s-1.971.672-2.622.156l-.236,1.355a4.5,4.5,0,0,0,1.794.341c1.084,0,2.72-.555,2.72-2.066,0-1.569-2.218-1.715-2.218-2.4S24.491,52.708,25.171,53.078Z" transform="translate(-11.226 -51.519)" fill="#2566af"/>
                        </g>
                    </svg>
                </div>
                <div class="border-[#EDEDED] border-[1px] rounded-[4px] h-[23px] w-[36.64px] overflow-hidden flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21.211" height="13.467" viewBox="0 0 21.211 13.467">
                        <ellipse id="Ellipse_20" data-name="Ellipse 20" cx="6.749" cy="6.734" rx="6.749" ry="6.734" fill="#eb001b"/>
                        <ellipse id="Ellipse_21" data-name="Ellipse 21" cx="6.749" cy="6.734" rx="6.749" ry="6.734" transform="translate(7.713)" fill="#f79e1b"/>
                        <path id="Path_57" data-name="Path 57" d="M21.785,11.734A6.488,6.488,0,0,0,18.892,6.3,6.751,6.751,0,0,0,16,11.734a6.617,6.617,0,0,0,2.892,5.434,6.488,6.488,0,0,0,2.892-5.434Z" transform="translate(-8.287 -5)" fill="#ff5f00"/>
                    </svg>

                </div>
                <div class="border-[#EDEDED] border-[1px] rounded-[4px] h-[23px] w-[36.64px] overflow-hidden flex justify-center items-center">
                   <svg xmlns="http://www.w3.org/2000/svg" width="10.506" height="12.512" viewBox="0 0 10.506 12.512">
                        <path id="Path_51" data-name="Path 51" d="M23.545,8.146a2.185,2.185,0,0,0-.578-2.193A3.878,3.878,0,0,0,19.978,5H16.025a.609.609,0,0,0-.578.477L14,15.1c0,.191.1.381.289.381h2.6l.386-3.241,1.735-2.1Z" transform="translate(-14 -5)" fill="#003087"/>
                        <path id="Path_52" data-name="Path 52" d="M23.638,8.3l-.193.191c-.482,2.669-2.121,3.622-4.435,3.622H17.95a.609.609,0,0,0-.578.477l-.578,3.718-.193.953c0,.191.1.381.289.381h2.025a.44.44,0,0,0,.482-.381v-.1l.386-2.288v-.1c0-.191.289-.381.482-.381h.289c2.025,0,3.567-.763,3.953-3.05a2.582,2.582,0,0,0-.386-2.288A.962.962,0,0,0,23.638,8.3Z" transform="translate(-14.093 -5.13)" fill="#3086c8"/>
                        <path id="Path_53" data-name="Path 53" d="M23.088,8.086a.357.357,0,0,0-.289-.1.357.357,0,0,1-.289-.1,3.655,3.655,0,0,0-1.061-.1H18.557c-.1,0-.193,0-.193.1-.193.1-.289.191-.289.381L17.4,12.471v.1a.538.538,0,0,1,.578-.477h1.253c2.41,0,3.953-.953,4.435-3.622V8.277a.741.741,0,0,0-.482-.191Z" transform="translate(-14.122 -5.128)" fill="#012169"/>
                    </svg>

                </div>
                <div class="border-[#EDEDED] border-[1px] rounded-[4px] h-[23px] w-[36.64px] overflow-hidden flex justify-center items-center">
                   <svg id="ideal-logo" xmlns="http://www.w3.org/2000/svg" width="16.905" height="14.733" viewBox="0 0 16.905 14.733">
                        <g id="Group_72" data-name="Group 72">
                            <path id="Path_58" data-name="Path 58" d="M0,1.092V13.64a1.1,1.1,0,0,0,1.1,1.092H8.687c5.733,0,8.218-3.173,8.218-7.383C16.905,3.162,14.42,0,8.687,0H1.1A1.1,1.1,0,0,0,0,1.092Z" fill="#fff"/>
                            <path id="Path_59" data-name="Path 59" d="M91.9,44.3v9.272h4.081c3.706,0,5.313-2.07,5.313-5,0-2.8-1.607-4.975-5.313-4.975H92.607A.7.7,0,0,0,91.9,44.3Z" transform="translate(-86.825 -41.219)" fill="#c06"/>
                            <g id="Group_71" data-name="Group 71" transform="translate(1.033 1.005)">
                            <g id="Group_70" data-name="Group 70">
                                <path id="Path_60" data-name="Path 60" d="M26.355,31.129H19.76A1.055,1.055,0,0,1,18.7,30.08V19.448A1.055,1.055,0,0,1,19.76,18.4h6.594c6.257,0,7.191,3.981,7.191,6.351C33.545,28.862,30.988,31.129,26.355,31.129ZM19.76,18.749a.7.7,0,0,0-.707.7V30.08a.7.7,0,0,0,.707.7h6.594c4.407,0,6.837-2.141,6.837-6.028,0-5.22-4.286-6-6.837-6Z" transform="translate(-18.7 -18.4)"/>
                            </g>
                            </g>
                        </g>
                        <g id="Group_73" data-name="Group 73" transform="translate(5.556 6.099)">
                            <path id="Path_61" data-name="Path 61" d="M101.555,111.705a1.223,1.223,0,0,1,.4.066.908.908,0,0,1,.326.2,1.115,1.115,0,0,1,.215.339,1.393,1.393,0,0,1,.077.481,1.627,1.627,0,0,1-.061.448,1.041,1.041,0,0,1-.188.355.911.911,0,0,1-.315.235,1.124,1.124,0,0,1-.447.087H100.6V111.7h.955Zm-.033,1.807a.7.7,0,0,0,.21-.033.412.412,0,0,0,.177-.115.635.635,0,0,0,.127-.208.857.857,0,0,0,.05-.311,1.252,1.252,0,0,0-.033-.3.594.594,0,0,0-.11-.229.5.5,0,0,0-.2-.147.821.821,0,0,0-.3-.049h-.353v1.4h.436Z" transform="translate(-100.6 -111.7)" fill="#fff"/>
                            <path id="Path_62" data-name="Path 62" d="M143.873,111.705v.41h-1.182v.475h1.088v.377h-1.088v.541h1.21v.41h-1.7V111.7h1.673Z" transform="translate(-139.903 -111.7)" fill="#fff"/>
                            <path id="Path_63" data-name="Path 63" d="M179.859,111.8l.839,2.217h-.514l-.171-.491h-.839l-.177.491h-.5l.845-2.217Zm.028,1.36-.282-.814H179.6l-.293.814Z" transform="translate(-174.198 -111.795)" fill="#fff"/>
                            <path id="Path_64" data-name="Path 64" d="M224.392,111.8v1.807h1.093v.41H223.9V111.8Z" transform="translate(-217.09 -111.795)" fill="#fff"/>
                        </g>
                        <g id="Group_74" data-name="Group 74" transform="translate(2.198 6.192)">
                            <ellipse id="Ellipse_22" data-name="Ellipse 22" cx="1.033" cy="1.021" rx="1.033" ry="1.021"/>
                        </g>
                        <path id="Path_65" data-name="Path 65" d="M45.863,165.128h0a1.553,1.553,0,0,1-1.563-1.545v-1.207a.779.779,0,0,1,.784-.775h0a.779.779,0,0,1,.784.775v2.752Z" transform="translate(-41.853 -152.776)"/>
                    </svg>

                </div>
                <div class="border-[#EDEDED] border-[1px] rounded-[4px] h-[23px] w-[36.64px] overflow-hidden flex justify-center items-center">
                    <svg id="apple-pay-logo-svgrepo-com" xmlns="http://www.w3.org/2000/svg" width="21.784" height="9.217" viewBox="0 0 21.784 9.217">
                        <path id="Path_2" data-name="Path 2" d="M4.106,1.188A1.652,1.652,0,0,0,4.486,0a1.724,1.724,0,0,0-1.1.558,1.56,1.56,0,0,0-.4,1.134,1.3,1.3,0,0,0,1.122-.5m.38.612c-.616-.036-1.141.342-1.43.342s-.742-.324-1.231-.324a1.818,1.818,0,0,0-1.539.936A3.809,3.809,0,0,0,.757,6.481c.308.45.688.954,1.177.936.471-.018.652-.306,1.213-.306s.724.306,1.231.288.833-.45,1.141-.918a3.616,3.616,0,0,0,.507-1.044,1.627,1.627,0,0,1-.2-2.9A1.689,1.689,0,0,0,4.486,1.8" transform="translate(0.026)"/>
                        <g id="Group_5" data-name="Group 5" transform="translate(7.265 0.522)">
                            <path id="Path_3" data-name="Path 3" d="M42.671,2.9a2.147,2.147,0,0,1,2.263,2.232,2.171,2.171,0,0,1-2.3,2.25H41.168V9.7H40.1V2.9Zm-1.5,3.6h1.213A1.28,1.28,0,0,0,43.83,5.15,1.272,1.272,0,0,0,42.381,3.8H41.15V6.5Zm4.037,1.818c0-.864.67-1.4,1.865-1.476l1.376-.072V6.392c0-.558-.38-.882-1-.882a.954.954,0,0,0-1.05.72h-.978c.054-.9.833-1.566,2.064-1.566,1.213,0,1.991.63,1.991,1.638v3.42H48.5v-.81h-.018a1.776,1.776,0,0,1-1.575.9A1.53,1.53,0,0,1,45.205,8.319Zm3.241-.45v-.4l-1.231.072c-.616.036-.96.306-.96.738s.362.72.905.72A1.194,1.194,0,0,0,48.446,7.869Zm1.937,3.69v-.828a1.979,1.979,0,0,0,.326.018.836.836,0,0,0,.887-.7c0-.018.091-.306.091-.306l-1.81-4.969h1.1l1.267,4.05h.018l1.267-4.05H54.62l-1.865,5.239c-.434,1.206-.923,1.584-1.955,1.584C50.727,11.577,50.474,11.577,50.383,11.559Z" transform="translate(-40.1 -2.9)"/>
                        </g>
                    </svg>
                </div>
                <div class="border-[#EDEDED] border-[1px] rounded-[4px] h-[23px] w-[36.64px] overflow-hidden flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21.706" height="8.624" viewBox="0 0 21.706 8.624">
                        <defs>
                            <linearGradient id="linear-gradient" x1="0.202" y1="0.546" x2="0.934" y2="-0.13" gradientUnits="objectBoundingBox">
                            <stop offset="0" stop-color="#005ab9"/>
                            <stop offset="1" stop-color="#1e3764"/>
                            </linearGradient>
                            <linearGradient id="linear-gradient-2" x1="0.061" y1="1.087" x2="0.837" y2="0.427" gradientUnits="objectBoundingBox">
                            <stop offset="0" stop-color="#fba900"/>
                            <stop offset="1" stop-color="#ffd800"/>
                            </linearGradient>
                        </defs>
                        <g id="Group_82" data-name="Group 82" transform="translate(0 0)">
                            <path id="blue-symbol" d="M113.449,149.829c3.271,0,4.906-2.156,6.541-4.312H109.138v4.312Z" transform="translate(-109.138 -141.205)" fill="url(#linear-gradient)"/>
                            <path id="yellow-symbol" d="M206.214,109.138c-3.271,0-4.906,2.156-6.541,4.312h10.853v-4.312Z" transform="translate(-188.819 -109.138)" fill="url(#linear-gradient-2)"/>
                        </g>
                    </svg>

                </div>
                <div class="border-[#EDEDED] border-[1px] rounded-[4px] h-[23px] w-[36.64px] overflow-hidden flex justify-center items-center bg-[#fff]">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="23" viewBox="0 0 35 23">
                        <defs>
                            <clipPath id="clip-path">
                            <rect id="Rectangle_685" data-name="Rectangle 685" width="35" height="23" transform="translate(-0.175 2263.077)" fill="#fff"/>
                            </clipPath>
                        </defs>
                        <g id="Mask_Group_1" data-name="Mask Group 1" transform="translate(0.175 -2263.077)" clip-path="url(#clip-path)">
                            <g id="riverty-checkout-logo" transform="translate(0.117 2263.573)">
                            <rect id="Rectangle_790" data-name="Rectangle 790" width="35.001" height="21.779" fill="#282828"/>
                            <rect id="Rectangle_791" data-name="Rectangle 791" width="35.001" height="10.889" fill="#255a57"/>
                            <path id="Path_837" data-name="Path 837" d="M389.543,91.185c-.012-.05-.027-.093-.038-.131l-.012-.035a1.25,1.25,0,0,0-1.215-.881,1.182,1.182,0,0,0-.269.027,1.262,1.262,0,0,0-.98,1.421v1.569a.472.472,0,0,0,.054.231.278.278,0,0,0,.171.135.3.3,0,0,0,.064.008.248.248,0,0,0,.156-.05.367.367,0,0,0,.118-.336V91.586c0-.525.163-.78.543-.858a.658.658,0,0,1,.661.216.677.677,0,0,1,.141.259,1.155,1.155,0,0,0,.126.417l.012.015a.3.3,0,0,0,.353.062C389.6,91.6,389.581,91.374,389.543,91.185Z" transform="translate(-369.391 -86.03)" fill="#fff"/>
                            <path id="Path_838" data-name="Path 838" d="M104.261,68.368a1.554,1.554,0,0,0-.627,0,1.51,1.51,0,0,0-1.234,1.537V72.35a.482.482,0,0,0,.042.228l0,0a.278.278,0,0,0,.171.135.26.26,0,0,0,.22-.043.38.38,0,0,0,.141-.336v-.985h1.945v.992a.5.5,0,0,0,.054.231.278.278,0,0,0,.171.135.3.3,0,0,0,.064.008.249.249,0,0,0,.156-.05.368.368,0,0,0,.129-.336V69.9A1.511,1.511,0,0,0,104.261,68.368Zm.657,2.437h-1.937v-.9a.928.928,0,0,1,.425-.849.968.968,0,0,1,.741-.151.8.8,0,0,1,.341.146l0,0a.944.944,0,0,1,.425.849v.9Z" transform="translate(-97.733 -65.222)" fill="#fff"/>
                            <path id="Path_839" data-name="Path 839" d="M306.312,91.932a1.754,1.754,0,0,0-3.213-.379,1.794,1.794,0,0,0-.118,1.4,1.668,1.668,0,0,0,1.618,1.162,1.9,1.9,0,0,0,.41-.046,1.8,1.8,0,0,0,.6-.255,1.457,1.457,0,0,0,.311-.271.438.438,0,0,0,.141-.317.275.275,0,0,0-.1-.186.268.268,0,0,0-.213-.05l-.012,0a.42.42,0,0,0-.175.1l-.049.062-.072.065,0,0a1.1,1.1,0,0,1-.562.317,1.135,1.135,0,0,1-1.329-.723c-.015-.046-.027-.088-.038-.128h2.484l.054-.008.084,0a.26.26,0,0,0,.205-.108C306.411,92.457,306.406,92.279,306.312,91.932Zm-2.819.239a1.016,1.016,0,0,1,.038-.143,1.14,1.14,0,0,1,1.436-.776,1.167,1.167,0,0,1,.794.846c.008.031.015.062.019.093Z" transform="translate(-289.088 -86.526)" fill="#fff"/>
                            <path id="Path_840" data-name="Path 840" d="M244.229,91.837a.27.27,0,0,0-.16-.139.284.284,0,0,0-.217.023.339.339,0,0,0-.167.263l-.023.123,0,.038a.656.656,0,0,1-.778.533c-.251-.038-.585-.174-.585-.876v-.046h.76c.091,0,.368,0,.368-.278a.258.258,0,0,0-.224-.263,1.169,1.169,0,0,0-.163-.008h-.741v-1.07a.483.483,0,0,0-.042-.228v0a.278.278,0,0,0-.171-.135.26.26,0,0,0-.22.043.368.368,0,0,0-.129.336v1.595c0,.908.323,1.363,1.049,1.483a1.4,1.4,0,0,0,.251.023,1.218,1.218,0,0,0,1.2-.931c.012-.046.019-.088.027-.131v0A.542.542,0,0,0,244.229,91.837Z" transform="translate(-230.716 -85.671)" fill="#fff"/>
                            <path id="Path_841" data-name="Path 841" d="M528.622,91.8a1.555,1.555,0,0,0-.061-.374,1.634,1.634,0,0,0-.778-.981,1.737,1.737,0,0,0-1.356-.139,1.744,1.744,0,0,0,.015,3.333,1.879,1.879,0,0,0,.482.062,1.68,1.68,0,0,0,.691-.146,1.416,1.416,0,0,0,.452-.321v.008a.5.5,0,0,0,.03.228l0,0a.278.278,0,0,0,.171.135.26.26,0,0,0,.22-.043.376.376,0,0,0,.136-.336V91.866Zm-1.429,1.316a1.123,1.123,0,0,1-1.375-.826v0a1.074,1.074,0,0,1-.045-.243,1.174,1.174,0,0,1,.8-1.209,1.235,1.235,0,0,1,.368-.058,1.113,1.113,0,0,1,.654.208,1.172,1.172,0,0,1,.479.931A1.14,1.14,0,0,1,527.193,93.117Z" transform="translate(-501.268 -86.116)" fill="#fff"/>
                            <path id="Path_842" data-name="Path 842" d="M460.438,68.8a1.456,1.456,0,0,0-1.158-.533,1.437,1.437,0,0,0-1.432,1.569V72.28a.472.472,0,0,0,.054.231.278.278,0,0,0,.171.135.3.3,0,0,0,.064.008.249.249,0,0,0,.156-.05.374.374,0,0,0,.133-.336V71.159h.832a1.378,1.378,0,0,0,1.469-1.143A1.464,1.464,0,0,0,460.438,68.8Zm-1.185,1.808h-.012l-.809-.012v-.811a.875.875,0,0,1,.224-.711.835.835,0,0,1,.649-.259.861.861,0,0,1,.866.911A.87.87,0,0,1,459.252,70.607Z" transform="translate(-436.981 -65.155)" fill="#fff"/>
                            <path id="Path_843" data-name="Path 843" d="M613.973,92.2a.278.278,0,0,0-.171-.135.26.26,0,0,0-.22.043.369.369,0,0,0-.126.336V94a.918.918,0,0,1-.254.7.677.677,0,0,1-.562.146.7.7,0,0,1-.6-.8V92.441a.533.533,0,0,0-.038-.231.278.278,0,0,0-.171-.135.26.26,0,0,0-.22.043.377.377,0,0,0-.136.336v1.614a1.251,1.251,0,0,0,1.975,1.127v.012a.681.681,0,0,1-.524.625.643.643,0,0,1-.459-.031.606.606,0,0,1-.228-.181l-.084-.108-.054-.062a.387.387,0,0,0-.076-.081l-.015-.015L612,95.346a.266.266,0,0,0-.251-.012.282.282,0,0,0-.16.205.51.51,0,0,0,.118.363l0,0a1.343,1.343,0,0,0,.247.263,1.2,1.2,0,0,0,.76.251,1.5,1.5,0,0,0,.365-.046,1.3,1.3,0,0,0,.95-1.4V92.441a.445.445,0,0,0-.049-.228Z" transform="translate(-583.607 -87.865)" fill="#fff"/>
                            <path id="Path_844" data-name="Path 844" d="M181.634,91.054l-.012-.035a1.25,1.25,0,0,0-1.215-.881,1.157,1.157,0,0,0-.269.027,1.262,1.262,0,0,0-.98,1.421v1.569a.471.471,0,0,0,.054.228v0a.278.278,0,0,0,.171.135.3.3,0,0,0,.064.008.249.249,0,0,0,.156-.05.371.371,0,0,0,.129-.336v-.371l-.012-.653h.809c.266,0,.331-.139.338-.259a.268.268,0,0,0-.064-.2.355.355,0,0,0-.274-.093h-.813c0-.51.167-.761.543-.842a.658.658,0,0,1,.661.216.7.7,0,0,1,.141.259,1.154,1.154,0,0,0,.126.417l.012.015a.3.3,0,0,0,.353.062c.178-.1.16-.324.121-.514A.927.927,0,0,0,181.634,91.054Z" transform="translate(-170.993 -86.03)" fill="#fff"/>
                            <path id="Path_845" data-name="Path 845" d="M673.588,71.364a.417.417,0,0,0-.593,0,.435.435,0,0,0,0,.6.389.389,0,0,0,.3.128.4.4,0,0,0,.3-.128.429.429,0,0,0,.121-.3A.4.4,0,0,0,673.588,71.364Zm-.046.56a.337.337,0,0,1-.254.108.342.342,0,0,1-.254-.108.373.373,0,0,1,0-.522.354.354,0,0,1,.254-.108.342.342,0,0,1,.254.108.349.349,0,0,1,.106.259A.369.369,0,0,1,673.542,71.924Z" transform="translate(-642.209 -67.994)" fill="#fff"/>
                            <path id="Path_846" data-name="Path 846" d="M678.629,75.447a.119.119,0,0,0-.072-.12.336.336,0,0,0-.125-.015h-.16v.467h.084v-.186h.064a.186.186,0,0,1,.091.015.125.125,0,0,1,.042.108v.062h.076l0,0s0-.012,0-.023v-.07a.146.146,0,0,0-.027-.073.139.139,0,0,0-.079-.046.158.158,0,0,0,.069-.023A.1.1,0,0,0,678.629,75.447Zm-.129.081a.184.184,0,0,1-.076.012h-.072v-.17h.069a.2.2,0,0,1,.1.02.066.066,0,0,1,.03.066A.076.076,0,0,1,678.5,75.528Z" transform="translate(-647.359 -71.879)" fill="#fff"/>
                            <path id="Path_847" data-name="Path 847" d="M128.068,326.4l-1.21,1.607v1.307h-.666v-1.307l-1.21-1.607h.825l.736.99.731-.99Zm-6.737,0v.576H122.4v2.34h.66v-2.341h1.065V326.4Zm-3.3.576h.982c.292,0,.427.111.427.347s-.136.347-.427.347h-.982Zm2.222,2.34-.758-1.123a.809.809,0,0,0,.618-.87c0-.6-.36-.921-1.028-.921H117.37v2.914h.66v-1.073h.728l.715,1.072Zm-7.306-2.914v2.914h2.6v-.576h-1.941v-.6h1.668v-.576h-1.668v-.586h1.942V326.4Zm-2.07,0-.849,2.155-.855-2.155h-.716l1.214,2.914h.677l1.214-2.914Zm-4.473,2.913h.66V326.4h-.66Zm-4,0h.66v-2.246h-.66Zm.66-2.246h2.217V326.4H103.06Z" transform="translate(-97.733 -311.524)" fill="#e7e4e2"/>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
            <hr class="border-[#DDDDDD] mt-[20px] mb-[30px]">
			<div class="w-full grid gap-[15px] mt-4">
                            <!-- USP'S -->
                            <div class="flex items-start">
                                <svg class="mt-[4px] w-[13.697px]" xmlns="http://www.w3.org/2000/svg" width="13.697" height="9.781" viewBox="0 0 13.697 9.781">
                                    <path id="Path_202" data-name="Path 202" d="M8331.749,406.758l-7.468,7.367-3.4-3.4" transform="translate(-8319.466 -405.343)" fill="none" stroke="#8cc63f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </svg>
                                <?php
                                    $cart_subtotal = 0; // Initialiseer het subtotaal op nul

                                    // Loop door alle items in de winkelwagen om het subtotaal te berekenen
                                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                        $cart_subtotal += $cart_item['data']->get_price() * $cart_item['quantity']; // Bereken de prijs van elk item en tel deze op bij het subtotaal
                                    }

                                    $cart_discount_total = floatval(WC()->cart->get_cart_discount_total()); // Haal het totale kortingsbedrag in de winkelwagen op en zet het om naar een float
                                    $verkoopprijs = wc_format_decimal($cart_subtotal - $cart_discount_total, 2); // Subtotaal minus korting
                                    $resultaat = floor($verkoopprijs / 1); // Rond de prijs af
                                ?>
                                <p class="text-[#525252] text-14 leading-17 font-jakarta w-full ml-2 block">Log in of maak een account aan en ontvang <?php echo $resultaat ?> <a href="/spaar-voorwaarden/" class="underline">spaarbotjes</a></p>
                            </div>
                            <div class="flex items-start">
                                <svg class="mt-[2px] w-[13.697px]" xmlns="http://www.w3.org/2000/svg" width="13.697" height="9.781" viewBox="0 0 13.697 9.781">
                                    <path id="Path_202" data-name="Path 202" d="M8331.749,406.758l-7.468,7.367-3.4-3.4" transform="translate(-8319.466 -405.343)" fill="none" stroke="#8cc63f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </svg>
                                <p class="text-[#525252] text-14 leading-14 font-jakarta w-full ml-2">Gratis verzending vanaf 50 euro</p>
                            </div>
                        </div>
			<hr class="border-[#DDDDDD] my-[30px]">

	
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>


	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
