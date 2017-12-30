var EditUser = function () {

	var triggerAction = function(){
		$('#form-edit-user input').keypress(function (e) {
	            if (e.which == 13) {
	                edit_user();
	            }
	        });

	        $('#edituser').click(function(event) {
	        	edit_user();
	        });
		$('#form-edit-password input').keypress(function (e) {
	            if (e.which == 13) {
	                edit_pass();
	            }
	        });

	        $('#editpass').click(function(event) {
	        	edit_pass();
	        });
	}


	var edit_user = function(){
		var username = $("input[name=username]").val();
		var nama_lengkap = $("input[name=nama_lengkap]").val();

		if(username=='' || nama_lengkap==''){
			$('#alert-text').text("Username dan Nama Lengkap harus diisi!")
		  $('#user-alert').show();
			return;
		}

		$.ajax({
		    type: "POST",
		    url: base_url+"dashboard/update_user",
		    data: "username=" + username + "&nama_lengkap=" + nama_lengkap,
		    success: function(data) {
		        if(data.result === true){
							window.location = '';
		        }
		    },
		    beforeSend: function()
		    {

		    }
		});
	}
	var edit_pass = function(){
		var passold = $("input[name=passold]").val();
		var password = $("input[name=password]").val();
		var passconf = $("input[name=passconf]").val();

		if(passold=='' || password=='' || passconf==''){
			$('#pass-alert-text').text("Password Lama, Baru dan Konfirmasi Harap Diisi Jika Ingin Dirubah!");
		  $('#pass-alert').show();
			return;
		}

		$.ajax({
		    type: "POST",
		    url: base_url+"dashboard/update_password",
		    data: "passold=" + passold + "&password=" + password + "&passconf=" + passconf,
				dataType: "json",
		    success: function(data) {
		        if(data.result === true){
							window.location = '';
		        }else if(data.passold === false){
							$('#pass-alert-text').html("Password Lama Tidak Sesuai");
				      $('#pass-alert').show();
						}else{
							$('#pass-alert-text').html(data.error);
				      $('#pass-alert').show();
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
    EditUser.init();
});
