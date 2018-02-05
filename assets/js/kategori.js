var Kategori = function(){

    var triggerAction = function(){
        $('#submitKategori input').keypress(function(e){
                if(e.which == 13){
                    kategori_insert();
                }
        });

        $('#submitKategori').click(function(event){
            kategori_insert();
        });

        $('.btn_edit').click(function(event){
            var id =$(this).attr('data-id');
            get_data_update(id);
        });

        $('.submitBtn').click(function(event){
            var id =$('[name="kategori_id"]').val();
            kategori_update(id);
        });

        $('.btn_delete').click(function(event){
            if(confirm("Apahkah Anda Yakin Ingin Di Hapus ?"))
            {
                var id =$(this).attr('data-id');
                kategori_delete(id);
            }
        });
    }

    var kategori_insert = function(){
        $.ajax({
            url: base_url + "kategori/prosesInsert",
            type: "POST",
            data: $('#formInputKategori').serialize(),
            dataType: "json",
            success: function(data){
                if(data.result === true)
                {
                    $('#alert-text-success').html("Barang Berhasil Disimpan");
                    $('#login-alert-success').show();
                    $('#formInputKategori')[0].reset();
                    setTimeout(function(){
                        $('#login-alert-success').fadeOut(); 
                    },3000);   
                }else{
                    $('#alert-text-danger').html(data.error);
                    $('#login-alert-danger').show();                                                    
                    setTimeout(function(){
                        $('#login-alert-danger').fadeOut(); 
                    },3000); 
                }
            },
            beforeSend: function()
            {
                
            }
        });
    }

    var get_data_update = function(id){
        $.ajax({
            url: base_url + 'kategori/ajaxEdit/' + id,
            type:"GET",
            dataType: "json",
            success:function(data){
               $('[name="kategori_id"]').val(data.kategori_id);
               $('[name="nama_kategori"]').val(data.nama_kategori);

               $('#modal_form_edit').modal('show');
               $('.modal-title').text('Update Kategori '+data.nama_kategori);
            },
            beforeSend:function()
            {

            }
        });
    }

    var kategori_update = function(id){
        $.ajax({
            url: base_url + 'kategori/prosesUpdate/' + id,
            data:$('#formUpdate').serialize(),
            type:"POST",
            dataType: "json",
            success:function(data){
                if(data.result === true){
                        $('#alert-text-success').html("Barang Berhasil Di Update");
                        $('#login-alert-success').show();
                        window.location='';
                }else{
                        $('#alert-text-danger').html(data.error);
                        $('#login-alert-danger').show();
                        setTimeout(function() {
                            $('#login-alert-danger').fadeOut();
                        }, 3000);
                }
            },
            beforeSend:function()
            {

            }
        });
    }

    var kategori_delete = function(id){
        $.ajax({
            url: base_url + 'kategori/prosesDelete/' + id,
            type:"JSON",
            dataType:"json",
            success:function(data){
                if(data.result === true){
                    $('#alert-text-success-tabel').html("Data Berhasil Di Delete");
                    $('#login-alert-success-tabel').show();
                    window.location = '';                 
                }
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
    Kategori.init();
});