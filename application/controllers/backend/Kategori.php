<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends CI_Controller{
	function __construct(){
        parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_kategoripkt');
    }

    function index(){
		if($this->session->userdata('level')=='1'){ 
            $x['data']=$this->m_kategoripkt->kategori();
            $this->backend->display('backend/v_kategori',$x);
			$this->load->view('backend/sidebar.php',$x);
        }elseif($this->session->userdata('level')=='3'){
            $x['data']=$this->m_kategoripkt->kategori();
            $this->backend->display('backend/v_kategori',$x);
			$this->load->view('backend/sidepaket.php',$x);
        }	
}

    function simpan_kategori(){
            $kategori=$this->input->post('kategori');
            $this->m_kategoripkt->simpan_kategori($kategori);
            echo $this->session->set_flashdata('msg','success');
            redirect('backend/kategori');
       
    }
    function update_kategori(){
       
            $id=$this->input->post('kode');
            $kategori=$this->input->post('kategori');
            $this->m_kategoripkt->edit_kategori($id,$kategori);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/kategori');
       
    }
    function hapus_kategori(){
       
            $id=$this->input->post('kode');
            $this->m_kategoripkt->hapus_kategori($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/kategori');
        
    }
	
}