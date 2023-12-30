<!-- PRODUCT -->
<div class="product-item h-fit relative">
        <a class="w-full flex justify-center" href="<?php the_permalink(); ?>">
        <div class="aspect-square w-full bg-[#F2FBFF] flex justify-center items-center rounded-[10px] overflow-hidden relative">
            <img src="<?php echo get_the_post_thumbnail_url($product->get_id()); ?>" alt="" class="h-[100%] w-auto max-h-[calc(100%-80px)] md:max-h-[calc(100%-100px)] px-2 mix-blend-multiply">
            <div class="absolute top-[4px] right-[4px]"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></div>
            <div class="absolute bottom-[8px] right-[8px] h-3 w-3 rounded-full bg-[#C2F0A0] flex items-center justify-center font-jakarta text-15 leading-15 font-extrabold text-[#000]"><span class="mb-[5px]">+</span></div>
        </div>
        </a>
        <a href="<?php the_permalink(); ?>">
        <div class="flex justify-between items-end w-full mt-[15px]">
            <p class="font-jakarta text-15 leading-16 font-extrabold text-[#000] mb-[3px]"><?php echo $product->get_price_html(); ?></p>
        </div>
        <h2 class="font-jakarta text-14 leading-20 text-[#2B2828] pt-[8px] font-medium"><?php the_title(); ?></h2>            
    </a>
</div>