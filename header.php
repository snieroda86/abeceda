<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package web14devsn
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header">

		<div class="header-top-bar">
			<div class="container-lg">
				<div class="row">
					<div class="col-lg-4 d-lg-block d-none">
						<div class="header-contact-box d-flex">
							<!-- Phone  -->
							<?php 
							$numer_telefonu_header = get_field('numer_telefonu_header','option');
							$adres_email_header = get_field('adres_email_header','option');

							?>
							<?php if( $numer_telefonu_header ): ?>
							<div class="contact-item-sn d-flex me-4">
								<div class="d-flex align-items-center pe-2">
									<img src="<?php echo PATH_SN ?>/uploads/mobile.svg" alt="Phone">
								</div>
								<div>
									<p><a href="tel:<?php echo esc_html($numer_telefonu_header); ?>">
										<?php echo esc_html($numer_telefonu_header); ?>
									</a></p>
								</div>
							</div>
							<?php endif; ?>
							<!-- Email -->
							<?php if( $adres_email_header ): ?>
							<div class="contact-item-sn d-flex">
								<div class="d-flex align-items-center pe-2">
									<img src="<?php echo PATH_SN ?>/uploads/envelope.svg" alt="Email">
								</div>
								<div>
									<p><a href="mailto:<?php echo esc_html($adres_email_header); ?>">
										<?php echo esc_html($adres_email_header); ?>
									</a></p>
								</div>
							</div>
							<?php endif; ?>

						</div>
						
					</div>
					<div class="col-lg-8 col-12">
						<div class="secondary-top-menu">
							<?php
				            wp_nav_menu(array(
				                'theme_location' => 'menu-top-header',
				                'container' => false,
				                'menu_class' => '',
				                'fallback_cb' => '__return_false',
				                'items_wrap' => '<ul id="%1$s" class="top-nav m-auto  %2$s">%3$s</ul>',
				                'depth' => 1,
				                
				            ));
				            ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<nav class="navbar navbar-expand-lg navbar-light d-block">
		    <div class="header-middle-bar">
		    	<div class="container-lg">
		    		<div class="row">
			    		<div class="col-12 d-flex flex-wrap align-items-center">
			    			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
				            	<img src="<?php echo PATH_SN ?>/uploads/menu.png" alt="Menu">
				        	</button>
					        <div class="site-logo"> 
					        	<?php 
						        if ( function_exists( 'the_custom_logo' ) ) {
									the_custom_logo();
								}
						        ?>	
					        </div>

					        <div class="header-search-bar ms-auto">
					        	<?php echo do_shortcode('[fibosearch]'); ?>
					        </div>	
					    <?php if ( class_exists( 'woocommerce' ) ): ?>
				        	<div class="header-shop-icons d-flex align-items-center">
					        	<div class="header-shop-icon-item">
					        		<?php $account_page_url = get_permalink( get_option('woocommerce_myaccount_page_id')); ?>
					        		<?php if($account_page_url): ?>
					        			<a href="<?php echo esc_url($account_page_url); ?>" class="d-block">
					        				<div class="text-center i-header-wrap">
					        					<img src="<?php echo PATH_SN ?>/uploads/user.png" alt="User">
					        				</div>
					        				<div class="hsi-label">
					        					<p class="text-center">
					        						<?php _e('Profil' , 'web14devsn'); ?>
					        					</p>
					        				</div>
					        			</a>
					        		<?php endif; ?>
					        	</div>
					        	<div class="header-shop-icon-item">
					        		<?php if ( is_active_sidebar( 'h-widget-1' ) ) { ?>
									    <?php dynamic_sidebar('h-widget-1'); ?>
									<?php } ?>
					        	</div>
					        	<div class="header-shop-icon-item">
					        		<a href="#" class="d-block shopping-cart-icon-sidecart">
				        				<div class="text-center i-header-wrap pos-relative">
				        					<img src="<?php echo PATH_SN ?>/uploads/shopping-bag.png" alt="bag">
				        					<div class="header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
				        				</div>
				        				<div class="hsi-label">
				        					<p class="text-center">
				        						<?php _e('Koszyk' , 'web14devsn'); ?>
				        					</p>
				        				</div>
				        			</a>
					        	</div>
					        </div>

				        <?php else: ?>
				        	<small><?php _e('Woocommerce plugin in not activated' , 'web14devsn'); ?></small>
				    	<?php endif; ?>
				       
			    		</div>
			    	</div>	
		    	</div>
		    	
		    </div>

		    <div class="header-bottom-bar">
		    	<div class="container-lg">
		    		<!-- Menu -->
			    	<div class="row">
			    		<div class="col-12">
			    			<div class="collapse navbar-collapse" id="main-menu">
					            <?php
					            wp_nav_menu(array(
					                'theme_location' => 'menu-primary',
					                'container' => false,
					                'menu_class' => '',
					                'fallback_cb' => '__return_false',
					                'items_wrap' => '<ul id="%1$s" class="navbar-nav m-auto  %2$s">%3$s</ul>',
					                'depth' => 2,
					                'walker' => new bootstrap_5_wp_nav_menu_walker()
					            ));
					            ?>

					            <div class="secondary-menu-mobile d-block d-lg-none">
					            	<?php
						            wp_nav_menu(array(
						                'theme_location' => 'menu-top-header',
						                'container' => false,
						                'menu_class' => '',
						                'fallback_cb' => '__return_false',
						                'items_wrap' => '<ul id="%1$s" class="top-nav m-auto  %2$s">%3$s</ul>',
						                'depth' => 1,
						                
						            ));
						            ?>
					            </div>
					        </div>
			    		</div>
			    	</div>	
		    	</div>
		    	
		    </div>
		    </div>
		    
		</nav>

		<!-- Sidebar - shopping cart -->
		<div id="shopping-cart-sidebar-sn" class="sidebar-sn">
			<div class="sidebar-shopping-cart-header d-flex">
				<div class="col">
					<h5>Twój koszyk</h5>
				</div>
				<div class="col">
					<div id="sidebar-sc-close-btn">
						<img src="<?php echo PATH_SN ?>/uploads/close.svg" alt="Zamknij">
					</div>
				</div>	
			</div>
		    <div>
		        <div class="minicart-warpper">
		            <div id="minicart-sn">
		                <?php woocommerce_mini_cart(); ?>
		            </div>
		        </div>
		    </div>
		</div>

		<!-- Sidebar overlay -->
		<div class="sidebar-cart-overlay"> 
		</div>
		<!-- Sidebar cart end -->

	</header><!-- #masthead -->


