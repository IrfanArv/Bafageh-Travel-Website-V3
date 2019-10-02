<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends CI_Controller{
	function __construct(){
		parent::__construct();

		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
    	$this->load->model('m_kontak');
		
		
	}

	function index(){
		$this->frontend->display('front/v_kontak');
	}
 
	function kirim_pesan(){
        $nama=str_replace("'", "", $this->input->post('xnama',TRUE));
        $email=str_replace("'", "", $this->input->post('xemail',TRUE));
        $kontak=str_replace("'", "", $this->input->post('xkontak',TRUE));
        $pesan=str_replace("'", "", $this->input->post('xpesan',TRUE));
        $this->m_kontak->kirim_pesan($nama,$email,$kontak,$pesan);
		echo $this->session->set_flashdata('msg','success');
		redirect('contact');
		
    }
}
