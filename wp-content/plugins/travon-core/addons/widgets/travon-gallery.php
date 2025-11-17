<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
/**
 *
 * Gallery Widget .
 *
 */
class Travon_Gallery extends Widget_Base{

	public function get_name() {
		return 'travongallery';
	}

	public function get_title() {
		return __( 'Travon Gallery', 'travon' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travon' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'gallery_section',
			[
				'label' 	=> __( 'Gallery', 'travon' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'layout',
			[
				'label' 	=> __( 'Gallery Style', 'travon' ),
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
		//---------------------------- repeter start--------------------------------//

        $this->add_control(
			'icon_btn', [
				'label' 		=> esc_html__( 'View Icon', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> '<i class="fas fa-eye"></i>',
				'placeholder' 	=> esc_html__( '<i class="fas fa-eye"></i>', 'travon' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );

		$this->add_control(
			'shape_image',
			[
				'label' 		=> __( 'Shape Image', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout' => [ '4' ] ],
			]
		);

		$repeater = new Repeater();
        $repeater->add_control(
			'gallery_image',
			[
				'label' 		=> __( 'Gallery Image', 'travon' ),
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
			'repeater_list',
			[
				'label' 		=> __( 'Images', 'travon' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'video_image'    => ['url'=> Utils::get_placeholder_image_src()]
					],
				],
                'condition'     => ['layout!' => '2']
			]
		);

        $repeater = new Repeater();
        $repeater->add_control(
			'video_image',
			[
				'label' 		=> __( 'Gallery Image', 'travon' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'video_link', [
				'label' 		=> esc_html__( 'Video Link', 'travon' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> 'https://www.youtube.com/watch?v=_sI_Ps7JSEk',
				'placeholder' 	=> esc_html__( 'https://www.youtube.com/watch?v=_sI_Ps7JSEk', 'travon' ),
				'rows' 			=> 2,
			]
        );
		$this->add_control(
			'video_list',
			[
				'label' 		=> __( 'Images', 'travon' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'gallery_image'    => ['url'=> Utils::get_placeholder_image_src()]
					],
				],
                'condition'     => ['layout' => '2']

			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

        if ( $settings['layout'] == '1' ) {
            echo '<div class="row gy-30 masonary-active">';
                foreach( $settings['repeater_list'] as $data ){
                    echo '<div class="col-md-6 col-xxl-auto filter-item">';
                        echo '<div class="gallery-card">';
                            echo '<div class="gallery-img">';
                                echo travon_img_tag( array(
                                    'url'	=> esc_url( $data['gallery_image']['url'] ),
                                ) );
                                echo '<a href="'.esc_url( $data['gallery_image']['url'] ).'" class="gallery-btn popup-image">'.wp_kses_post( $settings['icon_btn'] ).'</a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }  
            echo '</div>';
        } elseif ( $settings['layout'] == '2' ) {
            echo '<div class="row gy-30 masonary-active">';
                foreach( $settings['video_list'] as $data ){
                    echo '<div class="col-md-6 col-xxl-auto filter-item">';
                        echo '<div class="gallery-video">';
                            echo '<div class="gallery-img">';
                                echo travon_img_tag( array(
                                    'url'	=> esc_url( $data['video_image']['url'] ),
                                ) );
                                echo '<a href="'.esc_url( $data['video_link'] ).'" class="play-btn popup-video">'.wp_kses_post( $settings['icon_btn'] ).'</a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }  
            echo '</div>';
        } elseif ( $settings['layout'] == '3' ) {
            echo '<div class="row ot-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-focuson-select="false" data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true">';
                foreach( $settings['repeater_list'] as $data ){
                    echo '<div class="col-md-6 col-xl-4">';
                        echo '<div class="gallery-card">';
                            echo '<div class="gallery-img rounded-0">';
                                echo travon_img_tag( array(
                                    'url'	=> esc_url( $data['gallery_image']['url'] ),
                                ) );
                                echo '<a href="'.esc_url( $data['gallery_image']['url'] ).'" class="gallery-btn popup-image">'.wp_kses_post( $settings['icon_btn'] ).'</a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }  
            echo '</div>';
        } elseif ( $settings['layout'] == '4' ) {
            echo '<div class="row ot-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-focuson-select="false">';
				foreach( $settings['repeater_list'] as $index => $data ){
					echo '<div class="col-md-6 col-xl-4' . ($index % 2 === 0 ? ' mt-md-5' : '') . '">';
						echo '<div class="gallery-card">';
							echo '<div class="gallery-img rounded-0">';
								echo travon_img_tag( array(
									'url'	=> esc_url( $data['gallery_image']['url'] ),
								) );
								echo '<a href="'.esc_url( $data['gallery_image']['url'] ).'" class="gallery-btn popup-image">'.wp_kses_post( $settings['icon_btn'] ).'</a>';
								if (!empty( $settings['shape_image']['url'] )) {
									echo '<img src="' .esc_url( $settings['shape_image']['url']  ).'" alt="shape" class="gallery-shape">';
								}
								echo '</div>';
						echo '</div>';
					echo '</div>';
				}			
            echo '</div>';
        }
	}
}