<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inbox extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('backend');
		if($this->session->userdata('logged_in') !=TRUE){
            $url=base_url('backoffice');
            redirect($url);
        };
		$this->load->model('m_kontak');
	}


	function index(){
		if($this->session->userdata('level')=='1'){ 
            $this->m_kontak->update_status_kontak();
		$x['data']=$this->m_kontak->get_all_inbox();
		$this->backend->display('backend/v_inbox',$x); 
			$this->load->view('backend/sidebar.php',$x);
			
		}elseif($this->session->userdata('level')=='3'){
			$this->m_kontak->update_status_kontak();
			$x['data']=$this->m_kontak->get_all_inbox();
			$this->backend->display('backend/v_inbox',$x); 
			$this->load->view('backend/sidepaket.php',$x);			
		}if($this->session->userdata('level')=='4'){
			$this->m_kontak->update_status_kontak();
			$x['data']=$this->m_kontak->get_all_inbox();
			$this->backend->display('backend/v_inbox',$x); 
			$this->load->view('backend/sidehotel.php',$x);	
        }	
}

	function hapus_inbox(){
		$kode=$this->input->post('kode');
		$this->m_kontak->hapus_kontak($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('backend/inbox');
	}
}