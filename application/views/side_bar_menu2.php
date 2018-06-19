<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php echo ($menu_idx==0 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>admin_dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>            
          </a>          
        </li>
        <li class="<?php echo ($menu_idx==1 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>admin_log">
            <i class="fa fa-edit"></i> <span>User Log dan Upload Photo</span>            
          </a>          
        </li>
        <li class="<?php echo ($menu_idx==2 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>admin_berita">
            <i class="fa fa-newspaper-o"></i> <span>Berita</span>            
          </a>          
        </li>
        <li class="<?php echo ($menu_idx==3 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>admin_data_baru">
            <i class="fa fa-graduation-cap"></i> <span>Data Mahasiswa Baru</span>            
          </a>          
        </li>      
        <li class="<?php echo ($menu_idx==4 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>admin_setting">
            <i class="fa fa-gear"></i> <span>Setting</span>            
          </a>          
        </li>
        <li class="<?php echo ($menu_idx==6 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>admin_tanya_jawab">
            <i class="fa fa-edit"></i> <span>Tanya Jawab</span>            
          </a>          
        </li>
        <li class="<?php echo ($menu_idx==5 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>admin_logout">
            <i class="fa fa-user"></i> <span>Logout Admin</span>            
          </a>          
        </li>      
      </ul>
