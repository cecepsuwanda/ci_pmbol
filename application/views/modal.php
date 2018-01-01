<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>      

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Data Wisudawan : <?php echo $nama.'('.$nim.')';  ?></h4>
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
                                  <?php 
                                    if(!empty($photo))
                                    {
                                  ?>
                                    <img src="<?php echo $photo; ?>" style="width:86.4px;height:86.4px;"> 
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
                 <label>No. KTP/NIK</label>
                 <input type="text" class="form-control" id="ktp" name="ktp" value="<?php echo $ktp; ?>"  placeholder="KTP/NIK ..."   data-inputmask='"mask": "9999999999999999"'  data-mask>
                 </div>
                      <!-- /.form-group --> 
                <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" placeholder="Nama Lengkap ..."    style="text-transform:uppercase;" on keyup="javascript:this.value=this.value.toUpperCase();"  >
                </div>
                <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat Lahir ..."  value="<?php echo $tmpt_lahir; ?>"  >
                </div>
                      <div class="row">
                        <div class="col-md-6">
                          <!-- /.form-group --> 
                          <div class="form-group">
                             <label>Jenis Kelamin</label>
                             <select class="form-control select2" id="jk" name="jk" style="width: 100%;">
                               
                               <option value='<?php echo $jk; ?>' ><?php echo ($jk==1 ? 'Laki-laki':'Perempuan') ; ?></option> 
                               <option value=''>-- Pilih Jenis Kelamin --</option>                               
                               <option value='<?php echo ($jk==1 ? 2 : 1); ?>' ><?php echo ($jk==1 ? 'Perempuan':'Laki-laki') ; ?></option>

                            </select>
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">  
                          <div class="form-group">
                             <label>Tanggal Lahir</label>
                             <input type="text" class="form-control" id="datepicker" id="tgl" name="tgl" value="<?php echo $tgl_lahir; ?>"  placeholder="Tanggal Lahir ..." data-inputmask='"mask": "99-99-9999"' data-mask>
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
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan ..."> <?php echo $keterangan; ?></textarea>
                </div>  

                <div class="form-group">
                 <label>Verifikasi</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="verifikasi"  value="1" <?php echo (($verifikasi==1)? 'checked':''); ?> >
                      Yes
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="verifikasi"  value="0" <?php echo (($verifikasi==0)? 'checked':''); ?> >
                      No
                    </label>
                  </div>
                  
                 </div>
                      <!-- /.form-group -->      
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            <!-- general form elements -->
                     <div class="form-group">
                         <label>Fakultas</label>
                        <select class="form-control select2" id="fak" name="fak" style="width: 100%;">
                          <?php echo $drop_fak ?>
                        </select>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Prodi</label>
                        <select class="form-control select2" id="prodi" name="prodi" style="width: 100%;">
                          <?php echo $drop_prodi ?>                         
                        </select>
                      </div>                      
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Angkatan</label>
                        <select class="form-control select2" id="ang" name="ang" style="width: 100%;">
                          <?php echo $drop_ang ?>
                        </select>
                      </div>                      
                      <!-- /.form-group -->
                      <div class="form-group">
                         <label>NIM</label>
                         <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM ..." value="<?php echo $nim; ?>" data-inputmask='"mask": "A9A999999"' data-mask>
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
                        <textarea name="jdlskripsi" class="form-control" rows="3"  placeholder="Judul Skripsi ..."><?php echo $jdl_skripsi; ?></textarea>
                      </div>

                      <div class="form-group">
                             <label>Tanggal Bayar Wisuda</label> 
                             <input type="text" class="form-control" id="datepicker2" id="tglbyr" name="tglbyr" value="<?php echo $tgl_byr; ?>" placeholder="Tanggal Bayar Wisuda ..." data-inputmask='"mask": "99-99-9999"' data-mask>
                          </div>
                          <!-- /.form-group -->  

                      <div class="form-group">
                 <label>Upload Kwitansi Pembayaran Wisuda</label>
                        <div id="paper">
                            <div id="console">
                                <div id="uploadbox1" onClick="singleupload_input1.click();" class="singleupload">
                                  <?php 
                                    if(!empty($kwitansi))
                                    {
                                  ?>
                                    <img src="<?php echo $kwitansi; ?>" style="width:86.4px;height:86.4px;"> 
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
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
      </div>
    </form>