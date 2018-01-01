<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>      

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $judul;?></h4>
      </div>
       <form id="prodidata" action="" method="post" enctype="multipart/form-data">  
      <div class="modal-body">
        <div id="ketprodidata"></div>
         <div class="row">
        <!-- left column -->
        <div class="col-md-6">
                <input type="hidden" name="id_old" value="<?php echo (!isset($id)?'':$id); ?>">
                      <div class="form-group">
                         <label>Id Prodi.</label>
                         <input type="text" class="form-control"  id="id" name="id" value="<?php echo !isset($id)?'':$id; ?>" placeholder="Id Fakultas ..."   data-msg="Id Prodi Harus Diisi !!!" required>
                      </div>
                      <!-- /.form-group --> 
                      <div class="form-group">
                         <label>Nama Prodi</label>
                         <input type="text" class="form-control"  id="nm" name="nm" value="<?php echo !isset($nm)?'':$nm; ?>" placeholder="Nama Fakultas ..."  data-msg="Nama Prodi Harus Diisi !!!" required>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                         <label>No Urut</label>
                         <input type="text" class="form-control"  id="urut" name="urut" value="<?php echo !isset($urut)?'':$urut; ?>" placeholder="No Urut ..."  data-msg="No Urut Harus Diisi !!!" required>
                      </div>
                      <!-- /.form-group -->

                      <div class="form-group">
                         <label>Fakultas</label>
                        <select class="form-control select2" id="fak" name="fak" style="width: 100%;" data-msg="Fakultas Harus Dipilih !!!" required>
                          <?php echo $drop_fak ?>
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