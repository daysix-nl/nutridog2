<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="custom-checkout bg-white md:bg-[#F6FAFC]">

	<div class="md:bg-[#C2EAFF] relative overflow-hidden succes-order">
           
            <div class="container md:pt-[10px] lg:pt-[60px] xl:pt-[70px] pb-[70px] lg:pb-[90px] xl:pb-[100px] flex justify-center items-center relative z-[2]">
                <div class="w-full md:w-[686px] lg:w-[680px] xl:w-[715px] mx-auto bg-white">
					<!-- BEGIN -->
							<div class="woocommerce-order">

								<?php
								if ( $order ) :

									do_action( 'woocommerce_before_thankyou', $order->get_id() );
									?>

									<?php if ( $order->has_status( 'failed' ) ) : ?>

										<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

										<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
											<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
											<?php if ( is_user_logged_in() ) : ?>
												<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
											<?php endif; ?>
										</p>

									<?php else : ?>

										<?php wc_get_template( 'checkout/order-received.php', array( 'order' => $order ) ); ?>

										<!-- BEGIN 2 -->
											<div class="w-[183px] h-[183px] rounded-full mx-auto overflow-hidden mt-[50px] relative">
												<div style="width:100%;height:0;padding-bottom:100%;position:relative;"><iframe src="https://giphy.com/embed/bzUwzbxcvJ3XQlcnoi" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div><p><a href="https://giphy.com/gifs/happy-dog-for-u-bzUwzbxcvJ3XQlcnoi">via GIPHY</a></p>
												<div class="absolute top-0 left-0 right-0 bottom-0"></div>
											</div>
											<div class="w-[297px] md:w-[450px] mx-auto mt-[30px] mb-[80px]">
												<h2 class="text-center font-jakarta text-22 leading-30 font-extrabold text-[#000000]">Bedankt voor je aankoop!</h2>
												<p class="text-center mt-[25px] font-jakarta font-medium text-15 leading-25 text-[#000000]">We gaan direct voor je aan de slag! Je kunt deze bestelling doorgaans de volgende werkdag verwachten. Naast onze reguliere orderbevestigingsmail ontvang je ook een track & trace code van PostNL. </p>
											</div>
										<!-- EIND 2 -->

									<?php endif; ?>

									<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
									<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

								<?php else : ?>

									<?php wc_get_template( 'checkout/order-received.php', array( 'order' => false ) ); ?>

								<?php endif; ?>

							</div>
						<!-- EINDE -->
                </div>
            </div>
            <div class="hidden md:block absolute left-0 right-0 top-[-50px] bottom-[0px] overflow-hidden z-[1]">
                <img src="/wp-content/themes/nutridog2/img/local/bg-header.png" alt="" class="w-[120%] h-[120%] object-cover object-center">
            </div>
        </div>
      
    </div>






</div>