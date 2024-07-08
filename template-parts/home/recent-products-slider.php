<section  class="section-recent-products woocommerce">
	<div class="section-wrapper-sn pt-100">
		<div class="container-lg">
			<div class="row">
				<div class="col-12">
					<h2 class="section-title-sn pb-4">
						<?php the_field('naglowek_sekcji_nowosci'); ?>
					</h2>		
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="recent-products-sn-wrapper">
						<?php
						$per_page = get_field('slider_nowosci_ilosc');
						if(!$per_page){
							$per_page = 10;
						}
						function getRecentProductsSN($per_page= 10 ){

						    $tax_query = array(
						        'relation' => 'AND',
						        array(
						            'taxonomy' => 'product_visibility',
						            'field'    => 'name',
						            'terms'    => 'exclude-from-catalog',
						            'operator' => 'NOT IN',
						        ),
						        array(
					                'key' => '_stock_status',
					                'value' => 'instock'
					            ),

						        array(
						            'taxonomy' => 'product_visibility',
						            'field'    => 'name',
						            'terms'    => 'featured',
						            'operator' => 'NOT IN',
						        )
						    );

						    $getRecentProductsSN = new WP_Query( array(
						        'post_type'           => 'product',
						        'post_status'         => 'publish',
						        'ignore_sticky_posts' => 1,
						        'posts_per_page'      => $per_page,
						        'orderby'             => 'date', // Sortowanie według daty
						        'order'               => 'DESC',
						        'tax_query'           => $tax_query
						    ) );

						    $total_records = $getRecentProductsSN->found_posts;

						    return $getRecentProductsSN; 
						}

					    ?>

					    <?php $getRecentProductsSN = getRecentProductsSN( $per_page ); ?>

					    <!-- check product count -->
					    <?php if( $getRecentProductsSN->found_posts > 4 ): ?>
							<?php if ($getRecentProductsSN->have_posts()) : // (3) ?>
								<ul class="recent-products-sn">
							    <?php while ($getRecentProductsSN->have_posts()) : $getRecentProductsSN->the_post();  ?>
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
							<?php echo do_shortcode('[products limit="4" columns="4" orderby="date" order="DESC"]'); ?>

						<?php  endif; ?>     
			   
					</div>
				</div>
			</div>
			

		</div>
	</div>
</section>