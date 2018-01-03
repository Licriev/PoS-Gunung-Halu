<div class="row">
  <div class="col-md-6">
    <div class="alert alert-danger alert-dismissible fade in" role="alert" id="user-alert" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-close"></span>
      </button>
      <span id="alert-text"> </span>
    </div>
    <form action="javascript:;" method="post" id="form-edit-user">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo $user['username'] ?>" class="form-control">
      </div>
      <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="<?php echo $user['nama_lengkap'] ?>" class="form-control">
      </div>
      <div class="form-group">
        <input type="submit" name="update_user" value="Update" class="btn btn-primary" id="edituser">
        <a href="delete_user" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapusnya?');">Delete</a>
      </div>
      <div class="alert alert-danger alert-dismissible fade in" role="alert" id="user-alert" style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">Ã—</span>
        </button>
        <span id="alert-text"> </span>
      </div>
    </form>
  </div>
  <div class="col-md-6">
    <div class="alert alert-danger alert-dismissible fade in" role="alert" id="pass-alert" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-close"></span>
      </button>
      <span id="pass-alert-text"> </span>
    </div>
    <form action="javascript:;" method="post" id="form-edit-password">
      <div class="form-group">
        <label for="password">Password Lama</label>
        <input type="password" name="passold" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Password Baru</label>
        <input type="password" name="password" class="form-control">
      </div>
      <div class="form-group">
        <label for="passconf">Konfirmasi Password Baru</label>
        <input type="password" name="passconf" class="form-control">
      </div>
      <div class="form-group">
        <input type="submit" name="update_password" value="Update" class="btn btn-primary" id="editpass">
      </div>
    </form>
  </div>
</div>
