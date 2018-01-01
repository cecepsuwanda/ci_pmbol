<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fakultas_model extends CI_Model {

   public function getdata($where)
   {      
      $this->db->select('*');
      $this->db->from('tb_fak');
      if(!empty($where)){
        $this->db->where($where);      
      }
        $this->db->order_by('urut_fak');
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

   private function build_dropdown($data,$field,$pref='',$default='')
   {
       $option="<option value='' selected='selected' >$default</option>";
       if (!empty($data)) {
         foreach ($data as $row) {
          $option.="<option value='".$row[$field[0]]."' >$pref".$row[$field[1]]."</option>";
         }
       }
       return $option;
   }

   private function build_tag_db($data)
   {
      $table=array();
      if(!empty($data))       
      {
          
          foreach ($data as $row) {
            $tmp=array();          
            $tmp[]=array($row['id_fak'],array());                   
            $tmp[]=array($row['nm_fak'],array());
            $tmp[]=array($row['urut_fak'],array());
            $id = '"'.$row['id_fak'].'"';
            $tmp[]=array("<a onclick='fak(1,$id)' href='javascript:void(0);'>Edit</a><br>
                          <a onclick='deletefak($id)' href='javascript:void(0);'>Delete</a>",array());                   
            $table[]=$tmp;          
         }
      }
      $tmp=array();
      $tmp[]=array('[Id]',array());
      $tmp[]=array('[Nama]',array());
      $tmp[]=array('[Urut]',array());
      $tmp[]=array("<a onclick='fak(0)' href='javascript:void(0);'>Add</a><br>",array());
      $table[]=$tmp;
      return $table;
   }

   public function getsettingfak()
   {
      $data = $this->getdata('');
      $tmp = $this->build_tag_db($data); 
      return $tmp;
   }

   public function getdropdownfak()
   {
    $tmp=$this->getdata('');
    $drop_fak=$this->build_dropdown($tmp,array('id_fak','nm_fak'),'Fakultas ','--- Pilih Fakultas ---');
    return $drop_fak;
   } 

   public function insertdata($data)
   {
     $tmp['id_fak']=$data['id'];
     $tmp['nm_fak']=$data['nm'];
     $tmp['urut_fak']=$data['urut'];;
     $this->db->insert('tb_fak',$tmp);
   }

   public function updatedata($data)
   {
     $this->db->set('id_fak',$data['id']);  
     $this->db->set('nm_fak',$data['nm']); 
     $this->db->set('urut_fak',$data['urut']);
     $this->db->where('id_fak',$data['id_old']);
     $this->db->update('tb_fak');
   }

   public function deletedata($id)
   {
     $this->db->where('id_fak',$id);
     $this->db->delete('tb_fak');
   }

}