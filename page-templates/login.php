<?php
/**
 * Template name: Account
 */


 get_header(); ?>


 
<main class="custom-checkout bg-white md:bg-[#F6FAFC]">

    <div class="">
        <div class="bg-[#C2EAFF] relative overflow-hidden">
            <div class="container pt-[60px] md:pt-[60px] lg:pt-[60px] xl:pt-[60px] pb-[60px] lg:pb-[200px] xl:pb-[132px] flex justify-center items-center relative z-[2]">
                
                   <?php
                    // Controleer of de gebruiker niet is ingelogd
                    if (!is_user_logged_in()) {
                        ?>
                    <div class="w-[360px] md:w-[686px] lg:w-[686px] xl:w-[715px] mx-auto bg-white py-[40px] px-[20px] md:py-[70px] md:px-[100px] rounded-[11px]">
                         <div class="swiper mySwiperAccount">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="login-form-container">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="29.372" height="29.372" viewBox="0 0 29.372 29.372">
                                                <path id="user" d="M25.07,4.3A14.686,14.686,0,0,0,4.3,25.07,14.686,14.686,0,0,0,25.07,4.3ZM6.374,24.627a8.4,8.4,0,0,1,8.312-7.394A8.37,8.37,0,0,1,23,24.627a12.938,12.938,0,0,1-16.624,0Zm8.312-9.167A4.46,4.46,0,1,1,19.146,11,4.466,4.466,0,0,1,14.686,15.461Zm9.794,7.712a10.117,10.117,0,0,0-6.333-7.053,6.181,6.181,0,1,0-6.919,0,10.108,10.108,0,0,0-6.336,7.05,12.965,12.965,0,1,1,19.588,0Zm0,0"/>
                                            </svg>
                                            <h3 class="font-jakarta font-extrabold text-20 leading-30 xl:text-22 xl:leading-30 text-[#000000] ml-[15px]">Inloggen</h3>
                                        </div>
                                        <hr class="border-[#DDDDDD] mt-[15px] mb-[22px]">
                                        <form action="<?php echo esc_url(wp_login_url()); ?>" method="post">
                                            <p class="grid">
                                                <label for="username">Gebruikersnaam</label>
                                                <input type="text" name="log" id="username" value="" />
                                            </p>
                                            <p class="grid">
                                                <label for="password">Wachtwoord</label>
                                                <input type="password" name="pwd" id="password" value="" />
                                            </p>
                                            <p>
                                                <input type="submit" name="wp-submit" id="wp-submit" value="Inloggen" />
                                                <input type="hidden" name="redirect_to" value="/account" />
                                            </p>
                                        </form>
                                    </div>
                                  
                                </div>
                                <div class="swiper-slide">
                                  <?php
                                    // Controleer of de registratie is toegestaan
                                    $registration_enabled = get_option('users_can_register');

                                    // Controleer of de gebruiker niet is ingelogd en registratie is toegestaan
                                    if (!$registration_enabled || is_user_logged_in()) {
                                        echo '<p>Registratie is niet toegestaan of je bent al ingelogd.</p>';
                                    } else {
                                        ?>
                                        <div class="registration-form-container">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="29.372" height="29.372" viewBox="0 0 29.372 29.372">
                                                    <path id="user" d="M25.07,4.3A14.686,14.686,0,0,0,4.3,25.07,14.686,14.686,0,0,0,25.07,4.3ZM6.374,24.627a8.4,8.4,0,0,1,8.312-7.394A8.37,8.37,0,0,1,23,24.627a12.938,12.938,0,0,1-16.624,0Zm8.312-9.167A4.46,4.46,0,1,1,19.146,11,4.466,4.466,0,0,1,14.686,15.461Zm9.794,7.712a10.117,10.117,0,0,0-6.333-7.053,6.181,6.181,0,1,0-6.919,0,10.108,10.108,0,0,0-6.336,7.05,12.965,12.965,0,1,1,19.588,0Zm0,0"/>
                                                </svg>
                                                <h3 class="font-jakarta font-extrabold text-20 leading-30 xl:text-22 xl:leading-30 text-[#000000] ml-[15px]">Registreren</h3>
                                            </div>
                                            <hr class="border-[#DDDDDD] mt-[15px] mb-[22px]">
                                            <form action="<?php echo esc_url(site_url('wp-login.php?action=register', 'login_post')); ?>" method="post">
                                                <p class="grid">
                                                    <label for="user_login">Gebruikersnaam</label>
                                                    <input type="text" name="user_login" id="user_login" value="" />
                                                </p>
                                                <p class="grid">
                                                    <label for="user_email">E-mailadres</label>
                                                    <input type="email" name="user_email" id="user_email" value="" />
                                                </p>
                                                <p>
                                                    <input type="submit" name="wp-submit" id="wp-submit" value="Registreren" />
                                                </p>
                                            </form>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="swiper-pagination-account"></div>
                        </div>





                        
                        
                        </div>
                        <?php
                    } else {
                        // Bericht tonen als de gebruiker al is ingelogd
                        echo '<p>Je bent al ingelogd.</p>';
                    }
                    ?>

                
            </div>
        </div>
    </div>
</main>




<?php get_footer(); ?>