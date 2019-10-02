<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hotel_fasilitas extends CI_Controller{
	function __construct(){
        parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('M_hotelfasilitas');
        $this->load->library('upload');
    }

    function index(){
		if($this->session->userdata('level')=='1'){ 
            $x['data']=$this->M_hotelfasilitas->get_fasilitas();
            $this->load->view('backend/sidebar.php',$x);
            $this->backend->display('backend/V_fasilitas_hotel',$x);
			
		}elseif($this->session->userdata('level')=='4'){
            $x['data']=$this->M_hotelfasilitas->get_fasilitas();
            $this->load->view('backend/sidehotel.php',$x);
            $this->backend->display('backend/V_fasilitas_hotel',$x);
		}else{
			echo "Halaman tidak ditemukan";
		}	
}

    function simpan_fasilitas(){
        $config['upload_path'] = './uploads/fasilitas_hotel/'; 
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|JPG'; 
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./uploads/fasilitas_hotel/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['new_image']= './uploads/fasilitas_hotel/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $nama=$this->input->post('nama');

                $this->M_hotelfasilitas->simpan_fasilitas($nama,$gambar); 
                echo $this->session->set_flashdata('msg','success');
                redirect('backend/hotel_fasilitas');
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('backend/hotel_fasilitas');
        }
                     
        }else{
            redirect('backend/hotel_fasilitas');
        }
    }

    function update_fasilitas(){
        $config['upload_path'] = './uploads/fasilitas_hotel/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|JPG'; //type yang dapat dilevel bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']             = 8000;

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./uploads/fasilitas_hotel/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['new_image']= './uploads/fasilitas_hotel/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $kode=$this->input->post('kode');
                $nama=$this->input->post('nama');

                $this->M_hotelfasilitas->update_fasilitas_img($kode,$nama,$gambar);
                echo $this->session->set_flashdata('msg','info');
                redirect('backend/hotel_fasilitas');
                        
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('backend/hotel_fasilitas');
            }       
        }else{
            $kode=$this->input->post('kode');
            $nama=$this->input->post('nama');
            $this->M_hotelfasilitas->update_fasilitas($kode,$nama);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/hotel_fasilitas');
        } 

    }
    
    function hapus_fasilitas(){
        if($this->session->userdata('level')=='1'){
            $id=$this->input->post('kode');
            $this->M_hotelfasilitas->hapus_fasilitas($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/hotel_fasilitas');
        }else{
            echo "Halaman tidak ditemukan";
        }
    }
    
	
}