<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {
	
	public function index()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){
          
           $db['maba']=$this->Maba_model;
		   $db['priode']=$this->Priode_model;
		   $this->Admin_dashboard_model->setdbvar($db);
		   $data=$this->Admin_dashboard_model->rekap_data();
		   $data['menu_idx']=0;           
		   $this->load->view('admin_dashboard',$data);
		}else{
			redirect('/Admin_dashboard/login');
		}

	}

    public function login()
	{
		$un=$this->input->post('un');
        $psw=$this->input->post('psw');
        $login = $this->input->post('login');

		$db['user']=$this->User_model;
		$db['log']=$this->Log_user_model;	
		$this->Admin_dashboard_model->setdbvar($db);
		$data=$this->Admin_dashboard_model->login($login,$un,$psw);
        if(($login=='login') and ($data['msg']=='') )
		{
          redirect('/Admin_dashboard/index');
		}else{
		  $this->load->view('admin_login',$data);
		} 

		
	}

    public function baca_data_maba()
    {
          $id_peserta=$this->input->post('id_peserta'); 

          $db['fakultas']=$this->Fakultas_model;
		  $db['prodi']=$this->Prodi_model;
		  $db['maba']=$this->Maba_model;
		  $db['priode']=$this->Priode_model;
		  $this->Admin_dashboard_model->setdbvar($db);
		  $data=$this->Admin_dashboard_model->baca_data_maba($id_peserta);
          
		  echo $this->load->view('modal',$data,true);

    }

    public function hapus_data_maba()
    {
          $id_peserta=$this->input->post('id_peserta'); 
          
		  $db['maba']=$this->Maba_model;
		  $this->Admin_dashboard_model->setdbvar($db);
		  $data=$this->Admin_dashboard_model->hapus_data_maba($id_peserta);	  

    }

    public function tambah_data_wisudawan()
    {
          

          $db['fakultas']=$this->Fakultas_model;
		  $db['prodi']=$this->Prodi_model;
		  $this->Admin_dashboard_model->setdbvar($db);
		  $data=$this->Admin_dashboard_model->tambah_data_wisudawan();
          
		  echo $this->load->view('modal1',$data,true);

    }

    public function addberita()
    {
    	$berita=$this->input->post('berita');
    	$db['berita']=$this->Berita_model;
		$this->Admin_dashboard_model->setdbvar($db);
		$this->Admin_dashboard_model->simpan_berita($berita);

    }

    public function delete_berita()
    {
    	$id_berita=$this->input->post('id_berita');
    	$db['berita']=$this->Berita_model;
		$this->Admin_dashboard_model->setdbvar($db);
		$this->Admin_dashboard_model->delete_berita($id_berita);

    }

    public function edit_berita()
    {
    	$id_berita=$this->input->post('id_berita');
    	$db['berita']=$this->Berita_model;
		$this->Admin_dashboard_model->setdbvar($db);
		$html = $this->Admin_dashboard_model->edit_berita($id_berita);
        echo $html;
    }

    public function save_berita()
    {
    	$data['id_berita']=$this->input->post('id_berita');
    	$data['isi_berita']=$this->input->post('isi_berita');
    	
    	$db['berita']=$this->Berita_model;
		$this->Admin_dashboard_model->setdbvar($db);
		$this->Admin_dashboard_model->save_berita($data);
        
    }

	 public function berita()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){
		   $db['priode']=$this->Priode_model;
		   $db['berita']=$this->Berita_model;
		   $this->Admin_dashboard_model->setdbvar($db);
		   $data=$this->Admin_dashboard_model->baca_berita();
		   $data['menu_idx']=2; 
		   $this->load->view('admin_berita',$data);
		 }else{
			redirect('/Admin_dashboard/login');
		}  
	}

	public function data()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){
		  $db['maba']=$this->Maba_model;
		  $db['priode']=$this->Priode_model;
		  $this->Admin_dashboard_model->setdbvar($db);
		  $data = $this->Admin_dashboard_model->baca_data();		  
          $data['menu_idx']=3; 
		  $this->load->view('admin_maba_data',$data);
		}else{
			redirect('/Admin_dashboard/login');
		}


	}

	public function log()
	{
      $logged_in = $this->session->userdata('logged_in');
		if($logged_in){  
	        $db['log_admin']=$this->Log_user_model;
			$db['log_maba']=$this->Log_maba_model;
			$db['maba']=$this->Maba_model;
			$this->Admin_dashboard_model->setdbvar($db);
	        $data=$this->Admin_dashboard_model->baca_log();
	        $data['menu_idx']=1;
			$this->load->view('admin_log',$data);
		}else{
			redirect('/Admin_dashboard/login');
		}	
	}

	public function cetak_verifikasi()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){ 

			//load our new PHPExcel library
			$this->load->library('excel');

			$col_width=array("A"=>5.00,"B"=>12.00,"C"=>39.00,"D"=>14.00,"E"=>39.00);

			$tmp_font = $this->excel->build_font(true,'Times New Roman',12);

			$tmp_borders = $this->excel->build_borders(PHPExcel_Style_Border::BORDER_THIN,PHPExcel_Style_Border::BORDER_MEDIUM);

			$jdl=array(array('add'=>'A1','txt'=>'DATA CALON WISUDAWAN','merge'=>true,'madd'=>'A1:E1','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font),
	                   array('add'=>'A','row'=>4,'txt'=>'NO','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font,'wbrdawl'=>'A','wbrdakh'=>'E','wbrdjml'=>0,'wborders'=>$tmp_borders),
	                   array('add'=>'B4','txt'=>'NIM','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font),  
	                   array('add'=>'C4','txt'=>'NAMA','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font),
	                   array('add'=>'D4','txt'=>'VERIFIKASI','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font),
	                   array('add'=>'E4','txt'=>'KETERANGAN','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font)
					   );

			$isi=array(
	                   array('add'=>'A','row'=>0,'txt'=>'','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font,'wbrdawl'=>'A','wbrdakh'=>'E','wbrdjml'=>0,'wborders'=>$tmp_borders),
	                   array('add'=>'B','row'=>0,'txt'=>'','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font),  
	                   array('add'=>'C','row'=>0,'txt'=>'','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,'font'=>$tmp_font),
	                   array('add'=>'D','row'=>0,'txt'=>'','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,'font'=>$tmp_font),
	                   array('add'=>'E','row'=>0,'txt'=>'','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,'font'=>$tmp_font)
					   );

			$nm_prodi=array(
	                   array('add'=>'A','row'=>0,'txt'=>'','merge'=>true,'mawl'=>'A','makh'=>'E','mjml'=>0,'v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,'font'=>$tmp_font,'wbrdawl'=>'A','wbrdakh'=>'E','wbrdjml'=>0,'wborders'=>$tmp_borders)	 
					   );

			
            $db['wisudawan']=$this->Wisudawan_model;
            $db['priode']=$this->Priode_model;
			$this->Admin_dashboard_model->setdbvar($db);
	        $data=$this->Admin_dashboard_model->cetak_layak();

			$this->excel->setActiveSheetIndex(0);
			$this->excel->setColumnWidth($col_width);
			$this->excel->tulis_data($jdl);

			if (!empty($data)) {
				$i=5;
				$j=1;
				$prodi='';
				foreach ($data as $row) {
				  if(empty($prodi) or ($prodi!=$row['nm_prodi'])){
                    $nm_prodi[0]['row']=$i++;
				    $nm_prodi[0]['txt']='Prodi. '.$row['nm_prodi'];                   
                    $this->excel->tulis_data($nm_prodi); 
                    $prodi=$row['nm_prodi'];
				  }

				  $isi[0]['row']=$i++;
				  $isi[0]['txt']=$j++;
				  $isi[1]['row']=$i-1;
				  $isi[1]['txt']=strtoupper($row['nim']);
				  $isi[2]['row']=$i-1;
				  $isi[2]['txt']=strtoupper($row['nama']);
				  $this->excel->tulis_data($isi);					
				}
			}

			 
			$filename='form_verifikasi_wisudawan.xls'; //save our workbook as this file name
			header('Content-Type: application/vnd.ms-excel'); //mime type
			header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
			header('Cache-Control: max-age=0'); //no cache
			            
			//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
			//if you want to save it as .XLSX Excel 2007 format
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
			//force user to download the Excel file without writing it to server's HD
			$objWriter->save('php://output');

		}else{
			redirect('/Admin_dashboard/login');
		}
	}

	public function cetak_wisudawan()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){ 

			//load our new PHPExcel library
			$this->load->library('excel');

			$col_width=array("A"=>5.00,"B"=>12.00,"C"=>39.00,"D"=>14.00,"E"=>39.00);

			$tmp_font = $this->excel->build_font(true,'Times New Roman',12);

			$tmp_borders = $this->excel->build_borders(PHPExcel_Style_Border::BORDER_THIN,PHPExcel_Style_Border::BORDER_MEDIUM);

			$jdl=array(array('add'=>'A1','txt'=>'DATA WISUDAWAN','merge'=>true,'madd'=>'A1:E1','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font),
	                   array('add'=>'A','row'=>4,'txt'=>'NO','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font,'wbrdawl'=>'A','wbrdakh'=>'E','wbrdjml'=>0,'wborders'=>$tmp_borders),
	                   array('add'=>'B4','txt'=>'NIM','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font),  
	                   array('add'=>'C4','txt'=>'NAMA','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font),
	                   array('add'=>'D4','txt'=>'VERIFIKASI','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font),
	                   array('add'=>'E4','txt'=>'KETERANGAN','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font)
					   );

			$isi=array(
	                   array('add'=>'A','row'=>0,'txt'=>'','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font,'wbrdawl'=>'A','wbrdakh'=>'E','wbrdjml'=>0,'wborders'=>$tmp_borders),
	                   array('add'=>'B','row'=>0,'txt'=>'','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'font'=>$tmp_font),  
	                   array('add'=>'C','row'=>0,'txt'=>'','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,'font'=>$tmp_font),
	                   array('add'=>'D','row'=>0,'txt'=>'','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,'font'=>$tmp_font),
	                   array('add'=>'E','row'=>0,'txt'=>'','v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,'font'=>$tmp_font)
					   );

			$nm_prodi=array(
	                   array('add'=>'A','row'=>0,'txt'=>'','merge'=>true,'mawl'=>'A','makh'=>'E','mjml'=>0,'v'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,'h'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,'font'=>$tmp_font,'wbrdawl'=>'A','wbrdakh'=>'E','wbrdjml'=>0,'wborders'=>$tmp_borders)	 
					   );

			
            $db['wisudawan']=$this->Wisudawan_model;
            $db['priode']=$this->Priode_model;
			$this->Admin_dashboard_model->setdbvar($db);
	        $data=$this->Admin_dashboard_model->cetak_wisudawan();

			$this->excel->setActiveSheetIndex(0);
			$this->excel->setColumnWidth($col_width);
			$this->excel->tulis_data($jdl);

			if (!empty($data)) {
				$i=5;
				$j=1;
				$prodi='';
				foreach ($data as $row) {
				  if(empty($prodi) or ($prodi!=$row['nm_prodi'])){
                    $nm_prodi[0]['row']=$i++;
				    $nm_prodi[0]['txt']='Prodi. '.$row['nm_prodi'];                   
                    $this->excel->tulis_data($nm_prodi); 
                    $prodi=$row['nm_prodi'];
				  }

				  $isi[0]['row']=$i++;
				  $isi[0]['txt']=$j++;
				  $isi[1]['row']=$i-1;
				  $isi[1]['txt']=strtoupper($row['nim']);
				  $isi[2]['row']=$i-1;
				  $isi[2]['txt']=strtoupper($row['nama']);
				  $this->excel->tulis_data($isi);					
				}
			}

			 
			$filename='data_wisudawan.xls'; //save our workbook as this file name
			header('Content-Type: application/vnd.ms-excel'); //mime type
			header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
			header('Cache-Control: max-age=0'); //no cache
			            
			//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
			//if you want to save it as .XLSX Excel 2007 format
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
			//force user to download the Excel file without writing it to server's HD
			$objWriter->save('php://output');

		}else{
			redirect('/Admin_dashboard/login');
		}
	}

	public function logout()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){
		  $user_name = $this->session->userdata('user_name');
		  $lg_time = $this->session->userdata('lg_time');

		  $db['log']=$this->Log_user_model;
		  $this->Admin_dashboard_model->setdbvar($db);
		  $this->Admin_dashboard_model->logout($user_name,$lg_time);
		  
		  $array_items = array('user_name','lg_time','logged_in');
          $this->session->unset_userdata($array_items);
          
		}
		redirect('/Main_dashboard/');
		


	}

	public function do_upload()
	{
		header('Content-type: application/json');
        
                $nm_file = 'temp_admin_'.date('YmdHis');

                $config['upload_path']          = './assets/photo';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1024;
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

        $data['ket']=$this->input->post('keterangan');
        $data['ver']= $this->input->post('verifikasi');
        $data['tgl_ver']=date('Y-m-d H:i:s');
        $data['admin_name']=$this->session->userdata('user_name');

       // $data['ipk']= $this->input->post('ipk');
        
        $data['jdl_skripsi']= $this->input->post('jdlskripsi');
        
       // if(!empty($this->input->post('tgllls'))){
      //    $data['tgl_lls']= date('Y-m-d', strtotime($this->input->post('tgllls')));
       // }
        
        if(!empty($this->input->post('tglbyr'))){
          $data['tgl_byr']= date('Y-m-d', strtotime($this->input->post('tglbyr')));
        }
        
        if(!empty($this->input->post('nm_file1')))
        {
         $data['kwitansi']= $this->input->post('nm_file1');
        }

        $data['id_wisuda']= $this->input->post('id_wisuda');
		$db['wisudawan']=$this->Wisudawan_model;
		$this->Admin_dashboard_model->setdbvar($db);
		$hsl=$this->Admin_dashboard_model->updatedatawisudawan($data);
		echo $hsl;
	}

	public function tambahdatawisudawan()
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

        //$data['ket']=$this->input->post('keterangan');
        //$data['ver']= $this->input->post('verifikasi');
        //$data['tgl_ver']=date('Y-m-d H:i:s');
        //$data['admin_name']=$this->session->userdata('user_name');

       // $data['ipk']= $this->input->post('ipk');
        
        $data['jdl_skripsi']= $this->input->post('jdlskripsi');
        
       // if(!empty($this->input->post('tgllls'))){
      //    $data['tgl_lls']= date('Y-m-d', strtotime($this->input->post('tgllls')));
       // }
        
        if(!empty($this->input->post('tglbyr'))){
          $data['tgl_byr']= date('Y-m-d', strtotime($this->input->post('tglbyr')));
        }
        
        if(!empty($this->input->post('nm_file1')))
        {
         $data['kwitansi']= $this->input->post('nm_file1');
        }

        
        if($this->Priode_model->istutup()){
        	$tmp = $this->Priode_model->priode_aktif();
            $data['tgl_input']=$tmp['akhir'];
            $data['tgl_update']=$tmp['akhir'];
        }else{
        	$data['tgl_input']=date('Y-m-d H:i:s');
            $data['tgl_update']=date('Y-m-d H:i:s');
        }


        $data['id_wisuda']= $this->input->post('id_wisuda');
		$db['wisudawan']=$this->Wisudawan_model;
		$this->Admin_dashboard_model->setdbvar($db);
		$hsl=$this->Admin_dashboard_model->tambahdatawisudawan($data);
		echo $hsl;
	}

	public function updatephoto()
	{
      $id_wisuda= $this->input->post('id_wisuda');
      $photo= $this->input->post('photo');
      $db['wisudawan']=$this->Wisudawan_model;
	  $this->Admin_dashboard_model->setdbvar($db);
	  $this->Admin_dashboard_model->updatephoto($id_wisuda,$photo);
	}

	public function deletephoto()
	{      
      $photo= $this->input->post('photo');
      $this->Admin_dashboard_model->deletephoto($photo);
	}

	public function updatekwitansi()
	{
	  $id_wisuda= $this->input->post('id_wisuda');
      $kwitansi= $this->input->post('kwitansi');
	  $db['wisudawan']=$this->Wisudawan_model;
	  $this->Admin_dashboard_model->setdbvar($db);	
	  $this->Admin_dashboard_model->updatekwitansi($id_wisuda,$kwitansi);
	}

	public function setting()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in){ 		
            $db['priode']=$this->Priode_model;
            $db['user']=$this->User_model;
            $db['fak']=$this->Fakultas_model;
            $db['prodi']=$this->Prodi_model;
			$id = $this->session->userdata('user_name');
			$this->Admin_dashboard_model->setdbvar($db);
            $data = $this->Admin_dashboard_model->baca_setting($id);
            $data['menu_idx']=4;
			$this->load->view('admin_setting',$data);
		}else{
			redirect('/Admin_dashboard/login');
		}
	}

	public function add_priode_admin()
	{
        $data['judul']='Add Tanggal Daftar dan Tanggal Wisuda';
		echo $this->load->view('priode_modal',$data,true);
	}

	public function edit_priode_admin()
	{
        $id= $this->input->post('id');
        $db['priode']=$this->Priode_model;
        $this->Admin_dashboard_model->setdbvar($db);
        $data = $this->Admin_dashboard_model->baca_priode($id);
        $data['judul']='Edit Tanggal Daftar dan Tanggal Wisuda';
		echo $this->load->view('priode_modal',$data,true);
	}

	public function savedatapriode()
	{
		$data['id']=$this->input->post('id');
		$data['wisuda']=$this->input->post('tglwisuda');
		$data['daftar']=$this->input->post('tgldaftar');
		$data['aktif']=$this->input->post('aktif');
		
		$db['priode']=$this->Priode_model;
		$this->Admin_dashboard_model->setdbvar($db);
        if(empty($data['id'])){
         echo $this->Admin_dashboard_model->insertdatapriode($data);
        }else{
         echo $this->Admin_dashboard_model->updatedatapriode($data);
        }


	}

	public function deletedatapriode()
	{
      $id= $this->input->post('id');
      $db['priode']=$this->Priode_model;
	  $this->Admin_dashboard_model->setdbvar($db);
	  $this->Admin_dashboard_model->deletedatapriode($id);
	}

	public function add_user_admin()
	{
	    $data['judul']='Add Admin';
		echo $this->load->view('user_modal',$data,true);	
	}

	public function edit_user_admin()
	{
        $id= $this->input->post('id');
        $db['user']=$this->User_model;
        $this->Admin_dashboard_model->setdbvar($db);
        $data = $this->Admin_dashboard_model->baca_user($id);
        $data['judul']='Edit Admin';
		echo $this->load->view('user_modal',$data,true);
	}

	public function saveuserdata()
	{
        $data['id']=$this->input->post('id');
        $data['user']=$this->input->post('user');
		$data['pass']=$this->input->post('pass');

        $db['user']=$this->User_model;
		$this->Admin_dashboard_model->setdbvar($db);
        if(empty($data['id'])){
           echo $this->Admin_dashboard_model->insertuserdata($data);
        }else{
           echo $this->Admin_dashboard_model->updateuserdata($data);
        }		
		
	}

	public function deleteuserdata()
	{
      $id= $this->input->post('id');
      $db['user']=$this->User_model;
	  $this->Admin_dashboard_model->setdbvar($db);
	  $this->Admin_dashboard_model->deleteuserdata($id);
	}

	public function add_fak_admin()
	{
        $data['judul']='Add Fakultas';
		echo $this->load->view('fak_modal',$data,true);
	}

	public function edit_fak_admin()
	{
	    $id= $this->input->post('id');
        $db['fakultas']=$this->Fakultas_model;
        $this->Admin_dashboard_model->setdbvar($db);
        $data = $this->Admin_dashboard_model->baca_fak($id);
        $data['judul']='Edit Fakultas';
		echo $this->load->view('fak_modal',$data,true);	
	}

	public function savefakdata()
	{
        $data['id_old']=$this->input->post('id_old');
        $data['id']=$this->input->post('id');
        $data['nm']=$this->input->post('nm');
		$data['urut']=$this->input->post('urut');
        
        $db['fakultas']=$this->Fakultas_model;
		$this->Admin_dashboard_model->setdbvar($db);
        if(empty($data['id_old'])){
           echo $this->Admin_dashboard_model->insertfakdata($data);
        }else{
           echo $this->Admin_dashboard_model->updatefakdata($data);
        }
	}

	public function deletefakdata()
	{
	  $id= $this->input->post('id');
      $db['fakultas']=$this->Fakultas_model;
	  $this->Admin_dashboard_model->setdbvar($db);
	  $this->Admin_dashboard_model->deletefakdata($id);	
	}

	public function add_prodi_admin()
	{
        $data['judul']='Add Prodi';
        $data['drop_fak']=$this->Fakultas_model->getdropdownfak();
		echo $this->load->view('prodi_modal',$data,true);
	}

	public function edit_prodi_admin()
	{
	    $id= $this->input->post('id');
        $db['prodi']=$this->Prodi_model;
        $db['fakultas']=$this->Fakultas_model;
        $this->Admin_dashboard_model->setdbvar($db);
        $data = $this->Admin_dashboard_model->baca_prodi($id);
        $data['judul']='Edit Prodi';
		echo $this->load->view('prodi_modal',$data,true);	
	}

	public function saveprodidata()
	{
        $data['id_old']=$this->input->post('id_old');
        $data['id']=$this->input->post('id');
        $data['nm']=$this->input->post('nm');
		$data['urut']=$this->input->post('urut');
		$data['fak']=$this->input->post('fak');
        

        $db['prodi']=$this->Prodi_model;
		$this->Admin_dashboard_model->setdbvar($db);
        if(empty($data['id_old'])){
           echo $this->Admin_dashboard_model->insertprodidata($data);
        }else{
           echo $this->Admin_dashboard_model->updateprodidata($data);
        }
	}

	public function deleteprodidata()
	{
	  $id= $this->input->post('id');
      $db['prodi']=$this->Prodi_model;
	  $this->Admin_dashboard_model->setdbvar($db);
	  $this->Admin_dashboard_model->deleteprodidata($id);	
	}


}
