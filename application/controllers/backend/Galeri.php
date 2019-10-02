<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Galeri extends CI_Controller{
	function __construct(){
        parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_galeri');
        $this->load->library('upload');
    }
    function index(){
        if($this->session->userdata('level')=='1'){
        	$x['data']=$this->m_galeri->tampil_galeri();
            $x['alm']=$this->m_galeri->get_album();
            $this->backend->display('backend/v_galeri',$x);
            $this->load->view('backend/sidebar.php',$x);
        }else{
            echo "Halaman tidak ditemukan";
        }
    }
    
    function simpan_galeri(){
        $config['upload_path'] = './assets/images/gallery'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat dilevel bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/gallery'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['max_size']  = '8000';
                $config['new_image']= './assets/images/gallery'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $jdl=$this->input->post('judul');
                $album=$this->input->post('album');
                $harga=$this->input->post('harga');

                $this->m_galeri->SimpanGaleri($jdl,$album,$gambar,$harga);
                echo $this->session->set_flashdata('msg','success');
                redirect('backend/galeri');
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('backend/galeri');
        }
                     
        }else{
            redirect('backend/galeri');
        }
    }

    function update_galeri(){
        $config['upload_path'] = './assets/images/gallery'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat dilevel bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/gallery'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['max_size']  = '8000';
                $config['new_image']= './assets/images/gallery'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $kode=$this->input->post('kode');
                $jdl=$this->input->post('judul');
                $album=$this->input->post('album');
                $harga=$this->input->post('harga');

                $this->m_galeri->update_galeri_with_img($kode,$jdl,$album,$gambar,$harga);
                echo $this->session->set_flashdata('msg','info');
                redirect('backend/galeri');
                        
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('backend/galeri');
            }       
        }else{
            $kode=$this->input->post('kode');
            $jdl=$this->input->post('judul');
            $album=$this->input->post('album');
            $harga=$this->input->post('harga');
            $this->m_galeri->update_galeri($kode,$jdl,$album,$harga);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/galeri');
        } 

    }

    function hapus_galeri(){
        
            $id=$this->input->post('kode');
            $this->m_galeri->hapus_photo($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/galeri');
        
    }
    
	
}