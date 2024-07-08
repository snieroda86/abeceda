<section  class="section-featured-products woocommerce">
	<div class="section-wrapper-sn pt-100">
		<div class="container-lg">
			<div class="row">
				<div class="col-12">
					<h2 class="section-title-sn pb-4">
						<?php the_field('naglowek_sekcji_polecane'); ?>
					</h2>		
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="recommended-products-sn-wrapper">
						<?php
						$per_page_ftr = get_field('slider_polecane_ilosc');
						if(!$per_page_ftr){
							$per_page_ftr = 10;
						}
						function getFeaturedProductsSN($per_page_ftr = 10){

							$tax_query = array(
							    'relation' => 'AND',
							    array(
							        'taxonomy' => 'product_visibility',
							        'field'    => 'name',
							        'terms'    => 'featured',
							        'operator' => 'IN',
							    ),
							    array(
							        'taxonomy' => 'product_visibility',
							        'field'    => 'name',
							        'terms'    => 'sale',
							        'operator' => 'NOT IN',
							    ),
							    array(
							        'taxonomy' => 'product_visibility',
							        'field'    => 'name',
							        'terms'    => 'exclude-from-catalog', 
							        'operator' => 'NOT IN',
							    ),
							);

							$featuredProductsSN = new WP_Query( array(
							    'post_type'           => 'product',
							    'post_status'         => 'publish',
							    'ignore_sticky_posts' => 1,
							    'posts_per_page'      => $per_page_ftr,
							    'order'               => 'DESC',
							    'tax_query'           => $tax_query
							) );

							$total_records = $featuredProductsSN->found_posts;

							return $featuredProductsSN;
						}
					    
					    ?>

					    <?php $getFeaturedProductsSN = getFeaturedProductsSN($per_page_ftr); ?>

					    <!-- check product count -->
					    <?php if( $getFeaturedProductsSN->found_posts > 4 ): ?>
							<?php if ($getFeaturedProductsSN->have_posts()) : // (3) ?>
								<ul class="recommended-products-sn">
							    <?php while ($getFeaturedProductsSN->have_posts()) : $getFeaturedProductsSN->the_post();  ?>
							    	<?php  wc_get_template_part( 'content', 'product' );  ?>				        
							    <?php endwhile; ?>
							    </ul>

							    <!-- Custom arrows -->
							    <!-- <div class="recommended-arrows-sn"> -->
							    	<div class="ftr-prev">
							    		<img src="<?php echo PATH_SN ?>/uploads/angle-left.svg"  alt="Arrow">
							    	</div>
							    	<div class="ftr-next">
							    		<img src="<?php echo PATH_SN ?>/uploads/angle-right.svg"  alt="Arrow">
							    	</div>
							    <!-- </div> -->
							    <?php wp_reset_postdata();  ?>
							<?php else:  ?>
							<p><?php _e( 'No products found' , 'web14devsn' );  ?></p>
							<?php endif; ?>


						<?php else: ?>
							<?php echo do_shortcode('[products limit="4" columns="4"  visibility="featured"]'); ?>
						<?php  endif; ?>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>