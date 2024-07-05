<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package web14devsn
 */

if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
	return;
}
?>

<!-- Desktop -->
<div class="desktop-main-filter">
    <?php  if ( is_active_sidebar( 'sidebar-shop' ) ) { ?>
        
            <?php dynamic_sidebar('sidebar-shop'); ?>
        
    <?php  } ?>
</div>
