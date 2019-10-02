<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends CI_Controller{
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
            $x['data']=$this->m_orders->get_orders();
		$this->backend->display('backend/v_orders',$x);;
			$this->load->view('backend/sidebar.php',$x);
			
		}elseif($this->session->userdata('level')=='3'){ 
            $x['data']=$this->m_orders->get_orders();
            $this->backend->display('backend/v_orders',$x);
			$this->load->view('backend/sidepaket.php',$x);			
		}if($this->session->userdata('level')=='5'){
            $x['data']=$this->m_orders->get_orders();
		    $this->backend->display('backend/v_orders',$x);
            $this->load->view('backend/sidekasir.php',$x);
    
    }
}

    function pembayaran_selesai(){
        $id=$this->uri->segment(4);
        $this->m_orders->bayar_selesai($id);
        echo $this->session->set_flashdata('msg','success');
        redirect('backend/orders');
    }
    function edit_orders(){
        $kode=$this->input->post('kode');
        $dewasa=$this->input->post('dewasa');
        $anaks=$this->input->post('anaks');
        $this->m_orders->edit_orders($kode,$dewasa,$anaks);
        echo $this->session->set_flashdata('msg','info');
        redirect('backend/orders');
    }
    function hapus_order(){
        $kode=$this->input->post('kode');
        $this->m_orders->hapus_orders($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('backend/orders');
    }
}
