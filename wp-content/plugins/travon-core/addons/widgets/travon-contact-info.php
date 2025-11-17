<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
/**
 *
 * Contact Widget .
 *
 */
class Travon_Contact_Info extends Widget_Base{

	public function get_name() {
		return 'travoncontactinfo';
	}

	public function get_title() {
		return __( 'Contact Information', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'contact_section',
			[
				'label' 	=> __( 'Contact Information', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title',
			[
				'label' 	=> __( 'Title', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Get in Touch', 'travon' )
			]
        );
        $this->add_control(
            'shape_img',
            [
                'label'     => __( 'Shape Image', 'travon' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $this->add_control(
			'address_label',
			[
				'label' 	=> __( 'Address Label', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Our Address', 'travon' )
			]
        );
        $this->add_control(
			'address',
			[
				'label' 	=> __( 'Address', 'travon' ),
                'type' 		=> Controls_Manager::WYSIWYG,
			]
        );
        $this->add_control(
			'phone_label',
			[
				'label' 	=> __( 'Phone Label', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Our Phone', 'travon' )
			]
        );
        $this->add_control(
			'phone',
			[
				'label' 	=> __( 'Phone', 'travon' ),
                'type' 		=> Controls_Manager::WYSIWYG,
			]
        );
        $this->add_control(
			'email_label',
			[
				'label' 	=> __( 'Email Label', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Our Phone', 'travon' )
			]
        );
        $this->add_control(
			'email',
			[
				'label' 	=> __( 'Emails', 'travon' ),
                'type' 		=> Controls_Manager::WYSIWYG,
			]
        );
        
        
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Contact Form----------------------->';
			echo '<div class="contact-info-wrap">';
				if(!empty($settings['shape_img']['url'])){
					echo '<div class="shape-img">';
	                    echo '<img src="'.esc_url($settings['shape_img']['url']).'" alt="shape">';
	                echo '</div>';
	            }
				if( ! empty( $settings['title'] ) ){
	                echo '<h3 class="border-title2">'.esc_html( $settings['title'] ).'</h3>';
	            }
	            echo '<div class="contact-info-box">';
		            if( ! empty( $settings['phone_label'] ) ){
		            	echo '<div class="contact-info">';
	                        echo '<h4 class="contact-info__title">'.esc_html( $settings['phone_label'] ).'</h4>';
	                        echo '<div class="contact-info__icon"><i class="fal fa-phone"></i></div>';
	                        echo '<div class="media-body">';
	                            echo '<span class="contact-info__text">';
	                                if( ! empty( $settings['phone'] ) ){
				                    	echo wp_kses_post($settings['phone']);
				                    } 
	                            echo '</span>';
	                        echo '</div>';
	                    echo '</div>';
		            }
		            if( ! empty( $settings['email_label'] ) ){
		            	echo '<div class="contact-info">';
	                        echo '<h4 class="contact-info__title">'.esc_html( $settings['email_label'] ).'</h4>';
	                        echo '<div class="contact-info__icon"><i class="fal fa-envelope"></i></div>';
	                        echo '<div class="media-body">';
	                            echo '<span class="contact-info__text">';
	                                if( ! empty( $settings['email'] ) ){
				                    	echo wp_kses_post($settings['email']);
				                    } 
	                            echo '</span>';
	                        echo '</div>';
	                    echo '</div>';
		            }
		            if( ! empty( $settings['address_label'] ) ){
		            	echo '<div class="contact-info">';
	                        echo '<h4 class="contact-info__title">'.esc_html( $settings['address_label'] ).'</h4>';
	                        echo '<div class="contact-info__icon"><i class="fal fa-location-dot"></i></div>';
	                        echo '<div class="media-body">';
	                            echo '<span class="contact-info__text">';
	                                if( ! empty( $settings['address'] ) ){
				                    	echo wp_kses_post($settings['address']);
				                    } 
	                            echo '</span>';
	                        echo '</div>';
	                    echo '</div>';
		            }
	            echo '</div>';  
            echo '</div>';
		echo '<!-----------------------End Contact Form----------------------->';
	}
}