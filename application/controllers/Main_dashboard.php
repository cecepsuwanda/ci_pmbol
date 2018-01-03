<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_dashboard extends CI_Controller {
	
	public function index()
	{
		$db['berita']=$this->Berita_model;
		$db['wisudawan']=$this->Wisudawan_model;
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

    public function save()
	{
		$data['ang']= $this->input->post('ang');
		$data['fak']= $this->input->post('fak');
		$data['jk']=  $this->input->post('jk');
		$data['ktp']=  $this->input->post('ktp');
		$data['nama']=  $this->input->post('nama');
		$data['nim']=   $this->input->post('nim');
		$data['pass']=  $this->input->post('pass');
		$data['prodi']= $this->input->post('prodi');
		$data['tgl']=   $this->input->post('tgl');
		$data['user']=  $this->input->post('user');

		$db['wisudawan']=$this->Wisudawan_model;
		$this->Main_dashboard_model->setdbvar($db);
		$ket = $this->Main_dashboard_model->save_akun($data);
		echo $ket;
	}    


    public function buat_akun()
	{
		$db['fakultas']=$this->Fakultas_model;
		$db['priode']=$this->Priode_model;		
		$this->Main_dashboard_model->setdbvar($db);
		$data=$this->Main_dashboard_model->buat_akun();
		$data['menu_idx']=1;
		$this->load->view('buat_akun',$data);
	}

	public function get_prodi()
	{
        $fak = $this->input->post('idfak');
        $db['prodi']=$this->Prodi_model;		
		$this->Main_dashboard_model->setdbvar($db);
		$data=$this->Main_dashboard_model->get_prodi($fak);
		echo $data;
	}


    


}