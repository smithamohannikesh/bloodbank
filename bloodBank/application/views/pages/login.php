<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Blood Bank| Admin Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel='shortcut icon' href="<?= base_url() ?>assets/images/fav-icon.png" type='image/x-icon'>
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iCheck/square/blue.css">

    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?= base_url() ?>"><b>Blood</b>Bank</a>
                 
            </div><!-- /.login-logo -->
            
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session </p>
                <div style="color:green"> <p  ><?= $this->session->flashdata('activate'); ?></p> </div>
                <form  method="post">
                 
                    <div class="form-group has-feedback">
                        <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control" placeholder="Username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>

                    </div>
                    <div style="color: red !important">  <?= form_error('username') ?></div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    </div>
                    <div style="color: red !important"><?= form_error('password') ?>

                        <?php if (isset($err)) echo $err; ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <!--                <label>
                                                  <input type="checkbox"> Remember Me
                                                </label>-->
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                </form>



                <a href="<?= base_url() ?>settings/forgot_password">I forgot my password</a><br>


            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.4 -->
        <script src="<?= base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
