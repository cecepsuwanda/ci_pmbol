<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class info_box
{
	private $icon_;
	private $text_;
	private $number_;

	function __construct($icon,$text,$number)
	{
		$this->icon_=$icon;
		$this->text_=$text;
		$this->number_=$number;

	}

	function display()
	{
       $txt='<div class="info-box">';
       $txt.='<span class="info-box-icon"><i class="'.$this->icon_.'"></i></span>';
       $txt.='<div class="info-box-content">';
       $txt.='<span class="info-box-text">'.$this->text_.'</span>';
       $txt.='<span class="info-box-number">'.$this->number_.'</span>';
       $txt.='</div>';            
       $txt.='</div>';          
       return $txt;
	}
}