var Login = function () {

	var triggerAction = function(){
		$('#form-login input').keypress(function (e) {
	            if (e.which == 13) {
	                auth_user();
	            }
	        });

	        $('#login').click(function(event) {
	        	auth_user();
	        });
	}
	

	var auth_user = function(){
		var username = $("input[name=username]").val();
		var password = $("input[name=password]").val();
		var token = $('input[name=auth]').val();

		if(username=='' || password==''){
			$('#alert-text').text("Username dan password harus diisi!")
		    $('#login-alert').show();

		    return;
		}

		$.ajax({
		    type: "POST",
		    url: base_url+"auth/login",
		    data: "username=" + username + "&password=" + password + "&auth=" + token,
		    success: function(resp) {
		        var obj = jQuery.parseJSON( resp );
		        if(obj.result === true){
		            window.location = "";
		        } else {
		        	$('#alert-text').text("Username atau password salah!")
		            $('#login-alert').show();
		        }
		    },
		    beforeSend: function()
		    {
		        
		    }
		});
	}

    
    return {
        //main function to initiate the module
        init: function () {
        	
            triggerAction();
        }
    };

}();

jQuery(document).ready(function() {
    Login.init();
});