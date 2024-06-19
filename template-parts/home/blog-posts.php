<section  class="section-blog-posts pt-100">
	<div class="section-wrapper-sn pt-md-3">
		<div class="container-lg">
			<div class="row">
				<div class="d-flex pb-40">
					<div class="col-sn pe-4 d-flex align-items-center">
						<h2 class="section-title-sn">
							Aktualności 
						</h2>
					</div>
					<?php $blog_page_url = get_permalink( get_option( 'page_for_posts' ) );  ?>
					<?php if($blog_page_url): ?>
					<div class="col-sn">
						<a href="<?php echo esc_url($blog_page_url); ?>" class="btn btn-bordered">
							Zobacz więcej
						</a>
					</div>
					<?php endif; ?>
				</div>
			</div>
			

			 <div class="sp-related-container">
                <?php  
                function getFeaturedBlogPosts() {

				   $args = array(
					    'post_type'      => 'post',
					    'posts_per_page' => 4,
					    'meta_query'     => array(
					        'relation' => 'OR',
					        array(
					            'key'     => 'featured_posts',
					            'value'   => true,
					            'compare' => '=',
					        ),
					        array(
					            'key'     => 'featured_posts',
					            'compare' => 'NOT EXISTS',
					        ),
					    ),
					    'orderby'        => array(
					        'meta_value' => 'DESC', 
					        'date'       => 'DESC', 
					    ),
					);
				    $query = new WP_Query($args);

				    if ($query->have_posts()) {
				        
				        return $query->posts;
				    }

				    return array();
				}

    
				$featured_posts = getFeaturedBlogPosts();

				if ($featured_posts) : ?>
					<div class="row post-grid-row-sn g-lg-5">
					<?php 
				    foreach ($featured_posts as $post) : ?>
				        <?php setup_postdata($post); ?>
				        <div class="article-col-sn col-lg-3 col-md-6  col-sm-6 col-12 mb-4 mb-lg-0">
									<?php get_template_part( 'template-parts/content'); ?>	
								</div>
				    <?php endforeach; ?>
				    <?php wp_reset_postdata(); ?>
				  </div>
				<?php endif; ?>

                
                
            </div>
           
		</div>
	</div>
</section>