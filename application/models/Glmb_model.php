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

   
   private function build_tag_db($data)
   {
      
      $table=array();
      if(!empty($data))       
      {         
          foreach ($data as $row) {
              $tmp=array();          
              foreach ($row as $key=>$value) {
                   if($key=='aktif'){
                     $tmp[]=array($value==1 ?'True':'False',array());                                
                   }else{
                       if(in_array($key, array('awal','akhir')))
                       {
                         $tmp[]=array(date("d F Y", strtotime($value)),array());
                       }else{ 
                           if($key=='thn'){
                            $tmp[]=array($value,array());
                           } 
                         }
                     }
                   
              }
              $tmp[]=array("<a onclick='priode(1,$row[thn])' href='javascript:void(0);'>Edit</a><br>
                            <a onclick='deletepriode($row[thn])' href='javascript:void(0);'>Delete</a>",array());              
          $table[]=$tmp;
         }      
      }
      $tmp=array();
      $tmp[]=array('[thn]',array());
      $tmp[]=array('[Awal]',array());
      $tmp[]=array('[Akhir]',array());
      $tmp[]=array('[Aktif]',array());
      $tmp[]=array("<a onclick='priode(0)' href='javascript:void(0);'>Add</a><br>",array());
      $table[]=$tmp;

      return $table;
   }



   public function getsettingpriode()
   {
      $data = $this->getdata('');
      $tmp = $this->build_tag_db($data); 
      return $tmp;
   }

   public function priode_aktif()
   {
     $priode=$this->getdata('aktif=1');
     $data['awal']=$priode[0]['awal'];
     $data['akhir']=$priode[0]['akhir'];
     return $data;
   }

   public function getrek()
   {
     $priode=$this->getdata('aktif=1');
     $data['bank']=$priode[0]['bank'];
     $data['an']=$priode[0]['an'];
     $data['rek']=$priode[0]['rek'];
     $data['byr']=$priode[0]['byr'];
     return $data;
   }   

   public function isbuka()
   {
    $tmp=$this->priode_aktif();
    $date = date('Y-m-d');
    return $date >= $tmp['awal'] && $date <= $tmp['akhir'];
   }

   public function isawal()
   {
    $tmp=$this->priode_aktif();
    $date = date('Y-m-d');
    return $date < $tmp['awal'];
   }

   public function istutup()
   {
    $tmp=$this->priode_aktif();
    $date = date('Y-m-d');
    return $date > $tmp['akhir'];
   }

   public function islogin()
   {
    $tmp=$this->priode_aktif();
    $date = date('Y-m-d');
    return $date < $tmp['akhir'];
   }

   public function insertdata($data)
   {
     if($data['aktif']==1)
     {
       $this->db->set('aktif',0);
       $this->db->update('tb_priode'); 
     }
     $this->db->insert('tb_priode',$data);
   }

   public function updatedata($data)
   {
     if($data['aktif']==1)
     {
       $this->db->set('aktif',0);
       $this->db->update('tb_priode'); 
     }
     
     foreach ($data as $key => $value) {
      if($key!='thn_old'){ 
        $this->db->set($key,$value);  
      }
     }     
     
     $this->db->where('thn',$data['thn_old']);
     $this->db->update('tb_priode');
   }

   public function deletedata($id)
   {
     $this->db->where('id', $id);
     $this->db->delete('tb_priode');
   }

}