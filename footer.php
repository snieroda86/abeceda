<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package web14devsn
 */

?>		
						
	<footer id="colophon" class="site-footer">
		
		<div class="container-lg footer-container-sn">

			<div class="row">
				<div class="col-12 pb-4">
					<img class="img-fluid"  src="<?php echo PATH_SN ?>/uploads/logo-color.png" alt="Logo">
				</div>
			</div>
			<!-- Widget area -->
			<div class="row widget-area-footer-sn">
				<!-- Widget -->
				<div class="col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="widget-item-footer mb-3">
						<?php if ( is_active_sidebar( 'f-widget-1' ) ) { ?>
						    <aside>
						        <?php dynamic_sidebar('f-widget-1'); ?>
						    </aside>
						<?php } ?>
					</div>
				</div>
				<!-- Widget end -->
				<!-- Widget -->
				<div class="col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="widget-item-footer mb-3">
						<?php if ( is_active_sidebar( 'f-widget-2' ) ) { ?>
						    <aside>
						        <?php dynamic_sidebar('f-widget-2'); ?>
						    </aside>
						<?php } ?>
					</div>
				</div>
				<!-- Widget end -->
				<!-- Widget -->
				<div class="col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="widget-item-footer mb-3">
						<?php if ( is_active_sidebar( 'f-widget-3' ) ) { ?>
						    <aside>
						        <?php dynamic_sidebar('f-widget-3'); ?>
						    </aside>
						<?php } ?>
					</div>
				</div>
				<!-- Widget end -->
				<!-- Widget -->
				<div class="col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="widget-item-footer mb-3">
						<?php if ( is_active_sidebar( 'f-widget-4' ) ) { ?>
						    <aside>
						        <?php dynamic_sidebar('f-widget-4'); ?>
						    </aside>
						<?php } ?>
					</div>
				</div>
				<!-- Widget end -->
			</div>
			<!-- Copyrights -->
			<div class="row copyr-row-sn pt-5">

				<div class="col-sm-6 col-12">
					
					<p class="py-3 footer-text">
						 © <span> Copyrights</span> <span><?php echo date('Y') ?></span> |  Wszelkie prawa zastrzeżone. 
					</p>
					
				</div>

				<div class="col-sm-6 col-12">
					<p class="text-sm-end text-center">Powered by</p>
				</div>
				
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- Back to top btn -->
<button class="backToTopBtn">
	<svg xmlns="http://www.w3.org/2000/svg" width="14" viewBox="0 0 448 512"><path fill="#fff" d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z"/></svg>
</button>

<script type="text/javascript">
	jQuery(document).ready(function($){
		/*
		sticky header
		----------------
		*/
		var navbar = $('nav.navbar');
		var navbarPosition = navbar.offset().top;
		var bottomBar = $('.header-bottom-bar');
		var topBar = $('.header-top-bar');
		var pageBody = $('div#page');

		function handleScroll() {
			var scrollValue = $(window).scrollTop();
			if ($(window).width() > 991) {
				if (scrollValue > navbarPosition) {
					navbar.addClass('sticky');
					pageBody.css("padding-top", "167px");
					topBar.css("opacity", "0");
					bottomBar.css({
						"padding": "5px 0",
						"box-shadow": "0px 9px 50px -10px rgba(66, 68, 90, 0.16)",
					});
				} else {
					navbar.removeClass('sticky');
					pageBody.css("padding-top", "0");
					topBar.css("opacity", "1");
					bottomBar.css({
						"padding": "20px 0",
						"box-shadow": "none",
					});
				}
			} else {
				
				navbar.removeClass('sticky');
				pageBody.css("padding-top", "0");
				topBar.css("opacity", "1");
				bottomBar.css({
					"padding": "20px 0",
					"box-shadow": "none",
				});
			}
		}

		$(window).scroll(handleScroll);
		$(window).resize(handleScroll);
		// handleScroll(); 
	});

</script>

<?php wp_footer(); ?>

</body>
</html>
