<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maba_dashboard_model extends CI_Model {

   private $db;

   public function setdbvar($db)
   {
   	$this->db=$db;
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


   public function baca_data()
   {
     $id_wisuda = $this->session->userdata('id_wisuda');
     


     $tmp=$this->db['wisudawan']->getdata('id_wisuda="'.$id_wisuda.'"');
     
     $arr_ang=$this->angkatan($tmp[0]['angkatan']);     
     $data['drop_ang']=$this->build_dropdown($arr_ang,array(0,1),'','--- Pilih Angkatan ---');    
     $data['drop_ang']= "<option value='".$tmp[0]['angkatan']."' selected='selected' >".$tmp[0]['angkatan']."</option>".$data['drop_ang'];

     $tmp_prodi=$this->db['prodi']->getdata('id_prodi="'.$tmp[0]['id_prodi'].'"');     
     $tmp_fak=$this->db['fakultas']->getdata('id_fak="'.$tmp_prodi[0]['fak_prodi'].'"');

     $arr_fak=$this->db['fakultas']->getdata('id_fak<>"'.$tmp_prodi[0]['fak_prodi'].'"');
     $data['drop_fak']=$this->build_dropdown($arr_fak,array('id_fak','nm_fak'),'Fakultas ','--- Pilih Fakultas ---');
     $data['drop_fak']= "<option value='".$tmp_fak[0]['id_fak']."' selected='selected' >Fakultas ".$tmp_fak[0]['nm_fak']."</option>".$data['drop_fak'];

     $arr_prodi=$this->db['prodi']->getdata('fak_prodi ="'.$tmp_fak[0]['id_fak'].'" and id_prodi<>"'.$tmp[0]['id_prodi'].'"');
     $data['drop_prodi']=$this->build_dropdown($arr_prodi,array('id_prodi','nm_prodi'),'Prodi. ','--- Pilih Prodi ---');
     $data['drop_prodi']= "<option value='".$tmp_prodi[0]['id_prodi']."' selected='selected' >Prodi. ".$tmp_prodi[0]['nm_prodi']."</option>".$data['drop_prodi'];

     $data['ktp']=$tmp[0]['ktp'];
     $data['nama']=$tmp[0]['nama'];
     $data['jk']=$tmp[0]['jk'];
     $data['tmpt_lahir']=$tmp[0]['tmpt_lahir'];
     $data['tgl_lahir']=date("d-m-Y", strtotime($tmp[0]['tgl_lahir']));
     $data['alamat']=empty($tmp[0]['alamat']) ? '' : $tmp[0]['alamat'];
     $data['hp']=$tmp[0]['hp'];
     $data['photo']=$tmp[0]['photo'];
     $data['tgl_byr']= is_null($tmp[0]['tgl_byr'])  ? '' : date("d-m-Y", strtotime($tmp[0]['tgl_byr']));
     $data['kwitansi']=$tmp[0]['kwitansi'];

     $data['nim']=$tmp[0]['nim'];
     
     //$data['ipk']=$tmp[0]['ipk'];
     //$data['tgl_lls']= is_null($tmp[0]['tgl_lls'])  ? '' : date("d-m-Y", strtotime($tmp[0]['tgl_lls']));

     $data['jdl_skripsi']=$tmp[0]['jdl_skripsi'];
     $data['ver']=$tmp[0]['ver'];

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
        $data['msg']="<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Perubahan Data Setelah Wisuda Tidak Diijinkan !!!</p> </div>";
      }else{
       $data['isbuka']=1;
      }

    }

     //$tmp=$this->db['priode']->getdata('aktif=1');
     //$date = date('Y-m-d');
     //$data['isbuka']= $date >= $tmp[0]['awal'] && $date <= $tmp[0]['akhir'];    
   	 
   	   	 

   	 if($login=='login')
   	 {
           
        $tmp=$this->db['wisudawan']->getdata('user_name="'.$un.'" and user_pass=md5("'.$psw.'")'); 
        
        if(empty($tmp))
        {
          $data['msg']="<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Username atau Password Keliru !!!</p> </div>";
        }else{
        	$newdata = array(
               'id_wisuda'  => $tmp[0]['id_wisuda'],
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

     $tmp=$this->db['wisudawan']->getdata("ktp='$data[ktp]' and tgl_lahir='$data[tgl_lahir]' and jk='$data[jk]'");
     $msg='';
     if(!empty($tmp)){
        $tmp1['id_wisuda']=$tmp[0]['id_wisuda'];
        $tmp=$this->db['wisudawan']->getdata("user_name='$data[user_name]' and ktp<>'$data[ktp]'");
        if(!empty($tmp)){
             $data['kd']=0;
             $msg = "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Username ada dalam database !!!</p> </div>";
             }
             else{
               $tmp1['user_name']=$data['user_name'];
               $tmp1['user_pass']=md5($data['user_pass']);
               $this->db['wisudawan']->updatedata($tmp1);
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

   public function logout($id_wisuda,$lg_time)
   {
      $out_time = date('Y-m-d H:i:s');
      $tmp=$this->db['log']->updatedata(array('id_wisuda'=>$id_wisuda,'lg_time'=>$lg_time,'out_time'=>$out_time));
   }

   public function updatedatawisudawan($data)
   {
     $tmp=$this->db['wisudawan']->getdata("ktp='$data[ktp]' and id_wisuda<>'$data[id_wisuda]'");
         if(!empty($tmp)){
             return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Calon wisudawan dengan ktp/nik = $data[ktp], sudah ada !!!</p> </div>"; 
         }else{

             $tmp=$this->db['wisudawan']->getdata("nim='$data[nim]' and id_wisuda<>'$data[id_wisuda]'");
                if(!empty($tmp)){
                      return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Calon wisudawan dengan nim = $data[nim], sudah ada !!!</p> </div>"; 
                }else{

                    $is_simpan=1;
                    if(isset($data['user_name'])){ 
                       $tmp=$this->db['wisudawan']->getdata("user_name='$data[user_name]' and id_wisuda<>'$data[id_wisuda]'");
                       if(!empty($tmp)){
                         $is_simpan=0;
                         return "<div class='callout callout-danger'><h4>Pemberitahuan</h4><p>Wisudawan dengan user_name = $data[user_name], sudah ada !!!</p> </div>"; 
                       }
                    }   

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

                      if($is_simpan==1){ 
                         $this->db['wisudawan']->updatedata($data);

                         $id_wisuda = $this->session->userdata('id_wisuda');
                         $nm_file = 'temp_'.$id_wisuda;

                         $file = directory_map('./assets/photo/');

                         if(!empty($file))                          
                         {
                            foreach ($file as $nmfile) {
                               $ext = explode('.',basename($nmfile));
                               $tmp = explode('_',$ext[0]);
                               if(($tmp[0].'_'.$tmp[1])==$nm_file)
                               {
                                 unlink('./assets/photo/'.$nmfile);   
                               }
                             } 
                         }


                         return "<div class='callout callout-info'><h4>Pemberitahuan</h4><p>Calon Wisudawan dengan id wisuda = $data[id_wisuda], berhasil di update !!!</p> </div>"; 
                      }   
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