<?php 
/**
 * The single post template file
 * 
 * @package Day Six theme
 */

defined( 'ABSPATH' ) || exit;

global $product;


get_header( 'notitle' ); ?>

<?php while ( have_posts() ) : ?>
<?php the_post(); ?>
<?php
do_action( 'woocommerce_before_single_product' );
if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
} ?>

<main>
    <div id="single-product" class="w-full max-w-[360px] md:max-w-[718px] lg:max-w-[1170px] xl:max-w-[1330px] mx-auto">

    <div class="w-full flex flex-col md:flex-row justify-between">
        <div class="w-full max-w-[354px] md:max-w-[334px] lg:max-w-[565px] xl:max-w-[640px]">
            <!-- PRODUCT AFBEELDING -->
                <?php
                global $product;
                if ($product->get_gallery_image_ids()) { ?>
          
                    <div class=" w-full pb-3">
                          <div class="swiper mySwiper-shop relative rounded-[10px] overlow-hidden">
                                <div class="swiper-wrapper ">
                                    <div class="swiper-slide aspect-[16/12] w-full bg-[#F4F8FA] flex justify-center items-center">
                                        <img src="<?php the_post_thumbnail_url($product->get_id());?>" alt="" class="h-ful w-auto max-h-[70%] px-2 mix-blend-multiply">
                                    </div>
                                    <?php
                                        global $product;
                                        if ( $product->get_gallery_image_ids() ) {
                                            $gallery_image_ids = $product->get_gallery_image_ids(); 
                                            foreach ( $gallery_image_ids as $image_id ) { 
                                                $image_url = wp_get_attachment_url($image_id); ?>
                                                <div class="swiper-slide aspect-[16/12] w-full bg-[#F4F8FA] flex justify-center items-center">
                                                    <img src="<?php echo esc_url($image_url);?>" alt="" class="h-ful w-auto max-h-[70%] px-2 mix-blend-multiply">
                                                </div>
                                            <?php
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="swiper-button-next-shop"></div>
                                <div class="swiper-button-prev-shop"></div>
                            </div>
                    </div>
                <?php
                } else { ?>
                <div class="grid grid-cols-1 pb-3">
                    <!-- PRODUCT AFBEELDING -->
                    <div class="aspect-[16/12] w-full bg-[#F4F8FA] overflow-hidden flex justify-center items-center rounded-[10px]">
                        <img src="<?php the_post_thumbnail_url($product->get_id());?>" alt="" class="h-ful w-auto max-h-[70%] max-w-[90%] mix-blend-multiply">
                    </div>
                </div>
                    <?php
                }
                ?>
        </div>

        <div class="w-full max-w-[360px] md:max-w-[360px] lg:max-w-[535px] xl:max-w-[600px] mr-[unset] lg:mr-3 xl:mr-4">
            <!-- PRODUCT TITEL EN PRIJS -->
            <div class="grid gap-[25px]">
                <div class="max-w-[430px]">
                    <h1 class="font-tanker text-28 leading-30 text-[#000000] font-extrabold"><?php the_title();?></h1>
                </div>
                <div class="">
                    <p class="font-jakarta text-25 leading-30 text-[#000000] font-extrabold"><?php echo $product->get_price_html(); ?></p>
                </div>
            </div>
            <!-- INFORMATIE -->
            <div class="w-full grid gap-[15px] mt-4">
                <!-- USP'S -->
                <div class="flex items-start">
                    <svg class="mt-[2px w-[13.697px]" xmlns="http://www.w3.org/2000/svg" width="13.697" height="9.781" viewBox="0 0 13.697 9.781">
                        <path id="Path_202" data-name="Path 202" d="M8331.749,406.758l-7.468,7.367-3.4-3.4" transform="translate(-8319.466 -405.343)" fill="none" stroke="#8cc63f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                    <p class="text-[#525252] text-14 leading-14 font-jakarta w-full ml-2">Onze klantenservice helpt je graag verder</p>
                </div>
                <div class="flex items-start">
                    <svg class="mt-[2px] w-[13.697px]" xmlns="http://www.w3.org/2000/svg" width="13.697" height="9.781" viewBox="0 0 13.697 9.781">
                        <path id="Path_202" data-name="Path 202" d="M8331.749,406.758l-7.468,7.367-3.4-3.4" transform="translate(-8319.466 -405.343)" fill="none" stroke="#8cc63f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                    <p class="text-[#525252] text-14 leading-14 font-jakarta w-full ml-2">Gratis verzending vanaf 50 euro</p>
                </div>
                <div class="flex items-start">
                    <svg class="mt-[2px] w-[13.697px]" xmlns="http://www.w3.org/2000/svg" width="13.697" height="9.781" viewBox="0 0 13.697 9.781">
                        <path id="Path_202" data-name="Path 202" d="M8331.749,406.758l-7.468,7.367-3.4-3.4" transform="translate(-8319.466 -405.343)" fill="none" stroke="#8cc63f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                    <p class="text-[#525252] text-14 leading-14 font-jakarta w-full ml-2">Voor 15:00 besteld de volgende werkdag in huis</p>
                </div>
            </div>
            <!-- PRODUCT TOEVOEGEN -->

            <div class="pt-3">
                 <?php
                    global $product;
                    if ($product->is_type('variable')) { ?>
                        <div class="product-add-single">
                            <?php woocommerce_template_single_add_to_cart(); ?>
                        </div>
                    <?php
                    } else { ?>
                        <div class="simple">
                            <?php woocommerce_template_single_add_to_cart(); ?>
                        </div>
                    <?php
                    }
                    ?>
            </div>
            
            <!-- PRODUCT BESCHRIJVING -->
            <div class="border-accordion mt-0"></div>
            <div class="accordion-item"> 
                <button class="accordion text-14 leading-32 font-jakarta font-normal text-[#2B2828] py-[25px] flex">Product informatie</button>
                <div class="panel">
                    <div class="px-1.5 flex flex-col pb-4">
                        <div class="text-14 leading-30 font-jakarta text-black w-fit text-editor">
                            <?php
                            $content = get_the_content(); // De content ophalen

                            if (empty($content)) {
                                // Als de content leeg is
                                echo 'Er is geen beschrijving beschikbaar voor dit artikel.';
                            } else {
                                // Als de content niet leeg is
                                the_content(); // Toon de content
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
         
          
            <!-- <div class="accordion-item"> 
                <button class="accordion text-16 leading-32 font-jakarta font-normal text-black py-[25px] flex">xxxx</button>
                <div class="panel">
                    <div class="px-1.5 flex flex-col pb-4">
                        <div class="text-16 leading-30 font-jakarta text-black w-fit text-editor">cccc</div>
                    </div>
                </div>
            </div> -->
          
        </div>
    </div>

    <!-- GERELATEERDE PRODUCTEN -->
    <div class="w-full mt-6 lg:px-5">
        <h2 class="text-24 leading-22 font-jakarta font-semibold text-[#38241B] pb-3 text-center">Vergelijkbare producten</h2>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-[15px] gap-y-[30px] lg:gap-x-[15px]">
            <?php
            global $post;

            // Haal de huidige productcategorieën op
            $terms = wp_get_post_terms($post->ID, 'product_cat');
            $category_ids = array();

            foreach ($terms as $term) {
                $category_ids[] = $term->term_id;
            }

            // Huidige product uitsluiten
            $current_product_id = $post->ID;

            // De query voor gerelateerde producten
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 4, // Aantal gerelateerde producten om weer te geven
                'post__not_in' => array($current_product_id), // Uitsluiten van het huidige product
                'orderby' => 'rand', // Willekeurige volgorde (je kunt wijzigen naar andere orderby-opties)
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' => $category_ids,
                        'operator' => 'IN',
                    ),
                ),
            );

            $related_products = new WP_Query($args);

            if ($related_products->have_posts()) :
                while ($related_products->have_posts()) : $related_products->the_post();  // Informatie over het product ophalen
                        $product = wc_get_product( get_the_ID() ); ?>
                        <!-- PRODUCT -->
                        <div class="product-item h-fit relative">
                            <a class="w-full flex justify-center" href="<?php the_permalink(); ?>">
                                <div class="aspect-square w-full bg-[#F2F4F5] flex justify-center items-center rounded-[10px] overflow-hidden lg:relative">
                                    <img src="<?php echo get_the_post_thumbnail_url($product->get_id()); ?>" alt="" class="h-ful w-auto max-h-[70%] px-2 mix-blend-multiply">
                                </div>
                                </a>
                                 <div class="absolute top-[8px] right-[8px]"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></div>
                                <a href="<?php the_permalink(); ?>">
                                <div class="flex justify-between items-end w-full mt-[15px]">
                                    <p class="font-jakarta text-15 leading-16 font-extrabold text-[#000] mb-[3px]"><?php echo $product->get_price_html(); ?></p>
                                    <div class="h-3 w-3 rounded-full bg-[#FFF2E2] flex items-center justify-center font-jakarta text-15 leading-15 font-extrabold text-[#000] mr-[8px]"><span class="mb-[5px]">+</span></div>
                                </div>
                                <h2 class="font-jakarta text-14 leading-20 text-[#2B2828] pt-[8px] font-medium"><?php the_title(); ?></h2>            
                            </a>
                        </div>
                    
                <?php endwhile;
            endif;

            wp_reset_postdata();
            ?>

        </div>
    </div>

    <!-- RECENT BEKEKEN PRODUCTEN -->
    <div class="w-full mt-6 lg:px-5">
        
        
            <?php
            global $post;

            // Haal het ID van het huidige product op
            $current_product_id = $post->ID;

            // Haal de recent bekeken producten op
            $recently_viewed = get_transient('wcj_viewed_products');

            if (!empty($recently_viewed) && is_array($recently_viewed)) {
                // Verwijder het huidige product uit de lijst
                $recently_viewed = array_diff($recently_viewed, array($current_product_id));

                // Als er nog steeds recent bekeken producten zijn na uitsluiting
                if (!empty($recently_viewed)) {
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 4, // Aantal recent bekeken producten om weer te geven
                        'post__in' => $recently_viewed, // Toon alleen recent bekeken producten
                    );

                    $recently_viewed_products = new WP_Query($args);

                    if ($recently_viewed_products->have_posts()) : 
                        echo '<h2 class="text-24 leading-22 font-jakarta font-semibold text-[#38241B] pb-3 text-center">Recent bekeken</h2>';
                        echo '<div class="grid grid-cols-2 lg:grid-cols-4 gap-x-[15px] gap-y-[30px] lg:gap-x-[15px] pb-[60px]">';
          
                        while ($recently_viewed_products->have_posts()) : $recently_viewed_products->the_post(); 
                            
                            $product = wc_get_product( get_the_ID() ); ?>
                       <!-- PRODUCT -->
                        <div class="product-item h-fit relative">
                            <a class="w-full flex justify-center" href="<?php the_permalink(); ?>">
                                <div class="aspect-square w-full bg-[#F2F4F5] flex justify-center items-center rounded-[10px] overflow-hidden lg:relative">
                                    <img src="<?php echo get_the_post_thumbnail_url($product->get_id()); ?>" alt="" class="h-ful w-auto max-h-[70%] px-2 mix-blend-multiply">
                                </div>
                                </a>
                                <div class="absolute top-[8px] right-[8px]"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></div>
                                <a href="<?php the_permalink(); ?>">
                                <div class="flex justify-between items-end w-full mt-[15px]">
                                    <p class="font-jakarta text-15 leading-16 font-extrabold text-[#000] mb-[3px]"><?php echo $product->get_price_html(); ?></p>
                                    <div class="h-3 w-3 rounded-full bg-[#FFF2E2] flex items-center justify-center font-jakarta text-15 leading-15 font-extrabold text-[#000] mr-[8px]"><span class="mb-[5px]">+</span></div>
                                </div>
                                <h2 class="font-jakarta text-14 leading-20 text-[#2B2828] pt-[8px] font-medium"><?php the_title(); ?></h2>            
                            </a>
                        </div>
                        
                        <?php 
                    endwhile;
                    echo '</div>';
                            else:
                             
                            endif;

                            wp_reset_postdata();
                        }
                    } else {
                        
                    }
                    ?>


        </div>
    </div>

    </div>

</main>


<?php do_action( 'woocommerce_after_single_product' ); ?>
<?php endwhile; // end of the loop. ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var addToCartButton = document.querySelector('.single_add_to_cart_button');
    if (addToCartButton) {
        addToCartButton.addEventListener('click', function() {
            var variationSelects = document.querySelectorAll('.variations select');
            variationSelects.forEach(function(select) {
                select.value = '';  // Leeg maken van de selectie
            });
        });
    }
});
</script>

<script>
    // Wacht tot de DOM geladen is
document.addEventListener('DOMContentLoaded', function() {
    // Zoek alle elementen met de class .variable-item-span
    var variabelElementen = document.querySelectorAll('.variable-item-span');

    // Loop door elk gevonden element
    variabelElementen.forEach(function(element) {
        // Haal de tekst op binnen het element
        var tekst = element.innerText;

        // Zoek naar tekst tussen haakjes en verwijder het
        var aangepasteTekst = tekst.replace(/\(\d+\)/, '');

        // Zet de aangepaste tekst terug in het element
        element.innerText = aangepasteTekst;
    });
});
</script>



<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
