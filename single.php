<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package web14devsn
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container-lg">
		
		<!-- Post content -->
		<div class="row ">
			<div class="col-lg-8 m-auto">
				<?php
				while ( have_posts() ) : the_post(); ?>

					<div class="sp-content-wrapper-sn ptb-80">
						<header>
							<div class="sp-date-container">
								<div class="post-meta-row d-flex align-items-center justify-content-center">
				                   
				                   <div class="post-meta-i d-flex align-items-center pr-1">
				                       <img style="height: 20px;" src="<?php echo PATH_SN ?>/uploads/calendar2.svg" alt="Kalendarz">
				                   </div>
				                   <div class="post-meta-text text-center">
				                       <h6><?php echo get_the_date(); ?></h6>
				                   </div>
				                </div>
				                <h1 class="single-post-title">
				                    <?php the_title(); ?>
				                </h1>
				                <div class="sp-category-sn">
				                	<?php
									$categories_list = get_the_category_list(', '); 

									if ($categories_list) {
									    echo '<span class="category-label-sn">Kategoria:</span> ' . $categories_list;
									}
									?>
				                </div>

				                <div>
				                	<?php if(has_post_thumbnail()): ?>
				                		<?php the_post_thumbnail('large' , ['class' => 'img-fluid mt-3']); ?>
				                	<?php endif; ?>
				                </div>
                
							</div>
						</header>

						<div class="sp-content-sn pt-5">
							<?php the_content(); ?>
						</div>
						<div class="blog-backward pt-5">
							<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn-main-sn">
								<?php _e('Powrót na bloga' , 'web14devsn'); ?>
							</a>
						</div>
					</div>

				<?php endwhile; ?>

			</div>
			

		</div>
	</div>

</main><!-- #main -->

	<!-- Related posts -->
<section class="section-bg-grey pb-3">
	 <!-- Related posts area -->
      <div class="sp-related-area pt-5 pb-5">
      	<div class="container-lg">
      		<h2 class="section-title-sn">
                  <?php _e('Zobacz również' , 'web14devsn'); ?>
            </h2>

            <div class="sp-related-container">
                <?php 
                function getRelatedBlogPosts() {
				    global $post;

				    $current_post_id = $post->ID;

				    $args = array(
				        'post_type'      => 'post',
				        'posts_per_page' => 3,
				        'post__not_in'   => array($current_post_id), 
				    );

				    $query = new WP_Query($args);

				    if ($query->have_posts()) {
				        // Zwróć wyniki zapytania
				        return $query->posts;
				    }

				    return array();
				}

    
				$related_posts = getRelatedBlogPosts();

				if ($related_posts) : ?>
					<div class="row post-grid-row-sn">
					<?php 
				    foreach ($related_posts as $post) : ?>
				        <?php setup_postdata($post); ?>
				        <div class="article-col-sn col-lg-4 col-md-6 col-sm-6 col-12 mb-4 mb-lg-0">
									<?php get_template_part( 'template-parts/content'); ?>	
								</div>
				    <?php endforeach; ?>
				    <?php wp_reset_postdata(); ?>
				  </div>
				<?php endif; ?>

                
                
            </div>
      	</div>
          
      </div>
      <!-- End related -->
</section>



<?php
get_footer();
