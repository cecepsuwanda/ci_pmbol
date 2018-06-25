<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_dashboard_model extends CI_Model {

   private $db,$lib;

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

   public function setdbvar($db,$lib=array())
   {
   	$this->db=$db;
    $this->lib=$lib;
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

   private function build_tag_db2($data)
   {
      $table=array();
      if(!empty($data))       
      {
          $i=1;
          foreach ($data as $row) {
          $tmp=array();
              foreach ($row as $key=>$value) {
                if($key!='id'){
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

   private function build_tag_db3($data)
   {
      $table=array();
      if(!empty($data))       
      {
          $i=1;
          foreach ($data as $row) {
          $tmp=array();
              foreach ($row as $key=>$value) {
                if($key!='id'){
                  if($key=='id_peserta'){
                     $temp=$this->db['maba']->getdata("id_peserta='$value'");
                     $tmp[]=array((isset($temp[0]['id_peserta']) ? $temp[0]['id_peserta'] : ''),array());
                     $tmp[]=array((isset($temp[0]['nm']) ? $temp[0]['nm'] : ''),array());
                  }else{
                     $tmp[]=array($value,array());
                  }                
                 }else{
                   $tmp[]=array($i++,array());
                 }  
              }
          $table[]=$tmp;
          
         }
      }

      return $table;
   }

   private function build_tag_db4($data)
   {
      
      $table=array();
      if(!empty($data))       
      {
          $i=1;
          foreach ($data as $row) {
              $temp=array();
              $temp[]=array($i,array());
              $ext = explode('.',basename($row));
              $tmp = explode('_',$ext[0]);
              if(isset($tmp[1])){
                $temp[]=array($tmp[1],array());
              }else{
                $temp[]=array($ext[0],array());
              }

              $temp[]=array('<img src="'.base_url().'assets/photo/'.$row.'" style="width:50px;height:50px;"><br>'.$row,array());
              if(isset($tmp[1])){
                $tmp1 = $this->db['maba']->getdata("id_peserta='$tmp[1]'");
              }else{
                $tmp1 = $this->db['maba']->getdata("id_peserta='$ext[0]'");
              }
              if(!empty($tmp1)){
                if($tmp[0]=='temp'){
                   $txt='';
                   if (basename($tmp1[0]['photo'])==$row){
                      $txt.="Photo Terkoneksi Ke Akun";
                   }else{
                      $txt.="Photo di akun ".basename($tmp1[0]['photo']);
                      $txt.='<br><a href="javascript:deletephoto('."'$row'".')">Delete photo</a>';
                   } 
                   $txt.='<br>';
                   if(basename($tmp1[0]['kwitansi'])==$row){
                     $txt.="Kwitansi Terkoneksi Ke Akun";
                   }else{
                     $txt.="Kwitansi di akun ".basename($tmp1[0]['kwitansi']);
                     $txt.= '<br><a href="javascript:deletephoto('."'$row'".')">Delete photo</a>';    
                   }  
                   $temp[]=array($txt,array());    

                }else{
                  
                  if($tmp[0]=='kwitansi'){
                     $txt='';
                     if(basename($tmp1[0]['kwitansi'])==$row){
                       $txt.= "Kwitansi Terkoneksi Ke Akun";
                     }else{
                       $txt.= "Kwitansi di akun ".basename($tmp1[0]['kwitansi']).'<br>';
                       $txt.= '<a href="javascript:updatekwitansi('."'$tmp[1]'".","."'$row'".')">Update data</a>';
                     }
                      
                     $temp[]=array($txt,array());      
                  }else{
                     $txt='';
                      if(basename($tmp1[0]['photo'])==$row){
                        $txt.="Photo Terkoneksi Ke Akun"; 
                      }else{
                        $txt.="Photo di akun ".basename($tmp1[0]['photo']).'<br>'; 
                        $txt.= '<a href="javascript:updatephoto('."'$ext[0]'".","."'$row'".')">Update data</a>';
                      }  
                      $temp[]=array($txt,array());                      
                  }
                }
                            
              }else{
                $temp[]=array('<a href="javascript:deletephoto('."'$row'".')">Delete photo</a>',array());
                
              }  
              $table[]=$temp;
            
          $i++;
         }
      }

      return $table;
   }  

   public function tanya_jawab()
   {
     $data['arr_tanya'] =$this->db['tanya']->getchat();
     $data['arr_jawab'] =$this->db['jawab']->getchat();

     return $data;
   }


   public function baca_log()
   {

     $data = $this->notif();
     $data['rekap_prodi']=$this->db['maba']->rekapperprodi();  

     $tmp=$this->db['log_admin']->getdata('');
     $data['log_admin']=$this->build_tag_db2($tmp);
     $tmp=$this->db['log_maba']->getdata('');
     $data['log_maba']=$this->build_tag_db3($tmp);

     $file = directory_map('./assets/photo/');
     $data['photo']=$this->build_tag_db4($file);

     return $data;
   }

   public function rekap_data()
   {
     $data = $this->notif();
     $data['rekap_prodi']=$this->db['maba']->rekapperprodi();
     return $data;
   }
   

   public function baca_berita()
   {      
      $data = $this->notif();
      $data['timeline'] =$this->db['berita']->getdata('');
      return $data;
   }

   public function simpan_berita($berita)
   {
      $data['isi_berita']=$berita;
      $this->db['berita']->insertdata($data);
   }

   public function simpan_jawab($data)
   {
      
      $this->db['jawab']->insertdata($data);
   }

   public function delete_berita($id_berita)
   {
      $data['id_berita']=$id_berita;
      $this->db['berita']->deletedata($data);
   }

   public function delete_jawab($id_jawab)
   {      
      $this->db['jawab']->deletedata($id_jawab);
   }

   public function save_berita($data)
   {
      
      $this->db['berita']->updatedata($data);
   }

   public function save_jawab($data)
   {
      
      $this->db['jawab']->updatedata($data);
   }

   public function edit_berita($id_berita)
   {
      $priode=$this->db['priode']->priode_aktif();
      $this->db['berita']->set_priode($priode);
      $data = $this->db['berita']->getdata("id_berita='$id_berita'",1);
      $tmp='';
      if(!empty($data))
      {
        $tmp = '<div class="row">
                  <div class="col-md-12">
                   <div class="form-group">
                   <textarea id="berita_'.$id_berita.'" name="berita" class="form-control" rows="3" placeholder="Berita ...">'.$data[0]['isi_berita'].'</textarea>
                  </div>
                </div>                
              </div>';
      }

      return $tmp;
   }

   public function edit_jawab($id_jawab)
   {
            
      $data = $this->db['jawab']->getdata("id='$id_jawab'");
      $tmp='';
      if(!empty($data))
      {
        $tmp = '<div class="row">
                  <div class="col-md-12">
                   <div class="form-group">
                   <textarea id="jawab_'.$id_jawab.'" name="jawab" class="form-control" rows="3" placeholder="Jawab ...">'.$data[0]['comment'].'</textarea>
                  </div>
                </div>                
              </div>';
      }

      return $tmp;
   }


   public function baca_data()
   {
     
     $data = $this->notif();         
     $data['data_daf']=$this->db['maba']->getmaba_jn_prodi_admin(0);
     $data['data_konf']=$this->db['maba']->getmaba_jn_prodi_admin(1);
     $data['data_ver']=$this->db['maba']->getmaba_jn_prodi_admin(1,1);

     return $data;

   }

   public function cetak_layak()
   {
    $priode=$this->db['priode']->priode_aktif();
     $this->db['wisudawan']->set_priode($priode);
    $data=$this->db['wisudawan']->getwisudawan_jn_prodi_admin(0,1,1);
    return $data;
   }

   public function cetak_maba()
   {
    $priode=$this->db['priode']->priode_aktif();
     $this->db['maba']->set_priode($priode);
    $data=$this->db['maba']->getmaba_jn_prodi_admin(1,1,1);
    return $data;
   }

   private function thnlls($angk,$thnawl=1997)
   {
    $curYear = date('Y');

     $ang=array();
     for ($i=$thnawl; $i <= $curYear ; $i++) { 
       if($i!=$angk){
         $ang[]=array($i,$i);
       }

     }
     return $ang;
   }

   public function baca_data_maba($id_peserta)
   {

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
     $data['usm']=$tmp[0]['usm'];     

     $data['keterangan']=empty($tmp[0]['ket']) ? '' : $tmp[0]['ket'];
     
     return $data;
   }

   public function hapus_data_maba($id_peserta)
   {
     $data=$this->db['maba']->getdata("id_peserta='$id_peserta'");
     
     if(!empty($data[0]['photo'])){
        if(file_exists('./assets/photo/'.basename($data[0]['photo']))){
          unlink('./assets/photo/'.basename($data[0]['photo']));
        }
     }

     if(!empty($data[0]['kwitansi'])){
       if(file_exists('./assets/photo/'.basename($data[0]['kwitansi']))){
          unlink('./assets/photo/'.basename($data[0]['kwitansi']));
        } 
     }


     $this->db['maba']->deletedataadmin($id_peserta);
   }


   public function tambah_data_wisudawan()
   {
     $tmp=$this->db['fakultas']->getdata('');
     $data['drop_fak']=$this->build_dropdown($tmp,array('id_fak','nm_fak'),'Fakultas ','--- Pilih Fakultas ---');
     $tmp=$this->angkatan(0);
     $data['drop_ang']=$this->build_dropdown($tmp,array(0,1),'','--- Pilih Angkatan ---');
     return $data;
   }

   public function login($login,$un,$psw)
   {
     
     $data['msg']="";    

     if($login=='login')
     {
           
        $tmp=$this->db['user']->getdata('user_name="'.$un.'" and user_pass=md5("'.$psw.'")'); 
        
        if(empty($tmp))
        {
          $data['msg']="<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Username atau Password Keliru !!!</p> </div>";
        }else{
          $newdata = array(
               'user_name'  => $tmp[0]['user_name'],
               'lg_time' => date('Y-m-d H:i:s'),
               'logged_in' => TRUE
             );
             $data['dt_sess']=$newdata;
             $tmp=$this->db['log']->insertdata($newdata); 
        }

     }

     return $data;
   }

   public function logout($user_name,$lg_time)
   {
      $out_time = date('Y-m-d H:i:s');
      $tmp=$this->db['log']->updatedata(array('user_name'=>$user_name,'lg_time'=>$lg_time,'out_time'=>$out_time));
   }

   private function angkatan($angk)
   {
    $curYear = date('Y')-3;

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

   

   public function updatedatamaba($data)
   {
     if(!empty($data['ktp'])){   
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

                         $id_peserta = $data['id_peserta'];
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
      }else{
         return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>No. KTP/NIK tidak boleh kosong !!!</p> </div>";
      }
   }

  public function updatedatapil($data)
   {
     if(!empty($data['id_prodi'])){
        if(!empty($data['kelas'])){
           $this->db['maba']->updatedata($data);

           return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Mahasiswa baru dengan id peserta = $data[id_peserta], berhasil di update !!!</p> </div>"; 
        }else{
           return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Kelas tidak boleh kosong !!!</p> </div>";  
        } 
     }else{
        return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Prodi. tidak boleh kosong !!!</p> </div>";
     }                    
        
   }

   public function ket($data)
   {
           $priode=$this->db['priode']->priode_aktif();
           $this->db['maba']->set_priode($priode);
           
           $data['nousm']=$this->db['maba']->getnousm($data['usm']);

           $this->db['maba']->updatedata($data);

           return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Mahasiswa baru dengan id peserta = $data[id_peserta], berhasil di update !!!</p> </div>";                        
        
   }

   public function konf($data)
   {
         if(!empty($data['nm_bank'])){
           if(!empty($data['tgltrans'])){

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

                         $id_peserta = $data['id_peserta'];
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
          }else{
           return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Tanggal Transfer tidak boleh kosong !!!</p> </div>";  
        } 
     }else{
        return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Bank tidak boleh kosong !!!</p> </div>";
     }                 
 
   }

   public function tambahdatawisudawan($data)
   {
      $tmp=$this->db['wisudawan']->getdata("nim='$data[nim]'");
      if(!empty($tmp)){
        return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Calon Wisudawan dengan nim = $data[nim], sudah buat akun !!!</p> </div>"; 
      }else{
         $tmp=$this->db['wisudawan']->getdata("ktp='$data[ktp]'");
         if(!empty($tmp)){
             return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Calon Wisudawan dengan ktp/nik = $data[ktp], sudah buat akun !!!</p> </div>"; 
         }else{ 

                          if(isset($data['photo'])){
                              if(file_exists('./assets/photo/'.basename($data['photo']))){
                                 $ext = explode('.',basename($data['photo']));
                                 rename('./assets/photo/'.basename($data['photo']),'./assets/photo/photo_'.$data['id_wisuda'].'.'.$ext[1]);
                                 $data['photo']=base_url().'assets/photo/photo_'.$data['id_wisuda'].'.'.$ext[1];
                             }else{
                               unset($data['photo']);
                             }
                           }

                           if(isset($data['kwitansi'])){
                              if(file_exists('./assets/photo/'.basename($data['kwitansi']))){
                                 $ext = explode('.',basename($data['kwitansi']));
                                 rename('./assets/photo/'.basename($data['kwitansi']),'./assets/photo/kwitansi_'.$data['id_wisuda'].'.'.$ext[1]);
                                 $data['kwitansi']=base_url().'assets/photo/kwitansi_'.$data['id_wisuda'].'.'.$ext[1];
                             }else{
                               unset($data['kwitansi']);
                             }
                           }

               
               $this->db['wisudawan']->insertdataadmin($data);
               return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Akun Calon Wisudawan dengan nim = $data[nim], berhasil di buat !!!</p> </div>"; 
               
         }
      } 
   }

   public function updatephoto($id_wisuda,$photo)
   {
     $data['id_wisuda']=$id_wisuda;
     $data['photo']=base_url().'assets/photo/'.$photo;
     $this->db['wisudawan']->updatedata($data);
   }

   public function deletephoto($photo)
   {
     if(file_exists('./assets/photo/'.$photo)){
       unlink('./assets/photo/'.$photo);
     }
   }

   public function updatekwitansi($id_wisuda,$kwitansi)
   {
     $data['id_wisuda']=$id_wisuda;
     $data['kwitansi']=base_url().'assets/photo/'.$kwitansi;
     $this->db['wisudawan']->updatedata($data);
   }

   public function baca_setting($id)
   {
     
     $data = $this->notif();
     $dt_jdwl = $this->db['glmb']->getallglmbjdwl();
     $arr_tbjdwl = $this->db['glmb']->alltotb($dt_jdwl);     
     $data['data_priode'] = $this->db['priode']->getsettingpriode($arr_tbjdwl);
     $data['data_admin'] = $this->db['user']->getsettinguser($id);     
     $data['data_fak'] = $this->db['fak']->getsettingfak('');
     $data['data_prodi'] = $this->db['prodi']->getsettingprodi('');
     return $data;
   }

   public function baca_priode($thn)
   {
      if(!empty($thn)){
         $tmp = $this->db['priode']->getdata('thn='.$thn);
         $data['daftar']=date("d-m-Y", strtotime($tmp[0]['awal'])).' - '.date("d-m-Y", strtotime($tmp[0]['akhir']));
         $data['aktif']=$tmp[0]['aktif'];
         $data['thn']=$tmp[0]['thn'];
         $arr_thn=$this->thnlls($tmp[0]['thn']);     
         $data['drop_thn']=$this->build_dropdown($arr_thn,array(0,1),'','--- Pilih Tahun PMB ---');    
         $data['drop_thn']= "<option value='".$tmp[0]['thn']."' selected='selected' >".$tmp[0]['thn']."</option>".$data['drop_thn'];
         
         $data['byr']=$tmp[0]['byr'];
         $data['bank']=$tmp[0]['bank'];
         $data['rek']=$tmp[0]['rek'];
         $data['an']=$tmp[0]['an'];

         $tmp = $this->db['glmb']->getglmbjdwl($thn);
         
         $data['glmb'] = array();
         $data['usm'] = array();

         for ($i=1;$i<=3;$i++) {
           $data['glmb'][$i] = date("d-m-Y", strtotime($tmp[$i]['awal'])).' - '.date("d-m-Y", strtotime($tmp[$i]['akhir'])); 
           $data['usm'][$i] = date("d-m-Y", strtotime($tmp[$i]['ujian']));       
         }
      }else{
         $arr_thn=$this->thnlls('');     
         $data['drop_thn']=$this->build_dropdown($arr_thn,array(0,1),'','--- Pilih Tahun PMB ---');    
         
      }

     return $data;
   }

   public function baca_user($id)
   {
     $tmp = $this->db['user']->getdata('user_name="'.$id.'"');
     $data['id']=$tmp[0]['user_name'];
     $data['user_name']=$tmp[0]['user_name'];
     return $data;
   }

   public function insertdatapriode($data)
   {
      
      
      $tmp = explode('-',$data['daftar']);
      $data['awal'] = date('Y-m-d', strtotime($tmp[0] .'-'. $tmp[1].'-'.$tmp[2])); 
      $data['akhir'] = date('Y-m-d', strtotime($tmp[3] .'-'. $tmp[4].'-'.$tmp[5]));       
      unset($data['daftar']);
      
      $data1=array();
      foreach ($data['glmb'] as $key => $value) {
        $tmp   = explode('-',$value);
        $awal  = date('Y-m-d', strtotime($tmp[0] .'-'. $tmp[1].'-'.$tmp[2])); 
        $akhir = date('Y-m-d', strtotime($tmp[3] .'-'. $tmp[4].'-'.$tmp[5]));
        $tmp   = explode('-',$data['usm'][$key]);   
        $ujian = date('Y-m-d', strtotime($tmp[0] .'-'. $tmp[1].'-'.$tmp[2])); 
        $thn =  $data['thn'];
        $thn_old = $data['thn_old'];
        $thn_old = $thn != $thn_old ? $thn : $thn_old;
        $data1[$key]=array('thn'=>$thn,'thn_old'=>$thn_old,'awal'=>$awal,'akhir'=>$akhir,'ujian'=>$ujian);
      }

      unset($data['thn_old']);
      unset($data['glmb']);
      unset($data['usm']);

      $this->db['priode']->insertdata($data);
      $this->db['glmb']->insertdata($data1);      
      return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Data Berhasil Disimpan !!!</p> </div>";      

   }

   public function updatedatapriode($data)
   {
      
      $tmp = explode('-',$data['daftar']);
      $data['awal'] = date('Y-m-d', strtotime($tmp[0] .'-'. $tmp[1].'-'.$tmp[2])); 
      $data['akhir'] = date('Y-m-d', strtotime($tmp[3] .'-'. $tmp[4].'-'.$tmp[5]));       
      unset($data['daftar']);
      
      $data1=array();
      foreach ($data['glmb'] as $key => $value) {
        $tmp   = explode('-',$value);
        $awal  = date('Y-m-d', strtotime($tmp[0] .'-'. $tmp[1].'-'.$tmp[2])); 
        $akhir = date('Y-m-d', strtotime($tmp[3] .'-'. $tmp[4].'-'.$tmp[5]));
        $tmp   = explode('-',$data['usm'][$key]);   
        $ujian = date('Y-m-d', strtotime($tmp[0] .'-'. $tmp[1].'-'.$tmp[2])); 
        $thn =  $data['thn'];
        $thn_old = $data['thn_old'];
        $thn_old = $thn != $thn_old ? $thn : $thn_old;
        $data1[$key]=array('thn'=>$thn,'thn_old'=>$thn_old,'awal'=>$awal,'akhir'=>$akhir,'ujian'=>$ujian);
      }


      unset($data['glmb']);
      unset($data['usm']);

      $this->db['priode']->updatedata($data);
      $this->db['glmb']->updatedata($data1);
      return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Data Berhasil Diupdate !!!</p> </div>";
   }   

   public function deletedatapriode($thn)
   {
     $this->db['priode']->deletedata($thn);
     $this->db['glmb']->deletedata($thn);
   }

   public function baca_fak($id)
   {
     $tmp = $this->db['fakultas']->getdata('id_fak="'.$id.'"');
     $data['id']=$tmp[0]['id_fak'];
     $data['nm']=$tmp[0]['nm_fak'];
     $data['urut']=$tmp[0]['urut_fak'];
     return $data;
   }

   public function insertuserdata($data)
   {
      $tmp=$this->db['user']->getdata("user_name='$data[user]'");
      if(!empty($tmp)){
         return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Admin dengan username = $data[user], sudah buat akun !!!</p> </div>"; 
      }else{
        $this->db['user']->insertdata($data);
        return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Data Berhasil Disimpan !!!</p> </div>";      
      }
   }

   public function updateuserdata($data)
   {
        $this->db['user']->updatedata($data);
        return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Data Berhasil Diupdate !!!</p> </div>";     
      
   }

   public function deleteuserdata($id)
   {
     $this->db['user']->deletedata($id);
   }

   public function insertfakdata($data)
   {
      $tmp=$this->db['fakultas']->getdata("id_fak='$data[id]'");
      
      if(!empty($tmp)){
         return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Fakultas dengan id = $data[id], sudah ada !!!</p> </div>"; 
      }else{
        $this->db['fakultas']->insertdata($data);
        return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Data Berhasil Disimpan !!!</p> </div>";      
      }
   }

   public function updatefakdata($data)
   {
      $update = 1;
      if($data['id']!=$data['id_old'])
      {
        $tmp=$this->db['fakultas']->getdata("id_fak='$data[id]'");
      
        if(!empty($tmp)){
          $msg = "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Fakultas dengan id = $data[id], sudah ada !!!</p> </div>"; 
          $update =0;
        } 
      }  

      if($update==1){
        $this->db['fakultas']->updatedata($data);
        $msg = "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Data Berhasil Diupdate !!!</p> </div>";     
      }
      return $msg;
   }

   public function deletefakdata($id)
   {
     $this->db['fakultas']->deletedata($id);
   }

   public function baca_prodi($id)
   {
     $tmp = $this->db['prodi']->getdata('id_prodi="'.$id.'"');
     $data['id']=$tmp[0]['id_prodi'];
     $data['nm']=$tmp[0]['nm_prodi'];
     $data['urut']=$tmp[0]['urut_prodi'];
     $data['fak']=$tmp[0]['fak_prodi'];


     $tmp_fak=$this->db['fakultas']->getdata('id_fak="'.$tmp[0]['fak_prodi'].'"');

     $arr_fak=$this->db['fakultas']->getdata('id_fak<>"'.$tmp[0]['fak_prodi'].'"');
     $data['drop_fak']=$this->build_dropdown($arr_fak,array('id_fak','nm_fak'),'Fakultas ','--- Pilih Fakultas ---');
     $data['drop_fak']= "<option value='".$tmp_fak[0]['id_fak']."' selected='selected' >Fakultas ".$tmp_fak[0]['nm_fak']."</option>".$data['drop_fak'];

     return $data;
   }  

   public function insertprodidata($data)
   {
      $tmp=$this->db['prodi']->getdata("id_prodi='$data[id]'");
      
      if(!empty($tmp)){
         return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Prodi dengan id = $data[id], sudah ada !!!</p> </div>"; 
      }else{
        $this->db['prodi']->insertdata($data);
        return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Data Berhasil Disimpan !!!</p> </div>";      
      }
   }

   public function updateprodidata($data)
   {
      $update = 1;
      if($data['id']!=$data['id_old'])
      {
        $tmp=$this->db['prodi']->getdata("id_prodi='$data[id]'");
      
        if(!empty($tmp)){
          $msg = "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Prodi dengan id = $data[id], sudah ada !!!</p> </div>"; 
          $update =0;
        } 
      }  

      if($update==1){
        $this->db['prodi']->updatedata($data);
        $msg = "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Data Berhasil Diupdate !!!</p> </div>";     
      }
      return $msg;
   }

   public function deleteprodidata($id)
   {
     $this->db['prodi']->deletedata($id);
   }

}