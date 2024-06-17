<section  class="section-bg-grey">
	<div class="section-wrapper-sn pt-5 pb-5">
		<div class="container-lg">
			<h2 class="section-title-sn text-center pb-2">
				Zobacz <span class="text-orange">najnowsze</span> produkty
			</h2>
			<div class="row">
				<div class="col-12">
					<?php echo do_shortcode('[products limit="4" columns="4" orderby="date" order="DESC" visibility="visible" offset="2"]'); ?>

				</div>
			</div>
			<div class="py-3 text-center">
				<?php $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) ); ?>
				<a class="btn-main-sn btn-transparent-sn" href="<?php echo $shop_page_url ?>">
					<?php _e('Wszystkie produkty' , 'web14devsn'); ?>
				</a>
			</div>
		</div>
	</div>
</section>