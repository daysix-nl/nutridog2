<?php
/**
 * Template name: Account - spaarbotjes
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
                <div class="">
                    <h2 class="font-jakarta font-bold text-28 leading-28 text-[#000]"><?php the_title();?></h2>
                    <?php
                          // Haal de ingelogde gebruiker op
                            $current_user = wp_get_current_user();
                            $user_id = $current_user->ID;

                            // Haal alle inkomende en uitgaande punten op van de ingelogde gebruiker
                        $table_name = $wpdb->prefix . 'wc_points_rewards_user_points';
                        $points_transactions = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE user_id = %d", $user_id ), ARRAY_A );

                        // Bereken het totale saldo
                        $total_balance = 0;
                        foreach ( $points_transactions as $transaction ) {
                            $points = $transaction['points'];
                            $total_balance += $points;
                        }

                        // Toon de punten transacties van de ingelogde gebruiker
                        if ( $points_transactions ) { ?>
                          
                            <div class="mt-[30px] bg-[#F2FBFF] rounded-[10px] flex justify-center items-center h-[200px] w-[390px]">
                                <div class="text-center">
                                    <p class="text-16 leading-28 md:text-16 md:leading-28 tracking-[0.1em] font-jakarta italic uppercase">Jouw spaarbotjes</p>
                                    <p class="text-36 leading-42 lg:text-36 lg:leading-42 tracking-[0.07em] font-grotesk text-[#019C46] uppercase "><?php echo $total_balance ?></p>
                                </div>
                            </div>
                            <div class="mt-[30px]">
                                <p class="">Hoe jij al je spaarbotjes hebt verzameld? Dat vind je hier.</p>
                                <ul class="mt-[25px]">
                                    <li class="grid grid-cols-3 pr-1">
                                        <div class="text-14 leading-26 md:text-14 md:leading-25 lg:text-14 lg:leading-25 font-jakarta font-bold">Spaarbotjes</div>
                                        <div class="text-14 leading-26 md:text-14 md:leading-25 lg:text-14 lg:leading-25 font-jakarta font-bold">Activiteit</div>
                                        <div class="text-14 leading-26 md:text-14 md:leading-25 lg:text-14 lg:leading-25 font-jakarta font-bold text-right">Datum</div>
                                    </li>
                                    <hr class="my-1 border-[#DDDDDD]">
                                    <?php 
                                        foreach ( $points_transactions as $transaction ) {
                                            $points = $transaction['points'];
                                            $date = $transaction['date']; // Datum van de transactie
                                            $type = $points > 0 ? 'Inkomend' : 'Uitgaand'; 

                                            // Converteer de datum naar het gewenste formaat
                                            $dateObject = new DateTime($date);
                                            $formattedDate = $dateObject->format('d-m-Y');
                                            ?>
                                            <li class="grid grid-cols-3 pr-1">
                                                <div class="text-15 leading-26 md:text-15 md:leading-25 lg:text-15 lg:leading-25 font-jakarta font-normal"><?php echo abs( $points ) ?></div>
                                                <div class="text-15 leading-26 md:text-15 md:leading-25 lg:text-15 lg:leading-25 font-jakarta font-normal"><?php echo $type ?></div>
                                                <div class="text-15 leading-26 md:text-15 md:leading-25 lg:text-15 lg:leading-25 font-jakarta font-normal uppercase text-right"><?php echo $formattedDate ?></div>
                                            </li>
                                            <hr class="my-1 border-[#DDDDDD]">
                                            <?php
                                        }
                                    ?>

                                </ul>
                            </div>

                            <?php
                   
                        } else {
                            echo '<p>Geen spaarbotjes transacties gevonden.</p>';
                        }
                    ?>
                </div>
            </div>
        </div>

        <?php
    }
    ?>
</main>
<?php get_footer(); ?>