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
    
        <?php  get_template_part('template-parts/home/main-slider'); ?>
        <?php  get_template_part('template-parts/home/recent-products-slider'); ?>
        <?php  get_template_part('template-parts/home/recommended-products-slider'); ?>
        <?php  get_template_part('template-parts/home/about'); ?>
        <?php  get_template_part('template-parts/home/blog-posts'); ?>
        <?php  // get_template_part('template-parts/home/recommended-products-slider'); ?>
        <?php  // get_template_part('template-parts/home/bestsellers'); ?>
        

</main><!-- #main -->


<script type="text/javascript">
  
    jQuery(document).ready(function($){
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

        $('.recent-products-sn').slick({
          dots: false,
          infinite: true,
          arrows:true,
          speed: 300,
          slidesToShow: 4,
          slidesToScroll: 1,
          prevArrow: $('.rec-prev'),
          nextArrow: $('.rec-next'),
          responsive: [
            {
              breakpoint: 1366,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
                arrows: false
              }
            },
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
                arrows: false
              }
            },
            {
              breakpoint: 760,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: true,
                arrows: false
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                arrows: false
              }
            }
            
          ]
        });


       // Recommended ( featured )  products
       $('.recommended-products-sn').slick({
          dots: false,
          infinite: true,
          arrows:true,
          speed: 300,
          slidesToShow: 4,
          slidesToScroll: 1,
          prevArrow: $('.ftr-prev'),
          nextArrow: $('.ftr-next'),
          responsive: [
            {
              breakpoint: 1366,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
                arrows: false
              }
            },
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
                arrows: false
              }
            },
            {
              breakpoint: 760,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: true,
                arrows: false
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                arrows: false
              }
            }
            
          ]
        });



        
    });
</script>
<?php
get_footer();
