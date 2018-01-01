<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 $data['menu_idx']=$menu_idx;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Wisuda | Dashboard</title>
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
  <!-- DataTables 
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css">-->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
<style type="text/css">
  
</style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Wisuda</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Wisuda</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">          
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">      
      <?php $this->load->view('side_bar_menu',$data);  ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Buat Akun        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Buat Akun</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Buat Akun</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
                 <div class="col-md-12">
                  <?php if(!empty($msg)){ ?>
                      <div class="callout callout-danger">
                          <h4>Pemberitahuan</h4>
                          <p><?php echo $msg; ?></p>
                      </div>
                   <?php } ?> 
                     <div id="ket">

                     <div>  
                 </div>
            </div>      
             
             <form action="#" id="buat_akun" name="buat_akun" method="post" >
             <div class="row">
                 <div class="col-md-6">
                 
                    <div class="form-group">
                        <label>Fakultas</label>
                        <select class="form-control select2" id="fak" name="fak" style="width: 100%;" <?php echo $isbuka==0 ? 'disabled' :''; ?> data-msg="Fakultas Harus Dipilih !!!" required>
                          <?php echo $drop_fak ?>
                        </select>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Prodi</label>
                        <select class="form-control select2" id="prodi" name="prodi" style="width: 100%;" <?php echo $isbuka==0 ? 'disabled' :''; ?> data-msg="Prodi Harus Dipilih !!!" required>
                          <option value = '' selected="selected">--- Pilih Prodi ---</option>                          
                        </select>
                      </div>                      
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Tahun Lulus</label>
                        <select class="form-control select2" id="ang" name="ang" style="width: 100%;" <?php echo $isbuka==0 ? 'disabled' :''; ?> data-msg="Tahun Lulus Harus Dipilih !!!" required>
                          <?php echo $drop_ang ?>
                        </select>
                      </div>                      
                      <!-- /.form-group -->
                      
                      <div class="form-group">
                         <label>No. KTP/NIK</label>
                         <input type="text" class="form-control" id="ktp" name="ktp"  placeholder="KTP/NIK ..." <?php echo $isbuka==0 ? 'disabled' :''; ?> data-msg="KTP/NIP Harus Diisi !!!" data-inputmask='"mask": "9999999999999999"' required data-mask>
                      </div>
                      <!-- /.form-group --> 
                 </div>
                 <!-- /.col -->
                 <div class="col-md-6">
                      
                      <div class="form-group">
                         <label>Nama Lengkap</label>
                         <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap ..." <?php echo $isbuka==0 ? 'disabled' :''; ?> data-msg="Nama Lengkap Harus Diisi !!!" style="text-transform:uppercase;" on keyup="javascript:this.value=this.value.toUpperCase();" required >
                      </div>
                      
                      <div class="row">
                        <div class="col-md-6">
                          <!-- /.form-group --> 
                          <div class="form-group">
                             <label>Jenis Kelamin</label>
                             <select class="form-control select2" id="jk" name="jk" style="width: 100%;" <?php echo $isbuka==0 ? 'disabled' :''; ?> data-msg="Jenis Kelamin Harus Dipilih !!!" required >
                               <option value='' selected='selected'>-- Pilih Jenis Kelamin --</option>
                               <option value='L' >Laki-laki</option>
                               <option value='P' >Perempuan</option>
                            </select>
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">  
                          <div class="form-group">
                             <label>Tanggal Lahir</label>
                             <input type="text" class="form-control" id="datepicker" id="tgl" name="tgl" placeholder="Tanggal Lahir ..." data-inputmask='"mask": "99-99-9999"' data-msg="Tanggal Harus Diisi !!!" <?php echo $isbuka==0 ? 'disabled' :''; ?> required data-mask>
                          </div>
                          <!-- /.form-group -->
                        </div>
                      </div>  
                      <div class="form-group">
                         <label>Username</label>
                         <input type="text" class="form-control"  id="user" name="user" placeholder="Username ..." data-msg="Username Harus Diisi !!!" <?php echo $isbuka==0 ? 'disabled' :''; ?> required>
                      </div>
                      <!-- /.form-group --> 
                      <div class="form-group">
                         <label>Password</label>
                         <input type="password" class="form-control" id="pass" name="pass" placeholder="Password ..." data-msg="Password Harus Diisi !!!" <?php echo $isbuka==0 ? 'disabled' :''; ?> required>
                      </div>
                      <!-- /.form-group -->


                 </div>
                 <!-- /.col -->
             </div>
             <!-- /.row --> 
             <div class="box-footer">
               <button type="submit" class="btn btn-info pull-right"  <?php echo $isbuka==0 ? 'disabled' :''; ?> >Buat Akun</button>
             </div>
             <!-- /.row --> 
             </form>
            </div>
            <!-- ./box-body -->
            
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; September 2017 by <a href="#">Cecep Suwanda</a>, Template by AdminLTE.</strong> All rights
    reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>
<!-- FastClick 
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.js"></script>-->
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- jvectormap 
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- DataTables 
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>-->
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 
<script src="<?php echo base_url();?>assets/plugins/chartjs/Chart.min.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard2.js"></script>-->  
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

<script>
  
  function myajax(id,data1,url,fbefore=null,fafter=null) {
        
        if(fbefore != null){
            if(typeof fbefore==='function'){
               fbefore();
            }
        }
        
        $.ajax({
            "type" : "post",
            "url" : url,
            "cache" : false,
            "data" : data1,
            success : function (data) {
                if(id!=''){                  
                  $('#'+id).html(data);
                }
                
                if(fafter != null){
                    if(typeof fafter==='function'){
                       fafter(data);
                    }
                }
            }
        });
     }


  $(function () {
    
    $("[data-mask]").inputmask();
    
    
    $(".select2").select2();

    //Date picker
    $('#datepicker').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    $("#fak").change(function () {
       var idfak = $('#fak option:selected').val();
       data = "idfak=" + idfak;
       myajax('prodi',data,'<?php echo base_url();?>index.php/Main_dashboard/get_prodi');       
      });
        

    $("#buat_akun").validate();

    $("#buat_akun").submit(function(e) {

        //prevent Default functionality
        e.preventDefault();
        var isvalid = $("#buat_akun").valid();
        if (isvalid) {            
            data = $("#buat_akun").serialize();
            myajax('ket',data,'<?php echo base_url();?>index.php/Main_dashboard/save');    
        }        
    });


    
  });
</script>
</body>
</html>
