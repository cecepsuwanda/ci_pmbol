<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita_model extends CI_Model {

   private $priode;
   private $sql_priode;
   
   public function set_priode($priode)
   {
     $this->priode = $priode;
     $this->sql_priode ='(tgl_post < "'.$priode['akhir'].'")';
   }

   private function build_timeline($data)
   {
     $arr_timeline=array(); 
     if(!empty($data))
     {
      foreach ($data as $row) {
        $tgl = date("d M Y", strtotime($row['tgl_post']));
        $time = date("H:i:s", strtotime($row['tgl_post']));
        $arr_timeline[$tgl][] = array('id'=>$row['id_berita'],'waktu'=>$time,'msg'=>$row['isi_berita']);
      }
     }
     
     return $arr_timeline;
   }


   public function getdata($where)
   {      
      $this->db->select('*');
      $this->db->from('tb_berita');
      
      $where = $this->sql_priode;
      $this->db->where($where);      
      

      $this->db->order_by('tgl_post desc');

      $this->query = $this->db->get();
      $hsl=array();
      if($this->query->num_rows()>0)
      {
        $hsl=$this->build_timeline($this->query->result_array());        
      }
      return $hsl; 
   }


   public function insertdata($data)
   {
        $tmp['id_berita']=date('YmdHis');
        $tmp['isi_berita']=$data['isi_berita'];
        $tmp['tgl_post']= date('Y-m-d H:i:s');

        $this->db->insert('tb_berita',$tmp);

   }

   public function deletedata($data)
   {
       $this->db->where('id_berita', $data['id_berita']);
       $this->db->delete('tb_berita');

   }

   public function updatedata($data)
   {
     $this->db->set('isi_berita',$data['isi_berita']);  
     $this->db->set('tgl_post',date('Y-m-d H:i:s'));  
     $this->db->where('id_berita',$data['id_berita']);
     $this->db->update('tb_berita');
   }

 }