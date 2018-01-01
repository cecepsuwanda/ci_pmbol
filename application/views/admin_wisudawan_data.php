<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['menu_idx']=$menu_idx;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
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
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/singleuploadimages/main.css">
<style type="text/css">
.myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}
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
      <?php $this->load->view('side_bar_menu2',$data);  ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Wisudawan        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Wisudawan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
                  <?php 
                    $header = array(array('Photo','NIM','Nama','Tanggal Bayar','Kwitansi','Fakultas','Prodi','Keterangan','Aksi'));
                    $tbstat = array("id" => "wisudawan",'width'=>'100%');
                    $isi_data = $data_wisudawan;
                    $tbl = new mytable($tbstat,$header,$isi_data,'');
                    $content=array(array($tbl->display())); 

                    $row = array('jml'=>1);
                    $col = array('jml'=>1,'class'=>array('col-xs-12'));
                    $divrowcol = new div_row_col($row,$col,$content);
                    $body=$divrowcol->display();

                    $box=array('class'=>'collapsed-box');
                    $header_box = array('class'=>'with-border','title'=>'Wisudawan','tools'=>array(array('widget'=>'collapse','icon'=>'fa fa-plus'),array('widget'=>'remove','icon'=>'fa fa-times')));
                    $footer = '<button type="button" class="btn btn-primary" onclick="Cetak()">Cetak Data Wisudawan</button>';
                    $tempbox=new box($box,$header_box,$body,$footer); 
                    $content1=array(array($tempbox->display()));
                 
                    $tbstat = array("id" => "layak",'width'=>'100%');
                    $isi_data = $data_layak;
                    $tbl = new mytable($tbstat,$header,$isi_data,'');
                    $content=array(array($tbl->display())); 
                   
                    $divrowcol = new div_row_col($row,$col,$content);
                    $body=$divrowcol->display();

                    $header_box['title']='Layak Verifikasi';
                    $footer = '<button type="button" class="btn btn-primary" onclick="Verifikasi()">Cetak Form Verifikasi</button>'; 
                    $tempbox=new box($box,$header_box,$body,$footer); 
                    $content1[]=array($tempbox->display());
                 
                    $tbstat = array("id" => "calon",'width'=>'100%');
                    $isi_data = $data_calon;
                    $tbl = new mytable($tbstat,$header,$isi_data,'');
                    $content=array(array($tbl->display())); 
                   
                    $divrowcol = new div_row_col($row,$col,$content);
                    $body=$divrowcol->display();

                    $header_box['title']='Calon Wisudawan';
                    $tempbox=new box($box,$header_box,$body); 
                    $content1[]=array($tempbox->display());

                    $row = array('jml'=>3);
                    $col = array('jml'=>1,'class'=>array('col-md-12'));
                    $divrowcol = new div_row_col($row,$col,$content1);
                    echo $divrowcol->display();                    

                ?>  
              
              


  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
       <div id="modal">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><div id="title"></div></h4>       
         </div>
         <div class="modal-body">
            <img class="modal-content" id="img01" style="width:100%;height:100%;">
            <!-- Modal Caption (Image Text) -->
            <div id="caption"></div>
         </div>               
       </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 


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
<script src="<?php echo base_url();?>assets/plugins/singleuploadimages/jquery.singleuploadimage.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script> 
<script>
  
  $(function () {
    $("#wisudawan").DataTable();
    $("#calon").DataTable();
    $("#layak").DataTable();    
  });

// Get the image and insert it inside the modal - use its "alt" text as a caption

var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
var titleText = document.getElementById("title");

$('.myImg').click(function() {
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
    titleText.innerHTML = this.alt;
    $('#myModal').modal(); 
 })

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
                       fafter(data1);
                    }
                }
            }
        });
     }

  function after(data)
  {
    
    $('#myModal').modal();
    $("#myModal").on("hidden.bs.modal", function () {
      window.location.href = "<?php echo site_url('Admin_dashboard/data'); ?>";
     });

     $("[data-mask]").inputmask();
    
    
    $(".select2").select2();

    //Date picker
    $('#datepicker').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    //Date picker
    $('#datepicker1').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    //Date picker
    $('#datepicker2').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    $("#fak").change(function () {
       var idfak = $('#fak option:selected').val();
       data = "idfak=" + idfak;
       myajax('prodi',data,'<?php echo base_url();?>index.php/Main_dashboard/get_prodi');       
      });        

                 $('#uploadbox').singleupload({
                    action: 'do_upload', //action: 'do_upload.json'
                    inputId: 'singleupload_input',
                    onError: function(code) {
                      //console.debug('error code '+res.code);
                    },onSuccess: function(url, code) {
                      if(url==''){
                         $('#ketuploadphoto').html("<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Gagal upload gambar !!!</p> </div>");
                         $('#nm_file').val(url);
                       }else{
                        $('#nm_file').val(url);
                        $('#ketuploadphoto').html("<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Berhasil upload gambar !!!</p> </div>");
                       }
                    }
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

    $("#datawisudawan").submit(function(e) {

        //prevent Default functionality
        e.preventDefault();
                  
            data = $("#datawisudawan").serialize()+'&'+data;
            myajax('ketdatawisudawan',data,'<?php echo base_url();?>index.php/Admin_dashboard/updatedatawisudawan');    
                
    });


  }

  function after1(data)
  {
    
    $('#myModal').modal();
    $("#myModal").on("hidden.bs.modal", function () {
      window.location.href = "<?php echo site_url('Admin_dashboard/data'); ?>";
     });

    
    $("#datawisudawan").validate();

    $("[data-mask]").inputmask();
    
    
    $(".select2").select2();

    //Date picker
    $('#datepicker').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    //Date picker
    $('#datepicker1').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    //Date picker
    $('#datepicker2').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    $("#fak").change(function () {
       var idfak = $('#fak option:selected').val();
       data = "idfak=" + idfak;
       myajax('prodi',data,'<?php echo base_url();?>index.php/Main_dashboard/get_prodi');       
      });        

                 $('#uploadbox').singleupload({
                    action: 'do_upload', //action: 'do_upload.json'
                    inputId: 'singleupload_input',
                    onError: function(code) {
                      //console.debug('error code '+res.code);
                    },onSuccess: function(url, code) {
                      if(url==''){
                         $('#ketuploadphoto').html("<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Gagal upload gambar !!!</p> </div>");
                         $('#nm_file').val(url);
                       }else{
                        $('#nm_file').val(url);
                        $('#ketuploadphoto').html("<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Berhasil upload gambar !!!</p> </div>");
                       }
                    }
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

    $("#datawisudawan").submit(function(e) {

        //prevent Default functionality
        e.preventDefault();
        var isvalid = $("#datawisudawan").valid();
        if (isvalid) {
            data = $("#datawisudawan").serialize();
            myajax('ketdatawisudawan',data,'<?php echo base_url();?>index.php/Admin_dashboard/tambahdatawisudawan');    
        }        
    });


  }

  function after2(data)
  {
    window.location.href = "<?php echo site_url('Admin_dashboard/data'); ?>";
  }


  function modal_show(id)
  {
    myajax('modal','id_wisuda='+id,"<?php echo base_url();?>index.php/Admin_dashboard/baca_data_wisudawan",null,after);
    
  }

  function hapus_data(id)
  {
    myajax('','id_wisuda='+id,"<?php echo base_url();?>index.php/Admin_dashboard/hapus_data_wisudawan",null,after2);    
  }

  function modal1_show()
  {
    myajax('modal','',"<?php echo base_url();?>index.php/Admin_dashboard/tambah_data_wisudawan",null,after1);
    
  }

  function Verifikasi()
  {
    window.location = '<?php echo base_url();?>index.php/Admin_dashboard/cetak_verifikasi';
  }

  function Cetak()
  {
    window.location = '<?php echo base_url();?>index.php/Admin_dashboard/cetak_wisudawan';
  }
  
</script>
</body>
</html>
