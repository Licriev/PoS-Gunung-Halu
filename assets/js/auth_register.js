var Register = function(){


    var triggerAction = function(){
        $('#form-register input').keypress(function(e){
                if(e.which == 13){
                    auth_register();
                }
        });

        $('#register').click(function(event){
            auth_register();
        });
    }

    var auth_register = function(){
        $.ajax({
            url: base_url + "auth/proses_regis",
            type: "POST",               
            data: $('#form-register').serialize(),
            dataType: "json",
            success: function(data){
                if(data.result === true && data.username === true){
                    $('#alert-text-success').html("User Berhasil Di Tambahkan");
                    $('#login-alert-success').show();
                }else if(data.username === false){
                    $('#alert-text-warning').html("Username Telah Di gunakan");
                    $('#login-alert-warning').show();
                }else{
                    $('#alert-text-danger').html(data.error);
                    $('#login-alert-danger').show();
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
    Register.init();
});