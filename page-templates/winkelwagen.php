<?php
/**
 * Template name: Winkelwagen
 */


 get_header(); ?>


 
<main class="custom-checkout bg-white md:bg-[#F6FAFC]">

    <!-- cart -->
    <div class="pt-[30px] md:pt-[10px] lg:pt-[60px] xl:pt-[70px] pb-[60px] lg:pb-[200px] xl:pb-[132px]">
        <div class="container">
            <div class="w-full">
                <?php echo do_shortcode( '[woocommerce_cart]' ); ?>
            </div>
        </div>
    </div>
</main>




<?php get_footer(); ?>