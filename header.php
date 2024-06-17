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
		
		<nav class="navbar navbar-expand-lg navbar-light p-0" role="navigation">
		    <div class="container-lg navbar-container-sn">

			  	<?php if (!is_plugin_active('megamenu/megamenu.php')): ?>
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#sn-navbar-collapse-1" aria-controls="sn-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Przełacz menu', 'web14devsn' ); ?>">
			        <span class="navbar-toggler-icon"></span>
			    </button>
			    
			        <?php
			        wp_nav_menu( array(
			            'theme_location'    => 'menu-primary',
			            'depth'             => 2,
			            'container'         => 'div',
			            'container_class'   => 'collapse navbar-collapse',
			            'container_id'      => 'sn-navbar-collapse-1',
			            'menu_class'        => 'nav navbar-nav',
			            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			            'walker'            => new WP_Bootstrap_Navwalker(),
			        ) );
			        ?>

			    <?php endif; ?>

		    </div>
		    
		</nav>

	</header><!-- #masthead -->


