<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 *
 * Blog Post Widget .
 *
 */
class Travon_Blog_Post extends Widget_Base {

	public function get_name() {
		return 'travonblogpost';
	}

	public function get_title() {
		return __( 'Travon Blog Post', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'blog_post_section',
			[
				'label' => __( 'Blog Post', 'travon' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'blog_slider_style',
			[
				'label' 		=> __( 'Blog Style', 'travon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'travon' ),
					'two' 			=> __( 'Style Two', 'travon' ),
					'three' 		=> __( 'Style Three', 'travon' ),
				],
			]
		);
        $this->add_control(
			'blog_post_count',
			[
				'label' 	=> __( 'No of Post to show', 'travon' ),
                'type' 		=> Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => count( get_posts( array('post_type' => 'post', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default'  	=> __( '4', 'travon' )
			]
        );

		$this->add_control(
			'title_count',
			[
				'label' 	=> __( 'Title Length', 'travon' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '5', 'travon' ),
			]
		);

        $this->add_control(
			'blog_post_order',
			[
				'label' 	=> __( 'Order', 'travon' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ASC'   	=> __('ASC','travon'),
                    'DESC'   	=> __('DESC','travon'),
                ],
                'default'  	=> 'DESC'
			]
        );

        $this->add_control(
			'blog_post_order_by',
			[
				'label' 	=> __( 'Order By', 'travon' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ID'    	=> __( 'ID', 'travon' ),
                    'author'    => __( 'Author', 'travon' ),
                    'title'    	=> __( 'Title', 'travon' ),
                    'date'    	=> __( 'Date', 'travon' ),
                    'rand'    	=> __( 'Random', 'travon' ),
                ],
                'default'  	=> 'ID'
			]
        );

        $this->add_control(
			'exclude_cats',
			[
				'label' 		=> __( 'Exclude Categories', 'travon' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->travon_get_categories(),
			]
        );

        $this->add_control(
			'exclude_tags',
			[
				'label' 		=> __( 'Exclude Tags', 'travon' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->travon_get_tags(),
			]
        );

        $this->add_control(
			'exclude_post_id',
			[
				'label'         => __( 'Exclude Post', 'travon' ),
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
				'options'       => $this->travon_post_id(),
			]
        );
        $this->add_control(
			'read_more',
			[
				'label' 	=> __( 'Read More Text', 'travon' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Read More', 'travon' ),
			]
        );
		$this->add_control(
			'con_count',
			[
				'label' 	=> __( 'Content Length', 'traga' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '10', 'traga' ),
			]
		);
		$this->add_control(
			'show_btn',
			[
				'label' 		=> __( 'Show Button', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'travon' ),
				'label_off' 	=> __( 'Hide', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
				'condition'		=> [ 'blog_slider_style' => [ 'three' ] ],
			]
		);
        $this->end_controls_section();

		//------------------------------------ Slider Control------------------------------------//

		$this->start_controls_section(
			'slider_control',
			[
				'label'     => __( 'Slider Control', 'travon' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'make_it_slider',
			[
				'label' 		=> __( 'Use it as slider ?', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'travon' ),
				'label_off' 	=> __( 'Hide', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'slider_id',
			[
				'label'     => __( 'Slider ID', 'travon' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'	=> [ 'make_it_slider' => [ 'yes' ] ],
			]
        );
		$this->add_control(
			'desktop_items',
			[
				'label' 		=> __( 'Items To Show', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 		=> 0,
						'step' 		=> 1,
						'max' 		=> 10,
					],
				],
				'default' 		=> [
					'unit' 			=> '%',
					'size' 			=> 3,
				],
				'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'laptop_items',
			[
				'label' 		=> __( 'Laptop Items', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max' 	=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 2,
				],
				'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
			]
		);

        $this->add_control(
			'tablet_items',
			[
				'label' 		=> __( 'Tablet Items', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max' 	=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 2,
				],
				'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
			]
		);

        $this->add_control(
			'mobile_items',
			[
				'label' 		=> __( 'Mobile Items', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max' 	=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 1,
				],
				'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'small_mobile_items',
			[
				'label' 		=> __( 'Small Mobile Items', 'travon' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' 		=> [
					'%' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max' 	=> 10,
					],
				],
				'default' 	=> [
					'unit' 		=> '%',
					'size' 		=> 1,
				],
				'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'show_dots',
			[
				'label' 		=> __( 'Show Dots ?', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'travon' ),
				'label_off' 	=> __( 'Hide', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
		);
		$this->add_control(
			'show_arrow',
			[
				'label' 		=> __( 'Show Arrow ?', 'travon' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'travon' ),
				'label_off' 	=> __( 'Hide', 'travon' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->end_controls_section();

		/*-----------------------------------------general styling------------------------------------*/

		$this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'General Styling', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'con_bg_color',
			[
				'label' 		=> __( 'Post Background Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-card'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .blog-content'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' 			=> 'border',
				'label' 		=> esc_html__( 'Border', 'travon' ),
				'selector' 		=> '{{WRAPPER}} .blog-content',
			]
		);
		$this->add_control(
			'date_bg_color',
			[
				'label' 		=> __( 'Date Background Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-wide .blog-date a'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        
        $this->end_controls_section();


        /*-----------------------------------------meta styling------------------------------------*/

		$this->start_controls_section(
			'meta_style',
			[
				'label' 	=> __( 'Meta', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' 		=> __( 'Meta Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-meta a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'meta_hvr_color',
			[
				'label' 		=> __( 'Meta HoverColor', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-meta a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'meta_typography',
				'label' 	=> __( 'Meta Typography', 'travon' ),
				'selector' 	=> '{{WRAPPER}} .blog-meta a',
			]
		);

		$this->add_control(
			'admin_color',
			[
				'label' 		=> __( 'Author Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-box .author-name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'author_typography',
				'label' 	=> __( 'Author Typography', 'travon' ),
				'selector' 	=> '{{WRAPPER}} .blog-box .author-name',
			]
		);
		$this->end_controls_section();

		/*-----------------------------------------title styling------------------------------------*/

        $this->start_controls_section(
			'blog_title_styling',
			[
				'label' 	=> __( 'Title Styling', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'blog_title_color',
			[
				'label' 		=> __( 'Title Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_control(
			'blog_title_hvr_color',
			[
				'label' 		=> __( 'Title Hover Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a:hover'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'blog_title_typography',
		 		'label' 		=> esc_html__( 'Title Typography', 'travon' ),
		 		'selector' 		=> '{{WRAPPER}} .blog-title a',
		 	]
		);

        $this->add_responsive_control(
			'blog_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'blog_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        //----------------------------------button styling----------------------------------//

        $this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'btn_color',
			[
				'label' 		=> __( 'Button Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .link-btn' => 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_hvr_color',
			[
				'label' 		=> __( 'Button Hover Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .link-btn:hover'	=> 'color: {{VALUE}}!important;',
				],
				'condition'		=> [ 'blog_slider_style' =>  ['two', 'three']  ],
			]
        );

        $this->add_control(
			'btn_hvr_color1',
			[
				'label' 		=> __( 'Button Gradient Hover Color 1', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> '--theme-color: {{VALUE}}!important;',
				],
				'condition'		=> [ 'blog_slider_style' =>  ['one']  ],
			]
        );
        $this->add_control(
			'btn_hvr_color2',
			[
				'label' 		=> __( 'Button Gradient Hover Color 2', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> '--theme-color2: {{VALUE}}!important;',
				],
				'condition'		=> [ 'blog_slider_style' =>  ['one']  ],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography',
		 		'label' 		=> __( 'Typography', 'travon' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-btn, {{WRAPPER}} .link-btn'
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' 		=> __( 'Text Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .link-btn'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_text_hvr_color',
			[
				'label' 		=> __( 'Text Hover Color', 'travon' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn:hover'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .link-btn:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'travon' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .link-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .vs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .link-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .vs-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'		=> [ 'blog_slider_style' =>  ['one']  ],
			]
		);
        $this->end_controls_section();

		
    }

    public function travon_get_categories() {
        $cats = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'travon');
        }

        return $catarr;
    }

    public function travon_get_tags() {
        $cats = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'travon');
        }

        return $catarr;
    }

    // Get Specific Post
    public function travon_post_id(){
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
        );

        $travon_post = new WP_Query( $args );

        $postarray = [];

        while( $travon_post->have_posts() ){
            $travon_post->the_post();
            $postarray[get_the_Id()] = get_the_title();
        }
        wp_reset_postdata();
        return $postarray;
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $exclude_post = $settings['exclude_post_id'];

        if( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats']
            );
        } elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags']
            );
        }elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
            );
        } elseif( empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'post__not_in'          => $exclude_post
            );
        } else {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true
            );
        }

		if($settings['make_it_slider'] == 'yes'){
			$this->add_render_attribute( 'wrapper', 'class', ' row slider-shadow ot-carousel' );
			$this->add_render_attribute( 'wrapper', 'id', $settings['slider_id'] );
			$this->add_render_attribute( 'wrapper', 'data-slide-show', $settings['desktop_items']['size'] );
			$this->add_render_attribute( 'wrapper', 'data-lg-slide-show', $settings['laptop_items']['size'] );
			$this->add_render_attribute( 'wrapper', 'data-md-slide-show', $settings['tablet_items']['size'] );
			$this->add_render_attribute( 'wrapper', 'data-sm-slide-show', $settings['mobile_items']['size'] );
			$this->add_render_attribute( 'wrapper', 'data-xs-slide-show', $settings['small_mobile_items']['size'] );

			if($settings['show_dots'] == 'yes'){
				$this->add_render_attribute( 'wrapper', 'data-dots', true );
			}	
			if($settings['show_arrow'] == 'yes'){
				$this->add_render_attribute( 'wrapper', 'data-arrows', true );
			}	
		}else{
			$this->add_render_attribute( 'wrapper', 'class', 'row gy-30' );
		}


        $blogpost = new WP_Query( $args );

        // echo do_shortcode( '[Wte_Advanced_Search_Form]' );

        if ( $settings['blog_slider_style'] == 'one' ) {
	        if ( $blogpost->have_posts() ) {
	        	echo '<div '.$this->get_render_attribute_string('wrapper').'>';
            
					while( $blogpost->have_posts() ) {$blogpost->the_post();
						$categories = get_the_category();    
						echo '<div class="col-md-6 col-xl-4">';
							echo '<div class="blog-card">';
								if(has_post_thumbnail()){
									echo '<div class="blog-img">';
										the_post_thumbnail('travon_420X280');
									echo '</div>';
								}
								echo '<div class="blog-content">';
									echo '<div class="blog-meta">';
										echo '<a href="'.esc_url( travon_blog_date_permalink() ).'"><i class="fas fa-calendar-days"></i>'.esc_html( get_the_date( 'd M, Y' ) ).'</a>';
										echo '<a href="'. esc_url( get_category_link( $categories[0]->term_id ) ) . '"><i class="fas fa-tags"></i> '.esc_html( $categories[0]->name ).'</a>';
									echo '</div>';
									if( get_the_title() ){
										echo '<h3 class="blog-title box-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
									}
									if(!empty($settings['read_more'])){
										echo '<a href="'.esc_url( get_permalink() ).'" class="link-btn">'.esc_html($settings['read_more']).'<i class="fas fa-arrow-right"></i></a>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					wp_reset_postdata();
					
				echo '</div>';
	        }
	    } elseif ( $settings['blog_slider_style'] == 'two' ) {
			echo '<div '.$this->get_render_attribute_string('wrapper').'>';
				while( $blogpost->have_posts() ) {$blogpost->the_post();
					$categories = get_the_category();
					echo '<div class="col-md-6 col-xl-4">';
						echo '<div class="blog-box">';
							echo '<div class="blog-meta">';
								echo '<a href="'. esc_url( get_category_link( $categories[0]->term_id ) ) . '"><i class="far fa-tags"></i>';
									echo esc_html( $categories[0]->name );
								echo'</a>';
							echo '</div>';
							if( get_the_title() ){
								echo '<h3 class="blog-title box-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
							}
							echo '<div class="blog-meta">';
								echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="fas fa-user"></i>'.esc_html__('By ', 'travon').esc_html( ucwords( get_the_author() ) ).'</a>';
								echo '<a href="'.esc_url( travon_blog_date_permalink() ).'"><i class="fal fa-calendar-days"></i>'.	esc_html( get_the_date( 'd M, Y' ) ).'</a>';
								echo '</div>';
							if(has_post_thumbnail()){
								echo '<div class="blog-img">';
									the_post_thumbnail( 'travon_387X300' );
								echo '</div>';
							}
							echo '<div class="blog-content">';
								if(!empty($settings['read_more'])){
									echo '<a href="'.esc_url( get_permalink() ).'" class="link-btn">'.esc_html($settings['read_more']).'<i class="fas fa-arrow-up-right"></i></a>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}  
			echo '</div>';
	    } elseif ( $settings['blog_slider_style'] == 'three' ) {
			if ( $blogpost->have_posts() ) {
	        	echo '<div '.$this->get_render_attribute_string('wrapper').'>';
            
					while( $blogpost->have_posts() ) {$blogpost->the_post();
						$categories = get_the_category();    
						echo '<div class="col-md-6 col-xl-4">';
							echo '<div class="blog-block">';
								if(has_post_thumbnail()){
									echo '<div class="blog-img">';
										the_post_thumbnail('travon_420X350');
										if(!empty($settings['read_more'])){
											echo '<a href="'.esc_url( get_permalink() ).'" class="icon-btn"><i class="fas fa-arrow-up-right"></i></a>';
										}
									echo '</div>';
								}
								echo '<div class="blog-content">';
									echo '<div class="blog-meta">';
										echo '<a href="'.esc_url( travon_blog_date_permalink() ).'"><i class="fas fa-calendar-days"></i>'.esc_html( get_the_date( 'd M, Y' ) ).'</a>';
										echo '<a href="'. esc_url( get_category_link( $categories[0]->term_id ) ) . '"><i class="fas fa-tags"></i> '.esc_html( $categories[0]->name ).'</a>';
									echo '</div>';
									if( get_the_title() ){
										echo '<h3 class="blog-title box-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
									}
									if ( $settings['show_btn'] == 'yes' ) {
										echo '<div class="blog-bottom">';
											if(!empty($settings['read_more'])){
												echo '<a href="'.esc_url( get_permalink() ).'" class="link-btn">'.esc_html($settings['read_more']).'<i class="fas fa-arrow-up-right"></i></a>';
											}
										echo '</div>';
									} else {
										echo '<p class="box-text">'.esc_html( wp_trim_words( get_the_content(), $settings['con_count'], '' ) ).'</p>';
									}
									
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					wp_reset_postdata();
					
				echo '</div>';
	        }
		}
	}
}