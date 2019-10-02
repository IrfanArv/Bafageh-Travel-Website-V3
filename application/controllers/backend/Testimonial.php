<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testimonial extends CI_Controller{
    function __construct(){
        parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_testimoni');
    }
    function index(){
        if($this->session->userdata('level')=='1'){
        $x['data']=$this->m_testimoni->get_testimoni();
        $this->backend->display('backend/v_testimonial',$x);
        $this->load->view('backend/sidebar.php',$x);
         }else{
        echo "Halaman tidak ditemukan";
         }
    }
    function publish(){
        $id=$this->uri->segment(4);
        $this->m_testimoni->publish($id);
        echo $this->session->set_flashdata('msg','info');
        redirect('backend/testimonial');
    }
    
    function hapus_testimoni(){
        $kode=$this->input->post('kode');
        $this->m_testimoni->hapus_testimoni($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('backend/testimonial');
    }
}
