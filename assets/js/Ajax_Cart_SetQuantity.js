function SetQuantity(product_id)
      {
        var quantity = document.getElementById(`quantity_` + product_id).value

        jQuery(document).ready(function($){
          $.ajax({
            url: window.location.origin + '/wp-admin/admin-ajax.php',
            type: 'post',
            method:'post',
            dataType: 'json',
            data:{
                action: 'ElementPressAjaxCartSetQuantity',
                ElementPress_cart_product_id: product_id,
                ElementPress_cart_quantity: quantity
            },
            success: function(response){
                if (response.success == true){

                    console.log(response.success)
                }
            },
            error: function(error){
                if(error){

                    let messsage = error.responseJSON.message 
                    console.log(messsage)
                }
            }
        })
        })
      }