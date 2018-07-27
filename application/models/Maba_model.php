<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maba_model extends CI_Model {

   private $priode;
   private $sql_priode;
   private $numrows;
   
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
                if(in_array($key,array('nm_prodi'))){
                   $tmp[]=array($value,array());
                 }else{
                   if(in_array($key,array('jml1','jml2','jml3'))){
                     $tmp[]=array($value,array('align'=>'right'));
                   }else{
                     $tmp[]=array($i++,array());
                   }  
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
         $id_peserta = '';
          foreach ($data as $row) {
          $tmp=array();
          $nm=$row['nm'];
          //$nim = $row['nim'];
              foreach ($row as $key=>$value) {
                   switch ($key) {
                     case 'id_peserta': $id_peserta = '"'.$value.'"';break;                     
                     case 'nama'     : $tmp[]= array(strtoupper($value),array());break;
                     case 'photo'    : $tmp[]= array(empty($value) ? '' : '<img class="myImg" alt="Photo '.$nm.'" src="'.base_url().'assets/photo/'.$value.'" style="width:50px;height:50px;">',array());break;
                     case 'kwitansi' : $tmp[]=array(empty($value) ? '' : '<img class="myImg" alt="Kwitansi '.$nm.'" src="'.base_url().'assets/photo/'.$value.'" style="width:50px;height:50px;">',array());break;
                     default: $tmp[]=array($value,array()); break;
                   }             
              }
              $tmp[]=array("<a onclick='modal_show($id_peserta)' href='javascript:void(0);'>Edit</a><br><a onclick='hapus_data($id_peserta)' href='javascript:void(0);'>Delete</a>",array());
              
          $table[]=$tmp;
         }
      }
      
      //if(($iswisudawan==0) and ($islayak==0)){
       // $tmp=array();
       // $tmp[]=array('[Photo]',array());
       // $tmp[]=array('[Nama]',array());
       // $tmp[]=array('[Tanggal Bayar]',array());
       // $tmp[]=array('[Kwitansi]',array());
       // $tmp[]=array('[Fakultas]',array());
       // $tmp[]=array('[Prodi]',array());
       // $tmp[]=array('[Keterangan]',array());
       // $tmp[]=array("<a onclick='modal1_show()' href='javascript:void(0);'>Add</a><br>",array());
       // $table[]=$tmp;
      //}
      return $table;
   }

   public function getdata($where)
   {      
      $this->db->select('*');
      $this->db->from('tb_maba');
      if(!empty($where)){
        $this->db->where($where);      
      }
      $this->db->order_by('id_peserta', 'DESC');
      $this->query = $this->db->get();
      $hsl=array();
      $this->numrows = $this->query->num_rows();
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

   public function getmaba_jn_prodi_admin($konf=0,$ver=0,$idx=0)
   {      
      
      $this->db->select('photo,id_peserta,nm,tgltrans,kwitansi,fak_prodi,nm_prodi,ket');
      $this->db->from('tb_maba a'); 
      $this->db->join('tb_prodi b', 'a.id_prodi=b.id_prodi');

      $where = 'verified='.$ver.' and konf='.$konf.' and '.$this->sql_priode;
      $this->db->where($where);      

      $this->db->order_by('a.tglentry desc');

      $this->query = $this->db->get();
      $hsl=array();
      
         if($idx==0){
          $hsl = $this->build_tag_db_admin($this->query->result_array(),0,0);
         }else{
          foreach ($this->query->result_array() as $row) {
            $hsl[]=$row;
          }
         } 

      
      return $hsl; 
   }

   public function rekapperprodi($awl='',$akh='',$idx=0)
   {
      $this->db->select('a.id_prodi,
                         nm_prodi,
                         count(*) as jml1,
                         sum(if((konf=1) and (verified=0),1,0)) as jml2,
                         SUM(IF((konf=1)and(verified=1),1,0)) AS jml3');
      $this->db->from('tb_prodi a'); 
      $this->db->join('tb_maba b', 'a.id_prodi=b.id_prodi');
      
      $this->db->group_by('a.id_prodi');
        
      $where = $this->sql_priode;
      if(!empty($awl) and !empty($akh))
      {
        $where .= ' and (tglentry between "'.$awl.'" and "'.$akh.'")' ;
      }

      $this->db->where($where);      
      

      $this->db->order_by('a.urut_prodi');

      $this->query = $this->db->get();
      $hsl=array();
      if($this->query->num_rows()>0)
      {
        if($idx==0){
           $hsl = $this->build_tag_db1($this->query->result_array());
         }else{
           $hsl = $this->query->result_array();
         }

      }
      return $hsl; 
   }

   public function jmlrekapperprodi($awl='',$akh='',$idx=0)
   {
      $this->db->select('count(*) as jml1,
                         sum(if((konf=1) and (verified=0),1,0)) as jml2,
                         SUM(IF((konf=1)and(verified=1),1,0)) AS jml3');
      $this->db->from('tb_prodi a'); 
      $this->db->join('tb_maba b', 'a.id_prodi=b.id_prodi');      
        
      $where = $this->sql_priode;
      if(!empty($awl) and !empty($akh))
      {
        $where .= ' and (tglentry between "'.$awl.'" and "'.$akh.'")' ;
      }

      $this->db->where($where);     

      $this->query = $this->db->get();
      if($idx==0){   
         $hsl='<tr><td colspan="2" align="center" >Jumlah</td>';
      }
      if($this->query->num_rows()>0)
      {
       if($idx==0){
         foreach($this->query->result_array() as $row)
         {
           $hsl.='<td align="right" >'.$row['jml1'].'</td><td align="right" >'.$row['jml2'].'</td><td align="right" >'.$row['jml3'].'</td>';
         }
       }else{
        $hsl=$this->query->result_array();
       }  

      }
      if($idx==0){ 
        $hsl.='</tr>';
      }  
      return $hsl; 
   }



   private function getnew_id_peserta($kd_prodi)
   {
     $year = date('Y');    
     $data = $this->getData("id_peserta like '".$year.sprintf("%02d", $kd_prodi)."%'");     
     if($this->numrows>0)
     {
       return  $year.sprintf("%02d", $kd_prodi). sprintf("%03d", (intval(substr($data[0]['id_peserta'],6,3))+1));
     }else{
       return  $year.sprintf("%02d", $kd_prodi).'001';
     }
   
   }

   public function insertdata($data)
   {
     $tmp['id_peserta']=$this->getnew_id_peserta($data['kd_prodi']);
     $tmp['ktp']=$data['ktp'];
     $tmp['nm']=$data['nama'];
     $tmp['jk']=$data['jk'];
     $tmp['tgllhr']=date('Y-m-d', strtotime($data['tgl']));
     $tmp['thnlls']=$data['thnlls'];
     $tmp['id_prodi']=$data['prodi'];
     $tmp['kd_prodi']=$data['kd_prodi'];
     $tmp['user']=$data['user'];
     $tmp['pass']=md5($data['pass']);
     $tmp['tglentry']=date('Y-m-d');
     

     $this->db->insert('tb_maba',$tmp);

   }

   public function insertdataadmin($data)
   {
     $data['id_peserta']=date('YmdHis');
     $data['user_name']=$data['ktp'];
     $data['user_pass']=md5('123456');
     
     $this->db->insert('tb_maba',$data);

   }

   public function deletedataadmin($id_peserta)
   {
     $this->db->where('id_peserta', $id_peserta);
     $this->db->delete('tb_maba');
  }


   public function updatedata($data)
   {
     foreach ($data as $key => $value) {
       $this->db->set($key,$value);  
     }
     
     
     $this->db->where('id_peserta',$data['id_peserta']);
     $this->db->update('tb_maba');
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

   public function getnousm($usm)
   {
      $this->db->select('max(nousm) as akhir');
      $this->db->from('tb_maba');

      $where = 'usm='.$usm.' and '.$this->sql_priode;
     
      $this->db->where($where);

      $this->query = $this->db->get();
      $hsl=1;
      $this->numrows = $this->query->num_rows();
      if($this->query->num_rows()>0)
      {
        $row=$this->query->result_array();
        $hsl=$row[0]['akhir']+1;
      }
      return $hsl;        
           
   }

}