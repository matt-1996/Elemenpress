<?php 
use Elementor\Controls_Manager;
class ElementorPress_Avatar_Widget extends \Elementor\Widget_Base{
    public function get_name() {
		return 'DashPress Avatar';
	}

	public function get_title() {
		return esc_html__( 'DashPressAvatar', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'Avatar', 'User profile' , 'dashpress', 'user image' ];
	}

    protected function register_controls() {

        $this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Style', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .ElementorPress-main-avatar' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .ElementorPress-avatar',
				// 'separator' => 'before',
				// 'condition' => $args['section_condition'],
			],
		);

		$this->add_responsive_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .ElementorPress-avatar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				//'condition' => $args['section_condition'],
			]
		);

		

		

        $this->end_controls_section();


    }

	

	function getUserID(){

		// var_dump(\Elementor\Group_Control_Border::get_type());
		if(is_user_logged_in()){

            return wp_get_current_user()->ID;
        }else{
			return 'No user logged in';
		}
	}

	protected function render() {
		
		$currerntUserEmail = $this->getUserID();
		$settings = $this->get_settings_for_display();
		// var_dump($currerntUser->user_login);
		?>
	<div class="ElementorPress-main-avatar">

		<img class="ElementorPress-avatar" src="<?php echo esc_url( get_avatar_url( $currerntUserEmail ) ); ?>" />
	</div>
	
		<?php if(isset($settings['DashPressEmail'])){
			echo $settings['DashPressAvatar'];
		}    ?>
		</p>

		<?php
	}

	protected function content_template() {
		?>
		<h3>{{{ settings.title }}}</h3>
		<?php
	}
}

