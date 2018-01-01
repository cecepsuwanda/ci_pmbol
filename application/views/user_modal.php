<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>      

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $judul;?></h4>
      </div>
       <form id="admindata" action="" method="post" enctype="multipart/form-data">  
      <div class="modal-body">
        <div id="ketadmindata"></div>
         <div class="row">
        <!-- left column -->
        <div class="col-md-6">
                          <input type="hidden" name="id" value="<?php echo (!isset($id)?'':$id); ?>">
                      <div class="form-group">
                         <label>Username</label>
                         <input type="text" class="form-control"  id="user" name="user" value="<?php echo !isset($user_name)?'':$user_name; ?>" placeholder="Username ..."  <?php echo ( ( (isset($user_name)) and ($user_name=='admin') ) ? 'disabled':''); ?>  data-msg="Username Harus Diisi !!!" required>
                      </div>
                      <!-- /.form-group --> 
                      <div class="form-group">
                         <label>Password</label>
                         <input type="password" class="form-control" id="pass" name="pass" placeholder="Password ..." data-msg="Password Harus Diisi !!!" required>
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