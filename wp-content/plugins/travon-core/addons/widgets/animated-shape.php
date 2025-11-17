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
 * Image Widget .
 *
 */
class travon_Animated_Image extends Widget_Base {

	public function get_name() {
		return 'travonshapeimage';
	}

	public function get_title() {
		return __( 'travon Animated Image', 'travon' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Image', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'travon' ),
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
			'effect_style',
			[
				'label' 		=> esc_html__( 'Add Styling Attributes', 'travon' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
					'jump'  			=> esc_html__( 'Jumping Effect', 'travon' ),
					'jump-reverse'  	=> esc_html__( 'Jumping Reverse Effect', 'travon' ),
					'movingX'  			=> esc_html__( 'Moving Effect', 'travon' ),
					'moving'  			=> esc_html__( 'Moving Effect', 'travon' ),
					'movingTopRight'  	=> esc_html__( 'Moving to Right Effect', 'travon' ),
					'spin'				=> esc_html__( 'Spin Effect', 'travon' ),
					''					=> esc_html__( 'No Effect', 'travon' ),
				],
				'default' => [ 'jump'],
			]
		);
		$this->add_control(
			'from_top',
			[
				'label' 		=> __( 'Top', 'travon' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
			]
		);
		$this->add_control(
			'from_left',
			[
				'label' 		=> __( 'Left', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);
		$this->add_control(
			'from_right',
			[
				'label' 		=> __( 'Right', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);
		$this->add_control(
			'from_bottom',
			[
				'label' 		=> __( 'Bottom', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);

		$this->add_control(
			'responsive_style',
			[
				'label' 		=> esc_html__( 'Responsive Styling', 'travon' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT2,
				'multiple' 		=> true,
				'options' 		=> [
					'z-index-negative'  => esc_html__( 'Z Index Nagative', 'travon' ),
					'd-none d-xl-block'  		=> esc_html__( 'Hide From large Device', 'travon' ),
					'd-none d-lg-block'  		=> esc_html__( 'Hide From Tablet', 'travon' ),
					'd-none d-md-block'  		=> esc_html__( 'Hide From Mobile', 'travon' ),
					'd-none d-sm-block'  		=> esc_html__( 'D SM Block', 'travon' ),
					'd-none'  			=> esc_html__( 'Display None', 'travon' ),
					' '  				=> esc_html__( 'Default', 'travon' ),
				],
			]
		);
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('_wrapper','class','shape-mockup');

        $this->add_render_attribute('wrapper','class','shape-mockup');
        $this->add_render_attribute('wrapper','class', $settings['effect_style']);
        $this->add_render_attribute('wrapper','class', $settings['responsive_style']);


        if($settings['from_bottom']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-bottom', $settings['from_bottom']['size'] .'%' );
	    }
	    if($settings['from_top']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-top', $settings['from_top']['size'] .'%' );
	    }
	    if($settings['from_right']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-right', $settings['from_right']['size'] .'%' );
	    }
	    if($settings['from_left']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-left', $settings['from_left']['size'] .'%' );
	    }




        if( !empty( $settings['image']['id'] ) ) {
            echo '<!-- Image -->';
                echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					echo '<img src="'.esc_url( $settings['image']['url']).'" alt="'.esc_html( get_bloginfo('name') ).'" >';
                echo '</div>';
            echo '<!-- End Image -->';
        }
	}
}