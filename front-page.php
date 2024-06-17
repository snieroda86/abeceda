<?php
/**
 * The template for displaying frontpage
 * Template Name: Strona główna
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

get_header();
?>

<main id="primary" class="site-main">
    
        <?php  // get_template_part('template-parts/home/main-slider'); ?>
        <?php  // get_template_part('template-parts/home/features-bar'); ?>
        <?php  // get_template_part('template-parts/home/recent-products'); ?>
        <?php  // get_template_part('template-parts/home/about'); ?>
        <?php  // get_template_part('template-parts/home/recommended-products-slider'); ?>
        <?php  // get_template_part('template-parts/home/bestsellers'); ?>
        <?php  // get_template_part('template-parts/home/blog-posts'); ?>

</main><!-- #main -->


<script type="text/javascript">
  
    // jQuery(document).ready(function($){
    //     // main-slider-sn
    //     $('.main-slider-sn').slick({
    //       dots: false,
    //       infinite: true,
    //       speed: 500,
    //       fade: true,
    //       cssEase: 'linear' ,
    //       prevArrow: $('.ms-prev'),
    //       nextArrow: $('.ms-next'),
    //     });

    //     // Recommended products slider

    //     $('.recommended-products-sn').slick({
    //       dots: true,
    //       infinite: false,
    //       speed: 300,
    //       slidesToShow: 4,
    //       slidesToScroll: 1,
    //        prevArrow: $('.rec-prev'),
    //       nextArrow: $('.rec-next'),
    //       responsive: [
    //         {
    //           breakpoint: 1366,
    //           settings: {
    //             slidesToShow: 4,
    //             slidesToScroll: 1,
    //             infinite: true,
    //             dots: true,
    //             arrows: false
    //           }
    //         },
    //         {
    //           breakpoint: 1024,
    //           settings: {
    //             slidesToShow: 3,
    //             slidesToScroll: 1,
    //             infinite: true,
    //             dots: true,
    //             arrows: false
    //           }
    //         },
    //         {
    //           breakpoint: 760,
    //           settings: {
    //             slidesToShow: 2,
    //             slidesToScroll: 1
    //           }
    //         },
    //         {
    //           breakpoint: 480,
    //           settings: {
    //             slidesToShow: 1,
    //             slidesToScroll: 1
    //           }
    //         }
            
    //       ]
    //     });


    //     // Bestsellers - bestsellers-products-sn products
    //     $('.bestsellers-products-sn').slick({
    //       dots: true,
    //       infinite: false,
    //       speed: 300,
    //       slidesToShow: 4,
    //       slidesToScroll: 1,
    //       prevArrow: $('.bestseller-prev'),
    //       nextArrow: $('.bestseller-next'), 
    //       responsive: [
    //         {
    //           breakpoint: 1366,
    //           settings: {
    //             slidesToShow: 4,
    //             slidesToScroll: 1,
    //             infinite: true,
    //             dots: true,
    //             arrows: false
    //           }
    //         },
    //         {
    //           breakpoint: 1024,
    //           settings: {
    //             slidesToShow: 3,
    //             slidesToScroll: 1,
    //             infinite: true,
    //             dots: true,
    //             arrows: false
    //           }
    //         },
    //         {
    //           breakpoint: 760,
    //           settings: {
    //             slidesToShow: 2,
    //             slidesToScroll: 1
    //           }
    //         },
    //         {
    //           breakpoint: 480,
    //           settings: {
    //             slidesToShow: 1,
    //             slidesToScroll: 1
    //           }
    //         }
            
    //       ]
    //     });
    // });
</script>
<?php
get_footer();
