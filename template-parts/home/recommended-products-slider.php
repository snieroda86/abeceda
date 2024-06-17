<section  class="section-recommended-products woocommerce">
	<div class="section-wrapper-sn pb-5">
		<div class="container-lg">
			<h2 class="section-title-sn text-center pb-4">
				Fachowcy polecają
			</h2>
			<div class="recommended-products-sn-wrapper">
				<?php
				function getFeaturedProductsSN($per_page = 8, $order = 'DESC'){

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
					        'terms'    => 'exclude-from-catalog', // Dodaj nową kategorię, jeśli używasz tego do ukrywania produktów
					        'operator' => 'NOT IN',
					    ),
					);

					$featuredProductsSN = new WP_Query( array(
					    'post_type'           => 'product',
					    'post_status'         => 'publish',
					    'ignore_sticky_posts' => 1,
					    'posts_per_page'      => $per_page,
					    'order'               => $order,
					    'tax_query'           => $tax_query
					) );

					$total_records = $featuredProductsSN->found_posts;

					return $featuredProductsSN;
				}
			    
			    ?>

			    <?php $getFeaturedProductsSN = getFeaturedProductsSN(); ?>

			    <!-- check product count -->
			    <?php if( $getFeaturedProductsSN->found_posts > 4 ): ?>
					<?php if ($getFeaturedProductsSN->have_posts()) : // (3) ?>
						<ul class="recommended-products-sn products">
					    <?php while ($getFeaturedProductsSN->have_posts()) : $getFeaturedProductsSN->the_post();  ?>
					    	<?php  wc_get_template_part( 'content', 'product' );  ?>				        
					    <?php endwhile; ?>
					    </ul>

					    <!-- Custom arrows -->
					    <!-- <div class="recommended-arrows-sn"> -->
					    	<div class="rec-prev">
					    		<img src="<?php echo PATH_SN ?>/uploads/angle-left.svg"  alt="Arrow">
					    	</div>
					    	<div class="rec-next">
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
</section>