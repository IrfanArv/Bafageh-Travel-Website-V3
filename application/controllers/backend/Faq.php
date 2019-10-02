<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faq extends CI_Controller{
	function __construct(){
        parent::__construct();
        if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
        };
        $this->load->model('m_faq');
    }

    function index(){
		if($this->session->userdata('level')=='1'){ 
            $x['data']=$this->m_faq->TampilFaq();
            $this->backend->display('backend/v_faq',$x);
			$this->load->view('backend/sidebar.php',$x);
			
		}elseif($this->session->userdata('level')=='3'){
            $x['data']=$this->m_faq->TampilFaq();
            $this->backend->display('backend/v_faq',$x);
			$this->load->view('backend/sidepaket.php',$x);			
		}else{
            echo "Halaman tidak ditemukan";
        }	
}

	function simpan(){      
                $title=$this->input->post('title'); 
                $content=$this->input->post('content');
                $this->m_faq->SimpanFaq( $title,$content);
                echo $this->session->set_flashdata('msg','success');
                redirect('backend/faq');       
                }

        function update(){
                $id=$this->input->post('kode');
                $title=$this->input->post('title');
                $content=$this->input->post('content');
                $this->m_faq->UpdateFaq($id, $title,$content);
                echo $this->session->set_flashdata('msg','info');
                redirect('backend/faq');
        }

    function hapus(){
            $id=$this->input->post('kode');
            $this->m_faq->HapusFaq($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/faq');
    }


}
