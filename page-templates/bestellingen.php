<?php
/**
 * Template name: Account - bestellingen
 */


 get_header(); ?>


 
<main class="bg-white">

  
    <?php
    // Controleer of de gebruiker niet is ingelogd
    if (!is_user_logged_in()) { ?>
            <?php include get_template_directory() . '/componenten/login.php'; ?>
        <?php
    } else { ?>
        
        <div class="container pb-[70px] lg:pb-[90px] xl:pb-[100px] pt-[30px] md:pt-[35px] lg:pt-[45px] xl:pt-[50px] flex justify-between xl:px-[60px]">
            <div class="w-[322px] hidden lg:block">
                 <?php include get_template_directory() . '/componenten/account-navbar.php'; ?>
            </div>
            <div class="w-full lg:w-[776px]">
                <div class="bestellingen">
                    <h2 class="font-jakarta font-bold text-28 leading-28 text-[#000]"><?php the_title();?></h2>
                    <div class="grid gap-[15px] md:gap-[20px] mt-[30px]">
                    <?php 
                        // Laad de bestellingen van de ingelogde gebruiker
                        $customer_orders = wc_get_orders( array(
                            'customer' => get_current_user_id(),
                        ) );

                        if ( $customer_orders ) {
                            foreach ( $customer_orders as $order ) { 
                                $dateObject = new DateTime($order->get_date_created());
                                $formattedDate = $dateObject->format('d-m-Y');
                        ?>
                        <div class="accordion-item h-fit"> 
                            <button class="accordion text-[#000000] font-jakarta text-14 leading-20 md:text-14 md:leading-28 lg:text-16 lg:leading-28 font-semibold pr-3 px-2 md:px-3 lg:px-4 h-[80px]">
                                <span class="pr-4 w-full">
                                    <div class="grid grid-cols-2 w-full items-center">
                                        <div class="">
                                            <div class=""> Bestelling #<?php echo $order->get_order_number() ?></div>
                                            <div class="text-15 font-normal"><?php echo wc_get_order_status_name( $order->get_status() ) ?></div>
                                        </div>
                                        <div class="text-right font-normal"><?php echo $formattedDate ?></div>
                                    </div>    
                                </span>
                            </button>
                            <div class="panel">
                                <div class="pb-3 px-2 md:pb-4 md:px-3 lg:pb-4 lg:pt-2 lg:px-4">
                                    <div class="text-[#000000] font-medium font-jakarta text-14 leading-20 md:text-14 md:leading-28">
                                        <ul class="ml-[0px]">
                                            <?php 
                                            foreach ( $order->get_items() as $item_id => $item ) {
                                                $product = $item->get_product();
                                                if ( ! $product ) {
                                                    continue;
                                                }

                                                // Controleren op geretourneerde items
                                                $returned_quantity = 0;
                                                $refunds = $order->get_refunds();
                                                foreach ( $refunds as $refund ) {
                                                    foreach ( $refund->get_items() as $refund_item ) {
                                                        if ( $refund_item->get_product_id() === $item->get_product_id() ) {
                                                            $returned_quantity -= $refund_item->get_quantity();
                                                        }
                                                    }
                                                }

                                                // Aangepaste hoeveelheid
                                                $adjusted_quantity = $item->get_quantity() - $returned_quantity;
                                            ?>

                                                <li class="flex">
                                                    <div class="w-[50px] text-left"><?php echo $adjusted_quantity ?> x</div>
                                                    <div class=""><?php echo $product->get_name() ?></div>
                                                </li>

                                            <?php } ?>
                                        </ul>
                                        <hr class="my-[20px]">
                                        <div class="grid grid-cols-2 pr-[50px] md:pr-[40px] xl:pr-[40px]">
                                            <div class="">Totaal</div>
                                            <div class="text-right"><?php echo  wc_price( $order->get_total() ) ?></div>
                                            <?php 
                                            $refunds = $order->get_refunds();
                                                if ( $refunds ) {
                                                    echo '<div>Retour</div>';
                                                    echo '<ul class="text-right">';
                                                    foreach ( $refunds as $refund ) {
                                                        echo '<li>Retour ID #' . $refund->get_id() . ': -' . wc_price( $refund->get_amount() ) . ' <br>' . wc_price( $order->get_total() - $total_refund_amount ) . '</li>';
                                                    }
                                            
                                                } 
                                            ?>
                                        </div>
                                      <a href="/retour-aanvraag/?order_id=<?php echo $order->get_id(); ?>&email=<?php echo $order->get_billing_email(); ?>&products=" class="mt-[20px] underline block">Retour aanvragen</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        } else {
                            // Geen bestellingen gevonden
                            echo '<p>Geen bestellingen gevonden.</p>';
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>

        <?php
    }
    ?>
</main>
<?php get_footer(); ?>