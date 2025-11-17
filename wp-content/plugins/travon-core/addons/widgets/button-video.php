<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * VideoButton Widget .
 *
 */
class Travon_VideoButton extends Widget_Base {

	public function get_name() {
		return 'travonvideobutton';
	}

	public function get_title() {
		return __( 'Video Button', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'videobutton_section',
			[
				'label' 	=> __( 'Video Button', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'button_icon',
			[
				'label' 	=> __( 'Video Button Icon', 'travon' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( '<i class="fas fa-play"></i>', 'travon' )
			]
        );

        $this->add_control(
			'video_link',
			[
				'label' 		=> __( 'Video Link', 'travon' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'travon' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> 'https://www.youtube.com/watch?v=_sI_Ps7JSEk',
				],
			]
		);
        $this->add_control(
			'button_style_class',
			[
				'label' 	=> __( 'Style Class', 'travon' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( '', 'travon' )
			]
        );
        $this->add_control(
			'popup_video',
			[
				'label' 		=> __( 'Popup Video?', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'travon' ),
				'label_off' 	=> __( 'No', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $this->add_responsive_control(
			'videobutton_align',
			[
				'label' 		=> __( 'Alignment', 'travon' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'travon' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'travon' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'travon' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 		=> 'left',
				'toggle' 		=> true,
				'selectors' 	=> [
					'{{WRAPPER}} ' => 'text-align: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();

        /* -------------------------- Style -------------------------------*/

        $this->start_controls_section(
			'videobutton_style_section',
			[
				'label' 	=> __( 'VideoButton Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );


        $this->add_control(
			'videobutton_size',
			[
				'label' 		=> __( 'Button Size', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
                'size_units' 	=> ['px'],
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn > i' => '--icon-size: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'videobutton_color',
			[
				'label' 		=> __( 'Button Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn > i' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'videobutton_color_hover',
			[
				'label' 		=> __( 'VideoButton Color Hover', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:hover > i' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'videobutton_bg_color',
			[
				'label' 		=> __( 'Background Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn > i' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'videobutton_bg_hover_color',
			[
				'label' 		=> __( 'Background Hover Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:hover > i' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'videobutton_ripple_color',
			[
				'label' 		=> __( 'Ripple Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:before, {{WRAPPER}} .play-btn:after' => 'background-color:{{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'videobutton_ripple_hover_color',
			[
				'label' 		=> __( 'Hover Ripple Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:hover:before, {{WRAPPER}} .play-btn:hover:after' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .play-btn > i',
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border_hover',
				'label' 	=> __( 'Border Hover', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .play-btn: > i',
			]
		);
        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'videobutton', 'href', esc_url( $settings['video_link']['url'] ) );
        $this->add_render_attribute( 'videobutton', 'class', 'play-btn' );
        $this->add_render_attribute( 'videobutton', 'class',  esc_attr( $settings['button_style_class'] ));
        if ($active = $settings['popup_video'] == 'yes') {
            $this->add_render_attribute( 'videobutton', 'class', 'popup-video' );
        }

        echo '<a '.$this->get_render_attribute_string('videobutton').'>';
            echo wp_kses_post( $settings['button_icon'] );
        echo '</a>';
	}
}