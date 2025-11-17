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
class Travon_Group_Image extends Widget_Base {

	public function get_name() {
		return 'travongroupimage';
	}

	public function get_title() {
		return __( 'Travon Group Image', 'travon' );
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
				'label' 	=> __( 'Group Image', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'iamge_style',
			[
				'label' 	=> __( 'Group Style', 'travon' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'travon' ),
					'2' 		=> __( 'Style Two', 'travon' ),
					'3' 		=> __( 'Style Three', 'travon' ),
					'4' 		=> __( 'Style Four', 'travon' ),
					'5' 		=> __( 'Style Five', 'travon' ),
					'6' 		=> __( 'Style Six', 'travon' ),
					'7' 		=> __( 'Style Seven', 'travon' ),
					'8' 		=> __( 'Style Eight', 'travon' ),
					'9' 		=> __( 'Style Nine', 'travon' ),
				],
			]
		);

        $this->add_control(
			'image1',
			[
				'label' 		=> __( 'Image 1', 'travon' ),
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
			'image2',
			[
				'label' 		=> __( 'Image 2', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition' => ['iamge_style!' => ['6', '8', '9']]
			]
		);
		$this->add_control(
			'image3',
			[
				'label' 		=> __( 'Image 3', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> ['iamge_style' => ['1', '2', '4']]
			]
		);
		$this->add_control(
			'vdo_url',
			[
				'label' 		=> __( 'Video Url', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'  	=> __( '#', 'travon' ),
				'condition'	=> ['iamge_style' => '2']
			]
		);
		$this->add_control(
			'experience_year',
			[
				'label' 		=> __( 'Year', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'  		=> __( '1992', 'travon' ),
				'condition'		=> ['iamge_style' => ['3','6']]
			]
		);
		$this->add_control(
			'experience_text',
			[
				'label' 		=> __( 'Text', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'  		=> __( 'Since in our Company', 'travon' ),
				'condition'		=> ['iamge_style' => ['3', '4', '6', '7']]
			]
		);


        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['iamge_style'] == '1' ){
        	echo '<div class="img-box1">';
        		if (!empty( $settings['image1']['url'] )) {
	                echo '<div class="img1">';
	                    echo travon_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty( $settings['image2']['url'] )) {
	                echo '<div class="img2">';
	                    echo travon_img_tag( array(
		                    'url'   => esc_url( $settings['image2']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty( $settings['image3']['url'] )) {
	                echo '<div class="shape1">';
	                    echo travon_img_tag( array(
		                    'url'   => esc_url( $settings['image3']['url']  ),
		                ));
	                echo '</div>';
	            }
            echo '</div>';
	    } elseif ( $settings['iamge_style'] == '2' ) {
			echo '<div class="img-box2">';

                if (!empty( $settings['image1']['url'] )) {
	                echo '<div class="img1">';
	                    echo travon_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty( $settings['image2']['url'] )) {
	                echo '<div class="ot-video" data-overlay="title" data-opacity="2">';
	                    echo '<img src="'.esc_url( $settings['image2']['url']  ).'" alt="Video">';
	                    echo '<a href="'.esc_url( $settings['vdo_url'] ).'" class="play-btn popup-video"><i class="fas fa-play"></i></a>';
	                echo '</div>';
	            }

                if (!empty( $settings['image3']['url'] )) {
	                echo '<div class="shape1">';
	                    echo travon_img_tag( array(
		                    'url'   => esc_url( $settings['image3']['url']  ),
		                ));
	                echo '</div>';
	            }
            echo '</div>';
		} elseif ( $settings['iamge_style'] == '3' ) {
			echo '<div class="img-box4">';

                if (!empty( $settings['image1']['url'] )) {
	                echo '<div class="img1">';
	                    echo travon_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty( $settings['image2']['url'] )) {
	                echo '<div class="img2">';
	                    echo '<img src="'.esc_url( $settings['image2']['url']  ).'" alt="Image">';
	                echo '</div>';
	            }
                echo '<div class="about-history">';
					if (!empty( $settings['experience_year'])) {
						echo '<h4 class="year">'.$settings['experience_year'].'</h4>';
					}
					if (!empty( $settings['experience_text'])) {
						echo '<p class="text">'.$settings['experience_text'].'</p>';
					}
				echo '</div>';
            echo '</div>';
		} elseif ( $settings['iamge_style'] == '4' ) {
	    	echo '<div class="img-box6">';

                if (!empty( $settings['image1']['url'] )) {
	                echo '<div class="img1">';
	                    echo travon_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                ));
	                echo '</div>';
	            }
                if (!empty( $settings['image2']['url'] )) {
	                echo '<div class="shape1">';
	                    echo travon_img_tag( array(
		                    'url'   => esc_url( $settings['image2']['url']  ),
		                ));
	                echo '</div>';
	            }
				echo '<div class="box-content">';
					if (!empty( $settings['experience_text'])) {
						echo '<h5 class="title">'.$settings['experience_text'].'</h5>';
					}
					if (!empty( $settings['image3']['url'] )) {
						echo '<div class="img">';
							echo travon_img_tag( array(
								'url'   => esc_url( $settings['image3']['url']  ),
							));
						echo '</div>';
					}
				echo '</div>';
            echo '</div>';
	    } elseif ( $settings['iamge_style'] == '5' ) {
	    	echo '<div class="img-box7">';

                if (!empty( $settings['image1']['url'] )) {
	                echo '<div class="img1">';
	                    echo travon_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                ));
	                echo '</div>';
	            }
                if (!empty( $settings['image2']['url'] )) {
	                echo '<div class="img2">';
	                    echo travon_img_tag( array(
		                    'url'   => esc_url( $settings['image2']['url']  ),
		                ));
	                echo '</div>';
	            }
            echo '</div>';
	    } elseif ( $settings['iamge_style'] == '6' ) {
	    	echo '<div class="img-box9">';

                if (!empty( $settings['image1']['url'] )) {
	                echo '<div class="img1">';
	                    echo travon_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                ));
	                echo '</div>';
	            }
                echo '<div class="year-counter">';
					if (!empty( $settings['experience_year'])) {
						echo '<h4 class="year-counter_number">'.$settings['experience_year'].'</h4>';
					}
					if (!empty( $settings['experience_text'])) {
						echo '<p class="year-counter_text">'.$settings['experience_text'].'</p>';
					}
				echo '</div>';
            echo '</div>';
	    } elseif ( $settings['iamge_style'] == '7' ) {
	    	echo '<div class="text-xl-end text-center">';
				echo '<div class="img-box10">';

					if (!empty( $settings['image1']['url'] )) {
						echo '<div class="img1">';
							echo travon_img_tag( array(
								'url'   => esc_url( $settings['image1']['url']  ),
							));
						echo '</div>';
					}
					echo '<div class="box-content">';
						if (!empty( $settings['experience_text'])) {
							echo '<div class="box-text">'.$settings['experience_text'].'</div>';
						}
						if (!empty( $settings['image2']['url'] )) {
							echo '<div class="img spin">';
								echo travon_img_tag( array(
									'url'   => esc_url( $settings['image2']['url']  ),
								));
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
            echo '</div>';
	    } elseif ( $settings['iamge_style'] == '8' ) {
	    	echo '<div class="text-xl-end text-center">';
				echo '<div class="img-box11">';
					if (!empty( $settings['image1']['url'] )) {
						echo '<div class="img1">';
							echo travon_img_tag( array(
								'url'   => esc_url( $settings['image1']['url']  ),
							));
						echo '</div>';
					}
				echo '</div>';
            echo '</div>';
	    } elseif ( $settings['iamge_style'] == '9' ) {
	    	echo '<div class="text-xl-end text-center">';
				echo '<div class="img-box12">';
					if (!empty( $settings['image1']['url'] )) {
						echo '<div class="img1">';
							echo travon_img_tag( array(
								'url'   => esc_url( $settings['image1']['url']  ),
							));
						echo '</div>';
					}
				echo '</div>';
            echo '</div>';
	    }
	}
}