<?php 
/**
 * The main template file
 * 
 * @package Day Six theme
 */


get_header(); ?>

<main>
    <div class="container pt-[40px] md:pt-[80px] min-h-[calc(100dvh-111px)] pb-[80px]">
        <?php aws_get_search_form( true ); ?>
    </div>   
</main>
<?php get_footer('leeg'); ?>