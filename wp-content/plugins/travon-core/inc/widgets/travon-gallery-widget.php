<?php
/**
* @version  1.0
* @package  travon
*
* Websites: 
*
*/

/**************************************
* Creating CTA Widget
***************************************/

class travon_gallery_widget extends WP_Widget {

        function __construct() {
        
            parent::__construct(
                // Base ID of your widget
                'travon_gallery_widget', 
            
                // Widget name will appear in UI
                esc_html__( 'Travon :: Gallery', 'travon' ),
            
                // Widget description
                array( 
                    'customize_selective_refresh'   => true,  
                    'description'                   => esc_html__( 'Add Subscribed Widget', 'travon' ),   
                    'classname'                     => 'no-class',
                )
            );

        }
    
        // This is where the action happens
        public function widget( $args, $instance ) {
            
            $title      = ( !empty( $instance['title'] ) ) ? $instance['title'] : "";  
   
            //before and after widget arguments are defined by themes
            echo $args['before_widget']; 

            echo '<h3 class="widget_title">'.esc_html($title).'</h3>';
            echo '<div class="sidebar-gallery">';

                $travon_gallery_image_widget = travon_opt( 'travon_gallery_image_widget' );

                foreach( $travon_gallery_image_widget as $data ){
                    echo '<div class="gallery-thumb">';
                        echo '<img src="'.esc_url( $data['image'] ).'" alt="Gallery Image">';
                        echo '<a href="'.esc_url( $data['image'] ).'" class="gallery-btn popup-image"><i class="fas fa-plus"></i></a>';
                    echo '</div>';
                }
                
            echo '</div>';

            echo $args['after_widget'];
            echo '<!-- End of Author Widget -->';
        }
            
        // Widget Backend 
        public function form( $instance ) {
    
            //Title 
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }

            
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'travon'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>   
            <?php 
        }
    
        
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            
            $instance = array();
            $instance['title']                  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }
    } // Class travon_gallery_widget ends here
    

    // Register and load the widget
    function travon_gallery_widget() {
        register_widget( 'travon_gallery_widget' );
    }
    add_action( 'widgets_init', 'travon_gallery_widget' );