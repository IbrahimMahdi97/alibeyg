<?php
/**
 * Content wrappers
 *
 * Closing divs are left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/wp-travel-engine/single-trip/trip-content-wrapper-start.php.
 *
 * @package Wp_Travel_Engine
 * @subpackage Wp_Travel_Engine/includes/templates
 * @since @release-version //TODO: change after travel muni is live
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div id="wte-crumbs">
	<?php
	do_action( 'wp_travel_engine_breadcrumb_holder' );
	?>
</div>

<div id="wp-travel-trip-wrapper" class="trip-content-area container">
	<!-- <div class="container"> -->
	<div class="row">
		<div id="primary" class="content-area col-xxl-8 col-lg-7">
			<?php
			/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
