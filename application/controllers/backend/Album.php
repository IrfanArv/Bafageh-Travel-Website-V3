<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Album extends CI_Controller{
	function __construct(){
        parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_album');
        $this->load->library('upload');
    }
    function index(){
        if($this->session->userdata('level')=='1'){
            $x['data']=$this->m_album->tampil_album();
            $this->load->view('backend/sidebar.php',$x);
            $this->backend->display('backend/v_album',$x);
            
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function simpan_album(){
        $config['upload_path'] = './assets/images/galleri/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|JPG'; //type yang dapat dilevel bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/galleri/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['new_image']= './assets/images/galleri/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $jdl=$this->input->post('judul');

                $this->m_album->SimpanAlbum($jdl,$gambar);
                echo $this->session->set_flashdata('msg','success');
                redirect('backend/album');
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('backend/album');
        }
                     
        }else{
            redirect('backend/album');
        }
    }

    function update_album(){
        $config['upload_path'] = './assets/images/galleri/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|JPG'; //type yang dapat dilevel bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']             = 8000;

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/galleri/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['new_image']= './assets/images/galleri/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $kode=$this->input->post('kode');
                $judul=$this->input->post('judul');

                $this->m_album->update_album_with_img($kode,$judul,$gambar);
                echo $this->session->set_flashdata('msg','info');
                redirect('backend/album');
                        
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('backend/album');
            }       
        }else{
            $kode=$this->input->post('kode');
            $judul=$this->input->post('judul');
            $this->m_album->update_album($kode,$judul);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/album');
        } 

    }
    
    function hapus_album(){
        if($this->session->userdata('level')=='1'){
            $id=$this->input->post('kode');
            $this->m_album->hapus_album($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/album');
        }else{
            echo "Halaman tidak ditemukan";
        }
    }
    
	
}