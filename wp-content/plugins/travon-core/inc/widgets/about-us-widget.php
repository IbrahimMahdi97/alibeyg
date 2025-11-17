<?php
/**
* @version  1.0
* @package  travon
* @author   Travon <support@angfuzsoft.com>
*
* Websites: http://www.angfuzsoft.com
*
*/

/**************************************
* Creating About Us Widget
***************************************/

class travon_aboutus_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'travon_aboutus_widget',

                // Widget name will appear in UI
                esc_html__( 'Travon :: About Us Widget', 'travon' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add About Us Widget', 'travon' ),
                    'classname'                     => 'no-class',
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $about_us   = apply_filters( 'widget_about_us', $instance['about_us'] );
            $social_icon      = isset( $instance['social_icon'] ) ? $instance['social_icon'] : false;
            if ( isset( $instance[ 'aboutus_img_url' ] ) ) {
                $aboutus_img_url = $instance[ 'aboutus_img_url' ];
            }else {
                $aboutus_img_url = '#';
            }


            //before and after widget arguments are defined by themes
            echo $args['before_widget'];
                echo '<div class="ot-widget-about">';
                    echo '<div class="about-logo">';
                        if( !empty( $aboutus_img_url ) ){
                            echo '<a href="'.esc_url( home_url() ).'">';
                        }
                            if ( isset( $instance[ 'aboutus_img_url' ] ) ) {
                                $aboutus_img_url = $instance[ 'aboutus_img_url' ];
                                echo travon_img_tag( array(
                                    'url'   => esc_url( $aboutus_img_url ),
                                ) );
                            }
                        if( !empty( $aboutus_img_url ) ){
                            echo '</a>';
                        }
                    echo '</div>';
                    if( !empty( $about_us ) ){
                        echo '<p class="about-text">'.wp_kses_post( $about_us ).'</p>';
                    }
                    if( !empty( $btn_text ) ){
                        echo '<a href="'.esc_url($btn_url).'" class="ot-btn style5">'.esc_html($btn_text).'</a>';
                    }
                    if($social_icon){
                        echo '<div class="ot-social">';
                            travon_social_icon();
                        echo '</div>';
                    }
                echo '</div>';
            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

            //Image
            if ( isset( $instance[ 'aboutus_img' ] ) ) {
                $aboutus_img = $instance[ 'aboutus_img' ];
            }else {
                $aboutus_img = '';
            }

            //Image Url
            if ( isset( $instance[ 'aboutus_img_url' ] ) ) {
                $aboutus_img_url = $instance[ 'aboutus_img_url' ];
            }else {
                $aboutus_img_url = '';
            }
            
            if ( isset( $instance[ 'about_us' ] ) ) {
                $about_us = $instance[ 'about_us' ];
            }else {
                $about_us = '';
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

            $social_icon = isset( $instance['social_icon'] ) ? (bool) $instance['social_icon'] : false;
            
            // Widget admin form
            ?>
            
            <p>
                <input value="<?php echo esc_attr( $aboutus_img ); ?>" name="<?php echo $this->get_field_name( 'aboutus_img' ); ?>" type="hidden" class="widefat img_val" type="text" />
                <img class="img_show" src="<?php echo esc_url( $aboutus_img ); ?>" alt="">
            </p>


            <p>
                <button class="button about-up-btn"><?php ( empty( $aboutus_img ) ) ?  esc_html_e( "Upload Image", "travon" ) : esc_html_e( "Change Image", "travon" ); ?></button>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'aboutus_img_url' ); ?>"><?php _e( 'Image URL:' ,'travon'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'aboutus_img_url' ); ?>" name="<?php echo $this->get_field_name( 'aboutus_img_url' ); ?>" type="text" value="<?php echo esc_attr( $aboutus_img_url ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'about_us' ); ?>">
                    <?php
                        _e( 'About Us:' ,'dvpn');
                    ?>
                </label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'about_us' ); ?>" name="<?php echo $this->get_field_name( 'about_us' ); ?>" rows="8" cols="80"><?php echo esc_html( $about_us ); ?></textarea>
            </p>

            <p>
                <input class="checkbox" type="checkbox"<?php checked( $social_icon ); ?> id="<?php echo $this->get_field_id( 'social_icon' ); ?>" name="<?php echo $this->get_field_name( 'social_icon' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'social_icon' ); ?>"><?php _e( 'Display Social Icon?' ); ?></label>
            </p>
            <script>
            jQuery(function($){
                'use strict';
                /**
                 *
                 * About Widget About Us upload
                 *
                 */
                $( function(){
                    $(".img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                    $(document).on('widget-updated',function(event,widget){
                        var widget_id = $(widget).attr('id');
                        if(widget_id.indexOf('travon_aboutus_widget')!=-1){
                            $imgval = $(".img_val").val();
                            $(".img_show").attr("src",$imgval);
                            $(".img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                        }
                    });
                    $("body").off("click",".about-up-btn");
                    $("body").on("click",".about-up-btn",function( e ){

                        let frame = wp.media({
                            title: 'Select or Upload Media About Us',
                            button: {
                                text: 'Use this About Us'
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
            $instance['aboutus_img']        = ( ! empty( $new_instance['aboutus_img'] ) ) ? strip_tags( $new_instance['aboutus_img'] ) : '';
            $instance['aboutus_img_url']    = ( ! empty( $new_instance['aboutus_img_url'] ) ) ? strip_tags( $new_instance['aboutus_img_url'] ) : '';
            $instance['about_us']           = ( ! empty( $new_instance['about_us'] ) ) ? strip_tags( $new_instance['about_us'] ) : '';
            $instance['btn_text']           = ( ! empty( $new_instance['btn_text'] ) ) ? strip_tags( $new_instance['btn_text'] ) : '';
            $instance['btn_url']           = ( ! empty( $new_instance['btn_url'] ) ) ? strip_tags( $new_instance['btn_url'] ) : '';

            $instance['social_icon']      = isset( $new_instance['social_icon'] ) ? (bool) $new_instance['social_icon'] : false;
            return $instance;
        }
    } // Class travon_aboutus_widget ends here


    // Register and load the widget
    function travon_aboutus_load_widget() {
        register_widget( 'travon_aboutus_widget' );
    }
    add_action( 'widgets_init', 'travon_aboutus_load_widget' );