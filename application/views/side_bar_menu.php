<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php echo ($menu_idx==0 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>            
          </a>          
        </li>
        <!--<li class="treeview">
          <a href="<?php echo base_url();?>index.php/Main_dashboard/berita">
            <i class="fa fa-newspaper-o"></i> <span>Berita</span>            
          </a>          
        </li>-->
        <li class="<?php echo ($menu_idx==1 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>index.php/Main_dashboard/buat_akun">
            <i class="fa fa-edit"></i> <span>Daftar Mahasiswa Baru</span>            
          </a>          
        </li>      
        <li class="<?php echo ($menu_idx==2 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>index.php/Maba_dashboard/login">
            <i class="fa fa-graduation-cap"></i> <span>Login Mahasiswa Baru</span>            
          </a>          
        </li>      
      </ul>
