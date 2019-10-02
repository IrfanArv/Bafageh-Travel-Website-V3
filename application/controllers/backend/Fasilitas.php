<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fasilitas extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_fasilitas');
        $this->load->library('upload');
    }
    function index(){
	    if($this->session->userdata('level')=='1'){
	    	$x['data']=$this->m_fasilitas->tampil_fasilitas();
			$this->backend->display('backend/v_fasilitas',$x);
			$this->load->view('backend/sidebar.php',$x);
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

		function simpan_fasilitas(){
				if($this->session->userdata('level')=='1'){
						$content=$this->input->post('content');
						$this->m_fasilitas->simpan_fasilitas($content);
						echo $this->session->set_flashdata('msg','success');
						redirect('backend/fasilitas');
				}else{
						echo "Halaman tidak ditemukan";
				}
		}

		function update_fasilitas(){
        if($this->session->userdata('level')=='1'){
            $id=$this->input->post('kode');
						$content=$this->input->post('content');
            $this->m_fasilitas->update_fasilitas($id,$content);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/fasilitas');
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function hapus_fasilitas(){
	    if($this->session->userdata('level')=='1'){
	        $id=$this->input->post('kode');
	        $this->m_fasilitas->hapus_fasilitas($id);
	        echo $this->session->set_flashdata('msg','success-hapus');
	        redirect('backend/fasilitas');
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

}
