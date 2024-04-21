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
        
        <div class="container pb-[85px] xl:pb-[105px] pt-[30px] md:pt-[35px] lg:pt-[45px] xl:pt-[50px] flex justify-between xl:px-[60px]">
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
                        if ( $points_transactions ) {
                            echo '<h2>Huidige saldo: ' . $total_balance . ' spaarbotjes</h2>';
                            echo '<h3>Inkomende en uitgaande spaarbotjes:</h3>';
                            echo '<ul>';
                            foreach ( $points_transactions as $transaction ) {
                                $points = $transaction['points'];
                                $date = $transaction['date']; // Datum van de transactie
                                $type = $points > 0 ? 'Inkomend' : 'Uitgaand';
                                echo '<li>' . $type . ' - ' . abs( $points ) . ' spaarbotjes - Datum: ' . $date . '</li>';
                            }
                            echo '</ul>';
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