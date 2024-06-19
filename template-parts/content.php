<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
        <a href="<?php the_permalink(); ?>">
            <div class="post-thumbnail-single">
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('full' , ['class'=> 'img-fluid']);
                }else{ ?>
                    <img src="<?php echo PATH_SN ?>/uploads/no-image.jpg"  alt="Brak obrazu" class="img-fluid">
                <?php } ?>        
            </div>
        </a>  

    </header>

    <!--Post content -->
    <section class="single-post-content-section">
        
        <div class="d-flex sp-content-container">

           
            <div class="single-post-content">

                <a href="<?php the_permalink(); ?>">
                   <h2 class="single-post-title">
                       <?php the_title(); ?>
                   </h2>
                </a>

                <div class="post-excerpt-sn">
                    <?php the_excerpt(); ?>
                </div>

                <div class="more-link-sn-wrapper">
                    <a class="d-flex align-items-center" href="<?php echo the_permalink(); ?>">
                        <p class="more-link-sn pe-3">
                            <?php _e('Czytaj dalej' , 'web14devsn'); ?>
                        </p>
                        <p>
                            <img src="<?php echo PATH_SN ?>/uploads/arrow-more-link.png" alt="Arrow">
                        </p>
                    </a>
                </div>
                

            </div>
        </div>
    </section>
    
</article><!-- #post-<?php the_ID(); ?> -->


