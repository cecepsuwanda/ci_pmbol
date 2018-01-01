<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_maba_model extends CI_Model {

   public function getdata($where)
   {      
      $this->db->select('*');
      $this->db->from('tb_log_wisudawan');
      if(!empty($where)){
        $this->db->where($where);      
      }

      $this->db->order_by('out_time desc,lg_time desc');

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

   

   public function insertdata($data)
   {
     
     $tmp['id_wisuda']=$data['id_wisuda'];
     $tmp['lg_time']=$data['lg_time'];
     $this->db->insert('tb_log_wisudawan',$tmp);
   }

   public function updatedata($data)
   {
     
     $this->db->set('out_time', $data['out_time']);
     $this->db->where('lg_time',$data['lg_time']);
     $this->db->where('id_wisuda',$data['id_wisuda']);
     $this->db->update('tb_log_wisudawan');

   }
   

}