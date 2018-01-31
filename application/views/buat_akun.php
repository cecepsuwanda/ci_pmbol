<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 $data['menu_idx']=$menu_idx;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PMBOnline | Daftar</title>
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
        Daftar Mahasiswa Baru        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Mahasiswa Baru</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <div class="row">
         <div class="col-md-12">
                     <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Petunjuk</a></li>
              <li><a href="#tab_2" data-toggle="tab">Jadwal & Syarat Pendaftaran</a></li>
              <li><a href="#tab_3" data-toggle="tab">Data Masuk</a></li>
              <li><a href="#tab_4" data-toggle="tab">Berita</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <div class="row">
                 <div class="col-md-6">
                      <!-- TO DO List -->
                      <div class="box box-primary">
                        <div class="box-header">
                          <i class="ion ion-clipboard"></i>
                          <h3 class="box-title">Petunjuk Pendaftaran</h3>              
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <ul class="todo-list">
                            <li>                 
                              <!-- todo text -->
                              <span class="text">Melakukan pendaftaran melalui form di bawah ini </span>
                              <!-- Emphasis label -->                  
                            </li>
                            <li>
                               <span class="text">Membayar biaya pendaftaran</span>                  
                            </li>
                            <li>
                              <span class="text">Login, lengkapi data dan upload bukti pembayaran</span>                  
                            </li>
                            <li>
                              <span class="text">Admin akan memverifikasi data anda</span>                  
                            </li>
                            <li>
                              <span class="text">Setelah admin memverifikasi, anda dapat mencetak kartu ujian</span>                  
                            </li>
                           
                          </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix no-border">
                          
                        </div>
                      </div>
                      <!-- /.box -->  
                 </div> 
                 <div class="col-md-6">
                    <!-- TO DO List -->
                    <div class="box box-primary">
                        <div class="box-header">
                          <i class="ion ion-clipboard"></i>
                          <h3 class="box-title">Petunjuk Pembayaran</h3>              
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <dl class="dl-horizontal">
                            <dt>Biaya Pendaftaran</dt>
                            <dd><?php echo 'Rp. '.number_format($byr,2,',','.'); ?></dd>
                            <dt>Bank</dt>
                            <dd><?php echo $bank; ?></dd>
                            <dt>Nomor Rekening</dt>
                            <dd><?php echo $rek; ?></dd>
                            <dt>Atas Nama</dt>
                            <dd><?php echo $an; ?></dd>
                          </dl>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix no-border">
                          
                        </div>
                      </div>
                      <!-- /.box -->
                 </div> 
              </div> 
                
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="row">
              <div class="col-md-6">      
                  <div class="box box-primary">
                      <div class="box-header">
                        <h3 class="box-title">Syarat Pendaftaran</h3>                        
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                         <div class="row">
                           <div class="col-md-12">
                               <ul class="todo-list">
                                    <li>                                      
                                      <!-- todo text -->
                                      <span class="text">Warga Negara Indonesia atau Warga Negara Keturunan Asing dikukuhkan dengan surat bukti kewarganegaraan</span>
                                      <!-- Emphasis label -->                  
                                    </li>
                                    <li>
                                       <span class="text">Warga Negara Asing dengan izin tertulis dari Direktorat Jendral Pendidikan Tinggi Diknas RI</span>                  
                                    </li>
                                    <li>
                                      <span class="text">Membayar biaya pendaftaran</span>                  
                                    </li>
                                    <li>
                                      <span class="text">Memiliki Ijazah/STTB SLTA umum, kejuruan/sederajat</span>                  
                                    </li>
                                    <li>
                                      <span class="text">Surat keterangan sehat dan tidak buta warna khusus mahasiswa FIKES dari institusi kesehatan</span>                
                                    </li>
                                    <li>
                                      <span class="text">Pas photo 2x3, 3x4, 4x5 masing-masing 2 lembar</span>
                                    </li>
                                    <li>
                                      <span class="text">Mengikuti ujian saringan masuk</span>                
                                    </li>
                                  </ul>
                           </div>
                         </div>
                      </div>
                  </div>        
              </div>
              <div class="col-md-6">
                 <?php
                     $header = array(array('Gelombang','Jadwal Pendaftaran','Test & Wawancara')); 
                     $box=array('class'=>'box-primary');
                     $header_box = array('class'=>'','title'=>'Jadwal Pendaftaran');


                     $row = array('jml'=>1);
                     $col = array('jml'=>1,'class'=>array('col-md-12'));
                     
                     $tbstat = array("id" => "jdwl",'width'=>'100%');
                     $isi_data = $tb_jdwl;
                     $tbl = new mytable($tbstat,$header,$isi_data,''); 
                     $content = array(array('<div>'.$tbl->display().'</div>'));
                     $divrowcol = new div_row_col($row,$col,$content);
                     $body = $divrowcol->display();
                     $tempbox=new box($box,$header_box,$body); 
                     echo $tempbox->display();
                 ?>
              </div>
            </div> 
              
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                  <?php   
                     $header = array(array('No','No Peserta','Nama','Fakultas','Prodi','Keterangan')); 
                     $box=array('class'=>'');
                     $header_box = array('class'=>'with-border','title'=>'Verifikasi','tools'=>array(array('widget'=>'collapse','icon'=>'fa fa-minus'),array('widget'=>'remove','icon'=>'fa fa-times')));


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
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
                <?php
                   $hlp_timeline = new timeline($timeline);
                   $content = array(array($hlp_timeline->display())); 
                   $divrowcol = new div_row_col($row,$col,$content);
                   $body = $divrowcol->display();
                   $box['class']='';
                   $header_box['title']='Timeline Berita';
                   $header_box['tools'][0]['icon']='fa fa-minus';
                   $tempbox=new box($box,$header_box,$body); 
                   $content2[]=array($tempbox->display()); 

                   $row = array('jml'=>1);
                   $col = array('jml'=>1,'class'=>array('col-md-12'));

                   $divrowcol = new div_row_col($row,$col,$content2);
                   echo $divrowcol->display();
                ?>   
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom --> 

         </div>
     </div>          


      

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Mahasiswa Baru</h3>

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
                         <label>No. KTP/NIK</label>
                         <input type="text" class="form-control" id="ktp" name="ktp"  placeholder="KTP/NIK ..." <?php echo $isbuka==0 ? 'disabled' :''; ?> data-msg="KTP/NIP Harus Diisi !!!" data-inputmask='"mask": "9999999999999999"' required data-mask>
                      </div>
                      <!-- /.form-group --> 
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
                             <input type="text" class="form-control" id="tgl" name="tgl" placeholder="Tanggal Lahir ..." data-inputmask='"mask": "99-99-9999"' data-msg="Tanggal Harus Diisi !!!" <?php echo $isbuka==0 ? 'disabled' :''; ?> required data-mask>
                          </div>
                          <!-- /.form-group -->
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label>Lulus SMA/SMK/MA Tahun</label>
                        <select class="form-control select2" id="thnlls" name="thnlls" style="width: 100%;" <?php echo $isbuka==0 ? 'disabled' :''; ?> data-msg="Tahun Lulus Harus Dipilih !!!" required>
                          <?php echo $drop_thnlls ?>
                        </select>
                      </div>                      
                      <!-- /.form-group -->
                      
                     
                 </div>
                 <!-- /.col -->
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
                         <label>Username</label>
                         <input type="text" class="form-control"  id="user" maxlength="10" name="user" placeholder="Username ..." data-msg="Username Harus Diisi !!!" <?php echo $isbuka==0 ? 'disabled' :''; ?> required>
                      </div>
                      <!-- /.form-group --> 
                      <div class="form-group">
                         <label>Password</label>
                         <input type="password" class="form-control" id="pass" maxlength="10" name="pass" placeholder="Password ..." data-msg="Password Harus Diisi !!!" <?php echo $isbuka==0 ? 'disabled' :''; ?> required>
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
    <strong>Copyright &copy; September 2017 by <a href="<?php echo base_url();?>index.php/Admin_dashboard/login">Cecep Suwanda</a>, Template by AdminLTE.</strong> All rights
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
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 
<script src="<?php echo base_url();?>assets/plugins/chartjs/Chart.min.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard2.js"></script>-->  
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="<?php echo base_url();?>assets/dist/myjs/buat_akun.js"></script> 
<script>

  $(function () {
    init(<?php echo "'".base_url()."'";?>);
    $("#ver").DataTable();
    $("#konf").DataTable();
    $("#daf").DataTable();     

    $("#jdwl").DataTable({"bPaginate": false,"ordering": false,"searching": false,"info": false});    
  });
</script>
</body>
</html>
