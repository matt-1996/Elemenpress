<?php 
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;
class ElementorPressEmailWidget extends \Elementor\Widget_Base{
    public function get_name() {
		return 'DashPress Email';
	}

	public function get_title() {
		return esc_html__( 'DashPressEmail', 'elementor-addon' );
	}


	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'Email', 'UserEmail' , 'dashpress' ];
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
				'label' => esc_html__( 'Text Style', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

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
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ElementorPress-email' => 'color: {{VALUE}};',
				],
			]
		);

		// $this->add_control(
		// 	'fon_size',
		// 	[
		// 		'label' => esc_html__( 'Font Size', 'elementor-addon' ),
		// 		'type' => \Elementor\Controls_Manager::TEXT,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .ElementorPress-email' => 'font-size: {{VALUE}}rem;',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'font_family',
		// 	[
		// 		'label' => esc_html__( 'Font Family', 'textdomain' ),
		// 		'type' => \Elementor\Controls_Manager::FONT,
		// 		'default' => "'Open Sans', sans-serif",
		// 		'selectors' => [
		// 			'{{WRAPPER}} .ElementorPress-email' => 'font-family: {{VALUE}}',
		// 		],
		// 	]
		// );

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
					'{{WRAPPER}} .ElementorPress-email' => 'text-align: {{VALUE}};',
				],
			]
		);

		

		

		$this->end_controls_section();

		// Style Tab End

	}

	function getUserEmail(){
		if(is_user_logged_in()){

            return wp_get_current_user()->user_email;
        }else{
			return 'No user logged in';
		}
	}

	protected function render() {
		
		$currerntUserEmail = $this->getUserEmail();
		// var_dump($currerntUser->user_login);
		?>

		<p class="ElementorPress-email">  <?php echo $currerntUserEmail ?> 
	
		<?php if(isset($settings['DashPressEmail'])){
			echo $settings['DashPressEmail'];
		}    ?>
		</p>

		<?php
	}
}

