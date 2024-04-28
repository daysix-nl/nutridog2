<?php
/**
 * Template name: Afrekenen
 *  * @var WC_Order $order
 */


 get_header(); ?>


 
<main class="custom-checkout bg-white md:bg-[#F6FAFC]">

    <!-- CHECKOUT -->
    <div class="custom-afrekenen md:pt-[10px] lg:pt-[60px] xl:pt-[70px] pb-[70px] lg:pb-[90px] xl:pb-[100px]">
        <div class="container lg:flex lg:justify-between lg:px-[0px] xl:px-[unset]">
            <div class="w-full lg:max-w-[651px] xl:max-w-[736px]">
                <?php echo do_shortcode( '[woocommerce_checkout]' ); ?>
            </div>
            <div class="w-full lg:max-w-[414px] xl:max-w-[464px] hidden lg:block h-auto">
                <?php include get_template_directory() . '/componenten/side-cart-checkout.php'; ?>
            </div>
        </div>
    </div>

     <!-- THNKS -->
    <div class="custom-bedankt">
        <div class="md:bg-[#C2EAFF] relative overflow-hidden">
            <div class="container md:pt-[10px] lg:pt-[60px] xl:pt-[70px] pb-[70px] lg:pb-[90px] xl:pb-[100px] flex justify-center items-center relative z-[2]">
                <div class="w-full md:w-[686px] lg:w-[680px] xl:w-[715px] mx-auto bg-white">
                    <div class="w-[183px] h-[183px] rounded-full mx-auto overflow-hidden mt-[50px] relative">
                        <div style="width:100%;height:0;padding-bottom:100%;position:relative;"><iframe src="https://giphy.com/embed/bzUwzbxcvJ3XQlcnoi" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div><p><a href="https://giphy.com/gifs/happy-dog-for-u-bzUwzbxcvJ3XQlcnoi">via GIPHY</a></p>
                        <div class="absolute top-0 left-0 right-0 bottom-0"></div>
                    </div>
                    <div class="w-[297px] md:w-[450px] mx-auto mt-[30px] mb-[80px]">
                        <h2 class="text-center font-jakarta text-22 leading-30 font-extrabold text-[#000000]">Bedankt voor je aankoop!</h2>
                        <p class="text-center mt-[25px] font-jakarta font-medium text-15 leading-25 text-[#000000]">We gaan direct voor je aan de slag! Je kunt deze bestelling doorgaans de volgende werkdag verwachten. Naast onze reguliere orderbevestigingsmail ontvang je ook een track & trace code van PostNL. </p>
                    </div>
                </div>
            </div>
            <div class="hidden md:block absolute left-0 right-0 top-[-50px] bottom-[0px] overflow-hidden z-[1]">
                <img src="/wp-content/themes/nutridog2/img/local/bg-header.png" alt="" class="w-[120%] h-[120%] object-cover object-center">
            </div>
        </div>
    </div>
</main>




<?php get_footer(); ?>