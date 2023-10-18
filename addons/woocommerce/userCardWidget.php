<?php 

require_once DASHPRESSPATH . 'addons/etc/woocommerce/userCard.php';
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;
class ElemenPressUserCardWidget extends \Elementor\Widget_Base {

    public function get_name() {
		return 'ElementPress-Card-Bag';
	}

	public function get_title() {
		return esc_html__( 'ElementPress Card Bag', 'elementor-addon' );
	}


	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'woocommerce' , 'Shop', 'card', 'add to card' ];
	}

	public function get_keywords() {
		return [ 'woocommerce' , 'Shop', 'card', 'add to card', 'ElementPress' ];
	}

    protected function register_controls() {

      $this->start_controls_section(
        'elementPress_Empty_Cart_title',
        [
          'label' => esc_html__( 'Content', 'textdomain' ),
          // 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
      );

    
    
      $this->add_control(
        'widget_Empty_Title',
        [
          'label' => esc_html__( 'Cart Empty Title', 'textdomain' ),
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => esc_html__( 'Cart is Empty', 'textdomain' ),
          'placeholder' => esc_html__( 'Cart is Empty', 'textdomain' ),
        ]
      );

      $this->add_control(
        'widget_Empty_Link_Text',
        [
          'label' => esc_html__( 'Cart Empty Link Title', 'textdomain' ),
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => esc_html__( 'Cart is Empty', 'textdomain' ),
          'placeholder' => esc_html__( 'Back to Shop', 'textdomain' ),
        ]
      );

      $this->add_control(
        'widget_Empty_image',
        [
          'label' => esc_html__( 'Empty Card Image', 'textdomain' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $this->end_controls_section();

      $this->start_controls_section(
        'empty_cart_styles',
        [
          'label' => esc_html__( 'Empty Cart Styles', 'textdomain' ),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
      );

      $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
          'name' => 'widget_Empty_Title_Typography',
          'global' => [
            'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
          ],
          'selector' => '{{WRAPPER}} .elementpress-empty-cart-settings',
        ]
      );
  
      $this->add_control(
        'widget_Empty_Title_Color',
        [
          'label' => esc_html__( 'Text Color', 'elementor-addon' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .elementpress-empty-cart-settings' => 'color: {{VALUE}};',
          ],
        ]
      );

      $this->add_control(
        'widget_Empty_Image_Width',
        [
          'label' => esc_html__( 'Width', 'textdomain' ),
          'type' => \Elementor\Controls_Manager::SLIDER,
          'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
          'range' => [
            'px' => [
              'min' => 0,
              'max' => 1000,
              'step' => 5,
            ],
            '%' => [
              'min' => 0,
              'max' => 100,
            ],
          ],
          'default' => [
            'unit' => '%',
            'size' => 50,
          ],
          'selectors' => [
            '{{WRAPPER}} .widget_Empty_image_settings' => 'width: {{SIZE}}{{UNIT}};',
          ],
        ]
      );

      $this->add_control(
        'widget_Empty_Image_Height',
        [
          'label' => esc_html__( 'Height', 'textdomain' ),
          'type' => \Elementor\Controls_Manager::SLIDER,
          'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
          'range' => [
            'px' => [
              'min' => 0,
              'max' => 1000,
              'step' => 5,
            ],
            '%' => [
              'min' => 0,
              'max' => 100,
            ],
          ],
          'default' => [
            'unit' => '%',
            'size' => 50,
          ],
          'selectors' => [
            '{{WRAPPER}} .widget_Empty_image_settings' => 'height: {{SIZE}}{{UNIT}};',
          ],
        ]
      );
      $this->end_controls_section();


      $this->start_controls_section(
        'empty_cart_styles_shop_link',
        [
          'label' => esc_html__( 'Shop link Styles', 'textdomain' ),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
      );

      $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
          'name' => 'widget_Empty_Link_Typography',
          'global' => [
            'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
          ],
          'selector' => '{{WRAPPER}} .elementpress-empty-cart-shop-link',
        ]
      );
  
      $this->add_control(
        'widget_Empty_Link_Color',
        [
          'label' => esc_html__( 'Text Color', 'elementor-addon' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .elementpress-empty-cart-shop-link' => 'color: {{VALUE}};',
          ],
        ]
      );
    
    
    
          $this->end_controls_section();

    }

    protected function render() {

      global $woocommerce;

      $settings = $this->get_settings_for_display();

      // var_dump($woocommerce->cart->get_cart());
      // die();
        $cardItems = new userCard;

        $card = $cardItems->getCardItems();
        $cartCount = count($card);
        
        // var_dump($card);


        ?>

<head>
<script defer src="<?php echo (ElEMENTORPRESSURL . 'assets/js/font-awsome.js') ?>" ></script>
<script src="<?php echo (ElEMENTORPRESSURL . 'assets/js/Ajax_get_cart.js') ?>" ></script>
<script>
  // getCart()
</script>
<style>
/* .text-muted{
  display: block !important;
} */
</style>
<?php 
  if(count($card) == 0) : ?>
  <link rel="stylesheet" href="<?php echo (ElEMENTORPRESSURL . 'assets/css/cart-empty.css') ?>"  >
  <link rel="stylesheet" href="<?php echo (ElEMENTORPRESSURL . 'assets/css/bootstrap.min.css') ?>" >
  <?php endif;?>
	 <link rel="stylesheet" href="<?php echo (ElEMENTORPRESSURL . 'assets/css/bootstrap.min.css') ?>" >
	 <link rel="stylesheet" href="<?php echo (ElEMENTORPRESSURL . 'assets/css/font-awsome.css') ?>"  >
     <link rel="stylesheet" href="<?php echo (ElEMENTORPRESSURL . 'assets/css/card-item.css') ?>"  >
</head>
<body style="direction: rtl;">
    
  <?php  
    if(count($card) == 0): ?>
    <div class="container">
       <!-- <div class="empty-cart rounded-lg"> -->
       <h3 class="text-center mt-2 elementpress-empty-cart-settings"><?php echo isset($settings["widget_Empty_Title"]) ? $settings["widget_Empty_Title"]  : '' ?></h3>
        <a class="text-center mt-2 " href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" >
          <p class="elementpress-empty-cart-shop-link"><?php echo isset($settings["widget_Empty_Link_Text"]) ? $settings["widget_Empty_Link_Text"] : '' ?></p>
        </a>
        <!-- <div> -->
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="image_with_badge_container d-flex justify-content-between align-items-center">
              <img class="widget_Empty_image_settings" src="<?php echo isset($settings["widget_Empty_image"]["url"]) ? $settings["widget_Empty_image"]["url"] : ''?>" alt="">
              <div class="image-badge">
                <span class="text-white"><?php echo isset($cartCount) ? count($card) : '' ?></span>
              </div>
            </div>
    </div>
          
        <!-- </div> -->
<!-- <svg viewBox="656 573 264 182" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <rect id="bg-line" stroke="none" fill-opacity="0.2" fill="#FFE100" fill-rule="evenodd" x="656" y="624" width="206" height="38" rx="19"></rect>
    <rect id="bg-line" stroke="none" fill-opacity="0.2" fill="#FFE100" fill-rule="evenodd" x="692" y="665" width="192" height="29" rx="14.5"></rect>
    <rect id="bg-line" stroke="none" fill-opacity="0.2" fill="#FFE100" fill-rule="evenodd" x="678" y="696" width="192" height="33" rx="16.5"></rect>
    <g id="shopping-bag" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(721.000000, 630.000000)">
        <polygon id="Fill-10" fill="#FFA800" points="4 29 120 29 120 0 4 0"></polygon>
        <polygon id="Fill-14" fill="#FFE100" points="120 29 120 0 115.75 0 103 12.4285714 115.75 29"></polygon>
        <polygon id="Fill-15" fill="#FFE100" points="4 29 4 0 8.25 0 21 12.4285714 8.25 29"></polygon>
        <polygon id="Fill-33" fill="#FFA800" points="110 112 121.573723 109.059187 122 29 110 29"></polygon>
        <polygon id="Fill-35" fill-opacity="0.5" fill="#FFFFFF" points="2 107.846154 10 112 10 31 2 31"></polygon>
        <path d="M107.709596,112 L15.2883462,112 C11.2635,112 8,108.70905 8,104.648275 L8,29 L115,29 L115,104.648275 C115,108.70905 111.7365,112 107.709596,112" id="Fill-36" fill="#FFE100"></path>
        <path d="M122,97.4615385 L122,104.230231 C122,108.521154 118.534483,112 114.257931,112 L9.74206897,112 C5.46551724,112 2,108.521154 2,104.230231 L2,58" id="Stroke-4916" stroke="#000000" stroke-width="3" stroke-linecap="round"></path>
        <polyline id="Stroke-4917" stroke="#000000" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" points="2 41.5 2 29 122 29 122 79"></polyline>
        <path d="M4,50 C4,51.104 3.104,52 2,52 C0.896,52 0,51.104 0,50 C0,48.896 0.896,48 2,48 C3.104,48 4,48.896 4,50" id="Fill-4918" fill="#000000"></path>
        <path d="M122,87 L122,89" id="Stroke-4919" stroke="#000000" stroke-width="3" stroke-linecap="round"></path>
        <polygon id="Stroke-4922" stroke="#000000" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" points="4 29 120 29 120 0 4 0"></polygon>
        <path d="M87,46 L87,58.3333333 C87,71.9 75.75,83 62,83 L62,83 C48.25,83 37,71.9 37,58.3333333 L37,46" id="Stroke-4923" stroke="#000000" stroke-width="3" stroke-linecap="round"></path>
        <path d="M31,45 C31,41.686 33.686,39 37,39 C40.314,39 43,41.686 43,45" id="Stroke-4924" stroke="#000000" stroke-width="3" stroke-linecap="round"></path>
        <path d="M81,45 C81,41.686 83.686,39 87,39 C90.314,39 93,41.686 93,45" id="Stroke-4925" stroke="#000000" stroke-width="3" stroke-linecap="round"></path>
        <path d="M8,0 L20,12" id="Stroke-4928" stroke="#000000" stroke-width="3" stroke-linecap="round"></path>
        <path d="M20,12 L8,29" id="Stroke-4929" stroke="#000000" stroke-width="3" stroke-linecap="round"></path>
        <path d="M20,12 L20,29" id="Stroke-4930" stroke="#000000" stroke-width="3" stroke-linecap="round"></path>
        <path d="M115,0 L103,12" id="Stroke-4931" stroke="#000000" stroke-width="3" stroke-linecap="round"></path>
        <path d="M103,12 L115,29" id="Stroke-4932" stroke="#000000" stroke-width="3" stroke-linecap="round"></path>
        <path d="M103,12 L103,29" id="Stroke-4933" stroke="#000000" stroke-width="3" stroke-linecap="round"></path>
    </g>
    <g id="glow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(768.000000, 615.000000)">
        <rect id="Rectangle-2" fill="#000000" x="14" y="0" width="2" height="9" rx="1"></rect>
        <rect fill="#000000" transform="translate(7.601883, 6.142354) rotate(-12.000000) translate(-7.601883, -6.142354) " x="6.60188267" y="3.14235449" width="2" height="6" rx="1"></rect>
        <rect fill="#000000" transform="translate(1.540235, 7.782080) rotate(-25.000000) translate(-1.540235, -7.782080) " x="0.54023518" y="6.28207994" width="2" height="3" rx="1"></rect>
        <rect fill="#000000" transform="translate(29.540235, 7.782080) scale(-1, 1) rotate(-25.000000) translate(-29.540235, -7.782080) " x="28.5402352" y="6.28207994" width="2" height="3" rx="1"></rect>
        <rect fill="#000000" transform="translate(22.601883, 6.142354) scale(-1, 1) rotate(-12.000000) translate(-22.601883, -6.142354) " x="21.6018827" y="3.14235449" width="2" height="6" rx="1"></rect>
    </g>
    <polygon id="plus" stroke="none" fill="#7DBFEB" fill-rule="evenodd" points="689.681239 597.614697 689.681239 596 690.771974 596 690.771974 597.614697 692.408077 597.614697 692.408077 598.691161 690.771974 598.691161 690.771974 600.350404 689.681239 600.350404 689.681239 598.691161 688 598.691161 688 597.614697"></polygon>
    <polygon id="plus" stroke="none" fill="#EEE332" fill-rule="evenodd" points="913.288398 701.226961 913.288398 699 914.773039 699 914.773039 701.226961 917 701.226961 917 702.711602 914.773039 702.711602 914.773039 705 913.288398 705 913.288398 702.711602 911 702.711602 911 701.226961"></polygon>
    <polygon id="plus" stroke="none" fill="#FFA800" fill-rule="evenodd" points="662.288398 736.226961 662.288398 734 663.773039 734 663.773039 736.226961 666 736.226961 666 737.711602 663.773039 737.711602 663.773039 740 662.288398 740 662.288398 737.711602 660 737.711602 660 736.226961"></polygon>
    <circle id="oval" stroke="none" fill="#A5D6D3" fill-rule="evenodd" cx="699.5" cy="579.5" r="1.5"></circle>
    <circle id="oval" stroke="none" fill="#CFC94E" fill-rule="evenodd" cx="712.5" cy="617.5" r="1.5"></circle>
    <circle id="oval" stroke="none" fill="#8CC8C8" fill-rule="evenodd" cx="692.5" cy="738.5" r="1.5"></circle>
    <circle id="oval" stroke="none" fill="#3EC08D" fill-rule="evenodd" cx="884.5" cy="657.5" r="1.5"></circle>
    <circle id="oval" stroke="none" fill="#66739F" fill-rule="evenodd" cx="918.5" cy="681.5" r="1.5"></circle>
    <circle id="oval" stroke="none" fill="#C48C47" fill-rule="evenodd" cx="903.5" cy="723.5" r="1.5"></circle>
    <circle id="oval" stroke="none" fill="#A24C65" fill-rule="evenodd" cx="760.5" cy="587.5" r="1.5"></circle>
    <circle id="oval" stroke="#66739F" stroke-width="2" fill="none" cx="745" cy="603" r="3"></circle>
    <circle id="oval" stroke="#EFB549" stroke-width="2" fill="none" cx="716" cy="597" r="3"></circle>
    <circle id="oval" stroke="#FFE100" stroke-width="2" fill="none" cx="681" cy="751" r="3"></circle>
    <circle id="oval" stroke="#3CBC83" stroke-width="2" fill="none" cx="896" cy="680" r="3"></circle>
    <polygon id="diamond" stroke="#C46F82" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" points="886 705 889 708 886 711 883 708"></polygon>
    <path d="M736,577 C737.65825,577 739,578.34175 739,580 C739,578.34175 740.34175,577 742,577 C740.34175,577 739,575.65825 739,574 C739,575.65825 737.65825,577 736,577 Z" id="bubble-rounded" stroke="#3CBC83" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
</svg> -->


</div>
</div>
      <?php endif;?>
      <?php if(count($card) >= 1): ?>
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
   

      <div class="DiscountCodeMessage" id="DiscountCodeMessage">
      <!-- <div class="woocommerce-notices-wrapper d-none">
                     <div class="woocommerce-message" role="alert">
                       کد تخفیف اعمال شد	</div>
        </div> -->
      </div>
      
    
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-sm-12">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
        </div>
        <div id="ajaxCart"></div>
        <?php foreach($card as $item => $values): 
            $ElementPressProduct =  wc_get_product( $values['data']->get_id());
            // $ElementPressProduct =  wc_get_product( $values['data']->get_id());
            // $image = wp_get_attachment_image_src( get_post_thumbnail_id( $ElementPressProduct->id ), 'single-post-thumbnail' );
            $image = $ElementPressProduct->get_image();
            
            // var_dump($ElementPressProduct->get_permalink());
           
            $cardAttr = $ElementPressProduct->get_attributes();
            // var_dump($ElementPressProduct->get_id());
            if(isset($cardAttr))
            {
              
            }
            
            $product_id = $ElementPressProduct->get_id(); 
            // $product_cart_id = $woocommerce->cart->generate_cart_id( $product_id );
            // echo $product_id;
            
            $posibbleAtributes = isset($ElementPressProduct->attributes);
            
            $price = get_post_meta($values['product_id'] , '_price', true);
            ?>
            <!-- <div class="col-12 col-sm-12"> -->
            <div class="card mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2 col-sm-1">
              <?php echo $image; ?>
              </div>
              <div class="col-md-2 col-lg-2 col-xl-2">
                <a href="<?php echo $ElementPressProduct->get_permalink() ?>">
                    <span class="text-lg  mb-2" id="cart-title"><?php echo $ElementPressProduct->get_title() ?></span>
                </a>
        
                <?php 
                
                if(isset($cardAttr)): ?>
                    <?php foreach($cardAttr as $attr => $val) : ?>
                      
                      <p><span class="text-muted"><?php echo ucfirst($attr) . ":" ?> 
                    </span><?php echo ucfirst($val) ?> </p>
                     
                      <?php endforeach; ?>
                <?php endif; ?>
              </div>
              <div class="col-md-5 col-lg-5 col-sm-5 col-xl-2 d-flex">
                <button class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector(`#quantity_` + <?php echo $product_id ?>).stepDown(),SetQuantity(<?php echo $product_id ?>)">
                  <i class="fas fa-minus"></i>
                </button>
                <!-- <div class="col-md-3 col-lg-3 col-xl-3"> -->
                  <input id="quantity_<?php echo $product_id ?>" min="0" name="quantity" value="<?php echo $values['quantity'] ?>" type="number"
                  class="form-control form-control-sm col-sm-5" />
                <!-- </div> -->

                <button class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector(`#quantity_` + <?php echo $product_id ?>).stepUp(),SetQuantity(<?php echo $product_id ?>)">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <div class="col-md-2 col-lg-2 col-xl-2 offset-lg-1">
                <span class="mb-0 text-lg"><?php echo get_woocommerce_currency_symbol() . " " . $price ?></span>
              </div>
              <div class="col-md-2 col-lg-2 col-xl-2 text-end">
                <button class="text-danger" onclick="ajaxDelete(<?php echo $product_id ?>)" id="deleteItem"><i class="fas fa-trash fa-lg"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- </div> -->
             <?php endforeach; ?>

        <div class="card mb-4">
          <div class="card-body p-4 d-flex flex-row">
            <div class="form-outline flex-fill">
              <label class="form-label text-right" for="DiscountCode">Discound code:</label>
              <input type="text" id="DiscountCode" class="form-control form-control-lg" />
            </div>
          </div>
          <!-- <div> -->
            <button type="button" class="btn btn-outline-info btn-lg mx-5 mb-3 py-2" onclick=(ApplyDiscountCode())>Apply</button>
          <!-- </div> -->
        </div>

        <div class="card p-4 ">
              <div class="card-body p-4">
                <p class="text-right text-lg">Total: <?php echo $woocommerce->cart->get_total() ?></p>
                    </br>
                  <p class="text-right text-lg">Shipping Fee: <?php echo WC()->cart->get_cart_shipping_total(); ?></p>
                    </br>
                    <?php foreach(WC()->cart->get_coupon_discount_totals() as $coupon) :   ?>
                    <p class="text-right text-lg"> <?php echo $coupon . " " . get_woocommerce_currency_symbol(); ?> </p>

                      <?php endforeach; ?>

              </div>
            </div>

        <div class="card">
          <div class="card-body">
            <a href="<?php echo wc_get_checkout_url() ?>">
              <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<?php endif;?>
    </body>
    <script>
      // function SetQuantity(product_id){
      //   var quantity = document.getElementById(`quantity_` + product_id).value
      //   console.log(product_id,quantity)

      // }
    </script>
    <?php        
    }

}