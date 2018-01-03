<div class="row">
  <div class="col-md-6">
    <div class="alert alert-success alert-dismissible fade in" role="alert" id="login-alert-success" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-close"></span>
      </button>
      <strong>Success!</strong> <span id="alert-text-success"> </span>
    </div>

    <div class="alert alert-warning alert-dismissible fade in" role="alert" id="login-alert-warning" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-close"></span>
      </button>
      <strong>Warning!</strong> <span id="alert-text-warning"> </span>
    </div>

    <div class="alert alert-danger alert-dismissible fade in" role="alert" id="login-alert-danger" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-close"></span>
      </button>
      <strong>Oops!</strong> <span id="alert-text-danger"></span>
    </div>
    <form action="javascript:;" method="post" id="form-create-user">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="namaLengkap"/>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username"/>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password"  />
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Konfirmasi Password" name="passconf"/>
      </div>
      <div class="form-group">
        <input type="submit" name="create_user" value="Create" class="btn btn-primary" id="createuser">
      </div>
    </form>
  </div>
</div>
