<?php $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>


<div class="product-item h-fit relative">
    <button class="add-favorite absolute top-1 right-1 z-10 <?php echo str_contains($actual_link, 'verlanglijst') ? "close-button-favorite" : "" ?> " id-data="<?php echo $product->get_id(); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="12.128" height="12.128" viewBox="0 0 12.128 12.128">
            <g id="Group_439" data-name="Group 439" transform="translate(-1369.086 -174.086)" opacity="0.754">
                <line id="Line_227" data-name="Line 227" x1="9.3" y2="9.3" transform="translate(1370.5 175.5)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="2"/>
                <line id="Line_228" data-name="Line 228" x2="9.3" y2="9.3" transform="translate(1370.5 175.5)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="2"/>
            </g>
        </svg>
    </button>
    <a class="w-full flex justify-center" href="<?php the_permalink(); ?>">
        <div class="aspect-square w-full bg-[#F2FBFF] flex justify-center items-center rounded-[10px] overflow-hidden relative">
            <img src="<?php echo get_the_post_thumbnail_url($product->get_id()); ?>" alt="" class="h-[100%] w-auto max-h-[calc(100%-80px)] md:max-h-[calc(100%-100px)] px-2 mix-blend-multiply">
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