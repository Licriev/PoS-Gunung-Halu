<div class="">

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tabel Barang</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content table-responsive">
        

        <!-- alert success update data -->
        <div class="alert alert-success alert-dismissible fade in" role="alert" id="login-alert-success-tabel" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-close"></span>
            </button>
            <strong>Success!</strong> <span id="alert-text-success-tabel"> </span>
        </div>

        <div class="modal fade" id="modal_form_edit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                
                <!-- Modal Body -->
                <div class="modal-body">
                
                <!-- alert error update data in modal -->
                  <!-- success -->
                      <div class="alert alert-success alert-dismissible fade in" role="alert" id="login-alert-success" style="display:none;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-close"></span>
                        </button>
                        <strong>Success!</strong> <span id="alert-text-success"> </span>
                      </div>
                      <!-- danger -->
                      <div class="alert alert-danger alert-dismissible fade in" role="alert" id="login-alert-danger" style="display:none;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-close"></span>
                        </button>
                        <strong>Oops!</strong> <span id="alert-text-danger"></span>
                      </div>

                      <form action="javascript:;" class="form-horizontal" id="formUpdate" method="post">
                        <input type="hidden" name="barang_id">
                          <div class="form-group">
                              <label class="control-label col-md-3" for="kategori_id">Kategori</label>
                              <div class="col-md-9">
                                <select class="form-control" name="kategori_id" id="kategoriId">
                                <option value="" id="isi"></option>
                                <?php foreach($listKategori as $d){ ?>
                                  <option value="<?=$d->kategori_id?>" id="kategoriDll"><?=$d->nama_kategori?></option>
                                <?php } ?>
                                  
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3" for="nama_barang">Nama Barang</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_barang" id="namaBarang" placeholder="Nama Barang"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3" for="harga">Harga</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="harga_barang" id="hargaBarang" placeholder="Harga Barang">
                              </div>
                          </div>
                      </form>
                  </div>
                  
                  <!-- Modal Footer -->
                  <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                      <button type="button" class="btn btn-primary submitBtn">Save Changes</button>
                  </div>
              </div>
          </div>
      </div>
          <table class="table">
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Action</th>
            </tr>
            <?php $no = 1 ?>
            <?php if(is_array($list)){ ?>
            <?php foreach($list as $d): ?>
            <tr>
              <td><?=$no?></td>
              <td><?=$d->nama_barang?></td>              
              <td><?=$d->harga?></td> 
              <td>
                <button class="btn btn-warning btn_edit" data-id="<?= $d->barang_id ?>"><i class="glyphicon glyphicon-pencil"></i></button>
                <button class="btn btn-danger btn_delete" data-id="<?= $d->barang_id ?>"><i class="glyphicon glyphicon-remove"></i></button>
              </td>
              <?php $no++ ?>                           
            </tr>
            <?php endforeach; ?>
            <?php }else{ ?>
              <td colspan="4" align="center"><strong>Data Kosong</strong></td>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>