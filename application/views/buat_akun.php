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
     
           <?php    

                    $todo=new todo_list($pendaftaran);
                             
                    $box=array('class'=>'box-primary');
                    $header_box = array('class'=>'','title'=>'Petunjuk Pendaftaran');
                    $body = $todo->display(); 
                    $tempbox=new box($box,$header_box,$body); 
                    $tmp1=$tempbox->display();
                 
                    $desc = new desc($bayar);
                             
                    $box=array('class'=>'box-primary');
                    $header_box = array('class'=>'','title'=>'Petunjuk Pembayaran');
                    $body = $desc->display('dl-horizontal'); 
                    $tempbox=new box($box,$header_box,$body); 
                    $tmp2= $tempbox->display();

                    $row = array('jml'=>1);
                    $col = array('jml'=>2,'class'=>array('col-md-6','col-md-6'));

                    $divrowcol = new div_row_col($row,$col,array(array($tmp1,$tmp2)));
                     
                    $tab_content = array(); 
                    $tab_content[] = $divrowcol->display();
                            
                     $todo=new todo_list($syarat);                               

                     $box=array('class'=>'box-primary');
                     $header_box = array('class'=>'','title'=>'Syarat Pendaftaran');
                     $body = $todo->display(); 
                     $tempbox=new box($box,$header_box,$body); 
                     $tmp1=$tempbox->display();
              
                 
                     $header = array(array('Gelombang','Jadwal Pendaftaran','Test & Wawancara')); 
                     $box=array('class'=>'box-primary');
                     $header_box = array('class'=>'','title'=>'Jadwal Pendaftaran');
                     
                     $tbstat = array("id" => "jdwl",'width'=>'100%');
                     $isi_data = $tb_jdwl;
                     $tbl = new mytable($tbstat,$header,$isi_data,''); 
                     $content = '<div>'.$tbl->display().'</div>';
                     $body = $content;
                     $tempbox=new box($box,$header_box,$body); 
                     $tmp2=$tempbox->display();

                     $row = array('jml'=>1);
                     $col = array('jml'=>2,'class'=>array('col-md-6','col-md-6'));

                     $divrowcol = new div_row_col($row,$col,array(array($tmp1,$tmp2)));
                     $tab_content[] = $divrowcol->display();

                   $header = array('Petunjuk','Jadwal & Syarat Pendaftaran');                   
                   $mytabs = new mytabs('tb',$header,$tab_content);
                   $tabs=$mytabs->display();
     

                    $txt_msg =''; 
                    if(!empty($msg)){                        
                       $callout = new callout('callout-danger','Pemberitahuan',$msg);
                       $txt_msg .= $callout->display(); 
                       }
                       $txt_msg.='<div id="ket"></div>'; 
                       
                       $row = array('jml'=>1);
                       $col = array('jml'=>1,'class'=>array('col-md-12'));

                       $divrowcol = new div_row_col($row,$col,array(array($txt_msg)));
                       $body = $divrowcol->display();
             
                                $from = new html_form(); 
                                $attr = array('class'=>'form-control',
                                              'id'=>'ktp',
                                              'placeholder'=>'KTP/NIK ...',
                                              'data-msg'=>'KTP/NIP Harus Diisi !!!',
                                              'data-inputmask'=>'"mask": "9999999999999999"',
                                              'required'=>'required',
                                              'data-mask'=>'data-mask',
                                              'width'=>'100%');
                                
                                if($isbuka==0){
                                   $attr['disabled']='disabled';
                                }

                                $input = $from->addInput('text','ktp','',$attr); 
                                $form_group = new form_group('No. KTP/NIK',$input);
                                $kiri = $form_group->display();
                         
                                
                                $attr['id']='nama'; 
                                $attr['placeholder']='Nama Lengkap ...';
                                $attr['data-msg']='Nama Lengkap Harus Diisi !!!';
                                $attr['style']='text-transform:uppercase;';
                                $attr['onkeyup']='javascript:this.value=this.value.toUpperCase();';
                                unset($attr['data-inputmask']);
                                unset($attr['data-mask']);

                                $input = $from->addInput('text','nama','',$attr); 
                                $form_group = new form_group('Nama Lengkap',$input);
                                $kiri .= $form_group->display();

                                    
                                $attr['class'] = 'form-control select2';
                                unset($attr['name']);
                                unset($attr['placeholder']);
                                $attr['id']='jk';
                                $attr['data-msg']='Jenis Kelamin Harus Dipilih !!!';
                                
                                $input = $from->addSelectList('jk',array(''=>'-- Pilih Jenis Kelamin --','L'=>'Laki-laki','P'=>'Perempuan'),true,null,null,$attr); 
                                $form_group = new form_group('Jenis Kelamin',$input);
                                $input_jk = $form_group->display();

                                
                                $attr['class']='form-control';
                                $attr['id']='tgl'; 
                                $attr['placeholder']='Tanggal Lahir ...';
                                $attr['data-msg']='Tanggal Lahir Harus Diisi !!!';
                                unset($attr['style']);
                                unset($attr['onkeyup']);
                                $attr['data-inputmask']='"mask": "99-99-9999"';
                                $attr['data-mask']='data-mask'; 
                                
                                $input = $from->addInput('text','tgl','',$attr); 
                                $form_group = new form_group('Tanggal Lahir',$input);
                                $input_tgl=$form_group->display();
                                
                                $row = array('jml'=>1);
                                $col = array('jml'=>2,'class'=>array('col-md-6','col-md-6'));

                                $divrowcol = new div_row_col($row,$col,array(array($input_jk,$input_tgl)));
                                $kiri .= $divrowcol->display();

                                $attr['class'] = 'form-control select2';
                                unset($attr['name']);
                                unset($attr['placeholder']);
                                unset($attr['data-inputmask']);
                                unset($attr['data-mask']); 
                                $attr['id']='thnlls';
                                $attr['data-msg']='Tahun Lulus Harus Dipilih !!!';
                                
                                $input = $from->addSelectList('thnlls',$drop_thnlls,true,null,'--- Pilih Tahun Lulus ---',$attr); 
                                $form_group = new form_group('Lulus SMA/SMK/MA Tahun',$input);
                                $kiri .= $form_group->display();

                        
                                $attr['class'] = 'form-control select2';
                                $attr['id']='fak';
                                $attr['data-msg']='Fakultas Harus Dipilih !!!';
                                
                                $input = $from->addSelectList('fak',$drop_fak,true,null,'--- Pilih Fakultas ---',$attr); 
                                $form_group = new form_group('Fakultas',$input);
                                $kanan = $form_group->display(); 

                                $attr['class'] = 'form-control select2';
                                $attr['id']='prodi';
                                $attr['data-msg']='Prodi Harus Dipilih !!!';
                                
                                $input = $from->addSelectList('prodi',array(),true,null,'--- Pilih Prodi ---',$attr); 
                                $form_group = new form_group('Prodi',$input);
                                $kanan .= $form_group->display(); 

                                $attr['class']='form-control';
                                $attr['id']='user'; 
                                $attr['placeholder']='Username ...';
                                $attr['data-msg']='Username Harus Diisi !!!';
                                $attr['maxlength']=10;
                                
                                $input = $from->addInput('text','user','',$attr); 
                                $form_group = new form_group('Username',$input);
                                $kanan .= $form_group->display();

                                $attr['class']='form-control';
                                $attr['id']='pass'; 
                                $attr['placeholder']='Password ...';
                                $attr['data-msg']='Password Harus Diisi !!!';
                                $attr['maxlength']=10;
                                
                                $input = $from->addInput('password','pass','',$attr); 
                                $form_group = new form_group('Password',$input);
                                $kanan .= $form_group->display();

                                $divrowcol = new div_row_col($row,$col,array(array($kiri,$kanan)));
                                $body .= $divrowcol->display();

                                $box=array('class'=>'');
                                $header_box = array('class'=>'with-border','title'=>'Daftar Mahasiswa Baru','tools'=>array(array('widget'=>'collapse','icon'=>'fa fa-minus'),array('widget'=>'remove','icon'=>'fa fa-times')));
                                
                                $btn_attr=array();
                                $btn_attr['class']='btn btn-info pull-right'; 
                                if($isbuka==0){
                                   $btn_attr['disabled']='disabled';
                                }   

                                $footer = $from->addButton('submit','','Buat Akun',$btn_attr); 

                                $tempbox=new box($box,$header_box,$body,$footer);
                                
                                $form = $from->startForm('#','post','buat_akun',array('name'=>'buat_akun')).$tempbox->display().$from->endForm(); 

                                $row = array('jml'=>2);
                                $col = array('jml'=>1,'class'=>array('col-md-12'));

                                $divrowcol = new div_row_col($row,$col,array(array($tabs),array($form)) );
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
  });
</script>
</body>
</html>
