
<section  class="section-bg-grey">
	<div class="section-wrapper-sn">
		<div class="container-lg">
			<div class="row">
    <!-- Desktop version -->
    <div class="col-12 d-sm-block d-none">
        <div class="hero-section-home pos-relative">
            <div class="hero-image" style="background:url(<?php echo esc_url(get_field('hero_tlo_desktop')); ?>);background-size: cover;background-position: right center;">
                <div class="hero-text-area">
                    <?php if(get_field('hero_naglowek')): ?>
                    <h1><?php the_field('hero_naglowek'); ?></h1>
                    <?php endif; ?>
                    <?php if(get_field('hero_opis')): ?>
                    <p><?php the_field('hero_opis'); ?></p>
                    <?php endif; ?>
                    <?php 
                    $hero_button_label = get_field('hero_etykieta_przycisku');
                    $hero_button_url = get_field('hero_link_do_przycisku');
                    if( $hero_button_label && $hero_button_url ): ?>
                        <a href="<?php echo esc_url($hero_button_url); ?>" class="btn-main-sn btn">
                            <?php echo esc_html($hero_button_label); ?>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
            <div class="hero-shadow"></div>
        </div>
    </div>
    <!-- Mobile version -->
    <div class="col-12 d-sm-none d-block mt-5">
        <div class="hero-text-area text-center">
            <?php if(get_field('hero_naglowek')): ?>
            <h1 class="mb-3"><?php the_field('hero_naglowek'); ?></h1>
            <?php endif; ?>
            <?php if(get_field('hero_opis')): ?>
            <p class="mb-4"><?php the_field('hero_opis'); ?></p>
            <?php endif; ?>
            <?php 
            if( $hero_button_label && $hero_button_url ): ?>
                <a href="<?php echo esc_url($hero_button_url); ?>" class="btn-main-sn btn">
                    <?php echo esc_html($hero_button_label); ?>
                </a>
            <?php endif; ?>

        </div>
    </div>
    <div class="col-12 d-sm-none d-block mt-5">
        <?php if($hero_mobile = get_field('hero_obrazek_mobile')): ?>
        <div class="about-img-home pos-relative">
            <img class="img-fluid pos-relative z-2 about-img" src="<?php echo esc_url($hero_mobile['url']); ?>" alt="<?php echo esc_attr($hero_mobile['alt']); ?>">
            <div class="about-img-shadow"></div>
        </div>
        <?php endif; ?>
    </div>
</div>

		</div>
	</div>
</section>







