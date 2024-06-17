<section  class="section-bg-grey section-bestsellers-products woocommerce">
	<div class="section-wrapper-sn pt-5 pb-5">
		<div class="container-lg">
		
			<div class="row">
				<div class="col-sm-6">
					<h2 class="section-title-sn mb-sm-0 mb-2">
						Bestsellery
					</h2>
				</div>
				<div class="col-sm-6 text-sm-right text-center">
					<?php $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) ); ?>
					<a class="btn-main-sn btn-transparent-sn" href="<?php echo $shop_page_url ?>">
						<?php _e('Wszystkie produkty' , 'web14devsn'); ?>
					</a>
				</div>

			</div>
			
		</div>

		<div class="container-lg">
			<div class="bestsellers-products-sn-wrapper pt-3">
				<?php
				function getBestsellersProductsSN($per_page = 6, $order = 'DESC') {
				    $bestsellersProductsSN = new WP_Query(array(
					    'post_type'           => 'product',
					    'post_status'         => 'publish',
					    'ignore_sticky_posts' => 1,
					    'posts_per_page'      => $per_page,
					    'order'               => $order,
					    'meta_key'            => 'total_sales',
					    'orderby'             => 'meta_value_num',
					    'tax_query'           => array(
					        'relation' => 'AND',
					        array(
					            'taxonomy' => 'product_visibility',
					            'field'    => 'name',
					            'terms'    => 'featured',
					            'operator' => 'NOT IN',
					        ),
					        array(
					            'taxonomy' => 'product_visibility',
					            'field'    => 'name',
					            'terms'    => 'exclude-from-catalog', 
					            'operator' => 'NOT IN',
					        ),
					    )
					));

				    return $bestsellersProductsSN;
				}

			    
			    ?>

			    <?php $getBestsellersProductsSN = getBestsellersProductsSN(); ?>
			    <?php if( $getBestsellersProductsSN->post_count > 4 ): ?>

					<?php if ($getBestsellersProductsSN->have_posts()) : // (3) ?>
						<ul class="bestsellers-products-sn products">
					    <?php while ($getBestsellersProductsSN->have_posts()) : $getBestsellersProductsSN->the_post();  ?>
					    	<?php  wc_get_template_part( 'content', 'product' );  ?>				        
					    <?php endwhile; ?>
					    </ul>

					    <!-- Custom arrows -->
					    <!-- <div class="recommended-arrows-sn"> -->
					    	<div class="bestseller-prev">
					    		<img src="<?php echo PATH_SN ?>/uploads/angle-left.svg"  alt="Arrow">
					    	</div>
					    	<div class="bestseller-next">
					    		<img src="<?php echo PATH_SN ?>/uploads/angle-right.svg"  alt="Arrow">
					    	</div>
					    <!-- </div> -->
					    <?php wp_reset_postdata();  ?>
					<?php else:  ?>
					<p><?php _e( 'No products found' , 'web14devsn' );  ?></p>
					<?php endif; ?>  

				<?php else: ?>
					<?php echo do_shortcode('[products limit="4" columns="4"  best_selling="true"]'); ?>
				<?php  endif; ?>   
			   
			</div>
		</div>
	</div>
</section>