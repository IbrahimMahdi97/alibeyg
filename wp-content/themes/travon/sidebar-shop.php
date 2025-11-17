<?php
	// Block direct access
	if( ! defined( 'ABSPATH' ) ){
		exit( );
	}
	/**
	* @Packge 	   : Travon
	* @Version     : 1.0
	* @Author     : Adivaha
    * @Author URI : https://www.adivaha.com/
	*
	*/

	if( ! is_active_sidebar( 'travon-woo-sidebar' ) ){
		return;
	}
?>
<div class="col-xxl-4 col-lg-5">
	<!-- Sidebar Begin -->
	<aside class="sidebar-area shop-sidebar">
		<?php
			dynamic_sidebar( 'travon-woo-sidebar' );
		?>
	</aside>
	<!-- Sidebar End -->
</div>