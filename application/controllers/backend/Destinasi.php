<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Destinasi extends CI_Controller{
	function __construct(){
        parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_destinasi');
    }

function index(){
    if($this->session->userdata('level')=='1'){ 
        $x['data']=$this->m_destinasi->get_all_destinasi();
        $this->backend->display('backend/V_destinasi',$x);
		$this->load->view('backend/sidebar.php',$x);
        
    }elseif($this->session->userdata('level')=='4'){
        $x['data']=$this->m_destinasi->get_all_destinasi();
        $this->backend->display('backend/V_destinasi',$x);
        $this->load->view('backend/sidehotel.php',$x);
    }else{
        echo "Halaman tidak ditemukan";
    }	
}

    function simpan_destinasi(){
            $destinasi=$this->input->post('destinasi');
            $this->m_destinasi->simpan_destinasi($destinasi);
            echo $this->session->set_flashdata('msg','success');
            redirect('backend/destinasi');
       
    }
    function update_destinasi(){
       
            $id=$this->input->post('kode');
            $destinasi=$this->input->post('destinasi');
            $this->m_destinasi->update_destinasi($id,$destinasi);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/destinasi');
       
    }
    function hapus_destinasi(){
       
            $id=$this->input->post('kode');
            $this->m_destinasi->hapus_destinasi($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/destinasi');
        
    }
	
}