<?php
/**
 * Template name: Account
 */


 get_header(); ?>


 


  
    <?php
    // Controleer of de gebruiker niet is ingelogd
    if (!is_user_logged_in()) {
        ?>
        <main class="bg-[#C2EAFF]">
            <?php include get_template_directory() . '/componenten/login.php'; ?>
            
        </main>
        <?php
    } else { ?>
         <main class="bg-white">
        <div class="container pb-[70px] lg:pb-[90px] xl:pb-[100px] pt-[30px] md:pt-[35px] lg:pt-[45px] xl:pt-[50px] flex justify-between xl:px-[60px]">
            <div class="w-[322px] hidden lg:block">
                <?php include get_template_directory() . '/componenten/account-navbar.php'; ?>
            </div>
            <div class="w-full lg:w-[776px]">
                <div class="">
                    <h3 class="text-15 leading-16 md:text-16 md:leading-28 tracking-[0.1em] font-jakarta italic uppercase">Accountoverzicht</h3>
                    <h2 class="text-20 leading-24 lg:text-36 lg:leading-42 tracking-[0.07em] font-grotesk text-[#FF91C8] uppercase mt-[10px] lg:mt-[15px]">Hee hallo <span class="text-[#FF6248]">
                        <?php
                    if ( is_user_logged_in() ) {
                        // Als de gebruiker is ingelogd
                        $current_user = wp_get_current_user();
                        $user_first_name = $current_user->user_firstname;

                        if ( ! empty( $user_first_name ) ) {
                            // Als de voornaam is ingevuld
                            echo '' . esc_html( $user_first_name ) . '';
                        } else {
                            // Als de voornaam niet is ingevuld
                            echo '';
                        }
                    } else {
                        // Als de gebruiker niet is ingelogd
                        echo 'Inloggen';
                    }
                    ?></span></h2>
                    <p class="text-15 leading-26 md:text-15 md:leading-25 lg:text-18 lg:leading-30 font-jakarta font-medium mt-[10px] lg:mt-[15px] max-w-[360px]">Dit is de plek waar je alle relevante informatie over je bestellingen kan vinden.</p>
                    <!-- <p class="text-15 leading-26 md:text-15 md:leading-25 lg:text-18 lg:leading-30 font-jakarta font-medium mt-[10px] lg:mt-[15px] max-w-[410px]">Dit is de plek waar je alle relevante informatie over je bestellingen kan vinden.</p> -->
                    <!-- BESTELLINGEN -->
                    <div class="mt-[50px]">
                        <h2 class="font-jakarta font-bold text-22 leading-30">Bestellingen</h2>
                        <p class="text-[#525252] text-14 leading-25 font-jakarta mt-[4px]">Alle details over je laatste bestellingen.</p>
                        <a href="/account/bestellingen/" class="text-[#525252] text-14 leading-25 font-jakarta underline mt-[10px]">Bekijk al je bestellingen</a>
                    </div>
                    <!-- SPAARBOTJES -->
                    <div class="mt-[50px]">
                        <h2 class="font-jakarta font-bold text-22 leading-30">Spaarbotjes</h2>
                        <p class="text-[#525252] text-14 leading-25 font-jakarta mt-[4px]">Benieuwd hoeveel spaarbotjes je hebt verzameld?</p>
                        <a href="/account/spaarbotjes/" class="text-[#525252] text-14 leading-25 font-jakarta underline mt-[10px]">Bekijk al je spaarbotjes</a>
                    </div>
                </div>
            </div>
        </div>
        </main>

        <?php
    }
    ?>

<?php get_footer(); ?>