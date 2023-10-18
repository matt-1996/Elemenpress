<?php 



    
    add_action( 'wp_ajax_ElementPressAjaxGetCart', 'ElementPress_Ajax_Cart_Item' );
    add_action( 'wp_ajax_nopriv_ElementPressAjaxGetCart', 'ElementPress_Ajax_Cart_Item' );

    function ElementPress_Ajax_Cart_Item()
    {
        global $woocommerce;

        $cart = $woocommerce->cart->get_cart();

        $count = count($cart);

        foreach($cart as $item => $values){


            $ElementPressProduct =  wc_get_product( $values['data']->get_id());
            // $ElementPressProduct =  wc_get_product( $values['data']->get_id());
            // $image = wp_get_attachment_image_src( get_post_thumbnail_id( $ElementPressProduct->id ), 'single-post-thumbnail' );
            $image = $ElementPressProduct->get_image();
            
            // var_dump($ElementPressProduct->get_permalink());
           
            $cardAttr = $ElementPressProduct->get_attributes();
            // var_dump($ElementPressProduct->get_id());

            if(isset($cardAttr))
            {
             foreach($cardAttr as $attr => $val){
                $html = `<p><span class="text-muted">` . $attr . ` : 
                </span> `. ucfirst($val) . `</p>`;
             }         
            }
            
            $product_id = $ElementPressProduct->get_id(); 
            // $product_cart_id = $woocommerce->cart->generate_cart_id( $product_id );
            // echo $product_id;
            
            $posibbleAtributes = isset($ElementPressProduct->attributes);
            
            $price = get_post_meta($values['product_id'] , '_price', true);

            $ShopPermalink = get_permalink( wc_get_page_id( 'shop' ));

            $permalink = $ElementPressProduct->get_permalink();

            $title = $ElementPressProduct->get_title();

            $quantity = $values['quantity'];
            $arr = [
                    'ElementPressProduct' => $ElementPressProduct,
                    'image' =>  $image,
                    'cartAttr' =>  $cardAttr,
                    'product_id' => $product_id,
                    'price' => $price,
                    'ShopPermalink' => $ShopPermalink,
                    'permalink' => $permalink,
                    'title' => $title,
                    'quantity' => $quantity,
                    'htmlAttr' => $html,
            ];

            // foreach($count as $c)
            // {
                // $arrr = $arr;
                $newstuff[] = 
                array('price' => $arr['price'],
                    'ShopPermalink' => [$arr['ShopPermalink']],
                    'permalink' => [$arr['permalink']],
                    'title' => $arr['title'],
                    'quantity' => $arr['quantity'],
                    'product_id' => $arr['product_id'],
                    'cartAttr' => $arr['cartAttr'],
                    'image' => $arr['image'],
                    'ElementPressProduct' => [$arr['ElementPressProduct'],
                    'htmlAttr' => $arr['htmlAttr']]
                ,
                );
            // }
            // $count = ($item);
            // $array = [];
            // $res = array_push($array, $arr) ;
            
            
        }

        return wp_send_json($newstuff, 200);


    }

    
