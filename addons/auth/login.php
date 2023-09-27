<?php 


Class ElementorPress_Login extends \Elementor\Widget_Base{

    public function get_name() {
		return 'ElementorPress - Login';
	}

	public function get_title() {
		return esc_html__( 'ElementPress - Login', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' , 'Login' ];
	}

	public function get_keywords() {
		return [ 'user', 'Login' , 'DashPress' ];
	}


    protected function render(){
        ?>
<head>
<link rel="stylesheet" href="<?php echo (ElEMENTORPRESSURL . 'assets/css/bootstrap.min.css') ?>" >
<link rel="stylesheet" href="<?php echo (ElEMENTORPRESSURL . 'assets/css/font-awsome.css') ?>"  >

</head>

         <form method="POST" id="elementorpress_login_Form" action="">
			<div >
				<label for="DashPress-login-username"> <?php echo esc_html__('Username' , 'elementor') . ':' ?>
					<input class="form-control" type="text" name="DashPress-username" id="DashPress-login-username">    
				</label>
			</div>
			<div class="">
				<label for="DashPress-login-password"> <?php echo esc_html__('Password') . ':' ?>
					<input class="form-control" type="password" name="DashPress-password" id="DashPress-login-password">    
				</label>
			</div>
            <button name="submitButton" class="btn btn-primary"  >
				<?php echo esc_html__('Login', 'elementor')?>
			</button>
        </form> 
        <?php
    }


}