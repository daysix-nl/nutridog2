<?php 
/**
 * The template for displaying the header
 * 
 * @package Day Six theme
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="preload" as="font" href="/wp-content/themes/nutridog2/fonts/CyGroteskGrandDark.woff2" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" as="font" href="/wp-content/themes/nutridog2/fonts/Wedges Italic.woff2" crossorigin="anonymous">
    <link rel="preload" as="font" href="/wp-content/themes/nutridog2/fonts/Wedges.woff2" type="font/woff2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>

    <!-- /**
    * @license
    * MyFonts Webfont Build ID 805648
    *
    * The fonts listed in this notice are subject to the End User License
    * Agreement(s) entered into by the website owner. All other parties are
    * explicitly restricted from using the Licensed Webfonts(s).
    *
    * You may obtain a valid license from one of MyFonts official sites.
    * http://www.fonts.com
    * http://www.myfonts.com
    * http://www.linotype.com
    *
    */ -->

</head>
<body <?php body_class( 'page-block' ); ?>>
<header class="fixed w-screen z-[9999]">
<section class="h-[34px] w-full bg-[#C2F0A0] flex justify-between">
    <div class="h-[34px] flex items-center pl-4">
        <!-- <div class="flex items-center pr-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="11.646" height="9.459" viewBox="0 0 11.646 9.459">
                <path id="Path_354" data-name="Path 354" d="M50,1299.839l2.627,2.715,5.486-5.878" transform="translate(-48.229 -1294.909)" fill="none" stroke="#18af18" stroke-linecap="round" stroke-width="2.5"/>
            </svg>
            <p class="font-jakarta text-12 leading-12 ml-[15px]">Voor 15:00 besteld de volgende werkdag in huis</p>
        </div>
        <div class="flex items-center pr-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="11.646" height="9.459" viewBox="0 0 11.646 9.459">
                <path id="Path_354" data-name="Path 354" d="M50,1299.839l2.627,2.715,5.486-5.878" transform="translate(-48.229 -1294.909)" fill="none" stroke="#18af18" stroke-linecap="round" stroke-width="2.5"/>
            </svg>
            <p class="font-jakarta text-12 leading-12 ml-[15px]">Gratis verzending vanaf 50 euro</p>
        </div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="11.646" height="9.459" viewBox="0 0 11.646 9.459">
                <path id="Path_354" data-name="Path 354" d="M50,1299.839l2.627,2.715,5.486-5.878" transform="translate(-48.229 -1294.909)" fill="none" stroke="#18af18" stroke-linecap="round" stroke-width="2.5"/>
            </svg>
            <p class="font-jakarta text-12 leading-12 ml-[15px]">Uitgebreid assortiment en voorraad speciaal voor honden</p>
        </div> -->
    </div>
    <div class="h-[34px] flex items-center pr-4">
        <p class="font-jakarta text-12 leading-12">Klantenservice</p>
    </div>
</section>
<section class="h-[77px] w-full bg-white grid grid-cols-3 items-center px-5">
    <div class="flex justify-between md:w-[320px]">
        <a href="/shop  " class="font-jakarta font-normal text-black text-15 leading-15 hidden md:block">Assortiment</a>
        <a href="" class="font-jakarta font-normal text-black text-15 leading-15 hidden lg:block">Winter</a>
        <a href="" class="font-jakarta font-normal text-black text-15 leading-15 hidden lg:block">Aanbiedingen</a>
    </div>
    <div class="flex justify-center">
        <!-- <img src="/wp-content/themes/nutridog/img/local/logo.png" alt="" class="h-[30px]"> -->
    </div>
    <div class="flex justify-end">
        <div class=" flex justify-between">
            <a href="" class="hidden md:block">
                <svg id="Group_200" data-name="Group 200" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path id="search" d="M10.242,2a8.223,8.223,0,0,1,6.137,13.72L20,19.009,19.069,20,15.4,16.647A8.233,8.233,0,1,1,10.242,2Zm0,15.117a6.887,6.887,0,1,0-6.9-6.887,6.892,6.892,0,0,0,6.9,6.887Z" transform="translate(-2.003 -2)" fill="#121212"/>
                </svg>
            </a>
            <a href="" class="hidden md:block">
                <svg xmlns="http://www.w3.org/2000/svg" width="19.641" height="17.28" viewBox="0 0 19.641 17.28">
                    <path id="love" d="M13.892,4A5.658,5.658,0,0,0,9.77,5.789,5.648,5.648,0,0,0,0,9.648c0,5.624,9.071,11.144,9.465,11.361a.611.611,0,0,0,.629,0c.376-.217,9.447-5.737,9.447-11.361A5.655,5.655,0,0,0,13.892,4ZM9.77,19.767C8.192,18.759,1.221,14.051,1.221,9.648A4.427,4.427,0,0,1,9.27,7.105a.611.611,0,0,0,1,0,4.427,4.427,0,0,1,8.051,2.543C18.319,14.048,11.349,18.756,9.77,19.767Z" transform="translate(0.05 -3.875)" fill="#121212" stroke="#121212" stroke-width="0.1"/>
                </svg>
            </a>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="20.34" height="18.387" viewBox="0 0 20.34 18.387">
                    <path id="shopping-bag" d="M23.136,9.943a.693.693,0,0,0-.536-.256H19.044A5.308,5.308,0,0,0,13.841,5h-1.4a5.308,5.308,0,0,0-5.2,4.687H3.681a.692.692,0,0,0-.544.254.736.736,0,0,0-.156.594L4.858,21.458A2.3,2.3,0,0,0,7.1,23.387H19.177a2.3,2.3,0,0,0,2.246-1.932L23.3,10.534A.736.736,0,0,0,23.136,9.943Zm-10.7-3.5h1.4a3.886,3.886,0,0,1,3.787,3.245H8.652A3.886,3.886,0,0,1,12.439,6.442ZM20.046,21.2a.887.887,0,0,1-.869.743H7.1a.887.887,0,0,1-.865-.739L4.514,11.129H21.766Z" transform="translate(-2.969 -5)" fill="#121212"/>
                </svg>
            </a>
        </div>
    </div>
</section>

</header>
