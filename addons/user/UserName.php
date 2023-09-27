<?php 
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;
class UserName extends \Elementor\Widget_Base{
    public function get_name() {
		return 'DashPress Username';
	}

	public function get_title() {
		return esc_html__( 'DashPressUsername', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'user', 'username' , 'dashpress' ];
	}

	protected function register_controls() {

		// Content Tab Start

		// $this->start_controls_section(
		// 	'section_title',
		// 	[
		// 		'label' => esc_html__( 'Title', 'elementor-addon' ),
		// 		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		// 	]
		// );

		// $this->add_control(
		// 	'title',
		// 	[
		// 		'label' => esc_html__( 'Title', 'elementor-addon' ),
		// 		'type' => \Elementor\Controls_Manager::TEXTAREA,
		// 		'default' => esc_html__( 'Hello world', 'elementor-addon' ),
		// 	]
		// );

		// $this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// $this->add_control(
		// 	'title_color',
		// 	[
		// 		'label' => esc_html__( 'Text Color', 'elementor-addon' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .ElementorPress-name' => 'color: {{VALUE}};',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'fon_size',
		// 	[
		// 		'label' => esc_html__( 'Font Size', 'elementor-addon' ),
		// 		'type' => \Elementor\Controls_Manager::TEXT,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .ElementorPress-name' => 'font-size: {{VALUE}}px;',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'text',
		// 	[
		// 		'label' => $args['text_control_label'],
		// 		'type' => Controls_Manager::TEXT,
		// 		'dynamic' => [
		// 			'active' => true,
		// 		],
		// 		'default' => $args['button_default_text'],
		// 		'placeholder' => $args['button_default_text'],
		// 		'condition' => $args['section_condition'],
		// 	]
		// );


		// $this->add_control(
		// 	'font_family',
		// 	[
		// 		'label' => esc_html__( 'Font Family', 'textdomain' ),
		// 		'type' => \Elementor\Controls_Manager::FONT,
		// 		'default' => "'Open Sans', sans-serif",
		// 		'selectors' => [
		// 			'{{WRAPPER}} .ElementorPress-name' => 'font-family: {{VALUE}}',
		// 		],
		// 	]
		// );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ElementPress_Email_Font_Style',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}} .ElementorPress-email',
			]
		);

		$this->add_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .ElementorPress-name' => 'text-align: {{VALUE}};',
				],
			]
		);

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Background::get_type(),
		// 	[
		// 		'name' => 'background',
		// 		'types' => [ 'classic', 'gradient', 'video' ],
		// 		'selector' => '{{WRAPPER}} .ElementorPress-pic',
		// 	]
		// );

		$this->end_controls_section();

		// Style Tab End

	}

	function getUser(){
		if(is_user_logged_in()){

            return wp_get_current_user()->user_login;
        }else{
			return 'No user logged in';
		}
	}

	protected function render() {
		
		$currerntUser = $this->getUser();
		// var_dump($currerntUser->user_login);
		?>
		<!-- <div class="ElementorPress"> 
			<img src="" class="ElementorPress-pic" width="500px" height="500px" alt="">
	   </div> -->
		<p class="ElementorPress-name">  <?php echo $currerntUser ?> 
	
		<?php if(isset($settings['DashPressUsername'])){
			echo $settings['DashPressUsername']; 
		}
			?>
		</p>

		<?php
	}
}

