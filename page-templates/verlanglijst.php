<?php
/**
 * Template name: Verlanglijst
 */


 get_header(); ?>

<main>
<div class="max-w-[354px] md:max-w-[725px] lg:max-w-[1168px] xl:max-w-[1330px] mx-auto pb-[85px] xl:pb-[105px]">
    <div class="w-full max-w-[354px] md:max-w-[725px] lg:max-w-[898px] xl:max-w-[1082px] grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-[15px] gap-y-[30px] lg:gap-x-[15px] ld:gap-y-[40px] items-start h-fit">
        <?php

        if (isset($_COOKIE['favoriteProducts']) && !empty($_COOKIE['favoriteProducts'])) {

            $favoriteProductIds = json_decode(stripslashes($_COOKIE['favoriteProducts']), true);

            if (is_array($favoriteProductIds)) {

                $validProductIds = [];

                foreach ($favoriteProductIds as $productId) {
                    if (wc_get_product($productId) !== false) {
                        $validProductIds[] = $productId;
                    }
                }


                if (!empty($validProductIds)) {

                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'post__in' => $validProductIds,
                        'orderby' => 'post__in'
                    );

                    $products_query = new WP_Query($args);

                    if ($products_query->have_posts()) :
                        while ($products_query->have_posts()) : $products_query->the_post();

                            $product = wc_get_product(get_the_ID());
                            include get_template_directory() . '/componenten/product-item.php';

                        endwhile;

                        wp_reset_postdata();
                    else :
                        echo 'Geen producten gevonden';
                    endif;
                } else {
                    echo 'Geen geldige favoriete producten';
                }
            } else {
                echo 'Fout bij het decoderen van favoriete producten';
            }
        } else {
            echo 'Geen favoriete producten cookie gevonden of cookie is leeg';
        }
        ?>
    </div>
</div>

</main>
<?php get_footer('nofooter'); ?>



