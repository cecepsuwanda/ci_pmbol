<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Glmb_model extends CI_Model {

   public function getdata($where)
   {      
      $this->db->select('*');
      $this->db->from('tb_glmb');
      if(!empty($where)){
        $this->db->where($where);      
      }
        
      $this->query = $this->db->get();
      $hsl=array();
      if($this->query->num_rows()>0)
      {
        foreach($this->query->result_array() as $row)
        {
           $hsl[]=$row;
        }
      }
      return $hsl; 
   }

  public function getglmbjdwl($thn)
  {
    $data = $this->getdata('thn='.$thn);
    
    $jdwl=array();
    if(!empty($data)){
      foreach($data as $row) {       
       $jdwl[$row['glmb']]=array('awal'=>$row['awal'],'akhir'=>$row['akhir'],'ujian'=>$row['ujian']);
      }
    }

    return $jdwl;
  }

  public function updatedata($data)
  {
    foreach ($data as $key=>$row) {
       $this->db->set('thn',$row['thn']);
       $this->db->set('glmb',$key);
       $this->db->set('awal',$row['awal']);
       $this->db->set('akhir',$row['akhir']);
       $this->db->set('ujian',$row['ujian']);  
       $this->db->where(array('thn'=>$row['thn_old'],'glmb'=>$key));
       $this->db->update('tb_glmb');
     }     
  } 
  

}