<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
/**
 *
 * List Widget .
 *
 */
class Travon_List extends Widget_Base {

	public function get_name() {
		return 'travonlist';
	}

	public function get_title() {
		return __( 'Travon List', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'list_section',
			[
				'label'     => __( 'Travon List', 'travon' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'List Style', 'travon' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'travon' ),
					'2' 		=> __( 'Style Two', 'travon' ),
					'3' 		=> __( 'Style Three', 'travon' ),
					'4' 		=> __( 'Style Four', 'travon' ),
				],
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'list_text', [
				'label' 		=> esc_html__( 'List Text', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'List Text' , 'travon' ),
				'placeholder' 	=> esc_html__( 'List Text', 'travon' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
		$this->add_control(
			'list_icon', [
				'label' 		=> __( 'List Icon', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '<i class="fas fa-circle-check"></i>' , 'travon' ),
				'placeholder' 	=> __( '<i class="fas fa-circle-check"></i>', 'travon' ),
				'rows' 			=> 2,
			]
        );
        
		$this->add_control(
			'upload_image',
			[
				'label' 		=> __( 'Upload Image?', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'travon' ),
				'label_off' 	=> __( 'No', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
		);
        $this->add_control(
			'icon_img',
			[
				'label' 		=> __( 'Icon Image', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> TRAVON_PLUGDIRURI.'assets/img/check_2.svg',
				],
				'condition'		=> [ 'upload_image' =>  ['yes']  ],
			]
		);
		$this->add_control(
			'list_repeater',
			[
				'label' 		=> __( 'List Items', 'travon' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'list_text' 		=> __( 'List Item', 'travon' ),
					],
				],
				'title_field' 	=> '{{{ list_text }}}',
			]
		);

        $this->end_controls_section();

        //------------------------------------Style Control------------------------------------//

		$this->start_controls_section(
			'list_styling',
			[
				'label' 	=> __( 'List Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'list_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} li > i' => 'color: {{VALUE}}',
				]
			],
        );
		$this->add_control(
			'list_text_color',
			[
				'label' 		=> __( 'Text Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} li' => 'color: {{VALUE}}',
				]
			],
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'list_typography',
				'label' 	=> __( 'List Typography', 'travon' ),
                'selector' 	=> '{{WRAPPER}} li',
			]
        );

		$this->end_controls_section();

	}

	protected function render() {
 
        $settings = $this->get_settings_for_display();

        if ( $settings['layout_style'] == '1' ) {
            $style_class = '';
		} elseif ( $settings['layout_style'] == '2' ) {
			$style_class = ' style2';
		} elseif ( $settings['layout_style'] == '3' ) {
			$style_class = ' style3';
		} elseif ( $settings['layout_style'] == '4' ) {
			$style_class = ' style4';
		}

        if ( $settings['upload_image'] == 'yes' ) {
            $icon = travon_img_tag( array(
                'url'   => esc_url( $settings['icon_img']['url']  ),
            ));
		} else {
			$icon = $settings['list_icon'];
		}

        
		echo '<div class="checklist'.$style_class.'">';
			echo '<ul>';
			foreach( $settings['list_repeater'] as $data ) {
				if( ! empty( $data['list_text']) ){
					echo '<li>'.wp_kses_post($icon).esc_html($data['list_text']).'</li>';
				}
			}
			echo '</ul>';
		echo '</div>';
		
	}
}