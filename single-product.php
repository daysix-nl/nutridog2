<?php 
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
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

<main class="share-close">
    <div id="single-product" class="w-full max-w-[360px] md:max-w-[718px] lg:max-w-[1170px] xl:max-w-[1330px] mx-auto pt-[30px] md:pt-[35px] lg:pt-[45px] xl:pt-[50px]">
           <?php
        // Controleren of er een HTTP-referer is ingesteld
        if(isset($_SERVER['HTTP_REFERER'])) {
            // URL van de vorige pagina ophalen
            $referer_url = $_SERVER['HTTP_REFERER'];
            
            // Controleren of de vorige pagina een interne pagina is
            if(strpos($referer_url, home_url()) !== false) {
                // Als het een interne pagina is, weergeef de stap-terugknop
                ?>
                <a href="javascript:history.back()" class="back-button mb-[20px] block underline font-jakarta font-semibold text-[#626262] text-15 xl:text-16">Stap terug</a>
                <?php
            }
        }
        else { ?>
            
            <?php
        }
    ?>
    <div class="w-full flex flex-col md:flex-row justify-between">
        <div class="w-full max-w-[360px] md:max-w-[334px] lg:max-w-[565px] xl:max-w-[640px]">
            <!-- PRODUCT AFBEELDING -->
                <?php
                global $product;
                if ($product->get_gallery_image_ids()) { ?>

                    <?php 
                    if (get_field('intern_product') === "yes"): ?>
                     <div class=" w-full pb-3 md:pb-[0px]">
                          <div class="swiper mySwiper-shop relative rounded-[10px] overlow-hidden">
                                <div class="swiper-wrapper ">
                                    <div class="swiper-slide aspect-[16/12] w-full bg-[#F2FBFF] flex justify-center items-center">
                                        <div class="aspect-[1/1] w-full flex justify-center items-center max-h-[calc(100%-30px)] lg:max-h-[calc(100%-100px)] lg:min-h-[446px] xl:min-h-[480px]">
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
                                                    <div class="aspect-[1/1] w-full flex justify-center items-center max-h-[calc(100%)] lg:max-h-[calc(100%)] lg:min-h-[446px] xl:min-h-[480px] overflow-hidden">
                                                        <img src="<?php echo esc_url($image_url);?>" alt="" class="min-h-full min-w-full object-cover">
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
                    else: ?>
                    <div class=" w-full pb-3 md:pb-[0px]">
                          <div class="swiper mySwiper-shop relative rounded-[10px] overlow-hidden">
                                <div class="swiper-wrapper ">
                                    <div class="swiper-slide aspect-[16/12] w-full bg-[#F2FBFF] flex justify-center items-center">
                                        <div class="aspect-[1/1] w-full flex justify-center items-center max-h-[calc(100%-30px)] lg:max-h-[calc(100%-100px)] lg:min-h-[446px] xl:min-h-[480px]">
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
                                                    <div class="aspect-[1/1] w-full flex justify-center items-center max-h-[calc(100%-30px)] lg:max-h-[calc(100%-100px)] lg:min-h-[446px] xl:min-h-[480px]">
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
                    endif; 
                    ?>
                <?php
                } else { ?>
                <div class="grid grid-cols-1 pb-3 md:pb-[0px]">
                    <!-- PRODUCT AFBEELDING -->
                    <div class="aspect-[16/12] w-full bg-[#F2FBFF] flex justify-center items-center rounded-[10px]">
                        <div class="aspect-[1/1] w-full flex justify-center items-center max-h-[calc(100%-30px)] lg:max-h-[calc(100%-100px)] lg:min-h-[446px] xl:min-h-[480px]">
                            <img src="<?php the_post_thumbnail_url($product->get_id());?>" alt="" class="packshot mix-blend-multiply">
                        </div>
                    </div>
                </div>
                    <?php
                }
                ?>
        </div>

        <div class="w-full max-w-[360px] md:max-w-[360px] lg:max-w-[535px] xl:max-w-[600px] mr-[unset] lg:mr-3 xl:mr-4 flex flex-col justify-between lg:min-h-[446px] xl:min-h-[480px]">
            <!-- PRODUCT TITEL EN PRIJS -->
            <div class="grid gap-[25px] lg:mt-[25px]">
                <div class="max-w-[430px]">
                    
                    <h1 class="font-tanker text-28 leading-30 text-[#000000] font-extrabold"><?php the_title();?></h1>
                    <div class="flex">
                        <?php  $brand = $product->get_attribute('Brand');  echo '<p class="font-jakarta text-14 leading-25 mt-[5px] text-[#888888]">' . esc_html($brand) . '</p>'; ?>
                        
                    
                    </div>
                    
                </div>
                <div class="grid gap-[8px]">
                    <p id="productprice" class="font-jakarta text-25 leading-30 text-[#000000] font-extrabold"><?php echo $product->get_price_html(); ?></p>
                    <?php if (get_field('aangepast_levertijd') === "yes"): ?>   
                        <p class="text-14 leading-25 font-jakarta text-[#039c47]"><?php echo get_field('levertijd_opmerking');?></p>
                    <?php endif; ?>
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
                            <p class="text-[#000] text-14 leading-25 font-jakarta font-bold">Dit product is tijdelijk uitverkocht. Vul hieronder je e-mailadres in om een bericht te ontvangen zodra wij dit product weer op voorraad hebben.</p>
                            <div class="nutriform mt-[15px] max-w-[360px]">
                                <?php echo do_shortcode('[gravityform id="2" title="false"]'); ?>
                            </div>
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
                                 <div class="block lg:hidden">
                                    <div class="flex mt-[30px] space-x-[10px]">
                                        <?php $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                                        <button class="add-favorite h-[45px] w-[45px] border-[1px] border-[#000] rounded-full justify-center items-center flex lg:hidden <?php echo str_contains($actual_link, 'verlanglijst') ? "close-button-favorite" : "" ?> " id-data="<?php echo $product->get_id(); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/ fill="#000"></svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/ fill="#000"></svg>
                                        </button>
                                        <button id="share-button-mobile" type="button" class="h-[45px] w-[45px] border-[1px] border-[#000] rounded-full justify-center items-center flex lg:hidden">
                                            <svg id="Page-1" xmlns="http://www.w3.org/2000/svg" width="16.213" height="17.564" viewBox="0 0 16.213 17.564">
                                                <g id="Icon-Set">
                                                    <path id="share" d="M324.836,742.213a2.027,2.027,0,1,1,2.027-2.027,2.027,2.027,0,0,1-2.027,2.027Zm-9.458-5.4a2.027,2.027,0,1,1,2.027-2.027,2.027,2.027,0,0,1-2.027,2.027Zm9.458-9.458a2.027,2.027,0,1,1-2.027,2.027,2.027,2.027,0,0,1,2.027-2.027Zm0,9.458a3.368,3.368,0,0,0-2.84,1.562l-3.618-2.067a3.172,3.172,0,0,0,.219-2.492l3.764-2.15a3.543,3.543,0,1,0-.744-1.312l-3.764,2.15a3.381,3.381,0,1,0-.435,4.96l-.014.026,4.09,2.337a3.243,3.243,0,0,0-.037.365,3.378,3.378,0,1,0,3.378-3.378Z" transform="translate(-312 -726)" fill-rule="evenodd"/>
                                                </g>
                                            </svg>
                                        </button>
                                        
                                    </div>
                                    <hr class="mt-[40px]">
                                </div>
                        </div>
                           
                            <?php
                        }
                    } else {
                        // Voor niet-variabele producten, controleer voorraad op dezelfde manier als eerder
                        $voorraad = $product->get_stock_quantity();
                        if ($voorraad <= 0) {?>
                        <div class="mt-4 pb-[40px]">
                            <p class="text-[#000] text-14 leading-25 font-jakarta font-bold">Dit product is tijdelijk uitverkocht. Vul hieronder je e-mailadres in om een bericht te ontvangen zodra wij dit product weer op voorraad hebben.</p>
                             <div class="nutriform mt-[15px] max-w-[360px]">
                                <?php echo do_shortcode('[gravityform id="2" title="false"]'); ?>
                            </div>
                        </div>
                    <?php
                        } else { ?>
                            <!-- INFORMATIE -->
                        <div id="usps" class="w-full grid gap-[15px] mt-4 <?php echo get_field('toon_usps');?>">
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
                                <p class="text-[#525252] text-14 leading-14 font-jakarta w-full ml-2 block">Bij dit product ontvang je <?php if ($product->is_type('variable')) { echo "minimaal"; }?> <?php echo $resultaat ?> <a href="/spaar-voorwaarden/" class="underline">spaarbotjes</a></p>
                            </div>
                            <?php if (get_field('aangepast_levertijd') !== "yes"): ?>   
                            <div class="flex items-start">
                                <svg class="mt-[2px] w-[13.697px]" xmlns="http://www.w3.org/2000/svg" width="13.697" height="9.781" viewBox="0 0 13.697 9.781">
                                    <path id="Path_202" data-name="Path 202" d="M8331.749,406.758l-7.468,7.367-3.4-3.4" transform="translate(-8319.466 -405.343)" fill="none" stroke="#8cc63f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </svg>
                                <p class="text-[#525252] text-14 leading-14 font-jakarta w-full ml-2">Voor 17:00 besteld de volgende werkdag in huis</p>
                            </div>
                            <?php endif; ?>
                            <div class="flex items-start">
                                <svg class="mt-[2px] w-[13.697px]" xmlns="http://www.w3.org/2000/svg" width="13.697" height="9.781" viewBox="0 0 13.697 9.781">
                                    <path id="Path_202" data-name="Path 202" d="M8331.749,406.758l-7.468,7.367-3.4-3.4" transform="translate(-8319.466 -405.343)" fill="none" stroke="#8cc63f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </svg>
                                <p class="text-[#525252] text-14 leading-14 font-jakarta w-full ml-2">Gratis verzending vanaf 50 euro</p>
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
                                <div class="block lg:hidden">
                                    <div class="flex mt-[30px] space-x-[10px]">
                                        <?php $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                                        <button class="add-favorite h-[45px] w-[45px] border-[1px] border-[#000] rounded-full justify-center items-center flex lg:hidden <?php echo str_contains($actual_link, 'verlanglijst') ? "close-button-favorite" : "" ?> " id-data="<?php echo $product->get_id(); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/ fill="#000"></svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/ fill="#000"></svg>
                                        </button>
                                        <button id="share-button-mobile" type="button" class="h-[45px] w-[45px] border-[1px] border-[#000] rounded-full justify-center items-center flex lg:hidden">
                                            <svg id="Page-1" xmlns="http://www.w3.org/2000/svg" width="16.213" height="17.564" viewBox="0 0 16.213 17.564">
                                                <g id="Icon-Set">
                                                    <path id="share" d="M324.836,742.213a2.027,2.027,0,1,1,2.027-2.027,2.027,2.027,0,0,1-2.027,2.027Zm-9.458-5.4a2.027,2.027,0,1,1,2.027-2.027,2.027,2.027,0,0,1-2.027,2.027Zm9.458-9.458a2.027,2.027,0,1,1-2.027,2.027,2.027,2.027,0,0,1,2.027-2.027Zm0,9.458a3.368,3.368,0,0,0-2.84,1.562l-3.618-2.067a3.172,3.172,0,0,0,.219-2.492l3.764-2.15a3.543,3.543,0,1,0-.744-1.312l-3.764,2.15a3.381,3.381,0,1,0-.435,4.96l-.014.026,4.09,2.337a3.243,3.243,0,0,0-.037.365,3.378,3.378,0,1,0,3.378-3.378Z" transform="translate(-312 -726)" fill-rule="evenodd"/>
                                                </g>
                                            </svg>
                                        </button>
                                        
                                    </div>
                                    <hr class="mt-[40px]">
                                </div>
                        </div>
                            <?php
                        }
                    }
                } else { ?>
                   <div class="mt-4 pb-[4]">
                        <p class="text-[#000] text-14 leading-25 font-jakarta font-bold">Dit product is tijdelijk uitverkocht. Vul hieronder je e-mailadres in om een bericht te ontvangen zodra wij dit product weer op voorraad hebben.</p>
                         <div class="nutriform mt-[15px] max-w-[360px]">
                            <?php echo do_shortcode('[gravityform id="2" title="false"]'); ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php if (get_field('combinatie_producten')): ?>   
    <!-- MAAK JE SET COMPLEET -->
    <div class="w-full mt-8 lg:px-5 md:flex justify-between">
        <div class="w-full md:w-[199px] lg:w-[340px] xl:w-[378px] relative">
            <div class="absolute top-[-20px] right-[-20px] md:top-0 md:right-0 md:left-[-10px] lg:left-[-14px] z-[2] md:relative scale-[0.7] lg:scale-100 orgin-top-right md:origin-top-left md:translate-y-2 lg:orgin-[unset] lg:translate-y-[unset]">
                <svg xmlns="http://www.w3.org/2000/svg" width="123.103" height="103.601" viewBox="0 0 123.103 103.601">
                    <path id="Path_762" data-name="Path 762" d="M22.746,1.311c4.569-1.43,15.02-3.01,28.69,3.059S73.861,15.516,76.789,22.353s.24,20.367-5.361,33.977S55.89,78.715,51.436,79.947s-15.394-1.65-29.33-7.31S3.4,61.586,1.161,56.33-.271,36.916,5.249,22.353,18.177,2.741,22.746,1.311Z" transform="translate(0 29.215) rotate(-22)" fill="#ff842b"/>
                    <path id="Path_763" data-name="Path 763" d="M13.291.766c2.67-.836,8.777-1.759,16.765,1.787s13.1,6.513,14.815,10.508.14,11.9-3.132,19.854S32.658,46,30.056,46.715s-9-.964-17.138-4.271S1.985,35.987.679,32.915-.159,21.571,3.067,13.061,10.621,1.6,13.291.766Z" transform="translate(77.782 51.096) rotate(6)" fill="#57dd04"/>
                    <g id="Screenshot_2023-12-18_at_11.43.24" data-name="Screenshot 2023-12-18 at 11.43.24" transform="translate(107.628 91.45) rotate(177)">
                        <path id="Path_699" data-name="Path 699" d="M5.386,9.544a.013.013,0,0,1,.012.017c-.158,1-.24,2.029-.3,3.042q-.287,4.556-.566,9.09a.017.017,0,0,1-.017.017,4.594,4.594,0,0,0-1.505.321,4.678,4.678,0,0,0-2.12,1.691,4.926,4.926,0,0,0,1.038,6.737,4.525,4.525,0,0,0,1.737.776,4.462,4.462,0,0,0,2.526-.21,4.772,4.772,0,0,0,1.682-1.139.055.055,0,0,1,.034-.016.184.184,0,0,1,.173.056,5.653,5.653,0,0,0,.384.446,4.636,4.636,0,0,0,1.436.983,4.392,4.392,0,0,0,2.124.348,4.631,4.631,0,0,0,2.152-.764,4.807,4.807,0,0,0,1.289-1.3A4.989,4.989,0,0,0,15.8,24.67a4.655,4.655,0,0,0-2.58-2.326.007.007,0,0,1-.005-.008q.522-6.029.776-11.943a.02.02,0,0,1,.021-.021,4.573,4.573,0,0,0,1.8-.465,4.791,4.791,0,0,0,1.863-1.652,5.009,5.009,0,0,0,.812-3.015A4.828,4.828,0,0,0,16.5,1.571,4.7,4.7,0,0,0,14.046.745a4.667,4.667,0,0,0-3.69,1.741q-.017.021-.03,0A4.62,4.62,0,0,0,8.479.566,4.421,4.421,0,0,0,4.68.314a4.636,4.636,0,0,0-2.2,1.808A4.916,4.916,0,0,0,1.672,5.2,4.691,4.691,0,0,0,5.386,9.544" transform="translate(0 0)" fill="none"/>
                        <path id="Path_701" data-name="Path 701" d="M5.386,9.544A4.691,4.691,0,0,1,1.672,5.2a4.916,4.916,0,0,1,.806-3.075A4.636,4.636,0,0,1,4.68.314a4.421,4.421,0,0,1,3.8.252,4.62,4.62,0,0,1,1.848,1.918q.013.024.03,0A4.667,4.667,0,0,1,14.046.745a4.7,4.7,0,0,1,2.453.826,4.828,4.828,0,0,1,1.983,3.67,5.009,5.009,0,0,1-.812,3.015,4.791,4.791,0,0,1-1.863,1.652,4.573,4.573,0,0,1-1.8.465.02.02,0,0,0-.021.021q-.254,5.914-.776,11.943a.007.007,0,0,0,.005.008A4.655,4.655,0,0,1,15.8,24.67a4.989,4.989,0,0,1-.337,4.968,4.807,4.807,0,0,1-1.289,1.3,4.631,4.631,0,0,1-2.152.764A4.392,4.392,0,0,1,9.9,31.355a4.636,4.636,0,0,1-1.436-.983,5.653,5.653,0,0,1-.384-.446.184.184,0,0,0-.173-.056.055.055,0,0,0-.034.016,4.772,4.772,0,0,1-1.682,1.139,4.462,4.462,0,0,1-2.526.21,4.525,4.525,0,0,1-1.737-.776A4.926,4.926,0,0,1,.887,23.722a4.678,4.678,0,0,1,2.12-1.691,4.594,4.594,0,0,1,1.505-.321.017.017,0,0,0,.017-.017q.279-4.533.566-9.09c.064-1.012.146-2.045.3-3.042A.013.013,0,0,0,5.386,9.544Z" transform="translate(0 0)" fill="#fff"/>
                    </g>
                    <path id="star-svgrepo-com" d="M20.988,5.5c.509-1.142.763-1.712,1.118-1.888a1.1,1.1,0,0,1,.977,0c.354.176.609.747,1.118,1.888L28.253,14.6a2.431,2.431,0,0,0,.342.635,1.1,1.1,0,0,0,.369.268,2.431,2.431,0,0,0,.71.129l9.9,1.045c1.243.131,1.864.2,2.141.479a1.1,1.1,0,0,1,.3.929c-.058.391-.522.81-1.45,1.646l-7.4,6.665a2.431,2.431,0,0,0-.5.522,1.1,1.1,0,0,0-.141.434,2.428,2.428,0,0,0,.1.715L34.7,37.8c.259,1.223.389,1.834.206,2.184a1.1,1.1,0,0,1-.79.574c-.39.066-.931-.246-2.014-.871l-8.624-4.974a2.433,2.433,0,0,0-.65-.313,1.1,1.1,0,0,0-.457,0,2.433,2.433,0,0,0-.65.313l-8.624,4.974c-1.083.624-1.624.937-2.014.871a1.1,1.1,0,0,1-.79-.574c-.183-.35-.054-.962.206-2.184l2.066-9.739a2.432,2.432,0,0,0,.1-.715,1.1,1.1,0,0,0-.141-.434,2.431,2.431,0,0,0-.5-.522l-7.4-6.665c-.928-.837-1.393-1.255-1.45-1.646a1.1,1.1,0,0,1,.3-.929c.277-.283.9-.348,2.141-.479l9.9-1.045a2.43,2.43,0,0,0,.71-.129,1.1,1.1,0,0,0,.369-.268,2.432,2.432,0,0,0,.342-.635Z" transform="translate(28.587 29.061)" fill="#fff" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
            </div>
            <h3 class="text-15 leading-16 md:text-16 md:leading-28 tracking-[0.1em] font-jakarta italic uppercase md:mt-[0px] lg:mt-[15px]">Combinatie advies!</h3>
            <h2 class="text-25 leading-29 md:text-18 md:leading-24 lg:text-30 lg:leading-36 md:max-w-[510px] lg:max-w-[unset]  tracking-[0.07em] font-grotesk text-[#FF91C8] uppercase mt-[10px] md:mt-[3px] lg:mt-[10px]">Maak je set <span class="text-[#FF6248]"><br>compleet</span></h2>
        </div>
        <div class="w-full md:w-[485px] lg:w-[680px] xl:w-[826px] grid grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-x-[15px] gap-y-[30px] lg:gap-x-[15px] ld:gap-y-[40px] items-start h-fit relative mt-[20px] md:mt-[0px]">
            <?php
            if( have_rows('combinatie_producten') ):
                while( have_rows('combinatie_producten') ) : the_row(); ?>
                    <?php
                    // Specificeer hier het product-ID dat je wilt ophalen
                    $product_id = get_sub_field('product'); // Vervang 123 door het gewenste product-ID

                    $loop = new WP_Query( array(
                        'post_type' => 'product',
                        'p' => $product_id,
                    ) );
                    ?>

                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <?php include get_template_directory() . '/componenten/product-item.php'; ?>
                    <?php endwhile; wp_reset_query(); ?>
                <?php
                endwhile;
            else :
            endif;
            ?>
        </div>
    </div>
    <?php endif; ?>
    

    <!-- GERELATEERDE PRODUCTEN -->
    <div class="w-full mt-8 lg:px-5">
        <h2 class="text-25 leading-25 md:text-30 md:leading-30 font-grotesk text-[#FF6248] pb-4 text-center uppercase">Shop meer</h2>
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
                        echo '<h2 class="text-25 leading-25 md:text-30 md:leading-30 font-grotesk text-[#FF6248] pb-4 text-center uppercase">Bekeken door anderen</h2>';
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
        <hr class="mt-[20px]">

        <div class="lg:flex justify-between mt-[70px] pb-[70px] lg:pb-[90px] xl:pb-[100px]">
            <div class="w-full lg:w-[322px] lg:ml-[50px]">
                <h2 class="font-grotesk text-25 md:text-30 leading-30 text-[#039C47] uppercase">Product details</h2>
                <?php if (get_field('afbeelding')): ?>   
                <div class="w-[360px] h-[219px] md:w-[718px] md:h-[437px] lg:w-[322px] lg:h-[322px] overflow-hidden mt-[30px] lg:mt-[45px]">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="min-h-full min-w-full object-cover object-center">
                </div>
                <?php endif; ?>
            </div>
            <div class="w-full lg:w-[721px] xl:w-[826px] lg:mr-[50px] xl:mr-[60px] mt-[25px] lg:mt-[unset]">
                <div class="text-15 leading-30 font-jakarta text-black w-fit text-editor">
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
    <div id="share-section" class="top-0 left-0 right-0 bottom-0 bg-[#0a1f1654] justify-center items-center z-[9999]">
    <div class="w-[360px] md:w-[686px] lg:w-[686px] xl:w-[715px] bg-white">
        <div class="w-full flex justify-end pt-[20px] pr-[20px]">
            <button id="share-close-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="13.999" height="13.999" viewBox="0 0 13.999 13.999">
                        <g id="close-svgrepo-com" transform="translate(-6.439 -6.439)">
                            <path id="Path_18" data-name="Path 18" d="M7.5,7.5,19.378,19.378" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd"></path>
                            <path id="Path_19" data-name="Path 19" d="M19.378,7.5,7.5,19.378" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd"></path>
                        </g>
                    </svg>
            </button>
        </div>
        <div class="px-[20px] lg:px-[50px] pt-[30px] pb-[50px]">
            <h2 class="font-jakarta font-bold text-15 leading-25 text-[#000] mb-[8px]">Deel deze link</h2>
            <div class="flex">
                <!-- Inputveld voor de volledige URL -->
                <input class="w-[calc(100%-52px)] h-[52px] flex items-center bg-[#f3f3f3] px-[15px]" type="text" id="urlInput" value="<?php echo htmlspecialchars("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" readonly>
                <!-- Knop om de URL naar klembord te kopiëren -->
                <button class="flex justify-center items-center h-[52px] w-[52px] bg-[#f3f3f3]" onclick="copyToClipboard()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25.7" height="20" viewBox="0 0 25.7 20">
                        <path id="link-solid" d="M41.723,31.342A6.149,6.149,0,0,0,33.8,21.991l-.068.047a1.359,1.359,0,1,0,1.582,2.211l.068-.047A3.427,3.427,0,0,1,39.8,29.416L35.025,34.2a3.427,3.427,0,0,1-5.214-4.414l.047-.068a1.359,1.359,0,0,0-2.211-1.582L27.6,28.2a6.146,6.146,0,0,0,9.347,7.918Zm-22.1-1A6.149,6.149,0,0,0,27.549,39.7l.068-.047a1.359,1.359,0,1,0-1.582-2.211l-.068.047a3.429,3.429,0,0,1-4.414-5.218l4.771-4.776a3.429,3.429,0,0,1,5.214,4.418l-.047.068A1.359,1.359,0,1,0,33.7,33.562l.047-.068A6.147,6.147,0,0,0,24.4,25.572Z" transform="translate(-17.825 -20.845)"/>
                    </svg>
                </button>
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
function copyToClipboard() {
    // Selecteer het inputveld
    var input = document.getElementById("urlInput");
    // Selecteer de tekst in het inputveld
    input.select();
    // Kopieer de geselecteerde tekst naar het klembord
    document.execCommand("copy");
    // Geef feedback dat de URL is gekopieerd
    alert("URL is gekopieerd naar klembord: " + input.value);
}
</script>

<script>
document.getElementById("share-button").addEventListener("click", function() {
    // Toggle de klassen in het hoofdelement
    document.querySelector("main").classList.toggle("share-open");
    document.querySelector("main").classList.toggle("share-close");
});

document.getElementById("share-close-button").addEventListener("click", function() {
    // Toggle de klassen in het hoofdelement
    document.querySelector("main").classList.toggle("share-open");
    document.querySelector("main").classList.toggle("share-close");
});
document.getElementById("share-button-mobile").addEventListener("click", function() {
    // Toggle de klassen in het hoofdelement
    document.querySelector("main").classList.toggle("share-open");
    document.querySelector("main").classList.toggle("share-close");
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
