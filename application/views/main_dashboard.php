<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
  $header = array(array('No','No Peserta','Nama','Fakultas','Prodi','Keterangan')); 
  $data['menu_idx']=$menu_idx;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PMBOnline | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="icon" href="<?php echo base_url();?>assets/img/unibba.ico" type="image/gif">
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
      <span class="logo-mini">PMBOnline</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">PMBOnline</span>
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
        Data Masuk        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Masuk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      
       <?php 
            $row = array('jml'=>1);
            $col = array('jml'=>3,'class'=>array('col-md-3 col-sm-6 col-xs-12','col-md-3 col-sm-6 col-xs-12','col-md-3 col-sm-6 col-xs-12'));
            $content=array();
            $tmp=array();
            $infobox = new info_box('fa fa-edit','Daftar',$jml_daftar);
            $tmp[]= $infobox->display();
            $infobox = new info_box('fa fa-graduation-cap','Konfirmasi',$jml_konf);
            $tmp[]= $infobox->display();
            $infobox = new info_box('fa fa-graduation-cap','Verifikasi',$jml_ver);
            $tmp[]= $infobox->display();
            $content[] =$tmp;
            $divrowcol = new div_row_col($row,$col,$content);
            echo $divrowcol->display();
       
                     $box=array('class'=>'collapsed-box');
                     $header_box = array('class'=>'with-border','title'=>'Verifikasi','tools'=>array(array('widget'=>'collapse','icon'=>'fa fa-plus'),array('widget'=>'remove','icon'=>'fa fa-times')));


                     $row = array('jml'=>1);
                     $col = array('jml'=>1,'class'=>array('col-md-12'));

                     $callout=new callout('callout-info','Pemberitahuan','Verifikasi adalah mahasiswa baru yang sudah bayar pendaftaran dan diverifikasi oleh Admin');
                     $tbstat = array("id" => "ver",'width'=>'100%');
                     $isi_data = $data_ver;
                     $tbl = new mytable($tbstat,$header,$isi_data,''); 
                     $content = array(array( $callout->display().'<div>'.$tbl->display().'</div>'));
                     $divrowcol = new div_row_col($row,$col,$content);
                     $body = $divrowcol->display();
                     $tempbox=new box($box,$header_box,$body); 
                     $content1=array(array($tempbox->display())); 

               
                     $callout=new callout('callout-info','Pemberitahuan','Konfirmasi adalah mahasiswa baru yang sudah bayar pendaftaran');
                     $tbstat = array("id" => "konf",'width'=>'100%');
                     $isi_data = $data_konf;
                     $tbl = new mytable($tbstat,$header,$isi_data,''); 
                     $content = array(array( $callout->display().'<div>'.$tbl->display().'</div>'));
                     $divrowcol = new div_row_col($row,$col,$content);
                     $body = $divrowcol->display();
                     $header_box['title']='Konfirmasi';
                     $tempbox=new box($box,$header_box,$body); 
                    $content1[]=array($tempbox->display()); 

                    $callout=new callout('callout-info','Pemberitahuan','Daftar adalah mahasiswa baru yang baru daftar');
                     $tbstat = array("id" => "daf",'width'=>'100%');
                     $isi_data = $data_daf;
                     $tbl = new mytable($tbstat,$header,$isi_data,''); 
                     $content = array(array( $callout->display().'<div>'.$tbl->display().'</div>'));
                     $divrowcol = new div_row_col($row,$col,$content);
                     $body = $divrowcol->display();
                     $header_box['title']='Daftar';
                     $tempbox=new box($box,$header_box,$body); 
                    $content1[]=array($tempbox->display()); 

               
                   

                   $row = array('jml'=>3);
                   $col = array('jml'=>1,'class'=>array('col-md-12'));

                   $divrowcol = new div_row_col($row,$col,$content1);
                   echo $divrowcol->display();


            ?>         
      


     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; September 2017 by <a href="">Cecep Suwanda</a>, Template by AdminLTE.</strong> All rights
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
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url();?>assets/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard2.js"></script> --> 
<!-- AdminLTE for demo purposes 
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script> -->
<script>
  $(function () {
    $("#ver").DataTable();
    $("#konf").DataTable();
    $("#daf").DataTable();

    
  });
</script>
</body>
</html>
