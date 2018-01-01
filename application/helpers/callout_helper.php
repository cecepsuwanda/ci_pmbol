<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class callout
{
	private $class_;
	private $title_;
	private $content_;

	function __construct($class,$title,$content)
	{
		$this->class_=$class;
		$this->title_=$title;
		$this->content_=$content;

	}

	function display()
	{
        $txt="<div class='callout $this->class_'>";
        $txt.="<h4>$this->title_</h4>";
        $txt.="<p>$this->content_</p>"; 
        $txt.='</div> ';
        return $txt;
	}
}