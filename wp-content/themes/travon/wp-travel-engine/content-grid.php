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
$actual_link = home_url(add_query_arg(array(), $wp->request));

if( strpos($actual_link, '/trips') == true  ) {
    $col_layout = 'col-xl-6 col-lg-12 col-md-6 mb-30 tour-col';
}else{
    $col_layout = 'col-lg-4 col-md-6 used-js';
}

$meta        = \wte_trip_get_trip_rest_metadata( get_the_id() );


?>

<div class="<?php echo esc_attr($col_layout) ?>" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">


    <div class="tour-card">
        <div class="tour-card__img">
            <?php $size = apply_filters('wp_travel_engine_archive_trip_feat_img_size','destination-thumb-trip-size'); 


                if( has_post_thumbnail() ) :
                    the_post_thumbnail( $size );                        
                else : 
                    wte_get_fallback_svg( $size );
                endif; ?>

                <?php if( $discount_percent ) : ?>
                <div class="category-disc-feat-wrap">
                    <div class="category-trip-discount">
                        <span class="discount-offer">
                            <span><?php echo sprintf( __( '%1$s%% ', 'travel-booking' ), $discount_percent ); ?></span>
                        <?php _e( 'Off', 'travel-booking' );?></span>
                    </div>
                </div>
                <?php endif; ?>   


                <?php if ( wte_is_trip_featured( get_the_ID() ) ) : ?>
                <div class="category-feat-ribbon">
                    <span class="category-feat-ribbon-txt"><?php _e( 'Featured', 'travel-booking' );?></span>
                    <span class="cat-feat-shadow"></span>
                </div>
                <?php endif; ?>  


                <?php

                if (isset( $show_wishlist) ) {
                    $active_class = '';
                    $title_attribute = '';

                    $user_id = get_current_user_id();
                    $user_wishlists = get_user_meta( $user_id, 'wptravelengine_wishlists', true );
                    if( is_array( $user_wishlists )){
                        $active_class = in_array( get_the_id(), $user_wishlists ) ? ' active' : '';
                        $title_attribute = in_array( get_the_id(), $user_wishlists ) ? 'Already in wishlist' : 'Add to wishlist';
                    }
                ?>
                    <span class="wishlist-title"><?php __("Add to wishlist", "wp-travel-engine"); ?></span>
                    <a class="tour-card__tag wishlist-toggle<?php echo esc_attr( $active_class ); ?>" data-product="<?php echo esc_attr(get_the_id()); ?>" title="<?php echo __( $title_attribute, 'wp-travel-engine' ); ?>">
                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 19L8.55 17.7C6.86667 16.1834 5.475 14.875 4.375 13.775C3.275 12.675 2.4 11.6874 1.75 10.812C1.1 9.93736 0.646 9.13336 0.388 8.40002C0.129333 7.66669 0 6.91669 0 6.15002C0 4.58336 0.525 3.27502 1.575 2.22502C2.625 1.17502 3.93333 0.650024 5.5 0.650024C6.36667 0.650024 7.19167 0.833358 7.975 1.20002C8.75833 1.56669 9.43333 2.08336 10 2.75002C10.5667 2.08336 11.2417 1.56669 12.025 1.20002C12.8083 0.833358 13.6333 0.650024 14.5 0.650024C16.0667 0.650024 17.375 1.17502 18.425 2.22502C19.475 3.27502 20 4.58336 20 6.15002C20 6.91669 19.871 7.66669 19.613 8.40002C19.3543 9.13336 18.9 9.93736 18.25 10.812C17.6 11.6874 16.725 12.675 15.625 13.775C14.525 14.875 13.1333 16.1834 11.45 17.7L10 19Z" fill="#C6C6C6" />
                        </svg>
                    </a>
                <?php
                }?>
        </div>
        <div class="tour-card__content">
            <div class="tour-card__top">
                <?php if( ! empty( $destination ) ) : ?>
                <span class="category-trip-loc">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="11.213" height="15.81" viewBox="0 0 11.213 15.81">
                            <path id="Path_23393" data-name="Path 23393" d="M5.607,223.81c1.924-2.5,5.607-7.787,5.607-10.2a5.607,5.607,0,0,0-11.213,0C0,216.025,3.682,221.31,5.607,223.81Zm0-13.318a2.492,2.492,0,1,1-2.492,2.492A2.492,2.492,0,0,1,5.607,210.492Zm0,0" transform="translate(0 -208)" opacity="0.8"/>
                        </svg>
                    </i>
                    <span><?php echo wp_kses_post( $destination ); ?></span>
                </span>
                <?php endif; ?>

                <?php if ( wp_travel_engine_trip_has_reviews( get_the_ID() ) ) : ?>
                    <div class="tour-card__rating">
                        <div class="rating-rev rating-layout-1 smaller-ver">
                            <?php do_action( 'wte_trip_average_rating_star' );?>
                        </div>
                        <span class="category-trip-reviewcount">
                            <?php do_action( 'wte_trip_average_rating_based_on_text' );?>
                        </span>
                    </div>
                <?php endif; ?>
            </div>
            <h3 class="tour-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="tour-meta">
                <?php wte_get_template( 'components/content-trip-card-duration.php', compact( 'trip_duration_unit', 'trip_duration', 'trip_duration_nights', 'set_duration_type' ) ); ?>
                
                    <span><i class="fa-light fa-user-group"></i> <?php printf( __( '%s People', 'wptravelengine-elementor-widgets' ), (int) $meta->max_pax ? esc_html($meta->min_pax . '-' . $meta->max_pax) : $meta->min_pax ); ?></span>
                
            </div>

            <div class="tour-card__bottom">

                <?php if( ! empty( $display_price ) ) : ?>
                <div class="category-trip-budget">
                    <span class="price-holder">
                        <?php if( $on_sale ) : ?>
                        <span class="striked-price"><?php echo wte_get_formated_price_html( $trip_price ); ?></span>
                        <?php endif; ?>
                        <span class="actual-price"><?php echo wte_get_formated_price_html( $display_price ); ?></span>
                    </span>
                </div>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>" class="link-btn"><?php echo esc_html__('See Details ', 'travon') ?><i class="fas fa-arrow-up-right"></i></a>
            </div>
        </div>
    </div>
</div>

<?php
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */