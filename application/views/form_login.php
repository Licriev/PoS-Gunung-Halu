<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets');?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets');?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets');?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('assets');?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets');?>/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">



            <form action="javascript:;" method="post" id="form-login">


			        <h1>Login Form</h1>

              <div class="alert alert-danger alert-dismissible fade in" role="alert" id="login-alert" style="display:none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-close"></span>
                </button>
                <strong>Oops!</strong> <span id="alert-text"> </span>
              </div>

              <div>
                <input type="text" class="form-control" placeholder="Username" name="username"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password"  />
              </div>
              <input type="hidden" name="auth" value="psGnhL2k17">
              <div>
                <button type="submit" class="btn btn-default submit" name="submit" id="login">Log in</a>

              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <a class="reset_pass" href="#">Lost your password?</a>
                <a class="reset_pass" style="float:left" href="<?=base_url('auth/register')?>">Register</a>

                <div class="clearfix"></div>
                <br />

              </div>
            </form>
          </section>
        </div>


      </div>
    </div>

    <script type="text/javascript">
      var base_url = "<?php echo base_url();?>";
    </script>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets');?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets');?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url('assets');?>/js/auth.js"></script>



  </body>
</html>
