<?php
/**
 * Template name: Account - mijn gegevens
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
                    
                </div>
            </div>
        </div>

        <?php
    }
    ?>
</main>
<?php get_footer(); ?>