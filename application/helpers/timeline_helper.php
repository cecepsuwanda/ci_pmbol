<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class timeline
{
	private $arr_timeline;
	
	function __construct($timeline)
	{
		$this->arr_timeline=$timeline;
	}

	function display($isadmin=0)
	{
        
        $timeline ='<ul class="timeline timeline-inverse"> ';

       if(!empty($this->arr_timeline))
       {
        foreach ($this->arr_timeline as $key=>$row) {
           $timeline .= '<li class="time-label"><span class="bg-red">'.$key.'</span></li>';
           
           foreach ($row as $value) {
                   $timeline .= '<li>
                                  <i class="fa fa-user bg-aqua"></i>
                                  <div class="timeline-item">
                                  <span class="time"><i class="fa fa-clock-o"></i> '.$value['waktu'].'</span>
                                  <h3 class="timeline-header"><a href="#">Admin</a></h3>
                                  <div class="timeline-body" '.($isadmin==0 ? '' : 'id="msgbdy_'.$value['id'].'"').'>'
                                 .nl2br($value['msg']).'</div>';
                                
                   $timeline .= $isadmin==0 ? '' : '<div class="timeline-footer">
                                <a class="btn btn-danger btn-xs" id="edit_'.$value['id'].'"  onclick="edit_berita('."'$value[id]'".')" href="javascript:void(0);">Edit</a>
                                <a class="btn btn-danger btn-xs"   onclick="delete_berita('."'$value[id]'".')" href="javascript:void(0);" >Delete</a>
                                <a class="btn btn-danger btn-xs" id="save_'.$value['id'].'"  onclick="save_berita('."'$value[id]'".')" href="javascript:void(0);" style="display: none;" >Save</a>
                                </div>';


                   $timeline .= '</div></li>';        
           }           
   
        }
       }
       $timeline .='<li>';
       $timeline .='<i class="fa fa-clock-o bg-gray"></i>';
       $timeline .='</li>';

       $timeline .='</ul>';
     return $timeline;

        
	}
}