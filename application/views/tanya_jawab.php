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
  <title>PMBOnline | Tanya Jawab</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datepicker/datepicker3.css">
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
        Tanya Jawab        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tanya Jawab</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      
       <?php 
                       $txt_msg='<div id="ket"></div>'; 
                       
                       $row = array('jml'=>1);
                       $col = array('jml'=>1,'class'=>array('col-md-12'));

                       $divrowcol = new div_row_col($row,$col,array(array($txt_msg)));
                       echo $divrowcol->display();

                               
                                $from = new html_form(); 
                                $attr = array('class'=>'form-control',
                                              'id'=>'ktp',
                                              'placeholder'=>'KTP/NIK ...',
                                              'data-msg'=>'KTP/NIP Harus Diisi !!!',
                                              'data-inputmask'=>'"mask": "9999999999999999"',
                                              'required'=>'required',
                                              'data-mask'=>'data-mask',
                                              'width'=>'100%');
                                

                                $input = $from->addInput('text','ktp','',$attr); 
                                $form_group = new form_group('No. KTP/NIK',$input);
                                $kiri = $form_group->display();

                                $attr['id']='nama'; 
                                $attr['placeholder']='Nama ...';
                                $attr['data-msg']='Nama Harus Diisi !!!';                                
                                unset($attr['data-inputmask']);
                                unset($attr['data-mask']);

                                $input = $from->addInput('text','nama','',$attr); 
                                $form_group = new form_group('Nama',$input);
                                $kiri .= $form_group->display();

                                    
                                $attr['class'] = 'form-control';
                                unset($attr['name']);
                                unset($attr['placeholder']);                                
                                $attr['id']='jk';
                                $attr['data-msg']='Jenis Kelamin Harus Dipilih !!!';
                                
                                $input = $from->addSelectList('jk',array(''=>'-- Pilih Jenis Kelamin --','L'=>'Laki-laki','P'=>'Perempuan'),true,null,null,$attr); 
                                $form_group = new form_group('Jenis Kelamin',$input);
                                $kanan=$form_group->display();

                                
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
                                $kanan.=$form_group->display();
                                
                                $attr['class']='form-control';
                                $attr['id']='pertanyaan'; 
                                $attr['placeholder']='Pertanyaan ...';
                                $attr['data-msg']='Pertanyaan Harus Diisi !!!';
                                unset($attr['style']);
                                unset($attr['onkeyup']);
                                unset($attr['data-inputmask']);
                                unset($attr['data-mask']); 
                                
                                $input = $from->addTextarea('pertanyaan',3,30,'',$attr); 
                                $form_group = new form_group('Pertanyaan',$input);
                                $kiri.=$form_group->display();

                                $callout=new callout('callout-info','Pemberitahuan','System tidak menyimpan no ktp maupun tanggal lahir penanya.');
                                $kanan.=$callout->display(); 


                   $row = array('jml'=>1);
                   $col = array('jml'=>2,'class'=>array('col-md-6','col-md-6'));
                   $divrowcol = new div_row_col($row,$col,array(array($kiri,$kanan)));


                   $box=array('class'=>'');
                   $header_box = array('class'=>'with-border','title'=>'Pertanyaan','tools'=>array(array('widget'=>'collapse','icon'=>'fa fa-minus'),array('widget'=>'remove','icon'=>'fa fa-times')));
                   $body = $divrowcol->display(); 
                   
                   $btn_attr=array();
                   $btn_attr['class']='btn btn-info pull-right'; 
                   $footer = $from->addButton('submit','','Submit',$btn_attr);                   
                   $tempbox=new box($box,$header_box,$body,$footer); 
                   $form = $from->startForm('#','post','pertanyaan',array('name'=>'pertanyaan')).$tempbox->display().$from->endForm(); 
                   
                   $content3=array(array($form));

                   $chat_box = new chat_box($arr_tanya,$arr_jawab);
                   $header_box = array('class'=>'with-border','title'=>'Pertanyaan dan Jawaban','tools'=>array(array('widget'=>'collapse','icon'=>'fa fa-minus'),array('widget'=>'remove','icon'=>'fa fa-times')));
                   $body = array('class'=>'chat','content'=>$chat_box->display(),'id'=>'chat-box'); 
                   $tempbox=new box($box,$header_box,$body); 
                   $content3[]=array($tempbox->display());


                   $row = array('jml'=>2);
                   $col = array('jml'=>1,'class'=>array('col-md-12'));

                   $divrowcol = new div_row_col($row,$col,$content3);
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
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
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

  function after()
  {
    window.location.href = "<?php echo site_url('Main_dashboard/tanya_jawab'); ?>";
  }

  $(function () {
    $("[data-mask]").inputmask();    
    //Date picker    
    $('#tgl').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });
    $("#pertanyaan").validate();

    $("#pertanyaan").submit(function(e) {
        //prevent Default functionality
        e.preventDefault();
        var isvalid = $("#pertanyaan").valid();
        if (isvalid) {
              var ktp = $("#ktp").val();
              var t = $("#tgl").val();
              var jk = $("#jk").val();
              if(jk=='P'){
                var tmp =Number(t.substr(0,2))+40;
                var sTgl = tmp.toString()+t.substr(3,2)+t.substr(8,2); 
              }else{    
                var sTgl = t.substr(0,2)+t.substr(3,2)+t.substr(8,2);
              }  
              if (ktp.search(sTgl)<0)
              {
                $('#ket').html('<div class="callout callout-danger"><h4>Pemberitahuan</h4><p>Tanggal lahir dan nomor ktp-nya tidak cocok !</p> </div>');
              }else{     
                data = $("#pertanyaan").serialize();
                myajax('ket',data,'<?php echo base_url();?>index.php/Main_dashboard/save_tanya',null,after);    
              }
        }        
    });

    
  });
</script>
</body>
</html>
