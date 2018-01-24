<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maba_dashboard extends CI_Controller {
	
	public function index()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){
		    $db['priode']=$this->Priode_model;
		    $db['berita']=$this->Berita_model;
            $this->Maba_dashboard_model->setdbvar($db);
            $data=$this->Maba_dashboard_model->baca_berita();
            $data['menu_idx']=0;
		    $this->load->view('maba_dashboard',$data);

		}else{
			redirect('/Maba_dashboard/login');
		}

	}

    public function login()
	{
		$un=$this->input->post('un');
        $psw=$this->input->post('psw');
        $login = $this->input->post('login');

		$db['maba']=$this->Maba_model;
		$db['priode']=$this->Priode_model;	
		$db['log']=$this->Log_maba_model;	
		$this->Maba_dashboard_model->setdbvar($db);
		$data=$this->Maba_dashboard_model->login($login,$un,$psw);
        if(($login=='login') and ($data['msg']=='') )
		{
          redirect('/Maba_dashboard/index');
		}else{
		  $this->load->view('maba_login',$data);
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
          $db['maba']=$this->Maba_model;
          
          $this->Maba_dashboard_model->setdbvar($db);
          $hsl=$this->Maba_dashboard_model->lupa($data);
        }

        if(($save=='save') and ($hsl['kd']==1) )
		{
          $this->load->view('maba_login',$hsl);
		}else{ 
		  $this->load->view('maba_lupa',$hsl);
		}  
	}

	public function data()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){
		  $db['fakultas']=$this->Fakultas_model;
		  $db['prodi']=$this->Prodi_model;
		  $db['maba']=$this->Maba_model;
		  $db['priode']=$this->Priode_model;
		  $this->Maba_dashboard_model->setdbvar($db);
		  $data = $this->Maba_dashboard_model->baca_data();		  
          $data['menu_idx']=1;
		  $this->load->view('maba_data',$data);
		}else{
			redirect('/Maba_dashboard/login');
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
		  $id_peserta = $this->session->userdata('id_peserta');
		  $lg_time = $this->session->userdata('lg_time');

		  $db['log']=$this->Log_maba_model;
		  $this->Maba_dashboard_model->setdbvar($db);
		  $this->Maba_dashboard_model->logout($id_peserta,$lg_time);
		  
		  $array_items = array('id_peserta','lg_time','logged_in');
          $this->session->unset_userdata($array_items);
          
		}
		redirect('/Main_dashboard/');
	}

	public function do_upload()
	{
		 
		        header('Content-type: application/json');
        
                $id_peserta = $this->session->userdata('id_peserta');
                $nm_file = 'temp_'.$id_peserta.'_'.date('YmdHis');
                
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

	public function updatedatamaba()
	{
       if($this->input->is_ajax_request()){
         if($this->input->method()==='post'){    
	        $data['ktp']=$this->input->post('ktp');
	        $data['nm']=$this->input->post('nama');
	        $data['tmplhr']= $this->input->post('tempat');
	        $data['jk']= $this->input->post('jk');
	        $data['tgllhr']= date('Y-m-d', strtotime($this->input->post('tgl')));

	        $data['alamat']=$this->input->post('alamat');
	        $data['hp']=$this->input->post('hp');
	        $data['email']=$this->input->post('email');
	        $data['thnlls']=$this->input->post('thnlls');
	        $data['asalsma']=$this->input->post('asal'); 
	        
	        if(!empty($this->input->post('nm_file')))
	        {
	         $data['photo']= $this->input->post('nm_file');
	        }
	        
	        $data['id_peserta']= $this->session->userdata('id_peserta');
			$db['maba']=$this->Maba_model;
			$this->Maba_dashboard_model->setdbvar($db);
			$hsl=$this->Maba_dashboard_model->updatedatamaba($data);
			echo $hsl;
        }else{
         	show_error('Not an authorized access !!!');
         }
		}else{
			show_error('Not an authorized access !!!');
		}

	}

	public function updatedatapil()
	{
          if($this->input->is_ajax_request()){
            if($this->input->method()==='post'){         
		        $data['id_prodi']= $this->input->post('prodi');
		        $data['kelas']= $this->input->post('kelas');

		        $data['id_peserta']= $this->session->userdata('id_peserta');
				$db['maba']=$this->Maba_model;
				$this->Maba_dashboard_model->setdbvar($db);
				$hsl=$this->Maba_dashboard_model->updatedatapil($data);
				echo $hsl;
		  }else{
         	show_error('Not an authorized access !!!');
         }
		}else{
			show_error('Not an authorized access !!!');
		}		
	}

	public function konf()
	{
        if($this->input->is_ajax_request()){
            if($this->input->method()==='post'){                         
		        $data['nm_bank']= $this->input->post('bank');
		                
		        if(!empty($this->input->post('tgltrans'))){
		          $data['tgltrans']= date('Y-m-d', strtotime($this->input->post('tgltrans')));
		        }
		        
		        if(!empty($this->input->post('nm_file1')))
		        {
		         $data['kwitansi']= $this->input->post('nm_file1');
		        }

		        $data['id_peserta']= $this->session->userdata('id_peserta');
				$db['maba']=$this->Maba_model;
				$this->Maba_dashboard_model->setdbvar($db);
				$hsl=$this->Maba_dashboard_model->konf($data);
				echo $hsl;
	    }else{
         	show_error('Not an authorized access !!!');
         }
		}else{
			show_error('Not an authorized access !!!');
		}			
	}

	public function rubahuserpass()
	{   
		 if($this->input->is_ajax_request()){
            if($this->input->method()==='post'){                         
                      
	        if(!empty($this->input->post('user'))){  
	          $data['user']=$this->input->post('user');
	          $data['pass']= md5($this->input->post('pass'));
	        } 

	        $data['id_peserta']= $this->session->userdata('id_peserta');
			$db['maba']=$this->Maba_model;
			$this->Maba_dashboard_model->setdbvar($db);
			$hsl=$this->Maba_dashboard_model->rubahuserpass($data);
			echo $hsl;

          }else{
         	show_error('Not an authorized access !!!');
         }
		}else{
			show_error('Not an authorized access !!!');
		} 

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
