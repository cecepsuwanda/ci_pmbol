<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php echo ($menu_idx==0 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>index.php/Maba_dashboard/index">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>            
          </a>          
        </li>
        <!--<li class="active treeview">
          <a href="<?php echo base_url();?>index.php/Wisudawan_dashboard/message">
            <i class="fa fa-dashboard"></i> <span>Message</span>            
          </a>          
        </li>-->
        <li class="<?php echo ($menu_idx==1 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>index.php/Maba_dashboard/data">
            <i class="fa fa-edit"></i> <span>Data Mahasiswa Baru</span>            
          </a>          
        </li>      
        <li class="<?php echo ($menu_idx==2 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>index.php/Maba_dashboard/konfirmasi">
            <i class="fa fa-graduation-cap"></i> <span>Konfirmasi Pembayaran</span>            
          </a>          
        </li>
        <li class="<?php echo ($menu_idx==4 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>index.php/Maba_dashboard/rubah">
            <i class="fa fa-graduation-cap"></i> <span>Rubah User dan Pass</span>            
          </a>          
        </li>
        <li class="<?php echo ($menu_idx==5 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>index.php/Maba_dashboard/logout">
            <i class="fa fa-graduation-cap"></i> <span>Logout Mahasiswa Baru</span>            
          </a>          
        </li>      
      </ul>
