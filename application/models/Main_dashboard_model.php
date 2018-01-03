<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_dashboard_model extends CI_Model {
   
   private $db;

   public function setdbvar($db)
   {
   	$this->db=$db;
   }

   public function rekap_data()
   {
   	 $priode=$this->db['priode']->priode_aktif();
     $this->db['wisudawan']->set_priode($priode);
     $this->db['berita']->set_priode($priode);

     $data=$this->db['wisudawan']->jml();          
     $data['data_calon']=$this->db['wisudawan']->getwisudawan_jn_prodi(0);
     $data['data_wisudawan']=$this->db['wisudawan']->getwisudawan_jn_prodi(1);
     $data['timeline'] =$this->db['berita']->getdata('');

   	 return $data;
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

   private function angkatan()
   {
   	$curYear = date('Y')-3;

     $ang=array();
     for ($i=2008; $i <= $curYear ; $i++) { 
     	 $ang[]=array($i,$i);
     }
     return $ang;
   }
   
   public function buat_akun()
   {
   	$tmp=$this->db['fakultas']->getdata('');
    $data['drop_fak']=$this->build_dropdown($tmp,array('id_fak','nm_fak'),'Fakultas ','--- Pilih Fakultas ---');
    $tmp=$this->angkatan();
    $data['drop_ang']=$this->build_dropdown($tmp,array(0,1),'','--- Pilih Angkatan ---');
            
    $data['isbuka']= $this->db['priode']->isbuka();
    if($this->db['priode']->istutup()==1){
      $data['msg']='Pendaftaran Online Sudah Ditutup !!!';
    }

    if($this->db['priode']->isawal()==1){
      $data['msg']='Pendaftaran Online Belum Dibuka !!!';
    }    
   	
    return $data;
   }

   public function save_akun($data)
   {
      $tmp=$this->db['wisudawan']->getdata("nim='$data[nim]'");
      if(!empty($tmp)){
        return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Calon Wisudawan dengan nim = $data[nim], sudah buat akun !!!</p> </div>"; 
      }else{
         $tmp=$this->db['wisudawan']->getdata("ktp='$data[ktp]'");
         if(!empty($tmp)){
             return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Calon Wisudawan dengan ktp/nik = $data[ktp], sudah buat akun !!!</p> </div>"; 
         }else{ 
             $tmp=$this->db['wisudawan']->getdata("user_name='$data[user]'");
             if(!empty($tmp)){
                return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Calon Wisudawan dengan username = $data[user], sudah buat akun !!!</p> </div>"; 
             }else{  
               $this->db['wisudawan']->insertdata($data);
               return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Akun Calon Wisudawan dengan nim = $data[nim], berhasil di buat !!!</p> </div>"; 
             }  
         }
      }
   }

   public function get_prodi($fak)
   {
     $tmp=$this->db['prodi']->getdata("fak_prodi='$fak'");
     $data = $this->build_dropdown($tmp,array('id_prodi','nm_prodi'),'Prodi. ','--- Pilih Prodi ---');      
     return $data;
   }
   
   


   public function baca_berita()
   {
      $tmp=$this->db['berita']->getdata('');
      $data['timeline'] = $this->build_timeline($tmp);
      return $data;
   }

}