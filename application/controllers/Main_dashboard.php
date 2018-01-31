<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_dashboard extends CI_Controller {
	
	public function index()
	{
		$db['berita']=$this->Berita_model;
		$db['maba']=$this->Maba_model;
		$db['priode']=$this->Priode_model;
		$this->Main_dashboard_model->setdbvar($db);
		$data=$this->Main_dashboard_model->rekap_data();
		$data['menu_idx']=0;        
		$this->load->view('main_dashboard',$data);
	}

    public function berita()
	{
		
        $db['berita']=$this->Berita_model;
        $this->Main_dashboard_model->setdbvar($db);
        $data=$this->Main_dashboard_model->baca_berita(); 
		$this->load->view('berita',$data);
	}

	public function jadwal_syarat()
	{
		
        $db['priode']=$this->Priode_model;
        $db['glmb']=$this->Glmb_model;
        $this->Main_dashboard_model->setdbvar($db);
        $data=$this->Main_dashboard_model->jadwal_syarat(); 
        $data['menu_idx']=3;
		$this->load->view('jadwal_syarat',$data);
	}

    public function save()
	{
		if($this->input->is_ajax_request()){
         if($this->input->method()==='post'){
            $data['ktp']=  $this->input->post('ktp');
		    $data['nama']=  $this->input->post('nama'); 
            $data['jk']=  $this->input->post('jk');
            $data['tgl']=   $this->input->post('tgl');
		    $data['thnlls']= $this->input->post('thnlls');
		    $data['fak']= $this->input->post('fak');
		    $data['prodi']= $this->input->post('prodi');
		    $data['pass']=  $this->input->post('pass');
		    $data['user']=  $this->input->post('user');

		    $db['maba']=$this->Maba_model;
		    $db['prodi']=$this->Prodi_model;
		    $this->Main_dashboard_model->setdbvar($db);
		    $ket = $this->Main_dashboard_model->save_akun($data);
		    echo $ket;            
         }else{
         	show_error('Not an authorized access !!!');
         }
		}else{
			show_error('Not an authorized access !!!');
		}
	}    


    public function buat_akun()
	{
		$db['fakultas']=$this->Fakultas_model;
		$db['priode']=$this->Priode_model;
		$db['glmb']=$this->Glmb_model;	
		$db['maba']=$this->Maba_model;	
		$db['berita']=$this->Berita_model;
		$this->Main_dashboard_model->setdbvar($db);
		$data=$this->Main_dashboard_model->buat_akun();
		$data['menu_idx']=1;
		$this->load->view('buat_akun',$data);
	}

	public function get_prodi()
	{
       if($this->input->is_ajax_request()){ 
         if($this->input->method()==='post'){ 
           $fak = $this->input->post('idfak');
           $db['prodi']=$this->Prodi_model;		
		   $this->Main_dashboard_model->setdbvar($db);
		   $data=$this->Main_dashboard_model->get_prodi($fak);
		   echo $data;
         }else{
           show_error('Not an authorized access !!!');	
         }
	   }else{
	   	 show_error('Not an authorized access !!!');
	   }
	}


    


}