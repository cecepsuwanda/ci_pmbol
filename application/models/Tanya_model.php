<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tanya_model extends CI_Model {

   public function getdata($where)
   {      
      $this->db->select('*');
      $this->db->from('tb_tanya');
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
            $table[$row['id']]= 
              array('nama'=>$row['name'],'chat'=>$row['comment'],'jk'=>$row['jk'],'tanggal'=>$row['datetime']);
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
     
     $tmp['name']=$data['nama'];
     $tmp['jk']=$data['jk'];
     $tmp['comment']=$data['pertanyaan'];
     $tmp['datetime']=date('Y-m-d H:i:s');
     $this->db->insert('tb_tanya',$tmp);

   }
   

   public function deletedata($id)
   {
     $this->db->where('id',$id);
     $this->db->delete('tb_tanya');
   }


   

}