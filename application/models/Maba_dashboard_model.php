<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maba_dashboard_model extends CI_Model {

   private $db;

   public function setdbvar($db)
   {
   	$this->db=$db;
   }

   private function thnlls($angk)
   {
    $curYear = date('Y');

     $ang=array();
     for ($i=2008; $i <= $curYear ; $i++) { 
       if($i!=$angk){
         $ang[]=array($i,$i);
       }

     }
     return $ang;
   }

   private function build_dropdown($data,$field,$pref='',$default='')
   {
       $option="<option value=''>$default</option>";
       if (!empty($data)) {
         foreach ($data as $row) {
          $option.="<option value='".$row[$field[0]]."' >$pref".$row[$field[1]]."</option>";
         }
       }
       return $option;
   }


   public function baca_data()
   {
     $id_peserta = $this->session->userdata('id_peserta');

     $tmp=$this->db['maba']->getdata('id_peserta="'.$id_peserta.'"');
     
     $arr_thnlls=$this->thnlls($tmp[0]['thnlls']);     
     $data['drop_thnlls']=$this->build_dropdown($arr_thnlls,array(0,1),'','--- Pilih Tahun Lulus ---');    
     $data['drop_thnlls']= "<option value='".$tmp[0]['thnlls']."' selected='selected' >".$tmp[0]['thnlls']."</option>".$data['drop_thnlls'];

     $tmp_prodi=$this->db['prodi']->getdata('id_prodi="'.$tmp[0]['id_prodi'].'"');     
     $tmp_fak=$this->db['fakultas']->getdata('id_fak="'.$tmp_prodi[0]['fak_prodi'].'"');

     $arr_fak=$this->db['fakultas']->getdata('id_fak<>"'.$tmp_prodi[0]['fak_prodi'].'"');
     $data['drop_fak']=$this->build_dropdown($arr_fak,array('id_fak','nm_fak'),'Fakultas ','--- Pilih Fakultas ---');
     $data['drop_fak']= "<option value='".$tmp_fak[0]['id_fak']."' selected='selected' >Fakultas ".$tmp_fak[0]['nm_fak']."</option>".$data['drop_fak'];

     $arr_prodi=$this->db['prodi']->getdata('fak_prodi ="'.$tmp_fak[0]['id_fak'].'" and id_prodi<>"'.$tmp[0]['id_prodi'].'"');
     $data['drop_prodi']=$this->build_dropdown($arr_prodi,array('id_prodi','nm_prodi'),'Prodi. ','--- Pilih Prodi ---');
     $data['drop_prodi']= "<option value='".$tmp_prodi[0]['id_prodi']."' selected='selected' >Prodi. ".$tmp_prodi[0]['nm_prodi']."</option>".$data['drop_prodi'];

     $data['id_peserta']=$tmp[0]['id_peserta'];
     $data['ktp']=$tmp[0]['ktp'];
     $data['nama']=$tmp[0]['nm'];
     $data['jk']=$tmp[0]['jk'];
     $data['tmpt_lahir']=$tmp[0]['tmplhr'];
     $data['tgl_lahir']=date("d-m-Y", strtotime($tmp[0]['tgllhr']));
     $data['alamat']=empty($tmp[0]['alamat']) ? '' : $tmp[0]['alamat'];
     $data['asal']=empty($tmp[0]['asalsma']) ? '' : $tmp[0]['asalsma'];
     $data['email']=empty($tmp[0]['email']) ? '' : $tmp[0]['email'];
     $data['hp']=$tmp[0]['hp'];     
     $data['photo']=$tmp[0]['photo'];
     $data['tgl_trans']= is_null($tmp[0]['tgltrans'])  ? '' : date("d-m-Y", strtotime($tmp[0]['tgltrans']));
     $data['kwitansi']=$tmp[0]['kwitansi'];
     $data['bank']=empty($tmp[0]['nm_bank']) ? '' : $tmp[0]['nm_bank'];
     $data['kelas']=empty($tmp[0]['kelas']) ? '' : $tmp[0]['kelas'];     
    
     $data['ver']=$tmp[0]['verified'];

     $tmp = $this->db['priode']->getrek();

     $data['konf_msg']='Biaya pendaftaran Rp. '.number_format($tmp['byr'],2,',','.').'<br> ditransfer ke <br>'.
                       'No Rekening : '.$tmp['rek'].'<br>'.
                       'Bank        : '.$tmp['bank'].'<br>'.
                       'Atas Nama   : '.$tmp['an'];


     return $data;

   }

   public function cetak_data()
   {
     $id_wisuda = $this->session->userdata('id_wisuda');
     
     $tmp=$this->db['wisudawan']->getdata('id_wisuda="'.$id_wisuda.'"');
          
     $data['ang']= $tmp[0]['angkatan'];

     $tmp_prodi=$this->db['prodi']->getdata('id_prodi="'.$tmp[0]['id_prodi'].'"');     
     $tmp_fak=$this->db['fakultas']->getdata('id_fak="'.$tmp_prodi[0]['fak_prodi'].'"');
     $data['fak']= 'Fakultas '.$tmp_fak[0]['nm_fak'];
     $data['prodi']= 'Prodi. '.$tmp_prodi[0]['nm_prodi'];
     
     $data['nama']=$tmp[0]['nama'];
     $data['jk']=$tmp[0]['jk']==1 ? 'Laki-laki' : 'Perempuan';
     $data['tmpt_lahir']=$tmp[0]['tmpt_lahir'];
     $data['tgl_lahir']=date("d-m-Y", strtotime($tmp[0]['tgl_lahir']));
     $data['alamat']=empty($tmp[0]['alamat']) ? '' : $tmp[0]['alamat'];
     $data['hp']=$tmp[0]['hp'];
     $data['photo']=$tmp[0]['photo'];
     $data['tgl_byr']= is_null($tmp[0]['tgl_byr'])  ? '' : date("d-m-Y", strtotime($tmp[0]['tgl_byr']));
     $data['jdl_skripsi']=$tmp[0]['jdl_skripsi'];
     $data['nim']=$tmp[0]['nim'];
     
     return $data;

   }



   public function login($login,$un,$psw)
   {

    $data['msg']='';
    $data['isbuka']= $this->db['priode']->isbuka();


    if($this->db['priode']->isawal()==1){
      $data['msg']="<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Pendaftaran Online Belum Dibuka !!!</p> </div>";
    }else{

      if($this->db['priode']->islogin()==0){
        $data['msg']="<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Perubahan Data Setelah Priode Pendaftaran Tidak Diijinkan !!!</p> </div>";
      }else{
       $data['isbuka']=1;
      }

    }

     //$tmp=$this->db['priode']->getdata('aktif=1');
     //$date = date('Y-m-d');
     //$data['isbuka']= $date >= $tmp[0]['awal'] && $date <= $tmp[0]['akhir'];    
   	 
   	   	 

   	 if($login=='login')
   	 {
           
        $tmp=$this->db['maba']->getdata('user="'.$un.'" and pass=md5("'.$psw.'")'); 
        
        if(empty($tmp))
        {
          $data['msg']="<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Username atau Password Keliru !!!</p> </div>";
        }else{
        	$newdata = array(
               'id_peserta'  => $tmp[0]['id_peserta'],
               'lg_time' => date('Y-m-d H:i:s'),
               'logged_in' => TRUE
             );
             $this->session->set_userdata($newdata);
             $tmp=$this->db['log']->insertdata($newdata);     

        }

   	 }

   	 return $data;
   }

   public function lupa($data)
   {
     $tmp=$this->db['priode']->getdata('aktif=1');
     $date = date('Y-m-d');
     $data['isbuka']= $date >= $tmp[0]['awal'] && $date <= $tmp[0]['akhir'];

     $tmp=$this->db['maba']->getdata("ktp='$data[ktp]' and tgllhr='$data[tgl_lahir]' and jk='$data[jk]'");
     $msg='';
     if(!empty($tmp)){
        $tmp1['id_peserta']=$tmp[0]['id_peserta'];
        $tmp=$this->db['maba']->getdata("user='$data[user_name]' and ktp<>'$data[ktp]'");
        if(!empty($tmp)){
             $data['kd']=0;
             $msg = "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Username ada dalam database !!!</p> </div>";
             }
             else{
               $tmp1['user']=$data['user_name'];
               $tmp1['pass']=md5($data['user_pass']);
               $this->db['maba']->updatedata($tmp1);
               $msg="<div class='callout callout-info'><h4>Pemberitahuan</h4><p>User name dan Password berhasil diganti, silahkan login !!!</p> </div>";
               $data['kd']=1;
             }
     } else{
       $msg="<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Data anda tidak ada dalam database !!!</p> </div>"; 
       $data['kd']=0;
     }
     $data['msg']=$msg;
     return $data; 
   }

   public function logout($id_peserta,$lg_time)
   {
      $out_time = date('Y-m-d H:i:s');
      $tmp=$this->db['log']->updatedata(array('id_peserta'=>$id_peserta,'lg_time'=>$lg_time,'out_time'=>$out_time));
   }

   public function updatedatamaba($data)
   {
     $tmp=$this->db['maba']->getdata("ktp='$data[ktp]' and id_peserta<>'$data[id_peserta]'");
         if(!empty($tmp)){
             return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Mahasiswa baru dengan ktp/nik = $data[ktp], sudah ada !!!</p> </div>"; 
         }else{

             
                   
                       if(isset($data['photo'])){
                            if(file_exists('./assets/photo/'.basename($data['photo']))){
                                 $ext = explode('.',basename($data['photo']));
                                 rename('./assets/photo/'.basename($data['photo']),'./assets/photo/'.$data['id_peserta'].'.'.$ext[1]);
                                 $data['photo']=$data['id_peserta'].'.'.$ext[1];
                             }else{
                                unset($data['photo']);
                             }
                           }

                   
                      
                         $this->db['maba']->updatedata($data);

                         $id_peserta = $this->session->userdata('id_peserta');
                         $nm_file = 'temp_'.$id_peserta;

                         $file = directory_map('./assets/photo/');

                         if(!empty($file))                          
                         {
                            foreach ($file as $nmfile) {
                               $ext = explode('.',basename($nmfile));
                               $tmp = explode('_',$ext[0]);
                               
                               if(isset($tmp[1])){
                                 if(($tmp[0].'_'.$tmp[1])==$nm_file)
                                 {
                                    unlink('./assets/photo/'.$nmfile);   
                                 }
                               }  

                             } 
                         }


                         return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Mahasiswa baru dengan id peserta = $data[id_peserta], berhasil di update !!!</p> </div>"; 
                         
                 
         }
   }

   public function updatedatapil($data)
   {
     
     $this->db['maba']->updatedata($data);

     return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Mahasiswa baru dengan id peserta = $data[id_peserta], berhasil di update !!!</p> </div>"; 
                       
        
   }

   public function konf($data)
   {
     

                           if(isset($data['kwitansi'])){
                              if(file_exists('./assets/photo/'.basename($data['kwitansi']))){
                                 $ext = explode('.',basename($data['kwitansi']));
                                 rename('./assets/photo/'.basename($data['kwitansi']),'./assets/photo/kwitansi_'.$data['id_peserta'].'.'.$ext[1]);
                                 $data['kwitansi']='kwitansi_'.$data['id_peserta'].'.'.$ext[1];
                             }else{
                              unset($data['kwitansi']);
                             }
                           }
                         
                         $data['konf']=1;
                         $data['tglkonf']=date('Y-m-d'); 
                     
                         $this->db['maba']->updatedata($data);

                         $id_peserta = $this->session->userdata('id_peserta');
                         $nm_file = 'temp_'.$id_peserta;

                         $file = directory_map('./assets/photo/');

                         if(!empty($file))                          
                         {
                            foreach ($file as $nmfile) {
                               $ext = explode('.',basename($nmfile));
                               $tmp = explode('_',$ext[0]);
                               if(isset($tmp[1])){
                                 if(($tmp[0].'_'.$tmp[1])==$nm_file)
                                 {
                                    unlink('./assets/photo/'.$nmfile);   
                                 }
                               }
                             } 
                         }


                         return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Mahasiswa baru dengan id peserta = $data[id_peserta], berhasil di update !!!</p> </div>"; 
 
   }


   public function rubahuserpass($data)
   {
                    if(isset($data['user'])){ 
                       $tmp=$this->db['maba']->getdata("user='$data[user]' and id_peserta<>'$data[id_peserta]'");
                       if(!empty($tmp)){                         
                         return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Mahasiswa baru dengan user_name = $data[user], sudah ada !!!</p> </div>"; 
                       }else{
                          $this->db['maba']->updatedata($data);
                          return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Mahasiswa baru dengan id peserta = $data[id_peserta], berhasil di update !!!</p> </div>"; 

                       }
                    }               
                      
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


   public function baca_berita()
   {
      $priode=$this->db['priode']->priode_aktif();
      $this->db['berita']->set_priode($priode);
      $data['timeline'] =$this->db['berita']->getdata('');
      
      return $data;
   }


}