<section  class="section-blog-posts ptb-60">
	<div class="section-wrapper-sn">
		<div class="container-lg">
			<h2 class="section-title-sn text-center pb-2 mt-0">
				Blog 
			</h2>

			 <div class="sp-related-container">
                <?php  
                function getFeaturedBlogPosts() {

				   $args = array(
					    'post_type'      => 'post',
					    'posts_per_page' => 3,
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
					<div class="row post-grid-row-sn">
					<?php 
				    foreach ($featured_posts as $post) : ?>
				        <?php setup_postdata($post); ?>
				        <div class="article-col-sn col-lg-4 col-md-6 col-sm-6 col-12 mb-4 mb-lg-0">
									<?php get_template_part( 'template-parts/content'); ?>	
								</div>
				    <?php endforeach; ?>
				    <?php wp_reset_postdata(); ?>
				  </div>
				<?php endif; ?>

                
                
            </div>
            <div class="blog-backward py-3 text-center">
				<a  style="min-width:200px;" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn-main-sn btn-transparent-sn">
					<?php _e('Więcej na blogu' , 'web14devsn'); ?>
				</a>
			</div>
			
		</div>
	</div>
</section>