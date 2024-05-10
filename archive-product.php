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
 * @version 8.6.0
 */


defined( 'ABSPATH' ) || exit;


get_header( 'shop' ); ?>

<main>

<?php do_action('woocommerce_before_shop_loop'); ?>

<!-- SHOP CONTAINER -->
<div class="max-w-[354px] md:max-w-[725px] lg:max-w-[1168px] xl:max-w-[1330px] mx-auto pb-[70px] lg:pb-[90px] xl:pb-[100px] pt-[30px] md:pt-[35px] lg:pt-[45px] xl:pt-[50px]">


   

    <div class="flex justify-between">
        <!-- FILTER -->
        <div class="hidden lg:block lg:w-[214px] filter mt-[-15px]">
            <?php echo do_shortcode('[fe_widget]'); ?>
        </div>
        <div class="w-full max-w-[354px] md:max-w-[725px] lg:max-w-[898px] xl:max-w-[1082px] grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-[15px] gap-y-[30px] lg:gap-x-[15px] ld:gap-y-[40px] items-start h-fit">
            <?php
            // Haal de huidige slug op
            $current_slug = $_SERVER['REQUEST_URI'];

            // Controleren of "producten" in de slug voorkomt
            if ($current_slug === '/producten/')  { ?>
             <!-- CATEGORIE SLIDER -->
           <div class="col-span-2 md:col-span-3 lg:col-span-4">
              
                <div class="swiper mySwiper-categorie">
                    <div class="flex items-center mb-[30px]">
                        <h2 class="font-jakarta font-bold text-28 leading-28 text-[#000] w-[283px] md:w-[auto]">Selecteer een categorie</h2>
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
                        <?php  include get_template_directory() . '/componenten/categorie-slider.php'; ?>
                    </div>
                </div>        
            </div>
                <?php
            } else { ?>
           
                <?php
            }
            ?>
          
          
            <!-- FILTER SIDEBAR -->
            <div id="filterbar" class="col-span-2 md:col-span-3 lg:col-span-4 w-full flex justify-between items-center mb-[-10px] lg:mb-[unset] show">
                 <div class="filtermobile flex lg:hidden justify-end">
                    <?php echo do_shortcode('[fe_open_button]'); ?>
                </div>

              <?php if ( is_active_sidebar( 'filter-sidebar' ) ) { ?>
                    <?php dynamic_sidebar( 'filter-sidebar' ); ?>
                <?php } ?>
           </div>
           
                <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 60, // Toon 30 producten per pagina
                    'paged' => $paged,
                );

                $products_query = new WP_Query($args);

                if ($products_query->have_posts()) :
                    while ($products_query->have_posts()) : $products_query->the_post();

                        // Laad de productdetails in
                        $product = wc_get_product(get_the_ID());
                        include get_template_directory() . '/componenten/product-item.php';

                    endwhile;

                    wp_reset_postdata();

                    // Toon de paginering van WooCommerce
                    echo '<div class="col-span-2 md:col-span-3 lg:col-span-4"><div class="woocommerce-pagination w-fit mx-auto flex items-center space-x-[15px] mt-[30px]">';
                    echo paginate_links( array(
                        'total' => $products_query->max_num_pages,
                        'current' => max( 1, $paged ),
                        'format' => '?paged=%#%',
                        'prev_text' => '<svg class="rotate-[-180deg]" xmlns="http://www.w3.org/2000/svg" width="9.264" height="12.657" viewBox="0 0 9.264 12.657">
                            <g id="Group_82" data-name="Group 82" transform="translate(1.697 1.697)">
                                <line id="Line_3" data-name="Line 3" x2="5.359" y2="2.436" transform="matrix(0.94, 0.342, -0.342, 0.94, 0.833, 0)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1.5"></line>
                                <line id="Line_4" data-name="Line 4" x2="5.359" y2="2.436" transform="matrix(-0.342, 0.94, -0.94, -0.342, 4.921, 4.227)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1.5"></line>
                            </g>
                            </svg>',
                        'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="9.264" height="12.657" viewBox="0 0 9.264 12.657">
                            <g id="Group_82" data-name="Group 82" transform="translate(1.697 1.697)">
                                <line id="Line_3" data-name="Line 3" x2="5.359" y2="2.436" transform="matrix(0.94, 0.342, -0.342, 0.94, 0.833, 0)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1.5"></line>
                                <line id="Line_4" data-name="Line 4" x2="5.359" y2="2.436" transform="matrix(-0.342, 0.94, -0.94, -0.342, 4.921, 4.227)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1.5"></line>
                            </g>
                            </svg>',
                    ) );
                    echo '</div></div>';
                else :
                    echo 'Geen producten gevonden';
                endif;
                ?>
                <div class="col-span-2 md:col-span-3 lg:col-span-4 w-full">
                    <!-- HIER KOMT SEO TEKST TE STAAN -->
                    <?php
                        if( function_exists('flrt_get_seo_data') ){
                            $seoText = flrt_get_seo_data('text');
                            if( $seoText ){
                                $seoText = apply_filters( 'the_content', wp_kses_post($seoText) );
                                echo sprintf( '<div class="wpc-page-seo-description">%s</div>', $seoText )."\r\n";

                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FILTER SIDEBAR -->
<div id="filterbar-on-scroll" class="w-full justify-between items-center fixed bottom-0 left-0 right-0 hide bg-white px-2 pt-[20px] pb-[30px] lg:hidden border-t-[1px] border-[#DDDDDD]">
    <div class="filtermobile flex lg:hidden justify-end">
        <?php echo do_shortcode('[fe_open_button]'); ?>
    </div>

    <?php if ( is_active_sidebar( 'filter-sidebar' ) ) { ?>
        <?php dynamic_sidebar( 'filter-sidebar' ); ?>
    <?php } ?>
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


 <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Functie om classes te toggelen
            function toggleClasses() {
                var addToCartButton = document.getElementById('filterbar');
                var offScreenAddToCartButton = document.getElementById('filterbar-on-scroll');

                // Controleer of de add-to-cart button buiten het scherm is
                var isOffScreen = (addToCartButton.getBoundingClientRect().top < 60);

                // Toggle de classes based op de positie van de add-to-cart button
                if (isOffScreen) {
                    offScreenAddToCartButton.classList.add('show');
                    offScreenAddToCartButton.classList.remove('hide');
                } else {
                    offScreenAddToCartButton.classList.remove('show');
                    offScreenAddToCartButton.classList.add('hide');
                }
            }

            // Voeg een event listener toe voor het scrollen om de classes te updaten
            window.addEventListener('scroll', toggleClasses);

            // Roep de functie ook een keer aan bij het laden van de pagina
            toggleClasses();
        });
    </script>

<?php
get_footer( 'shop' ); ?>
