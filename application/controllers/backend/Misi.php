<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Misi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_misi');
        $this->load->library('upload');
    }
    function index(){
	    if($this->session->userdata('level')=='1'){
	    	$x['data']=$this->m_misi->tampil_misi();
			$this->backend->display('backend/v_misi',$x);
			$this->load->view('backend/sidebar.php',$x);
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

		function simpan_misi(){
				if($this->session->userdata('level')=='1'){
						$content=$this->input->post('content');
						$this->m_misi->simpan_misi($content);
						echo $this->session->set_flashdata('msg','success');
						redirect('backend/misi');
				}else{
						echo "Halaman tidak ditemukan";
				}
		}

		function update_misi(){
        if($this->session->userdata('level')=='1'){
            $id=$this->input->post('kode');
						$content=$this->input->post('content');
            $this->m_misi->update_misi($id,$content);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/misi');
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function hapus_misi(){
	    if($this->session->userdata('level')=='1'){
	        $id=$this->input->post('kode');
	        $this->m_misi->hapus_misi($id);
	        echo $this->session->set_flashdata('msg','success-hapus');
	        redirect('backend/misi');
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

}
