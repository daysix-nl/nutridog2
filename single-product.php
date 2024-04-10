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
    <div id="single-product" class="w-full max-w-[360px] md:max-w-[718px] lg:max-w-[1170px] xl:max-w-[1330px] mx-auto lg:mt-[10px]">
    <?php
        // Controleren of er een HTTP-referer is ingesteld
        if(isset($_SERVER['HTTP_REFERER'])) {
            // URL van de vorige pagina ophalen
            $referer_url = $_SERVER['HTTP_REFERER'];
            
            // Controleren of de vorige pagina een interne pagina is
            if(strpos($referer_url, home_url()) !== false) {
                // Als het een interne pagina is, weergeef de stap-terugknop
                ?>
                <a href="javascript:history.back()" class="back-button mb-[20px] text-13 leading-30 font-medium font-jakarta border-[1px] w-fit rounded-full px-[15px] h-[30px] flex justify-between items-center">Stap terug</a>
                <?php
            }
        }
        else { ?>
            <div class="pt-[20px]"></div>
            <?php
        }
    ?>
    <div class="w-full flex flex-col md:flex-row justify-between">
        <div class="w-full max-w-[354px] md:max-w-[334px] lg:max-w-[565px] xl:max-w-[640px]">
            <!-- PRODUCT AFBEELDING -->
                <?php
                global $product;
                if ($product->get_gallery_image_ids()) { ?>
          
                    <div class=" w-full pb-3 md:pb-[0px]">
                          <div class="swiper mySwiper-shop relative rounded-[10px] overlow-hidden">
                                <div class="swiper-wrapper ">
                                    <div class="swiper-slide aspect-[16/12] w-full bg-[#F2FBFF] flex justify-center items-center">
                                        <div class="aspect-[1/1] w-full flex justify-center items-center max-h-[calc(100%-30px)] lg:max-h-[calc(100%-100px)]">
                                            <img src="<?php the_post_thumbnail_url($product->get_id());?>" alt="" class="packshot mix-blend-multiply">
                                        </div>
                                    </div>
                                    <?php
                                        global $product;
                                        if ( $product->get_gallery_image_ids() ) {
                                            $gallery_image_ids = $product->get_gallery_image_ids(); 
                                            foreach ( $gallery_image_ids as $image_id ) { 
                                                $image_url = wp_get_attachment_url($image_id); ?>
                                                <div class="swiper-slide aspect-[16/12] w-full bg-[#F2FBFF] flex justify-center items-center">
                                                    <div class="aspect-[1/1] w-full flex justify-center items-center max-h-[calc(100%-30px)] lg:max-h-[calc(100%-100px)]">
                                                        <img src="<?php echo esc_url($image_url);?>" alt="" class="packshot mix-blend-multiply">
                                                    </div>
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
                <div class="grid grid-cols-1 pb-3 md:pb-[0px]">
                    <!-- PRODUCT AFBEELDING -->
                    <div class="aspect-[16/12] w-full bg-[#F2FBFF] flex justify-center items-center rounded-[10px]">
                        <div class="aspect-[1/1] w-full flex justify-center items-center max-h-[calc(100%-30px)] lg:max-h-[calc(100%-100px)]">
                            <img src="<?php the_post_thumbnail_url($product->get_id());?>" alt="" class="packshot mix-blend-multiply">
                        </div>
                    </div>
                </div>
                    <?php
                }
                ?>
        </div>

        <div class="w-full max-w-[360px] md:max-w-[360px] lg:max-w-[535px] xl:max-w-[600px] mr-[unset] lg:mr-3 xl:mr-4 flex flex-col justify-between lg:min-h-[446px] xl:min-h-[500px]">
            <!-- PRODUCT TITEL EN PRIJS -->
            <div class="grid gap-[25px] lg:mt-[25px]">
                <div class="max-w-[430px]">
                    <h1 class="font-tanker text-28 leading-30 text-[#000000] font-extrabold"><?php the_title();?></h1>
                    <?php  $brand = $product->get_attribute('Brand');  echo '<p class="font-jakarta text-14 leading-25 mt-[5px] text-[#888888]">' . esc_html($brand) . '</p>'; ?>
                </div>
                <div class="">
                    <p class="font-jakarta text-25 leading-30 text-[#000000] font-extrabold"><?php echo $product->get_price_html(); ?></p>
                </div>
                <div class="">
                    <a href="#info" class="preview-info nohtml line-clamp-6 md:line-clamp-3 text-[#525252] text-14 leading-25 font-jakarta"><?php echo get_the_content();?></a>
                    <a href="#info" class="text-[#525252] text-14 leading-14 font-jakarta underline">Lees meer</a>
                </div>
            </div>
            <div class="">
                <?php
                // Controleer of WooCommerce actief is
                if (class_exists('WooCommerce')) {
                    // Haal de product-ID op
                    $product_id = get_the_ID(); // Haal de ID van het huidige product op

                    // Haal het productobject op
                    $product = wc_get_product($product_id);

                    // Controleer of het product een variabel product is
                    if ($product->is_type('variable')) {
                        // Haal alle variaties van het product op
                        $variations = $product->get_available_variations();

                        // Controleer de voorraad van elke variatie
                        $out_of_stock = true;
                        foreach ($variations as $variation) {
                            // Haal de voorraad van de variatie op
                            $variation_id = $variation['variation_id'];
                            $variation_product = new WC_Product_Variation($variation_id);
                            $variation_stock = $variation_product->get_stock_quantity();

                            // Als een van de variaties voorraad heeft, markeer dan niet als uit voorraad
                            if ($variation_stock > 0) {
                                $out_of_stock = false;
                                break;
                            }
                        }

                        // Als alle variaties uit voorraad zijn, toon dan een bericht
                        if ($out_of_stock) { ?>
                           <div class="mt-4 pb-[40px]">
                            <p class="text-[#FF6248] text-14 leading-25 font-jakarta font-bold">Dit product is tijdelijke uitverkocht. Vul hieronder uw e-mailadres in om een bericht te ontvangen zodra wij dit product weer op voorraad hebben.</p>
                        </div>
                        <?php
                        } else { ?>
                           <!-- INFORMATIE -->
                        
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
                           
                            <?php
                        }
                    } else {
                        // Voor niet-variabele producten, controleer voorraad op dezelfde manier als eerder
                        $voorraad = $product->get_stock_quantity();
                        if ($voorraad <= 0) {?>
                        <div class="mt-4 pb-[40px]">
                            <p class="text-[#FF6248] text-14 leading-25 font-jakarta font-bold">Dit product is tijdelijke uitverkocht. Vul hieronder uw e-mailadres in om een bericht te ontvangen zodra wij dit product weer op voorraad hebben.</p>
                        </div>
                    <?php
                        } else { ?>
                            <!-- INFORMATIE -->
                        <div class="w-full grid gap-[15px] mt-4">
                            <!-- USP'S -->
                            <div class="flex items-start">
                                <svg class="mt-[2px] w-[13.697px]" xmlns="http://www.w3.org/2000/svg" width="13.697" height="9.781" viewBox="0 0 13.697 9.781">
                                    <path id="Path_202" data-name="Path 202" d="M8331.749,406.758l-7.468,7.367-3.4-3.4" transform="translate(-8319.466 -405.343)" fill="none" stroke="#8cc63f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </svg>
                                <?php // Haal de product-ID op
                                $product_id = get_the_ID(); // Haal de ID van het huidige product op

                                // Haal de verkoopprijs op van het product met de ID
                                $product = wc_get_product($product_id);
                                $verkoopprijs = $product->get_price(); // Prijs ophalen

                                // Rond de verkoopprijs af
                                $resultaat = floor($verkoopprijs / 1); ?>
                                <p class="text-[#525252] text-14 leading-14 font-jakarta w-full ml-2 block">Bij dit product ontvangt u <?php if ($product->is_type('variable')) { echo "minimaal"; }?> <?php echo $resultaat ?> <a href="/spaarbotjes" class="underline">spaarbotjes</a></p>
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
                            <?php
                        }
                    }
                } else { ?>
                   <div class="mt-4 pb-[4]">
                        <p class="text-[#FF6248] text-14 leading-25 font-jakarta font-bold">Dit product is tijdelijke uitverkocht. Vul hieronder uw e-mailadres in om een bericht te ontvangen zodra wij dit product weer op voorraad hebben.</p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    
    

    <!-- GERELATEERDE PRODUCTEN -->
    <div class="w-full mt-8 lg:px-5">
        <h2 class="text-25 leading-25 md:text-30 md:leading-30 font-grotesk text-[#FF6248] pb-4 text-center">Shop meer</h2>
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
                        <?php include get_template_directory() . '/componenten/product-item.php'; ?>
                    
                <?php endwhile;
            endif;

            wp_reset_postdata();
            ?>

        </div>
    </div>

    <!-- RECENT BEKEKEN PRODUCTEN -->
    <div class="w-full mt-8 lg:px-5">
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
                        echo '<h2 class="text-25 leading-25 md:text-30 md:leading-30 font-grotesk text-[#FF6248] pb-4 text-center">Bekeken door anderen</h2>';
                        echo '<div class="grid grid-cols-2 lg:grid-cols-4 gap-x-[15px] gap-y-[30px] lg:gap-x-[15px] pb-[60px]">';
          
                        while ($recently_viewed_products->have_posts()) : $recently_viewed_products->the_post(); 
                            
                            $product = wc_get_product( get_the_ID() ); ?>
                       <?php include get_template_directory() . '/componenten/product-item.php'; ?>
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

         <!-- GERELATEERDE PRODUCTEN -->
        <div id="info"></div>
        <div class="w-full mt-2 lg:px-5">
            <h2 class="text-25 leading-25 md:text-30 md:leading-30 font-grotesk text-[#039C47] pb-4 text-center">Meer informatie</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-[50px]">
                <div class="">
                    
                </div>
                <div class="text-14 leading-30 font-jakarta text-black w-fit text-editor">
                    <h2>Product details</h2>
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
