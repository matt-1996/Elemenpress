jQuery(document).ready(function($){

    $('#elementorpress_login_Form').on('submit', function(event){

        event.preventDefault();
        let username = $('#DashPress-login-username').val()
        let password = $('#DashPress-login-password').val()
        console.log(username)
        console.log(password)
        $.ajax({
            url: window.location.origin + '/wp-admin/admin-ajax.php',
            type: 'post',
            method:'post',
            dataType: 'json',
            data:{
                action: 'ElementorPressuserlogin',
                ElementorpressUsername: username,
                ElementorpressPassword: password
            },
            success: function(response){
                if (response.success){

                    window.location.href = '/'
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
})