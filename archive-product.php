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
<div class="max-w-[354px] md:max-w-[725px] lg:max-w-[1168px] xl:max-w-[1326px] mx-auto pb-[85px] xl:pb-[105px]">

   

    <div class="hidden md:flex justify-end">
        <?php echo do_shortcode('[fe_open_button]'); ?>
    </div>


    <div class="flex justify-between">
        <!-- SIDEBAR -->
        <div class="hidden lg:block lg:w-[222px] filter">
             <?php echo do_shortcode('[fe_chips]'); ?>
            <?php echo do_shortcode('[fe_widget]'); ?>
        </div>

        <!-- PRODUCTEN -->
        <div class="w-full max-w-[354px] md:max-w-[725px] lg:max-w-[898px] xl:max-w-[1028px] grid grid-cols-2 md:grid-cols-3 gap-x-[7px] gap-y-[30px] lg:gap-x-[30px] ld:gap-y-[40px] items-start h-fit">
           <div class="col-span-2 md:col-span-3 w-full hidden justify-end lg:flex items-center">
           
              <?php if ( is_active_sidebar( 'filter-sidebar' ) ) { ?>
                    <?php dynamic_sidebar( 'filter-sidebar' ); ?>
                <?php } ?>
           </div>
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

        <!-- PRODUCT -->
        <div class="product-item h-fit relative">
            <a class="w-full flex justify-center" href="<?php the_permalink(); ?>">
                <div class="aspect-square w-full bg-[#fff] flex justify-center items-center rounded-[10px] overflow-hidden lg:relative">
                
                    <img src="<?php echo get_the_post_thumbnail_url($product->get_id()); ?>" alt="" class="h-ful w-auto max-h-[70%] px-2 mix-blend-multiply">
                
                    </div>
                     </a>
                    <a href="<?php the_permalink(); ?>">
                        <div class="flex justify-between items-end w-full">
                            <p class="font-jakarta text-15 leading-16 font-extrabold text-[#000]"><?php echo $product->get_price_html(); ?></p>
                            <div class="h-3 w-3 rounded-full bg-[#FFF2E2] flex items-center justify-center font-jakarta text-15 leading-15 font-extrabold text-[#000]"><span class="mb-[5px]">+</span></div>
                        </div>
                        
                        <h2 class="font-jakarta text-14 leading-20 text-[#2B2828] pt-[10px] pb-[10px] font-medium"><?php the_title(); ?></h2>            
                    </a>
                </div>

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



<?php
get_footer( 'shop' ); ?>
