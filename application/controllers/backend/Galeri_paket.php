<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Galeri_paket extends CI_Controller{
	function __construct(){
            parent::__construct();
            if(!isset($_SESSION['logged_in'])){
                $url=base_url('backoffice');
                redirect($url);
            };
        $this->load->model('m_galket');
        $this->load->library('upload');
    }

    function index(){
		if($this->session->userdata('level')=='1'){ 
            $x['data']=$this->m_galket->tampil_galket();
            $x['pkt']=$this->m_galket->get_paket();
            $this->backend->display('backend/v_galeri_paket',$x);
			$this->load->view('backend/sidebar.php',$x);
			
		}elseif($this->session->userdata('level')=='3'){
            $x['data']=$this->m_galket->tampil_galket();
            $x['pkt']=$this->m_galket->get_paket();
            $this->backend->display('backend/v_galeri_paket',$x);
			$this->load->view('backend/sidepaket.php',$x);			
		}else{
            echo "Halaman tidak ditemukan";
        }	
}

    function simpan_galeri(){
        $config['upload_path'] = './assets/images/paket/galeri_paket'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya


        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
           
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/paket/galeri_paket'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['max_size']  = '8000';
								$config['quality']= '100%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './assets/images/paket/galeri_paket'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $paket=$this->input->post('paket');

                $this->m_galket->SimpanGaleri($paket,$gambar);
                echo $this->session->set_flashdata('msg','success');
                redirect('backend/galeri_paket');
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('backend/galeri_paket');
        }

        }else{
            redirect('backend/galeri_paket');
        }
    }
             
    

    function update_galeri(){
        $config['upload_path'] = './assets/images/paket/galeri_paket'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/paket/galeri_paket'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['max_size']  = '8000';
				$config['quality']= '100%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './assets/images/paket/galeri_paket'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

				$kode=$this->input->post('kode');
                $gambar=$gbr['file_name'];
                $paket=$this->input->post('paket');

                $this->m_galket->update_galeri_with_img($kode,$gambar,$paket);
                echo $this->session->set_flashdata('msg','info');
                redirect('backend/galeri_paket');

            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('backend/galeri_paket');
            }
        }else{
            $kode=$this->input->post('kode');
            $paket=$this->input->post('paket');
            $this->m_galket->update_galeri($kode,$paket);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/galeri_paket');
        } 


    }

    function hapus_galeri(){
       
            $id=$this->input->post('kode');
            $this->m_galket->hapus_photo($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/galeri_paket');
        
    }


}
