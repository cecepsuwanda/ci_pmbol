<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PMBOnline | Lupa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
   <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datepicker/datepicker3.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/select2.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    Lupa Password
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
                   

                   <?php if($msg!=""){
                          echo $msg;
                        }
                  ?>



    <p class="login-box-msg">Ganti username dan password</p>

    <form action="<?php echo base_url();?>index.php/Maba_dashboard/lupa" method="post" id="lupa">
      
          <div class="form-group">
           <input type="text" class="form-control" id="ktp" name="ktp" placeholder="KTP/NIK ..."  data-msg="KTP/NIP Harus Diisi !!!" data-inputmask='"mask": "9999999999999999"' required data-mask>
          </div>
                      <div class="row">
                        <div class="col-md-6">
                          <!-- /.form-group --> 
                          <div class="form-group">
                               <select class="form-control select2" id="jk" name="jk" style="width: 100%;"  data-msg="Jenis Kelamin Harus Dipilih !!!" required >                               
                               <option value='' selected='selected'>-- Pilih Jenis Kelamin --</option>
                               <option value='L' >Laki-laki</option>
                               <option value='P' >Perempuan</option>
                            </select>
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">  
                          <div class="form-group">                             
                             <input type="text" class="form-control" id="datepicker" id="tgl" name="tgl"  placeholder="Tanggal Lahir ..." data-inputmask='"mask": "99-99-9999"' data-msg="Tanggal Harus Diisi !!!"  required data-mask>
                          </div>
                          <!-- /.form-group -->
                        </div>
                      </div> 

                      <div class="form-group">
                         <!-- <label>Username</label> -->
                         <input type="text" class="form-control"  id="user" maxlength="10" name="user" placeholder="Username ..." data-msg="Username Harus Diisi !!!"  required>
                      </div>
                      <!-- /.form-group --> 
                      <div class="form-group">
                         <!-- <label>Password</label> -->
                         <input type="password" class="form-control" id="pass" maxlength="10"  name="pass" placeholder="Password ..." data-msg="Password Harus Diisi !!!"  required>
                      </div>
                      <!-- /.form-group -->

      <div class="row">
        <div class="col-xs-4">
          <button type="submit" name="save" value="save" class="btn btn-primary btn-block btn-flat">Save</button>
         </div>
         <div class="col-xs-5">
         <!-- <button type="button" name="reset" class="btn btn-primary btn-block btn-flat">Reset</button> -->
              
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script>
  $(function () {
   $("#lupa").validate();

    $("[data-mask]").inputmask();
    
    
    $(".select2").select2();

    //Date picker
    $('#datepicker').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });
  
  });
</script>
</body>
</html>
