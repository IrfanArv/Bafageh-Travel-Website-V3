<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Prestasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_prestasi');
        $this->load->library('upload');
    }
    function index(){
	    if($this->session->userdata('level')=='1'){
	    	$x['data']=$this->m_prestasi->tampil_prestasi();
			$this->backend->display('backend/v_prestasi',$x);
			$this->load->view('backend/sidebar.php',$x);
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

		function simpan_prestasi(){
				if($this->session->userdata('level')=='1'){
						$icon=$this->input->post('icon');
						$title=$this->input->post('title');
						$this->m_prestasi->simpan_prestasi($icon,$title);
						echo $this->session->set_flashdata('msg','success');
						redirect('backend/prestasi');
				}else{
						echo "Halaman tidak ditemukan";
				}
		}

		function update_prestasi(){
        if($this->session->userdata('level')=='1'){
            $id=$this->input->post('kode');
						$icon=$this->input->post('icon');
						$title=$this->input->post('title');
            $this->m_prestasi->update_prestasi($id,$icon,$title);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/prestasi');
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function hapus_prestasi(){
	    if($this->session->userdata('level')=='1'){
	        $id=$this->input->post('kode');
	        $this->m_prestasi->hapus_prestasi($id);
	        echo $this->session->set_flashdata('msg','success-hapus');
	        redirect('backend/prestasi');
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

}
