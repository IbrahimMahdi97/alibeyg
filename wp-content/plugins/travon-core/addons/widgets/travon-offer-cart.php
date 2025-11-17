<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Travon cart Widget .
 *
 */
class Travon_Cart extends Widget_Base{

	public function get_name() {
		return 'travoncart';
	}

	public function get_title() {
		return __( 'Travon Offer Cart', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'travon_cart_sec',
			[
				'label' 	=> __( 'Travon Cart', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
            'cart_iamge',
            [
                'label'     => __( 'Upload Cart Image', 'travon' ),
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
			'title',
            [
				'label'         => __( 'Title', 'travon' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'Product Name' , 'travon' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'offer_text',
            [
				'label'         => __( 'Offer Text', 'travon' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'Get a 20% Discount on This Week' , 'travon' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'btn_text',
            [
				'label'         => __( 'Button Ttile', 'travon' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Shop Now' , 'travon' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' 		=> __( 'Link', 'travon' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'travon' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->end_controls_section();

        /*-----------------------------------------title styling------------------------------------*/

        $this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h2'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'title_typography',
		 		'label' 		=> esc_html__( 'Title Typography', 'travon' ),
		 		'selector' 		=> '{{WRAPPER}} h2',
		 	]
		);

        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------offer styling------------------------------------*/

        $this->start_controls_section(
			'offer_styling',
			[
				'label' 	=> __( 'Offer Styling', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'offer_color',
			[
				'label' 		=> __( 'Offer Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .offer-text'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'offer_typography',
		 		'label' 		=> esc_html__( 'Offer Typography', 'travon' ),
		 		'selector' 		=> '{{WRAPPER}} .offer-text',
		 	]
		);

        $this->add_responsive_control(
			'offer_margin',
			[
				'label' 		=> __( 'Offer Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .offer-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'offer_padding',
			[
				'label' 		=> __( 'Offer Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .offer-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );


        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Button Color Hover', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Button Background Hover Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn:before' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .ot-btn',
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border_hover',
				'label' 	=> __( 'Border Hover', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .ot-btn:hover',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'travon' ),
                'selector' 	=> '{{WRAPPER}} .ot-btn',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ot-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Button Shadow', 'travon' ),
				'selector' => '{{WRAPPER}} .ot-btn',
			]
		);
        $this->end_controls_section();


       
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Cart----------------------->';
			$target_team 	= $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow_team 	= $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

	        if(!empty($settings['cart_iamge']['url'])){
				echo '<div class="offer-card" data-bg-src="'.esc_url($settings['cart_iamge']['url']).'">';
			}	
				if(!empty($settings['offer_text'])){
	                echo '<h2 class="offer-card__offer">'.wp_kses_post($settings['offer_text']).'</h2>';
	            }
	            if(!empty($settings['title'])){
	                echo '<h3 class="offer-card__text box-title">'.wp_kses_post($settings['title']).'</h3>';
	            }
                if( ! empty( $settings['btn_text'] ) ) {
	            	echo '<a '.wp_kses_post( $target_team.$nofollow_team ).' href="'.esc_url( $settings['btn_link']['url'] ).'" class="ot-btn">'.esc_html($settings['btn_text']).'</a>';
	            }
            if(!empty($settings['cart_iamge']['url'])){
	            echo '</div>';
	        }

		echo '<!-----------------------End Cart----------------------->';
	}
}