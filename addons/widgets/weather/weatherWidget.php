<?php 

require_once DASHPRESSPATH . 'addons/etc/weather/getForecast.php';
class ElementorPressWeatherWidget extends \Elementor\Widget_Base{
    public function get_name() {
		return 'DashPress Weather';
	}

	public function get_title() {
		return esc_html__( 'DashPressWeather', 'elementor-addon' );
	}


	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'Weather', 'Weather' , 'dashpress' ];
	}

  public function getCities() : array{

      $citiesPath = DASHPRESSPATH . 'assets/content/top-1000-cities.json';
      
      $jFile = file_get_contents($citiesPath);

      $json = Json_decode($jFile);

      $cityArray = array();

      foreach($json as $jsons){
        $cityArray += [$jsons->name => $jsons->name];
        // array_push($cityArray,$jsons->name);
        // $cityArray['value'] = 'esc_html__(' . $jsons->name . ',textdomain ),';
      }
      // var_dump($cityArray);

      return $cityArray;
  }

    protected function register_controls() {

      $citiesOption = $this->getCities();

      $this->start_controls_section(
        'API Token',
        [
          'label' => esc_html__( 'Api Token', 'elementor' ),
          'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
      );


      $this->add_control(
        'Token',
        [
          'label' => esc_html__( 'API Token', 'textdomain' ),
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => esc_html__( 'Token', 'textdomain' ),
          'placeholder' => esc_html__( 'Enter Your API token from visualcrossing.com', 'textdomain' ),
        ]
      );



      $this->end_controls_section();


      $this->start_controls_section(
        'city',
        [
          'label' => esc_html__( 'city', 'elementor' ),
          'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
      );


      
      


      $this->add_control(
        'City',
        [
          'label' => esc_html__( 'City', 'elementor' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'label_block' => true,
				  'multiple' => true,
          'options' => $citiesOption,
			]
      );


      $this->end_controls_section();

      $this->start_controls_section(
        'unit',
        [
          'label' => esc_html__( 'unit', 'elementor' ),
          'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
      );


      $this->add_control(
        'Unit',
        [
          'label' => esc_html__( 'Unit', 'elementor' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'label_block' => true,
				  'multiple' => true,
          'options' => [
            'metric' => esc_html__( 'metric', 'elementor' ),
            'us' => esc_html__( 'us', 'elementor' ),
          ],
			]
      );


      $this->end_controls_section();


      $this->start_controls_section(
        'language',
        [
          'label' => esc_html__( 'language', 'elementor' ),
          'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
      );


      $this->add_control(
        'Lang',
        [
          'label' => esc_html__( 'Language', 'elementor' ),
          'type' => \Elementor\Controls_Manager::SELECT,
          'label_block' => true,
				  'multiple' => true,
          'options' => [
            'en' => esc_html__( 'English,US', 'elementor' ),
            'en' => esc_html__( 'English,UK', 'elementor' ),
            'fa' => esc_html__( 'Persian', 'elementor' ),
            'fr' => esc_html__( 'French', 'elementor' ),
          ],
			]
      );


      $this->end_controls_section();
    }

    protected function render() {
      
      $ElementPressSettings = $this->get_settings_for_display();
      // var_dump($ElementPressSettings['City']);

      $weatherClass = new getForecast($ElementPressSettings['City'],
      $ElementPressSettings['Lang'],
      $ElementPressSettings['Unit'],
      $ElementPressSettings['Token']
    );
      // var_dump($ElementPressSettings['Lang']);
		
    
		?>
 	<head>
	 <script defer src="<?php echo (ElEMENTORPRESSURL . 'assets/js/font-awsome.js') ?>" ></script>
	 <link rel="stylesheet" href="<?php echo (ElEMENTORPRESSURL . 'assets/css/bootstrap.min.css') ?>" >
	 <link rel="stylesheet" href="<?php echo (ElEMENTORPRESSURL . 'assets/css/font-awsome.css') ?>"  >
	<style>
    .blur{
      backdrop-filter: blur(14px) !important;
    }
  </style>
  </head>
<section class="" style="">
  <div class="container py-5 ">

    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="">

        <div class="card blur w-100" style="color: #4B515D; border-radius: 35px; background-color: rgba(255, 255, 255, 0.55)">
          <div class="card-body p-5 h-100 w-100">

            <div class="d-flex p-4">
              <h6 class="flex-grow-1"><?php echo $weatherClass->getAddress() ?></h6>
              <!-- <h6>15:07</h6> -->
            </div>

            <div class="d-flex flex-column text-center mt-3 mb-4">
            <div >
                <img src="<?php echo $weatherClass->sticker() ?>"
                  width="100px">
              </div>
              <h6 class="display-4 mb-0 font-weight-bold" style="color: #1C2331;"> <?php echo($weatherClass->isCelcius() ? $weatherClass->getDegree() . '°C'  : $weatherClass->getDegree() . '°F')  ?> </h6>
              <span class="small" style="color: #4B515D"><?php echo $weatherClass->getCondition()  ?></span>
            </div>

            <div class="d-flex align-items-center">
            <div class="flex-grow-1" style="font-size: 1rem;">
              <div class="mx-2"> <?php echo  $weatherClass->getSunrise()  ?> <i class="fas fa-sun fa-fw" style="color: #868B94;"></i>
                 <!-- <i class="fas fa-sun" style="color: #868B94;"></i>  -->
                 <span class="ms-1"> </span>
                </div> 
                <div class="mx-2"> <?php echo  $weatherClass->getSunset()  ?> <i class="fas fa-moon fa-fw" style="color: #868B94;"></i>
                <!-- <i class="fa-solid fa-sunset"></i>  -->
                <!-- <svg width=25px height=25px xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" fill="#000000" version="1.1" x="10px" y="10px" viewBox="0 0 100 125">
                    <path class='' style="font-size:5px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;text-indent:0;text-align:start;text-decoration:none;line-height:normal;letter-spacing:normal;word-spacing:normal;text-transform:none;direction:ltr;block-progression:tb;writing-mode:lr-tb;text-anchor:start;baseline-shift:baseline;opacity:1;color:#000000;fill:#000000;fill-opacity:1;stroke:none;stroke-width:1.99999975999999990;marker:none;visibility:visible;display:inline;overflow:visible;enable-background:accumulate;font-family:Sans;-inkscape-font-specification:Sans" d="M 49.90625 26.96875 A 1.0000999 1.0000999 0 0 0 49.78125 27 A 1.0000999 1.0000999 0 0 0 49 28 L 49 35 A 1.0000999 1.0000999 0 1 0 51 35 L 51 28 A 1.0000999 1.0000999 0 0 0 49.90625 26.96875 z M 25.84375 36.9375 A 1.0000999 1.0000999 0 0 0 25.25 38.65625 L 30.1875 43.625 A 1.016466 1.016466 0 1 0 31.625 42.1875 L 26.65625 37.25 A 1.0000999 1.0000999 0 0 0 25.9375 36.9375 A 1.0000999 1.0000999 0 0 0 25.84375 36.9375 z M 73.9375 36.9375 A 1.0000999 1.0000999 0 0 0 73.34375 37.25 L 68.375 42.1875 A 1.016466 1.016466 0 1 0 69.8125 43.625 L 74.75 38.65625 A 1.0000999 1.0000999 0 0 0 74.03125 36.9375 A 1.0000999 1.0000999 0 0 0 73.9375 36.9375 z M 50 39 C 37.650398 39 27.564711 48.778805 27.03125 61 L 16 61 A 1.0000999 1.0000999 0 0 0 15.90625 61 A 1.001098 1.001098 0 1 0 16 63 L 84 63 A 1.0000999 1.0000999 0 1 0 84 61 L 72.96875 61 C 72.435247 48.778807 62.349602 39 50 39 z M 50 41 C 61.269923 41 70.440477 49.863217 70.96875 61 L 29.03125 61 C 29.559486 49.863218 38.730077 41 50 41 z M 24.8125 66 A 1.001098 1.001098 0 0 0 25 68 L 75 68 A 1.0000999 1.0000999 0 1 0 75 66 L 25 66 A 1.0000999 1.0000999 0 0 0 24.90625 66 A 1.001098 1.001098 0 0 0 24.8125 66 z M 31.8125 71 A 1.001098 1.001098 0 0 0 32 73 L 68 73 A 1.0000999 1.0000999 0 1 0 68 71 L 32 71 A 1.0000999 1.0000999 0 0 0 31.90625 71 A 1.001098 1.001098 0 0 0 31.8125 71 z "/> -->
                <span class="ms-1"> 
                  
                </span>
                </div>
                </div>

                

              <div class="flex-grow-1" style="font-size: 1rem;">
                <div> <?php echo($weatherClass->isCelcius() ? $weatherClass->getWind() . 'km/h' : $weatherClass->getWind() . 'mph') ?> <i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span class="ms-1"> 
                  </span></div>
                <div><?php echo  $weatherClass->getHumidity() . '%' ?>  <i class="fas fa-tint fa-fw" style="color: #868B94;"></i><span class="ms-1">  </span>
                </div>
                 
              </div>
              
            </div>

            <div class="d-flex align-items-start">
            
                </div>

          </div>
        </div>

      </div>
    </div>

  </div>
</section>
		

		<?php
	}
}