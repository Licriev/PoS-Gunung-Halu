<form method="post">
  <div class="form-group">
    <input type="text" name="username" value="<?php echo $user['username'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <input type="text" name="nama_lengkap" value="<?php echo $user['nama_lengkap'] ?>" class="form-control">
  </div>
  <div class="form-group">
    <input type="password" name="password" placeholder="Password" class="form-control">
  </div>
  <div class="form-group">
    <input type="password" name="passconf" placeholder="Password Confirm" class="form-control">
  </div>
  <div class="form-group">
    <input type="submit" name="update" value="Update" class="form-control btn btn-primary">
  </div>
</form>
