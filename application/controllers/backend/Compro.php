<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Compro extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_compro');
        $this->load->library('upload');
    }
    function index(){
	    if($this->session->userdata('level')=='1'){
	    	$x['data']=$this->m_compro->tampil_compro();
			$this->backend->display('backend/v_compro',$x);
			$this->load->view('backend/sidebar.php',$x);
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

		function simpan_compro(){
				if($this->session->userdata('level')=='1'){
						$title=$this->input->post('title');
						$content=$this->input->post('content');
						$this->m_compro->simpan_compro($title,$content);
						echo $this->session->set_flashdata('msg','success');
						redirect('backend/compro');
				}else{
						echo "Halaman tidak ditemukan";
				}
		}

		function update_compro(){
        if($this->session->userdata('level')=='1'){
            $id=$this->input->post('kode');
						$title=$this->input->post('title');
						$content=$this->input->post('content');
            $this->m_compro->update_compro($id,$title,$content);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/compro');
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function hapus_compro(){
	    if($this->session->userdata('level')=='1'){
	        $id=$this->input->post('kode');
	        $this->m_compro->hapus_compro($id);
	        echo $this->session->set_flashdata('msg','success-hapus');
	        redirect('backend/compro');
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

}
