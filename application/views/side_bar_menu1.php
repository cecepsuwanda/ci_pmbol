<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php echo ($menu_idx==0 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>index.php/Wisudawan_dashboard/index">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>            
          </a>          
        </li>
        <!--<li class="active treeview">
          <a href="<?php echo base_url();?>index.php/Wisudawan_dashboard/message">
            <i class="fa fa-dashboard"></i> <span>Message</span>            
          </a>          
        </li>-->
        <li class="<?php echo ($menu_idx==1 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>index.php/Wisudawan_dashboard/data">
            <i class="fa fa-edit"></i> <span>Data Wisudawan</span>            
          </a>          
        </li>      
        <li class="<?php echo ($menu_idx==2 ? 'active ':''); ?>treeview">
          <a href="<?php echo base_url();?>index.php/Wisudawan_dashboard/logout">
            <i class="fa fa-graduation-cap"></i> <span>Logout Wisudawan</span>            
          </a>          
        </li>      
      </ul>
