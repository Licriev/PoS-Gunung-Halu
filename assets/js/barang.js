var Barang = function(){
    
    
        var triggerAction = function(){
            $('#submitBarang input').keypress(function(e){
                    if(e.which == 13){
                        barang_insert();
                    }
            });
    
            $('#submitBarang').click(function(event){
                barang_insert();
            });

            $('.btn_edit').click(function(event){
                var id =$(this).attr('data-id');
                get_data_update(id);
                // listEdit(id);   
            });

            $('.submitBtn').click(function(event){
                var id =$('[name="barang_id"]').val();
                barang_update(id);
            });

            $('.btn_delete').click(function(event){
                if(confirm("Apahkah Anda Yakin Ingin Di Hapus ?"))
                {
                    var id =$(this).attr('data-id');
                    barang_delete(id);
                }
            });
        }
    
        var barang_insert = function(){
            $.ajax({
                url: base_url + "barang/prosesInsert",
                type: "POST",               
                data: $('#formInputBarang').serialize(),
                dataType: "json",
                success: function(data){
                    if(data.result === true){
                        $('#alert-text-success').html("Barang Berhasil Disimpan");
                        $('#login-alert-success').show();
                        $('#formInputBarang')[0].reset();
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
                url: base_url + "barang/ajaxEdit/" + id,
                type: "GET",               
                dataType: "json",
                success: function(data){
                    $('[name="barang_id"]').val(data[0].barang_id);
                   
                    if(data[0].kategori_id == data[1].kategori_id)
                    {
                        $('#kategoriId option:selected').val(data[0].kategori_id);                        
                        $('#isi').text(data[1].nama_kategori);
                    }

                    $('[name="nama_barang"]').val(data[0].nama_barang);                    
                    $('[name="harga_barang"]').val(data[0].harga);       
                    
                    $('#modal_form_edit').modal('show');
                    $('.modal-title').text('Update Barang '+ data[0].nama_barang);
                },
                beforeSend: function()
                {
                    
                }
            });
        }

        var listEdit = function(id){
            $.ajax({
                url: base_url + "barang/listEdit/" + id,
                data: "GET",
                dataType: "json",
                success: function(data){
                        var total = $(data[0]).length;
                        $.each(data,function (index,value){
                            if(index == total ){
                                return false;
                            }else{
                                $('<option>').val(value.kategori_id).text(value.nama_kategori).appendTo('#kategoriId');
                            }
                        });


                    // if($('.btn btn-warning btn_edit').click()){
                    //     $.each(data,function (index,value){
                    //         if($('#kategoriId').click()){
                    //             $('<option>').val(value.kategori_id).text(value.nama_kategori).appendTo('#kategoriId');
                    //         }else{
                    //             return false;
                    //         }
                    //     });
                    // }else{
                    //     window.location='';
                    // }

                },
                beforeSend: function()
                {
                    
                }
            });
        }

        var barang_update = function(id){
            $.ajax({
                url: base_url + "barang/prosesUpdate/" + id,
                type: "POST",               
                data: $('#formUpdate').serialize(),
                dataType: "json",
                success: function(data){
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
                beforeSend: function()
                {
                    
                }
            });
        }

        var barang_delete = function(id){
            $.ajax({
                url: base_url + "barang/prosesDelete/" + id,
                type: "POST",               
                dataType: "json",
                success: function(data){
                    if(data.result === true){
                        $('#alert-text-success-tabel').html("Data Berhasil Di Delete");
                        $('#login-alert-success-tabel').show();
                        window.location = '';                        
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
        Barang.init();
        
    });