<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class todo_list
{
	private $content_;
	

	function __construct($content)
	{
		$this->content_=$content;
  }

	function display()
	{
        $txt='<ul class="todo-list">';
        if(!empty($this->content_))
        {
        	foreach ($this->content_ as $value) {
            $txt.='<li>';
            $txt.="<span class='text'>$value</span>";                  
            $txt.='</li>';
          }
        }
        $txt.='</ul>'; 

        return $txt;
	}
}