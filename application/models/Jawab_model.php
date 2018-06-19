<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jawab_model extends CI_Model {

   public function getdata($where)
   {      
      $this->db->select('*');
      $this->db->from('tb_jawab');
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

   private function build_data($data)
   {
      $table=array();
      if(!empty($data))       
      {
          foreach ($data as $row) {
            $table[$row['id_tanya']]= 
              array('id'=>$row['id'],'nama'=>$row['name'],'chat'=>$row['comment'],'tanggal'=>$row['datetime']);
          }
      }
      
      return $table;
   }


   public function getchat()
   {
      $data = $this->getdata('');
      $tmp = $this->build_data($data); 
      return $tmp;
   }

   

   public function insertdata($data)
   {
     
     $tmp['name']='Admin';
     $tmp['id_tanya']=$data['id_tanya'];
     $tmp['comment']=$data['comment'];
     $tmp['datetime']=date('Y-m-d H:i:s');
     $this->db->insert('tb_jawab',$tmp);

   }

   public function updatedata($data)
   {
     $this->db->set('comment',$data['comment']);  
     $this->db->set('datetime',date('Y-m-d H:i:s'));  
     $this->db->where('id',$data['id']);
     $this->db->update('tb_jawab');
   }
   

   public function deletedata($id)
   {
     $this->db->where('id',$id);
     $this->db->delete('tb_jawab');
   }

   public function jml()
   {
      $this->db->select('count(*) as jml');
      $this->db->from('tb_jawab');
      
      $this->query = $this->db->get();
      $hsl=array();
      if($this->query->num_rows()>0)
      {
        $row=$this->query->result_array();
        $hsl['jml_jawab']= is_null($row[0]['jml']) ? 0 : $row[0]['jml'];        
      }

      return $hsl; 
   }
   

}