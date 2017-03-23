<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package base
 */

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}
?>

<div class="widget-area" id="secondary" role="complementary">

	<?php dynamic_sidebar( 'right-sidebar' ); ?>

</div><!-- #secondary -->
