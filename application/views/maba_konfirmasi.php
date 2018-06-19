<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['menu_idx']=$menu_idx;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PMBOnline | Konfirmasi Pembayaran</title>
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
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/singleuploadimages/main.css">
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
    <a href="index2.html" class="logo">
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
      <?php $this->load->view('side_bar_menu1',$data);  ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Konfirmasi Pembayaran        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Konfirmasi Pembayaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">       
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
                  <div class="box box-primary">
                 <div class="box-header with-border">
                  <h3 class="box-title">Konfirmasi Pembayaran</h3>
                 </div>
       
           <form id="datakonf" action="" method="post" enctype="multipart/form-data">    
              <div class="box-body">       
          
                <div id="ketdatakonf"></div>                    
                
                     <div class="form-group">
                        <label>Bank</label>
                        <input type="text" class="form-control" id="bank" name="bank"  placeholder="Bank ..."  value="<?php echo $bank; ?>"    data-msg="Bank Harus Diisi !!!" required>  
                      </div>                      
                      <!-- /.form-group -->                    
                      

                      <div class="form-group">
                             <label>Tanggal Transfer </label> 
                             <input type="text" class="form-control" id="tgltrans" name="tgltrans" value="<?php echo $tgl_trans; ?>" placeholder="Tanggal Transfer ..." data-inputmask='"mask": "99-99-9999"' data-msg="Tanggal Transfer Harus Diisi !!!" required data-mask>
                          </div>
                          <!-- /.form-group -->  

                      <div class="form-group">
                 <label>Upload Bukti Transfer</label>
                        <div id="paper">
                            <div id="console">
                                <div id="uploadbox1" onClick="singleupload_input1.click();" class="singleupload">
                                  <?php 
                                    if(!empty($kwitansi))
                                    {
                                  ?>
                                    <img src="<?php echo base_url().'assets/photo/'.$kwitansi; ?>" style="width:86.4px;height:86.4px;"> 
                                  <?php 
                                    }
                                  ?>
                                </div>
                                <input type="file" id="singleupload_input1" style="display:none;" name="img" value=""/>
                            </div>
                       </div>
                      <font size='1'>untuk upload photo klick kotak di atas</font>
                      <input type='hidden' name='nm_file1' id='nm_file1' value='<?php echo $kwitansi; ?>'>
                      <div id="ketuploadkwitansi"></div>  
                </div>

                 </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-primary" onclick="cetak()" <?php echo ($ver==1 ? "" :"disabled" ); ?> >Kartu Ujian</button>
              </div>
      </form>    
        </div>
          <!-- /.box -->           
                            
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            <!-- general form elements -->
                <?php    
                    $desc = new desc($bayar);
                             
                    $box=array('class'=>'box-primary');
                    $header_box = array('class'=>'','title'=>'Petunjuk Pembayaran');
                    $body = $desc->display('dl-horizontal'); 
                    $tempbox=new box($box,$header_box,$body); 
                    echo $tempbox->display();

                     $header = array(array('Gelombang','Jadwal Pendaftaran','Test & Wawancara')); 
                     $box=array('class'=>'box-primary');
                     $header_box = array('class'=>'','title'=>'Jadwal Pendaftaran');
                     
                     $tbstat = array("id" => "jdwl",'width'=>'100%');
                     $isi_data = $tb_jdwl;
                     $tbl = new mytable($tbstat,$header,$isi_data,''); 
                     $content = '<div>'.$tbl->display().'</div>';
                     $body = $content;
                     $tempbox=new box($box,$header_box,$body); 
                     echo $tempbox->display();
                ?>
        </div>
      </div> 
             

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; September 2017 <a href="#">Cecep Suwanda</a> Powered by AdminLTE.</strong> All rights
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
<!-- DataTables 
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>-->
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url();?>assets/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard2.js"></script>-->  
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>assets/plugins/singleuploadimages/jquery.singleuploadimage.js"></script>
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

   function cetak()
     {
      //myajax('','','<?php echo base_url();?>index.php/Wisudawan_dashboard/cetak');
      window.location = '<?php echo base_url();?>index.php/Maba_dashboard/cetak';
     }  

  $(function () {
    $("[data-mask]").inputmask();

    //Date picker
    $('#tgltrans').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

                 $('#uploadbox1').singleupload({
                    action: 'do_upload', //action: 'do_upload.json'
                    inputId: 'singleupload_input1',
                    onError: function(code) {                      
                      //console.debug('error code '+res.code);
                    },onSuccess: function(url, code) { 
                       if(url==''){
                         $('#ketuploadkwitansi').html("<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Gagal upload gambar !!!</p> </div>");
                         $('#nm_file1').val(url);
                       }else{
                        $('#nm_file1').val(url);
                        $('#ketuploadkwitansi').html("<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Berhasil upload gambar !!!</p> </div>");
                       }
                    }
                  });


    $("#datakonf").validate();
    $("#datakonf").submit(function(e) {

        //prevent Default functionality
        e.preventDefault();
        var isvalid = $("#datakonf").valid();
        if (isvalid) {
                 data = $("#datakonf").serialize();
                 myajax('ketdatakonf',data,'<?php echo base_url();?>index.php/Maba_dashboard/konf');                 
        }        
    }); 
    
  });
</script>
</body>
</html>
