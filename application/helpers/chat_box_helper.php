<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class chat_box
{
	private $arr_tanya;
  private $arr_jawab;
	
	function __construct($tanya,$jawab)
	{
		$this->arr_tanya=$tanya;
    $this->arr_jawab=$jawab;
	}

	function display($isadmin=0)
	{
        
     $txt = '';
     if(!empty($this->arr_tanya)){
                  foreach ($this->arr_tanya as $key => $data) 
                  {
                  
                      $txt.='<div class="item">';
                      if($data['jk']=='P'){
                         $txt.='<img src="'.base_url().'assets/dist/img/user4-128x128.jpg" alt="user image">';
                      }else{
                         $txt.='<img src="'.base_url().'assets/dist/img/user1-128x128.jpg" alt="user image">';
                      }
                      $txt.='<p class="message">';                      
                      $txt.='<a href="#" class="name">';
                      $txt.='<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> '.date('d M Y H:i:s ',strtotime($data['tanggal'])).'</small>';
                      $txt.=$data['nama'];
                      $txt.='</a>';
                      $txt.=$data['chat'];
                      $txt.='</p>'; 
                     
                      if(isset($this->arr_jawab[$key])){    
                         $txt.='<div class="attachment">';
                         //foreach ($data['commentar'] as $value) {
                             $txt.='<h4>Admin</h4>';
                             
                               $txt.='<p class="filename">';
                               $tmp=$this->arr_jawab[$key]['chat'];                               
                               if($isadmin==1){
                                $id=$this->arr_jawab[$key]['id'];
                                $tmp='<div id="msgbdy_'.$id.'">'.$tmp.'</div>';
                                $tmp.='<a class="btn btn-danger btn-xs" id="edit_'.$id.'"  onclick="edit_jawab('."'$id'".')" href="javascript:void(0);">Edit</a>';
                                $tmp.='<a class="btn btn-danger btn-xs" id="delete_'.$id.'"   onclick="delete_jawab('."'$id'".')" href="javascript:void(0);" >Delete</a>';
                                $tmp.='<a class="btn btn-danger btn-xs" id="save_'.$id.'"  onclick="save_jawab('."'$id'".')" href="javascript:void(0);" style="display: none;" >Save</a>';
                                $txt.=$tmp;
                               }else{
                                  $txt.=$tmp;
                               }

                               $txt.='</p>';

                         //}                        
                         $txt.='</div>';
                      }else{
                        if($isadmin==1){
                           $txt.='<div class="attachment">';
                           $txt.='<h4>Admin</h4>';
                           $txt.='<p class="filename">';
                           $txt.= '<div class="row">
                  <div class="col-md-12">
                   <div class="form-group">
                   <textarea id="jawab" name="jawab" class="form-control" rows="3" placeholder="Jawab ..."></textarea>
                  </div>
                </div>                
              </div>';                           
                           $txt.='<a class="btn btn-danger btn-xs" id="add_jawab"  onclick="add_jawab('."'$key'".')" href="javascript:void(0);" >Save</a>';
                           $txt.='</p>';
                           $txt.='</div>';                           
                        }
                      }
                      $txt.='</div>';
                }
     }             
     return $txt;   
	}
}