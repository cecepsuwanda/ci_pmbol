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
     $this->db['maba']->set_priode($priode);
     $this->db['berita']->set_priode($priode);

     $data=$this->db['maba']->jml();          
     $data['data_daf']=$this->db['maba']->getmaba_jn_prodi(0);
     $data['data_konf']=$this->db['maba']->getmaba_jn_prodi(1);
     $data['data_ver']=$this->db['maba']->getmaba_jn_prodi(1,1);
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

   private function thnlls()
   {
   	$curYear = date('Y');

     $ang=array();
     for ($i=2008; $i <= $curYear ; $i++) { 
     	 $ang[]=array($i,$i);
     }
     return $ang;
   }
   
   public function buat_akun()
   {
   	
    $data = $this->db['priode']->getrek();

    $tmp=$this->db['fakultas']->getdata('');
    $data['drop_fak']=$this->build_dropdown($tmp,array('id_fak','nm_fak'),'Fakultas ','--- Pilih Fakultas ---');
    $tmp=$this->thnlls();
    $data['drop_thnlls']=$this->build_dropdown($tmp,array(0,1),'','--- Pilih Tahun Lulus ---');
            
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
       if(!empty($data['ktp'])){   
           $tmp=$this->db['maba']->getdata("ktp='$data[ktp]'");
           if(!empty($tmp)){
               return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Calon Mahasiswa Baru dengan ktp/nik = $data[ktp], sudah daftar !!!</p> </div>"; 
           }else{ 
             if(!empty($data['user'])){  
               $tmp=$this->db['maba']->getdata("user='$data[user]'");
               if(!empty($tmp)){
                  return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Calon Mahasiswa Baru dengan username = $data[user], sudah ada !!!</p> </div>"; 
               }else{  
                 if(!empty($data['prodi'])){
                     $data['kd_prodi']= $this->db['prodi']->getkdprodi($data['prodi']);
                     $this->db['maba']->insertdata($data);
                     return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Akun Calon Mahasiswa Baru dengan ktp/nik = $data[ktp], berhasil di buat !!!</p> </div>"; 
                  }else{
                    return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Kode Prodi. tidak boleh kosong !!!</p> </div>";   
                  }
               }  
              }else{
                 return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Username tidak boleh kosong !!!</p> </div>";
              }
           }
       }else{
          return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>No. KTP/NIK tidak boleh kosong !!!</p> </div>"; 
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

   

   public function jadwal_syarat()
   {
      $data=$this->db['priode']->priode_aktif();
      $data=$this->db['glmb']->getglmbjdwl($data['thn']);
        
      $tmp['tb_jdwl'] = $this->db['glmb']->build_tag_db($data);
      return $tmp;
   }

}