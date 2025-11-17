<?php
/**
 * The template for displaying trips according to trip_types .
 *
 * @package Wp_Travel_Engine
 * @subpackage Wp_Travel_Engine/includes/templates
 * @since 1.0.0
 */

?>
<div id="wte-crumbs">
	<?php do_action( 'wp_travel_engine_breadcrumb_holder' ); ?>
</div>
<div
	id="wp-travel-trip-wrapper"
	class="trip-content-area"
	itemscope
	itemtype="http://schema.org/LocalBusiness">
	<div class="wp-travel-inner-wrapper">
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
					<div class="page-header">
							<?php
							$display_title = apply_filters( 'wpte_display_taxonomy_page_title', false );
							if ( $display_title ) :
								?>
								<h1 class="page-title" data-id="<?php echo esc_attr( $taxonomy ); ?>"><?php the_title(); ?></h1>
								<?php
								endif;
							?>
							<div class="page-feat-image">
								<?php
								$image_id    = get_post_thumbnail_id( $post->ID );
								$banner_size = apply_filters( 'wp_travel_engine_template_banner_size', 'full' );
								echo wp_get_attachment_image( $image_id, $banner_size );
								?>
							</div>
							<div class="page-content">
								<p>
									<?php
									$content = apply_filters( 'the_content', $post->post_content );
									echo $content;
									?>
								</p>
							</div>
					</div>
					<div class="<?php echo esc_attr( $taxonomy ); ?>-holder row wpte-trip-list-wrapper">
							<?php
								$show_taxonomy_children = wte_array_get( get_option( 'wp_travel_engine_settings', array() ), 'show_taxonomy_children', 'no' ) === 'yes';

							foreach ( $terms_by_ids as $term_id => $term_object ) {
								if ( $term_object->parent && ! $show_taxonomy_children ) {
									continue;
								}
								?>
								<div class="col-xl-3 col-lg-4 col-md-6 mb-35 wpte-trip-category">
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
										</div>
										<div class="trip-box__content">
				                            <h2 class="trip-box__title box-title"><i class="fas fa-location-dot"></i> <a href="<?php echo esc_url( $term_object->link ); ?>"><?php echo esc_html( $term_object->name ); ?></a></h2>
				                            <span class="trip-box__count"><?php printf( _n( '(%d Trip)', '(%d Trips)', (int) $term_object->count, 'wp-travel-engine' ), (int) $term_object->count ); ?></span>
				                        </div>
									</div>
								</div>
								<?php
							}
							?>
					</div>
					<?php
				} else {
					?>
			<div class="page-header">
				<h1 class="page-title"><?php the_title(); ?></h1>
				<div class="page-feat-image">
					<?php the_post_thumbnail();?>
				</div>
				<div class="page-content">
					<?php
						$content = apply_filters( 'the_content', $post->post_content );
						echo $content;
					?>
				</div>
			</div>
					<?php
				}
				?>
		</div>
	</div>
</div>
