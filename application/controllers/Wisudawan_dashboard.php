<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisudawan_dashboard extends CI_Controller {
	
	public function index()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){
		    $db['priode']=$this->Priode_model;
		    $db['berita']=$this->Berita_model;
            $this->Wisudawan_dashboard_model->setdbvar($db);
            $data=$this->Wisudawan_dashboard_model->baca_berita();
            $data['menu_idx']=0;
		    $this->load->view('wisudawan_dashboard',$data);

		}else{
			redirect('/Wisudawan_dashboard/login');
		}

	}

    public function login()
	{
		$un=$this->input->post('un');
        $psw=$this->input->post('psw');
        $login = $this->input->post('login');

		$db['wisudawan']=$this->Wisudawan_model;
		$db['priode']=$this->Priode_model;	
		$db['log']=$this->Log_wisudawan_model;	
		$this->Wisudawan_dashboard_model->setdbvar($db);
		$data=$this->Wisudawan_dashboard_model->login($login,$un,$psw);
        if(($login=='login') and ($data['msg']=='') )
		{
          redirect('/Wisudawan_dashboard/index');
		}else{
		  $this->load->view('wisudawan_login',$data);
		} 		
	}

	public function lupa()
	{
        $save = $this->input->post('save');
        $hsl['msg']='';

        if($save=='save'){
          $data['jk']= $this->input->post('jk');
          $data['ktp']=$this->input->post('ktp');
          $data['tgl_lahir']= date('Y-m-d', strtotime($this->input->post('tgl')));        
          $data['user_name']= $this->input->post('user');
          $data['user_pass']=$this->input->post('pass');
        
          $db['priode']=$this->Priode_model;
          $db['wisudawan']=$this->Wisudawan_model;
          
          $this->Wisudawan_dashboard_model->setdbvar($db);
          $hsl=$this->Wisudawan_dashboard_model->lupa($data);
        }

        if(($save=='save') and ($hsl['kd']==1) )
		{
          $this->load->view('wisudawan_login',$hsl);
		}else{ 
		  $this->load->view('wisudawan_lupa',$hsl);
		}  
	}

	public function data()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){
		  $db['fakultas']=$this->Fakultas_model;
		  $db['prodi']=$this->Prodi_model;
		  $db['wisudawan']=$this->Wisudawan_model;
		  $this->Wisudawan_dashboard_model->setdbvar($db);
		  $data = $this->Wisudawan_dashboard_model->baca_data();		  
          $data['menu_idx']=1;
		  $this->load->view('wisudawan_data',$data);
		}else{
			redirect('/Wisudawan_dashboard/login');
		}


	}

	public function message()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){
              $this->load->view('wisudawan_message');
			}else{
			redirect('/Wisudawan_dashboard/login');
		}
	}

	public function logout()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){
		  $id_wisuda = $this->session->userdata('id_wisuda');
		  $lg_time = $this->session->userdata('lg_time');

		  $db['log']=$this->Log_wisudawan_model;
		  $this->Wisudawan_dashboard_model->setdbvar($db);
		  $this->Wisudawan_dashboard_model->logout($id_wisuda,$lg_time);
		  
		  $array_items = array('id_wisuda','lg_time','logged_in');
          $this->session->unset_userdata($array_items);
          
		}
		redirect('/Main_dashboard/');
		


	}

	public function do_upload()
	{
		header('Content-type: application/json');
        
                $id_wisuda = $this->session->userdata('id_wisuda');
                $nm_file = 'temp_'.$id_wisuda.'_'.date('YmdHis');
                
                $config['upload_path']          = './assets/photo';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1024;
                $config['remove_space']         = true;
                $config['file_name']            = $nm_file;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('img'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        echo json_encode(array('code' => 0, 'url' => ''));                           
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        if(file_exists('./assets/photo/'.$data['upload_data']['file_name'])){
                          echo json_encode(array('code' => 0, 'url' => base_url()."assets/photo/".$data['upload_data']['file_name']));
                        }else{
                          echo json_encode(array('code' => 0, 'url' => ''));         	
                        }  
                }        
		
        
	}

	public function updatedatawisudawan()
	{
        $data['alamat']=$this->input->post('alamat');
        $data['hp']=$this->input->post('hp');
        $data['jk']= $this->input->post('jk');
        $data['ktp']=$this->input->post('ktp');
        $data['nama']=$this->input->post('nama');
        $data['tmpt_lahir']= $this->input->post('tempat');
        $data['tgl_lahir']= date('Y-m-d', strtotime($this->input->post('tgl')));
        if(!empty($this->input->post('nm_file')))
        {
         $data['photo']= $this->input->post('nm_file');
        }

        $data['angkatan']=$this->input->post('ang');
        $data['id_prodi']= $this->input->post('prodi');
        $data['nim']=$this->input->post('nim');

        if(!empty($this->input->post('user'))){  
          $data['user_name']=$this->input->post('user');
          $data['user_pass']= md5($this->input->post('pass'));
        } 

        //$data['ipk']= $this->input->post('ipk');
        
        $data['jdl_skripsi']= $this->input->post('jdlskripsi');
        
        //if(!empty($this->input->post('tgllls'))){
          //$data['tgl_lls']= date('Y-m-d', strtotime($this->input->post('tgllls')));
        //}
        
        if(!empty($this->input->post('tglbyr'))){
          $data['tgl_byr']= date('Y-m-d', strtotime($this->input->post('tglbyr')));
        }
        
        if(!empty($this->input->post('nm_file1')))
        {
         $data['kwitansi']= $this->input->post('nm_file1');
        }


        $data['id_wisuda']= $this->session->userdata('id_wisuda');
		$db['wisudawan']=$this->Wisudawan_model;
		$this->Wisudawan_dashboard_model->setdbvar($db);
		$hsl=$this->Wisudawan_dashboard_model->updatedatawisudawan($data);
		echo $hsl;
	}

	

	public function cetak(){
         $logged_in = $this->session->userdata('logged_in');
		 if($logged_in){ 
            $db['fakultas']=$this->Fakultas_model;
		    $db['prodi']=$this->Prodi_model;
		    $db['wisudawan']=$this->Wisudawan_model;
		    $this->Wisudawan_dashboard_model->setdbvar($db);
		    $data = $this->Wisudawan_dashboard_model->cetak_data(); 
            $this->load->library('pdf');
            $this->pdf->load_view('cetak',$data);
            $this->pdf->render();
            $this->pdf->stream("welcome.pdf");
         }else{
			redirect('/Wisudawan_dashboard/login');
		}   
    }


}
