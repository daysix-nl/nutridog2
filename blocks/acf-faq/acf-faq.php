<?php
if (isset($block['data']['preview_image_help'])): ?>
    <img src="#" style="width:100%; height:auto;">
    <?php
else: ?>
<!-- FAQ -->
<style>
    main {
        background: #F6FAFC!important;
    }
</style>
<section class="bg-[#F6FAFC]">
    <div class="container pt-[30px] md:pt-[35px] lg:pt-[45px] xl:pt-[50px]">
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
    </div>
    <div class="container pb-[70px] lg:pb-[90px] xl:pb-[100px]">
        <div class="w-full">
            <h1 class="font-grotesk text-25 md:text-30 leading-30 text-[#FF6248] text-center uppercase"><?php the_title();?></h1>
            <p class="text-center text-[#121212] font-medium font-jakarta text-14 leading-20 md:text-14 md:leading-28 lg:text-16 lg:leading-28 mt-[20px] max-w-[220px] mx-auto md:max-w-[unset]">Staat je vraag er niet tussen? Neem dan contact met ons op.</p>
        </div>
        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-[15px] md:gap-[20px] mt-[40px]">
            <div class="grid gap-[15px] md:gap-[20px] h-fit">
                <?php
                if( have_rows('blok_1') ):
                    while( have_rows('blok_1') ) : the_row(); ?>
                    <div class="accordion-item h-fit"> 
                        <button class="accordion text-[#000000] font-jakarta text-14 leading-20 md:text-14 md:leading-28 lg:text-16 lg:leading-28 font-semibold pr-3 px-2 md:px-3 lg:px-4 h-[80px]">
                            <span class="pr-4"><?php echo get_sub_field('blok_1_vraag');?></span>
                        </button>
                        <div class="panel">
                            <div class="pb-3 px-2 md:pb-4 md:px-3 lg:pb-4 lg:pt-2 lg:px-4">
                                <div class="text-[#000000] font-medium font-jakarta text-14 leading-20 md:text-14 md:leading-28 lg:text-16 lg:leading-28 text-editor"><?php echo get_sub_field('blok_1_antwoord');?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;
                else :
                endif;
                ?>
            </div>
            <div class="grid gap-[15px] md:gap-[20px] h-fit">
                 <?php
                if( have_rows('blok_2') ):
                    while( have_rows('blok_2') ) : the_row(); ?>
                    <div class="accordion-item h-fit"> 
                        <button class="accordion text-[#000000] font-jakarta text-14 leading-20 md:text-14 md:leading-28 lg:text-16 lg:leading-28 font-semibold pr-3 px-2 md:px-3 lg:px-4 h-[80px]">
                            <span class="pr-4"><?php echo get_sub_field('blok_2_vraag');?></span>
                        </button>
                        <div class="panel">
                            <div class="pb-3 px-2 md:pb-4 md:px-3 lg:pb-4 lg:pt-2 lg:px-4">
                                <div class="text-[#000000] font-medium font-jakarta text-14 leading-20 md:text-14 md:leading-28 lg:text-16 lg:leading-28 text-editor"><?php echo get_sub_field('blok_2_antwoord');?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;
                else :
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
