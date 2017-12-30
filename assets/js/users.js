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
		$('#form-create-user input').keypress(function (e) {
	            if (e.which == 13) {
	                create_user();
	            }
	        });

	        $('#createuser').click(function(event) {
	        	create_user();
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
		        }else{
							$('#alert-text').html(data.error);
				      $('#user-alert').show();
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
	var create_user = function(){
		var nama_lengkap = $("input[name=nama_lengkap]").val();
		var username = $("input[name=username]").val();
		var password = $("input[name=password]").val();
		var passconf = $("input[name=passconf]").val();

		if(username=='' || nama_lengkap=='' || password=='' || passconf==''){
			$('#alert-text-danger').text("Nama Lengkap, Username dan Password harus diisi!")
		  $('#login-alert-danger').show();
			return;
		}

		$.ajax({
		    type: "POST",
		    url: base_url+"dashboard/create_user",
		    data: $('#form-create-user').serialize(),
				dataType: "json",
		    success: function(data) {
					if(data.result === true && data.username === true){
							window.location = base_url+"dashboard/users";
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
    EditUser.init();
});
