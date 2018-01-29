<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>      

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Data Mahasiswa Baru : <?php echo $nama.'('.$id_peserta.')';  ?></h4>
      </div>
       
      
      <div class="modal-body">
         <div class="row">
        <!-- left column -->
        <div class="col-md-6">
           <!-- form start -->            
             <div class="box box-primary">
                <div class="box-header with-border">
                 <h3 class="box-title">Data Pribadi</h3>
            </div>
       
           <form id="datamaba" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_peserta_old" value="<?php echo (!isset($id_peserta)?'':$id_peserta); ?>">    
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
              <input type="hidden" name="id_peserta_old" value="<?php echo (!isset($id_peserta)?'':$id_peserta); ?>">   
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
           <input type="hidden" name="id_peserta_old" value="<?php echo (!isset($id_peserta)?'':$id_peserta); ?>">   
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
          <div class="box box-primary">
                 <div class="box-header with-border">
                  <h3 class="box-title">Keterangan</h3>
                 </div> 
            <form id="dataket" action="" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="id_peserta_old" value="<?php echo (!isset($id_peserta)?'':$id_peserta); ?>">   
              <div class="box-body">       
          
                <div id="ketdataket"></div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan ..."><?php echo $keterangan; ?></textarea>
                </div>  

                <div class="form-group">
                 <label>Verifikasi</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="verifikasi"  value="1" <?php echo (($ver==1)? 'checked':''); ?> >
                      Yes
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="verifikasi"  value="0" <?php echo (($ver==0)? 'checked':''); ?> >
                      No
                    </label>
                  </div>
                  
                 </div>
                      <!-- /.form-group -->

                 <div class="form-group">
                 <label>USM</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="usm"  value="1" <?php echo (($usm==1)? 'checked':''); ?> >
                      1
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="usm"  value="2" <?php echo (($usm==2)? 'checked':''); ?> >
                      2
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="usm"  value="3" <?php echo (($usm==3)? 'checked':''); ?> >
                      3
                    </label>
                  </div>
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
          
        </div>
      </div> 
      
      </div>
      <div class="modal-footer">
        
      </div>
    