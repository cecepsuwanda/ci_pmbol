<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>      

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $judul;?></h4>
      </div>
       <form id="datapriode" action="" method="post" enctype="multipart/form-data">  
      <div class="modal-body">
        <div id="ketdatapriode"></div>
         <div class="row">
        <!-- left column -->
        <div class="col-md-6">
                          <input type="hidden" name="thn_old" value="<?php echo (!isset($thn)?'':$thn); ?>">
                          <div class="form-group">
                             <label>PMB Tahun</label> 
                             <select class="form-control select2" id="thn" name="thn" style="width: 100%;" required>                               
                               <?php 
                                 echo $drop_thn;
                               ?>                               
                            </select>
                          </div>
                          <!-- /.form-group --> 
                          <div class="form-group">
                             <label>Priode Pendaftaran</label> 
                             <input type="text" class="form-control" id="datepicker1" id="tgldaftar" name="tgldaftar" value="<?php echo !isset($daftar)?'':$daftar; ?>" data-inputmask='"mask": "99-99-9999 - 99-99-9999"' data-mask required>
                          </div>
                          <!-- /.form-group -->
                         
                          <div class="form-group">
                             <label>Pendaftaran Gelombang 1</label> 
                             <input type="text" class="form-control" id="glmb1" name="glmb[1]" value="<?php echo !isset($glmb)?'':$glmb[1]; ?>" data-inputmask='"mask": "99-99-9999 - 99-99-9999"' data-mask required>
                          </div>
                          <!-- /.form-group -->

                          <div class="form-group">
                             <label>USM 1</label>
                             <input type="text" class="form-control" id="usm1" name="usm[1]" value="<?php echo !isset($usm)?'':$usm[1]; ?>"  placeholder="Tanggal USM 1 ..." data-inputmask='"mask": "99-99-9999"' data-msg="Tanggal USM 1 Harus Diisi !!!"  required data-mask>
                          </div>
                          <!-- /.form-group -->

                          <div class="form-group">
                             <label>Pendaftaran Gelombang 2</label> 
                             <input type="text" class="form-control" id="glmb2" name="glmb[2]" value="<?php echo !isset($glmb)?'':$glmb[2]; ?>" data-inputmask='"mask": "99-99-9999 - 99-99-9999"' data-mask required>
                          </div>
                          <!-- /.form-group -->
                          
                          <div class="form-group">
                             <label>USM 2</label>
                             <input type="text" class="form-control" id="usm2" name="usm[2]" value="<?php echo !isset($usm)?'':$usm[2]; ?>"  placeholder="Tanggal USM 2 ..." data-inputmask='"mask": "99-99-9999"' data-msg="Tanggal USM 2 Harus Diisi !!!"  required data-mask>
                          </div>
                          <!-- /.form-group -->
                          
                          <div class="form-group">
                             <label>Pendaftaran Gelombang 3</label> 
                             <input type="text" class="form-control" id="glmb3" name="glmb[3]" value="<?php echo !isset($glmb)?'':$glmb[3]; ?>" data-inputmask='"mask": "99-99-9999 - 99-99-9999"' data-mask required>
                          </div>
                          <!-- /.form-group -->

                          <div class="form-group">
                             <label>USM 3</label>
                             <input type="text" class="form-control" id="usm3" name="usm[3]" value="<?php echo !isset($usm)?'':$usm[3]; ?>"  placeholder="Tanggal USM 3 ..." data-inputmask='"mask": "99-99-9999"' data-msg="Tanggal USM 3 Harus Diisi !!!"  required data-mask>
                          </div>
                          <!-- /.form-group -->

                          
                          <div class="form-group">
                            <label>Biaya Pendaftaran</label>
                            <input type="text" class="form-control"  id="byr" name="byr" value="<?php echo !isset($byr)?'':$byr; ?>" placeholder="Biaya Pendaftaran ..."   data-msg="Biaya Harus Diisi !!!" required>
                          </div>
                         <!-- /.form-group --> 

                         <div class="form-group">
                             <label>Bank</label>
                             <input type="text" class="form-control"  id="bank" name="bank" value="<?php echo !isset($bank)?'':$bank; ?>" placeholder="Bank ..."  data-msg="Bank Harus Diisi !!!" required>
                         </div>
                         <!-- /.form-group -->
                      
                         <div class="form-group">
                             <label>Nomor Rekening</label>
                             <input type="text" class="form-control"  id="rek" name="rek" value="<?php echo !isset($rek)?'':$rek; ?>" placeholder="Nomor Rekening ..."  data-msg="Nomor Rekening Harus Diisi !!!" required>
                         </div>
                          <!-- /.form-group -->

                         <div class="form-group">
                             <label>Atas Nama</label>
                             <input type="text" class="form-control"  id="an" name="an" value="<?php echo !isset($an)?'':$an; ?>" placeholder="Atas Nama ..."  data-msg="Atas Nama Harus Diisi !!!" required>
                         </div>
                          <!-- /.form-group -->


                          <div class="form-group">
                             <label>Aktif</label>
                             <select class="form-control" id="aktif" name="aktif" style="width: 100%;">                               
                               <?php 
                                    if(!isset($aktif)){ ?>
                                      <option value='1' selected>Ya</option> 
                                      <option value='0'>Tidak</option>
                               <?php }
                                      else{ ?>
                                      <option value='1' <?php echo ($aktif==1)?'selected':''; ?> >Ya</option> 
                                      <option value='0' <?php echo ($aktif==0)?'selected':''; ?> >Tidak</option>
                               <?php } ?>
                            </select>
                          </div>
                          <!-- /.form-group -->
                        </div>
                   
        </div>
        <!--/.col (left) -->
        
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>           
      </div>
    </form>