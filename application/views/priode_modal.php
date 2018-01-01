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
                          <input type="hidden" name="id" value="<?php echo (!isset($id)?'':$id); ?>">
                          <div class="form-group">
                             <label>Tanggal Wisuda</label> 
                             <input type="text" class="form-control" id="datepicker" id="tglwisuda" name="tglwisuda" value="<?php echo !isset($wisuda)?'':$wisuda; ?>" placeholder="Tanggal Wisuda ..." data-inputmask='"mask": "99-99-9999"' data-mask>
                          </div>
                          <!-- /.form-group --> 
                          <div class="form-group">
                             <label>Tanggal Daftar Wisuda</label> 
                             <input type="text" class="form-control" id="datepicker1" id="tgldaftar" name="tgldaftar" value="<?php echo !isset($daftar)?'':$daftar; ?>" placeholder="Tanggal Daftar Wisuda ..." data-inputmask='"mask": "99-99-9999 - 99-99-9999"' data-mask>
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