<div class="">

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Form Barang</h2>
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
        <div class="x_content">
            <div class="alert alert-success alert-dismissible fade in" role="alert" id="login-alert-success" style="display:none;">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-close"></span>
              </button>
              <strong>Success!</strong> <span id="alert-text-success"> </span>
            </div>

            <div class="alert alert-danger alert-dismissible fade in" role="alert" id="login-alert-danger" style="display:none;">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-close"></span>
              </button>
              <strong>Oops!</strong> <span id="alert-text-danger"></span>
            </div>
            
            <form action="javascript:;" method="post" id="formInputBarang">
            <div class="form-group">
                <label class="control-label" for="kategoriBarang">Kategori Barang</label><br>
                <select class="form-control" name="kategoriBarang" id="kategoriBarang">
                  <option value="" selected >-- Pilih --</option>
                  <?php foreach($listKategori as $d): ?>
                    <option class="kategori_id" value="<?=$d->kategori_id?>" id="isi"><?=$d->nama_kategori?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="namaBarang" class="control-label col-md-3">Nama Barang</label>
                <input type="text" id="nama_barang" class="form-control" placeholder="Input Nama Barang" name="namaBarang"/>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" for="harga">Harga</label>
                <input type="text" id="harga" class="form-control" placeholder="Input Harga" name="harga"  />
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit" style="float:right;" class="btn btn-success col-md-2" id="submitBarang">
            </div>
            </form>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>