<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Konfirmasi extends CI_Controller{
    function __construct(){
        parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_orders');
    }
 
    function index(){
		if($this->session->userdata('level')=='1'){ 
            $x['data']=$this->m_orders->get_pembayaran();
		    $this->backend->display('backend/v_confir',$x);
			$this->load->view('backend/sidebar.php',$x);
			
		}elseif($this->session->userdata('level')=='3'){
            $x['data']=$this->m_orders->get_pembayaran();
		$this->backend->display('backend/v_confir',$x);
			$this->load->view('backend/sidepaket.php',$x);			
		}if($this->session->userdata('level')=='4'){
            $x['data']=$this->m_orders->get_pembayaran();
            $this->backend->display('backend/V_confir',$x);
            $this->load->view('backend/sidekasir.php',$x);
    
    }
}


function pembayaran_selesai(){
    if($this->session->userdata('level')=='1'){ 
        $id=$this->input->post('kode');
        $this->m_orders->bayar_selesai($id);
        echo $this->session->set_flashdata('msg','success');
        redirect('backend/orders');
    }elseif($this->session->userdata('level')=='3'){
        $id=$this->input->post('kode');
        $this->m_orders->bayar_selesai($id);
        echo $this->session->set_flashdata('msg','success');
        redirect('backend/orders');	 
    }elseif($this->session->userdata('level')=='5'){
        $id=$this->input->post('kode');
        $this->m_orders->bayar_selesai($id);
        echo $this->session->set_flashdata('msg','success');
        redirect('backend/dashboard');	
    }
}


   
    function hapus_konfirmasi(){
        $kode=$this->input->post('kode');
        $this->m_orders->hapus_bayar($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('backend/konfirmasi');
    }
}
