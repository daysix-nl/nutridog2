<?php
if (isset($block['data']['preview_image_help'])): ?>
    <img src="#" style="width:100%; height:auto;">
    <?php
else: ?>
<?php
$image = get_field('afbeelding');
$image_url = isset($image['url']) ? esc_url($image['url']) : '';
$image_alt = isset($image['alt']) ? esc_attr($image['alt']) : '';
?>
<!-- HTML -->
<section class="bg-white">
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
    <div class="container lg:flex justify-between pb-[70px]">
        <div class="w-full lg:w-[322px] xl:ml-[0px]">
            <h1 class="font-grotesk text-25 md:text-30 leading-30 text-[#FF6248]"><?php the_title();?></h1>
            <?php if (get_field('afbeelding')): ?>   
            <div class="w-[360px] h-[219px] md:w-[718px] md:h-[437px] lg:w-[322px] lg:h-[322px] overflow-hidden mt-[30px] lg:mt-[45px]">
                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="min-h-full min-w-full object-cover object-center">
            </div>
            <?php endif; ?>
        </div>
        <div class="w-full lg:w-[741px] xl:w-[800px] xl:mr-[60px] mt-[25px] lg:mt-[unset]">
            <div class="text-15 leading-30 font-jakarta text-black w-fit text-editor">
                <?php echo get_field('content');?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
