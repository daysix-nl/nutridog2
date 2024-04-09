


<div class="product-item h-fit relative">

    <a class="w-full flex justify-center" href="<?php the_permalink(); ?>">
        <div class="aspect-square w-full bg-[#F2FBFF] flex justify-center items-center rounded-[10px] overflow-hidden relative">
            <img src="<?php echo get_the_post_thumbnail_url($product->get_id()); ?>" alt="" class="packshot mix-blend-multiply">
            <div class="absolute bottom-[8px] right-[8px] h-3 w-3 rounded-full bg-[#C2F0A0] flex items-center justify-center font-jakarta text-15 leading-15 font-extrabold text-[#000]"><span class="mb-[5px]">+</span></div>
        </div>
        </a>
        <a href="<?php the_permalink(); ?>">
        <div class="flex justify-between items-end w-full mt-[15px]">
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
                        <p class="font-jakarta text-15 leading-16 font-extrabold text-[#FF6248] mb-[3px]">Tijdelijk uitverkocht</p>
                    <?php
                    } else { ?>
                        <p class="font-jakarta text-15 leading-16 font-extrabold text-[#000] mb-[3px]"><?php echo $product->get_price_html(); ?></p>
                    <?php
                    }
                } else {
                    // Voor niet-variabele producten, controleer voorraad op dezelfde manier als eerder
                    $voorraad = $product->get_stock_quantity();
                    if ($voorraad <= 0) { ?>
                        <p class="font-jakarta text-15 leading-16 font-extrabold text-[#FF6248] mb-[3px]">Tijdelijk uitverkocht</p>
                    <?php
                    } else { ?>
                        <p class="font-jakarta text-15 leading-16 font-extrabold text-[#000] mb-[3px]"><?php echo $product->get_price_html(); ?></p>
                    <?php
                    }
                }
            } else {
                // WooCommerce is niet actief
                echo "<p>WooCommerce is niet geïnstalleerd of geactiveerd.</p>";
            }
            ?>
        </div>
        <h2 class="font-jakarta text-14 leading-20 text-[#2B2828] pt-[8px] font-medium"><?php the_title(); ?></h2>            
    </a>
</div>