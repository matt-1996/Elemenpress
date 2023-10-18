function ApplyDiscountCode(DiscountCode)
      {
        var DiscountCode = document.getElementById("DiscountCode").value

        jQuery(document).ready(function($){
          $.ajax({
            url: window.location.origin + '/wp-admin/admin-ajax.php',
            type: 'post',
            method:'post',
            dataType: 'json',
            data:{
                action: 'ElementPressAjaxCartApplyDiscountCode',
                ElementPressAjaxCartDiscountCode: DiscountCode,
            },
            success: function(response){
                if (response.success == true){

                    console.log(response.success)
                    $('#DiscountCodeMessage').html(`<div class="woocommerce-notices-wrapper">
                    <div class="woocommerce-message" role="alert">
                      کد تخفیف اعمال شد	</div>`)
                    // $(".DiscountCodeMessage").addClass("")
                    // location.reload()
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