<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data['menu_idx']=$menu_idx;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PMBOnline | Data</title>
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
        Data Mahasiswa Baru        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Mahasiswa Baru</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">       
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
           <!-- form start -->            
             <div class="box box-primary">
                <div class="box-header with-border">
                 <h3 class="box-title">Data Pribadi</h3>
            </div>
       
           <form id="datamaba" action="" method="post" enctype="multipart/form-data">    
              <div class="box-body">       
          
                <div id="ketdatamaba"></div>            
                 <div class="form-group">
                 <label>Photo Mahasiswa Baru</label>
                        <div id="paper">
                            <div id="console">
                                <div id="uploadbox" onClick="singleupload_input.click();" class="singleupload">
                                  <?php 
                                    if(!empty($photo))
                                    {
                                  ?>
                                    <img src="<?php echo base_url().'assets/photo/'.$photo; ?>" style="width:86.4px;height:86.4px;"> 
                                  <?php 
                                    }
                                  ?> 

                                </div>
                                <input type="file" id="singleupload_input" style="display:none;" name="img" value=""/>
                            </div>
                       </div>
                      <font size='1'>untuk upload photo klick kotak di atas</font>
                      <input type='hidden' name='nm_file' id='nm_file' value='<?php echo $photo; ?>'>
                      <div id="ketuploadphoto"></div>  
                </div>

                 <div class="form-group">
                 <label>No. Peserta</label>
                 <input type="text" class="form-control" id="idpeserta" name="idpeserta" value="<?php echo $id_peserta; ?>"  placeholder="No. Peserta ..."  data-msg="No. Peserta Harus Diisi !!!" data-inputmask='"mask": "999999999"' required data-mask>
                 </div>
                      <!-- /.form-group --> 

                 <div class="form-group">
                 <label>No. KTP/NIK</label>
                 <input type="text" class="form-control" id="ktp" name="ktp" value="<?php echo $ktp; ?>"  placeholder="KTP/NIK ..."  data-msg="KTP/NIP Harus Diisi !!!" data-inputmask='"mask": "9999999999999999"' required data-mask>
                 </div>
                      <!-- /.form-group --> 
                
                <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" placeholder="Nama Lengkap ..."  data-msg="Nama Lengkap Harus Diisi !!!"  style="text-transform:uppercase;" on keyup="javascript:this.value=this.value.toUpperCase();" required >
                </div>
                
                <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat Lahir ..." data-msg="Tempat Lahir Harus Diisi !!!" value="<?php echo $tmpt_lahir; ?>" required >
                </div>
                      
                      <div class="row">
                        <div class="col-md-6">
                          <!-- /.form-group --> 
                          <div class="form-group">
                             <label>Jenis Kelamin</label>
                             <select class="form-control select2" id="jk" name="jk" style="width: 100%;"  data-msg="Jenis Kelamin Harus Dipilih !!!" required >
                               
                               <option value='<?php echo $jk; ?>' ><?php echo ($jk=='L' ? 'Laki-laki':'Perempuan') ; ?></option> 
                               <option value=''>-- Pilih Jenis Kelamin --</option>                               
                               <option value='<?php echo ($jk=='L' ? 'P' : 'L'); ?>' ><?php echo ($jk=='L' ? 'Perempuan':'Laki-laki') ; ?></option>

                            </select>
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">  
                          <div class="form-group">
                             <label>Tanggal Lahir</label>
                             <input type="text" class="form-control" id="tgl" name="tgl" value="<?php echo $tgl_lahir; ?>"  placeholder="Tanggal Lahir ..." data-inputmask='"mask": "99-99-9999"' data-msg="Tanggal Harus Diisi !!!"  required data-mask>
                          </div>
                          <!-- /.form-group -->
                        </div>
                      </div> 

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat ..."><?php echo $alamat; ?></textarea>
                </div>
                

                <div class="form-group">
                 <label>No. HP</label>
                 <input type="text" class="form-control" id="hp" name="hp"  placeholder="Nomor HP ..."  value="<?php echo $hp; ?>"  data-inputmask='"mask": "999999999999"'  data-mask>
                 </div>

                 
                 <div class="form-group">
                 <label>E-Mail</label>
                 <input type="email" class="form-control" id="email" name="email"  placeholder="E-Mail ..."  value="<?php echo $email; ?>" >
                 </div>                 


                      <div class="form-group">
                        <label>Lulus SMA/SMK/MA Tahun</label>
                        <select class="form-control select2" id="thnlls" name="thnlls" style="width: 100%;"  data-msg="Tahun Lulus Harus Dipilih !!!" required>
                          <?php echo $drop_thnlls ?>
                        </select>
                      </div>                      
                      <!-- /.form-group -->

                      <div class="form-group">
                        <label>Asal SMA/SMK/MA</label>
                        <input type="text" class="form-control" id="asal" name="asal"  placeholder="Asal SMA/SMK/MA ..."  value="<?php echo $asal; ?>" data-msg="Asal SMA/SMK/SMA Harus Dipilih !!!"    required>  
                      </div>                      
                      <!-- /.form-group -->                           
           </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                
              </div>
      </form>    
        </div>
          <!-- /.box -->                    
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            <!-- general form elements -->
                  
                <div class="box box-primary">
                 <div class="box-header with-border">
                  <h3 class="box-title">Pilihan Program Studi</h3>
                 </div>
       
           <form id="datapil" action="" method="post">    
              <div class="box-body">       
          
                <div id="ketdatapil"></div>

                     <div class="form-group">
                         <label>Fakultas</label>
                        <select class="form-control select2" id="fak" name="fak" style="width: 100%;"  data-msg="Fakultas Harus Dipilih !!!" required>
                          <?php echo $drop_fak ?>
                        </select>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Prodi</label>
                        <select class="form-control select2" id="prodi" name="prodi" style="width: 100%;"  data-msg="Prodi Harus Dipilih !!!" required>
                          <?php echo $drop_prodi ?>                         
                        </select>
                      </div>                      
                      <!-- /.form-group -->
                      
                      <div class="form-group">
                             <label>Kelas</label>
                             <select class="form-control select2" id="kelas" name="kelas" style="width: 100%;"  data-msg="Kelas Harus Dipilih !!!" required >
                              <?php if(!empty($kelas)){ ?>
                                 <option value='<?php echo $kelas; ?>' ><?php echo ($kelas=='R' ? 'Reguler':'Karyawan') ; ?></option> 
                                 <option value=''>-- Pilih Kelas --</option>                               
                                 <option value='<?php echo ($kelas=='R' ? 'K' : 'R'); ?>' ><?php echo ($kelas=='R' ? 'Karyawan':'Reguler') ; ?></option>
                              <?php }else{ ?>
                                 <option value=''>-- Pilih Kelas --</option> 
                                 <option value='R' >Reguler</option>
                                 <option value='K' >Karyawan</option>
                              <?php } ?>
                            </select>
                          </div>
                          <!-- /.form-group -->

                     </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>                
              </div>
      </form>    
        </div>
          <!-- /.box -->        
                 
                 <div class="box box-primary">
                 <div class="box-header with-border">
                  <h3 class="box-title">Konfirmasi Pembayaran</h3>
                 </div>
       
           <form id="datakonf" action="" method="post" enctype="multipart/form-data">    
              <div class="box-body">       
          
                <div id="ketdatakonf"></div>

                     <div class="callout callout-info">
                          <h4>Pemberitahuan</h4>
                          <p><?php echo $konf_msg; ?></p>
                      </div>
                
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

                <div class="box box-primary">
                 <div class="box-header with-border">
                  <h3 class="box-title">Rubah Username dan Password</h3>
                 </div>
       
           <form id="datarubah" action="" method="post">    
              <div class="box-body">       
          
                <div id="ketdatarubah"></div>

                <div class="form-group">
                         <label>Username</label>
                         <input type="text" class="form-control"  id="user" name="user" placeholder="Username ..." data-msg="Username Harus Diisi !!!" required>
                      </div>
                      <!-- /.form-group --> 
                      
                      <div class="form-group">
                         <label>Password</label>
                         <input type="password" class="form-control" id="pass" name="pass" placeholder="Password ..." data-msg="Password Harus Diisi !!!" required>
                      </div>
                      <!-- /.form-group -->

                      </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Rubah</button>                
              </div>
      </form>    
        </div>
          <!-- /.box -->
          
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
      window.location = '<?php echo base_url();?>index.php/Wisudawan_dashboard/cetak';
     }

  $(function () {
     $("[data-mask]").inputmask();
    
    
    $(".select2").select2();

    //Date picker
    $('#tgl').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    //Date picker
    $('#tgltrans').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true
    });

    

    $("#fak").change(function () {
       var idfak = $('#fak option:selected').val();
       data = "idfak=" + idfak;
       myajax('prodi',data,'<?php echo base_url();?>index.php/Main_dashboard/get_prodi');       
      });
        

    $("#datamaba").validate();
    $("#datapil").validate();
    $("#datakonf").validate();
    $("#datarubah").validate();
    

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

    $("#datamaba").submit(function(e) {

        //prevent Default functionality
        e.preventDefault();
        var isvalid = $("#datamaba").valid();
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
                $('#ketdatamaba').html('<div class="callout callout-danger"><h4>Pemberitahuan</h4><p>Tanggal lahir dan nomor ktp-nya tidak cocok !</p> </div>');
              }else{            
                 data = $("#datamaba").serialize();
                 myajax('ketdatamaba',data,'<?php echo base_url();?>index.php/Maba_dashboard/updatedatamaba');
              }       
        }        
    });

    $("#datapil").submit(function(e) {

        //prevent Default functionality
        e.preventDefault();
        var isvalid = $("#datapil").valid();
        if (isvalid) {
                 data = $("#datapil").serialize();
                 myajax('ketdatapil',data,'<?php echo base_url();?>index.php/Maba_dashboard/updatedatapil');                 
        }        
    });

    $("#datakonf").submit(function(e) {

        //prevent Default functionality
        e.preventDefault();
        var isvalid = $("#datakonf").valid();
        if (isvalid) {
                 data = $("#datakonf").serialize();
                 myajax('ketdatakonf',data,'<?php echo base_url();?>index.php/Maba_dashboard/konf');                 
        }        
    });

    $("#datarubah").submit(function(e) {

        //prevent Default functionality
        e.preventDefault();
        var isvalid = $("#datarubah").valid();
        if (isvalid) {
                 data = $("#datarubah").serialize();
                 myajax('ketdatarubah',data,'<?php echo base_url();?>index.php/Maba_dashboard/rubahuserpass');                 
        }        
    });

               

    
  });
</script>
</body>
</html>
