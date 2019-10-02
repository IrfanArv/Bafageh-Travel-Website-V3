<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Valas extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('tgl_indo');
        if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
        };
        $this->load->model('m_valas');
        $this->load->library('upload');
	}
   	
	function index(){
		
            $x['data']=$this->m_valas->tampil_valas();
			$x['tgl_update']=$this->m_valas->get_tgl(true);
	        $this->backend->display('backend/v_valas',$x);
			$this->load->view('backend/sidebar.php',$x);
			
	}

    function simpan_valas(){
    	$config['upload_path'] = './assets/images/valas/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|svg'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	        	$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/images/valas/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['new_image']= './assets/images/valas/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
                $currency=$this->input->post('currency');
				$price=$this->input->post('price');
				$updated=$this->input->post('updated');

				$this->m_valas->SimpanValas($currency,$price,$gambar,$updated);
				echo $this->session->set_flashdata('msg','success');
				redirect('backend/dashboard');
		}else{
	        echo $this->session->set_flashdata('msg','warning');
	        redirect('backend/dashboard');
	    }
	                 
	    }else{
			redirect('backend/dashboard');
		}
    }

    function update_valas(){
	    $config['upload_path'] = './assets/images/valas/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|svg'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	            $gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/images/valas/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['new_image']= './assets/images/valas/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
	            $kode=$this->input->post('kode');
                $currency=$this->input->post('currency');
                $price=$this->input->post('price');

				$this->m_valas->update_valas_with_img($kode,$currency,$price,$gambar);
				echo $this->session->set_flashdata('msg','info');
				redirect('backend/dashboard');
	                    
	    	}else{
	        	echo $this->session->set_flashdata('msg','warning');
	        	redirect('backend/dashboard'); 
	        }       
	    }else{
			$kode=$this->input->post('kode');
            $currency=$this->input->post('currency');
            $price=$this->input->post('price');
			$this->m_valas->update_valas_no_img($kode,$currency,$price);
			echo $this->session->set_flashdata('msg','info');
			redirect('backend/dashboard');
	    } 

	}

    function hapus_valas(){
	    
	        $id=$this->input->post('kode');
	        $this->m_valas->hapus_valas($id);
	        echo $this->session->set_flashdata('msg','success-hapus');
	        redirect('backend/dashboard');
	   
    }

}