<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>      

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data Wisudawan :</h4>
      </div>
       <form id="datawisudawan" action="" method="post" enctype="multipart/form-data">  
      <div class="modal-body">
        <div id="ketdatawisudawan"></div>
         <div class="row">
        <!-- left column -->
        <div class="col-md-6">
           <div class="form-group">
                 <label>Photo Wisudawan</label>
                        <div id="paper">
                            <div id="console">
                                <div id="uploadbox" onClick="singleupload_input.click();" class="singleupload">                                
                                    <img src="" style="width:86.4px;height:86.4px;"> 
                                </div>
                                <input type="file" id="singleupload_input" style="display:none;" name="img" value=""/>
                            </div>
                       </div>
                      <font size='1'>untuk upload photo klick kotak di atas</font>
                      <input type='hidden' name='nm_file' id='nm_file' value=''>
                      <div id="ketuploadphoto"></div>  
                </div>
                 <div class="form-group">
                 <label>No. KTP/NIK</label>
                 <input type="text" class="form-control" id="ktp" name="ktp" value=""  placeholder="KTP/NIK ..."   data-inputmask='"mask": "9999999999999999"' data-msg="KTP/NIP Harus Diisi !!!" data-mask required >
                 </div>
                      <!-- /.form-group --> 
                <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="" placeholder="Nama Lengkap ..."    style="text-transform:uppercase;" on keyup="javascript:this.value=this.value.toUpperCase();" data-msg="Nama Lengkap Harus Diisi !!!" required >
                </div>
                <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat Lahir ..."  value=""  >
                </div>
                      <div class="row">
                        <div class="col-md-6">
                          <!-- /.form-group --> 
                          <div class="form-group">
                             <label>Jenis Kelamin</label>
                             <select class="form-control select2" id="jk" name="jk" style="width: 100%;" data-msg="Jenis Kelamin Harus Dipilih !!!" required >
                               <option value='' selected="selected" >-- Pilih Jenis Kelamin --</option>
                               <option value='1' >Laki-laki</option>                                                              
                               <option value='2' >Perempuan</option>
                            </select>
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">  
                          <div class="form-group">
                             <label>Tanggal Lahir</label>
                             <input type="text" class="form-control" id="datepicker" id="tgl" name="tgl" value=""  placeholder="Tanggal Lahir ..." data-inputmask='"mask": "99-99-9999"' data-mask data-msg="Tanggal Harus Diisi !!!" required>
                          </div>
                          <!-- /.form-group -->
                        </div>
                      </div> 
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat ..."></textarea>
                </div>  

                <div class="form-group">
                 <label>No. HP</label>
                 <input type="text" class="form-control" id="hp" name="hp"  placeholder="Nomor HP ..."  value=""  data-inputmask='"mask": "999999999999"'  data-mask>
                 </div>                      
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            <!-- general form elements -->
          <div class="form-group">
                         <label>Fakultas</label>
                        <select class="form-control select2" id="fak" name="fak" style="width: 100%;" data-msg="Fakultas Harus Dipilih !!!"  required >
                          <?php echo $drop_fak ?>
                        </select>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Prodi</label>
                        <select class="form-control select2" id="prodi" name="prodi" style="width: 100%;" data-msg="Prodi Harus Dipilih !!!" required >
                          <option value = '' selected="selected">--- Pilih Prodi ---</option>                       
                        </select>
                      </div>                      
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Angkatan</label>
                        <select class="form-control select2" id="ang" name="ang" style="width: 100%;" data-msg="Angkatan Harus Dipilih !!!" required >
                          <?php echo $drop_ang ?>
                        </select>
                      </div>                      
                      <!-- /.form-group -->
                      <div class="form-group">
                         <label>NIM</label>
                         <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM ..." value="" data-inputmask='"mask": "A9A999999"' data-mask data-msg="NIM Harus Diisi !!!" required >
                      </div>
                      <!-- /.form-group -->
             
              
                
                <div class="row">
                        <div class="col-md-6">
                        <!--  <div class="form-group">
                          <label>IPK</label>
                         <input type="text" class="form-control" id="ipk" name="ipk" placeholder="IPK ..." value="<?php echo $ipk; ?>"  data-inputmask='"mask": "9.99"'  data-mask>
                      </div>
                      <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">  
                         <!-- <div class="form-group">
                             <label>Tanggal Lulus</label> 
                             <input type="text" class="form-control" id="datepicker1" id="tgllls" name="tgllls" value="<?php echo $tgl_lls; ?>" placeholder="Tanggal Lulus ..." data-inputmask='"mask": "99-99-9999"'  data-mask>
                          </div>
                          <!-- /.form-group -->
                        </div>
                      </div> 
                      
                      <div class="form-group">
                        <label>Judul Skripsi</label>
                        <textarea name="jdlskripsi" class="form-control" rows="3"  placeholder="Judul Skripsi ..."></textarea>
                      </div>

                      <div class="form-group">
                             <label>Tanggal Bayar Wisuda</label> 
                             <input type="text" class="form-control" id="datepicker2" id="tglbyr" name="tglbyr" value="" placeholder="Tanggal Bayar Wisuda ..." data-inputmask='"mask": "99-99-9999"' data-mask data-msg="Tanggal Bayar Wisuda Harus Diisi !!!" required >
                          </div>
                          <!-- /.form-group -->  

                      <div class="form-group">
                 <label>Upload Kwitansi Pembayaran Wisuda</label>
                        <div id="paper">
                            <div id="console">
                                <div id="uploadbox1" onClick="singleupload_input1.click();" class="singleupload">
                                    <img src="" style="width:86.4px;height:86.4px;"> 
                                </div>
                                <input type="file" id="singleupload_input1" style="display:none;" name="img" value=""/>
                            </div>
                       </div>
                      <font size='1'>untuk upload photo klick kotak di atas</font>
                      <input type='hidden' name='nm_file1' id='nm_file1' value=''>
                      <div id="ketuploadkwitansi"></div>  
                </div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
      </div>
    </form>