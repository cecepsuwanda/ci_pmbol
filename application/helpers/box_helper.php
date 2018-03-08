<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class box
{
	private $box_;
	private $header_;
	private $body_;
  private $footer_;

	function __construct($box,$header,$body,$footer='')
	{
		$this->box_=$box;
		$this->header_=$header;
		$this->body_=$body;
    $this->footer_=$footer;

	}

	function display()
	{
        $txt='';
        if(!empty($this->box_))
        {
        	$txt.='<div class="box '.$this->box_['class'].'">';
            if(!empty($this->header_))
            {
              $txt.='<div class="box-header '.$this->header_['class'].'">';
              $txt.='<h3 class="box-title">'.$this->header_['title'].'</h3>';
              if(!empty($this->header_['tools'])){
                $txt.='<div class="box-tools pull-right">';
                foreach ($this->header_['tools'] as $row) {
                    $txt.='<button type="button" class="btn btn-box-tool" data-widget="'.$row['widget'].'"><i class="'.$row['icon'].'"></i>
                  </button>';  
                  }  
                  
                $txt.='</div>';
              }           
              $txt.='</div>';            
            }
            if(!empty($this->body_)){
               if(is_array($this->body_)){
                 $txt.='<div class="box-body '.$this->body_['class'].'" id="'.$this->body_['id'].'">';
                 $txt.=$this->body_['content']; 
                 $txt.='</div>'; 
               }else{  
                 $txt.='<div class="box-body">';
                 $txt.=$this->body_; 
                 $txt.='</div>';
               } 
              }

            if(!empty($this->footer_)){
                 $txt.='<div class="box-footer">';
                 $txt.=$this->footer_; 
                 $txt.='</div>';
              }      

            $txt.='</div>';        	  
        }


        return $txt;
	}
}