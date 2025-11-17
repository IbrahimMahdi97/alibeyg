<?php
/**
 * Template part for displaying grid posts
 * 
 * This template can be overridden by copying it to yourtheme/wp-travel-engine/content-grid.php.
 * 
 * @package Wp_Travel_Engine
 * @subpackage Wp_Travel_Engine/includes/templates
 * @since @release-version //TODO: change after travel muni is live
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $wp;
global $post;

$meta        = \wte_trip_get_trip_rest_metadata( get_the_id() );


?>


<div class="col-xl-3 col-lg-4 col-md-6" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">

    <div class="tour-deal">
        <div class="tour-deal__img">

            <?php $size = apply_filters('wp_travel_engine_archive_trip_feat_img_size','destination-thumb-trip-size'); 


                if( has_post_thumbnail() ) :
                    the_post_thumbnail( 'travon_307X307' );                        
                else : 
                    wte_get_fallback_svg( 'travon_307X307' );
                endif; ?>

            <?php if( $discount_percent ) : ?>
            <span class="tour-deal__tag"><?php echo $discount_percent . esc_html__('% Off','travon') ; ?></span>
            <?php endif; ?>       
        </div>
        <div class="tour-deal__content">
            <div class="tour-offer__top">
                <?php 
                    echo '<h3 class="tour-deal__title box-title"><a href="'.get_the_permalink().'">'.esc_html( wp_trim_words( get_the_title( ), 3, '' ) ).'</a></h3>';
                ?>
                <span class="tour-deal__price"><span class="price"><?php echo wte_esc_price( wte_get_formated_price( $display_price ) ); ?></span></span>
            </div>
            <?php
                if( ! empty( $destination ) ) : ?>
                <span class="tour-offer__subtitle"><?php echo wp_kses_post($destination) ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>