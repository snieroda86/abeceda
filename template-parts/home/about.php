<section  class="section-about">
	<div class="section-wrapper-sn ptb-80">
		<div class="container-lg">

			<?php if($opis_firmy = get_field('opis_firmy')): ?>
			<div class="row">
				<div class="col-md-6 pr-lg-5">
					<div class="about-ftr-img">
						<?php 
						$obrazek_sekcji_o_nas = $opis_firmy['obrazek_sekcji_o_nas'];
						$size = 'full'; // (thumbnail, medium, large, full or custom size)

						if( $obrazek_sekcji_o_nas ) {
						    echo wp_get_attachment_image( $obrazek_sekcji_o_nas, $size, false, array('class' => 'img-fluid') );
						}
						?>
					</div>
				</div>

				<div class="col-md-6">
					<div class="pt-md-0 pt-4">
						<h2 class="section-title-sn">
							<?php 
							$naglowek_sekcji_o_nas = $opis_firmy['naglowek_sekcji_o_nas'];
							echo  $naglowek_sekcji_o_nas;
							?>
						</h2>	
						<div class="about-desc">
							<div>
								<?php 
								$opis_sekcji_o_nas = $opis_firmy['opis_sekcji_o_nas'];
								echo  $opis_sekcji_o_nas;
								?>
							</div>

							<?php 
							$etykieta_przycisku_o_nas = $opis_firmy['etykieta_przycisku_o_nas'];
							$adres_url_przycisku_o_nas = $opis_firmy['adres_url_przycisku_o_nas'];

							if (!empty($etykieta_przycisku_o_nas) && !empty($adres_url_przycisku_o_nas)) :
							?>
							    <div class="pt-4">
							        <a href="<?php echo esc_url($adres_url_przycisku_o_nas); ?>" class="btn-main-sn">
							            <?php echo esc_html($etykieta_przycisku_o_nas); ?>
							        </a>
							    </div>
							<?php endif; ?>

						</div>
					</div>
					
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>