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
        <a href="/producten" class="font-jakarta font-normal text-black text-15 leading-15 hidden md:flex items-center hide-in-menu">Assortiment</a>
        <a href="/producten/seizoen-herfst-or-winter/" class="font-jakarta font-normal text-black text-15 leading-15 hidden lg:block">Herfst</a>
        <a href="/producten/aanbieding-yes/" class="font-jakarta font-normal text-black text-15 leading-15 hidden lg:block">Aanbiedingen</a>
    </div>
    <a href="/" class="flex justify-center w-[143.448px] mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="143.45" height="30.94" viewBox="0 0 876.648 189.104">
            <g id="Screenshot_2023-12-18_at_11.41.55" data-name="Screenshot 2023-12-18 at 11.41.55" transform="translate(-52.234 -26.89)">
                <g id="Group_337" data-name="Group 337" transform="translate(52.234 26.89)">
                <path id="Path_732" data-name="Path 732" d="M388.979,73.531a21.594,21.594,0,0,0,14.82-9.12c7.236-9.832,7.077-23.243.966-33.851-5.89-10.244-18.414-13.442-29.323-10.1q-8.344,2.565-11.732,8.6a.674.674,0,0,1-1.124.237c-23.322-16.815-47.4,6.333-36.511,31.112,3.42,7.774,8.787,11.067,16.514,13.189a1.359,1.359,0,0,1,1.092,1.33q1.884,28.309,5.035,61.02a.285.285,0,0,1-.285.317c-28.879.586-28.721,50.776,1.219,52.059q16.007.681,22.7-12.429.491-.966,1.282-.222c4.5,4.307,8.344,7.948,14.836,8.661q21.739,2.422,27.486-16.245a33.082,33.082,0,0,0,.332-16.07q-4.259-16.862-21.454-18.936a1.575,1.575,0,0,1-1.536-1.615c-.792-11.051-2.818-21.834-3.372-33q-.57-11.685-1.837-23.813a.911.911,0,0,1,.887-1.124" transform="translate(129.616 -19.187)" fill="none"/>
                <path id="Path_733" data-name="Path 733" d="M497.916,169.6c29.07,3.158,56.246-27.516,60.7-68.513s-15.5-76.792-44.572-79.95-56.246,27.516-60.7,68.513,15.5,76.793,44.572,79.95" transform="translate(205.064 -18.179)" fill="none"/>
                <path id="Path_734" data-name="Path 734" d="M445.627,30.356q-13.078-5.795-32.632-5.985-9.12-.095-14.487,2.882a28.374,28.374,0,0,0-14.2,20.995c-2.85,20.789-.507,42.147.95,63.031a303.369,303.369,0,0,0,5.621,42.686c2.074,9.753,10.054,22.91,21.675,21.834,26.568-2.47,49.731-11.4,63.205-35.07,9.706-17.052,11.938-39.108,8.581-57.822-4.148-23.037-17-42.939-38.712-52.55" transform="translate(164.372 -16.164)" fill="none"/>
                <path id="Path_735" data-name="Path 735" d="M581.251,130.4a6.85,6.85,0,0,1-1.6,2.438,2.589,2.589,0,0,1-3.23.333c-7.331-4.782-9.674-16.308-8.9-24.256,1.267-12.793,7.267-41.672,27.138-32.806,6.127,2.739,11.463,8.376,18.683,5.32q11.938-5.067,11.669-18.968Q624.728,47.779,612.2,37.2c-28.088-23.734-65.058-11.463-79.26,20.741-7.853,17.8-8.439,39.994-8.613,60.15q-.143,17.02,7.283,29.671,12.16,20.694,33.835,24.905c34.738,6.761,63.744-19.6,64.361-54.054q.332-18.461-16.672-20.852a99.992,99.992,0,0,0-25.364.016q-9.389,1.187-12.825,10.687c-3.072,8.55,2.708,13.189,6.191,19.87a2.461,2.461,0,0,1,.111,2.058" transform="translate(246.832 -15.902)" fill="none"/>
                <path id="Path_736" data-name="Path 736" d="M268.859,74.888c6.017-1.979,12.936-2.438,18.335-5.447,8.566-4.766,11-14.281,10.371-23.7-.9-13.474-11.986-20.124-24.319-19.744q-24.494.776-50.729,2.818a43.972,43.972,0,0,0-11.447,2.232c-7.869,2.866-14.978,8.787-16.15,17.575Q192.94,63.472,205.559,71.9c4.417,2.961,9.785,3.531,14.8,5.177a3.1,3.1,0,0,1,2.137,2.739q.443,6.365.38,12.951c-.1,8.376,1.172,16.735,1.995,25.143.934,9.595,2.581,18.825,3.452,28.594,1.3,14.6,7.252,32.109,24.969,30.13,13.806-1.536,21.533-12.746,20.092-25.966q-3.99-36.828-5.732-70.029a19.948,19.948,0,0,1,.317-4.718,1.2,1.2,0,0,1,.887-1.029" transform="translate(54.53 -15.224)" fill="none"/>
                <path id="Path_737" data-name="Path 737" d="M178.5,118.569c-6.017.253-5.257-12.207-4.94-15.722q1.868-20.6,3.768-38.981c1.045-10.228-.063-18.81-5.352-27.565q-4.592-7.616-11.495-9.357c-3.483-.887-10.782-.7-14.123.507-9.421,3.388-13.743,13.11-15.5,22.388a304.34,304.34,0,0,0-5.257,48.813q-.475,18.62.522,26a66.145,66.145,0,0,0,8.961,25.4q12.983,21.675,39.63,22.768c22.34.918,38.87-13.395,48.987-32.7q5.494-10.5,7.141-25.317c2.343-20.884,1.362-39.123-.222-59.342q-.19-2.438-1.377-9.4c-1.2-7.014-3.388-11.526-10.006-13.7q-9.88-3.246-17.59,2.438a26.584,26.584,0,0,0-11.194,19.031q-2.09,18.05-3.974,36.764c-.823,8.233-1.172,16.134-3.246,24.177a4.649,4.649,0,0,1-4.734,3.8" transform="translate(14.168 -14.984)" fill="none"/>
                <path id="Path_738" data-name="Path 738" d="M300.284,139.688q.222-2.739,1.789-.475,8.249,11.986,16.736,23.781,7.41,10.323,17.685,11.8,14.725,2.137,18.445-11.7c3.214-12,.744-22.372-7.774-30.811a90.27,90.27,0,0,1-8.075-9.183,3.226,3.226,0,0,1,.475-4.908,148.991,148.991,0,0,0,10.687-10.418c12.841-13.806,14.361-34.991,6.032-51.584-11.178-22.309-32.711-27.9-56.555-29.465-13.173-.871-25.4,3.467-31.207,14.535a14.782,14.782,0,0,0-1.567,4.924c-1.536,11.4-2.011,22.53-4.481,33.835a337.767,337.767,0,0,0-7.156,56.033c-.728,14.931-.206,34.1,19.015,36.748,15.611,2.137,25.127-11.131,25.523-25.254q.1-3.958.427-7.853" transform="translate(89.81 -14.856)" fill="none"/>
                <path id="Path_739" data-name="Path 739" d="M118.367,90.551a1.3,1.3,0,0,1-2.3.174q-8.613-9.009-21.28-23.686Q85.751,56.574,76.108,46.694c-8.059-8.249-13.2-13.015-24.921-10.972C41.767,37.368,37.223,47.185,37.27,55.893c.095,17.97,3.879,35.118,5.478,52.819q1.267,13.9,3.119,27.454c2.09,15.152-.095,45.726,21.755,48.338q17.4,2.09,22.974-11.906,2.153-5.415,1.409-16.1a221.764,221.764,0,0,1-.443-23.575,1.319,1.319,0,0,1,.71-1.132,1.357,1.357,0,0,1,1.349.055,31.271,31.271,0,0,1,5.842,4.908c11.273,12.1,21.755,25.934,36.068,34.769,19.047,11.748,40.944,5.557,38.063-20.409-1.219-10.988-4.671-21.359-5.637-32.188q-2.248-25.3.649-57.015a112.441,112.441,0,0,0,.317-14.044c-.174-5.067-2.074-8.756-5.542-12.35-6.935-7.22-15.216-10.181-24.953-8.217-19.253,3.895-20.662,22.008-19.839,38.158q.586,11.3.586,21.96a5.3,5.3,0,0,1-.807,3.135" transform="translate(-37.27 -14.801)" fill="none"/>
                <path id="Path_740" data-name="Path 740" d="M464.032,114.6a9.556,9.556,0,0,0-6.428-2.422c-18.208-.522-20.535,24.937-1.979,27.66a.686.686,0,0,1,.56.475.724.724,0,0,1-.18.728,18.738,18.738,0,0,1-12.508,5.573c-5.225.285-10.022-1.742-15.12-2.644a4.058,4.058,0,0,0-4.639,2.2l-.554,1q-1.647,2.945,1.393,4.4c14.091,6.7,32.711,5.478,41.752-8.645a.609.609,0,0,1,.419-.283.642.642,0,0,1,.5.125q21.232,16.419,44.111-.19,2.9-2.106,1.852-6.222a1.918,1.918,0,0,0-.887-1.219,5.922,5.922,0,0,0-6.523.222c-8.787,6.238-18.794,9.69-28.531,3.182q-1.124-.744.174-1.156c7.03-2.2,12.112-4.924,12.191-13.474.111-14.186-15.865-18.635-24.51-9.341a.689.689,0,0,1-1.092.032" transform="translate(187.496 33.602)" fill="none"/>
                <path id="Path_741" data-name="Path 741" d="M487.31,89.092c3.52.395,7.124-5.985,8.051-14.249s-1.175-15.283-4.694-15.678-7.125,5.985-8.051,14.249,1.174,15.282,4.694,15.677" transform="translate(222.373 4.123)" fill="none"/>
                <path id="Path_742" data-name="Path 742" d="M412.6,60.4q-.744-.095-.665.649a277.877,277.877,0,0,1,1.457,29.94q-.032,4.544,3.737,2.011,5.668-3.8,6.777-13.078a18.939,18.939,0,0,0,.016-4.164c-.665-6.3-4.085-14.361-11.321-15.358" transform="translate(181.267 4.849)" fill="none"/>
                <path id="Path_743" data-name="Path 743" d="M287.76,56.54,286.35,76.6a.412.412,0,0,0,.4.443l.681.047a7.107,7.107,0,0,0,5.673-2.411,10.768,10.768,0,0,0,2.735-6.582l.127-1.821c.37-5.256-2.791-9.763-7.062-10.07l-.7-.047a.412.412,0,0,0-.443.38" transform="translate(108.018 2.379)" fill="none"/>
                </g>
                <path id="Path_745" data-name="Path 745" d="M388.092,74.655q1.267,12.128,1.837,23.813c.554,11.162,2.581,21.945,3.372,33a1.575,1.575,0,0,0,1.536,1.615q17.195,2.074,21.454,18.936a33.082,33.082,0,0,1-.332,16.07q-5.747,18.667-27.486,16.245c-6.491-.712-10.339-4.354-14.836-8.661q-.792-.744-1.282.222-6.7,13.11-22.7,12.429c-29.94-1.282-30.1-51.473-1.219-52.059a.285.285,0,0,0,.285-.317q-3.151-32.711-5.035-61.02a1.359,1.359,0,0,0-1.092-1.33c-7.727-2.122-13.094-5.415-16.514-13.189-10.893-24.779,13.189-47.927,36.511-31.112a.674.674,0,0,0,1.124-.237q3.388-6.032,11.732-8.6c10.909-3.341,23.433-.142,29.323,10.1,6.112,10.608,6.27,24.019-.966,33.851a21.594,21.594,0,0,1-14.82,9.12A.911.911,0,0,0,388.092,74.655Z" transform="translate(181.85 7.704)"/>
                <path id="Path_746" data-name="Path 746" d="M497.916,169.6c-29.07-3.158-49.026-38.953-44.572-79.95s31.63-71.671,60.7-68.514,49.026,38.953,44.572,79.95-31.63,71.671-60.7,68.514Zm6.7-58.208c3.52.395,7.124-5.985,8.051-14.249s-1.175-15.283-4.694-15.678-7.125,5.985-8.051,14.249S501.1,111,504.618,111.394Z" transform="translate(257.298 8.712)"/>
                <path id="Path_747" data-name="Path 747" d="M445.627,30.356c21.707,9.611,34.564,29.513,38.712,52.55,3.357,18.715,1.124,40.77-8.581,57.822-13.474,23.67-36.638,32.6-63.205,35.07-11.621,1.077-19.6-12.081-21.675-21.834a303.369,303.369,0,0,1-5.621-42.686c-1.457-20.884-3.8-42.242-.95-63.031a28.374,28.374,0,0,1,14.2-20.995q5.367-2.977,14.487-2.882Q432.549,24.561,445.627,30.356ZM429.493,81.417q-.744-.095-.665.649a277.877,277.877,0,0,1,1.457,29.94q-.032,4.544,3.737,2.011,5.668-3.8,6.777-13.078a18.937,18.937,0,0,0,.016-4.164C440.149,90.474,436.729,82.415,429.493,81.417Z" transform="translate(216.606 10.726)"/>
                <path id="Path_748" data-name="Path 748" d="M581.14,128.337c-3.483-6.682-9.262-11.321-6.191-19.87q3.436-9.5,12.825-10.687a99.991,99.991,0,0,1,25.364-.016q17,2.391,16.672,20.852c-.617,34.453-29.624,60.815-64.361,54.054q-21.675-4.212-33.835-24.905-7.426-12.651-7.283-29.671c.174-20.155.76-42.353,8.613-60.15,14.2-32.2,51.172-44.475,79.26-20.741q12.524,10.576,12.809,25.254.269,13.9-11.669,18.968c-7.22,3.056-12.556-2.581-18.683-5.32-19.87-8.866-25.871,20.013-27.138,32.806-.776,7.948,1.567,19.475,8.9,24.256a2.589,2.589,0,0,0,3.23-.332,6.85,6.85,0,0,0,1.6-2.438A2.461,2.461,0,0,0,581.14,128.337Z" transform="translate(299.065 10.989)"/>
                <path id="Path_749" data-name="Path 749" d="M267.972,75.917a19.948,19.948,0,0,0-.317,4.718q1.742,33.2,5.732,70.029c1.441,13.221-6.286,24.43-20.092,25.966-17.717,1.979-23.67-15.532-24.969-30.13-.871-9.769-2.517-19-3.452-28.594-.823-8.407-2.09-16.767-1.995-25.143q.063-6.587-.38-12.951a3.1,3.1,0,0,0-2.137-2.739c-5.019-1.647-10.386-2.217-14.8-5.177q-12.619-8.423-10.64-23.275c1.172-8.787,8.281-14.709,16.15-17.575a43.972,43.972,0,0,1,11.447-2.232Q248.751,26.771,273.245,26c12.334-.38,23.417,6.27,24.319,19.744.633,9.421-1.8,18.936-10.371,23.7-5.4,3.008-12.318,3.467-18.335,5.447A1.2,1.2,0,0,0,267.972,75.917Z" transform="translate(106.764 11.666)"/>
                <path id="Path_750" data-name="Path 750" d="M178.5,118.569a4.649,4.649,0,0,0,4.734-3.8c2.074-8.043,2.422-15.944,3.246-24.177q1.884-18.715,3.974-36.764A26.584,26.584,0,0,1,201.652,34.8q7.711-5.684,17.59-2.438c6.618,2.169,8.8,6.682,10.006,13.7q1.187,6.967,1.377,9.4c1.583,20.219,2.565,38.458.222,59.342q-1.647,14.82-7.141,25.317c-10.117,19.3-26.647,33.613-48.987,32.7q-26.647-1.092-39.63-22.768a66.145,66.145,0,0,1-8.961-25.4q-1-7.378-.522-26a304.34,304.34,0,0,1,5.257-48.813c1.758-9.278,6.08-19,15.5-22.388,3.341-1.2,10.64-1.393,14.123-.507q6.9,1.742,11.495,9.357c5.288,8.756,6.4,17.337,5.352,27.565q-1.9,18.382-3.768,38.981C173.248,106.362,172.488,118.822,178.5,118.569Z" transform="translate(66.402 11.906)"/>
                <path id="Path_751" data-name="Path 751" d="M300.284,139.688q-.332,3.895-.427,7.853c-.4,14.123-9.911,27.391-25.523,25.254-19.221-2.644-19.744-21.818-19.015-36.748a337.767,337.767,0,0,1,7.156-56.033c2.47-11.3,2.945-22.435,4.481-33.835a14.782,14.782,0,0,1,1.567-4.924c5.811-11.067,18.034-15.406,31.207-14.535,23.844,1.567,45.377,7.157,56.555,29.465,8.328,16.593,6.808,37.778-6.032,51.584a148.991,148.991,0,0,1-10.687,10.418,3.226,3.226,0,0,0-.475,4.908,90.27,90.27,0,0,0,8.075,9.183c8.518,8.439,10.988,18.81,7.774,30.811q-3.721,13.838-18.445,11.7-10.276-1.472-17.685-11.8-8.486-11.8-16.736-23.781Q300.505,136.949,300.284,139.688Zm5.684-65.913-1.409,20.06a.412.412,0,0,0,.4.443l.681.047a7.108,7.108,0,0,0,5.673-2.411,10.768,10.768,0,0,0,2.735-6.582l.127-1.821c.37-5.256-2.791-9.763-7.062-10.07l-.7-.047a.412.412,0,0,0-.443.38Z" transform="translate(142.044 12.035)"/>
                <path id="Path_752" data-name="Path 752" d="M118.367,90.551a5.3,5.3,0,0,0,.807-3.135q0-10.656-.586-21.96c-.823-16.15.586-34.263,19.839-38.158,9.737-1.963,18.018,1,24.953,8.217,3.467,3.594,5.367,7.283,5.542,12.35a112.441,112.441,0,0,1-.317,14.044q-2.9,31.714-.649,57.015c.966,10.83,4.417,21.2,5.637,32.188,2.882,25.966-19.015,32.157-38.063,20.409-14.313-8.835-24.794-22.673-36.068-34.769a31.27,31.27,0,0,0-5.842-4.908,1.357,1.357,0,0,0-1.349-.055,1.319,1.319,0,0,0-.71,1.132A221.764,221.764,0,0,0,92,156.5q.744,10.687-1.409,16.1-5.573,14-22.974,11.906c-21.85-2.612-19.665-33.186-21.755-48.338q-1.852-13.553-3.119-27.454c-1.6-17.7-5.383-34.848-5.478-52.819-.048-8.708,4.5-18.525,13.917-20.171C62.9,33.679,68.049,38.445,76.108,46.694q9.642,9.88,18.683,20.345,12.666,14.677,21.28,23.686A1.3,1.3,0,0,0,118.367,90.551Z" transform="translate(14.964 12.09)"/>
                <path id="Path_755" data-name="Path 755" d="M465.125,114.568c8.645-9.294,24.62-4.845,24.51,9.341-.079,8.55-5.162,11.273-12.191,13.474q-1.3.412-.174,1.156c9.737,6.507,19.744,3.056,28.531-3.182a5.921,5.921,0,0,1,6.523-.222,1.918,1.918,0,0,1,.887,1.219q1.045,4.117-1.852,6.222-22.879,16.609-44.111.19a.642.642,0,0,0-.5-.125.609.609,0,0,0-.419.283c-9.041,14.123-27.66,15.342-41.752,8.645q-3.04-1.457-1.393-4.4l.554-1a4.058,4.058,0,0,1,4.639-2.2c5.1.9,9.9,2.929,15.12,2.644a18.737,18.737,0,0,0,12.508-5.573.724.724,0,0,0,.18-.728.686.686,0,0,0-.56-.476c-18.556-2.723-16.229-28.183,1.979-27.66a9.556,9.556,0,0,1,6.428,2.422A.689.689,0,0,0,465.125,114.568Z" transform="translate(239.73 60.492)"/>
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