<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prodi_model extends CI_Model {

   public function getdata($where)
   {      
      $this->db->select('*');
      $this->db->from('tb_prodi');
      if(!empty($where)){
        $this->db->where($where);      
      }

      $this->db->order_by('urut_prodi');

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

   private function build_tag_db($data)
   {
      $table=array();
      if(!empty($data))       
      {
          
          foreach ($data as $row) {
            $tmp=array();          
            $tmp[]=array($row['id_prodi'],array());                   
            $tmp[]=array($row['nm_prodi'],array());
            $tmp[]=array($row['fak_prodi'],array());
            $tmp[]=array($row['urut_prodi'],array());
            $id = '"'.$row['id_prodi'].'"';
            $tmp[]=array("<a onclick='prodi(1,$id)' href='javascript:void(0);'>Edit</a><br>
                          <a onclick='deleteprodi($id)' href='javascript:void(0);'>Delete</a>",array());                   
            $table[]=$tmp;          
         }
      }
      $tmp=array();
      $tmp[]=array('[Id]',array());
      $tmp[]=array('[Nama]',array());
      $tmp[]=array('[Fakultas]',array());
      $tmp[]=array('[Urut]',array());
      $tmp[]=array("<a onclick='prodi(0)' href='javascript:void(0);'>Add</a><br>",array());
      $table[]=$tmp;
      return $table;
   }

   public function getsettingprodi()
   {
      $data = $this->getdata('');
      $tmp = $this->build_tag_db($data); 
      return $tmp;
   }

   public function insertdata($data)
   {
     $tmp['id_prodi']=$data['id'];
     $tmp['nm_prodi']=$data['nm'];
     $tmp['urut_prodi']=$data['urut'];;
     $tmp['fak_prodi']=$data['fak'];;
     $this->db->insert('tb_prodi',$tmp);
   }

   public function updatedata($data)
   {
     $this->db->set('id_prodi',$data['id']);  
     $this->db->set('nm_prodi',$data['nm']); 
     $this->db->set('urut_prodi',$data['urut']);
     $this->db->set('fak_prodi',$data['fak']);
     $this->db->where('id_prodi',$data['id_old']);
     $this->db->update('tb_prodi');
   }

   public function deletedata($id)
   {
     $this->db->where('id_prodi',$id);
     $this->db->delete('tb_prodi');
   }

   public function getkdprodi($id_prodi)
   {
      $data = $this->getdata("id_prodi='$id_prodi'");
      return $data[0]['kd_prodi'];
   }

}