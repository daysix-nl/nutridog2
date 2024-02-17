<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */


defined( 'ABSPATH' ) || exit;


get_header( 'shop' ); ?>

<main>

<?php do_action('woocommerce_before_shop_loop'); ?>

<!-- SHOP CONTAINER -->
<div class="max-w-[354px] md:max-w-[725px] lg:max-w-[1168px] xl:max-w-[1330px] mx-auto pb-[85px] xl:pb-[105px] mt-[30px]">


    <!-- <div class="flex justify-end">
        <?php echo do_shortcode('[fe_open_button]'); ?>
    </div> -->


    <div class="flex justify-between">
        <!-- FILTER -->
        <div class="hidden lg:block lg:w-[214px] filter mt-[45px]">
         
            <?php echo do_shortcode('[fe_widget]'); ?>
        </div>

        <div class="w-full max-w-[354px] md:max-w-[725px] lg:max-w-[898px] xl:max-w-[1082px] grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-[15px] gap-y-[30px] lg:gap-x-[15px] ld:gap-y-[40px] items-start h-fit">
           <!-- CATEGORIE SLIDER -->
           <div class="col-span-2 md:col-span-3 lg:col-span-4">
                <div class="swiper mySwiper-categorie">
                    <div class="flex items-center mb-[30px]">
                        <h2 class="font-jakarta font-bold text-28 leading-28 text-[#000]">Selecteer een categorie</h2>
                        <div class="swiper-button-prev-categorie bg-[#C2F0A0] rounded-full h-[33px] w-[33px] flex justify-center items-center ml-[30px] mr-[5px]">
                            <svg class="rotate-[-180deg]" xmlns="http://www.w3.org/2000/svg" width="9.264" height="12.657" viewBox="0 0 9.264 12.657">
                            <g id="Group_82" data-name="Group 82" transform="translate(1.697 1.697)">
                                <line id="Line_3" data-name="Line 3" x2="5.359" y2="2.436" transform="matrix(0.94, 0.342, -0.342, 0.94, 0.833, 0)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="2"/>
                                <line id="Line_4" data-name="Line 4" x2="5.359" y2="2.436" transform="matrix(-0.342, 0.94, -0.94, -0.342, 4.921, 4.227)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="2"/>
                            </g>
                            </svg>
                        </div>
                        <div class="swiper-button-next-categorie bg-[#C2F0A0] rounded-full h-[33px] w-[33px] flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.264" height="12.657" viewBox="0 0 9.264 12.657">
                            <g id="Group_82" data-name="Group 82" transform="translate(1.697 1.697)">
                                <line id="Line_3" data-name="Line 3" x2="5.359" y2="2.436" transform="matrix(0.94, 0.342, -0.342, 0.94, 0.833, 0)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="2"/>
                                <line id="Line_4" data-name="Line 4" x2="5.359" y2="2.436" transform="matrix(-0.342, 0.94, -0.94, -0.342, 4.921, 4.227)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="2"/>
                            </g>
                            </svg>
                        </div>
                    </div>
                    <div class="swiper-wrapper max-h-[calc(113px+30px)] md:max-h-[calc(175px+30px)] lg:max-h-[calc(104px+30px)] xl:max-h-[calc(113px+30px)]">
                        <div class="swiper-slide">
                            <a href="/shop/categorie-voeding">
                                <div class="w-full h-full max-w-[113px] md:max-w-[175px] lg:max-w-[104px] xl:max-w-[113px] max-h-[113px] md:max-h-[175px] lg:max-h-[104px] xl:max-h-[113px] aspect-square bg-[#F6FAFC] rounded-[10px]"></div>
                                <p class="font-jakarta text-12 leading-22 text-[#000] font-bold mt-[10px]">Voeding</p>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/shop/categorie-snacks">
                                <div class="w-full h-full max-w-[113px] md:max-w-[175px] lg:max-w-[104px] xl:max-w-[113px] max-h-[113px] md:max-h-[175px] lg:max-h-[104px] xl:max-h-[113px] aspect-square bg-[#F6FAFC] rounded-[10px]"></div>
                                <p class="font-jakarta text-12 leading-22 text-[#000] font-bold mt-[10px]">Snacks</p>
                            </a>
                        </div>
                         <div class="swiper-slide">
                            <a href="/shop/categorie-geneesmiddelen">
                                <div class="w-full h-full max-w-[113px] md:max-w-[175px] lg:max-w-[104px] xl:max-w-[113px] max-h-[113px] md:max-h-[175px] lg:max-h-[104px] xl:max-h-[113px] aspect-square bg-[#F6FAFC] rounded-[10px]"></div>
                                <p class="font-jakarta text-12 leading-22 text-[#000] font-bold mt-[10px]">Geneesmiddelen</p>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/shop/categorie-spelen">
                                <div class="w-full h-full max-w-[113px] md:max-w-[175px] lg:max-w-[104px] xl:max-w-[113px] max-h-[113px] md:max-h-[175px] lg:max-h-[104px] xl:max-h-[113px] aspect-square bg-[#F6FAFC] rounded-[10px]"></div>
                                <p class="font-jakarta text-12 leading-22 text-[#000] font-bold mt-[10px]">Spelen</p>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/shop/categorie-slapen">
                                <div class="w-full h-full max-w-[113px] md:max-w-[175px] lg:max-w-[104px] xl:max-w-[113px] max-h-[113px] md:max-h-[175px] lg:max-h-[104px] xl:max-h-[113px] aspect-square bg-[#F6FAFC] rounded-[10px]"></div>
                                <p class="font-jakarta text-12 leading-22 text-[#000] font-bold mt-[10px]">Slapen</p>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/shop/categorie-verzorging">
                                <div class="w-full h-full max-w-[113px] md:max-w-[175px] lg:max-w-[104px] xl:max-w-[113px] max-h-[113px] md:max-h-[175px] lg:max-h-[104px] xl:max-h-[113px] aspect-square bg-[#F6FAFC] rounded-[10px]"></div>
                                <p class="font-jakarta text-12 leading-22 text-[#000] font-bold mt-[10px]">Verzorging</p>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/shop/categorie-uitlaten">
                                <div class="w-full h-full max-w-[113px] md:max-w-[175px] lg:max-w-[104px] xl:max-w-[113px] max-h-[113px] md:max-h-[175px] lg:max-h-[104px] xl:max-h-[113px] aspect-square bg-[#F6FAFC] rounded-[10px]"></div>
                                <p class="font-jakarta text-12 leading-22 text-[#000] font-bold mt-[10px]">Uitlaten</p>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/shop/categorie-musthaves">
                                <div class="w-full h-full max-w-[113px] md:max-w-[175px] lg:max-w-[104px] xl:max-w-[113px] max-h-[113px] md:max-h-[175px] lg:max-h-[104px] xl:max-h-[113px] aspect-square bg-[#F6FAFC] rounded-[10px]"></div>
                                <p class="font-jakarta text-12 leading-22 text-[#000] font-bold mt-[10px]">Musthaves</p>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/shop/categorie-aanbiedingen">
                                <div class="w-full h-full max-w-[113px] md:max-w-[175px] lg:max-w-[104px] xl:max-w-[113px] max-h-[113px] md:max-h-[175px] lg:max-h-[104px] xl:max-h-[113px] aspect-square bg-[#F6FAFC] rounded-[10px]"></div>
                                <p class="font-jakarta text-12 leading-22 text-[#000] font-bold mt-[10px]">Aanbiedingen</p>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="/shop/categorie-cadeaus">
                                <div class="w-full h-full max-w-[113px] md:max-w-[175px] lg:max-w-[104px] xl:max-w-[113px] max-h-[113px] md:max-h-[175px] lg:max-h-[104px] xl:max-h-[113px] aspect-square bg-[#F6FAFC] rounded-[10px]"></div>
                                <p class="font-jakarta text-12 leading-22 text-[#000] font-bold mt-[10px]">Cadeaus</p>
                            </a>
                        </div>
                    </div>
                    
                </div>
           </div>
            <!-- FILTER SIDEBAR -->
            <div class="col-span-2 md:col-span-3 lg:col-span-4 w-full hidden lg:flex justify-between items-center">
              <?php if ( is_active_sidebar( 'filter-sidebar' ) ) { ?>
                    <?php dynamic_sidebar( 'filter-sidebar' ); ?>
                <?php } ?>
           </div>
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1, 
            );

            $products_query = new WP_Query($args);

            if ($products_query->have_posts()) :
                while ($products_query->have_posts()) : $products_query->the_post();

            $product = wc_get_product(get_the_ID());
            
            ?>
            <?php include get_template_directory() . '/componenten/product-item.php'; ?>

            <?php
            endwhile;

            wp_reset_postdata();
        else :
            echo 'Geen producten gevonden';
        endif;
        ?>
        </div>
    </div>
</div>
</main>

<script>
// Wacht tot de DOM geladen is
document.addEventListener('DOMContentLoaded', function() {
    // Zoek het element met de class "delete_item"
    var deleteItem = document.querySelector('.delete_item');

    // Verwijder de tekstinhoud van het element
    deleteItem.textContent = '';

    // Of als je alleen de tekst voor het icoon wilt laten staan:
    // deleteItem.textContent = ' ';
});
</script>

<?php
get_footer( 'shop' ); ?>
