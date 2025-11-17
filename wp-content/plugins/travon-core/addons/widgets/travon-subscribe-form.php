<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Subscribe Form Widget .
 *
 */
class Travon_Subscribe_Form extends Widget_Base {

	public function get_name() {
		return 'travonsubscriber';
	}

	public function get_title() {
		return __( 'Travon Subscribe Form', 'travon' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'subscriber_section',
			[
				'label' 	=> __( 'Subscribe Area', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Subscribe Style', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'travon' ),
					'2' 		=> __( 'Style Two', 'travon' ),
					'3' 		=> __( 'Style Three', 'travon' ),
				],
			]
		);


        $this->add_control(
			'date', [
				'label' 		=> __( 'Offer End Date With Time', 'travon' ),
				'type' 			=> Controls_Manager::DATE_TIME,
				'label_block' 	=> true,
				'condition' => ['layout_style!' => ['3']]
			]
        );

        $this->add_control(
			'sub_image',
			[
				'label' 		=> __( 'Image', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
        );
        $this->add_control(
			'sub_icon',
			[
				'label' 		=> __( 'Subscribe Icon', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition' => ['layout_style' => ['3']]
			]
        );
        $this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
				'condition' => ['layout_style!' => ['3']]
			]
        );
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if ( $settings['layout_style'] == '1' ) {
			echo '<div class="subscribe-sec space-top">';
				echo '<div class="container">';
					echo '<div class="subscribe-wrap">';
						if( ! empty( $settings['sub_image']['url'] ) ){
							echo '<div class="subscribe-img">';
								echo travon_img_tag( array(
									'url'	=> esc_url( $settings['sub_image']['url'] ),
								) );
							echo '</div>';
						}

						echo '<div class="subscribe-content">';
							if( $settings['title'] ){
								echo '<h2 class="sec-title">'.esc_html( $settings['title'] ).'</h2>';
							}
							if( $settings['subtitle'] ){
								echo '<p class="subscribe-text">'.esc_html( $settings['subtitle'] ).'</p>';
							}
							echo '<form class="newsletter-form">';
								echo '<input class="form-control" type="email" placeholder="Enter Email Address" required="">';
								echo '<button type="submit" class="ot-btn">SUBCRIBE</button>';
							echo '</form>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		} elseif( $settings['layout_style'] == '2' ) {
			echo '<div class="newsletter-wrap" data-bg-src="'.esc_url( $settings['sub_image']['url'] ).'">';
				if( $settings['title'] ){
					echo '<h2 class="sec-title text-white mb-2">'.esc_html( $settings['title'] ).'</h2>';
				}
				if( $settings['subtitle'] ){
					echo '<p class="text-white fs-md mb-4">'.esc_html( $settings['subtitle'] ).'</p>';
				}
				echo '<form class="newsletter-form">';
					echo '<div class="form-group">';
						echo '<input class="form-control" type="email" placeholder="Email Address" required="">';
						echo '<i class="fal fa-envelope"></i>';
					echo '</div>';
					echo '<button type="submit" class="ot-btn">Subscribe</button>';
				echo '</form>';
			echo '</div>';
		} elseif( $settings['layout_style'] == '3' ) {
			echo '<div class="" data-bg-src="'.esc_url( $settings['sub_image']['url'] ).'">';
				echo '<div class="container">';
					echo '<div class="newsletter-wrap2">';
						echo '<div class="title-wrap">';
							if ( ! empty( $settings['sub_icon']['url'] ) ) {
								echo '<div class="text-center">';
									echo travon_img_tag( array(
										'url'   => esc_url( $settings['sub_icon']['url'] ),
									) );
								echo '</div>';
							}
							if( $settings['title'] ){
								echo '<h2 class="box-title text-white">'.esc_html( $settings['title'] ).'</h2>';
							}
						echo '</div>';
						echo '<form class="newsletter-form">';
							echo '<div class="form-group">'; 
								echo '<input class="form-control" type="email" placeholder="Email Address" required="">';
							echo '</div>';
							echo '<button type="submit" class="ot-btn">Subscribe</button>';
						echo '</form>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
	}
}