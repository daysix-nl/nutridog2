<?php
/**
 * Template name: Kennisbank
 */


 get_header(); ?>

<main class="bg-[#F6FAFC]">
   <section>
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
            <h1 class="font-grotesk text-25 md:text-30 leading-30 text-[#FF6248] text-center"><?php the_title();?></h1>
            <p class="text-center text-[#121212] font-medium font-jakarta text-14 leading-20 md:text-14 md:leading-28 lg:text-16 lg:leading-28 mt-[20px] max-w-[220px] mx-auto md:max-w-[unset]">Bekijk hier alle items en leer meer over jouw hond.</p>
        </div>
        <div class="w-full grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[15px] md:gap-[20px] mt-[40px]">
            <?php
                  $loop = new WP_Query( array(
                     'post_type' => 'post',
                     'posts_per_page' => -1,
                     'orderby' => 'date',
                     'order' => 'DESC'
                  )
                  );
                  ?>
               <?php while ( $loop->have_posts() ) : $loop->the_post();   
               $post_id = get_the_ID();
               $thumbnail_url = get_the_post_thumbnail_url();
               $thumbnail_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>
               <a href="<?php echo get_permalink();?>" class="col-span-1 bg-white block rounded-[13px] overflow-hidden">
                  <div class="w-full aspect-[1/1] bg-[#F9F9F9] flex items-center justify-center overflow-hidden">
                     <img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php echo esc_attr( $thumbnail_alt ); ?>" class="h-full min-h-full min-w-full object-center object-cover">
                  </div>
                  <div class="px-[15px] pb-[15px] lg:px-[25px] lg:pb-[25px]">
                     <h3 class="text-[#121212] font-jakarta text-15 leading-20 md:text-15 md:leading-25 xl:text-16 xl:leading-25 font-semibold mt-[10px] xl:mt-[20px] tracking-[0.025em] flex"><?php the_title(); ?> <span class="mt-[1px] arrow-link">→</span></h3>
                     <?php if (get_field('subtitel', $post_id)): ?>   
                     <p class="text-[#8D8D8D] font-jakarta text-14 leading-20 md:text-15 md:leading-25 xl:text-16 xl:leading-25 font-normal tracking-[0.025em] line-clamp-2"><?php echo get_field('subtitel', $post_id);?></p>
                     <?php endif; ?>
                  </div>
               </a>
               <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
</section>
</main>
<?php get_footer(); ?>



