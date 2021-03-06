<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_dashboard_model extends CI_Model {
   
   private $db;

   private function notif()
   {
     $data=$this->db['maba']->jml(); 
     $tmp = $this->db['berita']->jml();
     $data['jml_berita']=$tmp['jml_berita'];
     $tmp = $this->db['tanya']->jml();
     $data['jml_tanya']=$tmp['jml_tanya'];
     $tmp = $this->db['jawab']->jml();
     $data['jml_jawab']=$tmp['jml_jawab'];
     return $data;
   }

   public function setdbvar($db)
   {
   	$this->db=$db;
    
    if(array_key_exists('priode', $db)){
      $priode=$this->db['priode']->priode_aktif();
      if(array_key_exists('berita', $db)){  
        $this->db['berita']->set_priode($priode);
      }
      if(array_key_exists('maba', $db)){  
        $this->db['maba']->set_priode($priode); 
      }  
    }
   }

   public function rekap_data()
   {   	 
     $data = $this->notif();              
     $data['data_daf']=$this->db['maba']->getmaba_jn_prodi(0);
     $data['data_konf']=$this->db['maba']->getmaba_jn_prodi(1);
     $data['data_ver']=$this->db['maba']->getmaba_jn_prodi(1,1);
     //$data['timeline'] =$this->db['berita']->getdata('');
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

   private function thnlls($thn=1997)
   {
   	$curYear = date('Y');

     $ang=array();
     for ($i=$thn; $i <= $curYear ; $i++) { 
     	 $ang[$i]=$i;
     }
     return $ang;
   }
   
   public function buat_akun()
   {
   	
    $data = $this->notif();
    
    $tmp = $this->db['priode']->getrek();

    $data['bayar'] = array('Biaya Pendaftaran'=>'Rp. '.number_format($tmp['byr'],2,',','.'),
                   'Bank'=>$tmp['bank'],
                   'Nomor Rekening'=>$tmp['rek'],
                   'Atas Nama'=>$tmp['an']
                   );

    
    $data['drop_fak']=$this->db['fakultas']->getdropdownfak1();
    $tmp=$this->thnlls();
    $data['drop_thnlls']= $tmp;//$this->build_dropdown($tmp,array(0,1),'','--- Pilih Tahun Lulus ---');
            
    $data['isbuka']= $this->db['priode']->isbuka();
    if($this->db['priode']->istutup()==1){
      $data['msg']='Pendaftaran Online Sudah Ditutup !!!';
    }

    if($this->db['priode']->isawal()==1){
      $data['msg']='Pendaftaran Online Belum Dibuka !!!';
    } 

    $tmp=$this->db['priode']->priode_aktif();
    $tmp=$this->db['glmb']->getglmbjdwl($tmp['thn']);
        
    $data['tb_jdwl'] = $this->db['glmb']->build_tag_db($tmp);

     $priode=$this->db['priode']->priode_aktif();
     $this->db['maba']->set_priode($priode);
     
     
     $data['data_daf']=$this->db['maba']->getmaba_jn_prodi(0);
     $data['data_konf']=$this->db['maba']->getmaba_jn_prodi(1);
     $data['data_ver']=$this->db['maba']->getmaba_jn_prodi(1,1);
     

     $data['pendaftaran'] = array('Melakukan pendaftaran melalui form di bawah ini',
                               'Membayar biaya pendaftaran',
                               'Login, lengkapi data dan upload bukti pembayaran',
                               'Admin akan memverifikasi data anda',
                               'Setelah admin memverifikasi, anda dapat mencetak kartu ujian');

     $data['syarat'] = array('Warga Negara Indonesia atau Warga Negara Keturunan Asing dikukuhkan dengan surat bukti kewarganegaraan',
                             'Warga Negara Asing dengan izin tertulis dari Direktorat Jendral Pendidikan Tinggi Diknas RI',
                             'Membayar biaya pendaftaran',
                             'Memiliki Ijazah/STTB SLTA umum, kejuruan/sederajat',
                             'Surat keterangan sehat dan tidak buta warna khusus mahasiswa FIKES dari institusi kesehatan',
                             'Pas photo 2x3, 3x4, 4x5 masing-masing 2 lembar',
                             'Mengikuti ujian saringan masuk');


      
     

    return $data;
   }

   public function tanya_jawab()
   {
     
     $data = $this->notif();
     $data['arr_tanya'] =$this->db['tanya']->getchat();
     $data['arr_jawab'] =$this->db['jawab']->getchat();

     return $data;
   }

   public function save_akun($data)
   {
       if(!empty($data['ktp'])){   
           $tmp=$this->db['maba']->getdata("ktp='$data[ktp]'");
           if(!empty($tmp)){
               return json_encode(array('err'=>1,'txt'=>"<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Calon Mahasiswa Baru dengan ktp/nik = $data[ktp], sudah daftar !!!</p> </div>"));                
           }else{ 
             if(!empty($data['user'])){  
               $tmp=$this->db['maba']->getdata("user='$data[user]'");
               if(!empty($tmp)){
                  return json_encode(array('err'=>1,'txt'=>"<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Calon Mahasiswa Baru dengan username = $data[user], sudah ada !!!</p> </div>"));                  
               }else{  
                 if(!empty($data['prodi'])){
                     $data['kd_prodi']= $this->db['prodi']->getkdprodi($data['prodi']);
                     $this->db['maba']->insertdata($data);
                     return json_encode(array('err'=>0,'txt'=>"<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Akun Calon Mahasiswa Baru dengan ktp/nik = $data[ktp], berhasil di buat !!!</p> </div>"));                     
                  }else{
                    return json_encode(array('err'=>1,'txt'=>"<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Kode Prodi. tidak boleh kosong !!!</p> </div>"));                    
                  }
               }  
              }else{
                 return json_encode(array('err'=>1,'txt'=>"<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Username tidak boleh kosong !!!</p> </div>"));                 
              }
           }
       }else{
          return json_encode(array('err'=>1,'txt'=>"<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>No. KTP/NIK tidak boleh kosong !!!</p> </div>"));          
       }      
   }

   public function save_tanya($data)
   {
              
      $this->db['tanya']->insertdata($data);
               
   }

   public function get_prodi($fak)
   {
     $tmp=$this->db['prodi']->getdata("fak_prodi='$fak'");
     $data = $this->build_dropdown($tmp,array('id_prodi','nm_prodi'),'Prodi. ','--- Pilih Prodi ---');      
     return $data;
   }
   
   


   public function baca_berita()
   {
      
      $data = $this->notif();
      $data['timeline'] = $this->db['berita']->getdata('');
      return $data;
   }

   

   public function jadwal_syarat()
   {
      $priode=$this->db['priode']->priode_aktif();      
      $data=$this->db['glmb']->getglmbjdwl($priode['thn']);
      
      $temp = $this->notif();
      $temp['tb_jdwl'] = $this->db['glmb']->build_tag_db($data);
      return $temp;
   }

}