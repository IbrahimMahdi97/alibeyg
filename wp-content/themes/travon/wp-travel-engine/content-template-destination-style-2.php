<?php
/**
 * The template for displaying trips according to trip_types .
 *
 * @package Wp_Travel_Engine
 * @subpackage Wp_Travel_Engine/includes/templates
 * @since 1.0.0
 */

?>
<div class="travon-custom-wraper">
<div
	id="wp-travel-trip-wrapper" 
	itemscope
	itemtype="http://schema.org/LocalBusiness">

	<div class="wp-travel-engine-archive-outer-wrap">
		<?php
			global $post;
			// $termID       = get_queried_object()->term_id; // Parent A ID
			$termchildren = get_terms(
				$taxonomy,
				array(
					'orderby' => apply_filters( "wpte_{$taxonomy}_terms_order_by", 'date' ),
					'order'   => apply_filters( "wpte_{$taxonomy}_terms_order", 'ASC' ),
				)
			);
			$terms_by_ids = array();

			if ( is_array( $termchildren ) ) {
				foreach ( $termchildren as $term_object ) {
					$term_object->children  = array();
					$term_object->link      = get_term_link( $term_object->term_id );
					$term_object->thumbnail = (int) get_term_meta( $term_object->term_id, 'category-image-id', true );
					if ( isset( $terms_by_ids[ $term_object->term_id ] ) ) {
						foreach ( (array) $terms_by_ids[ $term_object->term_id ] as $prop_name => $prop_value ) {
							$term_object->{$prop_name} = $prop_value;
						}
					}
					if ( $term_object->parent ) {
						if ( ! isset( $terms_by_ids[ $term_object->parent ] ) ) {
							$terms_by_ids[ $term_object->parent ] = new \stdClass();
						}
						$terms_by_ids[ $term_object->parent ]->children[] = $term_object->term_id;
					}

					$terms_by_ids[ $term_object->term_id ] = $term_object;
				}
			}
			if ( ! empty( $terms_by_ids ) ) {
				?>
				
				<div class="activities-holder row gy-30 ot-carousel slider-shadow " data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-xs-slide-show="1" data-arrows="true">
						<?php
							$show_taxonomy_children = wte_array_get( get_option( 'wp_travel_engine_settings', array() ), 'show_taxonomy_children', 'no' ) === 'yes';

						foreach ( $terms_by_ids as $term_id => $term_object ) {
							if ( $term_object->parent && ! $show_taxonomy_children ) {
								continue;
							}
							?>
							<div class="col-xl-3 col-lg-4 col-md-6">
								<div class="trip-box">
									<address
										itemprop="address"
										style="display: none;"><?php echo esc_html( $term_object->name ); ?></address>
									<div class="trip-box__img wpte-trip-category-img-wrap">
										<figure class="thumbnail">
											<a href="<?php echo esc_url( $term_object->link ); ?>">
											<?php
												$term_object->thumbnail && print( \wp_get_attachment_image(
													$term_object->thumbnail,
													apply_filters( 'wp_travel_engine_activities_img_size', 'activities-thumb-size' ),
													false,
													array( 'itemprop' => 'image' )
												) );
											?>
											</a>
										</figure>
										<!--  -->
									</div>
									<!-- <div class="wpte-trip-category-text-wrap"> -->
									<div class="trip-box__content">
			                            <h2 class="trip-box__title box-title"><i class="fas fa-location-dot"></i> <a href="<?php echo esc_url( $term_object->link ); ?>"><?php echo esc_html( $term_object->name ); ?></a></h2>
			                            <span class="trip-box__count"><?php printf( _n( '(%d Trip)', '(%d Trips)', (int) $term_object->count, 'wp-travel-engine' ), (int) $term_object->count ); ?></span>
			                        </div>
										<!--  -->
									<!-- </div> -->
								</div>
							</div>
							<?php
						}
						?>
				</div>
				<?php
			}?>
		
	</div>
</div>
</div>
