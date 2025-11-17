<?php
/**
* @version  1.0
* @package  mechon
* @author   Mechon <support@angfuzsoft.com>
*
* Websites: http://www.angfuzsoft.com
*
*/

/**************************************
* Creating CTA Widget
***************************************/

class travon_cta_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'travon_cta_widget',

                // Widget name will appear in UI
                esc_html__( 'Travon :: CTA Widget', 'travon' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add CTA Widget', 'travon' ),
                    'classname'                     => 'widget_offer',
                )
            );

        }

        

        // This is where the action happens
        public function widget( $args, $instance ) {

            $cta_heading   = apply_filters( 'widget_cta_heading', $instance['cta_heading'] );
            $cta_title   = apply_filters( 'widget_cta_title', $instance['cta_title'] );
            $cta_subtitle   = apply_filters( 'widget_cta_subtitle', $instance['cta_subtitle'] );

            $btn_text   = apply_filters( 'widget_btn_text', $instance['btn_text'] );
            $btn_url   = apply_filters( 'widget_btn_url', $instance['btn_url'] );
            if ( isset( $instance[ 'cta_img_url' ] ) ) {
                $cta_img_url = $instance[ 'cta_img_url' ];
            }else {
                $cta_img_url = '#';
            }

            $allowhtml = array(
                'a'    => array(
                    'href' => array()
                ),
                'span' => array(),
                'i'    => array(
                    'class' => array()
                )
            );

            //before and after widget arguments are defined by themes
            echo $args['before_widget'];
            
                echo '<div class="offer-banner">';
                    if( !empty( $cta_img_url ) ){
                        echo '<div class="banner-logo">';
                            echo travon_img_tag( array(
                                    'url'   => esc_url( $cta_img_url ),
                                ) );
                        echo '</div>';
                    }

                    if( !empty( $cta_heading ) ){
                        echo '<h5 class="banner-title">'.wp_kses_post( $cta_heading ).'</h5>';
                    }
                    

                    echo '<div class="offer">';
                        if( !empty( $cta_title ) ){
                            echo '<h6 class="offer-title">'.wp_kses_post( $cta_title ).'</h6>';
                        }
                        
                        if( !empty( $cta_subtitle ) ){
                            echo '<p class="offer-text">'.wp_kses_post( $cta_subtitle, $allowhtml ).'</p>';
                        }
                    echo '</div>';
                    if( !empty( $btn_text ) ){
                        echo '<a href="'.esc_url($btn_url).'" class="as-btn">'.esc_html($btn_text).'</a>';
                    }
                echo '</div>';
            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

            //Image
            if ( isset( $instance[ 'cta_img' ] ) ) {
                $cta_img = $instance[ 'cta_img' ];
            }else {
                $cta_img = '';
            }

            //Image Url
            if ( isset( $instance[ 'cta_img_url' ] ) ) {
                $cta_img_url = $instance[ 'cta_img_url' ];
            }else {
                $cta_img_url = '';
            }
            
            if ( isset( $instance[ 'cta_heading' ] ) ) {
                $cta_heading = $instance[ 'cta_heading' ];
            }else {
                $cta_heading = '';
            }
            if ( isset( $instance[ 'cta_title' ] ) ) {
                $cta_title = $instance[ 'cta_title' ];
            }else {
                $cta_title = '';
            }
            if ( isset( $instance[ 'cta_subtitle' ] ) ) {
                $cta_subtitle = $instance[ 'cta_subtitle' ];
            }else {
                $cta_subtitle = '';
            }

            //button text
            if ( isset( $instance[ 'btn_text' ] ) ) {
                $btn_text = $instance[ 'btn_text' ];
            }else {
                $btn_text = '';
            }

            //button link
            if ( isset( $instance[ 'btn_url' ] ) ) {
                $btn_url = $instance[ 'btn_url' ];
            }else {
                $btn_url = '';
            }

            
            // Widget admin form
            ?>
            
            <p>
                <input value="<?php echo esc_attr( $cta_img ); ?>" name="<?php echo $this->get_field_name( 'cta_img' ); ?>" type="hidden" class="widefat img_val" type="text" />
                <img class="img_show" src="<?php echo esc_url( $cta_img ); ?>" alt="">
            </p>


            <p>
                <button class="button about-up-btn"><?php ( empty( $cta_img ) ) ?  esc_html_e( "Upload Image", "mechon" ) : esc_html_e( "Change Image", "mechon" ); ?></button>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'cta_img_url' ); ?>"><?php _e( 'Image URL:' ,'travon'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'cta_img_url' ); ?>" name="<?php echo $this->get_field_name( 'cta_img_url' ); ?>" type="text" value="<?php echo esc_attr( $cta_img_url ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'cta_heading' ); ?>">
                    <?php
                        _e( 'Heading:' ,'dvpn');
                    ?>
                </label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'cta_heading' ); ?>" name="<?php echo $this->get_field_name( 'cta_heading' ); ?>" rows="8" cols="80"><?php echo esc_html( $cta_heading ); ?></textarea>
            </p>


            <p>
                <label for="<?php echo $this->get_field_id( 'cta_title' ); ?>">
                    <?php
                        _e( 'Title:' ,'dvpn');
                    ?>
                </label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'cta_title' ); ?>" name="<?php echo $this->get_field_name( 'cta_title' ); ?>" rows="8" cols="80"><?php echo esc_html( $cta_title ); ?></textarea>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'cta_subtitle' ); ?>">
                    <?php
                        _e( 'Subtitle:' ,'dvpn');
                    ?>
                </label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'cta_subtitle' ); ?>" name="<?php echo $this->get_field_name( 'cta_subtitle' ); ?>" rows="8" cols="80"><?php echo esc_html( $cta_subtitle ); ?></textarea>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'btn_text' ); ?>">
                    <?php
                        _e( 'Button' ,'dvpn');
                    ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'btn_text' ); ?>" name="<?php echo $this->get_field_name( 'btn_text' ); ?>" type="text" placeholder="<?php echo esc_attr__('Button Label', 'travon'); ?>" value="<?php echo esc_attr( $btn_text ); ?>" />
                <input class="widefat" id="<?php echo $this->get_field_id( 'btn_url' ); ?>" name="<?php echo $this->get_field_name( 'btn_url' ); ?>" type="text" placeholder="<?php echo esc_attr__('Button url', 'travon'); ?>" value="<?php echo esc_attr( $btn_url ); ?>" />
            </p>
            <script>
            jQuery(function($){
                'use strict';
                /**
                 *
                 * About Widget CTA upload
                 *
                 */
                $( function(){
                    $(".img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                    $(document).on('widget-updated',function(event,widget){
                        var widget_id = $(widget).attr('id');
                        if(widget_id.indexOf('travon_cta_widget')!=-1){
                            $imgval = $(".img_val").val();
                            $(".img_show").attr("src",$imgval);
                            $(".img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                        }
                    });
                    $("body").off("click",".about-up-btn");
                    $("body").on("click",".about-up-btn",function( e ){

                        let frame = wp.media({
                            title: 'Select or Upload Media CTA',
                            button: {
                                text: 'Use this CTA'
                            },
                            multiple: false
                        });

                        frame.on("select",function(){
                            // Get media attachment details from the frame state
                            let $img = frame.state().get('selection').first().toJSON();

                            $(".img_show").attr("src",$img.url);
                            $(".img_val").val($img.url);

                            $(".img_val").trigger('change');

                            $(".about-up-btn").text("Change Image");
                        });

                        // Open Media Modal
                        frame.open();
                        e.preventDefault();
                    });
                });
            });
            </script>
            <?php
        }


         // Updating widget replacing old instances with new
         public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['cta_img']        = ( ! empty( $new_instance['cta_img'] ) ) ? strip_tags( $new_instance['cta_img'] ) : '';
            $instance['cta_img_url']    = ( ! empty( $new_instance['cta_img_url'] ) ) ? strip_tags( $new_instance['cta_img_url'] ) : '';
            $instance['cta_heading']           = ( ! empty( $new_instance['cta_heading'] ) ) ? strip_tags( $new_instance['cta_heading'] ) : '';
            $instance['cta_title']           = ( ! empty( $new_instance['cta_title'] ) ) ? strip_tags( $new_instance['cta_title'] ) : '';
            $instance['cta_subtitle']           = ( ! empty( $new_instance['cta_subtitle'] ) ) ? strip_tags( $new_instance['cta_subtitle'] ) : '';
            $instance['btn_text']           = ( ! empty( $new_instance['btn_text'] ) ) ? strip_tags( $new_instance['btn_text'] ) : '';
            $instance['btn_url']           = ( ! empty( $new_instance['btn_url'] ) ) ? strip_tags( $new_instance['btn_url'] ) : '';

            return $instance;
        }
    } // Class travon_cta_widget ends here


    // Register and load the widget
    function travon_cta_load_widget() {
        register_widget( 'travon_cta_widget' );
    }
    add_action( 'widgets_init', 'travon_cta_load_widget' );