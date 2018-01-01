<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maba_model extends CI_Model {

   private $priode;
   private $sql_priode;
   
   public function set_priode($priode)
   {
     $this->priode = $priode;
     $this->sql_priode ='(tglentry between "'.$priode['awal'].'" and "'.$priode['akhir'].'")';
   }

   private function build_tag_db($data)
   {
      $table=array();
      if(!empty($data))       
      {
         $i=1;
         foreach ($data as $row) {
          $tmp=array();
          $tmp[]=array($i++,array());
              foreach ($row as $key=>$value) {                
                switch($key)
                {
                  
                  case 'nama' :$tmp[]=array(strtoupper($value),array()); 
                               break;
                  default :  $tmp[]=array($value,array()); 
                             break;
                }                  
              }
              
          $table[]=$tmp;
         }
      }

      

      return $table;
   }

   private function build_tag_db1($data)
   {
      $table=array();
      if(!empty($data))       
      {
          $i=1;
          foreach ($data as $row) {
          $tmp=array();          
              foreach ($row as $key=>$value) {
                if($key!='id_prodi'){
                   $tmp[]=array($value,array());
                 }else{
                   $tmp[]=array($i++,array());
                 }  
              }
          $table[]=$tmp;
          
         }
      }

      return $table;
   }

    private function build_tag_db_admin($data,$iswisudawan=0,$islayak=0)
   {
      
      $table=array();
      if(!empty($data))       
      {
         $id_wisuda = '';
          foreach ($data as $row) {
          $tmp=array();
          $nama=$row['nama'];
          $nim = $row['nim'];
              foreach ($row as $key=>$value) {
                   switch ($key) {
                     case 'id_wisuda': $id_wisuda = '"'.$value.'"';break;                     
                     case 'nama'     : $tmp[]= array(strtoupper($value),array());break;
                     case 'photo'    : $tmp[]= array(empty($value) ? '' : '<img class="myImg" alt="Photo '.$nama.' ('.$nim.')" src="'.$value.'" style="width:50px;height:50px;">',array());break;
                     case 'kwitansi' : $tmp[]=array(empty($value) ? '' : '<img class="myImg" alt="Kwitansi '.$nama.' ('.$nim.')" src="'.$value.'" style="width:50px;height:50px;">',array());break;
                     default: $tmp[]=array($value,array()); break;
                   }             
              }
              $tmp[]=array("<a onclick='modal_show($id_wisuda)' href='javascript:void(0);'>Edit</a><br><a onclick='hapus_data($id_wisuda)' href='javascript:void(0);'>Delete</a>",array());
              
          $table[]=$tmp;
         }
      }
      
      if(($iswisudawan==0) and ($islayak==0)){
        $tmp=array();
        $tmp[]=array('[Photo]',array());
        $tmp[]=array('[NIM]',array());
        $tmp[]=array('[Nama]',array());
        $tmp[]=array('[Tanggal Bayar]',array());
        $tmp[]=array('[Kwitansi]',array());
        $tmp[]=array('[Fakultas]',array());
        $tmp[]=array('[Prodi]',array());
        $tmp[]=array('[Keterangan]',array());
        $tmp[]=array("<a onclick='modal1_show()' href='javascript:void(0);'>Add</a><br>",array());
        $table[]=$tmp;
      }
      return $table;
   }

   public function getdata($where)
   {      
      $this->db->select('*');
      $this->db->from('tb_maba');
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

   public function getmaba_jn_prodi($konf=0,$ver=0)
   {      
      
      $this->db->select('id_peserta,nm,fak_prodi,nm_prodi,ket');
      $this->db->from('tb_maba a'); 
      $this->db->join('tb_prodi b', 'a.id_prodi=b.id_prodi');

      $where = 'verified='.$ver.' and konf='.$konf.' and '.$this->sql_priode;
      $this->db->where($where);      

      $this->db->order_by('a.tglentry desc');

      $this->query = $this->db->get();
      $hsl=array();
      if($this->query->num_rows()>0)
      {
        $hsl = $this->build_tag_db($this->query->result_array());
      }
      return $hsl; 
   }

   public function getwisudawan_jn_prodi_admin($iswisudawan,$islayak=0,$idx=0)
   {      
      
      $this->db->select('photo,id_wisuda,nim,nama,tgl_byr,kwitansi,fak_prodi,nm_prodi,ket');
      $this->db->from('tb_wisudawan a'); 
      $this->db->join('tb_prodi b', 'a.id_prodi=b.id_prodi');

      $where = 'ver='.$iswisudawan.' and '.$this->sql_priode;
      if($iswisudawan==0)
      {
        if($islayak==1)
        {
          $where .= ' and ((kwitansi is not null) or (tgl_byr is not null)) ';
        }else{
          $where .= ' and ((kwitansi is null) and (tgl_byr is null)) ';
        }

      }    

      $this->db->where($where);
      
      if($idx==0){
       $this->db->order_by('a.tgl_update desc,a.tgl_input desc,b.urut_prodi asc');
      }else{
       $this->db->order_by('b.urut_prodi asc,nama asc,nim asc'); 
      }

      $this->query = $this->db->get();
      $hsl=array();
      //if($this->query->num_rows()>0)
      //{
         if($idx==0){
          $hsl = $this->build_tag_db_admin($this->query->result_array(),$iswisudawan,$islayak);
         }else{
          foreach ($this->query->result_array() as $row) {
            $hsl[]=$row;
          }
         } 

      //}
      return $hsl; 
   }

   public function rekapperprodi()
   {
      $this->db->select('a.id_prodi,nm_prodi,sum(if(ver=0,1,0)) as jml_calon,
                         sum(if((ver=0)and((kwitansi is not null)or(tgl_byr is not null)),1,0)) as jml_layak,
                         sum(if(ver=1,1,0)) as jml_ver');
      $this->db->from('tb_prodi a'); 
      $this->db->join('tb_wisudawan b', 'a.id_prodi=b.id_prodi');
      
      $this->db->group_by('a.id_prodi');
        
      $where = $this->sql_priode;
    //if(!empty($where)){
        $this->db->where($where);      
      //}

      $this->db->order_by('a.urut_prodi');

      $this->query = $this->db->get();
      $hsl=array();
      if($this->query->num_rows()>0)
      {
        $hsl = $this->build_tag_db1($this->query->result_array());
      }
      return $hsl; 
   }

   public function insertdata($data)
   {
     $tmp['id_wisuda']=date('YmdHis');
     $tmp['nim']=$data['nim'];
     $tmp['ktp']=$data['ktp'];
     $tmp['nama']=$data['nama'];
     $tmp['tgl_lahir']=date('Y-m-d', strtotime($data['tgl']));
     $tmp['jk']=$data['jk'];
     $tmp['angkatan']=$data['ang'];
     $tmp['id_prodi']=$data['prodi'];
     $tmp['user_name']=$data['user'];
     $tmp['user_pass']=md5($data['pass']);
     $tmp['tgl_input']=date('Y-m-d H:i:s');
     $tmp['tgl_update']=date('Y-m-d H:i:s');

     $this->db->insert('tb_wisudawan',$tmp);

   }

   public function insertdataadmin($data)
   {
     $data['id_wisuda']=date('YmdHis');
     $data['user_name']=$data['ktp'];
     $data['user_pass']=md5('123456');
     
     $this->db->insert('tb_wisudawan',$data);

   }

   public function deletedataadmin($id_wisuda)
   {
     $this->db->where('id_wisuda', $id_wisuda);
     $this->db->delete('tb_wisudawan');
  }


   public function updatedata($data)
   {
     foreach ($data as $key => $value) {
       $this->db->set($key,$value);  
     }
     
     $this->db->set('tgl_update',date('Y-m-d H:i:s'));  
     $this->db->where('id_wisuda',$data['id_wisuda']);
     $this->db->update('tb_wisudawan');
   }


   public function jml()
   {
   	  $this->db->select('count(*) as jml1,sum(if((konf=1) and (verified=0),1,0)) as jml2,SUM(IF((konf=1)and(verified=1),1,0)) AS jml3');
      $this->db->from('tb_maba');

      $where = $this->sql_priode;

      //if(!empty($where)){
        $this->db->where($where);      
      //}

      $this->query = $this->db->get();
      $hsl=array();
      if($this->query->num_rows()>0)
      {
        $row=$this->query->result_array();
        $hsl['jml_daftar']= is_null($row[0]['jml1']) ? 0 : $row[0]['jml1'];
        $hsl['jml_konf']=is_null($row[0]['jml2']) ? 0 :$row[0]['jml2'];
        $hsl['jml_ver']=is_null($row[0]['jml3']) ? 0 :$row[0]['jml3'];
      }

      return $hsl; 
   }

}