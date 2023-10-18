function ajaxDelete(id)
      {
        // console.log(id)
        jQuery(document).ready(function($){
          $.ajax({
            url: window.location.origin + '/wp-admin/admin-ajax.php',
            type: 'post',
            method:'post',
            dataType: 'json',
            data:{
                action: 'ElementPressAjaxCartDeleteItem',
                ElementPressAjaxCartDeleteItemID: id
            },
            success: function(response){
                if (response.success == true){

                    console.log(response.success)
                    location.reload() 
                    getCart()
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
        // console.log(id)
      }