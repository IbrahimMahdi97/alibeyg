<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Team Member Ifo Widget .
 *
 */
class Travon_Team_member_info_Widget extends Widget_Base{

	public function get_name() {
		return 'travonteammemberinfo';
	}

	public function get_title() {
		return esc_html__( 'Travon Team Member ifo', 'travon' );
	}

	public function get_icon() {
		return 'fa fa-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}
	public function get_script_depends() {
		return [ 'travon-frontend-script' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'team_member_content',
			[
				'label'		=> esc_html__( 'Team Member Informmation','travon' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content_name',
			[
				'label' 	=> esc_html__( 'Team Member Name', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Travon - Content Title', 'travon' ),
			]
        );

        $this->add_control(
			'content_desig',
			[
				'label' 	=> esc_html__( 'Team Member Designation', 'travon' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Travon - Content Title', 'travon' ),
			]
        );

        $this->add_control(
			'description',
			[
				'label' 	=> esc_html__( 'Description Text', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Continually utilize 24/365 bandwidth before real-time interfaces. Credibly grow team core competencies with pandemic commerce. Objectively initiate pandemic users with deliver bricks clicks meta services for bricks-and-clicks innovation streamline front end aradigms expedite granular human capital rather than intuitive testing procedures.', 'travon' ),
			]
        );

        $this->add_control(
			'd_o_b',
			[
				'label' 	=> esc_html__( 'Date Of Birth', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                'default'  	=> esc_html__( '<strong>Born on:</strong>May 23, 1987', 'travon' ),
			]
        );
        $this->add_control(
			'l_i',
			[
				'label' 	=> esc_html__( 'Lives In', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                'default'  	=> esc_html__( '<strong>lives in:</strong>Switzerland', 'travon' ),
			]
        );
        $this->add_control(
			'p_n',
			[
				'label' 	=> esc_html__( 'Pohne Number', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                'default'  	=> esc_html__( '<strong>Phone:</strong><a href="tel:+16322543654">+163 2254 3654</a>', 'travon' ),
			]
        );
        $this->add_control(
			'email',
			[
				'label' 	=> esc_html__( 'Email', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                'default'  	=> esc_html__( '<strong>Email:</strong><a href="mailto:michelm@travon.com">michelm@travon.com</a>', 'travon' ),
			]
        );
        $this->add_control(
			'education',
			[
				'label' 	=> esc_html__( 'Education', 'travon' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                'default'  	=> esc_html__( '<strong>Education:</strong>University of Boxon', 'travon' ),
			]
        );

		$this->end_controls_section();




		/*-----------------------------------------Feedback styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Content Styling', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);


		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Name', 'travon' ),
			]
		);
        $this->add_control(
			'overview_title_color',
			[
				'label' 		=> __( 'Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-card__title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} .about-card__title',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-card__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_title_padding',
			[
				'label' 		=> __( 'Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-card__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Designation', 'travon' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-card__desig'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} .about-card__desig',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-card__desig' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_content_padding',
			[
				'label' 		=> __( 'Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-card__desig' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab5',
			[
				'label' => esc_html__( 'Contwnt', 'travon' ),
			]
		);
		$this->add_control(
			'co_content_color',
			[
				'label' 		=> __( 'Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .desc_selector'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'co_content_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 	=> '{{WRAPPER}} .desc_selector',
			]
		);

        $this->add_responsive_control(
			'co_content_margin',
			[
				'label' 		=> __( 'Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .desc_selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'co_content_padding',
			[
				'label' 		=> __( 'Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .desc_selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
 

	}

	protected function render() {

		$settings = $this->get_settings_for_display(); 

		echo '<!-----------------------Start Team Member Info Area----------------------->';

		echo '<div class="about-card__box">';
            echo '<div class="about-card__top">';
                echo '<div>';
                	if(!empty($settings['content_name'])) {
	                    echo '<h2 class="about-card__title">'.esc_html($settings['content_name']).'</h2>';
	                }
	                if(!empty($settings['content_desig'])) {
	                    echo '<span class="about-card__desig">'.esc_html($settings['content_desig']).'</span>';
	                }
                echo '</div>';
            echo '</div>';
            echo '<h4 class="about-card__subtitle">Biography</h4>';
            if(!empty($settings['description'])) {
	            echo '<p class="mb-30 desc_selector">'.esc_html($settings['description']).'</p>';
	        }
            echo '<div class="about-info-wrap">';
            	if(!empty($settings['d_o_b'])) {
	                echo '<p class="about-info"><i class="fal fa-calendar-days"></i>'.htmlspecialchars_decode($settings['d_o_b']).'</p>';
	            }
	            if(!empty($settings['l_i'])) {
	                echo '<p class="about-info"><i class="fal fa-city"></i>'.htmlspecialchars_decode($settings['l_i']).'</p>';
	            }
	            if(!empty($settings['email'])) {
	                echo '<p class="about-info"><i class="fal fa-envelope"></i>'.htmlspecialchars_decode($settings['email']).'</p>';
	            }
	            if(!empty($settings['p_n'])) {
	                echo '<p class="about-info"><i class="fal fa-phone"></i>'.htmlspecialchars_decode($settings['p_n']).'</p>';
	            }
	            if(!empty($settings['education'])) {
	                echo '<p class="about-info"><i class="fal fa-school"></i>'.htmlspecialchars_decode($settings['education']).'</p>';
	            }
            echo '</div>';
        echo '</div>';
		echo '<!-----------------------End Team Member Info Area----------------------->';
	}
}