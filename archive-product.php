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
<div class="max-w-[354px] md:max-w-[725px] lg:max-w-[1168px] xl:max-w-[1330px] mx-auto pb-[85px] xl:pb-[105px]">

   

    <!-- <div class="flex justify-end">
        <?php echo do_shortcode('[fe_open_button]'); ?>
    </div> -->


    <div class="flex justify-between">
        <!-- FILTER -->
        <div class="hidden lg:block lg:w-[214px] filter">
         
            <?php echo do_shortcode('[fe_widget]'); ?>
        </div>

        <!-- PRODUCTEN -->
        <div class="w-full max-w-[354px] md:max-w-[725px] lg:max-w-[898px] xl:max-w-[1082px] grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-[15px] gap-y-[30px] lg:gap-x-[15px] ld:gap-y-[40px] items-start h-fit">
           <!-- FILTER SIDEBAR -->
            <div class="col-span-2 md:col-span-3 lg:col-span-4 w-full hidden justify-end lg:flex justify-between items-center">
              <?php if ( is_active_sidebar( 'filter-sidebar' ) ) { ?>
                    <?php dynamic_sidebar( 'filter-sidebar' ); ?>
                <?php } ?>
           </div>
           <!-- PRODUCTEN -->
            <?php
            // Aangepaste query om alle producten op te halen
            $args = array(
                'post_type' => 'product', // Het posttype van producten
                'posts_per_page' => -1,   // Toon alle producten
            );

            $products_query = new WP_Query($args);

            if ($products_query->have_posts()) :
                while ($products_query->have_posts()) : $products_query->the_post();

            // Informatie over het product ophalen
            $product = wc_get_product(get_the_ID());
            
            ?>
            <?php include get_template_directory() . '/componenten/product-item.php'; ?>

            <?php
            endwhile;

            // Herstel de oorspronkelijke query
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
