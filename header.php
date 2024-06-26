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
    <meta name="facebook-domain-verification" content="nvtdvfw9dfjni0mv7vcwrik0z4wxp1" />
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
  
    <title><?php
        // Check if Filter Everything plugin function exists
        if ( function_exists('flrt_get_seo_data') ) {
            $seo_title = flrt_get_seo_data('title'); // Get SEO title
            if ( $seo_title ) {
                echo esc_html( $seo_title ) . ' | ';
            }
        }

        wp_title( '|', true, 'right' );
    ?></title>
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
<body <?php body_class( 'page-block menu-non-active filter-scroll-notactive' ); ?>>
<header class="fixed w-screen z-[9999]">
<section class="h-[34px] w-full bg-[#C2F0A0] justify-between hidden lg:flex">
    <div class="h-[34px] lg:flex items-center pl-4 hidden">
        <div class="flex items-center pr-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="11.646" height="9.459" viewBox="0 0 11.646 9.459">
                <path id="Path_354" data-name="Path 354" d="M50,1299.839l2.627,2.715,5.486-5.878" transform="translate(-48.229 -1294.909)" fill="none" stroke="#18af18" stroke-linecap="round" stroke-width="2.5"/>
            </svg>
            <p class="font-jakarta text-12 leading-12 ml-[15px]">Voor 17:00 besteld de volgende werkdag in huis</p>
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
        </div>
    </div>
    <div class="h-[34px] lg:flex items-center pr-4 hidden">
        <a href="/support" class="font-jakarta text-12 leading-12">Klantenservice</a>
    </div>
</section>
<section class="h-[34px] w-full bg-[#C2F0A0] justify-between flex lg:hidden swiper swiperhero overflow-x-hidden relative">
    <div id="scroll-text"  class="w-full swiper-wrapper">
        <div class="h-[34px] flex items-center w-max space-x-3 swiper-slide">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="11.646" height="9.459" viewBox="0 0 11.646 9.459">
                    <path id="Path_354" data-name="Path 354" d="M50,1299.839l2.627,2.715,5.486-5.878" transform="translate(-48.229 -1294.909)" fill="none" stroke="#18af18" stroke-linecap="round" stroke-width="2.5"/>
                </svg>
                <p class="font-jakarta text-12 leading-12 ml-[15px]">Voor 17:00 besteld de volgende werkdag in huis</p>
            </div>
            <div class="flex items-center">
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
            </div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="11.646" height="9.459" viewBox="0 0 11.646 9.459">
                    <path id="Path_354" data-name="Path 354" d="M50,1299.839l2.627,2.715,5.486-5.878" transform="translate(-48.229 -1294.909)" fill="none" stroke="#18af18" stroke-linecap="round" stroke-width="2.5"/>
                </svg>
                <p class="font-jakarta text-12 leading-12 ml-[15px]">Voor 17:00 besteld de volgende werkdag in huis</p>
            </div>
            <div class="flex items-center">
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
            </div>
        </div>
    </div>
</section>

<section class="h-[77px] w-full bg-white flex justify-between items-center px-[15px] md:px-[25px] lg:px-5 border-b-[1px] border-[#DDDDDD]">
    <div class="flex justify-between w-[65px] md:w-[167px] lg:w-[320px]">
        <button id="menu" class="h-[40px] w-[42px] lg:hidden flex flex-col justify-center items-center relative md:mr-[25px]">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <!-- <a href="/producten" class="font-jakarta font-normal text-black text-15 leading-15 hidden md:flex navbar-dropdown-btn space-x-2 items-center hide-in-menu">
            <span>Assortiment</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="8.716" height="5.26" viewBox="0 0 8.716 5.26">
                <path id="Down_Arrow_3_" d="M23.858,44.208a.35.35,0,0,1-.248-.1L20.1,40.6a.351.351,0,0,1,.5-.5l3.259,3.259L27.117,40.1a.351.351,0,0,1,.5.5l-3.507,3.507a.35.35,0,0,1-.248.1Z" transform="translate(-19.5 -39.448)" fill="#fff" stroke="#000" stroke-width="1"/>
            </svg>
        </a> -->
        <a href="/producten" class="font-jakarta font-normal text-black text-15 leading-15 hidden md:flex items-center hide-in-menu">Assortiment</a>
        <a href="/producten/seizoen-voorjaar/" class="font-jakarta font-normal text-black text-15 leading-15 hidden lg:block">Voorjaar</a>
        <a href="/producten/aanbieding-yes/" class="font-jakarta font-normal text-black text-15 leading-15 hidden lg:block">Aanbiedingen</a>
    </div>
    <a href="/" class="flex justify-center w-[143.448px] mx-auto">
       <svg xmlns="http://www.w3.org/2000/svg" width="143.448" height="27.813" viewBox="0 0 143.448 27.813">
        <g id="Screenshot_2023-12-18_at_11.41.55" data-name="Screenshot 2023-12-18 at 11.41.55" transform="translate(-37.27 -19.187)">
            <g id="Group_336" data-name="Group 336" transform="translate(37.27 19.187)">
            <path id="Path_711" data-name="Path 711" d="M334.11,28.079a3.533,3.533,0,0,0,2.425-1.492,5.09,5.09,0,0,0,.158-5.539,4.068,4.068,0,0,0-4.8-1.653,3.127,3.127,0,0,0-1.92,1.407.11.11,0,0,1-.184.039c-3.816-2.751-7.757,1.036-5.974,5.091a3.647,3.647,0,0,0,2.7,2.158.222.222,0,0,1,.179.218q.308,4.632.824,9.985a.047.047,0,0,1-.047.052c-4.726.1-4.7,8.309.2,8.518a3.645,3.645,0,0,0,3.715-2.034q.08-.158.21-.036a4.042,4.042,0,0,0,2.428,1.417q3.557.4,4.5-2.658a5.413,5.413,0,0,0,.054-2.63,3.812,3.812,0,0,0-3.51-3.1.258.258,0,0,1-.251-.264c-.13-1.808-.461-3.573-.552-5.4q-.093-1.912-.3-3.9a.149.149,0,0,1,.145-.184" transform="translate(-249.252 -19.187)" fill="none"/>
            <path id="Path_712" data-name="Path 712" d="M460.118,45.245c4.757.517,9.2-4.5,9.932-11.211s-2.537-12.566-7.293-13.082-9.2,4.5-9.932,11.211,2.537,12.566,7.293,13.082" transform="translate(-345.088 -20.467)" fill="none"/>
            <path id="Path_713" data-name="Path 713" d="M393.215,25.348a13.529,13.529,0,0,0-5.34-.979,4.793,4.793,0,0,0-2.371.472,4.643,4.643,0,0,0-2.324,3.435,50.487,50.487,0,0,0,.155,10.314,49.644,49.644,0,0,0,.92,6.985c.339,1.6,1.645,3.749,3.547,3.573,4.347-.4,8.138-1.865,10.342-5.739a14.561,14.561,0,0,0,1.4-9.462,11.192,11.192,0,0,0-6.334-8.6" transform="translate(-293.4 -23.026)" fill="none"/>
            <path id="Path_714" data-name="Path 714" d="M533.643,42.094a1.12,1.12,0,0,1-.262.4.424.424,0,0,1-.529.054c-1.2-.782-1.583-2.669-1.456-3.969.207-2.093,1.189-6.819,4.441-5.368,1,.448,1.876,1.371,3.057.87a3.006,3.006,0,0,0,1.909-3.1,5.393,5.393,0,0,0-2.1-4.132c-4.6-3.884-10.646-1.876-12.969,3.394-1.285,2.912-1.381,6.544-1.409,9.842a9.258,9.258,0,0,0,1.192,4.855,8.017,8.017,0,0,0,5.536,4.075c5.684,1.106,10.43-3.207,10.531-8.845q.054-3.021-2.728-3.412a16.362,16.362,0,0,0-4.15,0,2.444,2.444,0,0,0-2.1,1.749c-.5,1.4.443,2.158,1.013,3.251a.4.4,0,0,1,.018.337" transform="translate(-398.142 -23.359)" fill="none"/>
            <path id="Path_715" data-name="Path 715" d="M206.793,33.983a17.2,17.2,0,0,0,3-.891,3.862,3.862,0,0,0,1.7-3.878c-.148-2.2-1.961-3.293-3.979-3.231q-4.008.127-8.3.461a7.2,7.2,0,0,0-1.873.365,3.751,3.751,0,0,0-2.643,2.876,3.686,3.686,0,0,0,1.741,3.808,9.367,9.367,0,0,0,2.422.847.508.508,0,0,1,.35.448q.073,1.041.062,2.119a38.026,38.026,0,0,0,.326,4.114c.153,1.57.422,3.08.565,4.679.212,2.389,1.187,5.254,4.086,4.93a3.65,3.65,0,0,0,3.288-4.249q-.653-6.026-.938-11.459a3.263,3.263,0,0,1,.052-.772.2.2,0,0,1,.145-.168" transform="translate(-153.877 -24.22)" fill="none"/>
            <path id="Path_716" data-name="Path 716" d="M134.134,41.474c-.984.041-.86-2-.808-2.573q.306-3.371.617-6.378a6.818,6.818,0,0,0-.876-4.511,3.1,3.1,0,0,0-1.881-1.531,5.267,5.267,0,0,0-2.311.083c-1.542.554-2.249,2.145-2.536,3.663a49.8,49.8,0,0,0-.86,7.987,31.1,31.1,0,0,0,.085,4.254,10.823,10.823,0,0,0,1.466,4.156,7.435,7.435,0,0,0,6.485,3.726c3.656.15,6.36-2.192,8.016-5.35a11.67,11.67,0,0,0,1.168-4.143,49,49,0,0,0-.036-9.71q-.031-.4-.225-1.539c-.2-1.148-.554-1.886-1.637-2.241a3.007,3.007,0,0,0-2.878.4,4.35,4.35,0,0,0-1.832,3.114q-.342,2.953-.65,6.016a25.7,25.7,0,0,1-.531,3.956.761.761,0,0,1-.775.622" transform="translate(-102.607 -24.525)" fill="none"/>
            <path id="Path_717" data-name="Path 717" d="M262.521,45.115q.036-.448.293-.078,1.35,1.961,2.738,3.891a4.3,4.3,0,0,0,2.894,1.93,2.41,2.41,0,0,0,3.018-1.915,4.872,4.872,0,0,0-1.272-5.042,14.768,14.768,0,0,1-1.321-1.5.528.528,0,0,1,.078-.8,24.378,24.378,0,0,0,1.749-1.7,7.546,7.546,0,0,0,.987-8.441c-1.829-3.65-5.353-4.565-9.254-4.821-2.156-.142-4.156.567-5.106,2.378a2.419,2.419,0,0,0-.256.806c-.251,1.865-.329,3.687-.733,5.536a55.269,55.269,0,0,0-1.171,9.169c-.119,2.443-.034,5.581,3.112,6.013,2.555.35,4.112-1.821,4.176-4.132q.016-.648.07-1.285" transform="translate(-198.69 -24.688)" fill="none"/>
            <path id="Path_718" data-name="Path 718" d="M50.54,37.153a.213.213,0,0,1-.376.028q-1.409-1.474-3.482-3.876-1.479-1.713-3.057-3.329c-1.319-1.35-2.161-2.13-4.078-1.8-1.542.269-2.285,1.876-2.277,3.3.016,2.941.635,5.746.9,8.643q.207,2.275.51,4.492c.342,2.479-.016,7.482,3.56,7.91q2.847.342,3.759-1.948a6.307,6.307,0,0,0,.231-2.635,36.29,36.29,0,0,1-.073-3.858.216.216,0,0,1,.116-.185.222.222,0,0,1,.221.009,5.117,5.117,0,0,1,.956.8c1.845,1.979,3.56,4.244,5.9,5.689,3.117,1.922,6.7.909,6.228-3.34-.2-1.8-.764-3.495-.922-5.267a52.374,52.374,0,0,1,.106-9.329,18.4,18.4,0,0,0,.052-2.3,2.881,2.881,0,0,0-.907-2.021A4.216,4.216,0,0,0,53.822,26.8c-3.15.637-3.381,3.6-3.246,6.244q.1,1.85.1,3.593a.867.867,0,0,1-.132.513" transform="translate(-37.27 -24.758)" fill="none"/>
            <path id="Path_720" data-name="Path 720" d="M483.2,64.048c.576.065,1.166-.979,1.317-2.332s-.192-2.5-.768-2.565-1.166.979-1.317,2.332.192,2.5.768,2.565" transform="translate(-367.074 -48.795)" fill="none"/>
            <path id="Path_721" data-name="Path 721" d="M412.035,60.395q-.122-.016-.109.106a45.483,45.483,0,0,1,.238,4.9q-.005.744.611.329a2.815,2.815,0,0,0,1.109-2.14,3.094,3.094,0,0,0,0-.681c-.109-1.031-.668-2.35-1.852-2.513" transform="translate(-314.86 -49.718)" fill="none"/>
            <path id="Path_722" data-name="Path 722" d="M286.58,56.222l-.231,3.283a.067.067,0,0,0,.065.073l.111.008a1.163,1.163,0,0,0,.928-.394,1.761,1.761,0,0,0,.447-1.077l.021-.3a1.44,1.44,0,0,0-1.155-1.648l-.114-.008a.067.067,0,0,0-.073.062" transform="translate(-221.818 -46.58)" fill="none"/>
            </g>
            <path id="Path_724" data-name="Path 724" d="M333.965,28.263q.207,1.985.3,3.9c.091,1.826.422,3.591.552,5.4a.258.258,0,0,0,.251.264,3.812,3.812,0,0,1,3.51,3.1,5.413,5.413,0,0,1-.054,2.63q-.94,3.055-4.5,2.658a4.042,4.042,0,0,1-2.428-1.417q-.13-.122-.21.036a3.645,3.645,0,0,1-3.715,2.034c-4.9-.21-4.925-8.423-.2-8.518a.047.047,0,0,0,.047-.052q-.516-5.353-.824-9.985a.222.222,0,0,0-.179-.218,3.647,3.647,0,0,1-2.7-2.158c-1.782-4.055,2.158-7.842,5.974-5.091a.11.11,0,0,0,.184-.039,3.127,3.127,0,0,1,1.92-1.407,4.068,4.068,0,0,1,4.8,1.653,5.09,5.09,0,0,1-.158,5.539,3.533,3.533,0,0,1-2.425,1.492A.149.149,0,0,0,333.965,28.263Z" transform="translate(-211.982)"/>
            <path id="Path_725" data-name="Path 725" d="M460.118,45.245c-4.757-.517-8.022-6.374-7.293-13.082S458,20.434,462.757,20.951s8.022,6.374,7.293,13.082-5.176,11.728-9.932,11.211Zm1.1-9.525c.576.065,1.166-.979,1.317-2.332s-.192-2.5-.768-2.565-1.166.979-1.317,2.332.192,2.5.768,2.565Z" transform="translate(-307.819 -1.28)"/>
            <path id="Path_726" data-name="Path 726" d="M393.215,25.348a11.192,11.192,0,0,1,6.334,8.6,14.561,14.561,0,0,1-1.4,9.462c-2.2,3.873-6,5.334-10.342,5.739-1.9.176-3.207-1.977-3.547-3.573a49.644,49.644,0,0,1-.92-6.985,50.487,50.487,0,0,1-.155-10.314A4.643,4.643,0,0,1,385.5,24.84a4.793,4.793,0,0,1,2.371-.472A13.529,13.529,0,0,1,393.215,25.348Zm-2.64,8.355q-.122-.016-.109.106a45.475,45.475,0,0,1,.238,4.9q-.005.744.611.329a2.815,2.815,0,0,0,1.109-2.14,3.1,3.1,0,0,0,0-.681C392.318,35.185,391.759,33.866,390.575,33.7Z" transform="translate(-256.13 -3.839)"/>
            <path id="Path_727" data-name="Path 727" d="M533.625,41.757c-.57-1.093-1.516-1.852-1.013-3.251a2.444,2.444,0,0,1,2.1-1.749,16.362,16.362,0,0,1,4.15,0q2.782.391,2.728,3.412c-.1,5.638-4.847,9.951-10.531,8.845a8.017,8.017,0,0,1-5.536-4.075,9.258,9.258,0,0,1-1.192-4.855c.029-3.3.124-6.93,1.409-9.842,2.324-5.27,8.373-7.277,12.969-3.394a5.393,5.393,0,0,1,2.1,4.132,3.006,3.006,0,0,1-1.909,3.1c-1.181.5-2.054-.422-3.057-.871-3.251-1.451-4.233,3.275-4.441,5.368-.127,1.3.256,3.187,1.456,3.969a.424.424,0,0,0,.529-.054,1.12,1.12,0,0,0,.262-.4A.4.4,0,0,0,533.625,41.757Z" transform="translate(-360.873 -4.173)"/>
            <path id="Path_728" data-name="Path 728" d="M206.648,34.152a3.263,3.263,0,0,0-.052.772q.285,5.433.938,11.459a3.65,3.65,0,0,1-3.288,4.249c-2.9.324-3.873-2.542-4.086-4.93-.142-1.6-.412-3.109-.565-4.679a38.026,38.026,0,0,1-.326-4.114q.01-1.078-.062-2.119a.508.508,0,0,0-.35-.448,9.366,9.366,0,0,1-2.422-.847,3.686,3.686,0,0,1-1.741-3.808,3.751,3.751,0,0,1,2.643-2.876,7.2,7.2,0,0,1,1.873-.365q4.293-.334,8.3-.461c2.018-.062,3.832,1.026,3.979,3.231a3.862,3.862,0,0,1-1.7,3.878,17.2,17.2,0,0,1-3,.891A.2.2,0,0,0,206.648,34.152Z" transform="translate(-116.607 -5.033)"/>
            <path id="Path_729" data-name="Path 729" d="M134.134,41.474a.761.761,0,0,0,.775-.622,25.7,25.7,0,0,0,.531-3.956q.308-3.062.65-6.016a4.35,4.35,0,0,1,1.832-3.114,3.007,3.007,0,0,1,2.878-.4c1.083.355,1.44,1.093,1.637,2.241q.194,1.14.225,1.539a49,49,0,0,1,.036,9.71A11.67,11.67,0,0,1,141.531,45c-1.656,3.158-4.36,5.5-8.016,5.35a7.435,7.435,0,0,1-6.485-3.726,10.823,10.823,0,0,1-1.466-4.156,31.1,31.1,0,0,1-.085-4.254,49.8,49.8,0,0,1,.86-7.987c.288-1.518.995-3.109,2.536-3.663a5.267,5.267,0,0,1,2.311-.083,3.1,3.1,0,0,1,1.881,1.531,6.818,6.818,0,0,1,.876,4.511q-.311,3.008-.617,6.378C133.274,39.477,133.15,41.516,134.134,41.474Z" transform="translate(-65.337 -5.338)"/>
            <path id="Path_730" data-name="Path 730" d="M262.521,45.115q-.054.637-.07,1.285c-.065,2.311-1.622,4.482-4.176,4.132-3.145-.433-3.231-3.57-3.112-6.013a55.272,55.272,0,0,1,1.171-9.169c.4-1.85.482-3.671.733-5.536a2.419,2.419,0,0,1,.256-.806c.951-1.811,2.951-2.521,5.106-2.378,3.9.256,7.425,1.171,9.254,4.821a7.546,7.546,0,0,1-.987,8.441,24.381,24.381,0,0,1-1.749,1.7.528.528,0,0,0-.078.8,14.772,14.772,0,0,0,1.321,1.5,4.872,4.872,0,0,1,1.272,5.042,2.41,2.41,0,0,1-3.018,1.915,4.3,4.3,0,0,1-2.894-1.93q-1.389-1.93-2.738-3.891Q262.558,44.666,262.521,45.115Zm.93-10.785-.231,3.283a.067.067,0,0,0,.065.073l.111.008a1.163,1.163,0,0,0,.928-.394,1.762,1.762,0,0,0,.447-1.077l.021-.3a1.44,1.44,0,0,0-1.155-1.648l-.114-.008a.067.067,0,0,0-.073.062Z" transform="translate(-161.42 -5.501)"/>
            <path id="Path_731" data-name="Path 731" d="M50.54,37.153a.867.867,0,0,0,.132-.513q0-1.744-.1-3.593c-.135-2.643.1-5.606,3.246-6.244a4.216,4.216,0,0,1,4.083,1.345,2.881,2.881,0,0,1,.907,2.021,18.4,18.4,0,0,1-.052,2.3,52.374,52.374,0,0,0-.106,9.329c.158,1.772.723,3.469.922,5.267.472,4.249-3.112,5.262-6.228,3.34-2.342-1.446-4.057-3.71-5.9-5.689a5.117,5.117,0,0,0-.956-.8.222.222,0,0,0-.221-.009.216.216,0,0,0-.116.185,36.29,36.29,0,0,0,.073,3.858A6.307,6.307,0,0,1,46,50.578q-.912,2.29-3.759,1.948c-3.575-.427-3.218-5.43-3.56-7.91q-.3-2.218-.51-4.492c-.262-2.9-.881-5.7-.9-8.643-.008-1.425.736-3.031,2.277-3.3,1.917-.334,2.759.446,4.078,1.8q1.578,1.617,3.057,3.329,2.073,2.4,3.482,3.876A.213.213,0,0,0,50.54,37.153Z" transform="translate(0 -5.571)"/>
        </g>
        </svg>
    </a>
    <div class="flex justify-end w-[65px] md:w-[167px] lg:w-[320px]">
        <div class="flex justify-between items-center w-[65px] md:w-[167px] lg:w-[320px] mr-[7px]">
            <a href="/account" class="flex items-center space-x-1 hide-in-menu lg:w-[182px] justify-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21">
                    <path id="user" d="M17.925,3.075a10.5,10.5,0,0,0-14.849,0A10.679,10.679,0,0,0,.27,8.118,9.979,9.979,0,0,0,0,10.5a10.5,10.5,0,0,0,17.925,7.425,10.5,10.5,0,0,0,0-14.849ZM4.557,17.608A6.007,6.007,0,0,1,10.5,12.321a5.985,5.985,0,0,1,5.943,5.286,9.25,9.25,0,0,1-11.886,0ZM10.5,11.054a3.189,3.189,0,1,1,3.189-3.189A3.193,3.193,0,0,1,10.5,11.054Zm7,5.514a7.233,7.233,0,0,0-4.528-5.043,4.42,4.42,0,1,0-4.947,0,7.227,7.227,0,0,0-4.53,5.04,9.27,9.27,0,1,1,14.005,0Zm0,0"/>
                </svg>
                <p class="hidden lg:block mr-2 font-jakarta font-medium text-15 leading-19 text-[#000000]">
                    <?php
                    if ( is_user_logged_in() ) {
                        // Als de gebruiker is ingelogd
                        $current_user = wp_get_current_user();
                        $user_first_name = $current_user->user_firstname;

                        if ( ! empty( $user_first_name ) ) {
                            // Als de voornaam is ingevuld
                            echo '' . esc_html( $user_first_name ) . '';
                        } else {
                            // Als de voornaam niet is ingevuld
                            echo 'Mijn account';
                        }
                    } else {
                        // Als de gebruiker niet is ingelogd
                        echo 'Inloggen';
                    }
                    ?>
                </p>
            </a>
            <a href="/?s=" class="hidden md:block hide-in-menu">
                <svg id="Group_200" data-name="Group 200" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path id="search" d="M10.242,2a8.223,8.223,0,0,1,6.137,13.72L20,19.009,19.069,20,15.4,16.647A8.233,8.233,0,1,1,10.242,2Zm0,15.117a6.887,6.887,0,1,0-6.9-6.887,6.892,6.892,0,0,0,6.9,6.887Z" transform="translate(-2.003 -2)" fill="#121212"/>
                </svg>
            </a>
            <a href="/favoriete-producten" class="hidden md:block hide-in-menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="19.641" height="17.28" viewBox="0 0 19.641 17.28">
                    <path id="love" d="M13.892,4A5.658,5.658,0,0,0,9.77,5.789,5.648,5.648,0,0,0,0,9.648c0,5.624,9.071,11.144,9.465,11.361a.611.611,0,0,0,.629,0c.376-.217,9.447-5.737,9.447-11.361A5.655,5.655,0,0,0,13.892,4ZM9.77,19.767C8.192,18.759,1.221,14.051,1.221,9.648A4.427,4.427,0,0,1,9.27,7.105a.611.611,0,0,0,1,0,4.427,4.427,0,0,1,8.051,2.543C18.319,14.048,11.349,18.756,9.77,19.767Z" transform="translate(0.05 -3.875)" fill="#121212" stroke="#121212" stroke-width="0.1"/>
                </svg>
            </a>
            <button class="sidecar relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="20.34" height="18.387" viewBox="0 0 20.34 18.387">
                    <path id="shopping-bag" d="M23.136,9.943a.693.693,0,0,0-.536-.256H19.044A5.308,5.308,0,0,0,13.841,5h-1.4a5.308,5.308,0,0,0-5.2,4.687H3.681a.692.692,0,0,0-.544.254.736.736,0,0,0-.156.594L4.858,21.458A2.3,2.3,0,0,0,7.1,23.387H19.177a2.3,2.3,0,0,0,2.246-1.932L23.3,10.534A.736.736,0,0,0,23.136,9.943Zm-10.7-3.5h1.4a3.886,3.886,0,0,1,3.787,3.245H8.652A3.886,3.886,0,0,1,12.439,6.442ZM20.046,21.2a.887.887,0,0,1-.869.743H7.1a.887.887,0,0,1-.865-.739L4.514,11.129H21.766Z" transform="translate(-2.969 -5)" fill="#121212"/>
                </svg>
                 <?php  if ( ! WC()->cart->get_cart_contents_count() == 0 ) { ?>
                <div class="absolute bottom-[14px] right-[-7px] bg-[#57dd04] h-[14px] w-[14px] rounded-full flex justify-center items-center text-8 font-jakarta font-medium text-white"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
                <?php } ?>
            </button>
        </div>
    </div>
</section>
</header>
<div class="menu fixed h-[calc(100dvh-111px)] w-full top-[111px] bottom-0 bg-white z-[999] lg:hidden min-h-[650px] overflow-y-auto">
    <div class="h-full flex flex-col justify-between w-[390px] px-[20px] md:w-[768px] md:px-[40px] mx-auto">
        <div class="pt-[40px] md:pt-[15px]">
            <?php aws_get_search_form( true ); ?>
        </div>
        <div class="flex flex-col justify-center text-center pb-[111px]">
            <a href="/producten" class="font-jakarta font-medium text-18 leading-48 md:text-20 md:leading-60 text-[#121212]">Assortiment</a>
            <a href="/producten/aanbieding-yes/" class="font-jakarta font-medium text-18 leading-48 md:text-20 md:leading-60 text-[#121212]">Aanbiedingen</a>
            <a href="/support" class="font-jakarta font-medium text-18 leading-48 md:text-20 md:leading-60 text-[#121212]">Klantenservice</a>
            <a href="/veelgestelde-vragen" class="font-jakarta font-medium text-18 leading-48 md:text-20 md:leading-60 text-[#121212]">Veelgestelde vragen</a>
            <a href="/account" class="flex items-center space-x-[15px] w-fit mx-auto mt-[45px] md:mt-[45px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21">
                    <path id="user" d="M17.925,3.075a10.5,10.5,0,0,0-14.849,0A10.679,10.679,0,0,0,.27,8.118,9.979,9.979,0,0,0,0,10.5a10.5,10.5,0,0,0,17.925,7.425,10.5,10.5,0,0,0,0-14.849ZM4.557,17.608A6.007,6.007,0,0,1,10.5,12.321a5.985,5.985,0,0,1,5.943,5.286,9.25,9.25,0,0,1-11.886,0ZM10.5,11.054a3.189,3.189,0,1,1,3.189-3.189A3.193,3.193,0,0,1,10.5,11.054Zm7,5.514a7.233,7.233,0,0,0-4.528-5.043,4.42,4.42,0,1,0-4.947,0,7.227,7.227,0,0,0-4.53,5.04,9.27,9.27,0,1,1,14.005,0Zm0,0"/>
                </svg>
                <p class="font-jakarta font-medium text-18 leading-48 md:text-20 md:leading-60 text-[#121212]">
                    <?php
                    if ( is_user_logged_in() ) {
                        // Als de gebruiker is ingelogd
                        $current_user = wp_get_current_user();
                        $user_first_name = $current_user->user_firstname;

                        if ( ! empty( $user_first_name ) ) {
                            // Als de voornaam is ingevuld
                            echo '' . esc_html( $user_first_name ) . '';
                        } else {
                            // Als de voornaam niet is ingevuld
                            echo 'Mijn account';
                        }
                    } else {
                        // Als de gebruiker niet is ingelogd
                        echo 'Inloggen';
                    }
                    ?>
                </p>
            </a>
            <a href="/favoriete-producten" class="flex items-center space-x-[15px] w-fit mx-auto mt-[0px] md:mt-[0px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="19.641" height="17.28" viewBox="0 0 19.641 17.28">
                    <path id="love" d="M13.892,4A5.658,5.658,0,0,0,9.77,5.789,5.648,5.648,0,0,0,0,9.648c0,5.624,9.071,11.144,9.465,11.361a.611.611,0,0,0,.629,0c.376-.217,9.447-5.737,9.447-11.361A5.655,5.655,0,0,0,13.892,4ZM9.77,19.767C8.192,18.759,1.221,14.051,1.221,9.648A4.427,4.427,0,0,1,9.27,7.105a.611.611,0,0,0,1,0,4.427,4.427,0,0,1,8.051,2.543C18.319,14.048,11.349,18.756,9.77,19.767Z" transform="translate(0.05 -3.875)" fill="#121212" stroke="#121212" stroke-width="0.1"/>
                </svg>
                <p class="font-jakarta font-medium text-18 leading-48 md:text-20 md:leading-60 text-[#121212]">Verlanglijstje</p>
            </a>
            <button class="sidecar relative flex items-center space-x-[15px] w-fit mx-auto mt-[0px] md:mt-[0px]">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20.34" height="18.387" viewBox="0 0 20.34 18.387">
                        <path id="shopping-bag" d="M23.136,9.943a.693.693,0,0,0-.536-.256H19.044A5.308,5.308,0,0,0,13.841,5h-1.4a5.308,5.308,0,0,0-5.2,4.687H3.681a.692.692,0,0,0-.544.254.736.736,0,0,0-.156.594L4.858,21.458A2.3,2.3,0,0,0,7.1,23.387H19.177a2.3,2.3,0,0,0,2.246-1.932L23.3,10.534A.736.736,0,0,0,23.136,9.943Zm-10.7-3.5h1.4a3.886,3.886,0,0,1,3.787,3.245H8.652A3.886,3.886,0,0,1,12.439,6.442ZM20.046,21.2a.887.887,0,0,1-.869.743H7.1a.887.887,0,0,1-.865-.739L4.514,11.129H21.766Z" transform="translate(-2.969 -5)" fill="#121212"/>
                    </svg>
                        <?php  if ( ! WC()->cart->get_cart_contents_count() == 0 ) { ?>
                    <div class="absolute bottom-[14px] right-[-7px] bg-[#57dd04] h-[14px] w-[14px] rounded-full flex justify-center items-center text-8 font-jakarta font-medium text-white"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
                    <?php } ?>
                </div>
                <p class="font-jakarta font-medium text-18 leading-48 md:text-20 md:leading-60 text-[#121212]">Winkelwagen</p>
            </button>
        </div>
        <div class=""></div>
    </div>
</div>


<?php include 'componenten/navbar-dropdown.php'; ?>