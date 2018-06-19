<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <!--
        <li class="<?php echo ($menu_idx==3 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>index.php/Main_dashboard/jadwal_syarat">
            <i class="fa fa-edit"></i> <span>Jadwal & Syarat Pendaftaran</span>            
          </a>          
        </li>-->      
        <li class="<?php echo ($menu_idx==1 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>buat_akun">
            <i class="fa fa-edit"></i> <span>Daftar Mahasiswa Baru</span>            
          </a>          
        </li>
        <li class="<?php echo ($menu_idx==4 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>berita">
            <i class="fa fa-newspaper-o"></i> <span>Berita</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"><?php echo $jml_berita;?></span>
            </span>            
          </a>          
        </li>        
        <li class="<?php echo ($menu_idx==0 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>data_masuk">
            <i class="fa fa-dashboard"></i> <span>Data Masuk</span> 
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?php echo $jml_daftar; ?></small>
              <small class="label pull-right bg-green"><?php echo $jml_konf; ?></small>
              <small class="label pull-right bg-red"><?php echo $jml_ver; ?></small>
            </span>           
          </a>          
        </li> 
        <li class="<?php echo ($menu_idx==5 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>tanya_jawab">
            <i class="fa fa-dashboard"></i> <span>Tanya Jawab</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $jml_tanya; ?></small>
              <small class="label pull-right bg-blue"><?php echo $jml_jawab; ?></small>
            </span>            
          </a>          
        </li>
        <li class="<?php echo ($menu_idx==2 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>maba_app">
            <i class="fa fa-graduation-cap"></i> <span>Login Mahasiswa Baru</span>            
          </a>          
        </li>      
      </ul>
